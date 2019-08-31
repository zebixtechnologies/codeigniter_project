<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class adv_manage extends CI_Controller {

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
			$data['request_pending'] = $this->adv_model->getAdvpendingReq();
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/adv/adv_manage_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 
	 public function advdetail($adId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['request_pending'] = $this->adv_model->getAdvReq($adId);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/adv/adv_detail_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 public function declinerequest($adId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$this->adv_model->refadReq($adId);
			redirect('admin/adv_manage');
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
				
				

	 public function requestapproval($adId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$request_pending = $this->adv_model->getAdvReq($adId);
			$forms = $this->adv_model->getallFroms();
			$sendata = '';
			$fromdata = '';
			foreach($request_pending as $req){
				$user_email = $req->email;
				$userName 	= $req->userName;
				$adId 	= $req->adId;
				$ADV_name 	= $req->adName;
				$ADV_title 	= $req->adTitle;
			}
			foreach($forms as $info){
						$fromdata .='<option value="'.$info->formId.'">'.$info->formName.'</option>';
							}
			$sendata .='<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
					&times;</button>
					<h3 id="myModalLabel">AD  Request Approval</h3>
					</div>
					<div class="modal-body">
					<form name="approval_mail" action="'.$this->config->base_url().'admin/adv_manage/approvalMail" method="post" id="approval_mail" onsubmit="return false;">
					<div class="row-fluid">
							<div class="control-group">
							<label class="control-label" for="task">Hello '.$user_data['user_name'] .' ,<br/>
								<strong>If you Want To give Special Messege To the user Please Write in Below . otherwise leave it blank.</strong>
							</label>
							<div class="controls">
							<textarea name="mail_massage" class="span12"></textarea>
							<input type="hidden" name="adId" value="'.$adId.'"/>
							<input type="hidden" name="user_email" value="'.$user_email.'"/>
							<input type="hidden" name="userName" value="'.$userName.'"/>
							<input type="hidden" name="ADV_name" value="'.$ADV_name.'"/>
							<input type="hidden" name="ADV_title" value="'.$ADV_title.'"/>
							</div>
							</div>
							</div>
					
					<div class="row-fluid">
							<div class="control-group">
							<label class="control-label" for="task">Choose Ad Form
							</label>
							<div class="controls">
								<select name="adFrom" class="required">
									'.$fromdata.'
								</select>
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
	
	
	
		 public function approvalMail()
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$adId  		 = $this->security->xss_clean($this->input->post('adId'));
					$user_email 	 = $this->security->xss_clean($this->input->post('user_email'));
					$userName 	 = $this->security->xss_clean($this->input->post('userName'));
					$ADV_name	 	 = $this->security->xss_clean($this->input->post('ADV_name'));
					$ADV_title	 	 = $this->security->xss_clean($this->input->post('ADV_title'));
					$mail_massage		 = $this->security->xss_clean($this->input->post('mail_massage'));
					$result = $this->adv_model->updateAdVApproval($adId,$mail_massage);
					$mailData['User_name_data'] = $userName;
					$mailData['ADV_title'] = $ADV_title;
					$mailData['ADV_name'] = $ADV_name;
					$mailData['admin_message'] = $mail_massage;
					$mailData['Site_name'] 		= SITE_NAME;
					$mailData['site_number'] 	= SITE_CUSTOMER_CARE;
					$mailData['{base_url}'] 	= $this->config->base_url();
					
					if($result){
						require_once("mailer/Email.php");
						$emailSender = new Email();
						$emailSender->SendEmail('ad_request_approval',$mailData,$user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,'You Ad Request Approval');
				
					}
				echo 1;	
				}
			   else
			   {
					redirect('admin/login', 'refresh');
			   }
			 }
			 
			 
		 public function mailtocutomer($adId)
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$request_pending = $this->adv_model->getAdvReq($adId);
					$sendata = '';
					foreach($request_pending as $req){
						$user_email = $req->email;
						$userName 	= $req->userName;
						$adId 		= $req->adId;
						$ADV_name 	= $req->adName;
						$ADV_title 	= $req->adTitle;
					}
					$sendata .='<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
							&times;</button>
							<h3 id="myModalLabel"> Mail To Customer </h3>
							</div>
							<div class="modal-body">
							<form name="reply_mail" action="'.$this->config->base_url().'admin/adv_manage/mailtocutomerprocess" method="post" id="reply_mail" onsubmit="return false;">
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
									<textarea name="mail_massage" class="span12"></textarea>
									<input type="hidden" name="adId" value="'.$adId.'"/>
									<input type="hidden" name="user_email" value="'.$user_email.'"/>
									<input type="hidden" name="userName" value="'.$userName.'"/>
									<input type="hidden" name="ADV_name" value="'.$ADV_name.'"/>
									<input type="hidden" name="ADV_title" value="'.$ADV_title.'"/>
									</div>
									</div>
									</div>
							</div>
							<div class="modal-footer">
								 <div class="pull-right">
									<input type="submit" class="btn btn-info" value="Reply To User" onclick="submitMailMessage(this);">
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
					
					
					$adId  		 = $this->security->xss_clean($this->input->post('adId'));
					$user_email 	 = $this->security->xss_clean($this->input->post('user_email'));
					$userName 	 = $this->security->xss_clean($this->input->post('userName'));
					$ADV_name	 	 = $this->security->xss_clean($this->input->post('ADV_name'));
					$ADV_title	 	 = $this->security->xss_clean($this->input->post('ADV_title'));
					$mail_massage	 = $this->security->xss_clean($this->input->post('mail_massage'));
					$subject_mail	 = $this->security->xss_clean($this->input->post('subject_mail'));
					$result 		 = $this->adv_model->updateAdvReply($adId,$mail_massage);
					
					
					$mailData['User_name_data'] = $userName;
					$mailData['ADV_title'] = $ADV_title;
					$mailData['ADV_name'] = $ADV_name;
					$mailData['admin_message'] = $mail_massage;
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
		 public function adclicklimit()
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$data['setting'] = $this->adv_model->getAdvClickLimit();
					$data['cmm_setting'] = $this->adv_model->getcommissionSetting();
					$this->load->view('admin/home_header',$data);
					$this->load->view('admin/adv/ad_click');
					$this->load->view('admin/home_footer');
				}
			   else
			   {
					redirect('admin/login', 'refresh');
			   }
			 }
			 
			 
		 public function saveclicksetting ()
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$result  = $this->adv_model->saveSetting();
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

			 public function savecommisionsetting ()
			 {
			  if($this->session->userdata('logged_in'))
				{
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$result  = $this->adv_model->saveCommisonSetting();
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

		// by raj
		
		public function adminadstatus($adId,$currentStatus)
			 {
			  if($this->session->userdata('logged_in'))
				{
					
					$result = $this->adv_model->adminStatusAD($adId,$currentStatus);
					echo $result;
				}
			   else
			   {
				    redirect('home', 'refresh');
			   }
			 } 
			 
			 public function admindeleteadv($adId)
			 {
			  if($this->session->userdata('logged_in'))
				{
					$result = $this->adv_model->adminDeleteAD($adId);
					redirect('admin/manage_advertiser');
					
				}
			   else
			   {
				    redirect('home', 'refresh');
			   }
			 } 
		// end by raj
                //create by sarvesh
                public function lead_alert() {
                    if($this->session->userdata('logged_in'))
				{
					$user_data = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$data['cmm_setting'] = $this->adv_model->getLeadalertSetting();
					$this->load->view('admin/home_header',$data);
					$this->load->view('admin/adv/lead_alert');
					$this->load->view('admin/home_footer');
				}
			   else
			   {
					redirect('admin/login', 'refresh');
			   }
                    
                }  
                public function saveLeadAlert() {
                   if($this->session->userdata('logged_in'))
				{
					$user_data = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
                                        $data_radio['lead_alert'] = $this->security->xss_clean($this->input->post('enable'));
                                        $this->adv_model->getLeadalertupdate($data_radio);
                                        $data['cmm_setting'] = $this->adv_model->getLeadalertSetting();
					$this->load->view('admin/home_header',$data);
					$this->load->view('admin/adv/lead_alert');
					$this->load->view('admin/home_footer');
				}
			   else
			   {
					redirect('admin/login', 'refresh');
			   }
                   
                    
                }
		// end by sarvesh			 
}
?>