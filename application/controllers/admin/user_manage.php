<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class user_manage extends CI_Controller {

	 function __construct()
	 {
	 	
	   parent::__construct();
	  // header('Access-Control-Allow-Origin: *');
	  $this->cors();
	   $this->load->model('admin/user/user_model');
	   $this->load->model('admin/category/category_model');
	   
	 }
	 public function cors() { // Allow from any origin 
 if (isset($_SERVER['HTTP_ORIGIN'])) { 
 header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}"); 
 header('Access-Control-Allow-Credentials: true');
 header('Access-Control-Max-Age: 86400'); 
 // cache for 1 day 
 }
 // Access-Control headers are received during OPTIONS requests 
 if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { 
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) 
  header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}"); 
  exit(o); 
  }
 }
	 public function index()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['request_pending'] = $this->user_model->getusers();
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/user_manage/user_manage_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 public function userdetail($userId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['request_pending'] = $this->user_model->getUserReq($userId);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/user_manage/user_detail_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 public function declinerequest($userId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$this->user_model->refuseReq($userId);
			redirect('admin/signuprequest', 'refresh');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 public function suspenduser($userId,$status)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$this->user_model->suspendusr($userId,$status);
			redirect('admin/user_manage', 'refresh');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 public function deleteUser($userId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$this->user_model->removeuser($userId);
			redirect('admin/user_manage', 'refresh');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 

	 
	 
	 public	function generatePass($length=10) 
				{
					$characters = '012fGsdafGERHJHGHDF1G2DS1FG1DfghS1FG32fdsgdfsgdf1DF3G1DS32F1G32D1FG31DFSF3G21DF321G3D2F1GDF1G3DTU1TYU1TRY1UIT1TYJ3GDFS4567A8GFDGGSDFGDFSGDSFGDFG997t89re7t877q98r7qer87tr87uy8t7i7u8i7u87of87d8g7f7hg78j7h78k987l4g5f456h4gf54j5h45kj44f54gf54hf55j4544g54fh45j44jk54cxzvvbxb4vnvbcn4v4bn45vbDSA4GSGF5456H4G5H456454HFG54HF874gdf564g56df56g4df564g56df4GSDGHFGGSDG908yGFDSG984oeijhg85GDSFGDSF4oitg98gj1FGSFDSGDSFGDG00147gDSFG85236GDFSGSDFTdfgdsEUdfghdsjkgdsffsweqwdfdsfggghgghjGgHJgjhGfghHJgGJgJhhfgHJggggggJgJHggJGjGhjdfhjkfdgjkldj974T5R4ET98ERTE8G4ERG5RE4G4ERE5RG48E4G1F864G4GH5DFS4H4KJ5H4GK444ffsadff45sd64f564sfds4g98hbdf56f4f4dsg4df5s64g564O4F539517539DF12354DFGDS8935845255';
					$randomString = '';
					for ($i = 0; $i < $length; $i++) {
						$randomString .= $characters[rand(0, strlen($characters) - 1)];
					}
					return $randomString;
				}
				
				

	 public function requestapproval($userId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$request_pending = $this->user_model->getUserReq($userId);
			$sendata = '';
			foreach($request_pending as $req){
				$user_email = $req->email;
				$userName 	= $req->userName;
				$userType 	= $req->userType;
			}
			$sendata .='<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
					&times;</button>
					<h3 id="myModalLabel">User Request Approval</h3>
					</div>
					<div class="modal-body">
					<form name="approval_mail" action="'.$this->config->base_url().'admin/signuprequest/approvalMail" method="post" id="approval_mail" onsubmit="return false;">
					<div class="row-fluid">
							<div class="control-group">
							<label class="control-label" for="task">Hello '.$user_data['user_name'] .' ,<br/>
								<strong>If you Want To give Special Messege To the user Please Write in Below . otherwise leave it blank.</strong>
							</label>
							<div class="controls">
							<textarea name="mail_massage" class="span12">
							</textarea>
							<input type="hidden" name="userId" value="'.$userId.'"/>
							<input type="hidden" name="user_email" value="'.$user_email.'"/>
							<input type="hidden" name="userName" value="'.$userName.'"/>
							<input type="hidden" name="userType" value="'.$userType.'"/>
							</div>
							</div>
							</div>
					</div>
					<div class="modal-footer">
						 <div class="pull-right">
							<input type="submit" class="btn btn-info" value="Request Approval" onclick="submitMailForm(this);">
						</div>
					</form>
					</div>';
					echo $sendata;
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	  public function changePasswordView($userId)
		 {
		  if($this->session->userdata('logged_in'))
			{
				$user_data 		 = $this->session->userdata('logged_in');
				$data['user'] 	 = $user_data;
				$userdetail = $this->user_model->getUserReq($userId);
				$sendata = '';
				foreach($userdetail as $req){
					$user_email = $req->email;
					$userName 	= $req->userName;
					$userType 	= $req->userType;
					$name 	= $req->name;
                                        $password = $req->password;
				}
				$sendata .='<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
						&times;</button>
						<h3 id="myModalLabel">Change Password ( '.$name .' )</h3>
						</div>
						<div class="modal-body">
						<form name="change_pass" action="'.$this->config->base_url().'admin/user_manage/chnagepassword" method="post" id="change_pass" onsubmit="return false;">
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task">Hello '.$user_data['user_name'] .' ,<br/>
									<strong>Here you can change user login password.</strong>
								</label>
								<div class="controls">
								
								<input type="hidden" name="userId" value="'.$userId.'"/>
								<input type="hidden" name="name" value="'.$name.'"/>
								<input type="hidden" name="user_email" value="'.$user_email.'"/>
								<input type="hidden" name="userType" value="'.$userType.'"/>
								</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="task">Login Name</strong>
									</label>
									<div class="controls">
									<input type="text" name="userName" value="'.$userName.'" readonly/>
									</div>
								</div>
                                                                <div class="control-group">
                                                                        <label class="control-label" for="task">Current Password</strong>
                                                                        </label>
                                                                        <div class="controls">
                                                                        <input type="text" name="userpassword" value="'.$password.'" readonly/>
                                                                        </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="password">Password</strong>
									</label>
									<div class="controls">
									<input type="password" name="password"  id="password"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="c_password">Confirm Passowrd</strong>
									</label>
									<div class="controls">
									<input type="password" name="c_password"  id="c_password"/>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							 <div class="pull-right">
								<input type="submit" class="btn btn-info" value="Change Password" onclick="submitchangePassForm(this);">
							</div>
						</form>
						</div>';
						echo $sendata;
			}
		   else
		   {
				redirect('admin/login', 'refresh');
		   }
	 }
	
	
	
		 public function approvalMail()
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$random_pass 	 = $this->generatePass();
					
					
					$userId  		 = $this->security->xss_clean($this->input->post('userId'));
					$user_email 	 = $this->security->xss_clean($this->input->post('user_email'));
					$userName 	 = $this->security->xss_clean($this->input->post('userName'));
					$userType 	 	 = $this->security->xss_clean($this->input->post('userType'));
					$isActive		 = $this->security->xss_clean($this->input->post('isActive'));
					$mail_massage		 = $this->security->xss_clean($this->input->post('mail_massage'));
					$result = $this->user_model->updateApproval($random_pass,$userId,$mail_massage);
					
					$mailData['User_name_data'] = $userName;
					$mailData['userType_data'] = ($userType == 1) ? 'Advertise':'Publisher';
					$mailData['user_password'] = $random_pass;
					$mailData['admin_message'] = $mail_massage;
					$mailData['Site_name'] 		= SITE_NAME;
					$mailData['site_number'] 	= SITE_CUSTOMER_CARE;
					$mailData['{base_url}'] 	= $this->config->base_url();
					
					if($result){
						require_once("mailer/Email.php");
						$emailSender = new Email();
						$emailSender->SendEmail('request_approval',$mailData,$user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,'Request Approval And Password Confirmation');
				
					}
				echo 1;	
				}
			   else
			   {
					redirect('admin/login', 'refresh');
			   }
			 }
		
		
		public function chnagepassword()
			 {
			  if($this->session->userdata('logged_in'))
				{
					
					$userId  		 = $this->security->xss_clean($this->input->post('userId'));
					$user_email 	 = $this->security->xss_clean($this->input->post('user_email'));
					$userName 	 	 = $this->security->xss_clean($this->input->post('userName'));
					$name 	 	 = $this->security->xss_clean($this->input->post('name'));
					$password 	 	 = $this->security->xss_clean($this->input->post('password'));
					$userType 	 	 = $this->security->xss_clean($this->input->post('userType'));
					
					$result 		 = $this->user_model->updatePassword($password,$userId);
					
					$mailData['User_name_data'] = $userName;
					$mailData['userType_data'] 	= ($userType == 1) ? 'Advertise':'Publisher';
					$mailData['user_password'] 	= $random_pass;
					$mailData['admin_message'] 	= $mail_massage;
					$mailData['Site_name'] 		= SITE_NAME;
					$mailData['site_number'] 	= SITE_CUSTOMER_CARE;
					$mailData['{base_url}'] 	= $this->config->base_url();
					
				/*	if($result){
						require_once("mailer/Email.php");
						$emailSender = new Email();
						$emailSender->SendEmail('request_approval',$mailData,$user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,'Request Approval And Password Confirmation');
				
					} */
				echo 1;	
				}
			   else
			   {
					redirect('admin/login', 'refresh');
			   }
			 }
			 
			 
		 public function mailtocutomer($userId)
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$request_pending = $this->user_model->getUserReq($userId);
					$sendata = '';
					foreach($request_pending as $req){
						$user_email = $req->email;
						$userName 	= $req->userName;
						$userType 	= $req->userType;
					}
				        $sendata .='<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
							&times;</button>
							<h3 id="myModalLabel"> Mail To Customer </h3>
							</div>
							<div class="modal-body">
							<form name="reply_mail" action="'.$this->config->base_url().'admin/signuprequest/mailtocutomerprocess" method="post" id="reply_mail" onsubmit="return false;">
							<div class="row-fluid">
									<div class="control-group">
									<label class="control-label" for="task">
										<strong>Mail Subject</strong>
									</label>
									<div class="controls">
									<input type="text" name="subject_mail" value="" class="span12"/>
									</div>
									</div>
							</div>
							<div class="row-fluid">
									<div class="control-group">
									<label class="control-label" for="task">	<strong>Message	</strong>
									</label>
									<div class="controls">
									<textarea name="mail_massage" class="span12">
									</textarea>
									<input type="hidden" name="userId" value="'.$userId.'"/>
									<input type="hidden" name="user_email" value="'.$user_email.'"/>
									<input type="hidden" name="userName" value="'.$userName.'"/>
									<input type="hidden" name="userType" value="'.$userType.'"/>
									</div>
									</div>
									</div>
							</div>
							<div class="modal-footer">
								 <div class="pull-right">
									<input type="submit" class="btn btn-info" value="Reply To Customer" onclick="submitMailMessage(this);">
								</div>
							</form>
							</div>';
							echo $sendata;
				}
			   else
			   {
					redirect('admin/login', 'refresh');
			   }
			 }

		 public function mailtocutomerprocess()
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$random_pass 	 = $this->generatePass();
					
					
					$userId  		 = $this->security->xss_clean($this->input->post('userId'));
					$user_email 	 = $this->security->xss_clean($this->input->post('user_email'));
					$userName 	 	 = $this->security->xss_clean($this->input->post('userName'));
					$userType 	 	 = $this->security->xss_clean($this->input->post('userType'));
					$isActive		 = $this->security->xss_clean($this->input->post('isActive'));
					$mail_massage	 = $this->security->xss_clean($this->input->post('mail_massage'));
					$subject_mail	 = $this->security->xss_clean($this->input->post('subject_mail'));
					$result 		 = $this->user_model->updateReply($userId,$mail_massage);
					
					$mailData['User_name_data'] = $userName;
					$mailData['userType_data']  = ($userType == 1) ? 'Advertise':'Publisher';
					$mailData['user_password']  = $random_pass;
					$mailData['admin_message']  = $mail_massage;
					$mailData['Site_name'] 		= SITE_NAME;
					$mailData['site_number'] 	= SITE_CUSTOMER_CARE;
					$mailData['{base_url}'] 	= $this->config->base_url();
					
					if($result){
						require_once("mailer/Email.php");
						$emailSender = new Email();
						$emailSender->SendEmail('reply_mail',$mailData,$user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,$subject_mail);
				
					}
				echo 1;	
				}
			   else
			   {
					redirect('admin/login', 'refresh');
			   }
			 }

		public function add_user(){
			
		 if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['category']= $this->category_model->getcategaryInfo(1);			
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/user_manage/add_user');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
			
		}
		
		public function saveuser()
		{
			
			echo $result= $this->user_model->saveadvertiser();
			
		}
                public function emailpubs(){
			
                    if($this->session->userdata('logged_in')){
                           $user_data 		 = $this->session->userdata('logged_in');
                           $data['user'] 	 = $user_data;
                           $this->load->view('admin/home_header',$data);
                           $this->load->view('admin/user_manage/emailtoadvndpubs');
                           $this->load->view('admin/home_footer');
                   }else{
                           redirect('admin/login', 'refresh');
                   }
			
		}
                public function emailadvs(){

                        if($this->session->userdata('logged_in')){
                               $user_data 		 = $this->session->userdata('logged_in');
                               $data['user'] 	 = $user_data;
                               $this->load->view('admin/home_header',$data);
                               $this->load->view('admin/user_manage/emailtoadvertisers');
                               $this->load->view('admin/home_footer');
                       }else{
                               redirect('admin/login', 'refresh');
                       }
			
		}
                public function emailadvpubs(){
			
                        if($this->session->userdata('logged_in')){
                            $user_data 		 = $this->session->userdata('logged_in');
                            $data['user'] 	 = $user_data;
                            $this->load->view('admin/home_header',$data);
                            $this->load->view('admin/user_manage/emailtoadvspubs');
                            $this->load->view('admin/home_footer');
                       }else{
                            redirect('admin/login', 'refresh');
                       }
			
		}
               public function sendemailpubs(){
                   if($this->session->userdata("logged_in")){
                        $user_data 	= $this->session->userdata('logged_in');
                        $data['user'] 	 = $user_data;
                        $emails= $this->user_model->getemailofpubs();
                        $mail_massage	 = $this->security->xss_clean($this->input->post('mail_massage'));
                        $mailsubject	 = $this->security->xss_clean($this->input->post('mailsubject'));
                        
                        $comma="";
                        $user_email= "";
                        if(isset($emails) && is_array($emails) && count($emails) > 0){
                                foreach($emails as $email){
                                        $user_email.= $comma. $email->email. "";
                                        $comma=",";
                                       
                                }

                        }
                        // print_r($user_email);
                         
                        require_once("mailer/Email.php");
                        $emailSender = new Email();
                        $mailData['userType_data'] = "Publisher";
                        $mailData['admin_message']  = "$mail_massage";
                        $mailData['Site_name'] 		= SITE_NAME;
                        $mailData['site_number'] 	= SITE_CUSTOMER_CARE;
                        $mailData['{base_url}'] 	= $this->config->base_url();
                        $emailSender->SendEmail('custommail',$mailData,$user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,$mailsubject);
                        redirect('admin/user_manage/emailpubs', 'refresh');
                                
                                
                        }else{
                            redirect('admin/login', 'refresh');
                        }
                       
                }
               
                 public function sendemailadvs(){
                   if($this->session->userdata("logged_in")){
                        $user_data 	= $this->session->userdata('logged_in');
                        $data['user'] 	 = $user_data;
                        $emails= $this->user_model->getemailofadvs();
                        $mail_massage	 = $this->security->xss_clean($this->input->post('mail_massage'));
                        $mailsubject	 = $this->security->xss_clean($this->input->post('mailsubject'));
                        $comma="";
                        $user_email= "";
                        if(isset($emails) && is_array($emails) && count($emails) > 0){
                                foreach($emails as $email){
                                        $user_email.= $comma. $email->email. "";
                                        $comma=",";
                                       
                                      
                                }

                        }
                         //print_r($user_email);
                         
                        require_once("mailer/Email.php");
                        $emailSender = new Email();
                        $mailData['userType_data'] = "Advertiser";
                        $mailData['admin_message']  = "$mail_massage";
                        $mailData['Site_name'] 		= SITE_NAME;
                        $mailData['site_number'] 	= SITE_CUSTOMER_CARE;
                        $mailData['{base_url}'] 	= $this->config->base_url();
                       $emailSender->SendEmail('custommail',$mailData,$user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,$mailsubject);
                       redirect('admin/user_manage/emailadvs', 'refresh');
                                
                                
                        }else{
                            redirect('admin/login', 'refresh');
                        }
                       
                }
                 public function sendemailtoAdvandPub(){
                   if($this->session->userdata("logged_in")){
                            $user_data 	= $this->session->userdata('logged_in');
                            $data['user'] 	 = $user_data;
                            $emails= $this->user_model->getemailofadvpubs();
                            $mail_massage	 = $this->security->xss_clean($this->input->post('mail_massage'));
                            $mailsubject	 = $this->security->xss_clean($this->input->post('mailsubject'));
                            $comma="";
                            $user_email= "";
                            if(isset($emails) && is_array($emails) && count($emails) > 0){
                                    foreach($emails as $email){
                                            $user_email.= $comma. $email->email. "";
                                            $comma=",";

                                            $userType 	= $email->userType;
                                    }

                            }
                              //print_r($user_email);
                            require_once("mailer/Email.php");
                            $emailSender = new Email();
                            $mailData['userType_data'] = 'Client';
                            $mailData['admin_message']  = "$mail_massage";
                            $mailData['Site_name'] 		= SITE_NAME;
                            $mailData['site_number'] 	= SITE_CUSTOMER_CARE;
                            $mailData['{base_url}'] 	= $this->config->base_url();
                           $emailSender->SendEmail('custommail',$mailData,$user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,$mailsubject);
                           redirect('admin/user_manage/emailadvpubs', 'refresh');
                                
                                
                        }else{
                            redirect('admin/login', 'refresh');
                        }
                       
                }
              /*  public function sendemailpubs(){
                        if($this->session->userdata('logged_in')){
                            $emails= array();
                            $user_data 		 = $this->session->userdata('logged_in');
                            $data['user'] 	 = $user_data;
                            $emails= $this->user_model->getemailofpubs();
                            $mail_massage	 = $this->security->xss_clean($this->input->post('mail_massage'));

                           //print_r($emails);
                            $comma="";
                            //$user_email= "";
                            require_once("mailer/class.phpmailer.php");
                            $mail = new PHPMailer(); // defaults to using php "mail()" 
                            //$mail->SetFrom(ADMIN_MAIL, SITE_NAME); 
                           // $mail->MsgHTML($mail_massage); 
                           // $mail->Subject = "Custom Email"; 
                                if(isset($emails) && is_array($emails) && count($emails) > 0){
                                        foreach($emails as $email){
                                            $user_email = $email->email;
                                            $username= $email->userName;  
                                            $mail->AddAddress($user_email, $username); 
                                      }

                                }
                               
                                $mailData['admin_message']      = $mail_massage;
                                $mailData['Site_name'] 		= SITE_NAME;
                                $mailData['site_number'] 	= SITE_CUSTOMER_CARE;
                                $mailData['{base_url}'] 	= $this->config->base_url();
                                if(!$mail->SendEmail('reply_mail',$mailData,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,'Custom Email')){
                                   echo  "Mailer Error: " . $mail->ErrorInfo; 
                                }else{
                                    echo "success";
                                }
                                //$mailData['admin_message']      = $mail_massage;
                                //$mailData['Site_name'] 		= SITE_NAME;
                                //$mailData['site_number'] 	= SITE_CUSTOMER_CARE;
                                //$mailData['{base_url}'] 	= $this->config->base_url();


                                //require_once("mailer/Email.php");
                              
                               /// $emailSender = new Email();
                               // $emailSender->SendEmail('reply_mail',$mailData,$to,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,'Custom Email');
                               
                                //redirect('admin/user_manage/emailpubs', 'refresh');
                               
                                
                        }else{
                            redirect('admin/login', 'refresh');
                       }
                }*/

                public function updateCategory($userId){
                    $this->user_model->updateUserCategories($userId);
                }
				 
                public function updateCategoryView($userId){
                    $this->load->model("adv_loginuser/adv_operation_model");
                    $usercat = $this->adv_operation_model->getUserCat($userId);
                    $ucts = explode('-' ,$usercat->categoryId );
                    $cat=$this->adv_operation_model->getCategory();
                    $action = base_url() . "admin/user_manage/updateCategory/$userId";
                    $sendata = <<<EOT
                            <!--<div class="row-fluid">
                                <div class="span12 widget no-widget">
                                    <div class="widget-header">
                                        <span class="title"><i class="icon-edit"></i>Categories </span>
                                            <div class="toolbar">
                                                <div class="btn-group" ></div>
                                            </div>		  
                                    </div>
                                    <div class="widget-content ">
                                        <div class="form-container">
                                            <div class="row-fluid">
                                                <h4>Select one or more categories<b class="req_field">*</b></h4>-->
                            
                            
                                                <form class="form-horizontal" method="post" action="$action" id="update_category" onsubmit="return submitCategory();">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">&times;</button>
                                                        <h3 id="myModalLabel">Categories</h3>
                                                    </div>
                                                    <div class="row-fluid modal-body">
                                                        <div class="control-group">
                                                        <label class="control-label" for="task">Select one or more categories : </label>
                                                        <div class="controls">
                                                            <div class="input-append input-prepend">
                                                    <ul class=" gf-checkbox inline">
EOT;
                                                    $i = 0;
                                                    foreach($cat as $info){
                                                        if(in_array($info->categoryId, $ucts)){
                                                            $sendata .= '<li><input type="checkbox" checked class="" value="'.$info->categoryId.'" name="category[]"  id="cat_'.$i.'"/><label for="cat_'.$i.'" >'.$info->categoryName.'</label></li>';
                                                        }else{
                                                            $sendata .= '<li><input type="checkbox" class="" value="'.$info->categoryId.'" name="category[]"  id="cat_'.$i.'"/><label for="cat_'.$i.'" >'.$info->categoryName.'</label></li>';
                                                        }
                                                        $i++;
                                                    }
                    $sendata .= <<<EOT
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="row-fluid">
                                                            <div class="pull-right">
                                                                    <input type="submit" class="btn btn-info" value="Update Category">
                                                                    <input type="button" class="btn btn-warning" value="Cancel" onclick ="closeMe();">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
EOT;
                    echo $sendata;
                }
                
                public function doUpdate($userId){
                    $this->user_model->updateprofile($userId);
                }
                
                 public function updateProfileView($userId){
                    $this->load->model("admin/user/user_model");
                    $user = $this->user_model->getprofile($userId);
                    $action = base_url() . "admin/user_manage/doUpdate/$userId";
                    $sendata = <<<EOT
                         
                            
     <form class="form-horizontal" method="post" action="$action" id="update_profile" onsubmit="return submitProfile();">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">&times;</button>
                       <h3 id="myModalLabel">Update Profile</h3>
           </div>
              <div class="row-fluid modal-body">
                    <div class="control-group">                    		
                    <label class="control-label " >Name</label>
                    <div class="controls">
                        <input type="text" name="name" value="$user->name">     
                      </div>
                  
                </div>
               <div class="control-group">    
                <label class="control-label" >Email</label>                		
                <div class="controls">
			 <input type="text" name="email" value="$user->email">  
                </div>
              </div>
                            <div class="control-group">                    		
                    <label class="control-label " >Phone</label>
                    <div class="controls">
                        <input type="text" name="phone" value="$user->phone">     
                      </div>
                  
                </div>
                 <div class="control-group">    
                  <label class="control-label">Company</label>                		
                  <div class="controls">
                    <input type="text" name="company" value="$user->company">
				</div>
                </div>
             <div class="control-group">    
                  <label class="control-label">Website</label>                		
                  <div class="controls">
                    <input type="text" name="website" value="$user->website">
				</div>
                </div>
            </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="row-fluid">
                                                            <div class="pull-right">
                                                                    <input type="submit" class="btn btn-info" value="Update Profile">
                                                                    <input type="button" class="btn btn-warning" value="Cancel" onclick ="closeMe();">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
EOT;
                    echo $sendata;
                }
                
                
}
?>