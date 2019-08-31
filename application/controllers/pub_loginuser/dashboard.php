<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class dashboard extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('pub_loginuser/pub_operation_model');
   
 }

 function index()
 {
  if($this->session->userdata('user_logged_in'))
   {
		if($this->session->flashdata('user_message'))
                {
                    $data['msg'] =$this->session->flashdata('user_message');
                }else{
                        $data['msg'] ='';
                }
		$user_data = $this->session->userdata('user_logged_in');
		$data['user'] = $user_data;
                $dashboardData["todaysEarning"] = $this->pub_operation_model->getTodaysEarning($user_data['user_id'])->earning;
                $dashboardData["yesterdaysEarning"]= $this->pub_operation_model->getYesterdaysEarning($user_data['user_id'])->earning;
                $dashboardData["thisMonthsEarning"]= $this->pub_operation_model->getCurrentMonthsEarning($user_data['user_id'])->earning;
                $dashboardData["lastMonthsEarning"]= $this->pub_operation_model->getLastMonthsEarning($user_data['user_id'])->earning;
		//$dashboardData['result']=$this->pub_operation_model->getDashboardData($user_data['user_id']);
		$this->load->view('pub_loginuser/home_header',$data);
		$this->load->view('pub_loginuser/dashboard_view',$dashboardData);
		$this->load->view('pub_loginuser/home_footer');
	}
   else
   {
     //If no session, redirect to login page
    redirect('home', 'refresh');
   }
  
 }
 



 public function profileinfo(){
	if($this->session->userdata('user_logged_in'))
		{
		
			
			$user_data 					= $this->session->userdata('user_logged_in');
			$current_user 				= $user_data['user_id'];
			$data['user'] 				= $user_data;
			$data['userinfo']			= $this->pub_operation_model->getuseInfo($current_user);
			$this->load->helper('form');
			$this->load->view('pub_loginuser/home_header',$data);
			$this->load->view('pub_loginuser/profileinfo_view');
			$this->load->view('pub_loginuser/home_footer');
		}
		else
		{
     //If no session, redirect to login page
			redirect('home', 'refresh');
		}
	/*getAdminInfo*/
	}



	public	function updateprofileinfo()
	{
		if($this->session->userdata('user_logged_in'))
		{			
			
			$user_data = $this->session->userdata('user_logged_in');
			$current_user = $user_data['user_id'];
			
			$result = $this->pub_operation_model->updateProfileInfo($current_user);
			if($result ==1){
				$info = $this->pub_operation_model->getuseInfo($current_user);
							foreach($info as $ref){
								$userName = $ref->userName;
								$password = $ref->password;
								$user_email = $ref->email;
								}
						
					$mailData['User_name_data'] = $userName;
					$mailData['user_password'] 	= $password;
					$mailData['admin_message']  = '';
					$mailData['Site_name'] 		= SITE_NAME;
					$mailData['site_number'] 	= SITE_CUSTOMER_CARE;
					$mailData['{base_url}'] 	= $this->config->base_url();
					
						require_once("mailer/Email.php");
						$emailSender = new Email();
						$emailSender->SendEmail('user_change_password',$mailData,$user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,'Account Password Change');
			}
			echo $result;	
		}
		else
		{
     //If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}
	
	
	public function do_upload($userId)
    {
        
		 $this->load->library('upload');	
        $image_upload_folder = FCPATH . '\assets\uploads\user\profile';

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
			$imageNAme = 'assets/uploads/user/profile/'.$file_info['file_name'];
			include("includes/Resizeimagecls.php");
			$resizeObj = new Resizeimagecls($imageNAme);
			$resizeObj -> resizeImage(80,80,'crop');
			$resizeObj -> saveImage($imageNAme,100);
			$this->pub_operation_model->userProfileImg($imageNAme,$userId);
			echo json_encode($file_info);
        }
		
    }
	
	// by raj
	
	public function installation($subpublisherid=NULL)
	{
		if($this->session->userdata('user_logged_in'))
		{
			$user_data = $this->session->userdata('user_logged_in');
			$data['user'] = $user_data;
                        //print_r($user_data);
			$pg['cat']=$this->pub_operation_model->getUserCategory($user_data["user_id"]);
			$pg['state']=$this->pub_operation_model->getStates();
			if($subpublisherid==NULL || $subpublisherid==''){
				
				$subpublisherid=0;
			}
			$pg['subpublisherID']=$subpublisherid;
			$this->load->view('pub_loginuser/home_header',$data);
			$this->load->view('pub_loginuser/site_script',$pg);
			$this->load->view('pub_loginuser/home_footer');
		}
		else {
			redirect('home', 'refresh');
		}
	}
	
	
	
	
	// end
	
	
	 public function report(){
		if($this->session->userdata('user_logged_in'))
			{
			
				$user_data 					= $this->session->userdata('user_logged_in');
				$current_user 				= $user_data['user_id'];
				$data['user'] 				= $user_data;
				
				if(!empty($_GET)){
				// start get method if
				foreach($_GET as $key => $value)
					{
					$data[$key]	=	$value;
					}
					
					
					
				$val	=	$_GET['lasthistory'];
				$adId	=	$_GET['advertise'];
				$state	=	$_GET['state'];
				
				
				$start = "";
                                if($val==1){
                                    $start = strtotime("today midnight");
                                    $end =	$start + 86400;
                                }
                                else if($val==7){
                                    $start = strtotime("this week midnight");
                                    $end =	$start + 7 * 86400 ; 
                                }
                                else if($val==30){
                                    $start = strtotime("first day of this month midnight");
                                    $end =	$start + 30 * 86400 ; 
                                }else if($val==365){
                                    $year = date("Y");
                                    $start = strtotime("first day of january $year midnight");
                                    $end =	$start + 12 * 30 * 86400 ;
                                }else{
                                    $end=0;
                                }
                                if($_GET['datepicker_from'] !='' && $_GET['datepicker_from'] !=null){
                                    $start	=	strtotime($_GET['datepicker_from'] . " midnight");
                                    $end = $_GET['datepicker_to'] !='' && $_GET['datepicker_to'] !=null ? strtotime($_GET['datepicker_to'] . " midnight") + 86400 : 0;
                                }
				//echo $end;
                                $data['records_info'] = $this->pub_operation_model->getLeadRecords($current_user,$adId,$state,$start,$end);
				//$data['records_info']		= $this->pub_operation_model->getrecords($current_user,$adId,$state,$start,$end);
				// $data['totalearning'] = $this->pub_operation_model->getTotalearnings($current_user,$adId,$state,$start,$end)->totalearnings;
				// end get method if
				}else{
                                    $data['records_info'] = $this->pub_operation_model->getcurrentmonthleads($current_user);
                                    //$data['records_info']       = $this->pub_operation_model->getrecords($current_user);
                                     //$data['totalearning'] = $this->pub_operation_model->gettodayTotalearnings($current_user)->totalearnings;
				}
				$data['activeads']		= $this->pub_operation_model->getUserCategory($current_user);
				
				$data['getStates']		= $this->pub_operation_model->getStates();
				$this->load->view('pub_loginuser/home_header',$data);
				$this->load->view('pub_loginuser/report_view');
				$this->load->view('pub_loginuser/home_footer');
			}
			else
			{
				redirect('home', 'refresh');
			}
	
	}
        public function leadsviews(){
		if($this->session->userdata('user_logged_in'))
			{
			
				$user_data = $this->session->userdata('user_logged_in');
				$current_user = $user_data['user_id'];
				$data['user'] = $user_data;
				 //print_r($_GET);
                                 //exit();
				if(!empty($_GET)){
                                    foreach($_GET as $key => $value)
					{
					$data[$key]	=	$value;
					}
                                    $start = 0;
                                    $end= 0;
                                     if($_GET['datepicker_from'] !='' && $_GET['datepicker_from'] !=null){
                                        $start	=	strtotime($_GET['datepicker_from'] . " midnight");
                                        $end = $_GET['datepicker_to'] !='' && $_GET['datepicker_to'] !=null ? strtotime($_GET['datepicker_to'] . " midnight") + 86400 : 0;
                                    }
                                    //echo $end;
                                    $data['records_info'] = $this->pub_operation_model->getoldviews($current_user,$start,$end);
                                    $data['totalleads'] = $this->pub_operation_model->gettotalOldleads($current_user,$start,$end);   
				
				}else{
                                    $data['records_info'] = $this->pub_operation_model->gettodayviews($current_user);
                                    $data['totalleads'] = $this->pub_operation_model->gettotalLeads($current_user);
				}
				
				$this->load->view('pub_loginuser/home_header',$data);
				$this->load->view('pub_loginuser/leads_views');
				$this->load->view('pub_loginuser/home_footer');
			}
			else
			{
				redirect('home', 'refresh');
			}
	
	}
            public function paymentdetails()
      {
            if($this->session->userdata('user_logged_in'))
            {
                    $user_data = $this->session->userdata('user_logged_in');
                    $current_user = $user_data['user_id'];
                    $data['user'] = $user_data;
                    //print_r($user_data);
                   // $pay['paymnt'] ="";
                    $payment = new stdClass;           //it is done uncomment by ravindra.
                    //$obj->distance = $distance;
                    if($this->pub_operation_model->getPaymentdetails($current_user))
                    {
                         $pg['payment']= $this->pub_operation_model->getPaymentdetails($current_user) ;
                    }else{
                        //$pg->payment="";
                         $payment->bank_name= "";
                         $payment->bank_address = "";
                         $payment->account_name = "";
                         $payment->account_number = "";
                         $payment->account_type = "" ; 
                         $pg['payment']= $payment;
                    }
                   
                    //echo $pg;
                    
                    $this->load->view('pub_loginuser/home_header',$data);
                    $this->load->view('pub_loginuser/paymentdetail',$pg);
                    $this->load->view('pub_loginuser/home_footer');
            }
            else {
                    redirect('home', 'refresh');
            }
    }
    public function addpaymentDetails()
    {
        //echo "hi";
        $user_data = $this->session->userdata('user_logged_in');
        $current_user = $user_data['user_id'];
       // echo $current_user;
        //$data['user'] = $user_data;
        //print_r($user_data);
         if(!$this->pub_operation_model->getPaymentdetails($current_user))
         {
            $result= $this->pub_operation_model->insertpaymentDetail($current_user);
            redirect('pub_loginuser/dashboard/paymentdetails','refresh');
         }
         else{
             $result= $this->pub_operation_model->updatepaymentDetail($current_user);
             redirect('pub_loginuser/dashboard/paymentdetails','refresh');
         }

    }

	
	public function category()
    {
		$user_data = $this->session->userdata('user_logged_in');
		$current_user = $user_data['user_id'];
		$data['user'] = $user_data;	
                //print_r($this->session->userdata('user_logged_in'));
		$data['usercat']=$this->pub_operation_model->getUserCategories($current_user);
		$data['cat']=$this->pub_operation_model->getCategories();
		$this->load->view('pub_loginuser/home_header',$data);
		$this->load->view('pub_loginuser/category_view');
		$this->load->view('pub_loginuser/home_footer');
    }
	public function updatecategory()
    {
        
		$user_data = $this->session->userdata('user_logged_in');
		$current_user = $user_data['user_id'];
		$data['user'] = $user_data;	
		$data['usercat']=$this->pub_operation_model->updateUserCategories($current_user);
		redirect('pub_loginuser/dashboard/category', 'refresh');
    }
	
	
 	
}
?>