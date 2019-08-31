<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
 
class pub_operation_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function getuseInfo($current_user){
            $query = $this->db->query("SELECT * FROM user_profile ,(select admin_name from admin_info )as admin_name where userId=$current_user");
            return $query->result();
	}
        // created by nitesh - 11-29-2013
        public function getLeadRecords($current_user,$categoryId=0,$statename=null,$start=0,$end=0){
          
            $sql = "SELECT  `credit` ,  `categoryId` ,  `datetime` ,  `category_name`  FROM ad_form_data, accounts WHERE  `ad_form_data`.`publisherId` =  '$current_user' AND  `ad_form_data`.`publisherId` =  `accounts`.`userId` AND  `ad_form_data`.`isRoleback` !=1 AND accounts.form_data_id = ad_form_data.form_data_id ";
            //$sql = "SELECT credit,categoryId,datetime,category_name FROM ad_form_data,accounts WHERE ad_form_data.publisherId = $current_user AND ad_form_data.publisherId = accounts.userId AND ad_form_data.from_data_id = accounts.form_data_id AND ad_form_data.isRoleback != 1";
            
            if(strlen($statename) > 0){
                $sql .= " AND ad_form_data.state_name LIKE '%$statename%'";
            }
            if($start != 0){
                $sql .= " AND ad_form_data.datetime >=" .$start;
            }
            if($end != 0){
                $sql .= " AND ad_form_data.datetime <=" .$end;
            }
            if($categoryId!=0){
                $sql .= " AND ad_form_data.categoryId =" .$categoryId;
            }
             $sql .= " ORDER BY datetime DESC";
            $leads = $this->db->query($sql);
            //echo $this->db->last_query();
            return $leads->result();
        }
        
           public function getcurrentmonthleads($current_user){
           //$todayAM = strtotime('today midnight');
            //echo date("d-m-y H:i:s a" , $todayAM);
           // $todayPM = $todayAM + 86400;
            $start = strtotime("first day of this month midnight");
         // echo $start ." <br/>";
            $end = strtotime( 'last day of ' . date( 'F Y'))+ 86400; 
            $sql = "SELECT  `credit` ,  `categoryId` ,  `datetime` ,  `category_name`  FROM ad_form_data, accounts WHERE  `ad_form_data`.`publisherId` =  '$current_user' AND  `ad_form_data`.`publisherId` =  `accounts`.`userId` AND  `ad_form_data`.`isRoleback` !=1 AND accounts.form_data_id = ad_form_data.form_data_id and datetime  BETWEEN $start AND $end ORDER BY datetime DESC";
            //echo $sql;
            $leads = $this->db->query($sql);
            //echo $this->db->last_query();
            return $leads->result();
        }
      /* public function getTotalearnings($current_user,$categoryId=0,$statename=null,$start=0,$end=0){
           
            $sql = "SELECT  sum(credit) AS totalearnings FROM ad_form_data, accounts WHERE  `ad_form_data`.`publisherId` =  '$current_user' AND  `ad_form_data`.`publisherId` =  `accounts`.`userId` AND  `ad_form_data`.`isRoleback` !=1 AND accounts.form_data_id = ad_form_data.form_data_id ";
            //$sql = "SELECT credit,categoryId,datetime,category_name FROM ad_form_data,accounts WHERE ad_form_data.publisherId = $current_user AND ad_form_data.publisherId = accounts.userId AND ad_form_data.from_data_id = accounts.form_data_id AND ad_form_data.isRoleback != 1";
            
            if($statename!=null && $statename!=0){
                $sql .= " ad_form_data.state_name LIKE '%$statename%'";
            }
            if($start != 0){
                $sql .= " AND ad_form_data.datetime >=" .$start;
            }
            if($end != 0){
                $sql .= " AND ad_form_data.datetime <=" .$end;
            }
            if($categoryId!=0){
                $sql .= " AND ad_form_data.categoryId =" .$categoryId;
            }
            //echo $sql;
            $leads = $this->db->query($sql);
            //echo $this->db->last_query();
            return $leads->row();
        } 
       public function gettodayTotalearnings($current_user){
            $todayAM = strtotime('today midnight');
            $todayPM = $todayAM + 86400;
            $sql = "SELECT  sum(credit) AS totalearnings FROM ad_form_data, accounts WHERE  `ad_form_data`.`publisherId` =  '$current_user' AND  `ad_form_data`.`publisherId` =  `accounts`.`userId` AND  `ad_form_data`.`isRoleback` !=1 AND accounts.form_data_id = ad_form_data.form_data_id and datetime BETWEEN $todayAM AND $todayPM ORDER BY datetime DESC";
            //echo $sql;
            $leads = $this->db->query($sql);
            return $leads->row();
        } */
         public function gettodayviews($current_user){
          $start = strtotime("first day of this month midnight");
         // echo $start ." <br/>";
         $end =	strtotime( 'last day of ' . date( 'F Y'))+ 86400; 
          //echo $end;
         $query= $this->db->query("SELECT  *, COUNT(*) as views  FROM lead_form_views  INNER JOIN categories where categories.categoryId=lead_form_views.category_id and publisher_id= $current_user and datetime  BETWEEN $start AND $end GROUP BY category_id");  
         //echo $query;         
         return $res= $query->result();
        }
	
        public function getoldviews($current_user,$start,$end){
              $query= $this->db->query("SELECT  *, COUNT(*) as views  FROM lead_form_views  INNER JOIN categories where categories.categoryId=lead_form_views.category_id  and publisher_id= $current_user and datetime BETWEEN $start AND $end GROUP BY category_id");  
              //echo $query;
              return $res= $query->result();
           }
        public function gettotalLeads($current_user){
                 $start = strtotime("first day of this month midnight");
                  // echo $start ." <br/>";
                 $end =	strtotime( 'last day of ' . date( 'F Y'))+ 86400; 
                   //echo $end;
                 $query= $this->db->query("SELECT  *, COUNT(*) as totalleads  FROM ad_form_data where publisherId=$current_user and isRoleback!=1 and datetime BETWEEN $start AND $end  GROUP BY categoryId");
                 return $res= $query->result();

          }
       public function gettotalOldleads($current_user,$start,$end){
          $query= $this->db->query("SELECT  *, COUNT(*) as totalleads  FROM ad_form_data where publisherId=$current_user and isRoleback!=1 and datetime BETWEEN $start AND $end  GROUP BY categoryId");
          return $res= $query->result();
          
      }
	public function getrecords($current_user,$adId=0,$stateId=0,$start=0,$end=0){
		$report = array();
		$this->db->select('*');
		$this->db->from('ad_info');
		$this->db->where('isActive',1);
		$this->db->where('isApproved',1);
		if($stateId!=0 && $stateId!=NULL){
			
			$this->db->where('state',$stateId);
		}
		if($adId!=0 && $adId!=NULL){
			
			$this->db->where('adId',$adId);
		}
		$this->db->where('userActivation',1);
		$this->db->where('isDeleted',0);
		$query = $this->db->get();
		$i=0;
		foreach($query->result() as $info){
					$report[$i]['adName'] 	= $info->adName;		
					$report[$i]['adTitle'] 	= $info->adTitle;		
					$report[$i]['state'] 	= $info->stateName;		
					$report[$i]['adId'] 	= $info->adId;
					$vi=$this->getAdViews($current_user,$info->adId,$start,$end);		
					$report[$i]['viewed']=$vi->viewCount;
					$report[$i]['clicked']=$vi->click;
					$report[$i]['earning']=$this->getEarning($current_user, $info->adId,$start,$end);
					if($vi->viewCount >0){
					$report[$i]['ctr']=($vi->click/$vi->viewCount)*100;
					}else{
					$report[$i]['ctr'] =0;
					}
		$i++;
		}
		return $report;
	}
	
	// to get clicl and view for publisher
	public function getAdViews($publisherID,$adID,$start,$end){
			
	//	echo "select count(*) as click,(SELECT count(*)  FROM ad_status where isViewed=1 and created between $start and $end and publisherId=$publisherID and adId=$adID) as viewCount,adId from ad_status where  isClicked=1 and created between $start and $end and publisherId=$publisherID and adId=$adID";
		//$query;
		if($start!=0 && $end!=0)
		{
			
			$query=$this->db->query("select count(*) as click,(SELECT count(*)  FROM ad_status where isViewed=1 and created <= $start and created >=$end and publisherId=$publisherID and adId=$adID) as viewCount,adId from ad_status where  isClicked=1 and created <= $start and created >=$end and publisherId=$publisherID and adId=$adID");
			//echo $this->db->last_query().'<br/>';
			return $query->row();
		}
		else{
		$query=$this->db->query("select count(*) as click,(SELECT count(*)  FROM ad_status where isViewed=1 and publisherId=$publisherID and adId=$adID) as viewCount,adId from ad_status where  isClicked=1 and publisherId=$publisherID and adId=$adID");
		return $query->row();
		}
		//return $query->row();
		
	}
	public function getEarning($publisherID,$adID,$start,$end){
			
		$query;
		if($start!=0 && $end!=0)
		{
			$query=$this->db->query("SELECT sum(credit) as earning FROM accounts,ad_status where ad_status.adId=$adID and transactionTime <= $start and transactionTime >=$end and ad_status.publisherId=$publisherID and accounts.adStatusId=ad_status.adStatusId and accounts.userId=ad_status.publisherId");
		
		}
		else{
		$query=$this->db->query("SELECT sum(credit) as earning FROM accounts,ad_status where ad_status.adId=$adID and ad_status.publisherId=$publisherID and accounts.adStatusId=ad_status.adStatusId and accounts.userId=ad_status.publisherId");
		}
		$earning=$query->row();
		return $earning->earning ;
	}
	/*public function getCategories(){
            $this->db->select('*');
            $this->db->from('categories');
            $this->db->where('parentCategory',0);
            $query = $this->db->get();
            return $query->result();
        }*/
	/*public function getactiveads(){
			$this->db->select('*');
			$this->db->from('ad_info');
			$this->db->where('isActive',1);
			$this->db->where('isApproved',1);
			$this->db->where('userActivation',1);
			$this->db->where('isDeleted',0);
			$query = $this->db->get();
			return $query->result();
	}*/

	
	
	
	public function updateProfileInfo($user_id)
	{
		$oldPass		=   $this->security->xss_clean($this->input->post('old_pass'));
		$this->db->select('*');
		$this->db->from('user_profile');
		$this->db->where('password', $oldPass);
		$this->db->where('userId',$user_id);
		$query = $this->db->get();
		// $this->db->last_query();
		if($query->num_rows == 1)
		{		
			
			$profile['password']		= 	$this->security->xss_clean($this->input->post('new_pass'));			
			$this->db->where('userId',$user_id);
			$this->db->update('user_profile',$profile);
			return 1;
		}
		else
		{
			return 2; // old pass not match
		}
	}
	public function userProfileImg($imageNAme,$userId)
	{
			
			$profile['profilePic']		=   $imageNAme;
			$this->db->where('userId',$userId);
			return ($this->db->update('user_profile',$profile)) ? true : false;
		
	}
	
	// by raj
	
	// to get dashboard data values
	public function getDashboardData($userId){
            $publisherDebit=4;
            $lasttimestamp = strtotime('-1 month');
            $todaytimestamp=time();
            $query = $this->db->query("SELECT sum(credit) as earning, (sum(credit)-sum(debit)) as balance, (select sum(credit)  from accounts where transactionTime between  $lasttimestamp AND $todaytimestamp and userId=$userId) as lastmonth,(select debit from accounts where comment =$publisherDebit order by  transactionTime desc limit 0,1 ) as last_withdraw  FROM accounts where userId=$userId");
            return $query->row();
	}
        public function getTodaysEarning($userId){
            $todayAM = strtotime('today midnight');
            $todayPM = $todayAM + 86300;
            $sql = "SELECT SUM(credit) as earning FROM accounts WHERE userid = $userId AND transactionTime between $todayAM AND $todayPM";
            // echo $sql;
          // echo strtotime('now');
            $query = $this->db->query($sql);
            return $query->row();
        }
	public function getYesterdaysEarning($userId){
            $yesterdayAM = strtotime('-1 day, midnight');
            $yesterdayPM = $yesterdayAM + 86400;
            $sql = "SELECT SUM(credit) as earning FROM accounts WHERE userid = $userId AND transactionTime between $yesterdayAM AND $yesterdayPM";
            //echo $sql;
            $query = $this->db->query($sql);
            return $query->row();
        }
        public function getCurrentMonthsEarning($userId){
            $startTimeStamp = strtotime( 'first day of ' . date( 'F Y'));
            $endTimeStamp = strtotime( 'last day of ' . date( 'F Y'))+ 86400;//$yesterdayAM + 86400;
            $sql = "SELECT SUM(credit) as earning FROM accounts WHERE userid = $userId AND transactionTime between $startTimeStamp AND $endTimeStamp";
           // echo $sql;
            $query = $this->db->query($sql);
            
            return $query->row();
        }
        public function getLastMonthsEarning($userId){
            //$startTimeStamp = strtotime( 'first day of last month');
            $startTimeStamp = strtotime(date("Y-m-d", mktime(0, 0, 0, date("m", strtotime("-1 month")), 1, date("Y", strtotime("-1 month"))))."midnight");
            $endTimeStamp = strtotime(date("Y-m-d", mktime(0, 0, 0, date("m", strtotime("-1 month")), date("t", strtotime("-1 month")), date("Y", strtotime("-1 month"))))."midnight")+86400;
            //$endTimeStamp = strtotime( 'last day of last month');//$yesterdayAM + 86400;
            $sql = "SELECT SUM(credit) as earning FROM accounts WHERE userid = $userId AND transactionTime between $startTimeStamp AND $endTimeStamp";
            //echo $sql;
            $query = $this->db->query($sql);
            return $query->row();
        }
	//to get script data values no use
	public function getScript()
	{
		
		$this->db->select('*');
		$this->db->from('publisher_scripts');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function getParentCategories()
	{
		
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('parentCategory','0');
		$this->db->where('isActive','1');
		$query = $this->db->get();
		return $query->result();
	}
	public function getUserCategory($userId){
            $this->db->select('categoryId');
            $this->db->from('user_profile');
            $this->db->where("userId" , $userId);
            $qury = $this->db->get();
            $result = $qury->result();
            
            //print_r($result);
            $catStr = $result[0]->categoryId;
            $cats = explode("-", $catStr);
            if(count($cats) > 0){
                $this->db->select('*');
                $this->db->from('categories');
                $this->db->where('parentCategory','0');
                $this->db->where('isActive','1');
                $this->db->where_in("categoryId",$cats);
                $query = $this->db->get();
                return $query->result();
            }
        }
	public function getStates()
	{
		
		$this->db->select('*');
		$this->db->from('state');
		$this->db->where('isActive','1');
		$this->db->order_by("stateName", "asc");
		$query = $this->db->get();
		return $query->result();
	}
	
	/*public function getSubPublishers($userId)
	{
		$this->db->select('*');
		$this->db->from('sub_publisher');
		$this->db->where('isDeleted','0');
		$this->db->where('publisherId',$userId);
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
		$result = array();
		$i=1;
		foreach($query->result() as $info){
			$result[$i]['name']	=	$info->name;
			$result[$i]['email']	=	$info->email;
			$result[$i]['sub_publisherId']	=	$info->sub_publisherId;
			$result[$i]['publisherId']	=	$info->publisherId;
			$response				=	 $this->getTotalAdCount($info->sub_publisherId);
			$result[$i]['viewed']	=	$response->viewCount;
			$result[$i]['clicked']	=	$response->click;
			$i++;
		}
		return $result;
	}*/
        public function getSubPublishers($userId)
	{
		$this->db->select('*');
		$this->db->from('sub_publisher');
		$this->db->where('isDeleted','0');
		$this->db->where('publisherId',$userId);
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
		$result = array();
		$i=1;
		foreach($query->result() as $info){
			$result[$i]['name']	=	$info->name;
			$result[$i]['email']	=	$info->email;
			$result[$i]['sub_publisherId']	=	$info->sub_publisherId;
			$result[$i]['publisherId']	=	$info->publisherId;
			$response				=	 $this->getTotalAdCount($info->sub_publisherId, $info->publisherId);
                        $result[$i]['clicked']	=	$response->click;
			$i++;
		}
		return $result;
	}
        public function getTotalAdCount($sub_publisherID, $publisherId){
	
		$query=$this->db->query("select count(*) as click FROM ad_form_data where  sub_publisherId=$sub_publisherID and publisherId= $publisherId and fraud =0");
		return $query->row();
	}
        
	/* public function getcountDetailsubPub($subId,$publisherId)
		{
			$this->db->select('*');
			$this->db->from('sub_publisher');
			$this->db->where('isDeleted','0');
			$this->db->where('sub_publisherId',$subId);
			$this->db->where('publisherId',$publisherId);
			$this->db->order_by("name", "asc");
			$query = $this->db->get();
			$res 	=	$query->row();
			$result = array();
			$i=1;
		
				
				$response				=	 $this->getrecords_subpublisher($res->sub_publisherId);
				
				
			//print_r($response);
			return $response;
		}*/
public function getcountDetailsubPub($subId,$publisherId)
		{
                        $query=$this->db->query("select *  FROM ad_form_data where fraud =0  and sub_publisherId=$subId and publisherId=$publisherId order by datetime  DESC ");
			//echo $this->db->last_query().'<br/>';
			return $query->result();
	}
	
	/*************************************/
	/*	START SUB PUBLISHER CALULATION	*/
	/************************************/
	
	
		public function getrecords_subpublisher($current_user,$adId=0,$stateId=0,$start=0,$end=0){
		$report = array();
		$this->db->select('*');
		$this->db->from('ad_info');
		$this->db->where('isActive',1);
		$this->db->where('isApproved',1);
		if($stateId!=0 && $stateId!=NULL){
			
			$this->db->where('state',$stateId);
		}
		if($adId!=0 && $adId!=NULL){
			
			$this->db->where('adId',$adId);
		}
		$this->db->where('userActivation',1);
		$this->db->where('isDeleted',0);
		$query = $this->db->get();
		$i=0;
		foreach($query->result() as $info){
					$report[$i]['adName'] 	= $info->adName;		
					$report[$i]['adTitle'] 	= $info->adTitle;		
					$report[$i]['state'] 	= $info->stateName;		
					$report[$i]['adId'] 	= $info->adId;
					$vi=$this->getAdViews_subpublisher($current_user,$info->adId,$start,$end);		
					$report[$i]['viewed']=$vi->viewCount;
					$report[$i]['clicked']=$vi->click;
					//$report[$i]['earning']=$this->getEarning_subpublisher($current_user, $info->adId,$start,$end);
					if($vi->viewCount >0){
					$report[$i]['ctr']=($vi->click/$vi->viewCount)*100;
					}else{
					$report[$i]['ctr'] =0;
					}
			$i++;
		}
		return $report;
	}
	
	// to get clicl and view for publisher
	public function getAdViews_subpublisher($sub_publisherID,$adID,$start,$end){
			
	//	echo "select count(*) as click,(SELECT count(*)  FROM ad_status where isViewed=1 and subPublisherId=$sub_publisherID and adId=$adID) as viewCount,adId from ad_status where  isClicked=1 and subPublisherId=$sub_publisherID and adId=$adID";
		//$query;
		if($start!=0 && $end!=0)
		{
			
			$query=$this->db->query("select count(*) as click,(SELECT count(*)  FROM ad_status where isViewed=1 and created <= $start and created >=$end and subPublisherId=$sub_publisherID and adId=$adID) as viewCount,adId from ad_status where  isClicked=1 and created <= $start and created >=$end and subPublisherId=$sub_publisherID and adId=$adID");
			//echo $this->db->last_query().'<br/>';
			return $query->row();
		}
		else{
		$query=$this->db->query("select count(*) as click,(SELECT count(*)  FROM ad_status where isViewed=1 and subPublisherId=$sub_publisherID and adId=$adID) as viewCount,adId from ad_status where  isClicked=1 and subPublisherId=$sub_publisherID and adId=$adID");
		return $query->row();
		}
		//return $query->row();
		
	}
	public function getEarning_subpublisher($sub_publisherID,$adID,$start,$end){
			
		$query;
		if($start!=0 && $end!=0)
		{
			$query=$this->db->query("SELECT sum(credit) as earning FROM accounts,ad_status where ad_status.adId=$adID and transactionTime <= $start and transactionTime >=$end and ad_status.publisherId=$sub_publisherID and accounts.adStatusId=ad_status.adStatusId and accounts.userId=ad_status.publisherId");
		
		}
		else{
		$query=$this->db->query("SELECT sum(credit) as earning FROM accounts,ad_status where ad_status.adId=$adID and ad_status.publisherId=$sub_publisherID and accounts.adStatusId=ad_status.adStatusId and accounts.userId=ad_status.publisherId");
		}
		$earning=$query->row();
		return $earning->earning ;
	}
	
	/*public function getTotalAdCount($sub_publisherID){
	
		$query=$this->db->query("select count(*) as click,( SELECT count(*) FROM ad_status where isViewed=1 and subPublisherId=$sub_publisherID and isAdminRollBack=0 ) as viewCount,adId from ad_status where isClicked=1 and subPublisherId=$sub_publisherID and isAdminRollBack=0");
		return $query->row();
	}*/
	
	/*************************************/
	/*	END SUB PUBLISHER CALULATION	*/
	/************************************/
	
	
	
	public function getpubinfo($pubId)
	{
		$this->db->select('*');
		$this->db->from('sub_publisher');
		$this->db->where('isDeleted','0');
		$this->db->where('sub_publisherId',$pubId);
		$query = $this->db->get();
		return $query->result();
			
		
	}
	public function addSubPublishers()
	{
		$data['name']= $this->security->xss_clean($this->input->post('name'));
		$data['email']= $this->security->xss_clean($this->input->post('email'));
		$data['publisherId']=$this->security->xss_clean($this->input->post('publisherId'));
		$this->db->insert('sub_publisher',$data);
		return 1;
	}
       public function getPaymentdetails($userId)
       {
                $this->db->select('*');
		$this->db->from('payment_details');
		$this->db->where('userId',$userId);
		$query = $this->db->get();
		return $query->row();
           
       }
        public function insertpaymentDetail($current_user){
            //echo $current_user;
                
                $data['userId']=($current_user);
                $data['bank_name']= $this->security->xss_clean($this->input->post('bank_name'));
		$data['bank_address']= $this->security->xss_clean($this->input->post('bank_address'));
		$data['account_name']=$this->security->xss_clean($this->input->post('account_name'));
                $data['account_number']= $this->security->xss_clean($this->input->post('account_number'));
                $data['account_type']=$this->security->xss_clean($this->input->post('account_type'));
                
		$this->db->insert('payment_details',$data);
		return 1;
        }
        public function updatepaymentDetail($current_user){
            //echo $current_user;
                $data['bank_name']= $this->security->xss_clean($this->input->post('bank_name'));
		$data['bank_address']= $this->security->xss_clean($this->input->post('bank_address'));
		$data['account_name']=$this->security->xss_clean($this->input->post('account_name'));
                $data['account_number']= $this->security->xss_clean($this->input->post('account_number'));
                $data['account_type']=$this->security->xss_clean($this->input->post('account_type'));
                $this->db->where('userId',$current_user);
		$this->db->update('payment_details',$data);
		
		return 1;
        }
         /*public function updateinsertpayment($current_user){
                $userId=($current_user);
                $bank_name= $this->security->xss_clean($this->input->post('bank_name'));
                $bank_address= $this->security->xss_clean($this->input->post('bank_address'));
                $account_name=$this->security->xss_clean($this->input->post('account_name'));
                $account_number= $this->security->xss_clean($this->input->post('account_number'));
                $account_type=$this->security->xss_clean($this->input->post('account_type'));
                $sql="INSERT INTO  payment_details VALUES ($userId,'$bank_name','$bank_address','$account_name','$account_number','$account_type') ON DUPLICATE KEY UPDATE bank_name='$bank_name', bank_address='$bank_address',account_name='$account_name', account_number='$account_number',account_type='$account_type'";
                echo $sql;
                $query= $this->db->query("$sql");
                return 1;
                
         }*/
	public function updateSubPublisher()
	{
		$data['name']	= $this->security->xss_clean($this->input->post('name'));
		$data['email']	= $this->security->xss_clean($this->input->post('email'));
		$editId 		= $this->security->xss_clean($this->input->post('sub_publisherId'));
		$this->db->where('sub_publisherId',$editId);
		$this->db->update('sub_publisher',$data);
		return 1;
	}
	public function updateSubPublishers(){
		
		$data['name']= $this->security->xss_clean($this->input->post('name'));
		$subpublisherID== $this->security->xss_clean($this->input->post('subpublisherid'));
			$this->db->where('sub_publisherId',$subpublisherID);
			return ($this->db->update('sub_publisher',$data)) ? true : false;
	}
	
	
	public function deleteSubPublisher($pubId){
			$up['isDeleted'] = 1;
			$this->db->where('sub_publisherId',$pubId);
			return ($this->db->update('sub_publisher',$up)) ? true : false;
	}
	// end
	
	
	public function getUserCategories($pubId){
			
			$this->db->select('categoryId');
			$this->db->from('user_profile');
			$this->db->where('userId',$pubId);
			$query = $this->db->get();
			return $query->row();
			
		//	
	}
	public function getCategories(){
			
			$this->db->select('*');
			$this->db->where('parentCategory',0);
			$this->db->from('categories');
			$query = $this->db->get();
			return $res= $query->result();
			
	}
	public function updateUserCategories($userid){
			
			$catIds= $this->security->xss_clean($this->input->post('category'));
			$cat="";
			if(!empty($catIds)){
			 $cat=  implode('-',$catIds);
			 }
			$up['categoryId']=$cat;
			$this->db->where('userId',$userid);
			return ($this->db->update('user_profile',$up)) ? true : false;
			
	}
	
}
?>