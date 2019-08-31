<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class subpublisher extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('pub_loginuser/pub_operation_model');
   
 }

 function index()
 {
  if($this->session->userdata('user_logged_in'))
   {
   					$user_data = $this->session->userdata('user_logged_in');
					$data['user'] = $user_data;
					$userId = $user_data['user_id'];
					$data['sub'] = $this->pub_operation_model->getSubPublishers($userId);
					$this->load->view('pub_loginuser/home_header',$data);
					$this->load->view('pub_loginuser/sub_publisher');
					$this->load->view('pub_loginuser/home_footer');
   }
  else{
  	
	 redirect('home', 'refresh');
  }
 }
 
 public function addsubpublisher(){
 	
	if($this->session->userdata('user_logged_in'))
   {
   					$user_data = $this->session->userdata('user_logged_in');
					$data['user'] = $user_data;
					$pg['publisherid'] = $user_data['user_id'];
					$this->load->view('pub_loginuser/home_header',$data);
					$this->load->view('pub_loginuser/add_sub_publisher',$pg);
					$this->load->view('pub_loginuser/home_footer');
   }
  else{
  	
	 redirect('home', 'refresh');
  }
 }
 public function insertsubpublisher(){
 	
	if($this->session->userdata('user_logged_in'))
   {
   					$user_data = $this->session->userdata('user_logged_in');
					$data['user'] = $user_data;
					$this->pub_operation_model->addSubPublishers();
					$this->load->view('pub_loginuser/home_header',$data);
					$this->load->view('pub_loginuser/add_sub_publisher');
					$this->load->view('pub_loginuser/home_footer');
   }
  else{
  	
	 redirect('home', 'refresh');
  }
 }

 public function editsubpublisher($pubId){
		if($this->session->userdata('user_logged_in'))
			   {
					$user_data = $this->session->userdata('user_logged_in');
					$data['user'] = $user_data;
					$data['pubifo'] = $this->pub_operation_model->getpubinfo($pubId);
					$this->load->view('pub_loginuser/home_header',$data);
					$this->load->view('pub_loginuser/edit_sub_publisher');
					$this->load->view('pub_loginuser/home_footer');
			   }
			  else{
					redirect('home', 'refresh');
			  }
	
 }
 
  public function subpublisherDetail($subId,$publisherId){
		if($this->session->userdata('user_logged_in'))
			   {
					$user_data = $this->session->userdata('user_logged_in');
					$data['user'] = $user_data;
					$data['pubifo'] = $this->pub_operation_model->getcountDetailsubPub($subId,$publisherId);
					$this->load->view('pub_loginuser/home_header',$data);
					$this->load->view('pub_loginuser/sub_publisher_count_detail_view');
					$this->load->view('pub_loginuser/home_footer');
			   }
			  else{
					redirect('home', 'refresh');
			  }
	
 }
 public function deletesubpublisher($pubId){
 		if($this->session->userdata('user_logged_in'))
		   {
				$result = $this->pub_operation_model->deleteSubPublisher($pubId);
				echo $result;			
		   }
		  else{
			
			 redirect('home', 'refresh');
		  }
		}
		
public function updatesubpublisher(){
 		if($this->session->userdata('user_logged_in'))
		   {
				$result = $this->pub_operation_model->updateSubPublisher();
				echo $result;			
		   }
		  else{
			
			 redirect('home', 'refresh');
		  }
		}
				

		
 	
		
		
		
	}