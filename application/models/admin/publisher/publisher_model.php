<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
 
class publisher_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
  
    public function getpublishers(){
         $start = strtotime("first day of this month midnight");
        // echo $start ." <br/>";
         $end =	strtotime( 'last day of ' . date( 'F Y'))+ 86400;
         //echo $end;
        $lastmonthfirstdate = strtotime("first day of last month midnight");
        //echo date("m-d-y",$lastmonthfirstdate);
        //echo $lastmonthfirstdate;
        $lastmonthlastdate= strtotime("last day of last month midnight");
        $lastmn=  $lastmonthlastdate +86400;
        // echo date("m-d-y H:i:s a",$lastmn);
        //echo $lastmonthlastdate;
        $this->db->select('up.*,(select sum(credit)-sum(debit) FROM accounts WHERE  userId = up.userId) as balance, (select sum(credit)-sum(debit) FROM accounts WHERE  userId = up.userId and transactionTime BETWEEN '.$start.' AND '.$end.') as currentbalance, (select sum(credit)-sum(debit) FROM accounts WHERE  userId = up.userId and transactionTime BETWEEN '.$lastmonthfirstdate.' AND '.$lastmn.') as lastmonthbalance,(select sum(credit)-sum(debit) FROM pub_all_time_payment WHERE  pub_id = up.userId) as pub_all_time_payment');
        $this->db->where('up.isAccepted',1);
        $this->db->where('up.isDeleted',0);
        $this->db->where('up.isActive',1);
        $this->db->where('up.userType',2);
        
        //$this->db->where('up.lastLoginIp !=', '' );
        $this->db->from('user_profile up');
        $query = $this->db->get();
	return $query->result();
    }
	
	 public function getpublishersRatio($userId){
        $this->db->select('*');
        $this->db->from('user_profile');
        $this->db->where('userId',$userId);
        $query = $this->db->get();
		return $query->result();
    }
  public function getPaymentdetails($userId)
       {
                $this->db->select('*');
		$this->db->from('payment_details');
		$this->db->where('userId',$userId);
		$query = $this->db->get();
		return $query->row();
           
       }

	public function getpublisherInfo($userId){
		
        $this->db->select('up.*,(select sum(credit)-sum(debit) FROM accounts WHERE  userId = up.userId) as balance');
        $this->db->where('userId',$userId);       
        $this->db->where('up.isAccepted',1);
        $this->db->where('up.isDeleted',0);
        $this->db->where('up.isActive',1);
        $this->db->where('up.userType',2);
        $this->db->where('up.isAccepted',1);
        //$this->db->where('up.lastLoginIp !=', '' );
        $this->db->from('user_profile up');
        $query = $this->db->get();
        //echo $this->db->last_query();
        //echo $query;
		return $query->result();
	}
	
	public function updateBannerImage($imageNAme,$small_img_path,$adId,$Field)// 1 for banner //2 for banner background
	{
		if($Field==1){
		$ban['bannerImage'] 	  = $imageNAme;
		$ban['small_bannerImage'] = $small_img_path;
		}
		if($Field==2){
		$ban['bannerBackground'] = $imageNAme;
		$ban['banner_background_small	'] = $small_img_path;
		}
		$this->db->where('adId',$adId);
		$this->db->update('ad_info',$ban);
		return true;
	}

	 public function updatePublisherBalance(){
		$ad['memo'] 	= $this->security->xss_clean($this->input->post('memo'));
		$ad['userId'] 	= $this->security->xss_clean($this->input->post('userId'));
                $option = $this->security->xss_clean($this->input->post('option'));
                $ad['transactionTime'] 	= time();
		$ad['comment'] 	= 5;
                if($option == "credit"){
                    $ad['credit'] 	= $this->security->xss_clean($this->input->post('amount'));
                }else if($option == "debit"){
                    $ad['debit'] 	= $this->security->xss_clean($this->input->post('amount'));
                }
		$this->db->insert('accounts',$ad);
		return true;
		
	}

	public function updatePublisherratio()
	{
		$ad['adminCommission'] 	= $this->security->xss_clean($this->input->post('ratio'));
		$userId 	 			= $this->security->xss_clean($this->input->post('userId'));
		$this->db->where('userId',$userId);
		$this->db->update('user_profile',$ad);
		return true;
	}
       public function  getAccountinfo(){
           
        $query = $this->db->query("SELECT name,userType,debit,credit,transactionTime,admin_profile FROM accounts INNER JOIN user_profile ON user_profile.userId = accounts.userId order by transactionTime DESC");
        //echo $q;
        
       return $query->result();
       }
       
       public function getPublishersActive(){
            $this->db->select('*');
            $this->db->where('isAccepted',1);
            $this->db->where('isDeleted',0);
            $this->db->where('isActive',1);
            $this->db->where('userType',2);
            $this->db->from('user_profile');
            $query = $this->db->get();
            return $query->result();
       }
    
       public function saveRestrictUsers(){
            $publisherId =  $this->security->xss_clean($this->input->post('publishers'));
            $advs = $this->security->xss_clean($this->input->post("advertisers"));
            //1.  delete previous unselected records
            if(strlen($publisherId) > 0){
                $sql = "delete from thirdparty_restricted where publisher_id = $publisherId";
                $this->db->query($sql);
                //$this->db->last_query();
            }
            if(is_array($advs)){
                //2. insert selected records
                $sql = "Insert into thirdparty_restricted(publisher_id,restrict_adv_id) VALUES";
                $comma = "";
                $str = "";
                foreach($advs as $adv){   
                    $str .= $comma . "($publisherId,$adv) ";
                    $comma = " , ";
                }
                $sql.= $str;
                $this->db->query($sql);
                //$this->db->last_query();
            }
            return true;
       }
       //code by sarvesh(15/10/2014)
       public function pub_all_time_payment_data($userId) {
           $this->db->select("*");
           $this->db->where('pub_id',$userId);
           $this->db->from('pub_all_time_payment');
           $query= $this->db->get();
           return $query->result();
       }
       public function pub_all_time_payment_balance($userId) {
           $this->db->select("(sum(credit)-sum(debit))as balance");
           $this->db->where('pub_id',$userId);
           $this->db->from('pub_all_time_payment');
           $query= $this->db->get();
           return $query->result();
       }
       public function updatePubAllTimePaymentBalance(){
            $ad['memo'] 	= $this->security->xss_clean($this->input->post('memo'));
            $ad['pub_id'] 	= $this->security->xss_clean($this->input->post('userId'));
            $option = $this->security->xss_clean($this->input->post('trasection_type'));
            $ad['transaction_time'] 	= time();
            $ad['transaction_date'] 	= date("Y-m-d");
            if($option == "credit"){
                $ad['credit'] 	= $this->security->xss_clean($this->input->post('amount'));
            }else if($option == "debit"){
                $ad['debit'] 	= $this->security->xss_clean($this->input->post('amount'));
            }
            $this->db->insert('pub_all_time_payment',$ad);
            return true;
       }
}
?>