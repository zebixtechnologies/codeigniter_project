<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class dashboard extends CI_Controller {

		 function __construct()
		 {
		   parent::__construct();
		   $this->load->model('adv_loginuser/adv_operation_model');
		   
			$this->load->helper('form');
		 }

		public function index()
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
				$current_user = $user_data['user_id'];
                                //$this->adv_operation_model->getUserBidPriceWithCategory($current_user);
                                //$data["bidpriceWithCat"] = $this->adv_operation_model->getUserBidPriceWithCategory($current_user);
                                $data["topBids"] = $this->adv_operation_model->getTopBidsByCategory($current_user);                              
                                $data["userCategories"] = $this->adv_operation_model->getUserBidPriceWithCategory($current_user);
//                                print_r($data["userCategories"]);
 				$data['forminfo'] = $this->adv_operation_model->formIcon($current_user);
				$data['ads']= $this->adv_operation_model->getActiveAds($current_user);
				$data['amount'] =$this->adv_operation_model->getCurrentBalance($current_user);
                                $data['thirdpartyurl'] =$this->adv_operation_model->getThirdPartyLink($current_user);
                              
				$this->load->view('adv_loginuser/home_header',$data);
				$this->load->view('adv_loginuser/dashboard_view');
				$this->load->view('adv_loginuser/home_footer');
			}
		   else
		   {
		     //If no session, redirect to login page
                     //print_r( $this->session->all_userdata());
		    redirect('home', 'refresh');
		   }
		  
		 }
 


		
		 public function profileinfo(){
			if($this->session->userdata('user_logged_in'))
				{
				
					if($this->session->flashdata('user_message'))
					{
						$data['msg'] = 	$this->session->flashdata('user_message');
						
					}else{
						$data['msg'] ='';
					}
					$user_data 					= $this->session->userdata('user_logged_in');
					$current_user 				= $user_data['user_id'];
					$data['user'] 				= $user_data;
					$data['userinfo']			= $this->adv_operation_model->getuseInfo($current_user);
					
					$this->load->view('adv_loginuser/home_header',$data);
					$this->load->view('adv_loginuser/profileinfo_view');
					$this->load->view('adv_loginuser/home_footer');
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
				
				$result = $this->adv_operation_model->updateProfileInfo($current_user);
				if($result ==1){
					$info = $this->adv_operation_model->getuseInfo($current_user);
								foreach($info as $ref){
									$userName = $ref->userName;
									$password = $ref->password;
									$user_email = $ref->email;
									}
							
						$mailData['User_name_data'] = $userName;
						$mailData['user_password'] 	= $password;
						$mailData['admin_message'] = '';
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
		
		public	function updateAdvInfo()
		{
			if($this->session->userdata('user_logged_in'))
			{			
				
				$user_data = $this->session->userdata('user_logged_in');
				$current_user = $user_data['user_id'];
				
				$result = $this->adv_operation_model->updateProfileadv($current_user);
				
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
				$this->adv_operation_model->userProfileImg($imageNAme,$userId);
				echo json_encode($file_info);
	        }
			
	    }
	
		 public function adinfo()
			{
				if($this->session->userdata('user_logged_in'))
				{	
					$user_data = $this->session->userdata('user_logged_in');
					$data['user'] = $user_data;
					$userId = $user_data['user_id'];
					$data['ads'] = $this->adv_operation_model->getAds($userId);
					$this->load->view('adv_loginuser/home_header',$data);
					$this->load->view('adv_loginuser/manage_ads/adv_manage_view');
					$this->load->view('adv_loginuser/home_footer');
				}else{
					redirect('home', 'refresh');
				}
			
			}
		
		public function adv($advid)
			{
				if($this->session->userdata('user_logged_in'))
				{
					
					$user_data = $this->session->userdata('user_logged_in');
					$data['user'] = $user_data;
					$userId = $user_data['user_id'];
					$orgAdId = $advid-  159753;
					
					$data['category'] = $this->adv_operation_model->getCategory();
					$data['states'] = $this->adv_operation_model->getStates();
					$advInfo = $this->adv_operation_model->getadvinfo($orgAdId,$userId);
					if(empty($advInfo)){
					//	redirect('home','refresh');
					}
					$data['adinfo'] =$advInfo;
					
					$this->load->view('adv_loginuser/home_header',$data);
					$this->load->view('adv_loginuser/manage_ads/adv_info_view');
					$this->load->view('adv_loginuser/home_footer');
				}else{
					redirect('home', 'refresh');
				}
			
			}
			
			
			
		 public function saveAdvInfo()
			{
			  if($this->session->userdata('user_logged_in'))
				{
					$user_data 		 = $this->session->userdata('user_logged_in');
					$data['user'] 	 = $user_data;
					$userId 		 = $user_data['user_id'];
					$result 		 = $this->adv_operation_model->updateAdvData($userId);
					echo $result;
				}else
				   {
					redirect('home', 'refresh');
				   }
			 }

		 public function saveCropImage()
			 {
			  if($this->session->userdata('user_logged_in'))
				{
					$user_data 		 = $this->session->userdata('user_logged_in');
					$data['user'] 	 = $user_data;
					$result = $this->adv_operation_model->updateImageSize();
					if($result){
						echo json_encode($result);
					}else{
						echo 0;
					}
				}
			   else
			   {
				    redirect('home', 'refresh');
			   }
			 }
	 
			public function ad_upload($adId,$Field,$userId) // $field 1 for banner //2 for banner background
				{
					$this->load->library('upload');	
					$image_upload_folder 		= FCPATH . '\assets\uploads\banners';
					$image_upload_folder_small  = FCPATH . '\assets\uploads\banners\small';
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
						$imageNAme = 'assets/uploads/banners/'.$file_info['file_name'];
						$small_img_path = 'assets/uploads/banners/small/'.$file_info['file_name'];
						include("includes/Resizeimagecls.php");
						$resizeObj = new Resizeimagecls($imageNAme);
						$resizeObj -> resizeImage(20,20,'crop');
						$resizeObj -> saveImage($small_img_path,100);
						$resizeObj = new Resizeimagecls($imageNAme);
						$resizeObj -> resizeImage(1000,120,'crop');
						$resizeObj -> saveImage($imageNAme,100);
						$this->adv_operation_model->updateBannerImage($imageNAme,$small_img_path,$adId,$Field,$userId);
						echo json_encode($file_info);
					}
				}
		
		 public function resizing($adID,$imageSrc,$field)
				 {
				  if($this->session->userdata('user_logged_in'))
					{
						$user_data 		 = $this->session->userdata('user_logged_in');
						$data['user'] 	 = $user_data;
						$imageSrc = str_replace('-','/',$imageSrc);
						$imageSrc = str_replace('%3A',':',$imageSrc);
						$sendata = '';
						
						$sendata .='<form name="cropImage" action="'.$this->config->base_url().'adv_loginuser/dashboard/saveCropImage" method="post" id="cropImage" onsubmit="return checkCoords();" >
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
								&times;</button>
								<h3 id="myModalLabel">Resize AD Image</h3>
								</div>
								<div class="modal-body">
								
								<div class="row-fluid">
										<div class="control-group">
										<label class="control-label" for="task">Hello '.$user_data['user_name'] .' ,<br/>
											<strong>Here you can change image dimensions  Its replace your original image....</strong>
										</label>
										
										<div class="controls">
										<img src="'.$imageSrc.'" id="cropbox" />
										<input type="hidden" id="x" name="x" />
										<input type="hidden" id="y" name="y" />
										<input type="hidden" id="field" name="field" value="'.$field.'"/>
										<input type="hidden" id="adID" name="adID" value="'.$adID.'"/>
										<input type="hidden" id="imageSrc" name="imageSrc" value="'.$imageSrc.'"/>
										<input type="hidden" id="w" name="w" />
										<input type="hidden" id="h" name="h" />
										</div>
										</div>
										</div>
								
								</div>
								
								<div class="modal-footer">
									<div class="row-fluid">
									<div class="pull-right">
										<input type="submit" class="btn btn-info" value="Crop Image">
										<input type="button" class="btn btn-warning" value="Cancel" onclick="closeBox()">
									</div>
								</div>
								</form>
								</div>';
								echo $sendata;
					}
				   else
				   {
						redirect('home', 'refresh');
				   }
				 }
		
		
		public function addadv()
			{
				if($this->session->userdata('user_logged_in'))
				{
					
					$user_data = $this->session->userdata('user_logged_in');
					$data['user'] = $user_data;
					$userId = $user_data['user_id'];
					
					$data['states'] = $this->adv_operation_model->getStates();
					$data['formIcon'] = $this->adv_operation_model->formIcon($userId);
					$data['category'] = $this->adv_operation_model->getCategory();
					
					
					$this->load->view('adv_loginuser/home_header',$data);
					$this->load->view('adv_loginuser/manage_ads/add_adv_view');
					$this->load->view('adv_loginuser/home_footer');
				}else{
					redirect('home', 'refresh');
				}
			
			}

		public function newad_upload($Field,$userId) // $field 1 for banner //2 for banner background
				{
					$this->load->library('upload');	
					$image_upload_folder 		= FCPATH . '\assets\uploads\banners';
					$image_upload_folder_small  = FCPATH . '\assets\uploads\banners\small';
					
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
						
						$imageNAme = 'assets/uploads/banners/'.$file_info['file_name'];
						$small_img_path = 'assets/uploads/banners/small/'.$file_info['file_name'];
						include("includes/Resizeimagecls.php");
						$resizeObj = new Resizeimagecls($imageNAme);
						$resizeObj -> resizeImage(20,20,'crop');
						$resizeObj -> saveImage($small_img_path,100);
						$resizeObj = new Resizeimagecls($imageNAme);
						$resizeObj -> resizeImage(1000,120,'crop');
						$resizeObj -> saveImage($imageNAme,100);
						echo json_encode($file_info);
					}
				}
				
				public function newadIcon_upload($userId) // $field 1 for banner //2 for banner background
				{
					$this->load->library('upload');	
					$image_upload_folder 		= FCPATH . '\assets\uploads\adicon';
					
					
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
						$imageNAme = 'assets/uploads/adicon/'.$file_info['file_name'];
						
						include("includes/Resizeimagecls.php");
						$resizeObj = new Resizeimagecls($imageNAme);
						$resizeObj -> resizeImage(200,150,'crop');
						$resizeObj -> saveImage($imageNAme,100);
						echo json_encode($file_info);
					}
				}

					
		 public function savenewadd()
			 {
			  if($this->session->userdata('user_logged_in'))
				{
					$user_data 		 = $this->session->userdata('user_logged_in');
					$data['user'] 	 = $user_data;
					$userId = $user_data['user_id'];
					$result = $this->adv_operation_model->insertNewAD($userId);
					echo $result;
				}
			   else
			   {
				    redirect('home', 'refresh');
			   }
			 }
			 
			public function deleteadv($adId)
			 {
			  if($this->session->userdata('user_logged_in'))
				{
					$user_data 		 = $this->session->userdata('user_logged_in');
					$data['user'] 	 = $user_data;
					$userId = $user_data['user_id'];
					$result = $this->adv_operation_model->deleteAD($adId,$userId);
					echo $result;
				}
			   else
			   {
				    redirect('home', 'refresh');
			   }
			 } 
		
		// by raj
		
		public function changeadstatus($adId,$currentStatus)
			 {
			  if($this->session->userdata('user_logged_in'))
				{
					$user_data 		 = $this->session->userdata('user_logged_in');
					$data['user'] 	 = $user_data;
					$userId = $user_data['user_id'];
					$result = $this->adv_operation_model->statusAD($adId,$userId,$currentStatus);
					echo $result;
				}
			   else
			   {
				    redirect('home', 'refresh');
			   }
			 } 
		//end by raj
		
		
			public function icon_upload($userId) // $field 1 for banner //2 for banner background
				{
					$this->load->library('upload');	
					$image_upload_folder 		= FCPATH . '\assets\uploads\advertiser\icon';
					
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
						$imageNAme = 'assets/uploads/advertiser/icon/'.$file_info['file_name'];
						include("includes/Resizeimagecls.php");
						$resizeObj = new Resizeimagecls($imageNAme);
						$resizeObj -> resizeImage(ADVER_LOGO_WIDTH,ADVER_LOGO_HEIGHT,'crop');
						$resizeObj -> saveImage($imageNAme,100);
						$this->adv_operation_model->saveAdverIcon($userId,$imageNAme);
						echo json_encode($file_info);
					}
				}
					
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
                                                                //echo $state;

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
                                                            $data['records_info']		= $this->adv_operation_model->getleadrecords($current_user,$adId,$state,$start,$end);
                                                            
							// end get method if
							}else{
                                                            /*if(isset($_GET['datepicker_from'])){
                                                                $data['records_info']		= $this->adv_operation_model->getleadrecords($current_user);
                                                            }*/
							}
                                                        //print_r($data['records_info']);
                                                        $data["todaysLead"] = $this->adv_operation_model->getTodaysLeads($current_user);
							//$data['activeads']		= $this->adv_operation_model->getUserActiveAds($current_user);
							$data['userCategories']		= $this->adv_operation_model->getusercategory($current_user);
							$data['getStates']		= $this->adv_operation_model->getStates();
							$this->load->view('adv_loginuser/home_header',$data);
							$this->load->view('adv_loginuser/report_view');
							$this->load->view('adv_loginuser/home_footer');
						}
						else
						{
							redirect('home', 'refresh');
						}
	
	}
	
	public function leadsinfo($adId=null){
		if($this->session->userdata('user_logged_in'))
			{
				$user_data = $this->session->userdata('user_logged_in');
				$current_user = $user_data['user_id'];
				$data['user'] = $user_data;
				if(is_null($adId)){
					redirect('adv_loginuser/dashboard/report', 'refresh');
				}else{
					$data['leadsinfo'] = $this->adv_operation_model->getleadsinfo($current_user,$adId);		
					$this->load->view('adv_loginuser/home_header',$data);
					$this->load->view('adv_loginuser/leadsInfo_view');
					$this->load->view('adv_loginuser/home_footer');				
				}
			}else{
					redirect('home','refresh');
				}
	}
	
	 public function formInfo($emailId)
	 
		 {
		  if($this->session->userdata('logged_in'))
			{
				$user_data 		 = $this->session->userdata('logged_in');
				$current_user	=	$user_data['user_id'];
				$data['user'] 	 = $user_data;
				$leadsin = $this->adv_operation_model->getleads($emailId);
				//print_r($leadsin);
				$sendata = '';
				$sendata .='<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
						&times;</button>
						<h3 id="myModalLabel"> User Information </h3>
						</div>
						<div class="modal-body">
						
						<div class="widget-content table-container">
			
						<div class="row-fluid">
						<table id="adv_listings" class="table table-striped">';
				foreach($leadsin as $info){
							if($info->singleText_label !='' && !is_null($info->singleText_label)){
								$label	=	explode('!&#',$info->singleText_label);
								$filleData	=	explode('!&#',$info->singleText);
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}
							if($info->number_label !='' && !is_null($info->number_label)){
								$label	=	explode('!&#',$info->number_label);
								$filleData	=	explode('!&#',$info->number);
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}
						if($info->paragraph_label !='' && !is_null($info->paragraph_label)){
								$label	=	explode('!&#',$info->paragraph_label);
								$filleData	=	explode('!&#',$info->paragraph);
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}
						if($info->checkbox_label !='' && !is_null($info->checkbox_label)){
								$label	=	explode('!&#',$info->checkbox_label);
								$filleData	=	explode('!&#',$info->checkbox);
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}	

					if($info->multipleChoice_label !='' && !is_null($info->multipleChoice_label)){
								$label	=	explode('!&#',$info->multipleChoice_label);
								$filleData	=	explode('!&#',$info->multipleChoice);
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}	
				if($info->dropDown !='' && !is_null($info->dropDown)){
								$label	=	explode('!&#',$info->dropDown);
								$filleData	=	explode('!&#',$info->dropDown);
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
					}
			if($info->name_label !='' && !is_null($info->name_label)){ 
								$label	=	explode('!&#',$info->name_label);
								$filleData	=	explode('!&#',$info->name);
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}	
			if($info->date_label !='' && !is_null($info->date_label)){
								$label	=	explode('!&#',$info->date_label);
								$filleData	=	explode('!&#',$info->date_);
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}
		if($info->time_label !='' && !is_null($info->time_label)){
								$label	=	explode('!&#',$info->time_label);
								$filleData	=	explode('!&#',$info->time_ );
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}	
		
		if($info->phone_label !='' && !is_null($info->phone_label)){
								$label	=	explode('!&#',$info->phone_label);
								$filleData	=	explode('!&#',$info->phone );
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}	
	if($info->address_label !='' && !is_null($info->address_label)){
								$label	=	explode('!&#',$info->address_label);
								$filleData	=	explode('!&#',$info->address );
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}	

	if($info->website !='' && !is_null($info->website)){
								$label	=	explode('!&#',$info->address_label);
								$filleData	=	explode('!&#',$info->website );
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}	
	
	if($info->price_label !='' && !is_null($info->price_label)){
								$label	=	explode('!&#',$info->price_label);
								$filleData	=	explode('!&#',$info->price );
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}	
	
	if($info->email_label !='' && !is_null($info->email_label)){
								$label	=	explode('!&#',$info->email_label);
								$filleData	=	explode('!&#',$info->email );
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}	

	if($info->section_label !='' && !is_null($info->section_label)){
								$label	=	explode('!&#',$info->email_label);
								$filleData	=	explode('!&#',$info->section );
								for($k=0;$k<count($label);$k++){
										$sendata .= 
											'<tr>
												<th>'.$label[$k].'</th>
												<td>'.$filleData[$k].'</td>
											</tr>';
											
								}
								
							
							}	
					
					
					}
				
							
						
				$sendata .='</table>
						</div>
						</div>
						</div>
						<div class="modal-footer">
							<div class="row-fluid">
							<div class="pull-right">
								<input type="button" class="btn btn-warning" value="Cancel" onclick ="closeMe();">
							</div>
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


		public function purchaselead(){
			
		if($this->session->userdata('user_logged_in'))
			{
				$user_data 					= $this->session->userdata('user_logged_in');
				$current_user 				= $user_data['user_id'];
				$data['user'] 				= $user_data;
				
				
					// $data['leadsinfo'] = $this->adv_operation_model->getleadsinfo($current_user,$adId);		
					$data['usercategories']=$this->adv_operation_model->getUserActiveCategory($current_user);
                                        //print_r($data['usercategories']);
					//$data['usercategories']=$this->adv_operation_model->getusercategory($current_user);
					//print_r($data['usercategories']);
					$data['states']= $this->adv_operation_model->getStates();
					$this->load->view('adv_loginuser/home_header',$data);
					$this->load->view('adv_loginuser/earnlead');
					$this->load->view('adv_loginuser/home_footer');				
				
			}else{
                            redirect('home','refresh');
                        }
	}
           public function Exportoldleads(){
		if($this->session->userdata('user_logged_in')){
                    $user_data = $this->session->userdata('user_logged_in');
                    $current_user = $user_data['user_id'];
                    $current_user_name = $user_data['user_name'];
                    $data['user'] = $user_data;
                    $filename = 'Keyverticals_'. $current_user_name .'_'.rand() .".xls";
                    $filepath =  "downloads/";
                   // print_r($data);
                    
                   $val= $this->input->post('lasthistory');
                   $adId= $this->input->post('advertise');
                   $state= $this->input->post('state');
                   $datepicker_from= $this->input->post('datepicker_from');
                   $datepicker_to=$this->input->post('datepicker_to');
                  

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
                    if($datepicker_from!='' && $datepicker_from !=null){
                        $start	=	strtotime($datepicker_from . " midnight");
                        $end = $datepicker_to !='' && $datepicker_to !=null ? strtotime($datepicker_to . " midnight") + 86400 : 0;
                    }
                
                    $response = $this->adv_operation_model->getoldleadrecords($current_user,$adId,$state,$start,$end);
                     // echo $response;
                    if(is_array($response)){
                        $excel = self::saveLeadsAsExcel($response);
                        header('Content-Type: application/vnd.ms-excel'); //mime type
                        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                        header('Cache-Control: max-age=0'); //no cache
                        try{
                            $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
                            //$objWriter->save('php://output');
                            $objWriter->save($filepath . $filename);
                            echo base_url(). $filepath . $filename;
                        }  catch (Exception $e){
                            print_r($e);
                        }
                        //print_r($excel);
                    }else{
                        echo $response;
                    }
                }else{
                    //redirect('home','refresh');
                }
                
	}
     
        public function Exportleads(){
           //echo "hi";
		if($this->session->userdata('user_logged_in')){
                    $user_data = $this->session->userdata('user_logged_in');
                    $current_user = $user_data['user_id'];
                    $current_user_name = $user_data['user_name'];
                    $data['user'] = $user_data;
                    $filename = 'Keyverticals_'. $current_user_name .'_'.rand() .".xls";
                    $filepath =  "downloads/";
                    
                    //$data["response"] = "xx";
                    $response = $this->adv_operation_model->getTodaysLeads($current_user);	
                    if(is_array($response)){
                        $excel = self::saveLeadsAsExcel($response);
                        header('Content-Type: application/vnd.ms-excel'); //mime type
                        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                        header('Cache-Control: max-age=0'); //no cache
                        try{
                            $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
                            //$objWriter->save('php://output');
                            $objWriter->save($filepath . $filename);
                            echo base_url(). $filepath . $filename;
                        }  catch (Exception $e){
                            print_r($e);
                        }
                        //print_r($excel);
                    }else{
                        echo $response;
                    }
                }else{
                    //redirect('home','refresh');
                }
	}
      
	
	public function getpurchaseleads(){
		if($this->session->userdata('user_logged_in')){
                    $user_data = $this->session->userdata('user_logged_in');
                    $current_user = $user_data['user_id'];
                    $current_user_name = $user_data['user_name'];
                    $data['user'] = $user_data;
                    $filename = 'Keyverticals_'. $current_user_name .'_'.rand() .".xls";
                    $filepath =  "downloads/";
                    
                    //$data["response"] = "xx";
                    $response = $this->adv_operation_model->getpurchase($current_user);	
                    if(is_array($response)){
                        $excel = self::saveLeadsAsExcel($response);
                        header('Content-Type: application/vnd.ms-excel'); //mime type
                        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                        header('Cache-Control: max-age=0'); //no cache
                        try{
                            $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
                            //$objWriter->save('php://output');
                            $objWriter->save($filepath . $filename);
                            echo base_url(). $filepath . $filename;
                        }  catch (Exception $e){
                            print_r($e);
                        }
                        //print_r($excel);
                    }else{
                        echo $response;
                    }
                }else{
                    //redirect('home','refresh');
                }
	}
        private function setExcelColumns($excel,$catId){
             
        
            switch ($catId){
                case HOME_INSURANCE:
                    $excel->getActiveSheet()->setCellValue("A1","Name");
//                    $excel->getActiveSheet()->setCellValue("B1","Marital Status");
                    $excel->getActiveSheet()->setCellValue("B1","Email");
                    $excel->getActiveSheet()->setCellValue("C1","Phone Number");
//                    $excel->getActiveSheet()->setCellValue("E1","Employment");
                    $excel->getActiveSheet()->setCellValue("D1","Street Address");
                    $excel->getActiveSheet()->setCellValue("E1","State of Residence");
                    //$excel->getActiveSheet()->setCellValue("H1","Zipcode");
                    $excel->getActiveSheet()->setCellValue("F1","property type");
                    $excel->getActiveSheet()->setCellValue("G1","Number of Rooms");
                    $excel->getActiveSheet()->setCellValue("H1","Insurance Type");
                    $excel->getActiveSheet()->setCellValue("I1","Cost of Home (?)");
                break;
                case AUTO_INSURANCE:
                    // vehical Info
                    
                    //set title
                    $excel->getActiveSheet()->setCellValue("A1","Vehical Info.");
                    $excel->getActiveSheet()->mergeCells('A1:D1');
                    $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    //set info
                    $excel->getActiveSheet()->setCellValue("A2","Vehicle Year");
                    $excel->getActiveSheet()->setCellValue("B2","Vehicle Make");
                    $excel->getActiveSheet()->setCellValue("C2","Vehicle Model");
                    $excel->getActiveSheet()->setCellValue("D2","Cost of Home (?)");
                    /*$excel->getActiveSheet()->setCellValue("D2","Vehicle Series");
                    $excel->getActiveSheet()->setCellValue("E2","Ownership");
                    $excel->getActiveSheet()->setCellValue("F2","Night Parking");
                    $excel->getActiveSheet()->setCellValue("G2","Primary Use");
                    $excel->getActiveSheet()->setCellValue("H2","Annual Mileage");*/
                    // leave i
                    // 
                    //driver info
                    //set title
                    $excel->getActiveSheet()->setCellValue("E1","Driver Info.");
                    $excel->getActiveSheet()->mergeCells('E1:J1');
                    $this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    //set info
//                    $excel->getActiveSheet()->setCellValue("E2","First Name");
//                    $excel->getActiveSheet()->setCellValue("F2","Last Name");
                     $excel->getActiveSheet()->setCellValue("E2","Full Name");
                    $excel->getActiveSheet()->setCellValue("G2","Gender");
                    $excel->getActiveSheet()->setCellValue("H2","Date of Birth");
//                    $excel->getActiveSheet()->setCellValue("I2","Marital Status");
                   // $excel->getActiveSheet()->setCellValue("J2","Education");
                   // $excel->getActiveSheet()->setCellValue("K2","Home ownership");
                    $excel->getActiveSheet()->setCellValue("I2","Occupation");
//                    $excel->getActiveSheet()->setCellValue("K2","License Status");
//                    $excel->getActiveSheet()->setCellValue("L2","Any accidents in the past 3 years?");
                    // leave T
                    
                    // set user info
                    
                    //set title
                    $excel->getActiveSheet()->setCellValue("L1","User Info.");
                    $excel->getActiveSheet()->mergeCells('L1:P1');
                    $this->excel->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    // set info
//                    $excel->getActiveSheet()->setCellValue("M2","Have you had insurance in the past 30 days?");
//                    $excel->getActiveSheet()->setCellValue("N2","Current Insurance Company");
                    $excel->getActiveSheet()->setCellValue("L2","Telephone");
                    $excel->getActiveSheet()->setCellValue("M2","Email");
                    $excel->getActiveSheet()->setCellValue("N2","State");
                    $excel->getActiveSheet()->setCellValue("O2","Street Address");
                    
                break;
                case LIFE_INSURANCE:
                    $excel->getActiveSheet()->setCellValue("A1","Name");
                    $excel->getActiveSheet()->setCellValue("B1","Email");
                    $excel->getActiveSheet()->setCellValue("C1","Phone");
                    $excel->getActiveSheet()->setCellValue("D1","Gender");
                    $excel->getActiveSheet()->setCellValue("E1","Date Of Birth");
                    $excel->getActiveSheet()->setCellValue("F1","State of residence");
                    $excel->getActiveSheet()->setCellValue("G1","Coverage amount");
                    $excel->getActiveSheet()->setCellValue("H1","Term Length");
                    $excel->getActiveSheet()->setCellValue("I1","Tobacco / Nicotine user?");
                    $excel->getActiveSheet()->setCellValue("J1","Tell us about your Health");
                break;
                case BUSINESS_INSURANCE:
                    $excel->getActiveSheet()->setCellValue("A1","Name");
                    $excel->getActiveSheet()->setCellValue("B1","Email");
                    $excel->getActiveSheet()->setCellValue("C1","Phone");
                    $excel->getActiveSheet()->setCellValue("D1","Date Of Birth");
                    //$excel->getActiveSheet()->setCellValue("E1","Full Employees");
                   // $excel->getActiveSheet()->setCellValue("F1","Part Time Employees");
                    $excel->getActiveSheet()->setCellValue("F1","Business Insurance Type");
                    $excel->getActiveSheet()->setCellValue("G1","Business Policy");
                    $excel->getActiveSheet()->setCellValue("H1","Business Address");
                break;
                case TRAVEL_INSURANCE:
                    $excel->getActiveSheet()->setCellValue("A1","Name");
                    $excel->getActiveSheet()->setCellValue("B1","Email");
                    $excel->getActiveSheet()->setCellValue("C1","Phone");
                    $excel->getActiveSheet()->setCellValue("D1","Date Of Birth");
                    $excel->getActiveSheet()->setCellValue("E1","Travel Location");
                    $excel->getActiveSheet()->setCellValue("F1","Policy Start Date");
                    $excel->getActiveSheet()->setCellValue("G1","Policy Duration");
                    $excel->getActiveSheet()->setCellValue("H1","Policy Type");
                    $excel->getActiveSheet()->setCellValue("I1","Cover High-value Specified Items Such As Laptops And Digital Cameras?");
                    $excel->getActiveSheet()->setCellValue("J1","How many persons require this cover?");
                   // $excel->getActiveSheet()->setCellValue("J1","Cover High-value Specified Items Such As Laptops And Digital Cameras?");
                break;
                case Education_INSURANCE:
                    $excel->getActiveSheet()->setCellValue("A1","Name");
                    $excel->getActiveSheet()->setCellValue("B1","Email");
                    $excel->getActiveSheet()->setCellValue("C1","Phone");
                    $excel->getActiveSheet()->setCellValue("D1","Degree Level");
                    $excel->getActiveSheet()->setCellValue("E1","Program of Interest/Area of Study");
                break;
                case PAYDAY_LOAN:
                    $excel->getActiveSheet()->setCellValue("A1","Name");
                    $excel->getActiveSheet()->setCellValue("B1","Email");
                    $excel->getActiveSheet()->setCellValue("C1","Phone");
                    $excel->getActiveSheet()->setCellValue("D1","Date Of Birth");
                    $excel->getActiveSheet()->setCellValue("E1","Loan Amount");
                    $excel->getActiveSheet()->setCellValue("F1","State Of Residence");
                    $excel->getActiveSheet()->setCellValue("G1","Best Contact Time");
                    $excel->getActiveSheet()->setCellValue("H1","Street Address");
                    $excel->getActiveSheet()->setCellValue("I1","Income Source");
                    $excel->getActiveSheet()->setCellValue("J1","Monthly Net Income");
                    $excel->getActiveSheet()->setCellValue("K1","Employer Name");
                    $excel->getActiveSheet()->setCellValue("L1","Job Title");
                    $excel->getActiveSheet()->setCellValue("M1","Time Employed");
                   // $excel->getActiveSheet()->setCellValue("N1","Time Employed");
                break;
                case HOTELS:
                    $excel->getActiveSheet()->setCellValue("A1","Name");
                    $excel->getActiveSheet()->setCellValue("B1","Email");
                    $excel->getActiveSheet()->setCellValue("C1","Phone");
                    $excel->getActiveSheet()->setCellValue("D1","Prefered State For Hotel");
                    $excel->getActiveSheet()->setCellValue("E1","Preferred city");
                    $excel->getActiveSheet()->setCellValue("F1","Check in date");
                    $excel->getActiveSheet()->setCellValue("G1","Check out date");
                    $excel->getActiveSheet()->setCellValue("H1","Rooms");
                    $excel->getActiveSheet()->setCellValue("I1","Budget Per Room Per Night");
                    $excel->getActiveSheet()->setCellValue("J1","Need Pick Up Service?");
                    $excel->getActiveSheet()->setCellValue("K1","Pick-Up Address And Pick-up Time");
                break;
             case Health_insurance:
                    $excel->getActiveSheet()->setCellValue("A1","Name");
                    $excel->getActiveSheet()->setCellValue("B1","Email");
                    $excel->getActiveSheet()->setCellValue("C1","Phone");
                    $excel->getActiveSheet()->setCellValue("D1","How many people require Health Insurance?");
//                    $excel->getActiveSheet()->setCellValue("D1","Gender");
//                    $excel->getActiveSheet()->setCellValue("E1","Date Of Birth");
                    $excel->getActiveSheet()->setCellValue("E1","State of residence");
//                    $excel->getActiveSheet()->setCellValue("G1","Have you previously had health insurance coverage?");
                    $excel->getActiveSheet()->setCellValue("F1","Street address");
                    $excel->getActiveSheet()->setCellValue("G1","Tobacco / Nicotine user?");
                    $excel->getActiveSheet()->setCellValue("H1","Tell us about your Health");
                break;
            
            //below two cases added by ravindra
                case CAR_LOAN:
                    $excel->getActiveSheet()->setCellValue("A1","Name");
                    $excel->getActiveSheet()->setCellValue("B1","Phone");
                    $excel->getActiveSheet()->setCellValue("C1","Email");
                    $excel->getActiveSheet()->setCellValue("D1","Time At Job");
                    $excel->getActiveSheet()->setCellValue("E1","Occupation");
                    $excel->getActiveSheet()->setCellValue("F1","Monthly Income");
                    $excel->getActiveSheet()->setCellValue("G1","Birthdate");
                    $excel->getActiveSheet()->setCellValue("H1","Credit Problem");
                    $excel->getActiveSheet()->setCellValue("I1","Time at Residence");
                    $excel->getActiveSheet()->setCellValue("J1","Rent/Morgage");
                    $excel->getActiveSheet()->setCellValue("K1","I Currently");
                 break;
             
             case AUTO_QUOTES:
                    $excel->getActiveSheet()->setCellValue("A1","Vehicle Year");
                    $excel->getActiveSheet()->setCellValue("B1","Vehicle Make");
                    $excel->getActiveSheet()->setCellValue("C1","Vehicle Model");
                    $excel->getActiveSheet()->setCellValue("D1","Exterior Colour");
                    $excel->getActiveSheet()->setCellValue("E1","Interior Colour");
                    $excel->getActiveSheet()->setCellValue("F1","Buying Timeframe");
                    $excel->getActiveSheet()->setCellValue("G1","Payment Method");
                    $excel->getActiveSheet()->setCellValue("H1","Full Name");
                    $excel->getActiveSheet()->setCellValue("I1","Address");
                    $excel->getActiveSheet()->setCellValue("J1","State");
                    $excel->getActiveSheet()->setCellValue("K1","Phone NO");
                    $excel->getActiveSheet()->setCellValue("L1","Email");
                    $excel->getActiveSheet()->setCellValue("M1","Contact");
                 break;
             
             case THIRD_PARTY_ONLY:
//                    $excel->getActiveSheet()->setCellValue("A1","Vehicle Year");
//                    $excel->getActiveSheet()->setCellValue("B1","Vehicle Make");
//                    $excel->getActiveSheet()->setCellValue("C1","Vehicle Model");
                    $excel->getActiveSheet()->setCellValue("A1","First Name");
                    $excel->getActiveSheet()->setCellValue("B1","Last Name");
//                    $excel->getActiveSheet()->setCellValue("F1","Street Address");
                    $excel->getActiveSheet()->setCellValue("C1","State");
                    $excel->getActiveSheet()->setCellValue("D1","Telephone");
                    $excel->getActiveSheet()->setCellValue("E1","Email");

                 break;
            }
            
            return $excel;
        }
        private function saveLeadsAsExcel($leads){
            //load our new PHPExcel library
            $this->load->library('excel');
            $excel = new Excel();
            $leadDetails = array();
            $activeSheets = array();
            $i = 0;
            foreach($leads as $lead){
                
                //print_r($lead);
                if(!array_key_exists($lead->categoryId, $activeSheets)){
                    $activeSheets[$lead->categoryId] = $i;
                   if($i>0){
                        $excel->createSheet($i);
                    }
                     $i ++;
                }
                $activeSheet = $activeSheets[$lead->categoryId];
                
                $excel->setActiveSheetIndex($activeSheet);
                if(!array_key_exists($lead->categoryId, $leadDetails)){
                    $leadDetails[$lead->categoryId] = 0;
                    $excel->getActiveSheet()->setTitle($lead->category_name);
                    $excel = self::setExcelColumns($excel,$lead->categoryId);
                }else{
                    $leadDetails[$lead->categoryId] += 1;
                }
                $leadNumber = $leadDetails[$lead->categoryId];
                $excel = self::showLeadDetails($excel,$lead,$leadNumber);
            }
            //print_r($activeSheets);
            return $excel;
        }
         public function showLeadDetails($excel,$data,$index){
                //$data=$this->adv_model->getLeadsDetails($form_data_id);
//                print_r($data->form_data);
//                
                $leadData = simplexml_load_string($data->form_data);
                //print_r($leadData);
                if($data->categoryId == AUTO_INSURANCE){
                    $index+=3;
                    foreach ($leadData->vehicle as $veh) {
                        $excel->getActiveSheet()->setCellValue("A$index",$veh->vehicleyear);
                        $excel->getActiveSheet()->setCellValue("B$index",$veh->vehiclemake);
                        $excel->getActiveSheet()->setCellValue("C$index",$veh->vehiclemodel);
                        $excel->getActiveSheet()->setCellValue("D$index",$veh->vehiclecost);
                       /* $excel->getActiveSheet()->setCellValue("D$index",$veh->vehicleseries);
                        $excel->getActiveSheet()->setCellValue("E$index",$veh->vehicleown);
                        $excel->getActiveSheet()->setCellValue("F$index",$veh->vehiclepark);
                        $excel->getActiveSheet()->setCellValue("G$index",$veh->vehicleuse);
                        $excel->getActiveSheet()->setCellValue("H$index",$veh->vehiclemileage);*/
                    }
                    foreach ($leadData->driver as $dev) {
                          $excel->getActiveSheet()->setCellValue("E$index",$dev->fullname);
//                        $excel->getActiveSheet()->setCellValue("E$index",$dev->firstname);
//                         $excel->getActiveSheet()->setCellValue("F$index",$dev->lastname);
                        $excel->getActiveSheet()->setCellValue("G$index",$dev->gender);
                        $excel->getActiveSheet()->setCellValue("H$index",$dev->dob);
//                        $excel->getActiveSheet()->setCellValue("M$index",$veh->vehicleown);
//                        $excel->getActiveSheet()->setCellValue("I$index",$dev->marital);
                       // $excel->getActiveSheet()->setCellValue("O$index",$veh->education);
                       // $excel->getActiveSheet()->setCellValue("P$index",$veh->homeowner);
                        $excel->getActiveSheet()->setCellValue("I$index",$dev->occupation);
//                        $excel->getActiveSheet()->setCellValue("K$index",$dev->licance);
//                        $excel->getActiveSheet()->setCellValue("L$index",$dev->accidents);
                    }
//                    $excel->getActiveSheet()->setCellValue("M$index",$leadData->insured);
//                    $excel->getActiveSheet()->setCellValue("N$index",$leadData->insurer);
                    $excel->getActiveSheet()->setCellValue("L$index",$leadData->phone);
                    $excel->getActiveSheet()->setCellValue("M$index",$leadData->email);
                    $excel->getActiveSheet()->setCellValue("N$index",$leadData->zip);
                    $excel->getActiveSheet()->setCellValue("O$index",$leadData->address);
                }elseif($data->categoryId == HOME_INSURANCE){
                    $index+=2;
                    $excel->getActiveSheet()->setCellValue("A$index",$leadData->name); 
//                    $excel->getActiveSheet()->setCellValue("B$index",$leadData->marital_status);
                    $excel->getActiveSheet()->setCellValue("B$index",$leadData->email);
                    $excel->getActiveSheet()->setCellValue("C$index",$leadData->phone);
//                    $excel->getActiveSheet()->setCellValue("E$index",$leadData->employment);
                    $excel->getActiveSheet()->setCellValue("D$index",$leadData->address);
                    $excel->getActiveSheet()->setCellValue("E$index",$leadData->state);
                    $excel->getActiveSheet()->setCellValue("F$index",$leadData->property_type);
                    //$excel->getActiveSheet()->setCellValue("H$index",$leadData->zipcode);
                    $excel->getActiveSheet()->setCellValue("G$index",$leadData->number_of_rooms);
                    $excel->getActiveSheet()->setCellValue("H$index",$leadData->insurance_type);
                    $excel->getActiveSheet()->setCellValue("I$index",$leadData->cost_of_home);
                }elseif($data->categoryId == LIFE_INSURANCE){
                    $index+=2;
                    $excel->getActiveSheet()->setCellValue("A$index",$leadData->person->fullname);
                    $excel->getActiveSheet()->setCellValue("B$index",$leadData->person->email);
                    $excel->getActiveSheet()->setCellValue("C$index",$leadData->person->phone);
                    $excel->getActiveSheet()->setCellValue("D$index",$leadData->person->gender);
                    $excel->getActiveSheet()->setCellValue("E$index",$leadData->person->dateofbirth);
                    $excel->getActiveSheet()->setCellValue("F$index",$leadData->person->statename);
                    $excel->getActiveSheet()->setCellValue("G$index",$leadData->person->coverageAmount);
                    $excel->getActiveSheet()->setCellValue("H$index",$leadData->person->termlenght);
                    $excel->getActiveSheet()->setCellValue("I$index",$leadData->person->addicted);
                    $excel->getActiveSheet()->setCellValue("J$index",$leadData->person->health);
            }elseif($data->categoryId == BUSINESS_INSURANCE){
                $index+=2;
                $excel->getActiveSheet()->setCellValue("A$index",$leadData->name);
                $excel->getActiveSheet()->setCellValue("B$index",$leadData->email);
                $excel->getActiveSheet()->setCellValue("C$index",$leadData->phone);
                $excel->getActiveSheet()->setCellValue("D$index",$leadData->dateofbirth);
               // $excel->getActiveSheet()->setCellValue("E$index",$leadData->fullemployees);
                //$excel->getActiveSheet()->setCellValue("F$index",$leadData->parttimeemployees);
                $excel->getActiveSheet()->setCellValue("F$index",$leadData->businessinsurancetype);
                $excel->getActiveSheet()->setCellValue("G$index",$leadData->businesspolicy);
                $excel->getActiveSheet()->setCellValue("H$index",$leadData->businessaddress);
            }else if($data->categoryId == TRAVEL_INSURANCE){
                $index+=2;
                $excel->getActiveSheet()->setCellValue("A$index",$leadData->name);
                $excel->getActiveSheet()->setCellValue("B$index",$leadData->email);
                $excel->getActiveSheet()->setCellValue("C$index",$leadData->phone);
                $excel->getActiveSheet()->setCellValue("D$index",$leadData->dateofbirth);
                $excel->getActiveSheet()->setCellValue("E$index",$leadData->travellocation);
                $excel->getActiveSheet()->setCellValue("F$index",$leadData->travelstartdate);
                $excel->getActiveSheet()->setCellValue("G$index",$leadData->travelduration);
                $excel->getActiveSheet()->setCellValue("H$index",$leadData->policytype);
                $excel->getActiveSheet()->setCellValue("I$index",$leadData->coverhighvalueitem);
                $excel->getActiveSheet()->setCellValue("J$index",$leadData->coverperson);
            }else if($data->categoryId == Education_INSURANCE){
                $index+=2;
                $excel->getActiveSheet()->setCellValue("A$index",$leadData->name);
                $excel->getActiveSheet()->setCellValue("B$index",$leadData->email);
                $excel->getActiveSheet()->setCellValue("C$index",$leadData->phone);
                $excel->getActiveSheet()->setCellValue("D$index",$leadData->degreelevel);
                $excel->getActiveSheet()->setCellValue("E$index",$leadData->area);
            }else if($data->categoryId == PAYDAY_LOAN){
                $index+=2;
                $leadData->loanamount = str_replace("?", "₦", $leadData->loanamount);
                $leadData->netincome = str_replace("?", "₦", $leadData->netincome);
                
                $excel->getActiveSheet()->setCellValue("A$index",$leadData->fullname);
                $excel->getActiveSheet()->setCellValue("B$index",$leadData->email);
                $excel->getActiveSheet()->setCellValue("C$index",$leadData->phone);
                $excel->getActiveSheet()->setCellValue("D$index",$leadData->dob);
                $excel->getActiveSheet()->setCellValue("E$index",$leadData->loanamount);
                $excel->getActiveSheet()->setCellValue("F$index",$leadData->residence);
                $excel->getActiveSheet()->setCellValue("G$index",$leadData->contacttime);
                $excel->getActiveSheet()->setCellValue("H$index",$leadData->streetaddress);
                $excel->getActiveSheet()->setCellValue("I$index",$leadData->incomesource);
                $excel->getActiveSheet()->setCellValue("J$index",$leadData->netincome);
                $excel->getActiveSheet()->setCellValue("K$index",$leadData->employername);
                $excel->getActiveSheet()->setCellValue("L$index",$leadData->jobtitle);
                $excel->getActiveSheet()->setCellValue("M$index",$leadData->timeemployed);
            }else if($data->categoryId == HOTELS){
                $index+=2;
                $leadData->budget = str_replace("?", "₦", $leadData->budget);
                $excel->getActiveSheet()->setCellValue("A$index",$leadData->fullname);
                $excel->getActiveSheet()->setCellValue("B$index",$leadData->email);
                $excel->getActiveSheet()->setCellValue("C$index",$leadData->phone);
                $excel->getActiveSheet()->setCellValue("D$index",$leadData->preferedstate);
                $excel->getActiveSheet()->setCellValue("E$index",$leadData->city);
                $excel->getActiveSheet()->setCellValue("F$index",$leadData->checkin);
                $excel->getActiveSheet()->setCellValue("G$index",$leadData->checkout);
                $excel->getActiveSheet()->setCellValue("H$index",$leadData->rooms);
                $excel->getActiveSheet()->setCellValue("I$index",$leadData->budget);
                $excel->getActiveSheet()->setCellValue("J$index",$leadData->pickupservice);
                $excel->getActiveSheet()->setCellValue("K$index",$leadData->pickupinfo);
            }elseif($data->categoryId == Health_insurance){
                    $index+=2;
                    $excel->getActiveSheet()->setCellValue("A$index",$leadData->person->fullname);
                    $excel->getActiveSheet()->setCellValue("B$index",$leadData->person->email);
                    $excel->getActiveSheet()->setCellValue("C$index",$leadData->person->phone);
                    $excel->getActiveSheet()->setCellValue("D$index",$leadData->person->noofpeople);
//                    $excel->getActiveSheet()->setCellValue("D$index",$leadData->person->gender);
//                    $excel->getActiveSheet()->setCellValue("E$index",$leadData->person->dateofbirth);
                    $excel->getActiveSheet()->setCellValue("E$index",$leadData->person->statename);
                    $excel->getActiveSheet()->setCellValue("F$index",$leadData->person->addicted);
                    $excel->getActiveSheet()->setCellValue("G$index",$leadData->person->health);
//                    $excel->getActiveSheet()->setCellValue("G$index",$leadData->person->insured);
                    $excel->getActiveSheet()->setCellValue("H$index",$leadData->person->address);
            }elseif($data->categoryId == CAR_LOAN){
                    $index+=2;
                    $leadData->income = str_replace("?", "₦", $leadData->income);
                    $excel->getActiveSheet()->setCellValue("A$index",$leadData->empname);
                    $excel->getActiveSheet()->setCellValue("B$index",$leadData->empphone);
                    $excel->getActiveSheet()->setCellValue("C$index",$leadData->email);
                    $excel->getActiveSheet()->setCellValue("D$index",$leadData->timeatjob);
                    $excel->getActiveSheet()->setCellValue("E$index",$leadData->occupation);
                    $excel->getActiveSheet()->setCellValue("F$index",$leadData->income);
                    $excel->getActiveSheet()->setCellValue("G$index",$leadData->birthdate);
                    $excel->getActiveSheet()->setCellValue("H$index",$leadData->crdProb);
                    $excel->getActiveSheet()->setCellValue("I$index",$leadData->timeatResidence);
                    $excel->getActiveSheet()->setCellValue("J$index",$leadData->rent);
                    $excel->getActiveSheet()->setCellValue("K$index",$leadData->curr);
            }elseif($data->categoryId == AUTO_QUOTES){
                    $index+=2;
                    $excel->getActiveSheet()->setCellValue("A$index",$leadData->vyear);
                    $excel->getActiveSheet()->setCellValue("B$index",$leadData->vmake);
                    $excel->getActiveSheet()->setCellValue("C$index",$leadData->vmodel);
                    $excel->getActiveSheet()->setCellValue("D$index",$leadData->extcolour);
                    $excel->getActiveSheet()->setCellValue("E$index",$leadData->intcolour);
                    $excel->getActiveSheet()->setCellValue("F$index",$leadData->btframe);
                    $excel->getActiveSheet()->setCellValue("G$index",$leadData->paymentmethod);
                    $excel->getActiveSheet()->setCellValue("H$index",$leadData->fname);
                    $excel->getActiveSheet()->setCellValue("I$index",$leadData->address);
                    $excel->getActiveSheet()->setCellValue("J$index",$leadData->state);
                    $excel->getActiveSheet()->setCellValue("K$index",$leadData->phone);
                    $excel->getActiveSheet()->setCellValue("L$index",$leadData->email);
                    $excel->getActiveSheet()->setCellValue("M$index",$leadData->contact);
            }elseif($data->categoryId == THIRD_PARTY_ONLY){
                    $index+=2;
//                    $excel->getActiveSheet()->setCellValue("A$index",$leadData->vyear);
//                    $excel->getActiveSheet()->setCellValue("B$index",$leadData->vmake);
//                    $excel->getActiveSheet()->setCellValue("C$index",$leadData->vmodel);
                    $excel->getActiveSheet()->setCellValue("A$index",$leadData->firstname);
                    $excel->getActiveSheet()->setCellValue("B$index",$leadData->lastname);
//                    $excel->getActiveSheet()->setCellValue("F$index",$leadData->streetaddress);
                    $excel->getActiveSheet()->setCellValue("C$index",$leadData->state);
                    $excel->getActiveSheet()->setCellValue("D$index",$leadData->telephone);
                    $excel->getActiveSheet()->setCellValue("E$index",$leadData->email);
            }
            
            return $excel;
	 }
        public function purchaseLeadSearch(){
            $i = 0;
            if($this->session->userdata('user_logged_in')){
                $user_data = $this->session->userdata('user_logged_in');
                $current_user = $user_data['user_id'];
                $oldLeads = $this->adv_operation_model->getOldLeads($current_user);
                
                if(count($oldLeads) > 0){
                    foreach($oldLeads as $lead){
                        $i++;
                        echo "<tr>
                                <td>$i</td>
                                <td>($lead->category_name)</td>
                            </tr>";
                    }
                }else{
                    //echo $i;
                }
            }else{
                //echo $i;
            }
            
            /*if($this->session->userdata('user_logged_in'))
                {
                    $user_data = $this->session->userdata('user_logged_in');
                    $current_user = $user_data['user_id'];
                    $data['user'] = $user_data;
                    $data['oldLeads'] = $this->adv_operation_model->getOldLeads($current_user);
                    $data['usercategories']=$this->adv_operation_model->getusercategory($current_user);
                    //print_r($data['usercategories']);
                    $data['states']= $this->adv_operation_model->getStates();
                    $this->load->view('adv_loginuser/home_header',$data);
                    $this->load->view('adv_loginuser/earnlead');
                    $this->load->view('adv_loginuser/home_footer');
                    //$data["response"] = "xx";
                    //$data['response'] = $this->adv_operation_model->getpurchase($current_user);		
                    // $data['response'] = $this->adv_operation_model->getpurchase(26);
                    //echo $data['response'];	
                }else{
                    //redirect('home','refresh');
                }*/
        }
       
        
        public function getPurchaseLeadCount(){
            $count = 0;
            if($this->session->userdata('user_logged_in')){
                $user_data = $this->session->userdata('user_logged_in');
                $current_user = $user_data['user_id'];
                $oldLeads = $this->adv_operation_model->getOldLeads($current_user);
                $count = count($oldLeads);
            }
            echo $count;
        }
	public function category(){
            if($this->session->userdata('user_logged_in')){
                $this->load->model("pub_loginuser/pub_operation_model");
                $user_data = $this->session->userdata('user_logged_in');
                $current_user = $user_data['user_id'];
                $data['user'] = $user_data;
                $data['usercat']=$this->pub_operation_model->getUserCategories($current_user);
                $data['cat']=$this->pub_operation_model->getCategories();
                $this->load->view('adv_loginuser/home_header',$data);
                $this->load->view('adv_loginuser/category_view');
                $this->load->view('adv_loginuser/home_footer');
            }else{
                
            }
        }
        public function pauseview(){
            if($this->session->userdata('user_logged_in')){
                //$this->load->model("pub_loginuser/pub_operation_model");
                $user_data = $this->session->userdata('user_logged_in');
                $current_user = $user_data['user_id'];
                $data['user'] = $user_data;
                $data['usercat']=$this->adv_operation_model->getusercategory($current_user);
                $data['activecats'] = $this->adv_operation_model->getUserActiveCats($current_user);
               //$data['cat']=$this->pub_operation_model->getCategories();
                $this->load->view('adv_loginuser/home_header',$data);
                $this->load->view('adv_loginuser/pause_view');
                $this->load->view('adv_loginuser/home_footer');
            }else{
                
            }
        }
          public function leadsformview(){
            if($this->session->userdata('user_logged_in')){
                //$this->load->model("pub_loginuser/pub_operation_model");
                $user_data = $this->session->userdata('user_logged_in');
                $current_user = $user_data['user_id'];
               // print_r($_GET);
                //exit();
                $data['user'] = $user_data;
                if(!empty($_GET)){
                      foreach($_GET as $key => $value)
                        {
                             $data[$key]	=	$value;
                        }
                    $start = "0";
                    $end = "0";
                     if($_GET['datepicker_from'] !='' && $_GET['datepicker_from'] !=null){
                                    $start	=	strtotime($_GET['datepicker_from'] . " midnight");
                                    $end = $_GET['datepicker_to'] !='' && $_GET['datepicker_to'] !=null ? strtotime($_GET['datepicker_to'] . " midnight") + 86400 : 0;
                                }
                    $data['totalviews'] = $this->adv_operation_model->getOldviews($start,$end);
                    $data['totalleads'] = $this->adv_operation_model->gettotaloldleads($current_user,$start,$end);
                    $data['activeleadid'] = $this->adv_operation_model->getactiveleadId($current_user);
                }
                else{
                     $data['totalviews'] = $this->adv_operation_model->gettotalViews();
                     $data['totalleads'] = $this->adv_operation_model->gettotalleads($current_user);
                     //added by ravi
                     $data['activeleadid'] = $this->adv_operation_model->getactiveleadId($current_user);
                }
               
               //$data['cat']=$this->pub_operation_model->getCategories();
                $this->load->view('adv_loginuser/home_header',$data);
                $this->load->view('adv_loginuser/leads_view');
                $this->load->view('adv_loginuser/home_footer');
            }else{
                
            }
        }
        
        
        public function updatecategory(){
            if($this->session->userdata('user_logged_in')){
                //$this->load->model("pub_loginuser/pub_operation_model");
                $user_data = $this->session->userdata('user_logged_in');
                $current_user = $user_data['user_id'];
                $data['user'] = $user_data;	
                $data['usercat']=$this->adv_operation_model->updateUserCategories($current_user);
            }
            redirect('adv_loginuser/dashboard/category', 'refresh');
        }
        
         public function activecategory(){
            if($this->session->userdata('user_logged_in')){
                //$this->load->model("pub_loginuser/pub_operation_model");
                $user_data = $this->session->userdata('user_logged_in');
                $current_user = $user_data['user_id'];
                $data['user'] = $user_data;	
                $data['usercat']=$this->adv_operation_model->updateActiveCategories($current_user);
            }
            redirect('adv_loginuser/dashboard/pauseview', 'refresh');
        }
        
        public function updateBidPrice(){
            if($this->session->userdata('user_logged_in')){
                    $user_data = $this->session->userdata('user_logged_in');
                    $current_user = $user_data['user_id'];
                    $data['user'] = $user_data;
                    $returnMsg = $this->adv_operation_model->updateUserBidPrice($current_user);
                    if($returnMsg !== TRUE && strlen($returnMsg) > 0){
                        $this->session->set_flashdata('item', $returnMsg);
                    }
                    redirect('advertiser','refresh');
                }else{
                    redirect('home','refresh');
                }
        }
        
        public function thirdpartyonlyForm(){
            
             if($this->session->userdata('user_logged_in')){
                    $user_data = $this->session->userdata('user_logged_in');
                    $current_user = $user_data['user_id'];
                    $data['user'] = $user_data;
                    $returnMsg = $this->adv_operation_model->insertThirdPartyLink($current_user);
                    if($returnMsg !== TRUE && strlen($returnMsg) > 0){
                        $this->session->set_flashdata('item', $returnMsg);
                    }
                    redirect('advertiser','refresh');
                }else{
                    redirect('home','refresh');
                }
            
        }
        public  function leadquotes(){
            if($this->session->userdata('user_logged_in')){
                $user_data = $this->session->userdata('user_logged_in');
                $current_user = $user_data['user_id'];
                $data['user'] = $user_data;
                $categories = $this->adv_operation_model->getusercategory($current_user);
                if(isset($categories) && is_array($categories) && !empty($categories)){
                    foreach ($categories as $cat){
                        $arrOfQuotes = $this->adv_operation_model->getLeadQuotes($current_user,$cat->categoryId);
                        $cat->falt_rate = isset($arrOfQuotes) && !empty($arrOfQuotes) && is_object($arrOfQuotes) ? $arrOfQuotes->flat_rate : "";
                        $cat->percentage = isset($arrOfQuotes) && !empty($arrOfQuotes) && is_object($arrOfQuotes) && $arrOfQuotes->percentage> 0 ? $arrOfQuotes->percentage : "";
                        $cat->additional_info = isset($arrOfQuotes) && !empty($arrOfQuotes) && is_object($arrOfQuotes) ? $arrOfQuotes->additional_info : "";
                    }
                }
                $data['categories'] = $categories; 
                $this->load->view('adv_loginuser/home_header',$data);
                $this->load->view('adv_loginuser/lead_quotes_view');
                $this->load->view('adv_loginuser/home_footer');
            }else{
                redirect('home','refresh');
            }
        }
        public function manage_lead_quotes($catId){
            if($this->session->userdata('user_logged_in')){
                if(isset($catId) && $catId > 0){
                $user_data = $this->session->userdata('user_logged_in');
                $current_user = $user_data['user_id'];
                $data['user'] = $user_data;
                $leadQuotes = $this->adv_operation_model->getLeadQuotes($current_user,$catId);
                if($this->input->post("submit")){
                    $percentage = $this->security->xss_clean($this->input->post('percentage'));
                    $flat_rate = $this->security->xss_clean($this->input->post('flat_rate'));
                    $addition_info = $this->security->xss_clean($this->input->post('addition_info'));
                    if(isset($percentage) && strlen($percentage) > 0  && isset($flat_rate) && strlen($flat_rate) > 0 ){
                        $data['rate_error'] = "You can either use the 'Premium Rate' option or the 'flat rate' option at one time";
                    }else{
                        if(isset($percentage) && strlen($percentage) > 0 || isset($flat_rate) && strlen($flat_rate) > 0 ){
                            $percentage = isset($percentage) && strlen($percentage)>0 ? $percentage : "";
                            $flat_rate = isset($flat_rate) && strlen($flat_rate) > 0? $flat_rate : "";
                            if(isset($leadQuotes) && is_object($leadQuotes) && !empty($leadQuotes)){
                                 $arr = array(
                                        'percentage' =>$percentage,
                                        'flat_rate'=>$flat_rate,
                                        'additional_info' => $addition_info
                                    );
                                    $this->adv_operation_model->updateLeadQuotes($arr,$catId,$current_user);
                            }else{
                                $arr = array(
                                        'user_id' => $current_user,
                                        'cat_id' => $catId,
                                      'percentage' =>$percentage,
                                      'flat_rate'=>$flat_rate,
                                      'additional_info' => $addition_info
                                  );
                                  $this->adv_operation_model->insertLeadQuotes($arr);
                            }
                        }else{
//                            if(!is_numeric($percentage) || !is_numeric($flat_rate)){
//                                $data['rate_error'] = "Percentage or flat rate should be numeric";
//                            }else{
                                $data['rate_error'] = "Please fill required Fields";
//                            }
                        }
                    }
                }
                $data['leadQuotes'] = $this->adv_operation_model->getLeadQuotes($current_user,$catId);
                $categories = $this->adv_operation_model->getCategoryOfId($catId);
                $data['categories'] = $categories; 
                $this->load->view('adv_loginuser/home_header',$data);
                $this->load->view('adv_loginuser/manage_leads_quotes');
                $this->load->view('adv_loginuser/home_footer');
            }else {
                redirect('home', 'refresh');
            }
        }else{
                redirect('home','refresh');
            }
        }
}
?>
