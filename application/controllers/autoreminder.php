<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//we need to call PHP's session object to access it through CI
class autoreminder extends CI_Controller {

//    public $massage;

    function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper('cookie');
        $this->load->model('auto_reminder_model');
    }

    public function index() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $data['page_name'] = 'Auto Reminder';
        $data['page'] = "";
        $data['title'] = 'Auto Reminder';
        $data['meta_name'] = 'Auto Reminder';
        $data['meta_desc'] = 'Auto Reminder';
        $data['activeStatus'] = '.focused';
        $this->load->view('include/header', $data);
        $this->load->view('auto_reminder');
        $this->load->view('include/footer');
    }

    public function reminder() {
        $user_data = $this->session->userdata('user_logged_in');
        $data['user'] = $user_data;
        $username = $this->security->xss_clean($this->input->post('name'));
        $phone = $this->security->xss_clean($this->input->post('phone_number'));
        $email = $this->security->xss_clean($this->input->post('email-input'));
        $this->sendSmsToUser($phone, $username);
        if (!empty($email)) {
            $this->auto_reminder_model->setAutoReminder();
            $mailTo = $email;
            $mailData['name'] = $username;
            $mailData['base_url'] = $this->config->base_url();
            $subject = 'Insurance Policy Auto Reminder';
            require_once("mailer/Email.php");
            $emailSender = new Email();
            $emailSender->SendEmail('auto_reminder_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
            $user_data = $this->session->userdata('user_logged_in');
            $data['user'] = $user_data;
            $this->load->view('thanks_view_auto_reminder');
        } else {
            $this->load->view('include/header', $data);
            $this->load->view('home_view');
            $this->load->view('include/footer');
        }
    }

    public function sendSmsToUser($phone='', $name='') {
        $msg = 'Your auto reminder service has been successfully set up on the Key Verticals platform. We will send you a reminder one day to your current insurance expiry date';
        $url = 'http://www.smsmarketingportal.com/components/com_spc/smsapi.php?username='.SMS_USER_NAME.'&password='.SMS_PASSWORD.'&sender='.SMS_SENDER.'&recipient='.$phone.'&message='.urlencode($msg);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function cronjob() {
        $dateToday = strtotime(date("Y/m/d")) + 3600;
        $dateTomarrow = strtotime(date("Y/m/d", mktime(0, 0, 0, date("m", $dateToday), date("d", $dateToday) + 1, date("Y", $dateToday)))) + 3600;
        $result = $this->auto_reminder_model->getExpiryTimeForUser($dateTomarrow);
        if (is_array($result) && isset($result) && !empty($result)) {
            foreach ($result as $key => $value) {
                $this->sendSmsToUserexpiry($value->phone_number, $value->name);
                $mailData['name'] = $value->name;
                $mailTo = $value->email;
                $mailData['base_url'] = $this->config->base_url();
                $subject = 'Insurance Policy Expiry Reminder';
                require_once("mailer/Email.php");
                $emailSender = new Email();
                $emailSender->SendEmail('expiry_reminder_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
            }
        }
        $resultadmin = $this->auto_reminder_model->getExpiryTimeForAdmin($dateToday);
        //print_r($resultadmin);
        if (is_array($resultadmin) && isset($resultadmin) && !empty($resultadmin)) {
            $massage = "";
            foreach ($resultadmin as $key => $value) {
                $date = date('Y/m/d', $value->insurance_expiry_date);
                $massage .="<tr>
                    <td style='padding:5px 0px;font-size: 14px;width:400px;color:#000000;border: 1px solid #B5A4A4;text-align: center;'>{$value->name}</td>	
                    <td style='padding:5px 0px; font-size: 14px;width:400px;color:#000000;border: 1px solid #B5A4A4;text-align: center;'>{$value->phone_number}</td>
                    <td style='padding:5px 0px;font-size: 14px;width:400px;color:#000000;border: 1px solid #B5A4A4;text-align: center;'>{$value->email}</td>
                    <td style='padding:5px 0px;font-size: 14px;width:400px;color:#000000;border: 1px solid #B5A4A4;text-align: center;'>{$value->current_insurance_status}</td>
                    <td style='padding:5px 0px; font-size: 14px;width:400px;color:#000000;border: 1px solid #B5A4A4;text-align: center;'>{$value->insurance_type}</td>
                    <td style='padding:5px 0px;font-size: 14px;width:400px;color:#000000;border: 1px solid #B5A4A4;text-align: center;'>{$date}</td>
                </tr>";
            }
            
            $mailData['massage'] = $massage;
            $mailTo = ADMIN_MAIL;
            $mailData['base_url'] = $this->config->base_url();
            $subject = 'Insurance Policy Expiry Reminder';
            require_once("mailer/Email.php");
            $emailSender = new Email();
            $emailSender->SendEmail('expiry_reminder_admin_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
        }
    }
    public function sendSmsToUserexpiry($phone='', $name='') {
        $msg = 'Dear '.$name.', your insurance policy expires tomorrow. A Key Verticals representative will reach out soon to assist you with policy renewal. Thank you.';
        $url = 'http://www.smsmarketingportal.com/components/com_spc/smsapi.php?username='.SMS_USER_NAME.'&password='.SMS_PASSWORD.'&sender='.SMS_SENDER.'&recipient='.$phone.'&message='.urlencode($msg);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
   public function low(){
        $advertisers = $this->auto_reminder_model->getAdverstisersBalance();
        if(isset($advertisers) && is_array($advertisers) && !empty($advertisers)){
            foreach ($advertisers as $adv){
                $balance = $adv->balance;
                if($balance < 500){
                     $this->sendSmsToAdvertisersBalance($adv->phone, $adv->name);
                     $mailData['name'] = $adv->name;
                     $mailTo = $adv->email;
                     $mailData['base_url'] = $this->config->base_url();
                     $subject = 'Action Required: Low Account Balance Alert!';
                     require_once("mailer/Email.php");
                     $emailSender = new Email();
                     $emailSender->SendEmail('low_balance_alert_mail', $mailData, $mailTo, ADMIN_MAIL, ADMIN_MAIL_PASSWORD, SITE_NAME, $subject);
                }
            }
        }
   }
   public function sendSmsToAdvertisersBalance($phone='', $name=''){
        $msg = 'Dear '.$name.', your KV account balance is currently less than N500. You should recharge ASAP to avoid interruptions to your service.';
        $url = 'http://www.smsmarketingportal.com/components/com_spc/smsapi.php?username='.SMS_USER_NAME.'&password='.SMS_PASSWORD.'&sender='.SMS_SENDER.'&recipient='.$phone.'&message='.urlencode($msg);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
   }
}
