<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(-1);
 session_start();//we need to call PHP's session object to access it through CI
class dashboard extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('admin/profile_model');
 }

 function index()
 {
  if($this->session->userdata('logged_in'))
   {
		if($this->session->flashdata('message'))
			{
				$data['msg'] = 	$this->session->flashdata('message');
				
			}else{
				$data['msg'] ='';
			}
		$user_data = $this->session->userdata('logged_in');
		$data['user'] = $user_data;
		$data['admintask']	= $this->profile_model->getAdminTask();
		$data['users']=	$this->profile_model->getUsersData();
		//$data['profit']=$this->profile_model->getAdminProfit();
                $data['profit']=$this->profile_model->getCurrentMonthsEarning();
		$data['ads']=	$this->profile_model->getDashBoardAds();
		$this->load->view('admin/home_header',$data);
		$this->load->view('admin/dashboard_view');
		$this->load->view('admin/home_footer');
	}
   else
   {
     //If no session, redirect to login page
    redirect('admin/login', 'refresh');
   }
  
 }
 
 public function update_task()
 {
   if($this->session->userdata('logged_in'))
   {
	//echo 'i m in';
		
		if($this->session->flashdata('message'))
			{
				$data['msg'] = 	$this->session->flashdata('message');
				
			}else{
				$data['msg'] ='';
			}
		$user_data = $this->session->userdata('logged_in');
		$data['user'] = $user_data;
		
		$result = $this->profile_model->updateTask();
	  
	 if($result){
			redirect('admin/dashboard');
	 }
	}
   else
   {
     //If no session, redirect to login page
		redirect('admin/login', 'refresh');
   }
 }
 public	function remove_task($del_id)
 {
   if($this->session->userdata('logged_in'))
   {
	//echo 'i m in';
		if($this->session->flashdata('message'))
			{
				$data['msg'] = 	$this->session->flashdata('message');
				
			}else{
				$data['msg'] ='';
			}
		$user_data = $this->session->userdata('logged_in');
		$data['user'] = $user_data;
		
		$result = $this->profile_model->removeTask($del_id);
	 if($result){
		redirect('/admin/dashboard');
	 }
	}
   else
   {
     //If no session, redirect to login page
     redirect('admin/login', 'refresh');
   }
 }


 public function profileinfo(){
	if($this->session->userdata('logged_in'))
		{
		
			if($this->session->flashdata('message'))
			{
				$data['msg'] = 	$this->session->flashdata('message');
				
			}else{
				$data['msg'] ='';
			}
			$user_data 					= $this->session->userdata('logged_in');
		//	print_r($user_data);
			$current_user 				= $user_data['user_id'];
			$data['user'] 				= $user_data;
			$data['admininfo']			= $this->profile_model->getAdminInfo($current_user);
			$this->load->helper('form');
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/profileinfo_view');
			$this->load->view('admin/home_footer');
		}
		else
		{
     //If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}
	/*getAdminInfo*/
	}



	public	function updateprofileinfo()
	{
		if($this->session->userdata('logged_in'))
		{			
			if($this->session->flashdata('message'))
			{
				$data['msg'] = 	$this->session->flashdata('message');
				
			}else{
				$data['msg'] 				='';
			}
			$user_data = $this->session->userdata('logged_in');
			$current_user = $user_data['user_id'];
			
			
			$data['user'] = $user_data;							
			$result = $this->profile_model->updateProfileInfo($current_user);
			if($result)
			{
				$msg = '<div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert">×</a>
                                    <strong>Success Alert</strong><br>
                                   Your Password has been  Changed Success Fully...!
                                </div>';	
				$this->session->set_flashdata('message',$msg);
				redirect('admin/dashboard/profileinfo');
				
			}else{
				$msg = '<div class="alert alert-danger fade in">
                                    <a href="#" class="close" data-dismiss="alert">×</a>
                                    <strong>Danger Alert</strong><br>
                                    Old Password Does Not Match....!!
                                </div>';
				$this->session->set_flashdata('message',$msg);
				redirect('admin/dashboard/profileinfo');
				
			}
			
		}
		else
		{
     //If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}
	}
	
	
	public function do_upload($userId)
    {
        
		 $this->load->library('upload');	
        $image_upload_folder = FCPATH . '\assets\admin_property\profile';

        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }

        $this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 2048,
            'remove_space'  => TRUE,
            'encrypt_name'  => TRUE,
        );

        $this->upload->initialize($this->upload_config);

        if (!$this->upload->do_upload()) {
            $upload_error = $this->upload->display_errors();
            echo json_encode($upload_error);
        } else {
            $file_info = $this->upload->data();
			$imageNAme = 'assets/admin_property/profile/'.$file_info['file_name'];
			include("includes/Resizeimagecls.php");
			$resizeObj = new Resizeimagecls($imageNAme);
			$resizeObj -> resizeImage(80,80,'crop');
			$resizeObj -> saveImage($imageNAme,100);
			$this->profile_model->adminProfileImg($imageNAme,$userId);
			$this->session->set_userdata('user_image', $imageNAme);
			echo json_encode($file_info);
        }
		
    }
	

 	
}
?>