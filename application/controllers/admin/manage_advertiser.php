<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class manage_advertiser extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('admin/advertiser/advertiser_model');
	 }

	 public function index()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['request_pending'] = $this->advertiser_model->getadvertisers();
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_advertiser/advertiser_manage_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }

	 public function user_advs($userId){
	  if($this->session->userdata('logged_in')){
                $this->load->helper('form');
                $this->load->model('adv_loginuser/adv_operation_model');
                $user_data 		 = $this->session->userdata('logged_in');
                $data['user'] 	 = $user_data;
                $data['userId']	 = $userId;
                $data['records_info'] = $this->adv_operation_model->getleadrecords($userId);
                $data['formIcon'] = $this->advertiser_model->adminformIcon($userId);
                $this->load->view('admin/home_header',$data);
                $this->load->view('admin/manage_advertiser/adv_manage_view');
                $this->load->view('admin/home_footer');
           }else{
                redirect('admin/login', 'refresh');
	   }
	 }
	 public function adv_info($advInfo)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['states'] = $this->advertiser_model->getStates();
			$data['category'] = $this->advertiser_model->getCategory();
			$data['adinfo'] = $this->advertiser_model->getadvinfo($advInfo);
			$data['forminfo'] = $this->advertiser_model->getallforms();
			$this->load->helper('form');
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_advertiser/adv_info_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	
	 public function saveAdvInfo()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$result = $this->advertiser_model->updateAdvData();
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
	 public function saveCropImage()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$result = $this->advertiser_model->updateImageSize();
			if($result){
				echo json_encode($result);
			}else{
				echo 0;
			}
		}
	   else
	   {
		    redirect('admin/login', 'refresh');
	   }
	 }
	 
	public function do_upload($adId,$Field) // 1 for banner //2 for banner background
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
				$this->advertiser_model->updateBannerImage($imageNAme,$small_img_path,$adId,$Field);
				echo json_encode($file_info);
			}
		}
		
		 public function resizing($adID,$imageSrc,$field)
		 {
		  if($this->session->userdata('logged_in'))
			{
				$user_data 		 = $this->session->userdata('logged_in');
				$data['user'] 	 = $user_data;
				$imageSrc = str_replace('-','/',$imageSrc);
				$imageSrc = str_replace('%3A',':',$imageSrc);
				$sendata = '';
				
				$sendata .='<form name="cropImage" action="'.$this->config->base_url().'admin/manage_advertiser/saveCropImage" method="post" id="cropImage" onsubmit="return checkCoords();" >
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
						&times;</button>
						<h3 id="myModalLabel">Resize AD Image</h3>
						</div>
						<div class="modal-body">
						
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task">Hello '.$user_data['user_name'] .' ,<br/>
									<strong>Here you can change image dimensions  Its replace the original image....</strong>
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
				redirect('admin/login', 'refresh');
		   }
		 }


		 public function creditaccountview($userId)
		 {
		  if($this->session->userdata('logged_in'))
			{
				$user_data 		 = $this->session->userdata('logged_in');
				$data['user'] 	 = $user_data;
				
				$sendata = '';
				
				$sendata .='<form name="creditForm" action="'.$this->config->base_url().'admin/manage_advertiser/saveCreditbalance" method="post" id="creditForm" onsubmit="return saveCreditAccountForm();" class="form-container">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
						&times;</button>
						<h3 id="myModalLabel">Manage Advertiser Account</h3>
						</div>
						<div class="modal-body">
						
						<div class="row-fluid">
								<div class="control-group">
									<label class="control-label" for="task">Hello '.ucfirst($user_data['user_name']) .' ,<br/>
										<strong>Here you can debit or credit in advertiser account...  </strong>
									</label>
									
									<div class="controls">
										<input type="hidden" id="userId" name="userId" value="'.$userId.'"/>
									</div>
							</div>
						</div>
						
					
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task"> Amount: </label>
								
								<div class="controls">
									<div class="input-append input-prepend">
                                       <span class="add-on">'.SITE_CURRENCY.'</span><input type="text" id="amount" name="amount" class="number span5 required" />
                                    </div>
									
									<input type="hidden" id="userId" name="userId" value="'.$userId.'"/>
								</div>
								</div>
								</div>
                                                                
						<div class="row-fluid">
                                                    <div class="control-group">
                                                        <label class="control-label" for="task"> Debit/Credit: </label>
                                                        <div class="controls">
                                                            <select name="option">
                                                                <option value="debit">Debit</option>
                                                                <option value="credit">Credit</option>
                                                            </select>

                                                        </div>
                                                    </div>
						</div>
						
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task"> Memo: </label>
								
								<div class="controls">
									<textarea name="memo" class="required span6" ></textarea>
									
								</div>
								</div>
								</div>
						
						</div>
						
						
						<div class="modal-footer">
							<div class="row-fluid">
							<div class="pull-right">
								<input type="submit" class="btn btn-info" value="Update Account">
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
		 
		  public function saveCreditbalance()
				 {
				  if($this->session->userdata('logged_in'))
					{
						$user_data 		 = $this->session->userdata('logged_in');
						$data['user'] 	 = $user_data;
						$result = $this->advertiser_model->updateAdverBalance();
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
	public function addnewAd($userId)
			{
				if($this->session->userdata('logged_in'))
					{
						$user_data 			 = $this->session->userdata('logged_in');
						$data['user'] 	 	 = $user_data;
						$data['userId'] 	 = $userId;
						$data['request_pending'] = $this->advertiser_model->getadvertisers();
						$data['formIcon'] = $this->advertiser_model->adminformIcon($userId);
						$data['states'] = $this->advertiser_model->getStates();
						$data['category'] = $this->advertiser_model->getCategory();
						$this->load->helper('form');
						$this->load->view('admin/home_header',$data);
						$this->load->view('admin/manage_advertiser/add_adv_view');
						$this->load->view('admin/home_footer');
					}
				else
					{
						redirect('admin/login', 'refresh');
					}
			}
	
	 public function savenewadd()
			 {
			 
			  if($this->session->userdata('logged_in'))
				{
					
					$user_data 		 = $this->session->userdata('logged_in');
					$data['user'] 	 = $user_data;
					$userId = $user_data['user_id'];
					$result = $this->advertiser_model->insertNewAD();
					echo $result;
				}
			   else
			   {
				    redirect('home', 'refresh');
			   }
			 }
           //Code By Sarvesh
           public function manage_banners() {
               if($this->session->userdata('logged_in'))
		{
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
			$data_advertiser = $this->advertiser_model->getadvertisers();
                        //print_r($data_advertiser);
                        $selectedAdvs = array();
                        $category_ids = array(AUTO_INSURANCE,HOME_INSURANCE,LIFE_INSURANCE,BUSINESS_INSURANCE,TRAVEL_INSURANCE,Health_insurance);
//                        print_r($data_advertiser);
                         foreach($data_advertiser as $advdata){
//                            $advIds[] = $advdata->categoryId;
                            $catIds = explode('-', $advdata->categoryId);
                            foreach($catIds as $catId){
                                if(in_array($catId, $category_ids)){
                                    if(!isset($selectedAdvs["'$advdata->userId'"])){
                                        $selectedAdvs["'$advdata->userId'"] = $advdata;
                                    }
                                }
                            }
                        }
                         $data["request_pending"] = $selectedAdvs;
                        //print_r($data['request_pending']);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_advertiser/manage_banners_view');
			$this->load->view('admin/home_footer');
		}
	      else
	        {
			redirect('admin/login', 'refresh');
	        }
               
           }  
           public function manage_banner_user($user_id) {
                if($this->session->userdata('logged_in'))
		{
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
                        $data_manage = $this->advertiser_model->getManageBannerCheckAdvertiserId($user_id);
                        if(is_array($data_manage)&& count($data_manage)>0){
                            $data['request_updates'] = $this->advertiser_model->getManageBannerUpdateData($user_id);
                            $data['request_pending'] = $this->advertiser_model->getManageBanner($user_id);
                            $this->load->view('admin/home_header',$data);
                            $this->load->view('admin/manage_advertiser/manage_banner_view_user');
                            $this->load->view('admin/home_footer');
                        }else{
                            $userId=array('advertiser_id'=>$user_id);
                            $this->advertiser_model->getManageBannerInsertAdvertiserId($userId);
                            $data['request_updates'] = $this->advertiser_model->getManageBannerUpdateData($user_id);
                            $data['request_pending'] = $this->advertiser_model->getManageBanner($user_id);
                            $this->load->view('admin/home_header',$data);
                            $this->load->view('admin/manage_advertiser/manage_banner_view_user');
                            $this->load->view('admin/home_footer');
                        }
                        }else
	        {
			redirect('admin/login', 'refresh');
	        }
           }
           public function upload_image($user_id) {
               if($this->session->userdata('logged_in'))
               {    
                    if($_FILES['file']['name']!=''){
                        $name = $_FILES["file"]["name"];
                        $temp=$_FILES["file"]["tmp_name"];
                        $path = $_SERVER['DOCUMENT_ROOT']."/assets/uploads/advertiser/icon/".$name;
                        //echo $path;
                        move_uploaded_file($temp, $path);
                        $logo_name = array('logo'=>$name);
                        $user_data = $this->session->userdata('logged_in');
                        $data['user'] = $user_data;
			$this->advertiser_model->getManageBannerUploadLogo($logo_name,$user_id);
                        $data['request_updates'] = $this->advertiser_model->getManageBannerUpdateData($user_id);
                        $data['request_pending'] = $this->advertiser_model->getManageBanner($user_id);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_advertiser/manage_banner_view_user');
			$this->load->view('admin/home_footer');
                  }else {
                        $user_data = $this->session->userdata('logged_in');
                        $data['user'] = $user_data;
                        $data['request_updates'] = $this->advertiser_model->getManageBannerUpdateData($user_id);
                        $data['request_pending'] = $this->advertiser_model->getManageBanner($user_id);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_advertiser/manage_banner_view_user');
			$this->load->view('admin/home_footer');
                }
         }else {
            redirect('admin/login', 'refresh');
           }
       }
       public function updateManageBannerContent($user_id) {
            if($this->session->userdata('logged_in'))
               {
                    if ($this->input->server('REQUEST_METHOD') === 'POST'){
                        $home_insurance_title = $this->input->post("pagetitle1");
                        $auto_insurance_title = $this->input->post("pagetitle2"); 
                        $life_insurance_title = $this->input->post("pagetitle3"); 
                        $business_insurance_title = $this->input->post("pagetitle4"); 
                        $travel_insurance_title = $this->input->post("pagetitle5"); 
                        $health_insurance_title = $this->input->post("pagetitle6"); 
                        $home_insurance = $this->input->post("pagedescription1");
                        $auto_insurance = $this->input->post("pagedescription2"); 
                        $life_insurance = $this->input->post("pagedescription3"); 
                        $business_insurance = $this->input->post("pagedescription4"); 
                        $travel_insurance = $this->input->post("pagedescription5"); 
                        $health_insurance = $this->input->post("pagedescription6"); 
                        $content_data = array('home_insurance'=>$home_insurance,'auto_insurance'=>$auto_insurance,'life_insurance'=>$life_insurance,'business_insurance'=>$business_insurance,'travel_insurance'=>$travel_insurance,'health_insurance'=>$health_insurance,'home_insurance_title'=>$home_insurance_title,'auto_insurance_title'=>$auto_insurance_title,'life_insurance_title'=>$life_insurance_title,'business_insurance_title'=>$business_insurance_title,'travel_insurance_title'=>$travel_insurance_title,'health_insurance_title'=>$health_insurance_title);
                        $user_data = $this->session->userdata('logged_in');
                        $data['user'] = $user_data;
                        $this->advertiser_model->getManageBannerUploadContent($content_data,$user_id);
                        $data['request_updates'] = $this->advertiser_model->getManageBannerUpdateData($user_id);
                        $data['request_pending'] = $this->advertiser_model->getManageBanner($user_id);
                        $this->load->view('admin/home_header',$data);
                        $this->load->view('admin/manage_advertiser/manage_banner_view_user');
                        $this->load->view('admin/home_footer');
                    }else {
                        $user_data = $this->session->userdata('logged_in');
                        $data['user'] = $user_data;
                        $data['request_updates'] = $this->advertiser_model->getManageBannerUpdateData($user_id);
                        $data['request_pending'] = $this->advertiser_model->getManageBanner($user_id);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_advertiser/manage_banner_view_user');
			$this->load->view('admin/home_footer');
                }
           }else {
            redirect('admin/login', 'refresh');
           }
       }
       
           //End sarvesh task
       
       //by neeta
        public function manage_form_banners() {
               if($this->session->userdata('logged_in'))
		{
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
			$data['categories'] = $this->advertiser_model->getCategoryWithBanner();
//                        print_r($categories);
                        
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_advertiser/manage_banners_form_view');
			$this->load->view('admin/home_footer');
		}
	      else
	        {
			redirect('admin/login', 'refresh');
	        }
               
        }  
        public function manage_banner_category($catId){
             if($this->session->userdata('logged_in'))
		{
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
                        $categories = $this->advertiser_model->getCategoryWithBanner($catId);
//                        print_r($categories);
                        $data['category'] = isset($categories) && is_array($categories) && !empty($categories) ?$categories[0]  : "";
                        $data['banner_sizes'] = array(AUTO_INSURANCE=>"450",PAYDAY_LOAN=>"400",HOME_INSURANCE=>"340",LIFE_INSURANCE=>"420",BUSINESS_INSURANCE=>"340",TRAVEL_INSURANCE=>"430",Education_INSURANCE=>"120",HOTELS=>"360",Health_insurance=>"350",CAR_LOAN=>"460",AUTO_QUOTES=>"490");
                        $data['widthOfBanner']= "190";
                        $this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_advertiser/manage_banners_cat_view');
			$this->load->view('admin/home_footer');
                }else
	        {
			redirect('admin/login', 'refresh');
	        }
        }
        public function upload_banner_image(){
            if($this->session->userdata('logged_in'))
               {    
                    $category_id = $this->input->post("category_id");
                    $category = $this->advertiser_model->getCategoryBanner($category_id);
                    $banner_link = $this->input->post("banner_link");
                    $error = FALSE;
                    $errorOfLink = FALSE;
                    $data['error'] =  "";
                    $data['widthOfBanner'] = $widthOfBanner = "190";
                    if(isset($_FILES['file'])){
                        if($_FILES['file']['name']!=''){ 
                            $name = $_FILES["file"]["name"];
                            $temp=$_FILES["file"]["tmp_name"];
                            $banner_sizes = $data['banner_sizes'] = array(AUTO_INSURANCE=>"450",PAYDAY_LOAN=>"400",HOME_INSURANCE=>"340",LIFE_INSURANCE=>"420",BUSINESS_INSURANCE=>"340",TRAVEL_INSURANCE=>"430",Education_INSURANCE=>"120",HOTELS=>"360",Health_insurance=>"350",CAR_LOAN=>"460",AUTO_QUOTES=>"490");
                            $path = $_SERVER['DOCUMENT_ROOT']."/assets/uploads/category/".$category_id.$name;
                            move_uploaded_file($temp, $path);
                            list($width, $height)   = getimagesize($path);

                            $heightOfBanner = isset($banner_sizes[$category_id]) && $banner_sizes[$category_id] > 0 ? $banner_sizes[$category_id] : "500";

                            if($height > $heightOfBanner){
                                $data['error'] = "Please Upload Image size of {$widthOfBanner}px * {$heightOfBanner}px";
                                $error = TRUE;
                            }else{
                                $banner_name = $category_id.$name;
                            }
                        }else{
                            $banner_name = isset($category) && is_array($category) && !empty($category) && strlen($category[0]->banner_name) >0 ? $category[0]->banner_name : "";
                        }
                    }else{
                        $banner_name = isset($category) && is_array($category) && !empty($category) && strlen($category[0]->banner_name) >0 ? $category[0]->banner_name : "";
                    }
                    if(strlen($banner_link) > 0){
                        if (filter_var($banner_link, FILTER_VALIDATE_URL) === false) {
                            $data['errorOfLink'] = "Please Enter a valid url";
                            $errorOfLink = TRUE;
                        }
                    }
//                    if($_FILES['file']['name']!=''){
                        
                        if(!$error && !$errorOfLink){
                            if(isset($category) && is_array($category) && !empty($category)){
                                $arr = array(
                                    'banner_name'=>$banner_name,
                                    'banner_link' => $banner_link
                                );
                                $this->advertiser_model->updateCatBanner($arr,$category_id);
                            }else{
                                $arr = array(
                                    'cat_id' =>$category_id,
                                    'banner_name'=>$banner_name,
                                    'banner_link' => $banner_link
                                );
                                $this->advertiser_model->insertCatBanner($arr);
                            }
                        }
                        
//                        print_r($details);
                        
                        $categories = $this->advertiser_model->getCategoryWithBanner($category_id);
//                        print_r($categories);
                        $cate = $data['category'] = isset($categories) && is_array($categories) && !empty($categories) ?$categories[0]  : "";
                        $user_data = $this->session->userdata('logged_in');
                        $data['user'] = $user_data;
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_advertiser/manage_banners_cat_view');
			$this->load->view('admin/home_footer');
//                  }else{
                      //redirect('admin/manage_advertiser/manage_form_banners','refresh');
//                  }
         }else {
            redirect('admin/login', 'refresh');
        }
        }
        public function deleteBanner($catId){
            if($this->session->userdata('logged_in'))
            { 
                if(isset($catId) && $catId >0){
                    $category = $this->advertiser_model->getCategoryBanner($catId);
                    if(isset($category) && is_array($category) && !empty($category)){
                        $arr = array(
                            'banner_name'=>"",
                            'banner_link' => ""
                        );
                        $this->advertiser_model->updateCatBanner($arr,$catId);
                    }
//                    $this->advertiser_model->deleteBannerOfCategory($catId);
                    redirect("admin/manage_advertiser/manage_form_banners");
                }
            }else {
                redirect('admin/login', 'refresh');
            }
        }
}
?>