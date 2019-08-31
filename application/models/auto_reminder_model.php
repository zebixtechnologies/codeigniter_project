<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */

class auto_reminder_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	public function setAutoReminder(){
            $username = $this->security->xss_clean($this->input->post('name'));
            $phone = $this->security->xss_clean($this->input->post('phone_number'));
            $email = $this->security->xss_clean($this->input->post('email-input'));
            $currently_status = $this->security->xss_clean($this->input->post('currently-insured'));
            $insurance_type = $this->security->xss_clean($this->input->post('insurance-type'));
            $insurance_expiry_date = strtotime($this->security->xss_clean($this->input->post('insurance-expiry-date')))+3600;
            $reminder['name'] = $username;
            $reminder['phone_number'] = $phone;
            $reminder['email'] = $email;
            $reminder['current_insurance_status'] = $currently_status;
            $reminder['insurance_type'] = $insurance_type;
            $reminder['insurance_expiry_date'] = $insurance_expiry_date;
            $this->db->insert('auto_reminder', $reminder);
            return true;
		
	}
        public function getExpiryTimeForUser($date){
            
            if (isset($date)) {
                $this->db->select('*');
                $this->db->from('auto_reminder');
                $this->db->where('insurance_expiry_date', $date);
                $query = $this->db->get();
                $data = $query->result();
                return $data;
		
            }
	
        }
        public function getExpiryTimeForAdmin($date){
            
            if (isset($date)) {
                $this->db->select('*');
                $this->db->from('auto_reminder');
                $this->db->where('insurance_expiry_date', $date);
                $query = $this->db->get();
                $data = $query->result();
                return $data;
		
            }
	
        }
        public function getAdverstisersBalance(){
            $query=$this->db->query("SELECT (sum(credit)-sum(debit)) as balance ,user_profile.* FROM accounts INNER JOIN user_profile ON user_profile.userId = accounts.userId where user_profile.userType =1 and user_profile.isActive=1 and user_profile.isAccepted = 1 group by accounts.userId");
            return $query->result();
        }
}