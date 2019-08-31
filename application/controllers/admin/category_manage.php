<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class category_manage extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('admin/category/category_model');
 }

 function index()
 {
  if($this->session->userdata('logged_in'))
    {
		$user_data = $this->session->userdata('logged_in');
		$data['user'] = $user_data;
		$data['category']	= $this->category_model->getallcategary();
		$this->load->view('admin/home_header',$data);
		$this->load->view('admin/category/category_manage_view');
		$this->load->view('admin/home_footer');
	}
   else
   {
		redirect('admin/login', 'refresh');
   }
 }

	public  function addcategory()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
			$data['category']	= $this->category_model->getcategaryInfo(1);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/category/add_category_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 
	 public  function editcategory($catId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
			$data['category']	= $this->category_model->getcategaryInfo(1);
			$data['category_info']	= $this->category_model->getcategary($catId);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/category/edit_category_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 public  function addcategoryprocess()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$userData = $this->session->userdata('logged_in');
			$result = $this->category_model->insertNewCategory();
			if(!$result){
				echo 0;
			}else{
				echo 1;
			}
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 public  function updatecategoryprocess()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$userData = $this->session->userdata('logged_in');
			$result = $this->category_model->updateCategory();
			if(!$result){
				echo 0;
			}else{
				echo 1;
			}
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 public function removecategory($catId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$result = $this->category_model->deleteCategory($catId);
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 public function getsubcategory($catId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			header('content-type: application/json; charset=utf-8');
			$result = $this->category_model->subcategory($catId);
			echo json_encode($result);
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 } 
         public function setBidPrice($catId){
            if($this->session->userdata('logged_in')){
                $result = $this->category_model->updateBidPrice($catId);
            }else{
                redirect('admin/login', 'refresh');
            }
        }
       
        public function setBidPriceView($catId){
            $cat = $this->category_model->getcategary($catId);
            $getBidPrice = $cat[0]->minbidprice;
            $sendata ='<form name="setbidform" action="'.$this->config->base_url().'admin/category_manage/setBidPrice/'.$catId.'" method="post" onsubmit="return savebidForm();" id="setbid" class="form-container">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">&times;</button>
                    <h3 id="myModalLabel">Set Minimum Bid Price</h3>
                </div>
                <div class="row-fluid modal-body">
                    <div class="control-group">
                        <label class="control-label" for="task"> Set Minimum Bid Price : </label>
                        <div class="controls">
                            <div class="input-append input-prepend">
                                <input type="text" id="price" name="bidprice" class="number span5 required" value="'.$getBidPrice.'" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row-fluid">
                        <div class="pull-right">
                                <input type="submit" class="btn btn-info" value="Set Price">
                                <input type="button" class="btn btn-warning" value="Cancel" onclick ="closeMe();">
                        </div>
                    </div>
                </div>
                </form>
                ';
                echo $sendata;
        }
        
        //by ravindra
         public  function setActiveSuspend($catId)
	 {
	  if($this->session->userdata('logged_in'))
            {
                    $res = $this->category_model->getcategary($catId);
                    //echo "this is" . $res[0]->isActive;
                    $act = '';
                    if(isset($res[0]->isActive) && $res[0]->isActive == '0'){
                        $act = '1';
                    }else if(isset($res[0]->isActive) && $res[0]->isActive == '1'){
                        $act = '0';
                    }
                    $result = $this->category_model->updatecatisActive($catId,$act);
                    
                    echo $act;

            }
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
   
}
?>