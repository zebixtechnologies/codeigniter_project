<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: vaibhav
 * Description: Home model class
 */
class profile_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	public function getAdminTask()
			{
				$this->db->select('*');
				$this->db->from('admin_task');
				$this->db->order_by('created','desc');
				$query = $this->db->get();
				return $query->result();
			}
	public function updateTask()
		{
			$task['pending_task']= $this->security->xss_clean($this->input->post('task'));
			$value = explode(',',$this->security->xss_clean($this->input->post('taskPriority')));
			$task['prority']	 = $value[1];
			$task['classes']		 = $value[0];
			$task['created'] 	 = time();
			$this->db->insert('admin_task',$task);
			return true;
		}
	
	public function removeTask($id)
		{
			$this->db->where('id',$id);
			echo ($this->db->delete('admin_task')) ? 1:0;
					
		}

	public function getAdminInfo($current_user){
		$this->db->select('*,(select admin_name from admin_info )as admin_name');
		$this->db->from('admin_info');
		$this->db->where('user_id',$current_user);
		$query = $this->db->get();
		return $query->result();
	}

	public function updateProfileInfo($user_id)
	{
		$oldPass		=   $this->security->xss_clean($this->input->post('old_pass'));
		$this->db->select('*');
		$this->db->from('admin_info');
		$this->db->where('user_pass',$oldPass);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		
		if($query->num_rows == 1)
		{		
			$profile['user_name']		=   $this->security->xss_clean($this->input->post('user_name'));
			$profile['user_pass']		= 	$this->security->xss_clean($this->input->post('new_pass'));	
			$profile['admin_name']		= 	$this->security->xss_clean($this->input->post('admin_name'));			
			if($profile['user_pass']==''){
			$profile['user_pass']=$oldPass;}
			$this->db->where('user_id',$user_id);
			return ($this->db->update('admin_info',$profile)) ? true : false;
		}
		else
		{
			return false;
		}
	}
	public function adminProfileImg($imageNAme,$userId)
	{
			
			$profile['user_image']		=   $imageNAme;
			$this->db->where('user_id',$userId);
			return ($this->db->update('admin_info',$profile)) ? true : false;
		
	}
	
	// by raj
	
	public function getUsersData()
	{
			$query=$this->db->query("SELECT count(*) as PendingUsers,(select count(*) from user_profile where isActive=1 and isAccepted=1 and isDeleted=0 and password!='') as ActiveUser FROM user_profile where isAccepted=0");
			return $query->row();
	
	}
	public function getAdminProfit()
	{
			$query=$this->db->query("SELECT sum(admin_profile) as adminProfilt from accounts");
			return $query->row();
	
	}
	public function getDashBoardAds()
	{
			$query=$this->db->query("SELECT count(*) as pendingAds,(select count(*) from ad_info where userActivation=1 and isActive=1 and isApproved=1 and isDeleted=0 ) as activeAds FROM ad_info where isApproved=0");
			return $query->row();
	
	}
	public function getCurrentMonthsEarning(){
            $startTimeStamp = strtotime( 'first day of ' . date( 'F Y'));
            $endTimeStamp = strtotime( 'last day of ' . date( 'F Y'))+ 86400;//$yesterdayAM + 86400;
            $sql = "SELECT sum(admin_profile) as adminProfilt from accounts WHERE transactionTime between $startTimeStamp AND $endTimeStamp";
            //echo $sql;
            $query = $this->db->query($sql);
            return $query->row();
        }
	
	// end
}
?>