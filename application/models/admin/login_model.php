<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('user_name', $username);
        $this->db->where('user_pass', $password);
        $this->db->where('is_active', '1');
        $this->db->where('user_role', 'Admin');
        
        // Run the query
        $query = $this->db->get('admin_info');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a admin, then create session data
            $row = $query->row();
            $login_user = array(
                'user_id' => $row->user_id,
                'user_name' => $row->user_name,
                'last_login' => $row->last_login,
                'user_image' => $row->user_image,
                'ip_address' => $row->ip_address,
                'validated' => true
                );
            $this->session->set_userdata('logged_in',$login_user);
            $msg = '<div class="alert alert-info fade in">
                                    <a href="#" class="close" data-dismiss="alert">×</a>
                                    <strong>Hello '.ucfirst($login_user['user_name']).'</strong><br>
                                    Your Last Login Time Is '.date("d F Y g:h:i",$login_user['last_login']).'<br/>
                                    And Last Login Ip '.$login_user['ip_address'].'<br/><a href="'.base_url().'admin/dashboard/profileinfo"> Click For More Info </a>
                                </div>';
              $this->session->set_flashdata('user_message',$msg);

            $id = $login_user['user_id'];
            $user['last_login'] = time();
            $user['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $this->db->where('user_id', $id);
            $this->db->update('admin_info', $user); 
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

    public function forgetpasswordValid(){
        $email = $this->security->xss_clean($this->input->get('email'));
        $this->db->where('user_email',$email);
        $query = $this->db->get('admin_info');
        if($query->num_rows > 0)
        {
            return $query->row();
        }else{
            return false;
        }

    }
}
?>