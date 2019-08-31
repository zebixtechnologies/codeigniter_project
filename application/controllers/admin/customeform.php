<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class customeform extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('admin/adv/adv_model');
	 }

	 public function index()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['customeForm'] = $this->adv_model->getallForm();
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/adv/custome_form_manage_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 public function formPreview($formId)
		 {
		  if($this->session->userdata('logged_in'))
			{
				$user_data 		 = $this->session->userdata('logged_in');
				$data['user'] 	 = $user_data;
				$result =  $this->adv_model->getForm($formId);
				$sendata = '';
				foreach($result as $info){
					$sendata .='<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
						&times;</button>
						<h3 id="myModalLabel">'.ucfirst($info->formName).' (preview)</h3>
						</div>
						<div class="modal-body"><div class="jqm">'.htmlspecialchars_decode($info->formData).'</div></div>
						
						
						<div class="modal-footer">
							
						</form>
						</div>';
				}
						echo $sendata;
			}
		   else
		   {
				redirect('admin/login', 'refresh');
		   }
		 }
	 
	 public function addnewform()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
		//	$data['request_pending'] = $this->adv_model->getAdvReq($adId);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/adv/add_custome_fom_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 public function editform($formId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 			= $this->session->userdata('logged_in');
			$data['user'] 	 			= $user_data;
			$data['formInfo'] 		= $this->adv_model->getform($formId);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/adv/edit_custome_form_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
		 public function saveform ()
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$result  = $this->adv_model->savecustomform();
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
			 public function updateform ()
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$result  = $this->adv_model->updateform();
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
			 
		 public function deleteform($formId)
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$result  = $this->adv_model->deleteform($formId);
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
					 
}
?>