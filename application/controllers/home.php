<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ob_start();

//session_start();
//we need to call PHP's session object to access it through CI
class home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper('cookie');
        $this->load->model('static_model');
        $this->load->model('signup_model');
        $this->load->model('business_model');
        $this->load->model('adv_loginuser/adv_operation_model');
        $this->load->model("admin/category/category_model");
    }

    public function index() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $this->load->view('include/header', $data);
        $this->load->view('home_view');
        $this->load->view('include/footer');
    }

    public function ourcompany() {

        $page_data = $this->static_model->getCMSPage(3);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
            $data['activeStatus'] = '.ourcompany';
        }
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $this->load->view('include/header', $data);
        $this->load->view('about_static');
        $this->load->view('include/footer');
    }

    public function verticalworks() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $page_data = $this->static_model->getCMSPage(4);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
            $data['activeStatus'] = '.howorks';
        }
        $this->load->view('include/header', $data);
        $this->load->view('about_static');
        $this->load->view('include/footer');
    }

    public function oureporting() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $page_data = $this->static_model->getCMSPage(1);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
            $data['activeStatus'] = '.oureporting';
        }
        $this->load->view('include/header', $data);
        $this->load->view('about_static');
        $this->load->view('include/footer');
    }

    public function datareporting() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $page_data = $this->static_model->getCMSPage(2);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
            $data['activeStatus'] = '.datareporting';
        }
        $this->load->view('include/header', $data);
        $this->load->view('about_static');
        $this->load->view('include/footer');
    }

    public function highfocused() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $page_data = $this->static_model->getCMSPage(5);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
            $data['activeStatus'] = '.focused';
        }
        $this->load->view('include/header', $data);
        $this->load->view('about_static');
        $this->load->view('include/footer');
    }

    public function terms() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $page_data = $this->static_model->getCMSPage(7);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
            $data['activeStatus'] = '.focused';
        }
        $this->load->view('include/header', $data);
        $this->load->view('blank_static_view');
        $this->load->view('include/footer');
    }

    public function privacy() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $page_data = $this->static_model->getCMSPage(8);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
            $data['activeStatus'] = '.focused';
        }
        $this->load->view('include/header', $data);
        $this->load->view('blank_static_view');
        $this->load->view('include/footer');
    }

// new work by raj

    public function publishers() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $page_data = $this->static_model->getCMSPage(10);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
            $data['activeStatus'] = '.focused';
        }
        $this->load->view('include/header', $data);
        $this->load->view('publisher_static');
        $this->load->view('include/footer');
    }

    public function advertisers() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $page_data = $this->static_model->getCMSPage(11);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
        }
        $this->load->view('include/header', $data);
        $this->load->view('advertise_static');
        $this->load->view('include/footer');
    }

    public function faq() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $page_data = $this->static_model->getCMSPage(6);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
        }
        $this->load->view('include/header', $data);
        $this->load->view('faq_static_view');
        $this->load->view('include/footer');
    }

//end of work


    public function userlogin() {
        $result = $this->signup_model->validate();
        echo $result;
    }

    public function logout() {
        $this->session->unset_userdata('user_logged_in');
        redirect('home', 'refresh');
    }

    public function contactus() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $this->load->view('include/header', $data);
        $this->load->view('contact_view');
        $this->load->view('include/footer');
    }

    // Create by sarvesh
    public function careers() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $page_data = $this->static_model->getCMSPage(12);
        foreach ($page_data as $info) {
            $data['page_name'] = $info->pagename;
            $data['page'] = $info->pagedescription;
            $data['title'] = $info->pagetitle;
            $data['meta_name'] = $info->metaname;
            $data['meta_desc'] = $info->metadescription;
        }
        $this->load->view('include/header', $data);
        $this->load->view('careers');
        $this->load->view('include/footer');
    }

    //End sarvesh task

    public function sendinquiry() {
        $fname = $this->security->xss_clean($this->input->post('fname'));
        $lname = $this->security->xss_clean($this->input->post('lname'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $comment = $this->security->xss_clean($this->input->post('comment'));

        $mailData['User_name_data'] = ADMIN_NAME; //default admin name
        $mailData['First_name'] = $fname;
        $mailData['Last_name'] = $lname;
        $mailData['cutomer_email'] = $email;
        $mailData['cutomer_phone'] = $phone;
        $mailData['cutomer_message'] = $comment;
        $mailData['Site_name'] = SITE_NAME;
        $mailData['site_number'] = SITE_CUSTOMER_CARE;
        $mailData['{base_url}'] = $this->config->base_url();

        require_once("mailer/Email.php");
        $emailSender = new Email();
        if ($email != "" && strlen($email) > 0) {
            $emailSender->SendEmail('contact_us', $mailData, CUSTOMER_SUPPORT, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, 'Customer Inquiry');
        }

        return true;
    }

    public function forgotPass() {

        $result = $this->signup_model->checkMail();
        //echo "here";
        //print_r($result);
        if ($result) {//echo "here";
            foreach ($result as $info) {
                $mailData['User_name_data'] = $info->userName; //default admin name
                $email = $info->email;
                $mailData['Site_name'] = SITE_NAME;
                $mailData['site_number'] = SITE_CUSTOMER_CARE;
                $mailData['{base_url}'] = $this->config->base_url();
                $mailData['user_password'] = $info->password;
            }
            require_once("mailer/Email.php");
            $emailSender = new Email();
            $emailSender->SendEmail('user_forget_password', $mailData, $email, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, 'Your Key Verticals Password');
            echo 1;
        } else {
            echo 0;
        }
    }

    public function formlistview($statecode = null, $search = null, $zipcode = null) {

        $result = $this->signup_model->getAllAds();
        $keep_ad_ids = array();
        foreach ($result as $info) {
            $keep_ad_ids[] = $info->adId;
        }

        $data['formInfo'] = $result;
        $data['viewRef'] = $this->signup_model->updateview($keep_ad_ids, $statecode = null, $search = null, $zipcode = null);
        $this->load->view('end_user_form_list_view', $data);
    }

    public function formview($adId, $pubId, $adStausID, $creationTime, $advID) {
        $data['formInfo'] = $this->signup_model->getAdFOrm($adId);
        $data['pub'] = $pubId;
        $data['StatusID'] = $adStausID;
        $data['cteationTime'] = $creationTime;
        $data['advID'] = $advID;
        $data['adId'] = $adId;
        $this->load->view('include/header', $data);
        $this->load->view('end_user_form_view');
        $this->load->view('include/footer');
    }

    public function endusersubmit() {

        $res = $this->signup_model->insertFormValues();
    }

    // by raj

    public function leads($state = NULL, $category = NULL, $ip = NULL, $pub = NULL, $subpub = NULL) {


        $pg['ads'] = $this->business_model->getLeads($state, $category, $ip, $pub, $subpub);
        $pg['publisher'] = $pub;
        $pg['subpublisher'] = $subpub;
        // $this -> load -> view('include/header');

        $this->load->view('leads', $pg);
        //$this -> load -> view('include/footer');
    }

    public function thanks() {
        $this->business_model->makeCommets();
        //$this -> load -> view('include/header');
        $this->load->view('thanks_view');
        //$this -> load -> view('include/footer');
    }

    // end
    // for forms

    public function auto($categoryid = NULL, $state = NULL, $publisherid = NULL, $subpublisherid = NULL, $userid = NULL) {



        $userid = $this->security->xss_clean($this->input->get('userid'));
        $categoryid = $this->security->xss_clean($this->input->get('category'));
        $state = $this->security->xss_clean($this->input->get('statecode'));
        $publisherid = $this->security->xss_clean($this->input->get('publisherid'));
        $subpublisherid = $this->security->xss_clean($this->input->get('subpublisherid'));
        $resticted_userIds = array();
        $data['state'] = $state;
        $data['categoryid'] = $categoryid;
        $data['publisherid'] = $publisherid;
        $data['subpublisherid'] = $subpublisherid;
        $data['states'] = $this->adv_operation_model->getStates();
		
		//to get vehicle years list
		if ($categoryid == AUTO_INSURANCE) {
			$this->load->model('admin/vehicle_model');
			$data['vehicleyears'] = $this->vehicle_model->getVehicleYears();
		}
		
        // for new functionalyut for getinig data on the basis of userID

        $advertiser_data = $this->business_model->getSelectedAdvertisersData($userid);
        $data['advertiser_data'] = $advertiser_data;
        $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($userid);
        $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
        $advBanner = $this->business_model->getBannerOfCategory($categoryid);
        $data['banner'] = isset($advBanner) && is_array($advBanner) && !empty($advBanner) ? $advBanner[0] : "";
        //print_r($data['advertiser_data']);
        // endo \
        //$data['prefered']= $this->business_model->getPreferedAdvertisers($categoryid);
        $tempAdvs = $advertiser = $this->business_model->getPreferedAdvertisers($categoryid);
//                                print_r($advertiser);
        $bus_m=new business_model();
        $restrictUsers = $bus_m->getRestrictUsers($publisherid);
         //get from thirdparty_restricted table.
        foreach ($restrictUsers as $restrict) {
            $resticted_userIds[] = $restrict->restrict_adv_id;
        }
        
        //to get top 3 advertisers on view page
        
        $topAdvarr= array();
 // echo $userid;
      $countarray=0;
  //    print_r($tempAdvs);
      if(isset($userid) && $userid >0 && isset($categoryid) && $categoryid >0){
            $isUserExists = $this->business_model->checkUserActiveCategory($userid,$categoryid);
      }else{
            $isUserExists = true;
      }
//      print_r($isUserExists);
      if(isset($tempAdvs) && is_array($tempAdvs) && !empty($tempAdvs)){
        foreach ($tempAdvs as $top_Advs) {
          
          foreach ($top_Advs as $key => $top_Adv) {
                 if($userid == $top_Adv->userId){
                    //echo 'no values';
                 }else{
               $topAdvarr[] = array('userid'=> $top_Adv->userId, 'username'=>$top_Adv->name);
               
                }
                $countarray=count($topAdvarr);
            //   echo $countarray;
                if ($categoryid == Health_insurance) {
                    if ($countarray == 6)break;
                }else{
                    if ($countarray == 3)break;
                }
                
   
                }
//                $countarray ++;
 
                 if ($categoryid == Health_insurance) {
                    if ($countarray == 6)break;
                }else{
                    if ($countarray == 3)break;
                }
        }  
      }
   // print_r($topAdvarr);
    $data['top_Advarr']=$topAdvarr;
        
        
//                                print_r($resticted_userIds);
//        print_r($tempAdvs);
        $advrBanner = array();
        if ($categoryid == THIRD_PARTY_ONLY) {
//                                    unset($advertiser);
            $advertiser = array();
            foreach ($tempAdvs as $key => $advsWithPrices) {
                foreach ($advsWithPrices as $adPrice) {
                    if (in_array($adPrice->userId, $resticted_userIds)) {
                        
                    } else {
                        //print_r($key);
                        // echo '===>';
                        // print_r($adPrice);
                        //  echo "<br/>";
                        $key = "'$key'";
                        $advertiser[$key] = isset($advertiser[$key]) ? array_merge($advertiser[$key], array($adPrice)) : array($adPrice);
                        $advertiserBanner = $this->business_model->getManageBannerUpdateData($adPrice->userId);
                        $advrBanner[$adPrice->userId] = isset($advertiserBanner) && is_array($advertiserBanner) && !empty($advertiserBanner) ? $advertiserBanner[0] : "";
                    }
                }
            }
            $data['bannerOfAdv'] = $advrBanner;
        }
        
        $data['selected_advertiser'] = $this->business_model->getSelectedAdvertisers($userid);
        // print_r($data['selected_advertiser']);
        $data['prefered'] = $advertiser;
        //print_r($data['prefered']);
        //echo $cat;
        if ((is_array($advertiser) && count($advertiser) > 0) || (is_array($advertiser_data) && count($advertiser_data) > 0)) {
            $user = $this->adv_operation_model->getpublisherActive($publisherid);
            $categories = $this->category_model->getcategary($categoryid);
            $cat = isset($categories) && is_array($categories) && count($categories) > 0 ? $categories[0] : NULL;
            //print_r($categories);
            if (isset($user) && is_object($user) && $user->userId > 0) {
                if ($user->isDeleted == "0") {
                    if ($user->isActive == "1") {
                        $user = $this->adv_operation_model->getLeadformClicks($publisherid, $categoryid);
                        if (isset($cat)) {
                            if($isUserExists){
                                //print_r($cat);
                                if ($cat->isActive == '1') {
                                    if ($categoryid == AUTO_INSURANCE) {
                                        $this->load->view('form1', $data);
                                    } elseif ($categoryid == HOME_INSURANCE) {
                                        $this->load->view('homeinsurance', $data);
                                    } elseif ($categoryid == LIFE_INSURANCE) {
                                        $this->load->view('life_insurance', $data);
                                    } elseif ($categoryid == BUSINESS_INSURANCE) {
                                        $this->load->view('business_insurance', $data);
                                    } elseif ($categoryid == TRAVEL_INSURANCE) {
                                        $this->load->view('travel_insurance', $data);
                                    } elseif ($categoryid == Education_INSURANCE) {
                                        $this->load->view('education_insurance', $data);
                                    } elseif ($categoryid == PAYDAY_LOAN) {
                                        $this->load->view('payday_loan', $data);
                                    } elseif ($categoryid == HOTELS) {
                                        $this->load->view('hotel', $data);
                                    } elseif ($categoryid == Health_insurance) {
                                        $this->load->view('health_insurance', $data);
                                    } elseif ($categoryid == CAR_LOAN) {
                                        $this->load->view('car_loan', $data);
                                    } elseif ($categoryid == AUTO_QUOTES) {
                                        $this->load->view('auto_quotes', $data);
                                    } elseif ($categoryid == THIRD_PARTY_ONLY) {
                                        $this->load->view('third_party', $data);
                                    }
                                } else {
                                    // error .. admin deactivated this category.
                                    $data["msg"] = "This category has been suspended by admin";
                                    $this->load->view('pubAccount_error', $data);
                                }
                            }else{
                                $data["msg"] = "No Such Advertiser Of This Category Exists";
                                $this->load->view('pubAccount_error', $data);
                            }
                            
                        } else {
                            // error .. no such category ..
                            $data["msg"] = "No Such Category Exists";
                            $this->load->view('pubAccount_error', $data);
                        }
                    } else {
                        $data["msg"] = "Your Account Has Been Deactivated by Admin";
                        $this->load->view('pubAccount_error', $data);
                    }
                } else {
                    $data["msg"] = "Your Account Has Been Deleted by Admin";
                    $this->load->view('pubAccount_error', $data);
                }
            } else {
                $data["msg"] = "No Such User Exists";
                $this->load->view('pubAccount_error', $data);
            }
        } else {
            $this->load->view('thanks_view');
        }
    }

    //by sarvesh
    public function sendmailforleads($savedata) {
        $advDetail = $this->business_model->getAdvDetail($savedata);
        //$mails=$this->security->xss_clean($this->input->post('email-input'));
        //$isprevois=$this->business_model->isPrevoiusVisitor($mails,AUTO_INSURANCE,$savedata);
        if (is_array($advDetail) && count($advDetail) > 0) {
            $advdetail = $advDetail[0];
            //$data = $this->business_model->getLeadalertSetting();
            // $data_info =$data[0];
            //if(($data_info->lead_alert=='1')&&($isprevois===1)){  //echo "gdfgdrtgrtsarvesh";
            //$mailTo = implode(",", array($advdetail->email,ADMIN_MAIL));
            $mailTo = $advdetail->email;
            //print_r($mailTo);
            // }else if($isprevois===1){//echo "sarvesh";
            //$mailTo = $advdetail->email;
            //}else if($data_info->lead_alert=='1'){//echo "pandey";
            //$mailTo = ADMIN_MAIL;
            //}else{
            // $mailTo = "";
            // }

            $mailData['adv_name'] = $advdetail->name;
            $mailData['base_url'] = $this->config->base_url();
            $subject = 'New Lead Alert:' . $advdetail->name;
            require_once("mailer/Email.php");
            $emailSender = new Email();
            $emailSender->SendEmail('adv_admin_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
        }
    }

    // end 
    //to check server side validation 
    public function checkEmailPhoneValidate($email,$phone){
        $validate = TRUE;
        if(isset($phone) && strlen($phone) >0){
            if(is_numeric($phone)){
                $validate = TRUE;
            }else{
                $validate = FALSE;
            }
        }else{
            $validate = FALSE;    
        }
        if(isset($email) && strlen($phone) >0){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $validate = TRUE;
            }else{
                $validate = FALSE;
            }
        }else{
            $validate = FALSE;
        }
        return $validate;
    }
    public function loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid){
        $resticted_userIds = array();
        $data['state'] = $state;
        $data['categoryid'] = $categoryid;
        $data['publisherid'] = $publisherid;
        $data['subpublisherid'] = $subpublisherid;
        $data['states'] = $this->adv_operation_model->getStates();
        $data['userid'] = $userid;
        // for new functionalyut for getinig data on the basis of userID

        $advertiser_data = $this->business_model->getSelectedAdvertisersData($userid);
        $data['advertiser_data'] = $advertiser_data;
        $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($userid);
        $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
        $advBanner = $this->business_model->getBannerOfCategory($categoryid);
        $data['banner'] = isset($advBanner) && is_array($advBanner) && !empty($advBanner) ? $advBanner[0] : "";
        //print_r($data['advertiser_data']);
        // endo \
        //$data['prefered']= $this->business_model->getPreferedAdvertisers($categoryid);
        $tempAdvs = $advertiser = $this->business_model->getPreferedAdvertisers($categoryid);
//                                print_r($advertiser);
        $restrictUsers = business_model::getRestrictUsers($publisherid);
        ; //get from thirdparty_restricted table.
        foreach ($restrictUsers as $restrict) {
            $resticted_userIds[] = $restrict->restrict_adv_id;
        }

//                                print_r($resticted_userIds);
//        print_r($tempAdvs);
        $advrBanner = array();
        if ($categoryid == THIRD_PARTY_ONLY) {
//                                    unset($advertiser);
            $advertiser = array();
            foreach ($tempAdvs as $key => $advsWithPrices) {
                foreach ($advsWithPrices as $adPrice) {
                    if (in_array($adPrice->userId, $resticted_userIds)) {
                        
                    } else {
                        $key = "'$key'";
                        $advertiser[$key] = isset($advertiser[$key]) ? array_merge($advertiser[$key], array($adPrice)) : array($adPrice);
                        $advertiserBanner = $this->business_model->getManageBannerUpdateData($adPrice->userId);
                        $advrBanner[$adPrice->userId] = isset($advertiserBanner) && is_array($advertiserBanner) && !empty($advertiserBanner) ? $advertiserBanner[0] : "";
                    }
                }
            }
            $data['bannerOfAdv'] = $advrBanner;
        }
        
        $data['selected_advertiser'] = $this->business_model->getSelectedAdvertisers($userid);
        // print_r($data['selected_advertiser']);
        $data['prefered'] = $advertiser;
        $data["msgValidate"] = "Email and phone no field is required";
        return $data;
    }
    public function checkSessionCategory($phone,$category){
//        $ispreviousCat = $this->session->userdata('previousCategory');
//        if(isset($ispreviousCat) && is_array($ispreviousCat ) && !empty($ispreviousCat)){
//            if($ispreviousCat['phone'] == $phone && $ispreviousCat['category'] == $category){
//                return true;
//            }else{
//                $catPhoneArr = array(
//                    'phone' => $phone,
//                    'category' => $category
//                );
//                $this->session->set_userdata('previousCategory', $catPhoneArr);
//                return false;
//            }
//        }else{
//            $catPhoneArr = array(
//                'phone' => $phone,
//                'category' => $category
//            );
//            $this->session->set_userdata('previousCategory', $catPhoneArr);
//            return false;
//        }
        return false;
    }
    public function autosubmit() {
        $topAdvsData=$this->security->xss_clean($this->input->post('topAdvrData'));
        if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
            array_push($topAdvsData,$this->input->post('prefered_advertiser'));
        }else{
            $topAdvsData=array();
            array_push($topAdvsData,$this->input->post('prefered_advertiser'));
        }
    // print_r($topAdvsData);
     
       
        $phone  = $this->security->xss_clean($this->input->post('phone-input'));
        $email = $this->security->xss_clean($this->input->post('email-input'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            
//            $checksession = $this->checkSessionCategory($phone,AUTO_INSURANCE);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
             foreach($topAdvsData as $topAdvsId){
                    $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,AUTO_INSURANCE,$topAdvsId);
                  //   print_r($topAdvsId);
                    $savedata = $this->security->xss_clean($topAdvsId);
                  //  print_r($savedata);
                    if($isPrevious == 0){
                        $res = $this->business_model->AutoInsurance($topAdvsId);
                        if ($res === 2) {
                            echo '<script>alert("Email already used, please try after 1 months time interval")</script>';
                        }
                    }
                    
                    // need to place success page thanks page link
                    
                    //$this -> load -> view('include/header');



                    $mailData['state_name'] = $this->security->xss_clean($this->input->post('state_name'));
                    $mailData['car-year'] = $this->security->xss_clean($this->input->post('car-year'));
                    $mailData['car-make-select'] = $this->security->xss_clean($this->input->post('car-make-select'));
                    $mailData['car-model-select'] = $this->security->xss_clean($this->input->post('car-model-select'));
                    $mailData['cost-of-vehicle'] = $data['premiumcost'] = $this->security->xss_clean($this->input->post('cost-of-vehicle'));
            //        $mailData['first-name-input'] = $this->security->xss_clean($this->input->post('first-name-input'));
            //        $mailData['last-name-input'] = $this->security->xss_clean($this->input->post('last-name-input'));
                    $mailData['full-name-input'] = $this->security->xss_clean($this->input->post('full-name-input'));
        //            $mailData['gender-select'] = $this->security->xss_clean($this->input->post('gender-select'));
        //            $mailData['driver-birth-select'] = $this->security->xss_clean($this->input->post('driver-birth-select'));
            //        $mailData['marital-status-select'] = $this->security->xss_clean($this->input->post('marital-status-select'));
                    $mailData['occupation-select'] = $this->security->xss_clean($this->input->post('occupation-select'));
            //        $mailData['license-status-select'] = $this->security->xss_clean($this->input->post('license-status-select'));
            //        $mailData['incident-select'] = $this->security->xss_clean($this->input->post('incident-select'));
                    $mailData['phone-input'] = $this->security->xss_clean($this->input->post('phone-input'));
                    $mailData['email-input'] = $this->security->xss_clean($this->input->post('email-input'));
                    $mailData['zip-input'] = $this->security->xss_clean($this->input->post('zip-input'));
                    $mailData['address-input'] = $this->security->xss_clean($this->input->post('address-input'));
                    $advDetail = $this->business_model->getAdvDetail($savedata);
            //        $mailData['fullname'] = $mailData['first-name-input'].$mailData['last-name-input'];
                    $data['category'] = $category = $this->business_model->getCategoryOfId(AUTO_INSURANCE);
                    $categoryName = isset($category->categoryName) ? $category->categoryName : "Auto Insurance";

                    //to check user sms alert for once a day 
                    if($isPrevious == 0){
                
                        $smsSentForThisUser = $this->business_model->checkUserSMSAlert($mailData['phone-input'],AUTO_INSURANCE);
                        $smsSent = False;
                        if(isset($smsSentForThisUser) && is_array($smsSentForThisUser) && !empty($smsSentForThisUser)){
                            $smsSent = True;
                        }else{
                            $smsSent = False;
                            $todayAM = strtotime('today midnight');
                            $todayPM = $todayAM + 86400;
                            $currentTime = time();
                            $insertArray = array(
                                'user_phone' => $mailData['phone-input'],
                                'category_id' => AUTO_INSURANCE,
                                'start_time' => $todayAM,
                                'end_time' => $todayPM,
                                'created_at' => $currentTime
                            );
                            $this->business_model->insertUserSMSAlert($insertArray);
                        }
                    }
                    if (is_array($advDetail) && count($advDetail) > 0) {
                        $advdetail = $advDetail[0];
                        $mailTo = ADMIN_MAIL;
                        $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
                        if($isPrevious == 0){
                            $mailData['base_url'] = $this->config->base_url();
                            $subject = 'New '. $categoryName .' Lead: ' . $advdetail->name;
                            require_once("mailer/Email.php");
                            $emailSender = new Email();
                            $emailSender->SendEmail('auto_admin_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
                            $emailSender->SendEmail('auto_admin_mail', $mailData, $advdetail->email, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
                //            $this->sendmailforleads($savedata);
                            if(!$smsSent){
                                $sms_data = $this->sendSmsToUser($mailData['phone-input'], $mailData['full-name-input']);
                            }
                        }
                        
                    }
                    $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
                  //  $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
                   // $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,AUTO_INSURANCE);
                    $advbnr= isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
                    $leadQut= $this->business_model->getLeadQuotes($savedata,AUTO_INSURANCE);
                   $adervt[$advdetail->name]=  array('leadQuotes'=>$leadQut,'advbanner'=>$advbnr);
                  $data['AdvrtiserArr']=$adervt;
                    //$this -> load -> view('include/footer');
                 }
            }
    //    print_r($data['AdvrtiserArr']);
//           echo "<br/><br/><br/><br/><br/>";
//             print_r($data['array'][$advdetail->name]);
                    $this->load->view('thanks_auto_insurance',$data);
        }else{
            $userid = $this->security->xss_clean($savedata);
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('form1', $data);
        }
        
    }
    public function homeinsurance($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {

        $data['state'] = $state;
        $data['categoryid'] = $categoryid;
        $data['publisherid'] = $publisherid;
        $data['subpublisherid'] = $subpublisherid;
        $data['states'] = $this->adv_operation_model->getStates();
        $data['prefered'] = $this->business_model->getPreferedAdvertisers(HOME_INSURANCE);
        $this->load->view('homeinsurance', $data);
    }

   public function submithome() {
        
        $topAdvsData=$this->security->xss_clean($this->input->post('topAdvrData'));
        if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
              array_push($topAdvsData,$this->input->post('prefered_advertiser'));
        }else{
            $topAdvsData=array();
              array_push($topAdvsData,$this->input->post('prefered_advertiser'));
        }
      
    // print_r($topAdvsData);
     
        $phone  = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            
//            $checksession = $this->checkSessionCategory($phone,HOME_INSURANCE);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
            
              foreach($topAdvsData as $topAdvsId){
                  //   print_r($topAdvsId);
                $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,HOME_INSURANCE,$topAdvsId);
                $savedata = $this->security->xss_clean($topAdvsId);
              //  print_r($savedata);
                if($isPrevious == 0){
                    $res1 = $this->business_model->submithome($topAdvsId);
                    if ($res1 === 2) {
                        echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                    }
                }
            
            //$this -> load -> view('include/header');
            
            $mailData['state_name'] = $this->security->xss_clean($this->input->post('state_name'));
    //        $mailData['selecttitle'] = $this->security->xss_clean($this->input->post('selecttitle'));
            $mailData['fullname'] = $this->security->xss_clean($this->input->post('fullname'));
    //        $mailData['selectmarital'] = $this->security->xss_clean($this->input->post('selectmarital'));
            $mailData['email'] = $this->security->xss_clean($this->input->post('email'));
            $mailData['phone'] = $this->security->xss_clean($this->input->post('phone'));
    //        $mailData['selectemployment'] = $this->security->xss_clean($this->input->post('selectemployment'));
            $mailData['street'] = $this->security->xss_clean($this->input->post('street'));
            $mailData['statename'] = $this->security->xss_clean($this->input->post('statename'));
            $property_type = $this->security->xss_clean($this->input->post('propetyType'));
            if($property_type == "NONE"){
                $property_type=$this->security->xss_clean($this->input->post('property_type'));
            }
            $mailData['propetyType'] = $property_type;
            $mailData['number_rooms'] = $this->security->xss_clean($this->input->post('number_rooms'));
            $mailData['insuranceType'] = $this->security->xss_clean($this->input->post('insuranceType'));
            $mailData['cost-of-home'] = $data['premiumcost']= $this->security->xss_clean($this->input->post('cost-of-home'));
            $advDetail = $this->business_model->getAdvDetail($savedata);
            $data['category'] = $category = $this->business_model->getCategoryOfId(HOME_INSURANCE);
            $categoryName = isset($category->categoryName) ? $category->categoryName : "Home Insurance";

            //to check user sms alert for once a day 
            if($isPrevious == 0){
                $smsSentForThisUser = $this->business_model->checkUserSMSAlert($mailData['phone'],HOME_INSURANCE);
                $smsSent = False;
                if(isset($smsSentForThisUser) && is_array($smsSentForThisUser) && !empty($smsSentForThisUser)){
                    $smsSent = True;
                }else{
                    $smsSent = False;
                    $todayAM = strtotime('today midnight');
                    $todayPM = $todayAM + 86400;
                    $currentTime = time();
                    $insertArray = array(
                        'user_phone' => $mailData['phone'],
                        'category_id' => HOME_INSURANCE,
                        'start_time' => $todayAM,
                        'end_time' => $todayPM,
                        'created_at' => $currentTime
                    );
                    $this->business_model->insertUserSMSAlert($insertArray);
                }
            }
            if (is_array($advDetail) && count($advDetail) > 0) {
                $advdetail = $advDetail[0];
                $mailTo = ADMIN_MAIL;
                $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
                if($isPrevious == 0){
                    $mailData['base_url'] = $this->config->base_url();
                    $subject = 'New '. $categoryName .' Lead: ' . $advdetail->name;
                    require_once("mailer/Email.php");
                    $emailSender = new Email();
                    $emailSender->SendEmail('home_admin_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
        //            $this->sendmailforleads($savedata);
                    $emailSender->SendEmail('home_admin_mail', $mailData, $advdetail->email, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
                    if(!$smsSent){
                        $sms_data = $this->sendSmsToUser($mailData['phone'], $mailData['fullname']);
                    }
                }
            }
            $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
//            $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
//            $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,HOME_INSURANCE);
            
              $advbnr= isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
            $leadQut= $this->business_model->getLeadQuotes($savedata,HOME_INSURANCE);
           $adervt[$advdetail->name]=  array('leadQuotes'=>$leadQut,'advbanner'=>$advbnr);
          $data['AdvrtiserArr']=$adervt;
              }
            }
        //      print_r($data['AdvrtiserArr']);
            $this->load->view('thanks_view',$data);
            //$this -> load -> view('include/footer');
        }else{
            $userid = $this->security->xss_clean($savedata);
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('homeinsurance', $data);
        }
        
    }

   public function submitlifeInsurance($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {
        $topAdvsData=$this->security->xss_clean($this->input->post('topAdvrData'));
        if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
            array_push($topAdvsData,$this->input->post('prefered_advertiser'));
        }else{
            $topAdvsData=array();
            array_push($topAdvsData,$this->input->post('prefered_advertiser'));
        }
        
    // print_r($topAdvsData);
     
        $phone  = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
           
//            $checksession = $this->checkSessionCategory($phone,LIFE_INSURANCE);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
            foreach($topAdvsData as $topAdvsId){
                 $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,LIFE_INSURANCE,$topAdvsId);
                  //   print_r($topAdvsId);
            $savedata = $this->security->xss_clean($topAdvsId);
          //  print_r($savedata);
            if($isPrevious == 0){
                $res1 = $this->business_model->LifeInsurance($topAdvsId);
                if ($res1 === 2) {
                    echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                }
            }
            //$this -> load -> view('include/header');
//            $savedata = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $mailData['state_name'] = $this->security->xss_clean($this->input->post('state_name'));
            $mailData['statename'] = $this->security->xss_clean($this->input->post('statename'));
            $mailData['selectgender'] = $this->security->xss_clean($this->input->post('selectgender'));
            $mailData['dob'] = $this->security->xss_clean($this->input->post('dob'));
            $mailData['conamount'] = $data['premiumcost'] = $this->security->xss_clean($this->input->post('conamount'));
            $mailData['teamlenght'] = $this->security->xss_clean($this->input->post('teamlenght'));
            $mailData['Tobacco_Nicotine_user'] = $this->security->xss_clean($this->input->post('Tobacco_Nicotine_user'));
            $mailData['health'] = $this->security->xss_clean($this->input->post('health'));
            $mailData['fullname'] = $this->security->xss_clean($this->input->post('fullname'));
            $mailData['email'] = $this->security->xss_clean($this->input->post('email'));
            $mailData['phone'] = $this->security->xss_clean($this->input->post('phone'));
            $advDetail = $this->business_model->getAdvDetail($savedata);

            $data['category'] = $category = $this->business_model->getCategoryOfId(LIFE_INSURANCE);
            $categoryName = isset($category->categoryName) ? $category->categoryName : "Life Insurance";
            if($isPrevious == 0){
            //to check user sms alert for once a day 
                $smsSentForThisUser = $this->business_model->checkUserSMSAlert($mailData['phone'],LIFE_INSURANCE);
                $smsSent = False;
                if(isset($smsSentForThisUser) && is_array($smsSentForThisUser) && !empty($smsSentForThisUser)){
                    $smsSent = True;
                }else{
                    $smsSent = False;
                    $todayAM = strtotime('today midnight');
                    $todayPM = $todayAM + 86400;
                    $currentTime = time();
                    $insertArray = array(
                        'user_phone' => $mailData['phone'],
                        'category_id' => LIFE_INSURANCE,
                        'start_time' => $todayAM,
                        'end_time' => $todayPM,
                        'created_at' => $currentTime
                    );
                    $this->business_model->insertUserSMSAlert($insertArray);
                }
            }
            if (is_array($advDetail) && count($advDetail) > 0) {
                $advdetail = $advDetail[0];
                $mailTo = ADMIN_MAIL;
                $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
                if($isPrevious == 0){
                    $mailData['base_url'] = $this->config->base_url();
                    $subject = 'New '. $categoryName .' Lead: ' . $advdetail->name;
                    require_once("mailer/Email.php");
                    $emailSender = new Email();
                    $emailSender->SendEmail('life_admin_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
        //            $this->sendmailforleads($savedata);
                    $emailSender->SendEmail('life_admin_mail', $mailData, $advdetail->email, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
                    if(!$smsSent){
                        $sms_data = $this->sendSmsToUser($mailData['phone'], $mailData['fullname']);
                    }
                }
            }
            $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
//            $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
//            $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,LIFE_INSURANCE);
           
            $advbnr= isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
            $leadQut= $this->business_model->getLeadQuotes($savedata,LIFE_INSURANCE);
            $adervt[$advdetail->name]=  array('leadQuotes'=>$leadQut,'advbanner'=>$advbnr);
            $data['AdvrtiserArr']=$adervt;
            }
            }
            // print_r($data['AdvrtiserArr']);
            $this->load->view('thanks_view',$data);
            //$this -> load -> view('include/footer');
        }else{
            $userid = $this->security->xss_clean($topAdvsId);
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('life_insurance', $data);
        }
        
    }

   public function submithealthInsurance($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {
        
         $topAdvsData=$this->security->xss_clean($this->input->post('topAdvrData'));
         if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
             array_push($topAdvsData,$this->input->post('prefered_advertiser'));
         }else{
             $topAdvsData=array();
             array_push($topAdvsData,$this->input->post('prefered_advertiser'));
         }
        
    // print_r($topAdvsData);
     
        $phone  = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            
//            $checksession = $this->checkSessionCategory($phone,Health_insurance);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
            foreach($topAdvsData as $topAdvsId){
                  //   print_r($topAdvsId);
            $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,Health_insurance,$topAdvsId);
            $savedata = $this->security->xss_clean($topAdvsId);
            if($isPrevious == 0){
                $res1 = $this->business_model->HealthInsurance($topAdvsId);
                if ($res1 === 2) {
                    echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                }
            }
            //$this -> load -> view('include/header');
            $mailData['state_name'] = $this->security->xss_clean($this->input->post('state_name'));
            $mailData['statename'] = $this->security->xss_clean($this->input->post('statename'));
    //        $mailData['selectgender'] = $this->security->xss_clean($this->input->post('selectgender'));
    //        $mailData['dob'] = $this->security->xss_clean($this->input->post('dob'));
            $mailData['selectPeople'] = $this->security->xss_clean($this->input->post('selectPeople'));
            $mailData['Tobacco_Nicotine_user'] = $this->security->xss_clean($this->input->post('Tobacco_Nicotine_user'));
    //        $mailData['insured-select'] = $this->security->xss_clean($this->input->post('insured-select'));
            $mailData['your_health'] = $this->security->xss_clean($this->input->post('health'));
            $mailData['fullname'] = $this->security->xss_clean($this->input->post('fullname'));
            $mailData['email'] = $this->security->xss_clean($this->input->post('email'));
            $mailData['address-input'] = $this->security->xss_clean($this->input->post('address-input'));
            $mailData['phone'] = $this->security->xss_clean($this->input->post('phone'));
            $advDetail = $this->business_model->getAdvDetail($savedata);

            $data['category'] = $category = $this->business_model->getCategoryOfId(Health_insurance);
            $categoryName = isset($category->categoryName) ? $category->categoryName : "Health Insurance";
            if($isPrevious == 0){
                //to check user sms alert for once a day 
                $smsSentForThisUser = $this->business_model->checkUserSMSAlert($mailData['phone'],Health_insurance);
                $smsSent = False;
                if(isset($smsSentForThisUser) && is_array($smsSentForThisUser) && !empty($smsSentForThisUser)){
                    $smsSent = True;
                }else{
                    $smsSent = False;
                    $todayAM = strtotime('today midnight');
                    $todayPM = $todayAM + 86400;
                    $currentTime = time();
                    $insertArray = array(
                        'user_phone' => $mailData['phone'],
                        'category_id' => Health_insurance,
                        'start_time' => $todayAM,
                        'end_time' => $todayPM,
                        'created_at' => $currentTime
                    );
                    $this->business_model->insertUserSMSAlert($insertArray);
                }
            }
            if (is_array($advDetail) && count($advDetail) > 0) {
                $advdetail = $advDetail[0];
                $mailTo = ADMIN_MAIL;
                $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
                if($isPrevious == 0){
                    $mailData['base_url'] = $this->config->base_url();
                    $subject = 'New '. $categoryName .' Lead: ' . $advdetail->name;
                    require_once("mailer/Email.php");
                    $emailSender = new Email();
                    $emailSender->SendEmail('health_admin_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
        //            $this->sendmailforleads($savedata);
                    $emailSender->SendEmail('health_admin_mail', $mailData, $advdetail->email, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
                    if(!$smsSent){
                        $sms_data = $this->sendSmsToUser($mailData['phone'], $mailData['fullname']);
                    }
                }
            }
            $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
//            $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
//            $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,Health_insurance);
             $advbnr= isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
            $leadQut= $this->business_model->getLeadQuotes($savedata,Health_insurance);
           $adervt[$advdetail->name]=  array('leadQuotes'=>$leadQut,'advbanner'=>$advbnr);
          $data['AdvrtiserArr']=$adervt;
            }
            }
         //   print_r($data['AdvrtiserArr']);
            $this->load->view('thanks_view',$data);
            //$this -> load -> view('include/footer');
        }else{
            $userid = $this->security->xss_clean($savedata);
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('health_insurance', $data);
        }
        
    }

    public function submitbusinessInsurance($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {
        
         $topAdvsData=$this->security->xss_clean($this->input->post('topAdvrData'));
         if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
             array_push($topAdvsData,$this->input->post('prefered_advertiser'));
         }else{
             $topAdvsData=array();
             array_push($topAdvsData,$this->input->post('prefered_advertiser'));
         }
        
    // print_r($topAdvsData);
     
        $phone  = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            
//            $checksession = $this->checkSessionCategory($phone,BUSINESS_INSURANCE);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
            foreach($topAdvsData as $topAdvsId){
                  //   print_r($topAdvsId);
                $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,BUSINESS_INSURANCE,$topAdvsId);
            $savedata = $this->security->xss_clean($topAdvsId);
          //  print_r($savedata);
            if($isPrevious == 0){
                $res1 = $this->business_model->BusinessInsurance($topAdvsId);

                if ($res1 === 2) {
                    echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                }
                //$this -> load -> view('include/header');
            }

          //  $savedata = $this->security->xss_clean($savedata);
            $mailData['state_name'] = $this->security->xss_clean($this->input->post('state_name'));
            $mailData['insurance_type'] = $this->security->xss_clean($this->input->post('insurance_type'));
            $mailData['business_policy'] = $this->security->xss_clean($this->input->post('business_policy'));
            $mailData['business_address'] = $this->security->xss_clean($this->input->post('business_address'));
            $mailData['fullname'] = $this->security->xss_clean($this->input->post('name'));
            $mailData['email'] = $this->security->xss_clean($this->input->post('email'));
            $mailData['dob'] = $this->security->xss_clean($this->input->post('dob'));
            $mailData['phone'] = $this->security->xss_clean($this->input->post('phone'));
            $advDetail = $this->business_model->getAdvDetail($savedata);

            $data['category'] = $category = $this->business_model->getCategoryOfId(BUSINESS_INSURANCE);
            $categoryName = isset($category->categoryName) ? $category->categoryName : "Business Insurance";
            if($isPrevious == 0){
                //to check user sms alert for once a day 
                $smsSentForThisUser = $this->business_model->checkUserSMSAlert($mailData['phone'],BUSINESS_INSURANCE);
                $smsSent = False;
                if(isset($smsSentForThisUser) && is_array($smsSentForThisUser) && !empty($smsSentForThisUser)){
                    $smsSent = True;
                }else{
                    $smsSent = False;
                    $todayAM = strtotime('today midnight');
                    $todayPM = $todayAM + 86400;
                    $currentTime = time();
                    $insertArray = array(
                        'user_phone' => $mailData['phone'],
                        'category_id' => BUSINESS_INSURANCE,
                        'start_time' => $todayAM,
                        'end_time' => $todayPM,
                        'created_at' => $currentTime
                    );
                    $this->business_model->insertUserSMSAlert($insertArray);
                }
            }
            if (is_array($advDetail) && count($advDetail) > 0) {
                $advdetail = $advDetail[0];
                $mailTo = ADMIN_MAIL;
                $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
                if($isPrevious == 0){
                    $mailData['base_url'] = $this->config->base_url();
                    $subject = 'New '. $categoryName .' Lead: ' . $advdetail->name;
                    require_once("mailer/Email.php");
                    $emailSender = new Email();
                    $emailSender->SendEmail('business_admin_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
        //            $this->sendmailforleads($savedata);
                    $emailSender->SendEmail('business_admin_mail', $mailData, $advdetail->email, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
                    if(!$smsSent){
                        $sms_data = $this->sendSmsToUser($mailData['phone'], $mailData['fullname']);
                    }
                }
            }

            //$this -> load -> view('include/footer');
            $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
//            $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
//            $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,BUSINESS_INSURANCE);
            
             $advbnr= isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
            $leadQut= $this->business_model->getLeadQuotes($savedata,BUSINESS_INSURANCE);
           $adervt[$advdetail->name]=  array('leadQuotes'=>$leadQut,'advbanner'=>$advbnr);
          $data['AdvrtiserArr']=$adervt;
            }
             }
         //   print_r($data['AdvrtiserArr']);
            $this->load->view('thanks_view',$data);
        }else{
            $userid = $this->security->xss_clean($savedata);
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('business_insurance', $data);
        }
        
    }

    public function submittravelInsurance($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {
          $topAdvsData=$this->security->xss_clean($this->input->post('topAdvrData'));
         
         if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
             array_push($topAdvsData,$this->input->post('prefered_advertiser'));
         }else{
             $topAdvsData=array();
             array_push($topAdvsData,$this->input->post('prefered_advertiser'));
         }
     
    // print_r($topAdvsData);
     
        $phone  = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            
//            $checksession = $this->checkSessionCategory($phone,TRAVEL_INSURANCE);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
              if(isset($topAdvsData) && is_array($topAdvsData) && !empty($topAdvsData)){
            foreach($topAdvsData as $topAdvsId){
                $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,TRAVEL_INSURANCE,$topAdvsId);
                  //   print_r($topAdvsId);
            $savedata = $this->security->xss_clean($topAdvsId);
          //  print_r($savedata);
            if($isPrevious == 0){
                $res1 = $this->business_model->TravelInsurance($topAdvsId);
                if ($res1 === 2) {
                    echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                }
            //$this -> load -> view('include/header');
            }
         //   $savedata = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $travellocation = $this->security->xss_clean($this->input->post('travel_location'));
            if(trim($travellocation) == 'Outside-The-Country'){
                $locationname = $this->security->xss_clean($this->input->post('location_name'));
            }else{
                $locationname = $this->security->xss_clean($this->input->post('travel_location'));
            }
            $mailData['state_name'] = $this->security->xss_clean($this->input->post('state_name'));
            $mailData['travel_location'] = $locationname;
            $mailData['travel_start_date'] = $this->security->xss_clean($this->input->post('travel_start_date'));
            $mailData['travel_duration'] = $this->security->xss_clean($this->input->post('travel_duration'));
            $mailData['policy_type'] = $this->security->xss_clean($this->input->post('policy_type'));
            $mailData['require_cover_high_value_items'] = $this->security->xss_clean($this->input->post('require_cover_high_value_items'));
            $mailData['fullname'] = $this->security->xss_clean($this->input->post('name'));
            $mailData['email'] = $this->security->xss_clean($this->input->post('email'));
            $mailData['dob'] = $this->security->xss_clean($this->input->post('dob'));
            $mailData['phone'] = $this->security->xss_clean($this->input->post('phone'));
            $mailData['cover_persons'] = $this->security->xss_clean($this->input->post('cover_persons'));
            $advDetail = $this->business_model->getAdvDetail($savedata);

            $data['category'] = $category = $this->business_model->getCategoryOfId(TRAVEL_INSURANCE);
            $categoryName = isset($category->categoryName) ? $category->categoryName : "Travel Insurance";
            if($isPrevious == 0){
                //to check user sms alert for once a day 
                $smsSentForThisUser = $this->business_model->checkUserSMSAlert($mailData['phone'],TRAVEL_INSURANCE);
                $smsSent = False;
                if(isset($smsSentForThisUser) && is_array($smsSentForThisUser) && !empty($smsSentForThisUser)){
                    $smsSent = True;
                }else{
                    $smsSent = False;
                    $todayAM = strtotime('today midnight');
                    $todayPM = $todayAM + 86400;
                    $currentTime = time();
                    $insertArray = array(
                        'user_phone' => $mailData['phone'],
                        'category_id' => TRAVEL_INSURANCE,
                        'start_time' => $todayAM,
                        'end_time' => $todayPM,
                        'created_at' => $currentTime
                    );
                    $this->business_model->insertUserSMSAlert($insertArray);
                }
            }
            if (is_array($advDetail) && count($advDetail) > 0) {
                $advdetail = $advDetail[0];
                $mailTo = ADMIN_MAIL;
                $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
                if($isPrevious == 0){
                    $mailData['base_url'] = $this->config->base_url();
                    $subject = 'New '. $categoryName .' Lead: ' . $advdetail->name;
                    require_once("mailer/Email.php");
                    $emailSender = new Email();
                    $emailSender->SendEmail('travel_admin_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
        //            $this->sendmailforleads($savedata);
                    $emailSender->SendEmail('travel_admin_mail', $mailData, $advdetail->email, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
                    if(!$smsSent){
                        $sms_data = $this->sendSmsToUser($mailData['phone'], $mailData['fullname']);
                    }
                }
            }
            $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
//            $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
//            $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,TRAVEL_INSURANCE);
            
           $advbnr= isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
           $leadQut= $this->business_model->getLeadQuotes($savedata,TRAVEL_INSURANCE);
           $adervt[$advdetail->name]=  array('leadQuotes'=>$leadQut,'advbanner'=>$advbnr);
           $data['AdvrtiserArr']=$adervt;
            }
              }
           // print_r($data['AdvrtiserArr']);
            $this->load->view('thanks_view',$data);
            //$this -> load -> view('include/footer');
        }else{
            $userid = $this->security->xss_clean($savedata);
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('travel_insurance', $data);
        }
        
    }

    public function submiteducationInsurance($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {
        $phone  = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            $savedata = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,Education_INSURANCE,$savedata);
//            $checksession = $this->checkSessionCategory($phone,Education_INSURANCE);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            if($isPrevious == 0){
                $res1 = $this->business_model->EducationInsurance();
                if ($res1 === 2) {
                    echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                }
                $this->sendmailforleads($savedata);
                //$this -> load -> view('include/header');
            }
            
            
            $advDetail = $this->business_model->getAdvDetail($savedata);
            //$mails=$this->security->xss_clean($this->input->post('email-input'));
            //$isprevois=$this->business_model->isPrevoiusVisitor($mails,AUTO_INSURANCE,$savedata);
            if (is_array($advDetail) && count($advDetail) > 0) {
                $advdetail = $advDetail[0];
                $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
            }
            $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
            $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
            $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,Education_INSURANCE);
            $data['category'] = $this->business_model->getCategoryOfId(Education_INSURANCE);
            $this->load->view('thanks_view_single',$data);
            //$this -> load -> view('include/footer');
        }else{
            $userid = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('education_insurance', $data); 
        }
        
    }

    public function submitpaydayloan($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {
        $phone  = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            $savedata = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,PAYDAY_LOAN,$savedata);
//            $checksession = $this->checkSessionCategory($phone,PAYDAY_LOAN);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            
            if($isPrevious == 0){
                $res1 = $this->business_model->PaydayLoan();
                if ($res1 === 2) {
                    echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                }
                
                //$this -> load -> view('include/header');
                $this->sendmailforleads($savedata);
            }
            
            $data['premiumcost'] = $loan_amount = $this->security->xss_clean($this->input->post("loan_amount"));
            $advDetail = $this->business_model->getAdvDetail($savedata);
            //$mails=$this->security->xss_clean($this->input->post('email-input'));
            //$isprevois=$this->business_model->isPrevoiusVisitor($mails,AUTO_INSURANCE,$savedata);
            if (is_array($advDetail) && count($advDetail) > 0) {
                $advdetail = $advDetail[0];
                $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
            }
            $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
            $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
            $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,PAYDAY_LOAN);
            $data['category'] = $this->business_model->getCategoryOfId(PAYDAY_LOAN);
            $this->load->view('thanks_view_single',$data);
            //$this -> load -> view('include/footer');
        }else{
            $userid = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('payday_loan', $data); 
        }
        
    }

    public function submithotel($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {
        $phone  = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            $savedata = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,HOTELS,$savedata);
//            $checksession = $this->checkSessionCategory($phone,HOTELS);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            
            if($isPrevious == 0){
                $res1 = $this->business_model->Hotel();
                if ($res1 === 2) {
                    echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                }
                // $this -> load -> view('include/header');
                $this->sendmailforleads($savedata);
            }
            
            
            $advDetail = $this->business_model->getAdvDetail($savedata);
            //$mails=$this->security->xss_clean($this->input->post('email-input'));
            //$isprevois=$this->business_model->isPrevoiusVisitor($mails,AUTO_INSURANCE,$savedata);
            if (is_array($advDetail) && count($advDetail) > 0) {
                $advdetail = $advDetail[0];
                $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
            }
            $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
            $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
            $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,HOTELS);
            $data['category'] = $this->business_model->getCategoryOfId(HOTELS);
            $this->load->view('thanks_view_single',$data);
            //$this -> load -> view('include/footer');
        }else{
            $userid = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('hotel', $data); 
        }
        
    }

    //these three controllers method are added by ravindra 
    public function submitcarloan($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {
        $phone  = $this->security->xss_clean($this->input->post('empPhone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            $savedata = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,CAR_LOAN,$savedata);
//            $checksession = $this->checkSessionCategory($phone,CAR_LOAN);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            
            if($isPrevious == 0){
                $res1 = $this->business_model->carLoan();
                if ($res1 === 2) {
                    echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                }
                //$this -> load -> view('include/header');
                $this->sendmailforleads($savedata);
            }
            
            
            $advDetail = $this->business_model->getAdvDetail($savedata);
            //$mails=$this->security->xss_clean($this->input->post('email-input'));
            //$isprevois=$this->business_model->isPrevoiusVisitor($mails,AUTO_INSURANCE,$savedata);
            if (is_array($advDetail) && count($advDetail) > 0) {
                $advdetail = $advDetail[0];
                $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
            }
            $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
            $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
            $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,CAR_LOAN);
            $data['category'] = $this->business_model->getCategoryOfId(CAR_LOAN);
            $this->load->view('thanks_view_single',$data);

            //$this -> load -> view('include/footer');
        }else{
            $userid = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('car_loan', $data); 
        }
        
    }

    public function submitautoquotes($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {
        $phone  = $this->security->xss_clean($this->input->post('phoneNo'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            $savedata = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,AUTO_QUOTES,$savedata);
//            $checksession = $this->checkSessionCategory($phone,AUTO_QUOTES);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            
           if($isPrevious == 0){
                $res1 = $this->business_model->autoQuotes();
                if ($res1 === 2) {
                    echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                }
                //$this -> load -> view('include/header');
                $this->sendmailforleads($savedata);
            }
            
            
            $advDetail = $this->business_model->getAdvDetail($savedata);
            //$mails=$this->security->xss_clean($this->input->post('email-input'));
            //$isprevois=$this->business_model->isPrevoiusVisitor($mails,AUTO_INSURANCE,$savedata);
            if (is_array($advDetail) && count($advDetail) > 0) {
                $advdetail = $advDetail[0];
                $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
            }
            $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($savedata);
            $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
            $data['leadQuotes'] = $this->business_model->getLeadQuotes($savedata,AUTO_QUOTES);
            $data['category'] = $this->business_model->getCategoryOfId(AUTO_QUOTES);
            $this->load->view('thanks_autoquotes',$data);
            //$this -> load -> view('include/footer');
        }else{
            $userid = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('auto_quotes', $data); 
        }
        
    }

    public function submitthirdparty($state = NULL, $categoryid = NULL, $publisherid = NULL, $subpublisherid = NULL) {
        $phone  = $this->security->xss_clean($this->input->post('telephone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        if($this->checkEmailPhoneValidate($email,$phone)){
            $prefered_advertiser = $this->security->xss_clean($this->input->post("prefered_advertiser"));
            $isPrevious = $this->business_model->isPrevoiusVisitorForSameCategoryWithPhone($phone,THIRD_PARTY_ONLY,$prefered_advertiser);
//            $checksession = $this->checkSessionCategory($phone,THIRD_PARTY_ONLY);
//            if($isPrevious == 0){
//                if($checksession){
//                    $isPrevious = 1;
//                }
//            }
            
            if($isPrevious == 0){
                $res1 = $this->business_model->thirdpartyonly();
                if ($res1 === 2) {
                    echo '<script>alert("Email already used, please try after 2 months time interval")</script>';
                }
                //$this -> load -> view('include/header');
            }
            

            $result = $this->business_model->getthirdpartylink($prefered_advertiser);
            if (isset($result) && !empty($result)) {

                redirect($result);
            } else {
                $advDetail = $this->business_model->getAdvDetail($prefered_advertiser);
                //$mails=$this->security->xss_clean($this->input->post('email-input'));
                //$isprevois=$this->business_model->isPrevoiusVisitor($mails,AUTO_INSURANCE,$savedata);
                if (is_array($advDetail) && count($advDetail) > 0) {
                    $advdetail = $advDetail[0];
                    $data['adv_name'] = $mailData['adv_name'] = $advdetail->name;
                }
                $advBannerWithUserId = $this->business_model->getManageBannerUpdateData($prefered_advertiser);
                $data['advbanner'] = isset($advBannerWithUserId) && is_array($advBannerWithUserId) && !empty($advBannerWithUserId) ? $advBannerWithUserId[0] : "";
                $data['leadQuotes'] = $this->business_model->getLeadQuotes($prefered_advertiser,THIRD_PARTY_ONLY);
                //echo "hi";
                //$savedata = $this->security->xss_clean($this->input->post('prefered_advertiser'));
                //$this->sendmailforleads($savedata);
                $data['category'] = $this->business_model->getCategoryOfId(THIRD_PARTY_ONLY);
                $this->load->view('thanks_view_single',$data);
                //$this -> load -> view('include/footer');
            }
        }else{
            $userid = $this->security->xss_clean($this->input->post('prefered_advertiser'));
            $categoryid = $this->security->xss_clean($this->input->post('categoryid'));
            $state = $this->security->xss_clean($this->input->post('state_name'));
            $publisherid = $this->security->xss_clean($this->input->post('publisherid'));
            $subpublisherid = $this->security->xss_clean($this->input->post('subpublisherid'));
            $data = $this->loadViewOfInsurance($userid,$categoryid,$state,$publisherid,$subpublisherid);
            $this->load->view('third_party', $data); 
        }
        
    }

    //end of work
    //Code by Sarvesh
    public function selectAdvertiser($categoryid = NULL, $state = NULL, $publisherid = NULL, $subpublisherid = NULL) {
        $categoryid = $this->security->xss_clean($this->input->get('category'));
        $state = $this->security->xss_clean($this->input->get('statecode'));
        $publisherid = $this->security->xss_clean($this->input->get('publisherid'));
        $subpublisherid = $this->security->xss_clean($this->input->get('subpublisherid'));
        $resticted_userIds = array();
        $data['state'] = $state;
        $data['categoryid'] = $categoryid;
        $data['publisherid'] = $publisherid;
        $data['subpublisherid'] = $subpublisherid;
        $data['states'] = $this->adv_operation_model->getStates();
        //$data['prefered']= $this->business_model->getPreferedAdvertisers($categoryid);
        $advertiser = $this->business_model->getPreferedAdvertisers($categoryid);
        //print_r($advertiser);
        $advIds = array();
        foreach ($advertiser as $advmoney) {
            foreach ($advmoney as $adv) {
                $advIds[] = $adv->userId;
            }
        }
        $advDetails = array();
        if (isset($advIds) && !empty($advIds)) {
            foreach ($this->business_model->getManageBannerUpdateData($advIds) as $catDetail) {
                $advDetails["'$catDetail->advertiser_id'"] = $catDetail;
            }

            $joinArray = array();

            foreach ($advertiser as $advmoney) {
                foreach ($advmoney as $adv) {
//                                        print_r($adv);
//                                        print_r($advDetails["'$adv->userId'"]);
                    if (!isset($advDetails["'$adv->userId'"])) {
                        $advDetails["'$adv->userId'"] = (object) array("logo" => "", "home_insurance_title" => "", "home_insurance" => "", "life_insurance_title" => "", "life_insurance" => "", "auto_insurance_title" => "", "auto_insurance" => "", "health_insurance_title" => "", "health_insurance" => "", "business_insurance_title" => "", "business_insurance" => "", "travel_insurance_title" => "", "travel_insurance" => "");
                    }
                    $joinArray[] = (object) array_merge((array) $adv, (array) $advDetails["'$adv->userId'"]);
                }
            }
            //print_r($joinArray);
            $data["joinArray"] = $joinArray;
            //print_r($data["joinArray"]);
            $data['manageBannerData'] = $this->business_model->getManageBannerUpdateData($advIds);
        }
//                              print_r($resticted_userIds);
        $data['prefered'] = $advertiser;
        if (is_array($advertiser) && count($advertiser) > 0) {//echo $publisherid;
            $user = $this->adv_operation_model->getpublisherActive($publisherid);
            $categories = $this->category_model->getcategary($categoryid);
            $cat = isset($categories) && is_array($categories) && count($categories) > 0 ? $categories[0] : NULL;
            //print_r($categories);
            if (isset($user) && is_object($user) && $user->userId > 0) {
                if ($user->isDeleted == "0") {
                    if ($user->isActive == "1") {
                        $user = $this->adv_operation_model->getLeadformClicks($publisherid, $categoryid);
                        if (isset($cat)) {
                            //print_r($cat);

                            if ($cat->isActive == '1') {

                                $this->load->view('selectadvertiser', $data);
                            }
                        } else {
                            // error .. no such category ..
                            $data["msg"] = "No Such Category Exists";
                            $this->load->view('pubAccount_error', $data);
                        }
                    } else {
                        $data["msg"] = "Your Account Has Been Deactivated by Admin";
                        $this->load->view('pubAccount_error', $data);
                    }
                } else {
                    $data["msg"] = "Your Account Has Been Deleted by Admin";
                    $this->load->view('pubAccount_error', $data);
                }
            } else {
                $data["msg"] = "No Such User Exists";
                $this->load->view('pubAccount_error', $data);
            }
        } else {
            $this->load->view('thanks_view_for_suspended');
        }
    }

    // Sarvesh work 06_02_2015
    public function getInsured() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $data['page_name'] = 'Get Insured';
        $data['page'] = "";
        $data['title'] = 'Get Insured';
        $data['meta_name'] = 'Get Insured';
        $data['meta_desc'] = 'Get Insured';
        $data['activeStatus'] = '.focused';
        $this->load->view('include/header', $data);
        $this->load->view('get_insured_static');
        $this->load->view('include/footer');
    }

    // Sarvesh work 25_02_2015
    public function sendSmsToUser($phone='', $name='') {
        $msg = 'Dear '.$name.', Your request for insurance quotes was successfully submitted. You will be contacted shortly! Thank you.';
        $url = 'http://www.smsmarketingportal.com/components/com_spc/smsapi.php?username='.SMS_USER_NAME.'&password='.SMS_PASSWORD.'&sender='.SMS_SENDER .'&recipient='.$phone.'&message='.urlencode($msg);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
   
//public function testSendmail(){
//        
//        $savedata = 118;
//        $mailData['state_name'] = "abia";
//        $mailData['statename'] = "abuja";
//        $mailData['selectgender'] = "male";
//        $mailData['dob'] = "07/06/2015";
//        $mailData['Tobacco_Nicotine_user'] = "No";
//        $mailData['insured-select'] = "true";
//        $mailData['your_health'] = "Excellent: I could be a professional athlete";
//        $mailData['fullname'] = "Chinedu Ojuor";
//        $mailData['email'] = "neeta.agrawal.sspl@gmail.com";
//        $mailData['address-input'] = "Bode Thomas, Lagos";
//        $mailData['phone'] = "07089996189";
//        $advDetail = $this->business_model->getAdvDetail($savedata);
//        if (is_array($advDetail) && count($advDetail) > 0) {
//            $advdetail = $advDetail[0];
//            $mailTo = "neeta.agrawal.sspl@gmail.com";
//            $mailData['adv_name'] = $advdetail->name;
//            $mailData['base_url'] = $this->config->base_url();
//            $subject = 'New Lead Alert:' . $advdetail->name;
//            require_once("mailer/Email.php");
//            $emailSender = new Email();
//            $emailSender->SendEmail('health_admin_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
//           
//        }
//
//        $this->load->view('thanks_view');
//        //$this -> load -> view('include/footer');
//    }
    //End sarvesh task   
}
