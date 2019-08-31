<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
 
class user_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
  
    public function getpendingReq(){
        $this->db->select('*');
        $this->db->where('lastLogin',null);
        $this->db->where('isAccepted !=',2);
        $this->db->where('isAccepted !=',1);
		$query = $this->db->get('user_profile');
		return $query->result();
    }

	public function getUserReq($userId){
        $this->db->select('*');
		$this->db->where('userId',$userId);
		$query = $this->db->get('user_profile');
		return $query->result();
    }

	public function updateApproval($random_pass,$userId,$mail_massage){
		$cat['password']   = $random_pass;
		$cat['isAccepted'] = 1;
		$cat['replyMail']  = $mail_massage;
		$cat['acceptTime']  = time();
		$this->db->where('userId',$userId);
		$this->db->update('user_profile',$cat);
		return true;
	}
	public function updatePassword($password,$userId){
		$cat['password']   = $password;
		$this->db->where('userId',$userId);
		$this->db->update('user_profile',$cat);
		return true;
	}
	public function updateReply($userId,$mail_massage){
		
		
		$cat['isReplied']  = 1;
		$cat['replyMail']  = $mail_massage;
		$this->db->where('userId',$userId);
		$this->db->update('user_profile',$cat);
		return true;
	}
	public function refuseReq($userId){
		$cat['isAccepted']  = 2;
		$this->db->where('userId',$userId);
		$this->db->update('user_profile',$cat);
		return true;
	}
	public function suspendusr($userId,$status){
		if($status==2){
		$cat['isActive']  = 1;
		}else{
		$cat['isActive']  = 2;
		}
		$this->suspendusrAds($userId,$status);
		$this->db->where('userId',$userId);
		$this->db->update('user_profile',$cat);
		return true;
	}
	
	public function suspendusrAds($userId,$status){
		if($status==1){
		$cat['isActive']  = 0;
		}else{
		$cat['isActive']  = 1;
		}
		$this->db->where('userId',$userId);
		$this->db->update('ad_info',$cat);
		return true;
	}
	public function removeuser($userId){
		$cat['isDeleted']  = 1;
		$this->db->where('userId',$userId);
		$this->db->update('user_profile',$cat);
		return true;
	}
	
	
	public function getusers(){
        $this->db->select('*');
        $this->db->where('isAccepted',1);
      //  $this->db->where('lastLogin !=','');
        $this->db->where('isDeleted',0);
		$query = $this->db->get('user_profile');
		return $query->result();
    }

	public function saveadvertiser()
	{
		$u['company'] = $this->security->xss_clean($this->input->post('company_name'));
		$u['name'] = $this->security->xss_clean($this->input->post('name'));
		$u['userName'] = $this->security->xss_clean($this->input->post('user_name'));
		$u['email'] = $this->security->xss_clean($this->input->post('email'));
		$u['phone'] = $this->security->xss_clean($this->input->post('phone'));
		$u['website'] = $this->security->xss_clean($this->input->post('website'));
		$u['password'] = $this->security->xss_clean($this->input->post('password'));
		$u['userType'] = 1;
			
                    if(empty($_POST['category'])){
                            return 4; // choose category
                    }else{
                            $this->db->select("categoryId,minbidprice");
                            $query = $this->db->get("categories");
                            $cats = $query->result();
                            $allCatPriceArr = array();
                            $bstring4BidPrice = "";
                            $commaBid = "";
                            foreach($cats as $cat){
                                $allCatPriceArr[$cat->categoryId] = $cat->minbidprice;
                            }
                            foreach($_POST['category'] as $cat){
                                $bstring4BidPrice .= $commaBid . $cat . ":" . $allCatPriceArr[$cat];
                                $commaBid = ",";
                            }
                            $u["bidprice"] = $bstring4BidPrice;
                            $u["activecategory"] = $bstring4BidPrice;
                            $counts = count($_POST['category']);
                                    $cat = array();
                                    for($j=0;$j<$counts;$j++){
                                            $cat[$j] = $_POST['category'][$j];
                                    }
                            $u['categoryId'] = implode('-',$cat);
                    }

		$u['requesTime']	 = time();
		$u['isActive']	     = 1;
		$u['isDeleted']	     = 0;
		$u['isAccepted'] =1;
		$u['acceptTime']	 = time();
		/*$this->db->select('email,userName');
		$this->db->from('user_profile');
		$this->db->where('email',$u['email']);
		$this->db->where('isDeleted',0);
		$this->db->or_where('userName',$u['userName']);
		
		*/
		
		$query=$this->db->query("SELECT email,userName from user_profile where (email='".$u['email']."' and isDeleted=0 and isAccepted!=2 ) or (userName='".$u['userName']."' and isDeleted=0 and isAccepted!=2)");
		//$query = $this->db->get();
		if($query->num_rows == 1){
			$row = $query->row();
			if($row->userName == $u['userName']){
				return 2; // duplicate username
			}
			if($row->email == $u['email']){
				 return 3; // duplicate email
				
			}
		}else{
			
			$this->db->insert('user_profile',$u);
			$this->db->insert_id();; // added successfully
			 return 1;
			
		}
	}
        public function updateprofile($userid)
	{
		
		$u['name']	 		= $this->security->xss_clean($this->input->post('name'));
	        $u['email']	    	= $this->security->xss_clean($this->input->post('email'));
		$u['phone']	    	= $this->security->xss_clean($this->input->post('phone'));
                $u['company']	    = $this->security->xss_clean($this->input->post('company'));
		$u['website']	    = $this->security->xss_clean($this->input->post('website'));
		
		
		//$query = $this->db->get();
		 $this->db->where('userId',$userid);
             return($this->db->update('user_profile',$u));
			
		
	}
        public function getprofile($userid)
        {
                $this->db->select("*");
                $this->db->where('userid',$userid);
                $query= $this->db->get("user_profile");
                $row=$query->row();
                return $row;
        }
        public function updateUserCategories($userid){
            $selectedCats = $this->security->xss_clean($this->input->post('category'));
            $seledcat="";
            if(!empty($selectedCats)){
                $seledcat =  implode('-',$selectedCats);
            }
            //get all categories with minimum bid price
            $this->db->select("categoryId,minbidprice");
            $query = $this->db->get("categories");
            $cats = $query->result();
            
            //before update category we must also update bidprice according to category.
            $this->db->select("bidprice,userType,activecategory");
            $this->db->where("userId" , $userid);
            $query = $this->db->get("user_profile");
            $row = $query->row();
            
            $bidPriceArr = array();
            $activePriceArr = array();
            $allCatPriceArr = array();
            
            foreach($cats as $cat){
                $allCatPriceArr[$cat->categoryId] = $cat->minbidprice;
            }
            
            $bidPrices = strlen($row->bidprice) ? $row->bidprice : NULL;
            $activeCatAndPrices = strlen($row->activecategory) ? $row->activecategory : NULL;
            
            if(isset($bidPrices)){
                foreach(explode(",", $bidPrices) as $bp){
                    $catAndPrice = explode(":",$bp);
                    $bidPriceArr[$catAndPrice[0]] = $catAndPrice[1];
                }
            }
            
            if(isset($activeCatAndPrices)){
                foreach(explode(",", $activeCatAndPrices) as $catPrice){
                    $cp = explode(":",$catPrice);
                    $activePriceArr[$cp[0]] = $cp[1];
                }
            }
            
            //get all categories and their min bid price.
            if($row->userType == 1){
                $bstring4BidPrice = "";
                $bstring4ActiveCat = "";
                $commaBid = "";
                $commaActive = "";
                if(is_array($selectedCats)){
                    foreach ($selectedCats as $selCat){
                        if(!isset($bidPriceArr[$selCat])){
                            $bstring4BidPrice .= $commaBid . $selCat . ":" . $allCatPriceArr[$selCat];
                            $commaBid = ",";
                        }else{
                            $bstring4BidPrice .= $commaBid . $selCat . ":" . $bidPriceArr[$selCat];
                            $commaBid = ",";
                        }
                        if(isset($activePriceArr[$selCat])){
                            $bstring4ActiveCat .= $commaActive . $selCat . ":" . $activePriceArr[$selCat];
                            $commaActive = ",";
                        }
                    }
                }
            }
            //echo $bstring4BidPrice . "<br/>" . $bstring4ActiveCat;
            //print_r($row);
            /*if($row->userType == 1){
                $bpriceArr = explode("," , $row->bidprice);
                $bstring = "";
                $comma = "";
                foreach($bpriceArr as $bp){
                    $catAndPrice = explode(":",$bp);
                    if(isset($catAndPrice[0]) && isset($catAndPrice[1])){
                        if(isset($catIds)){
                            if(in_array($catAndPrice[0], $catIds)){
                                $bstring .= $comma . $catAndPrice[0] . ":" . $catAndPrice[1];
                                $comma = ",";
                            }
                        }
                    }
                }
                //echo " this is " . $bstring;
                $up["bidprice"] = $bstring;
            }
            */
            $up['categoryId']=$seledcat;
            $up['bidprice']=$bstring4BidPrice;
            $up['activecategory']=$bstring4ActiveCat;
            $this->db->where('userId',$userid);
            return ($this->db->update('user_profile',$up)) ? true : false;
	}
         public function getemailofadvpubs()
        {
         $query= $this->db->query("SELECT *  FROM user_profile");  
         return $res= $query->result();
        } 
         public function getemailofpubs()
        {
         $query= $this->db->query("SELECT *  FROM user_profile where userType=2");  
         return $res= $query->result();
        } 
         public function getemailofadvs()
        {
         $query= $this->db->query("SELECT *  FROM user_profile where userType=1");  
         return $res= $query->result();
        } 
        
	
	
}
?>