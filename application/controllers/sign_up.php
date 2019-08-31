<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
session_start();
//we need to call PHP's session object to access it through CI
class sign_up extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('signup_model');
	}

	public function index() {
		$data['category'] = $this->signup_model->getparentcategaryInfo();
		$this->load->view('include/header',$data);
		$this->load->view('sign_up_view');
		$this->load->view('include/footer');
	}
	
	public function addnewuser(){
		$result =	$this->signup_model->inserUserDetail();
		if($result > 10){
			$res =	$this->signup_model->getuserInfo($result);
			foreach($res as $req){
					$user_email = $req->email;
					$userName 	= $req->userName;
					$userType 	= $req->userType;
					$name 		= $req->name;
					}
					$mailData['User_name_data'] = $userName;
					$mailData['user_org_name'] = $name;
					$mailData['userType_data'] = ($userType == 1) ? 'Advertise':'Publisher';
					$mailData['Site_name'] 		= SITE_NAME;
					$mailData['site_number'] 	= SITE_CUSTOMER_CARE;
					$mailData['{base_url}'] 	= $this->config->base_url();
					require_once("mailer/Email.php");
					$emailSender = new Email();
					$emailSender->SendEmail('welcome',$mailData,$user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,'Your KeyVerticals Application');
					$result=1;
				} 
			echo $result;
		}
	}