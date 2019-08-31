<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class country_manage extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('admin/country/country_model');
 }

 function index()
 {
  if($this->session->userdata('logged_in'))
    {
		$user_data = $this->session->userdata('logged_in');
		$data['user'] = $user_data;
		$data['country']	= $this->country_model->getallcountry();
		$this->load->view('admin/home_header',$data);
		$this->load->view('admin/country/country_manage_view');
		$this->load->view('admin/home_footer');
	}
   else
   {
		redirect('admin/login', 'refresh');
   }
 }

	public  function addcountry()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/country/add_country_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 
	 public  function editcountry($catId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
			$data['country_info']	= $this->country_model->getcountry($catId);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/country/edit_country_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 public  function addcountryprocess()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$userData = $this->session->userdata('logged_in');
			$result = $this->country_model->insertNewCountry();
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
	 public  function updatecountryprocess()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$userData = $this->session->userdata('logged_in');
			$result = $this->country_model->updateCountry();
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
	 
	 public function removecountry($catId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$result = $this->country_model->deleteCountry($catId);
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