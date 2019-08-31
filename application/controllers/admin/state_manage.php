<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class state_manage extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('admin/state/state_model');
 }

 function index()
 {
  if($this->session->userdata('logged_in'))
    {
		$user_data 		 = $this->session->userdata('logged_in');
		$data['user'] 	 = $user_data;
		$data['country'] = $this->state_model->getallstate();
		$this->load->view('admin/home_header',$data);
		$this->load->view('admin/state/state_manage_view');
		$this->load->view('admin/home_footer');
	}
   else
   {
		redirect('admin/login', 'refresh');
   }
 }

	public  function addstate()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
			$data['country'] = $this->state_model->getcountry();
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/state/add_state_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 
	 public  function editstate($catId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
			$data['country'] = $this->state_model->getcountry();
			$data['state_info']	= $this->state_model->getstate($catId);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/state/edit_state_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 public  function addstateprocess()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$userData = $this->session->userdata('logged_in');
			$result = $this->state_model->insertNewState();
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
	 public  function updatestateprocess()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$userData = $this->session->userdata('logged_in');
			$result = $this->state_model->updateState();
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
	 
	 public function removestate($catId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$result = $this->state_model->deleteState($catId);
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
}
?>