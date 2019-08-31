<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */

class adv_operation_model extends CI_Model {
	function __construct() {
            parent::__construct();
	}

	public function getuseInfo($current_user) {
		$this -> db -> select('u_p.*,(select sum(credit) - sum(debit) from accounts where userId = u_p.userId) as current_balance,(select admin_name from admin_info )as admin_name ');
		$this -> db -> from('user_profile u_p');
		$this -> db -> where('u_p.userId', $current_user);
		$query = $this -> db -> get();
		return $query -> result();
	}

	public function updateProfileInfo($user_id) {
		$oldPass = $this -> security -> xss_clean($this -> input -> post('old_pass'));
		$this -> db -> select('*');
		$this -> db -> from('user_profile');
		$this -> db -> where('password', $oldPass);
		$this -> db -> where('userId', $user_id);
		$query = $this -> db -> get();
		//echo $this -> db -> last_query();
		if ($query -> num_rows == 1) {

			$profile['password'] = $this -> security -> xss_clean($this -> input -> post('new_pass'));
			$this -> db -> where('userId', $user_id);
			$this -> db -> update('user_profile', $profile);
			return 1;
		} else {
			return 2;
			// old pass not match
		}
	}
	public function updateProfileadv($user_id) {
			$profile['name'] 		= $this -> security -> xss_clean($this -> input -> post('info_name'));
			$profile['website'] 	= $this -> security -> xss_clean($this -> input -> post('website'));
			$profile['email'] 		= $this -> security -> xss_clean($this -> input -> post('email'));
			$profile['phone'] 		= $this -> security -> xss_clean($this -> input -> post('phone'));
			$this ->db->where('userId', $user_id);
			$this ->db->update('user_profile', $profile);
			return 1;
	}

	public function userProfileImg($imageNAme, $userId) {

		$profile['profilePic'] = $imageNAme;
		$this -> db -> where('userId', $userId);
		return ($this -> db -> update('user_profile', $profile)) ? true : false;

	}

	public function getAds($userId) {
		$this -> db -> select('a_i.*,c.categoryName');
		$this -> db -> from('ad_info a_i');
		$this -> db ->join('categories c', 'c.categoryId = a_i.categoryId');
		$this -> db -> where('a_i.userId', $userId);
		$this -> db -> where('a_i.isDeleted',0);
		$query = $this -> db -> get();
		return $query -> result();
	}
	
	public function getadvinfo($getadvdetail,$userId){
		$this->db->select('ad_i.*,adv_s.stateName,adv_c.name as countryName');
		$this->db->from('ad_info ad_i');
		$this->db->join('state adv_s','adv_s.stateId = ad_i.state','left outer');
		$this->db->join('country adv_c','adv_c.countryId = adv_s.countryId','left outer');
		$this -> db ->join('ad_status a_s', 'ad_i.adId = a_s.adId' ,'left outer');
		$this->db->where('ad_i.adId',$getadvdetail);
		$this->db->where('ad_i.userId',$userId);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
		
	}
	public function getStates(){
		$this->db->select('*');
		$this->db->from('state');
		$this->db->where('isActive',1);
		$this->db->order_by('stateName');
		$query = $this->db->get();
		return $query->result();
	}

	public function getCategory(){
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('isActive',1);
		$this->db->order_by('categoryName');
		$query = $this->db->get();
		return $query->result();
	}

       public function  getpublisherActive($publisherid){
                $this->db->select('*');
		$this->db->from('user_profile');
                $this->db->where('userId',$publisherid);
                $query = $this->db->get();
		return $query->row();
       }
       public function getLeadformClicks($publisherid,$categoryid){
                $savedata['publisher_id']=$publisherid;
                $savedata['category_id']=$categoryid;
		$savedata['datetime']=time();
		$this->db->insert('lead_form_views',$savedata);
           
       }

		
	public function updateBannerImage($imageNAme,$small_img_path,$adId,$Field,$userId)// 1 for banner //2 for banner background
		{
			if($Field==1){
			$ban['bannerImage'] 	  = $imageNAme;
			$ban['small_bannerImage'] = $small_img_path;
			}
			if($Field==2){
			$ban['bannerBackground'] = $imageNAme;
			$ban['banner_background_small'] = $small_img_path;
			}
			$this->db->where('adId',$adId);
			$this->db->where('userId',$userId);
			$this->db->update('ad_info',$ban);
			return true;
		}
		
	
	 public function updateImageSize()
			 {
			  $src = $this->security->xss_clean($this->input->post('imageSrc'));
			  $adID = $this->security->xss_clean($this->input->post('adID'));
			  $field = $this->security->xss_clean($this->input->post('field'));// 1 for banner //2 for banner background
			  $this->db->select('*');
			  $this->db->from('ad_info');
			  $this->db->where('adId',$adID);
			  $query = $this->db->get();
			  $result = $query->result();
			  foreach( $result as $res) {
			   if($field==1){
			    
			    $banner = $res->bannerImage;
			   }
			   if($field==2){
			    $banner = $res->bannerBackground;
			   }
			  }
			  $targ_w = $_POST['w'];
			  $targ_h = $_POST['h'];
			  $jpeg_quality = 100;
			  $img_r = imagecreatefromjpeg($src);
			  $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
			  imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			  $targ_w,$targ_h,$_POST['w'],$_POST['h']);
			  imagejpeg($dst_r,$banner,$jpeg_quality);
			  return $result;
			 }
			 
	public function insertNewAD($userId)
		{
			$ad['adName'] 			= $this->security->xss_clean($this->input->post('adName'));
			$ad['adTitle'] 			= $this->security->xss_clean($this->input->post('adTitle'));
			$ad['color'] 			= $this->security->xss_clean($this->input->post('color'));
			$ad['siteUrl'] 			= $this->security->xss_clean($this->input->post('siteUrl'));
			$ad['userActivation'] = 1;
			$ad['isActive'] = 1;
			$ad['requesTime'] = time();
			$categoryId		= $this->security->xss_clean($this->input->post('category'));
			$adtype		= $this->security->xss_clean($this->input->post('adtype'));
			
			if($adtype==null || $adtype ==''){
				return 6;
			}else{
			if($adtype ==1){
				$ad['adTitle_display']			= $this->security->xss_clean($this->input->post('display_title'));
				$ad['adDiscription_display']	= $this->security->xss_clean($this->input->post('description_display'));
				$adIcon_display			= $this->security->xss_clean($this->input->post('adIcon'));
				if($adIcon_display == null || $adIcon_display ==''){
					return 7;
				}else{
				$ad['adIcon_display']			= $this->security->xss_clean($this->input->post('adIcon'));
				}
			}else{
			
			
			
					$bannerBackground		= $this->security->xss_clean($this->input->post('banner_background'));
					if($bannerBackground ==''){
						return 2; // banner back not uploaded 
					}else{
						$ad['bannerBackground']	 = 	$bannerBackground;
						$smallImagePath = str_replace('uploads/banners','uploads/banners/small',$ad['bannerBackground']);
						$ad['banner_background_small']= $smallImagePath;
					}
					
					$bannerImage		= $this->security->xss_clean($this->input->post('newbanner'));
					if($bannerImage ==''){
						return 3;
					}else{
						$ad['bannerImage']	 = 	$bannerImage;
						$smallImagePath_banner = str_replace('uploads/banners','uploads/banners/small',$ad['bannerImage']);
						$ad['small_bannerImage']= $smallImagePath_banner;
					}
					$ad['small_bannerImage']= $this->security->xss_clean($this->input->post('newbanner'));
					
			
			}
			
			$ad['adType'] = $adtype;
			}
			
			
			if($categoryId==''){
				return 5;
			}else{
				$ad['categoryId']  = $categoryId;
			}
			
			$state					= $this->security->xss_clean($this->input->post('state'));
			
			if($state == ''){
				return 4;
			}else{
			$stateId	= substr($state, 0, strpos($state, "-"));
			$stateName	= substr($state,strpos($state, "-")+1);
			$ad['state'] = $stateId;
			$ad['stateName'] = $stateName;
			}
			
			$ad['bid_ppc']			= $this->security->xss_clean($this->input->post('bid'));
			
			$ad['userId']			= $userId;
			$this->db->insert('ad_info',$ad);
			return 1;
		} 
		
		
		
		
		public function updateAdvData($userId)
		{
			$ad['adName'] 	= $this->security->xss_clean($this->input->post('adName'));
			$ad['adTitle'] 	= $this->security->xss_clean($this->input->post('adTitle'));
			$ad['color'] 	= $this->security->xss_clean($this->input->post('color'));
			$ad['bid_ppc'] 	= $this->security->xss_clean($this->input->post('bid_ppc'));
			$ad['userActivation'] 	= $this->security->xss_clean($this->input->post('userActivation'));
			$state 	= $this->security->xss_clean($this->input->post('state'));
			$stateId	= substr($state, 0, strpos($state, "-"));
			$stateName	= substr($state,strpos($state, "-")+1);
			$ad['state'] = $stateId;
			$ad['stateName'] = $stateName;
			$ad['siteUrl'] 	= $this->security->xss_clean($this->input->post('siteUrl'));
			$ad['categoryId'] 	= $this->security->xss_clean($this->input->post('category'));
			$editId 	= $this->security->xss_clean($this->input->post('editId'));
			
			$adtype		= 	$this->security->xss_clean($this->input->post('adtype'));
			if($adtype==null || $adtype ==''){
				return 6;
			}else{
			if($adtype ==1){
				$ad['adTitle_display']			= $this->security->xss_clean($this->input->post('display_title'));
				$ad['adDiscription_display']	= $this->security->xss_clean($this->input->post('description_display'));
				$adIcon_display			= $this->security->xss_clean($this->input->post('adIcon'));
				if($adIcon_display == null || $adIcon_display ==''){
					return 7;
				}else{
				$ad['adIcon_display']			= $this->security->xss_clean($this->input->post('adIcon'));
				}
			}else{
					$bannerBackground		= $this->security->xss_clean($this->input->post('banner_background'));
					if($bannerBackground ==''){
						return 2; // banner back not uploaded 
					}else{
						$ad['bannerBackground']	 = 	$bannerBackground;
						$smallImagePath = str_replace('uploads/banners','uploads/banners/small',$ad['bannerBackground']);
						$ad['banner_background_small']= $smallImagePath;
					}
					
					$bannerImage		= $this->security->xss_clean($this->input->post('newbanner'));
					if($bannerImage ==''){
						return 3;
					}else{
						$ad['bannerImage']	 = 	$bannerImage;
						$smallImagePath_banner = str_replace('uploads/banners','uploads/banners/small',$ad['bannerImage']);
						$ad['small_bannerImage']= $smallImagePath_banner;
					}
					$ad['small_bannerImage']= $this->security->xss_clean($this->input->post('newbanner'));
					
			
			}
			
			$ad['adType'] = $adtype;
			}
			$this->db->where('adId',$editId);
			$this->db->where('userId',$userId);
			$this->db->update('ad_info',$ad);
			return true;
		}


		
	public function deleteAD($adId,$userId)
	{
		$ad['isDeleted'] = 1;
		$this->db->where('adId',$adId);
		$this->db->where('userId',$userId);
		$this->db->update('ad_info',$ad);
		return true;
	}
	
	// by raj
	public function statusAD($adId,$userId,$currentStatus)
	{
		$ad['userActivation']=1;
		if($currentStatus=='1'){
			
			$ad['userActivation']=0;
			
		}elseif($currentStatus=='0') {
			
			$ad['userActivation']=1;
		}
		
		$this->db->where('adId',$adId);
		$this->db->where('userId',$userId);
		$this->db->update('ad_info',$ad);
		return true;
	}
	// end by raj
	public function saveAdverIcon($userId,$imageNAme)
	{
		$ad['adverFromIcon'] = $imageNAme;
		$this->db->where('userId',$userId);
		$this->db->update('user_profile',$ad);
		$this->updateAdIcon($userId, $imageNAme);
		return true;
	}
	// by raj
	public function updateAdIcon($userId,$imageNAme)
	{
		$ad['adIcon_display'] = $imageNAme;
		$this->db->where('userId',$userId);
		$this->db->update('ad_info',$ad);
		
	}
		
	
	
	public function formIcon($userId)
	{
		$this->db->select('*');
		$this->db->from('user_profile');
		$this->db->where('userId',$userId);
		$query = $this->db->get();
		return $query->result();
	}
	
	//by raj
	public function getCurrentBalance($userId)
	{
		$query=$this->db->query("SELECT (sum(credit)-sum(debit)) as balance,(select credit from accounts where comment=5 and userId=$userId order by transactionTime desc limit 0,1) as lastPaidAmount FROM accounts where userId=$userId");
			return $query->row();
	}
	public function getActiveAds($userId)
	{
		$query=$this->db->query("SELECT count(*) as pendingAds,(select count(*) from ad_info where userId=$userId and userActivation=1 and isActive=1 and isApproved=1 and isDeleted=0 ) as activeAds FROM ad_info where userId=$userId and isApproved=0");
			return $query->row();
	}
  
  public function getUserActiveAds($userId)
	{
		$query=$this->db->query("select * from ad_info where userId=$userId and userActivation=1 and isActive=1 and isApproved=1 and isDeleted=0 ");
			return $query->result();
	}
	// end
	
	
		public function getrecords($current_user,$adId=0,$stateId=0,$start=0,$end=0){
		$report = array();
		$this->db->select('*');
		$this->db->from('ad_info');
		$this->db->where('isActive',1);
		$this->db->where('isApproved',1);
		$this->db->where('userId',$current_user);
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
	public function getAdViews($advertiserID,$adID,$start,$end){
			
		
		//$query;
		if($start!=0 && $end!=0)
		{
			
			$query=$this->db->query("select count(*) as click,(SELECT count(*)  FROM ad_status where isViewed=1 and created <= $start and created >=$end  and advertiserId=$advertiserID and adId=$adID) as viewCount,adId from ad_status where  isClicked=1 and created <= $start and created >=$end  and advertiserId=$advertiserID and adId=$adID");
			//echo $this->db->last_query().'<br/>';
			return $query->row();
		}
		else{
		$query=$this->db->query("select count(*) as click,(SELECT count(*)  FROM ad_status where isViewed=1 and advertiserId=$advertiserID and adId=$adID) as viewCount,adId from ad_status where  isClicked=1 and advertiserId=$advertiserID and adId=$adID");
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
	
	public function getleadsinfo($userId,$adId){
				$this->db->select('a_s.*,f_s.*,cs.formName');
				$this->db->from('ad_status a_s');
				$this->db->join('form_submit f_s','f_s.emailId=a_s.formFillId');
				$this->db->join('customeform cs','cs.formId=f_s.formId','left');
				$this->db->where('a_s.isClicked',1);
				$this->db->where('a_s.advertiserId',$userId);
				$this->db->where('a_s.adId',$adId);
				$query = $this->db->get();
				return $query->result();
	}

	public function getleads($emailId){
				$this->db->select('*');
				$this->db->from('form_submit');
				$this->db->where('emailId',$emailId);
				$query = $this->db->get();
				return $query->result();
	}

	// by raj for new changes
	
    public function getusercategory($userid){
        $this->db->select('categoryId');
		//$this->db->where('parentCategory',$parentId);
        $this->db->where('userId',$userid);
        $query = $this->db->get('user_profile');
        $cat= $query->row();
        //print_r($cat);
        $categories = strlen($cat->categoryId) > 0 ? explode('-', $cat->categoryId) : array();
        $ct=implode (", ", $categories);
        $ct = strlen($ct) > 0 ? $ct : "''";
        $query=$this->db->query("select * from categories where categoryId in ($ct)");
        return $query->result();	
    }
    public function getUserActiveCategory($userId){
        $categories = $this->getUserActiveCats($userId);
        $catIds = is_array($categories) && count($categories) > 0 ? implode(",", $categories) : "''";
        $sql = "SELECT categoryId,categoryName FROM categories WHERE categoryId IN ($catIds)";
        //echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getUserActiveCats($userId){
        $this->db->select('activecategory');
		//$this->db->where('parentCategory',$parentId);
        $this->db->where('userId',$userId);
        $query = $this->db->get('user_profile');
        $usr= $query->row();
        $cats=$usr->activecategory;
        $categories = array();
        $catArr = isset($cats) && strlen($cats) > 0 ? explode(",", $cats) : array();
        foreach($catArr as $cp){
            $catsAndPrices = isset($cp) ? explode(":",$cp) : NULL;
            if(isset($catsAndPrices[0])){
                $categories[] = $catsAndPrices[0];
            }
        }
        return $categories;
        /*$ct= count($categories) > 0 ? implode (", ", $categories) : "''";
        $query=$this->db->query("select * from categories where categoryId in ($ct)");
        return $query->result();*/
    }
     public function gettotalViews(){
         
        //$first_day_this_month = date('m-01-Y'); 
         // $firstdate_time= strtotime($first_day_this_month);
         $start = strtotime("first day of this month midnight");
         $end =	strtotime( 'last day of ' . date( 'F Y'))+ 86400;
         
         $query= $this->db->query("SELECT  *, COUNT(*) as views  FROM lead_form_views  INNER JOIN categories where categories.categoryId=lead_form_views.category_id and datetime BETWEEN $start AND $end  GROUP BY category_id");  
         return $res= $query->result();
        }
      public function gettotalleads($current_user){
         $start = strtotime("first day of this month midnight");
         // echo $start ." <br/>";
         $end =	strtotime( 'last day of ' . date( 'F Y'))+ 86400 ; 
          //echo $end;
         $query= $this->db->query("SELECT  *, COUNT(*) as totalleads  FROM ad_form_data where recomanded_advertiser=$current_user and isRoleback!=1 and datetime BETWEEN $start AND $end GROUP BY categoryId");
          //print_r($query) ;
          return $res= $query->result();
          
      }
      //created by ravi
      public function getactiveleadId($userid){
         $this->db->select('activecategory');
		//$this->db->where('parentCategory',$parentId);
        $this->db->where('userId',$userid);
        $query = $this->db->get('user_profile');
        $cat= $query->row();
        return $cat;
       }
      
       public function gettotaloldleads($current_user,$start,$end){
          $query= $this->db->query("SELECT  *, COUNT(*) as totalleads  FROM ad_form_data where recomanded_advertiser=$current_user and isRoleback!=1 and datetime BETWEEN $start AND $end  GROUP BY categoryId");
          return $res= $query->result();
          
      }
	
    public function getOldviews($start,$end){
          $query= $this->db->query("SELECT  *, COUNT(*) as views  FROM lead_form_views  INNER JOIN categories where categories.categoryId=lead_form_views.category_id and datetime BETWEEN $start AND $end GROUP BY category_id");  
          return $res= $query->result();
       }
    public function getUserCat($userid){
        $this->db->select('categoryId');
		//$this->db->where('parentCategory',$parentId);
        $this->db->where('userId',$userid);
        $query = $this->db->get('user_profile');
        $cat= $query->row();
        return $cat;
    }
    public function getUserBidPriceWithCategory($userId){
        //get bidprice and category for user
        //get all categories
        
        
        $query = $this->db->query("select categoryId,minbidprice,categoryName from categories");
        $cats = $query->result();
        $allCatPriceArr = array();
        foreach($cats as $cat){
            $allCatPriceArr[$cat->categoryId] = $cat;
        }
        
        //print_r($allCatPriceArr);
        //echo "<br/>";
        
        $this->db->select('bidprice,categoryId');
        $this->db->from("user_profile");
        $this->db->where("userId",$userId);
        $this->db->where("isActive", 1);
        $this->db->where("isDeleted", 0);
        $this->db->where("isAccepted", 1);
        $query = $this->db->get();
		
        $row = $query->row();
	
        //print_r($row);
        $bidPrices = NULL;
        $categoryId = NULL;
        if(isset($row) && !empty($row)){
            $bidPrices = strlen($row->bidprice) > 0 ? $row->bidprice : NULL;
            $categoryId = strlen($row->categoryId) > 0 ? $row->categoryId : NULL;
        }
        //print_r($categoryId);
        $bidPriceArr = array();
        if(isset($bidPrices)){
            foreach(explode(",", $bidPrices) as $bp){
                $catAndPrice = explode(":",$bp);
                $bidPriceArr[$catAndPrice[0]] = $catAndPrice[1];
            }
	    //print_r($bidPriceArr);
        }
        $info = array();
        if(isset($categoryId)){
            if(isset($bidPrices)){
            foreach(explode("-", $categoryId) as $catId){
                $userBids = array();
                $cat =  $allCatPriceArr[$catId];
                $userBids["id"] = $cat->categoryId;
                $userBids["name"] = $cat->categoryName;
                $userBids["minbidprice"] = $cat->minbidprice;
                $userBids["userbidprice"] = isset($bidPriceArr[$cat->categoryId]) ? $bidPriceArr[$cat->categoryId] : $cat->minbidprice;
                $info[] = $userBids;
            }
          }
		}
        /*
        
        
        $ct=implode (", ", $categories);
        if(count($categories) > 0){
            //get full categories which belongs to user 
           

            $prices = explode(",", $priceStr);
            //$catAndPrice = explode($prices);

            foreach($prices as $price){
                $catAndPrice = explode(":", $price);
                if(count($catAndPrice) > 0){
                    $cat = isset($catAndPrice[0]) ? $catAndPrice[0] : NULL;
                    $price = isset($catAndPrice[1]) ? $catAndPrice[1] : NULL;
                    foreach($allCats as $category){
                        if($category->categoryId == $cat){
                            $category->minbidprice .= ":" . $price;
                        }
                    }
                }
            }
            //$categoryIds = $row[0]->categoryId;*/
            return $info;
        
    }
	public function getleadrecords($current_user,$categoryId=0,$statename=null,$start=0,$end=0){
		$todayAM = strtotime('today midnight');
		$q="SELECT * FROM ad_form_data INNER JOIN advertiser_form_data ON form_data_id = form_dataId INNER JOIN user_profile ON ad_form_data.publisherId = user_profile.userId WHERE recomanded_advertiser =$current_user and isRoleback!=1 ";
		//echo $q;
                if(strlen($statename) > 0){
			$q.=" and state_name like '%$statename%'";
		}
		if($start!=0){	
			$q.=" and datetime >= $start";
		}if($end!=0){
			$q .=" and datetime <= $end";
		}
		if($categoryId!=0){
			$q.=" and ad_form_data.categoryId = $categoryId";
		}
                $q .= " ORDER BY datetime DESC";
               //echo $q;
		$query=$this->db->query($q);
		return $result=$query->result();
		
		
	}
        public function getoldleadrecords($current_user,$categoryId=0,$statename=null,$start=0,$end=0){
		$todayAM = strtotime('today midnight');
		$q="SELECT * FROM ad_form_data INNER JOIN advertiser_form_data ON form_data_id = form_dataId WHERE recomanded_advertiser =$current_user and isRoleback!=1 ";
		if(strlen($statename) > 0){
			$q.=" and state_name like '%$statename%'";
		}
		if($start!=0){	
			$q.=" and datetime >= $start";
		}if($end!=0){
			$q .=" and datetime <= $end";
		}
		if($categoryId!=0){
			$q.=" and categoryId = $categoryId";
		}
                $q .= " ORDER BY datetime DESC";
                //echo $q;
		$query=$this->db->query($q);
		return $result=$query->result();
		
		
		
	}
        public function getTodaysLeads($current_user){
            $todayAM = strtotime('today midnight');
           // echo date("d-m-y H:i:s a" ,1390292699);
            $todayPM = $todayAM + 86400;
            
            //echo "<br>" . date("d-m-y H:i:s a" , $todayPM);
            //echo (1386365991 - $todayAM ) . " " . ($todayPM - 1386365991) . " " . 1386365991;
            //$q = "SELECT * FROM ad_form_data where recomanded_advertiser=$current_user and isRoleback != 1 and datetime BETWEEN $todayAM AND $todayPM ORDER BY datetime DESC";
            $q = "SELECT * FROM ad_form_data INNER JOIN advertiser_form_data ON form_data_id = form_dataId INNER JOIN accounts ON ad_form_data.form_data_id = accounts.form_data_id  WHERE recomanded_advertiser =$current_user and isRoleback != 1 and comment =2 and datetime BETWEEN $todayAM AND $todayPM ORDER BY datetime DESC";
           //echo $q;
            $query=$this->db->query($q);
            return $result=$query->result();
        }
        private function searchAge($choosedcat,$option ,$xml){
            $currentYear = date("Y",  strtotime("this year"));
            $start = 0;
            $end = 0;
            if($option == "18 – 20"){
                $start = $currentYear - 18;
                $end = $currentYear - 20;
            }else if($option == "21 – 30"){
                $start = $currentYear - 21;
                $end = $currentYear - 30;
            }else if($option == "31 – 40"){
                $start = $currentYear - 31;
                $end = $currentYear - 40;
            }else if($option == "40 and above"){
                $start = $currentYear - 40;
                $end = $currentYear - 200;
            }
            $leadData = simplexml_load_string($xml);
            $dob = NULL;
            if($choosedcat == LIFE_INSURANCE){
                $dob = $leadData->person->dateofbirth;
            }else if($choosedcat == PAYDAY_LOAN){
                $dob = $leadData->dob;
            }else{
                $dob = $leadData->dateofbirth;
            }
            $year = date("Y",  strtotime($dob));
            return $year >= $start && $year <= $end ? TRUE : FALSE;
        }
        private function leadsByAge($choosedcat,$age,$p_leads){
            //get all lead rather than previous one related to choosen cateogry
            // then find age if it exist in the XML form
            // create record set of form_ids
            if($p_leads!=null && $p_leads!=''){
                $query="SELECT form_data_id,form_data FROM ad_form_data where form_data_id not in ($p_leads) AND ";
            }else{
                $query="SELECT form_data_id,form_data FROM ad_form_data where ";
            }
            $query .= "categoryId=$choosedcat";
            //echo $query;
            $q = $this->db->query($query);
            $leads = $q->result();
            $formIds = array();
            $catHaveDob = false;
            switch ($choosedcat){
                case LIFE_INSURANCE :
                case BUSINESS_INSURANCE:
                case TRAVEL_INSURANCE:
                case PAYDAY_LOAN:
                    $catHaveDob = true;
                break;
            }
            if($catHaveDob){
                foreach($leads as $lead){
                    if($this->searchAge($choosedcat,$age ,$lead->form_data)){
                        $formIds[] = $lead->form_data_id;
                    }
                }
            }else{
                // if dob not present in category
                foreach($leads as $lead){
                    $formIds[] = $lead->form_data_id;
                }
            }
            return $formIds;
        }
        private function searchGender($catId,$option ,$xml){
            $leadData = simplexml_load_string($xml);
            $gender = "";
            if($choosedcat == LIFE_INSURANCE){
                $gender = $leadData->person->gender;
            }
            return $gender == $option ? TRUE : FALSE;
        }
        private function leadsByGender($choosedcat,$gender,$p_leads){
            //get all lead rather than previous one related to choosen cateogry
            // then find gender if it exist in the XML form
            // create record set of form_ids
             if($p_leads!=null && $p_leads!=''){
                $query="SELECT form_data_id,form_data FROM ad_form_data where form_data_id not in ($p_leads) AND ";
            }else{
                $query="SELECT form_data_id,form_data FROM ad_form_data where ";
            }
            $query .= "categoryId=$choosedcat";
            
            $q = $this->db->query($query);
            $leads = $q->result();
            $formIds = array();
            $catHaveGender = false;
            switch ($choosedcat){
                case LIFE_INSURANCE :
                    $catHaveDob = true;
                break;
            }
            if($catHaveGender){
                foreach($leads as $lead){
                    if($this->searchGender($choosedcat,$gender, $lead->form_data)){
                        $formIds[] = $lead->form_data_id;
                    }
                }
            }else{
                // if gender not present in category
                foreach($leads as $lead){
                    $formIds[] = $lead->form_data_id;
                }
            }
            return $formIds;
        }
        
        //this method search for old leads from other advertiser : "Buy Old Leads"
        public function getOldLeads($current_user){
            $choosedcat	= $this->security->xss_clean($this->input->post('usercat'));
            $choosedcat	= isset($choosedcat) && strlen($choosedcat) > 0 ? $choosedcat : "";
            //echo "my choosed cat is ". $choosedcat;
            $statename	= $this->security->xss_clean($this->input->post('statename'));
            $from = $this->security->xss_clean($this->input->post("datepicker_from"));
            $to = $this->security->xss_clean($this->input->post("datepicker_to"));
            $age =  $this->security->xss_clean($this->input->post("age"));
            $age = isset($age) && strlen($age) > 0 ? $age : NULL;
            $gender = $this->security->xss_clean($this->input->post("gender"));
            $gender = isset($gender) && strlen($gender) > 0 ? $gender : NULL;
            
            $p_leads = $this->previousLeads($current_user);
            $from = isset($from) && strlen($from) > 0 ? strtotime( $from . " midnight") : NULL;
            $to = isset($to) && strlen($to) > 0 ? strtotime( $to . " midnight") + 86399 : NULL;
              
            //$date= strtotime('-30 days');
           // echo $date;
            //echo date("d-m-y H:i:s a" , $date);
            $query="SELECT * FROM ad_form_data JOIN advertiser_form_data ON ad_form_data.form_data_id = advertiser_form_data.form_dataId ";
            $formIds = array();
            if(isset($age)){
                $formIds = $this->leadsByAge($choosedcat,$gender,$p_leads);
                //print_r($formIds);
            }
            if(isset($gender)){
                $formIds = array_merge($formIds,$this->leadsByGender($choosedcat,$gender,$p_leads)) ;
               // echo "<br/><br/>";
                //print_r($formIds);
            }
            if(count($formIds) > 0){
                $uniqueIds = array_unique($formIds);
                $strIds = count($uniqueIds) > 0 ? implode(",", $uniqueIds) : "''";
                $query .= "where form_dataId in ($strIds) ";
            }else{
                $p_leads = strlen($p_leads) > 0 ? $p_leads : "''";
                $query .= "where form_dataId not in ($p_leads) ";
            }
            $query .= " AND categoryId=$choosedcat";
            if( strlen($statename) > 0){
                $query.=" and state_name like '%$statename%'";
            }
            $query.=" and isRoleback != 1 AND fraud != 1 ";
            $last7day = strtotime("-7 day");
            if(isset($from) && isset($to)){
             
                if($from < $last7day && $last7day <= $to){
                    // if current date is between search criteria
                    //echo date("d-m-y H:i:s a" , $from)."<br>";
                   //echo date("d-m-y H:i:s a" , $last7day);
                    $query .= " AND datetime BETWEEN $from AND $last7day ";
                   // echo $query;
                }elseif($from < $last7day && $last7day > $to){
                   //echo date("d-m-y H:i:s a" , $from)."<br>";
                    //echo date("d-m-y H:i:s a" , $to);
                     $query .= " AND datetime BETWEEN $from AND $to";
                    
                }else{
                   
                   $query.= " AND datetime =0 ";
                }
              
            }else{
                  $query.= " AND datetime <= $last7day ";
            }
            
            //echo $query;
            $query=$this->db->query($query);
            //echo $this->db->last_query();
            $leads = $query->result();
            return $leads;
        }
	public function getpurchase($current_user){
            //$choosedcat	= $this->security->xss_clean($this->input->post('usercat'));
            //echo "my choosed cat is ". $choosedcat;
                /*$choosedcat	= $this->security->xss_clean($this->input->post('usercat'));
                $statename	= $this->security->xss_clean($this->input->post('statename'));
                $from = $this->security->xss_clean($this->input->post("datepicker_from"));
                $to = $this->security->xss_clean($this->input->post("datepicker_to"));
                $age = $this->security->xss_clean($this->input->post("age"));
                $gender = $this->security->xss_clean($this->input->post("gender"));
                
                $p_leads = $this->previousLeads($current_user);
                
                
                
                $from = isset($from) && strlen($from) > 0 ? strtotime( $from . " midnight") : NULL;
                $to = isset($to) && strlen($to) > 0 ? strtotime( $to . " midnight") + 86400 : NULL;
                
                $query="";
                if($p_leads!=null && $p_leads!=''){
                    $query="SELECT * FROM ad_form_data where form_data_id not in ($p_leads) ";
                }else{
                    $query="SELECT * FROM ad_form_data where ";
                }
                if($choosedcat!=0){
                    $query.="categoryId=$choosedcat";
                }else{
                    // this will select all categories in which adv. belongs to (ALL)
                    // for now it is not recomended by client
                    
                    /*$this->db->select('categoryId');
                    $this->db->where('userId',$current_user);
                    $query1 = $this->db->get('user_profile');
                    $cat= $query1->row();
                    $categories=explode('-', $cat->categoryId);
                    $ct=implode (", ", $categories);	
                    $query.=" categoryId in ($ct)";*/
                
                /*if( strlen($statename) > 0){
                    $query.=" and state_name like '%$statename%'";	
                }
                $query.=" and isRoleback != 1 ";
                if(isset($from) && isset($to)){
                    $query .= " AND datetime BETWEEN $from AND $to";
                }
                $query=$this->db->query($query);
                 * $leads= $query->result();
                 * 
                 */
                $wantedLeads = $this->security->xss_clean($this->input->post("leadswanted"));
               
                $wantedLeads = isset($wantedLeads) && strlen($wantedLeads) > 0 ? $wantedLeads : 0;
             
                $wantedArr =array();
                $leads = $this->getOldLeads($current_user);
              
                //print_r($leads);
                $cntLead = count($leads);
               
                if($wantedLeads > $cntLead){
                    // Not enough Leads
                    $wantedLeads = $cntLead;
                }
                $count = 0;
                foreach ($leads as $lead){
                    if($count < $wantedLeads){
                        $wantedArr[] = $lead;
                    }else{
                        break;
                    }
                    $count++;
                }
               
                $leadcount = count($wantedArr);
               
                if($leadcount > 0){
                    $val=$this->checkpurchasecount($leadcount,$current_user);
                    if($val==1){
                        // add Lead Cost to admin.
                        //$this->updateAdminAfterPurchaseLead($leadcount);
                        $this->addleadsinrecord($wantedArr,$current_user);
                        return $wantedArr;
                        //echo $wantedLeads ." Lead(s) Purchased !!!";
                    }else if($val==2){
                        return "Balance is not sufficient";
                        // balance is not sufficient for purchase
                    }
                }
                return "Nothing Purchased";
	}
        /*private function updateAdminAfterPurchaseLead($leadcount,$current_user){
            $setprice['transactionTime']=time();
            $setprice['comment']=6;
            $setprice['userId']=$current_user;
            $setprice['memo']="Lead completed for advertiser";
            $setprice['form_data_id']=$form_data_id;

            $res=$this->db->insert('accounts',$setprice);
        }*/
	public function checkpurchasecount($leadcount,$current_user){
				$userfinanace=	$this->getCurrentBalance($current_user);
				$balnace=$userfinanace->balance;
                                //echo " user balance : " .$balnace ;
				$totalChange=LEAD_COST*$leadcount;
				if($totalChange>$balnace){
					
					return 2;
					// balance is not sufficient for purchase
				}else{
						return 1;
						
					// balance enough and need to add leads for user records	
					
				}
	} 	
	public function addleadsinrecord($leads,$userId){
            // delete previous records
            
            $ids = "";
            $comma = "";
            foreach($leads as $lead){
                $ids .= $comma. $lead->form_data_id;
                $comma = ",";
            }
            if(count($leads) > 0){
                $sql = "DELETE FROM advertiser_form_data WHERE form_dataId IN ($ids)";
                $this->db->query($sql);
            }
            foreach ($leads as $lead) {
                    $formrel['form_dataId'] =$lead->form_data_id;
                    $formrel['advertiserId'] =$userId;
                    $formrel['givenDate'] =time();
                    $this->db->insert('advertiser_form_data',$formrel);
            }
            $leadcount=count($leads);
            $fo['debit'] =LEAD_COST*$leadcount;
            $fo['transactionTime'] =time();
            $fo['comment'] =6;
            $fo['userId']=$userId;
            $fo['memo']='Leads Purchase by advertiser';
            $fo['admin_profile']=LEAD_COST*$leadcount;
            $this->db->insert('accounts',$fo);
	} 
	public function previousLeads($userId){
		
					$this->db->select('form_dataId');
					$this->db->where('advertiserId',$userId);
					$query = $this->db->get('advertiser_form_data');
					$previousleads= $query->result();
					$ld=array();
					$tem=0;
					foreach ($previousleads as $pv) {
						$ld[$tem]=$pv->form_dataId;
						$tem++;
					}
				return	$p_leads=implode (", ", $ld);
			
	} 
        public function updateUserCategories($userid){
            $catIds= $this->security->xss_clean($this->input->post('category'));
            $cat="";
            if(!empty($catIds)){
             $cat=  implode('-',$catIds);
            }
            
            //before update category we must also update bidprice according to category.
            $this->db->select("bidprice");
            $this->db->where("userId" , $userid);
            $query = $this->db->get("user_profile");
            $row = $query->row();
            //print_r($row);
            $bpriceArr = explode("," , $row->bidprice);
            $bstring = "";
            $comma = "";
            foreach($bpriceArr as $bp){
                $catAndPrice = explode(":",$bp);
                if(isset($catAndPrice[0]) && isset($catAndPrice[1])){
                    if(in_array($catAndPrice[0], $catIds)){
                        $bstring .= $comma . $catAndPrice[0] . ":" . $catAndPrice[1];
                        $comma = ",";
                    }
                }
            }
            //echo " this is " . $bstring;
            $up["bidprice"] = $bstring;
            $up['categoryId']=$cat;
            $this->db->where('userId',$userid);
            return ($this->db->update('user_profile',$up)) ? true : false;
	}
        public function updateActiveCategories($userid){
            $catIds= $this->security->xss_clean($this->input->post('category'));
            //before update category we must also update bidprice according to category.
            $this->db->select("bidprice");
            $this->db->where("userId" , $userid);
            $query = $this->db->get("user_profile");
            $row = $query->row();
            //print_r($row);
            $bpriceArr = explode("," , $row->bidprice);
            $bstring = "";
            $comma = "";
            foreach($bpriceArr as $bp){
                $catAndPrice = explode(":",$bp);
                if(isset($catAndPrice[0]) && isset($catAndPrice[1])){
                    if(is_array($catIds) && in_array($catAndPrice[0], $catIds)){
                        $bstring .= $comma . $catAndPrice[0] . ":" . $catAndPrice[1];
                        $comma = ",";
                    }
                }
            }
            //echo " this is " . $bstring;
            $up["activecategory"] = $bstring;
            $this->db->where('userId',$userid);
            return ($this->db->update('user_profile',$up)) ? true : false;
	}
        public function updateUserBidPrice($userId){
            // user input
            $catIds = $this->security->xss_clean($this->input->post('category'));
            $minimum_bid = $this->security->xss_clean($this->input->post('minimum_bid'));
           // print_r($userId);
            // get active category of current advertiser
            $this->db->select("activecategory");
            $this->db->where("userId" , $userId);
            $query = $this->db->get("user_profile");
            $row = $query->row();
            
            
            $activeCatAndPrices = strlen($row->activecategory) ? $row->activecategory : NULL;
            // making activecategory and price array
            $activePriceArr = array();
            if(isset($activeCatAndPrices)){
                foreach(explode(",", $activeCatAndPrices) as $catPrice){
                    $cp = explode(":",$catPrice);
                    $activePriceArr[$cp[0]] = $cp[1];
                }
            }
            
            $bidprice = "";
            if(is_array($catIds) && count($catIds) > 0){
                $cnt = 0;
                $bstring4ActiveCat = "";
                $commaActive = "";
                $comma = "";
                foreach($catIds as $catId){
                    $bidprice .= $comma . $catId . ":" . $minimum_bid[$cnt];
                    if(isset($activePriceArr[$catId])){
                        $bstring4ActiveCat .= $commaActive . $catId . ":" .$minimum_bid[$cnt];
                        $commaActive = ",";
                    }
                    $comma = ",";
                    $cnt++;
                }
            }
            //print_r($bstring4ActiveCat);
            //echo "<br/>";
            //print_r($bidprice);
            
            // get Category and their bid prices
            $this->db->select("categoryId,minbidprice,categoryName");
            $reslt = $this->db->get("categories");
            $catAndPriceMap = array();
            $catAndNameMap = array();
            $catPriceResult = $reslt->result();
            foreach($catPriceResult as $cPMap){
                $catAndPriceMap[$cPMap->categoryId] = $cPMap->minbidprice;
                $catAndNameMap[$cPMap->categoryId] = $cPMap->categoryName;
            }
            $count = 0;
            $diffBidPrice = true;
            $errmsg = "";
            foreach($catIds as $catId){
                if($catAndPriceMap[$catId] < $minimum_bid[$count]){
                    $returnArr = $this->checkBidPriceForCategory($catId,$minimum_bid[$count],$userId);
                    if(is_array($returnArr)){
                        $id = $returnArr["catId"];
                        $price = $returnArr["price"];
                        $errmsg = "Error : Bid Price $price for {$catAndNameMap[$id]} Already Taken By Other Advertiser.!!";
                        $diffBidPrice = false;
                        break;
                    }
                }
                $count ++;
            }
            if($diffBidPrice){
                $up["activecategory"] = $bstring4ActiveCat;
                $up["bidprice"] = $bidprice;
                $this->db->where('userId' , $userId);
                 //print_r($userId);
                return ($this->db->update('user_profile',$up)) ? true : false;
            }
            return $errmsg;
            //echo $bidprice;
        }
        private function checkBidPriceForCategory($catId,$bidPrice,$userId){
            //1. get all advertiser current login user
            $this->db->select("userId,activecategory");
            $this->db->where('userId !=', $userId);
            $this->db->where("userType" , 1);
            $this->db->where("isActive", 1);
            $this->db->where("isDeleted", 0);
            $this->db->where("isAccepted", 1);
            $query = $this->db->get("user_profile");
            $this->db->last_query();
            $advs = $query->result();
          // print_r($row);
            foreach($advs as $adv){
                $bidPriceArr = isset($adv->activecategory) && strlen($adv->activecategory) > 0 ? $this->getBidPriceFromString($adv->activecategory) : array();
              // print_r($bidPriceArr);
               echo "<br/>";
                if(count($bidPriceArr) > 0 && isset($bidPriceArr[$catId]) && $bidPriceArr[$catId] == $bidPrice){
                    return array( "catId" => $catId , "price" => $bidPrice );
                }
            }
            
           /*foreach($advs as $adv){
                $bpriceArr = isset($adv->bidprice) && strlen($adv->bidprice) > 0 ? explode("," , $adv->bidprice) : array();
                foreach($bpriceArr as $bp){
                    $catAndPrice = isset($bp) && strlen(trim($bp)) > 0 ? explode(":",$bp) : NULL;
                    $cat = isset($catAndPrice[0]) ? $catAndPrice[0] : NULL;
                    $price = isset($catAndPrice[1]) ? $catAndPrice[1] : NULL;
                    // step 2 : now check that some other user have the same price for the same category or not.
                    
                    $count = 0;
                    // $catIds comming from page.
                    foreach ($catIds as $catId){
                        echo "Admin PRice : $catAndPriceMap[$catId]  User Price  $bidPrices[$count] <br/>";
                        if($catId == $cat && $bidPrices[$count] == $price){
                            return false;  
                        }
                        $count++;
                    }
                    
                 }
             }*/
          
             return true;
       }
       private function getBidPriceFromString($bstring){
           $bidPrice = array();
           $bpriceArr = isset($bstring) && strlen($bstring) > 0 ? explode("," , $bstring) : array();
            foreach($bpriceArr as $bp){
                $catAndPrice = isset($bp) && strlen(trim($bp)) > 0 ? explode(":",$bp) : NULL;
                $cat = isset($catAndPrice[0]) ? $catAndPrice[0] : NULL;
                $price = isset($catAndPrice[1]) ? $catAndPrice[1] : NULL;
               // print_r($price);
                if(isset($price) && isset($cat)){
                    $bidPrice[$cat] = $price;
                  }
            }
            //print_r($bidPrice);
            return $bidPrice;
       }
        public function getTopBidsByCategory($userid){
            $uCategories = self::getusercategory($userid);
           // print_r($uCategories);
            //getting bid prices for all user
            $this->db->select('activecategory');
            $this->db->where("userType" , 1);
            $this->db->where("isActive", 1);
            $this->db->where("isDeleted", 0);
            $this->db->where("isAccepted", 1);
            $query = $this->db->get('user_profile');
            $bidPrices = $query->result();
            
            $topPrices = array();
            $limit = 3;
            
            /*print_r($bidPrices);
            echo "<br/><br/>";
            print_r($uCategories);
            echo "<br/>";*/
            
            foreach($bidPrices as $bprice){
                //echo "<br/>";
                
                $catAndPriceArr = isset($bprice->activecategory) ? explode(",", $bprice->activecategory) : array();
                //print_r($catAndPriceArr);
                foreach($catAndPriceArr as $cp){
                    $catsAndPrices = isset($cp) ? explode(":",$cp) : NULL;
                   //print_r($catsAndPrices);
                    $cat = isset($catsAndPrices[0]) ? $catsAndPrices[0] : NULL;
                    $price = isset($catsAndPrices[1]) ? $catsAndPrices[1] : NULL;
                    //echo $price;
                    //echo "<br/>";
                    foreach($uCategories as $ucat){
                        if($cat == $ucat->categoryId){
                            $topArray = array();
                            if(!array_key_exists($ucat->categoryName, $topPrices)){
                                $topPrices[$ucat->categoryName] = $topArray;
                            }else{
                                $topArray = $topPrices[$ucat->categoryName];
                            }
                            $count = count($topArray);
                            //echo "count is " . $count . "<br/>";
                            //$count = count($topArray);
                            $minBidprice = $ucat->minbidprice;
                            if($minBidprice > $price){
                                $price = $minBidprice;
                            }
                            if($count == 0){
                                $topArray[0] = $price;
                            }else if($count == 1){
                                if($topArray[0] < $price){
                                    $topArray[1] = $topArray[0];
                                    $topArray[0] = $price;
                                }else{
                                    $topArray[1] = $price;
                                }
                            }else if($count == 2){
                                //echo "Here " . $topArray[0] < $price ;
                                //echo 
                                if($topArray[0] < $price){
                                    $topArray[2] = $topArray[1];
                                    $topArray[1] = $topArray[0];
                                    $topArray[0] = $price;
                                }else if($topArray[1] < $price){
                                    $topArray[2] = $topArray[1];
                                    $topArray[1] = $price;
                                }else{
                                    $topArray[2] = $price;
                                }
                            }else if($count == 3){
                                if($topArray[0] < $price){
                                    $topArray[2] = $topArray[1];
                                    $topArray[1] = $topArray[0];
                                    $topArray[0] = $price;
                                }else if($topArray[1] < $price){
                                    $topArray[2] = $topArray[1];
                                    $topArray[1] = $price;
                                }else if($topArray[2] < $price){
                                    $topArray[2] = $price;
                                }
                            }
                            //echo $cat . " => ";
                            //print_r($topArray);
                            //echo "<br>";
                            $topPrices[$ucat->categoryName] = $topArray;
                        }
                    }
                }
            }
            //echo "<br/>";
            //print_r($topPrices);
            return $topPrices;
        }
        
        public function insertThirdPartyLink($userId){
            $thirdpartylink = $this->security->xss_clean($this->input->post('thirdpartylink'));
           
           // echo $thirdpartylink;
            $data['Third_Party_Only'] = $thirdpartylink;
            $this->db->where('userId' , $userId);
            return ($this->db->update('user_profile',$data)) ? true : false;
           // $this->db->insert('user_profile',$data); 
            
        }
        
        public function getThirdPartyLink($userId){
            //echo $userId;
           $this->db->select("Third_Party_Only");
            $this->db->where("userId" , $userId);
            $query = $this->db->get("user_profile");
            $row = $query->row();
            return $row;
        }
        public function getLeadQuotes($userId,$catId){
            $this->db->select("*");
            $this->db->where("user_id" , $userId);
            $this->db->where("cat_id" , $catId);
            $query = $this->db->get("lead_quotes");
            $row = $query->row();
            return $row;
        }
        public function getCategoryOfId($catId){
            $this->db->select("*");
            $this->db->where("categoryId" , $catId);
            $query = $this->db->get("categories");
            $row = $query->row();
            return $row;
        }
        public function getCategoryWithLeadQuotes($userId,$catId){
            $sql = "select * from categories Left Outer Join lead_quotes ON lead_quotes.cat_id = categories.categoryId  where user_id = $userId and cat_id = $catId";
            $query = $this->db->query($sql);
            return $query->row();
        }
        public function insertLeadQuotes($leadQuotes){
            $this->db->insert('lead_quotes',$leadQuotes);
            $this->db->insert_id();
        }
        public function updateLeadQuotes($leadQuotes,$catId,$userId){
            $this->db->where('user_id',$userId);
            $this->db->where('cat_id',$catId);
            $this->db->update('lead_quotes',$leadQuotes);
        }


        // end
	
}
?>