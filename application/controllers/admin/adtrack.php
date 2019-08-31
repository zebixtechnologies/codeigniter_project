<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ob_start();
session_start(); //we need to call PHP's session object to access it through CI

class adtrack extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/adv/adv_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $data['records'] = $this->adv_model->getadsList();
            $this->load->view('admin/home_header', $data);
            $this->load->view('admin/adtrack/adtrack_manage_view');
            $this->load->view('admin/home_footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function adtrackdetail($adStatusId) {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $data['statusReport'] = $this->adv_model->getadTrackRecords($adStatusId);
            $this->load->view('admin/home_header', $data);
            $this->load->view('admin/adtrack/adtrack_detail_view');
            $this->load->view('admin/home_footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function adclickdetail($adId) {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $data['statusReport'] = $this->adv_model->getallClicks($adId);
            $this->load->view('admin/home_header', $data);
            $this->load->view('admin/adtrack/adclick_manage_view');
            $this->load->view('admin/home_footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function rollbacktransaction($adStatusId) {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $result = $this->adv_model->rollBackTransaction($adStatusId);
            echo $result;
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function declinerequest($adId) {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $this->adv_model->refadReq($adId);
            redirect('admin/adv_manage');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function overclick() {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $data['records'] = $this->adv_model->getallLeads();
            $this->load->view('admin/home_header', $data);
            $this->load->view('admin/adtrack/over_click_manage');
            $this->load->view('admin/home_footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function leadformViews() {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $data['records'] = $this->adv_model->getallcategories();
            if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                    $data[$key] = $value;
                }
                $start = 0;
                $end = 0;
                if ($_GET['datepicker_from'] != '' && $_GET['datepicker_from'] != null) {
                    $start = strtotime($_GET['datepicker_from'] . " midnight");
                    $end = $_GET['datepicker_to'] != '' && $_GET['datepicker_to'] != null ? strtotime($_GET['datepicker_to'] . " midnight") + 86400 : 0;
                }
                //echo $end;
                $data['records_info'] = $this->adv_model->getoldviews($start, $end);
            } else {
                $data['records_info'] = $this->adv_model->getleadsviews();
            }
            $this->load->view('admin/home_header', $data);
            $this->load->view('admin/adtrack/lead_form_views');
            $this->load->view('admin/home_footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function leadscatviews() {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                    $data[$key] = $value;
                }
                $start = "0";
                $end = "0";
                if ($_GET['datepicker_from'] != '' && $_GET['datepicker_from'] != null) {
                    $start = strtotime($_GET['datepicker_from'] . " midnight");
                    $end = $_GET['datepicker_to'] != '' && $_GET['datepicker_to'] != null ? strtotime($_GET['datepicker_to'] . " midnight") + 86400 : 0;
                }
                $data['totalviews'] = $this->adv_model->getOldcatviews($start, $end);
                $data['totalleads'] = $this->adv_model->gettotaloldleads($start, $end);
            } else {
                $data['totalviews'] = $this->adv_model->gettotalViews();
                $data['totalleads'] = $this->adv_model->gettotalleads();
            }

            //$data['cat']=$this->pub_operation_model->getCategories();
            $this->load->view('admin/home_header', $data);
            $this->load->view('admin/adtrack/lead_cat_views');
            $this->load->view('admin/home_footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function generatePass($length = 10) {
        $characters = '012fGsdafGERHJHGHDF1G2DS1FG1DfghS1FG32fdsgdfsgdf1DF3G1DS32F1G32D1FG31DFSF3G21DF321G3D2F1GDF1G3DTU1TYU1TRY1UIT1TYJ3GDFS4567A8GFDGGSDFGDFSGDSFGDFG997t89re7t877q98r7qer87tr87uy8t7i7u8i7u87of87d8g7f7hg78j7h78k987l4g5f456h4gf54j5h45kj44f54gf54hf55j4544g54fh45j44jk54cxzvvbxb4vnvbcn4v4bn45vbDSA4GSGF5456H4G5H456454HFG54HF874gdf564g56df56g4df564g56df4GSDGHFGGSDG908yGFDSG984oeijhg85GDSFGDSF4oitg98gj1FGSFDSGDSFGDG00147gDSFG85236GDFSGSDFTdfgdsEUdfghdsjkgdsffsweqwdfdsfggghgghjGgHJgjhGfghHJgGJgJhhfgHJggggggJgJHggJGjGhjdfhjkfdgjkldj974T5R4ET98ERTE8G4ERG5RE4G4ERE5RG48E4G1F864G4GH5DFS4H4KJ5H4GK444ffsadff45sd64f564sfds4g98hbdf56f4f4dsg4df5s64g564O4F539517539DF12354DFGDS8935845255';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function requestapproval($adId) {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $request_pending = $this->adv_model->getAdvReq($adId);
            $sendata = '';
            foreach ($request_pending as $req) {
                $user_email = $req->email;
                $userName = $req->userName;
                $adId = $req->adId;
                $ADV_name = $req->adName;
                $ADV_title = $req->adTitle;
            }
            $sendata .='<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
					&times;</button>
					<h3 id="myModalLabel">AD  Request Approval</h3>
					</div>
					<div class="modal-body">
					<form name="approval_mail" action="' . $this->config->base_url() . 'admin/adv_manage/approvalMail" method="post" id="approval_mail" onsubmit="return false;">
					<div class="row-fluid">
							<div class="control-group">
							<label class="control-label" for="task">Hello ' . $user_data['user_name'] . ' ,<br/>
								<strong>If you Want To give Special Messege To the user Please Write in Below . otherwise leave it blank.</strong>
							</label>
							<div class="controls">
							<textarea name="mail_massage" class="span12"></textarea>
							<input type="hidden" name="adId" value="' . $adId . '"/>
							<input type="hidden" name="user_email" value="' . $user_email . '"/>
							<input type="hidden" name="userName" value="' . $userName . '"/>
							<input type="hidden" name="ADV_name" value="' . $ADV_name . '"/>
							<input type="hidden" name="ADV_title" value="' . $ADV_title . '"/>
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
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function approvalMail() {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $adId = $this->security->xss_clean($this->input->post('adId'));
            $user_email = $this->security->xss_clean($this->input->post('user_email'));
            $userName = $this->security->xss_clean($this->input->post('userName'));
            $ADV_name = $this->security->xss_clean($this->input->post('ADV_name'));
            $ADV_title = $this->security->xss_clean($this->input->post('ADV_title'));
            $mail_massage = $this->security->xss_clean($this->input->post('mail_massage'));
            $result = $this->adv_model->updateAdVApproval($adId, $mail_massage);
            $mailData['User_name_data'] = $userName;
            $mailData['ADV_title'] = $ADV_title;
            $mailData['ADV_name'] = $ADV_name;
            $mailData['admin_message'] = $mail_massage;
            $mailData['Site_name'] = SITE_NAME;
            $mailData['site_number'] = SITE_CUSTOMER_CARE;
            $mailData['{base_url}'] = $this->config->base_url();

            if ($result) {
                require_once("mailer/Email.php");
                $emailSender = new Email();
                $emailSender->SendEmail('ad_request_approval', $mailData, $user_email, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, 'You Ad Request Approval');
            }
            echo 1;
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function mailtocutomer($adId) {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $request_pending = $this->adv_model->getAdvReq($adId);
            $sendata = '';
            foreach ($request_pending as $req) {
                $user_email = $req->email;
                $userName = $req->userName;
                $adId = $req->adId;
                $ADV_name = $req->adName;
                $ADV_title = $req->adTitle;
            }
            $sendata .='<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
							&times;</button>
							<h3 id="myModalLabel"> Mail To Customer </h3>
							</div>
							<div class="modal-body">
							<form name="reply_mail" action="' . $this->config->base_url() . 'admin/adv_manage/mailtocutomerprocess" method="post" id="reply_mail" onsubmit="return false;">
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
									<input type="hidden" name="adId" value="' . $adId . '"/>
									<input type="hidden" name="user_email" value="' . $user_email . '"/>
									<input type="hidden" name="userName" value="' . $userName . '"/>
									<input type="hidden" name="ADV_name" value="' . $ADV_name . '"/>
									<input type="hidden" name="ADV_title" value="' . $ADV_title . '"/>
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
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function mailtocutomerprocess() {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $random_pass = $this->generatePass();


            $adId = $this->security->xss_clean($this->input->post('adId'));
            $user_email = $this->security->xss_clean($this->input->post('user_email'));
            $userName = $this->security->xss_clean($this->input->post('userName'));
            $ADV_name = $this->security->xss_clean($this->input->post('ADV_name'));
            $ADV_title = $this->security->xss_clean($this->input->post('ADV_title'));
            $mail_massage = $this->security->xss_clean($this->input->post('mail_massage'));
            $subject_mail = $this->security->xss_clean($this->input->post('subject_mail'));
            $result = $this->adv_model->updateAdvReply($adId, $mail_massage);


            $mailData['User_name_data'] = $userName;
            $mailData['ADV_title'] = $ADV_title;
            $mailData['ADV_name'] = $ADV_name;
            $mailData['admin_message'] = $mail_massage;
            $mailData['Site_name'] = SITE_NAME;
            $mailData['site_number'] = SITE_CUSTOMER_CARE;
            $mailData['{base_url}'] = $this->config->base_url();

            if ($result) {
                require_once("mailer/Email.php");
                $emailSender = new Email();
                $emailSender->SendEmail('reply_mail', $mailData, $user_email, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject_mail);
            }
            echo 1;
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    // by raj

    public function showLeadDetails($form_data_id) {
        $data = $this->adv_model->getLeadsDetails($form_data_id);
        //print_r($data);
        //echo $data->categoryId;
        // AUTO INSURANCE
        if ($data->categoryId == AUTO_INSURANCE) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                            <div class="row-fluid">
                                            <div class="control-group">';

            foreach ($leadData->vehicle as $veh) {
                $sendata.='<div>';
                $sendata.='<div class="row1"><label for="task"> Vehicle Year :</label>';
                $sendata.='<label  for="task">' . $veh->vehicleyear . '</label></div>';
                $sendata.='<div class="row1"><label for="task"> Vehicle Make :</label>';
                $sendata.='<label  for="task">' . $veh->vehiclemake . '</label></div>';
                $sendata.='<div class="row1"><label for="task"> Vehicle Model :</label>';
                $sendata.='<label  for="task">' . $veh->vehiclemodel . '</label></div>';
                $sendata.='<div class="row1"><label for="task"> Cost of Vehicle (₦) :</label>';
                $sendata.='<label  for="task">' . $veh->vehiclecost . '</label></div></div>';
                /* $sendata.='<div class="row1"><label for="task"> Vehicle Series :</label>';
                  $sendata.='<label  for="task">'.$veh->vehicleseries.'</label></div>';
                  $sendata.='<div class="row1"><label for="task"> Ownership :</label>';
                  $sendata.='<label  for="task">'.$veh->vehicleown.'</label></div>';
                  $sendata.='<div class="row1"><label for="task"> Night Parking :</label>';
                  $sendata.='<label  for="task">'.$veh->vehiclepark.'</label></div>';
                  $sendata.='<div class="row1"><label for="task"> Primary Use :</label>';
                  $sendata.='<label  for="task">'.$veh->vehicleuse.'</label></div>';
                  $sendata.='<div class="row1"><label for="task"> Annual Mileage :</label>';
                  $sendata.='<label  for="task">'.$veh->vehiclemileage.'</label></div></div>'; */
            }
            foreach ($leadData->driver as $dev) {
                $sendata.='<div>';
//                $sendata.='<div class="row1"><label for="task"> First Name:</label>';
//                $sendata.='<label  for="task">' . $dev->firstname . '</label></div>';
//                $sendata.='<div class="row1"><label for="task"> Last Name :</label>';
//                $sendata.='<label  for="task">' . $dev->lastname . '</label></div>';
                $sendata.='<div class="row1"><label for="task"> Your Full Name :</label>';
                $sendata.='<label  for="task">' . $dev->fullname . '</label></div>';
//                $sendata.='<div class="row1"><label for="task"> Gender :</label>';
//                $sendata.='<label  for="task">' . $dev->gender . '</label></div>';
//                $sendata.='<div class="row1"><label for="task"> Date of Birth :</label>';
//                $sendata.='<label  for="task">' . $dev->dob . '</label></div>';
//                $sendata.='<div class="row1"><label for="task"> Marital Status :</label>';
//                $sendata.='<label  for="task">' . $dev->marital . '</label></div>';
                // $sendata.='<div class="row1"><label for="task"> Education :</label>';
                //$sendata.='<label  for="task">'.$dev->education.'</label></div>';
                // $sendata.='<div class="row1"><label for="task"> Home ownership :</label>';
                // $sendata.='<label  for="task">'.$dev->homeowner.'</label></div>';
                $sendata.='<div class="row1"><label for="task"> Occupation :</label>';
                $sendata.='<label  for="task">' . $dev->occupation . '</label></div>';
//                $sendata.='<div class="row1"><label for="task"> License Status :</label>';
//                $sendata.='<label  for="task">' . $dev->licance . '</label></div>';
//                $sendata.='<div class="row1"><label for="task"> Any accidents in the past 3 years? :</label>';
//                $sendata.='<label  for="task">' . $dev->accidents . '</label></div></div>';
            }
//            $sendata.='<div><div class="row1"><label for="task"> Have you had insurance in the past 30 days? :</label>';
//            $sendata.='<label  for="task">' . $leadData->insured . '</label></div>';
//            $sendata.='<div><div class="row1"><label for="task"> Current Insurance Company :</label>';
//            $sendata.='<label  for="task">' . str_replace("And", "&", $leadData->insurer) . '</label></div></div>';
            $sendata.='<div><div class="row1"><label for="task"> Telephone :</label>';
            $sendata.='<label  for="task">' . $leadData->phone . '</label></div>';
            $sendata.='<div class="row1"><label for="task"> Email :</label>';
            $sendata.='<label  for="task">' . $leadData->email . '</label></div>';
            $sendata.='<div class="row1"><label for="task"> State :</label>';
            $sendata.='<label  for="task">' . $leadData->zip . '</label></div>';
            $sendata.='<div class="row1"><label for="task"> Street Address :</label>';
            $sendata.='<label  for="task">' . $leadData->address . '</label></div></div>';

            $sendata.='</div></div></div>';
            echo $sendata;
        } elseif ($data->categoryId == HOME_INSURANCE) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                            <div class="row-fluid">
                                            <div class="control-group">';
            $sendata.='<div><div class="row1"><label for="task"> Name :</label>';
            $sendata.='<label  for="task">' . $leadData->name . '</label></div>';
//            $sendata.='<div><div class="row1"><label for="task"> Marital Status :</label>';
//            $sendata.='<label  for="task">' . $leadData->marital_status . '</label></div>';
            $sendata.='<div><div class="row1"><label for="task"> Email :</label>';
            $sendata.='<label  for="task">' . $leadData->email . '</label></div>';

            $sendata.='<div><div class="row1"><label for="task"> Phone Number:</label>';
            $sendata.='<label  for="task">' . $leadData->phone . '</label></div>';
//            $sendata.='<div><div class="row1"><label for="task"> Employment :</label>';
//            $sendata.='<label  for="task">' . $leadData->employment . '</label></div>';
            $sendata.='<div><div class="row1"><label for="task"> Street Address :</label>';
            $sendata.='<label  for="task">' . $leadData->address . '</label></div>';
            $sendata.='<div><div class="row1"><label for="task"> State of Residence :</label>';
            $sendata.='<label  for="task">' . $leadData->state . '</label></div>';
//            $sendata.='<div><div class="row1"><label for="task"> Zipcode :</label>';
//            $sendata.='<label  for="task">' . $leadData->zipcode . '</label></div>';

            $sendata.='<div><div class="row1"><label for="task"> Property Type :</label>';
            $sendata.='<label  for="task">'.$leadData->property_type.'</label></div>'; 
            $sendata.='<div><div class="row1"><label for="task"> Number of Rooms :</label>';
            $sendata.='<label  for="task">' . $leadData->number_of_rooms . '</label></div>';
            $sendata.='<div><div class="row1"><label for="task"> Insurance Type :</label>';
            $sendata.='<label  for="task">' . $leadData->insurance_type . '</label></div>';
            $sendata.='<div><div class="row1"><label for="task"> Cost of Home (₦):</label>';
            $sendata.='<label  for="task">' . $leadData->cost_of_home . '</label></div>';
            /* $sendata.='<div><div class="row1"><label for="task"> Number of bathrooms :</label>';
              $sendata.='<label  for="task">'.$leadData->number_of_bathrooms.'</label></div>'; */
            $sendata.='</div></div></div></div>';
            echo $sendata;
        } elseif ($data->categoryId == LIFE_INSURANCE) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            //print_r($leadData);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row-fluid">
                                    <div class="control-group">';
            $sendata .= <<<EOT
<div>
    <div class="row1"><label for="task"> Name :</label><label  for="task">{$leadData->person->fullname}</label></div>
    <div class="row1"><label for="task"> Email :</label><label  for="task">{$leadData->person->email}</label></div>
    <div class="row1"><label for="task"> Phone :</label><label  for="task">{$leadData->person->phone}</label></div>
    <div class="row1"><label for="task"> Gender :</label><label  for="task">{$leadData->person->gender}</label></div>
    <div class="row1"><label for="task"> Date Of Birth :</label><label  for="task">{$leadData->person->dateofbirth}</label></div>
    <div class="row1"><label for="task"> State of residence :</label><label  for="task">{$leadData->person->statename}</label></div>
    <div class="row1"><label for="task"> Coverage amount :</label><label  for="task">{$leadData->person->coverageAmount}</label></div>
    <div class="row1"><label for="task"> Term Length :</label><label  for="task">{$leadData->person->termlenght}</label></div>
    <div class="row1"><label for="task"> Tobacco / Nicotine user? :</label><label  for="task">{$leadData->person->addicted}</label></div>
    <div class="row1"><label for="task"> Tell us about your Health :</label><label  for="task">{$leadData->person->health}</label></div>
</div>
</div></div></div>
EOT;
            echo $sendata;
        } elseif ($data->categoryId == BUSINESS_INSURANCE) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                            <div class="row-fluid">
                                            <div class="control-group">';
            $sendata .= <<<EOT
<div>
    <div class="row1"><label for="task"> Name :</label><label  for="task">{$leadData->name}</label></div>
   	<div class="row1"><label for="task"> Email :</label><label  for="task">{$leadData->email}</label></div>
    <div class="row1"><label for="task"> Phone :</label><label  for="task">{$leadData->phone}</label></div>
    <div class="row1"><label for="task"> Date Of Birth :</label><label  for="task">{$leadData->dateofbirth}</label></div>
    <div class="row1"><label for="task"> Business Insurance Type :</label><label  for="task">{$leadData->businessinsurancetype}</label></div>
    <div class="row1"><label for="task"> Business Policy :</label><label  for="task">{$leadData->businesspolicy}</label></div>
    <div class="row1"><label for="task"> Business Address :</label><label  for="task">{$leadData->businessaddress}</label></div>
</div>
</div></div></div>
EOT;
            echo $sendata;
        } else if ($data->categoryId == TRAVEL_INSURANCE) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            $travellocation = $leadData->travellocation;
            if(trim($leadData->travellocation) == 'Outside-The-Country'){
                $travellocation = $leadData->location_name;
            }
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                            <div class="row-fluid">
                                            <div class="control-group">';
            $sendata .= <<<EOT
<div>
    <div class="row1"><label for="task"> Name :</label><label  for="task">{$leadData->name}</label></div>
    <div class="row1"><label for="task"> Email :</label><label  for="task">{$leadData->email}</label></div>
    <div class="row1"><label for="task"> Phone :</label><label  for="task">{$leadData->phone}</label></div>
    <div class="row1"><label for="task"> Date Of Birth :</label><label  for="task">{$leadData->dateofbirth}</label></div>
    <div class="row1"><label for="task"> Travel Location :</label><label  for="task">{$travellocation}</label></div>
    <div class="row1"><label for="task"> Policy Start Date :</label><label  for="task">{$leadData->travelstartdate}</label></div>
    <div class="row1"><label for="task"> Policy Duration :</label><label  for="task">{$leadData->travelduration}</label></div>
    <div class="row1"><label for="task"> Policy Type :</label><label  for="task">{$leadData->policytype}</label></div>
    <div class="row1"><label for="task"> How many persons require this cover? : </label><label  for="task">{$leadData->coverperson}</label></div>
    <div class="row1"><label for="task"> Cover High-value Specified Items Such As Laptops And Digital Cameras? :</label><label  for="task">{$leadData->coverhighvalueitem}</label></div>
</div>
</div></div></div>
EOT;
            echo $sendata;
        } else if ($data->categoryId == Education_INSURANCE) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                            <div class="row-fluid">
                                            <div class="control-group">';
            $sendata .= <<<EOT
<div>
    <div class="row1"><label for="task"> Name :</label><label  for="task">{$leadData->name}</label></div>
    <div class="row1"><label for="task"> Email :</label><label  for="task">{$leadData->email}</label></div>
    <div class="row1"><label for="task"> Phone :</label><label  for="task">{$leadData->phone}</label></div>
    <div class="row1"><label for="task"> Degree Level :</label><label  for="task">{$leadData->degreelevel}</label></div>
    <div class="row1"><label for="task"> Program of Interest/Area of Study :</label><label  for="task">{$leadData->area}</label></div>
</div>
</div></div></div>
EOT;
            echo $sendata;
        } else if ($data->categoryId == PAYDAY_LOAN) {
            $leadData = simplexml_load_string($data->form_data);
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData->loanamount = str_replace("?", "₦", $leadData->loanamount);
            $leadData->netincome = str_replace("?", "₦", $leadData->netincome);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                            <div class="row-fluid">
                                            <div class="control-group">';
            $sendata .= <<<EOT
<div>
    <div class="row1"><label for="task"> Name :</label><label  for="task">{$leadData->fullname}</label></div>
    <div class="row1"><label for="task"> Email :</label><label  for="task">{$leadData->email}</label></div>
    <div class="row1"><label for="task"> Phone :</label><label  for="task">{$leadData->phone}</label></div>
    <div class="row1"><label for="task"> Date Of Birth :</label><label  for="task">{$leadData->dob}</label></div>
    <div class="row1"><label for="task"> Loan Amount :</label><label  for="task">{$leadData->loanamount}</label></div>
    <div class="row1"><label for="task"> State Of Residence :</label><label  for="task">{$leadData->residence}</label></div>
    <div class="row1"><label for="task"> Best Contact Time :</label><label  for="task">{$leadData->contacttime}</label></div>
    <div class="row1"><label for="task"> Street Address :</label><label  for="task">{$leadData->streetaddress}</label></div>
    <div class="row1"><label for="task"> Income Source :</label><label  for="task">{$leadData->incomesource}</label></div>
    <div class="row1"><label for="task"> Monthly Net Income :</label><label  for="task">{$leadData->netincome}</label></div>
    <div class="row1"><label for="task"> Employer Name :</label><label  for="task">{$leadData->employername}</label></div>
    <div class="row1"><label for="task"> Job Title :</label><label  for="task">{$leadData->jobtitle}</label></div>
    <div class="row1"><label for="task"> Time Employed :</label><label  for="task">{$leadData->timeemployed}</label></div>
</div>
</div></div></div>
EOT;
            echo $sendata;
        } else if ($data->categoryId == HOTELS) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            $leadData->budget = str_replace("?", "₦", $leadData->budget);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                            <div class="row-fluid">
                                            <div class="control-group">';
            $sendata .= <<<EOT
<div>
    <div class="row1"><label for="task"> Name :</label><label  for="task">{$leadData->fullname}</label></div>
    <div class="row1"><label for="task"> Email :</label><label  for="task">{$leadData->email}</label></div>
    <div class="row1"><label for="task"> Phone :</label><label  for="task">{$leadData->phone}</label></div>
    <div class="row1"><label for="task"> Prefered State For Hotel :</label><label  for="task">{$leadData->preferedstate}</label></div>
    <div class="row1"><label for="task"> Preferred city :</label><label  for="task">{$leadData->city}</label></div>
    <div class="row1"><label for="task"> Check in date :</label><label  for="task">{$leadData->checkin}</label></div>
    <div class="row1"><label for="task"> Check out date :</label><label  for="task">{$leadData->checkout}</label></div>
    <div class="row1"><label for="task"> Rooms :</label><label  for="task">{$leadData->rooms}</label></div>
    <div class="row1"><label for="task"> Budget Per Room Per Night :</label><label  for="task">{$leadData->budget}</label></div>
    <div class="row1"><label for="task"> Need Pick Up Service? :</label><label  for="task">{$leadData->pickupservice}</label></div>
    <div class="row1"><label for="task"> Pick-Up Address And Pick-up Time :</label><label  for="task">{$leadData->pickupinfo}</label></div>
</div>
</div></div></div>
EOT;
            echo $sendata;
        } elseif ($data->categoryId == Health_insurance) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            //print_r($leadData);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row-fluid">
                                    <div class="control-group">';
            $sendata .= <<<EOT
<div>
    <div class="row1"><label for="task"> Name :</label><label  for="task">{$leadData->person->fullname}</label></div>
    <div class="row1"><label for="task"> Email :</label><label  for="task">{$leadData->person->email}</label></div>
    <div class="row1"><label for="task"> Phone :</label><label  for="task">{$leadData->person->phone}</label></div>
    <!--<div class="row1"><label for="task"> Gender :</label><label  for="task">{$leadData->person->gender}</label></div>
    <div class="row1"><label for="task"> Date Of Birth :</label><label  for="task">{$leadData->person->dateofbirth}</label></div>-->
    <div class="row1"><label for="task"> How many people require Health Insurance? :</label><label  for="task">{$leadData->person->noofpeople}</label></div>
    <div class="row1"><label for="task"> State of residence :</label><label  for="task">{$leadData->person->statename}</label></div>
    <div class="row1"><label for="task"> Tobacco / Nicotine user? :</label><label  for="task">{$leadData->person->addicted}</label></div>
    <div class="row1"><label for="task"> Tell us about your Health :</label><label  for="task">{$leadData->person->health}</label></div>
    <!--<div class="row1"><label for="task">Have you previously had health insurance coverage?</label><label  for="task">{$leadData->person->insured}</label></div>-->
    <div class="row1"><label for="task">Street address:</label><label  for="task">{$leadData->person->address}</label></div>
</div>
</div></div></div>
EOT;
            echo $sendata;
        } else if ($data->categoryId == CAR_LOAN) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            //$leadData->loanamount = str_replace("?", "₦", $leadData->loanamount);
            $leadData->income = str_replace("?", "₦", $leadData->income);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                            <div class="row-fluid">
                                            <div class="control-group">';
            $sendata .= <<<EOT
<div>
    <div class="row1"><label for="task"> Employer Name :</label><label  for="task">{$leadData->empname}</label></div>
    <div class="row1"><label for="task"> Employer Phone :</label><label  for="task">{$leadData->empphone}</label></div>
    <div class="row1"><label for="task"> Email Address :</label><label  for="task">{$leadData->email}</label></div>
    <div class="row1"><label for="task"> Time At Job :</label><label  for="task">{$leadData->timeatjob}</label></div>
    <div class="row1"><label for="task"> Occupation :</label><label  for="task">{$leadData->occupation}</label></div>
    <div class="row1"><label for="task"> Monthly Income :</label><label  for="task">{$leadData->income}</label></div>
    <div class="row1"><label for="task"> Birthdate :</label><label  for="task">{$leadData->birthdate}</label></div>
    <div class="row1"><label for="task"> Credit Problem :</label><label  for="task">{$leadData->crdProb}</label></div>
    <div class="row1"><label for="task"> Time at Residence :</label><label  for="task">{$leadData->timeatResidence}</label></div>
    <div class="row1"><label for="task"> Rent/Morgage :</label><label  for="task">{$leadData->rent}</label></div>
    <div class="row1"><label for="task"> I Currently :</label><label  for="task">{$leadData->curr}</label></div>
    
</div>
</div></div></div>
EOT;
            echo $sendata;
        } else if ($data->categoryId == AUTO_QUOTES) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            //$leadData->loanamount = str_replace("?", "₦", $leadData->loanamount);
            //$leadData->income = str_replace("?", "₦", $leadData->income);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                            <div class="row-fluid">
                                            <div class="control-group">';
            $sendata .= <<<EOT
<div>
    <div class="row1"><label for="task"> Vehicle Year :</label><label  for="task">{$leadData->vyear}</label></div>
    <div class="row1"><label for="task"> Vehicle Make :</label><label  for="task">{$leadData->vmake}</label></div>
    <div class="row1"><label for="task"> Vehicle Model :</label><label  for="task">{$leadData->vmodel}</label></div>
    <div class="row1"><label for="task"> Exterior Colour :</label><label  for="task">{$leadData->extcolour}</label></div>
    <div class="row1"><label for="task"> Interior Colour :</label><label  for="task">{$leadData->intcolour}</label></div>
    <div class="row1"><label for="task"> Buying Timeframe :</label><label  for="task">{$leadData->btframe}</label></div>
    <div class="row1"><label for="task"> Payment Method :</label><label  for="task">{$leadData->paymentmethod}</label></div>
    <div class="row1"><label for="task"> Full Name :</label><label  for="task">{$leadData->fname}</label></div>
    <div class="row1"><label for="task"> Your Address :</label><label  for="task">{$leadData->address}</label></div>
    <div class="row1"><label for="task"> Your State :</label><label  for="task">{$leadData->state}</label></div>
    <div class="row1"><label for="task"> Phone Number :</label><label  for="task">{$leadData->phone}</label></div>
    <div class="row1"><label for="task"> Email Address :</label><label  for="task">{$leadData->email}</label></div>
    <div class="row1"><label for="task"> Contact Me :</label><label  for="task">{$leadData->contact}</label></div>
    
</div>
</div></div></div>
EOT;
            echo $sendata;
        } else if ($data->categoryId == THIRD_PARTY_ONLY) {
            $data->form_data = str_replace("&", "&amp;", $data->form_data);
            $leadData = simplexml_load_string($data->form_data);
            //$leadData->loanamount = str_replace("?", "₦", $leadData->loanamount);
            //$leadData->income = str_replace("?", "₦", $leadData->income);
            $sendata = '<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                            &times;</button>
                            <h3 id="myModalLabel">Lead Details</h3>
                            </div>
                            <div class="modal-body">
                            <div class="row-fluid">
                                            <div class="control-group">';
            $sendata .= <<<EOT
<div>
    
    <div class="row1"><label for="task"> First Name :</label><label  for="task">{$leadData->firstname}</label></div>
    <div class="row1"><label for="task"> Last Name :</label><label  for="task">{$leadData->lastname}</label></div>
    <div class="row1"><label for="task"> State :</label><label  for="task">{$leadData->state}</label></div>
    <div class="row1"><label for="task"> Telephone :</label><label  for="task">{$leadData->telephone}</label></div>
    <div class="row1"><label for="task"> Email Address :</label><label  for="task">{$leadData->email}</label></div>
    
</div>
</div></div></div>
EOT;
            echo $sendata;
        }
    }

    public function rollbackleadconfermation($form_data_id) {
        $base_url = base_url();
        $sendata = '<div id="dd">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
                &times;</button>
                <h3 id="myModalLabel">Do you want to RollBack..?</h3>
            </div>
            <div class="modal-body">
            <div class="row-fluid">
            <div class="control-group">';
        $sendata .= <<<EOT
            <div>
                <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="{$base_url}admin/adtrack/rollbacklead/{$form_data_id}"<button type="button" id="save" class="btn btn-primary">Confirm</button></a>  
           </div>
          </div></div></div></div>
EOT;
        echo $sendata;
    }

    public function rollbacklead($form_data_id) {
        $this->adv_model->rollbackLeads($form_data_id);
        redirect('admin/adtrack/overclick', 'refresh');
    }

    // end by raj
    //by sarvesh 27 feb 2015
    public function autoreminder() {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                    $data[$key] = $value;
                }
                $start = "0";
                $end = "0";
                if ($_GET['datepicker_from'] != '' && $_GET['datepicker_from'] != null) {
                    $start = strtotime($_GET['datepicker_from'] . " midnight");
                    $end = $_GET['datepicker_to'] != '' && $_GET['datepicker_to'] != null ? strtotime($_GET['datepicker_to'] . " midnight") + 86400 : 0;
                }
//                    $data['totalviews'] = $this->adv_model->getOldcatviews($start,$end);
                $data['totalreminder'] = $this->adv_model->getautoreminder($start, $end);
            } else {
                $data['totalreminder'] = $this->adv_model->getautoreminder("", "");
            }
            $this->load->view('admin/home_header', $data);
            $this->load->view('admin/adtrack/auto_reminder_service_view');
            $this->load->view('admin/home_footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function autoreminderdelete($id) {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $this->adv_model->autoreminderdelete($id);
            redirect('admin/adtrack/autoreminder', 'refresh');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function doupdateautoreminder($id) {
        $this->adv_model->updateprofileautoreminder($id);
    }

    public function updateAutoReminder($id) {

        if ($this->session->userdata('logged_in')) {
            $data = $this->adv_model->getautoreminderbyid($id);
            foreach ($data as $key) {

                $action = base_url() . "admin/adtrack/doupdateautoreminder/$key->id";
                $date = date("Y/m/d", $key->insurance_expiry_date);
                $sendata = <<<EOT
                          
   <script>
    $(function () {
        $("#dtepickr1234").datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script>           
                            
     <form class="form-horizontal" method="post" action="$action" id="update_profile" onsubmit="return submitProfile();">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">&times;</button>
                       <h3 id="myModalLabel">Update Profile</h3>
           </div>
              <div class="row-fluid modal-body">
                    <div class="control-group">                    		
                    <label class="control-label " >Name</label>
                    <div class="controls">
                        <input type="text" name="name" value="{$key->name}">     
                      </div>
                  
                </div>
               <div class="control-group">    
                <label class="control-label" >Phone Number</label>                		
                <div class="controls">
			 <input type="text" name="PhoneNumber" value="{$key->phone_number}">  
                </div>
              </div>
                            <div class="control-group">                    		
                    <label class="control-label " >Email</label>
                    <div class="controls">
                        <input type="text" name="email" value="{$key->email}">     
                      </div>
                  
                </div>
                 <div class="control-group">    
                  <label class="control-label">Currently Insured</label>                		
                  <div class="controls">
                        <select name="current_insurance_status" class="required" value="{$key->current_insurance_status}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                   
				</div>
                </div>
             <div class="control-group">    
                  <label class="control-label">Insurance Type</label>                		
                  <div class="controls">
                    <select id="insurance-type" name="insurance-type" class="small required">
                                        <option selected="selected" value="Third Party Only">Third Party Only</option>
                                        <option value="auto Insurance">Auto (Comprehensive)</option>
                                        <option value="health Insurance">Health Insurance</option>
                                        <option value="home Insurance">Home Insurance</option>
                                        <option value="life Insurance">Life Insurance</option>
                                        <option value="business Insurance">Business Insurance</option>
                                        <option value="travel Insurance">Travel Insurance</option>
                                    </select>
				</div>
                </div>
                    <div class="control-group">    
                  <label class="control-label">Expiry Date</label>                		
                  <div class="controls">
                     <input type='text' class="required datepicker" id="dtepickr1234" name="date" value="{$date}">
                   
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
    }

    public function exportautoreminder() {
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user'] = $user_data;
            $data['totalreminder'] = $this->adv_model->getautoreminder("", "");
            $this->load->view('admin/home_header', $data);
            $this->load->view('admin/adtrack/export_auto_reminder_service_view');
            $this->load->view('admin/home_footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function ExportAutoReminderleads() {
        //print_r($_GET);
        $insurance = array();
        foreach ($_GET as $data) {
            $insurance[] = $data;
        }
        $count = count($insurance);
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $current_user = 'admin';
            $current_user_name = 'autoreminder';
            //$data['user'] = $user_data;
            $filename = 'Keyverticals_' . $current_user_name . '_' . rand() . ".xls";
            $filepath = "downloads/";
            $response = array();
            if (($_GET['Filter_By'] == 'alldata')&& $count!=1) {
                $i = 1;
                for ($i; $i < $count; $i++) {
                    $responsess[] = $this->adv_model->getautoreminderforexport("", "", $insurance[$i]);
                }
                $data = array();
                foreach ($responsess as $responses) {
                    foreach ($responses as $responsess) {

                        $response[] = $responsess;
                    }
                }
            } elseif ($_GET['Filter_By'] == 'weekly' && $count!=1) {
                $dateToday = strtotime(date("Y/m/d")) + 3600;
                $dateTomarrow = strtotime(date("Y/m/d", mktime(0, 0, 0, date("m", $dateToday), date("d", $dateToday) + 7, date("Y", $dateToday)))) + 3600;
                $i = 1;
                for ($i; $i < $count; $i++) {
                    $responsess[] = $this->adv_model->getautoreminderforexport("$dateToday", "$dateTomarrow", $insurance[$i]);
                }
                $data = array();
                foreach ($responsess as $responses) {
                    foreach ($responses as $responsess) {

                        $response[] = $responsess;
                    }
                }
            } elseif ($_GET['Filter_By'] == 'monthly' && $count!=1) {
                $dateToday = strtotime(date("Y/m/d")) + 3600;
                $dateTomarrow = strtotime(date("Y/m/d", mktime(0, 0, 0, date("m", $dateToday), date("d", $dateToday) + 30, date("Y", $dateToday)))) + 3600;
                $i = 1;
                for ($i; $i < $count; $i++) {
                    $responsess[] = $this->adv_model->getautoreminderforexport("$dateToday", "$dateTomarrow", $insurance[$i]);
                }
                $data = array();
                foreach ($responsess as $responses) {
                    foreach ($responses as $responsess) {

                        $response[] = $responsess;
                    }
                }
            }
            if (is_array($response) && !empty($response)) {
                $excel = self::saveLeadsAsExcel($response);
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                try {
                    $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
                    //$objWriter->save('php://output');
                    $objWriter->save($filepath . $filename);
                    //echo base_url(). $filepath . $filename;
                    $objPHPExcel = PHPExcel_IOFactory::load($filepath . $filename);
                    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

//extract to a PHP readable array format
                    foreach ($cell_collection as $cell) {
                        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                        $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

                        //header will/should be in row 1 only. of course this can be modified to suit your need.
                        if ($row == 1) {
                            $header[$row][$column] = $data_value;
                        } else {
                            $arr_data[$row][$column] = $data_value;
                        }
                    }
                    $data['header'] = $header;
                    $data['values'] = $arr_data;
                    foreach ($data['header'] as $hears) {
                        foreach ($hears as $hears) {
                            echo $hears . "\t";
                        }
                        echo "\n";
                    }
                    foreach ($data['values'] as $hears) {
                        foreach ($hears as $hears) {
                            echo $hears . "\t";
                        }
                        echo "\n";
                    }
//send the data in an array format
                } catch (Exception $e) {
                    print_r($e);
                }
                //print_r($excel);
            } else {
                $this->load->library('excel');
                $excel = new Excel();
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            }
        } else {
            //redirect('home','refresh');
        }
    }

    private function setExcelColumns($excel) {
        $excel->getActiveSheet()->setCellValue('A1', 'Name');
        $excel->getActiveSheet()->setCellValue('B1', 'Phone Number');
        $excel->getActiveSheet()->setCellValue('C1', 'Email');
        $excel->getActiveSheet()->setCellValue('D1', 'Current Insurance Status');
        $excel->getActiveSheet()->setCellValue('E1', 'Insurance Type');
        $excel->getActiveSheet()->setCellValue('F1', 'Insurance Expiry Date');
        return $excel;
    }

    private function saveLeadsAsExcel($leads) {
        //load our new PHPExcel library
        $this->load->library('excel');
        $excel = new Excel();

        $i = 2;
        foreach ($leads as $lead) {
            //print_r($lead);
            $excel->setActiveSheetIndex(0);

            $excel->getActiveSheet()->setTitle('Auto Reminder');
            $excel = self::setExcelColumns($excel);
            $excel = self::showautoreminderLeadDetails($excel, $lead, $i);
            $i++;
        }
        //print_r($activeSheets);
        return $excel;
    }

    public function showautoreminderLeadDetails($excel, $duesdata, $i) {

        $excel->getActiveSheet()->setCellValue("A$i", $duesdata->name);
        $excel->getActiveSheet()->setCellValue("B$i", $duesdata->phone_number);
        $excel->getActiveSheet()->setCellValue("C$i", $duesdata->email);
        $excel->getActiveSheet()->setCellValue("D$i", $duesdata->current_insurance_status);
        $excel->getActiveSheet()->setCellValue("E$i", $duesdata->insurance_type);
        $excel->getActiveSheet()->setCellValue("F$i", date("M d,Y", $duesdata->insurance_expiry_date));


        return $excel;
    }

    //end
}

?>