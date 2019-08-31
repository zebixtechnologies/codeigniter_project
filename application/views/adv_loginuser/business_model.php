<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */

class business_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
    public function getBlance($userID){
    	
		$this->db->query('SELECT (sum(credit)-sum(debit)) as balance  FROM accounts WHERE  userId='.$userID);
		return $query->result();
		
    }
    
    public function getMD5Password($pwd){
    	
		// $password=md5($pwd);
		$password=$pwd;
		return $password;
		
    }
	
	// by raj
	
	public function getLeads($state,$category,$ip,$pub,$subpub){
    	
		// $password=md5($pwd);
		
		$this->db->select('*');
		$this->db->from('ad_info');
		$this->db->where('userActivation','1');
		$this->db->where('isActive','1');
		$this->db->where('isApproved','1');
		$this->db->where('isDeleted','0');
		if($state!=NULL && $state!=""){
			
		$this->db->where('stateName',strtolower($state));
		}
		
		if($category!=NULL && $category!='0')
		{
			$this->db->where('categoryId',$category);
			
		}
		
		$this->db->order_by('bid_ppc','desc');
		$query=$this->db->get();
		$ad_statusData=$query->result();
		if(empty($ad_statusData)){
			
			return $ad_statusData;
		}
		$statusids=$this->saveViewedLeads($ip,$pub,$ad_statusData,$subpub);
		
		$statusDetails= $this->getStatusDetails($statusids);
		$adinfo= $query->result();
		$results=array();
		$i=0;
		foreach($adinfo as $ad){
			
			$results[$i]['adId']=$ad->adId;
			$results[$i]['adName']=$ad->adName;
			$results[$i]['bannerImage']=$ad->bannerImage;
			$results[$i]['bannerBackground']=$ad->bannerBackground;
			$results[$i]['adType']=$ad->adType;
			$results[$i]['adIcon_display']=$ad->adIcon_display;
			$results[$i]['adDiscription_display']=$ad->adDiscription_display;
			$results[$i]['adTitle_display']=$ad->adTitle_display;
			$results[$i]['userId']=$ad->userId;
			foreach($statusDetails as $as){
				
				if($ad->adId==$as->adId){
					
					$results[$i]['adStatusId']=$as->adStatusId;
					$results[$i]['created']=$as->created;
					break;
				}	
				
			}
			$i++;
		}
		
		//$allinfo = array($adinfo,$statusDetails);
		
		return $results;
		
		
		
    }
	public function saveViewedLeads($ip,$pub,$ad_statusData,$subpub){
			
		$statusIds=array();
	//print_r($ad_statusData);
		foreach ($ad_statusData as $ad_status) {
			
		$data['isAdminApproved']='1';
		$data['publisherId']=$pub;
		$data['stateId']=$ad_status->state;
		$data['isViewed']='1';
		$data['adId']=$ad_status->adId;
		$data['advertiserId']= $ad_status->userId;
		$data['ipaddress']=$ip;
		$data['created']=time();
		$data['clicktime']=time();
		$data['subPublisherId']=$subpub;
			
		$this->db->insert('ad_status',$data);
		//echo $this->db->last_query();
		array_push($statusIds,$this->db->insert_id());
		}
		$statusId=implode(",",$statusIds);
		return $statusId;
		
		
		
	}
	
	public function getStatusDetails($statusids)
	{
		$query=$this->db->query("select * from ad_status where adStatusId in ($statusids)");
		 return $query->result();
		
	}
	
	public function makeCommets()
	{
		
		if(!empty($_POST)){
		$status['formFillId']	=	$this->insertFormValues();
		$status['clickTime'] = time();
		$status['formFillDate']=time();
		$status['isAdminApproved']=1;
		$status['isClicked']=1;
		$created=$this -> security -> xss_clean($this -> input -> post('cteationTime'));
		$adID=$this -> security -> xss_clean($this -> input -> post('adId'));
		$adStatusID=$this -> security -> xss_clean($this -> input -> post('StatusID'));
		$advertiserID=$this -> security -> xss_clean($this -> input -> post('advID'));
		$publisherID=$this -> security -> xss_clean($this -> input -> post('pub'));
		$this->db->where('created',$created);
		$this->db->where('adId',$adID);
		$query=$this->db->update('ad_status',$status);
		$comission=$this->getAdminProfit($publisherID,$adID);
		
		$finalCommision='';
		if($comission->adminCommission!='0' && $comission->adminCommission!=NULL){
			
			$finalCommision=$comission->adminCommission;
		}else{
				
			$finalCommision=$comission->commission;
		}
		$query1=$this->makeAccountChange($adStatusID,$comission->bidPrice,$publisherID,$advertiserID,$finalCommision);
		
		}
		return TRUE;
	}
	
	public function insertFormValues(){
	         if(!empty($_POST['sinleLine'])){
               $emailForm['singleText'] 	= 	implode('!&#' , $this->security->xss_clean($this->input->post('sinleLine')));
			   $emailForm['singleText_label'] 	= 	implode('!&#' , $this->security->xss_clean($this->input->post('sinleLine_label')));
				}
			if(!empty($_POST['NumberText'])){
               $emailForm['number'] 		= 	implode('!&#' , $this->security->xss_clean($this->input->post('NumberText')));
			   $emailForm['number_label'] 		= 	implode('!&#' , $this->security->xss_clean($this->input->post('number_label')));
				}
			if(!empty($_POST['paraText'])){
              $emailForm['paragraph'] 		= 	implode('!&#' , $this->security->xss_clean($this->input->post('paraText')));
              $emailForm['paragraph_label'] 		= 	implode('!&#' , $this->security->xss_clean($this->input->post('pText_label')));
				}
			if(!empty($_POST['multipleChoiceRadio'])){
         $emailForm['multipleChoice']= 	implode('!&#' , $this->security->xss_clean($this->input->post('multipleChoiceRadio')));
         $emailForm['multipleChoice_label']= 	implode('!&#' , $this->security->xss_clean($this->input->post('multipleChoice_label')));
				}
			if(!empty($_POST['dropDownList'])){
         $emailForm['dropDown']	= 	implode('!&#' , $this->security->xss_clean($this->input->post('dropDownList')));
         $emailForm['dropDown_label']	= 	implode('!&#' , $this->security->xss_clean($this->input->post('dropDown_label')));
				}
			if(!empty($_POST['checkboxChoice'])){
         $emailForm['checkbox'] = 	implode('!&#' , $this->security->xss_clean($this->input->post('checkboxChoice')));
         $emailForm['checkbox_label'] = 	implode('!&#' , $this->security->xss_clean($this->input->post('checkbox_label')));
				}
		    if(!empty($_POST['websiteText'])){
         $emailForm['website'] 	= 	implode('!&#', $this->security->xss_clean($this->input->post('websiteText')));
         $emailForm['website_label'] 	= 	implode('!&#', $this->security->xss_clean($this->input->post('websiteText_label')));
				}	
			if(!empty($_POST['priceText'])){
         $emailForm['price'] 			= 	implode('!&#' , $this->security->xss_clean($this->input->post('priceText')));
         $emailForm['price_label'] 			= 	implode('!&#' , $this->security->xss_clean($this->input->post('priceText_label')));
				}
			if(!empty($_POST['emailText'])){
         $emailForm['email'] 			= 	implode('!&#' , $this->security->xss_clean($this->input->post('emailText')));
         $emailForm['email_label'] 			= 	implode('!&#' , $this->security->xss_clean($this->input->post('emailText_label')));
				}
			if(!empty($_POST['nameFirst'])){
					
						$name = array();
						for($i=0; $i < count($_POST['nameFirst']);$i++){
							$name[$i] = $_POST['nameFirst'][$i] . ' ' . $_POST['nameLast'][$i];
						}
						//print_r($name);
			$emailForm['name']	= 	implode('!&#',$name);
			$emailForm['name_label']	= 	implode('!&#' , $this->security->xss_clean($this->input->post('nameText_label')));
					}
			if(!empty($_POST['dateMm'])){
					
						$name = array();
						for($i=0; $i < count($_POST['dateMm']);$i++){
							$timeData = $_POST['dateMm'][$i] . '/' . $_POST['dateDd'][$i]. '/' . $_POST['dateYy'][$i];
							$date_[$i]  = strtotime($timeData);
						}
						//print_r($name);
			$emailForm['date_']	= 	implode('!&#',$date_);
			$emailForm['date_label']	= 		implode('!&#' , $this->security->xss_clean($this->input->post('dateText_label')));
					}
			if(!empty($_POST['timeHh'])){
					
						$name = array();
						for($i=0; $i < count($_POST['timeHh']);$i++){
							$timeData = $_POST['timeHh'][$i] . ':' . $_POST['timeMm'][$i]. ':' . $_POST['TimeSs'][$i]. ' '.$_POST['timeLabel'][$i] ;
							$time_[$i]  = strtotime($timeData);
						}
						//print_r($name);
			$emailForm['time_']	= 	implode('!&#',$time_);
			$emailForm['time_label']	= 		implode('!&#' , $this->security->xss_clean($this->input->post('timeText_label')));
					}
			if(!empty($_POST['phoneStart'])){
					
						$name = array();
						for($i=0; $i < count($_POST['phoneStart']);$i++){
							$phonea[$i] = $_POST['phoneStart'][$i] . '-' . $_POST['phoneMid'][$i]. '-' . $_POST['phoneLast'][$i];
						
						}
						
			$emailForm['phone']	= 	implode('!&#',$phonea);
			$emailForm['phone_label']	= 		implode('!&#' , $this->security->xss_clean($this->input->post('phoneText_label')));
					}
					
					
			if(!empty($_POST['addressName'])){
					
						$name = array();
						for($i=0; $i < count($_POST['addressName']);$i++){
							$add = $_POST['addressName'][$i] . '  ' . $_POST['addressStreet'][$i]. '  ' . $_POST['addresscity'][$i]. '  ' . $_POST['addressRegion'][$i]. '  ' . $_POST['addressZip'][$i]. '  ' . $_POST['addressCountry'][$i];
						$address[$i]  = $add;	
						}
			$emailForm['address']	= 	implode('!&#',$address);
			$emailForm['address_label']	= 		implode('!&#' , $this->security->xss_clean($this->input->post('addressText_label')));
					}
					
			$emailForm['formId']	= 	$this->security->xss_clean($this->input->post('formId'));
					
			$this->db->insert('form_submit',$emailForm);
			return $this->db->insert_id();
			
	
	}
	
	public function getAdminProfit($publisherID,$adID){
		
		$query=$this->db->query("select commission,(SELECT adminCommission FROM user_profile where userId=$publisherID) as adminCommission,(select bid_ppc from ad_info where adId=$adID) as bidPrice from setting_admin_commission ");
		$adminCommision=$query->row();
		return $adminCommision;
		
	}
	public function makeAccountChange($adStatusID,$bidPrice,$publisherID,$advertiserID,$adminCussimion){
		
		
		
		$admin_profit=($bidPrice/100)*$adminCussimion;
		$pub_amount=$bidPrice-$admin_profit;
		$accounts['credit']=$pub_amount;
		$accounts['transactionTime']=time();
		$accounts['comment']='1';
		$accounts['adStatusId']=$adStatusID;
		$accounts['userId']=$publisherID;
		$accounts['memo']='on ad click amount credit to publisher';
		$accounts['admin_profile']=$admin_profit;
		$this->db->insert('accounts',$accounts);
		
		$ad_accounts['debit']=$bidPrice;
		$ad_accounts['comment']='2';
		$ad_accounts['transactionTime']=time();
		$ad_accounts['adStatusId']=$adStatusID;
		$ad_accounts['userId']=$advertiserID;
		$ad_accounts['memo']='on ad click amount debit from advertiser';
		$this->db->insert('accounts',$ad_accounts);
		//echo $this->db->last_query();
		return TRUE;
		
	}
	
	
	// for auto insurance form
	
	public function AutoInsurance(){
		
		$mails=$this->security->xss_clean($this->input->post('email-input'));
		$isprevois=$this->isPrevoiusVisitor($mails,AUTO_INSURANCE);
		if($isprevois >0 ){
			$savedata['fraud'] = 1;
			// for visitors how have visited in 2 months
		}
		$carcount=	$this->security->xss_clean($this->input->post('carcount'));
		$driverCount =	$this->security->xss_clean($this->input->post('carcount'));
		$driverCount =	$this->security->xss_clean($this->input->post('carcount'));
		$caryear =	$this->security->xss_clean($this->input->post('car-year'));
		$carmake =	$this->security->xss_clean($this->input->post('car-make-select'));
		$carseries =	$this->security->xss_clean($this->input->post('car-series-select'));
		$carmodel =	$this->security->xss_clean($this->input->post('car-model-select'));
		$carpark =	$this->security->xss_clean($this->input->post('car-park-select'));
		$caruse =	$this->security->xss_clean($this->input->post('car-use-select'));
		$carmileage =	$this->security->xss_clean($this->input->post('car-mileage-select'));
		$carown =	$this->security->xss_clean($this->input->post('car-own-select'));
		
		$vehiclecount=1;
		$formxml='<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><auto><vehicle>';
$formxml=$formxml.'<vehicleyear>'.$caryear.'</vehicleyear>';
$formxml=$formxml.'<vehiclemake>'.$carmake.'</vehiclemake>';
$formxml=$formxml.'<vehicleseries>'.$carseries.'</vehicleseries>';
$formxml=$formxml.'<vehiclemodel>'.$carmodel.'</vehiclemodel>';
$formxml=$formxml.'<vehicleown>'.$carown.'</vehicleown>';
$formxml=$formxml.'<vehiclepark>'.$carpark.'</vehiclepark>';
$formxml=$formxml.'<vehicleuse>'.$caruse.'</vehicleuse>';
$formxml=$formxml.'<vehiclemileage>'.$carmileage.'</vehiclemileage></vehicle>';


		while($vehiclecount<10){
				
			if($carcount>$vehiclecount){
			if($this->security->xss_clean($this->input->post('car-year'.$vehiclecount)))
			{
				
$formxml=$formxml.'<vehicle><vehicleyear>'.$this->security->xss_clean($this->input->post('car-year'.$vehiclecount)).'</vehicleyear>';
$formxml=$formxml.'<vehiclemake>'.$this->security->xss_clean($this->input->post('car-make-select'.$vehiclecount)).'</vehiclemake>';
$formxml=$formxml.'<vehicleseries>'.$this->security->xss_clean($this->input->post('car-series-select'.$vehiclecount)).'</vehicleseries>';
$formxml=$formxml.'<vehiclemodel>'.$this->security->xss_clean($this->input->post('car-model-select'.$vehiclecount)).'</vehiclemodel>';
$formxml=$formxml.'<vehicleown>'.$this->security->xss_clean($this->input->post('car-own-select'.$vehiclecount)).'</vehicleown>';
$formxml=$formxml.'<vehiclepark>'.$this->security->xss_clean($this->input->post('car-park-select'.$vehiclecount)).'</vehiclepark>';
$formxml=$formxml.'<vehicleuse>'.$this->security->xss_clean($this->input->post('car-use-select'.$vehiclecount)).'</vehicleuse>';
$formxml=$formxml.'<vehiclemileage>'.$this->security->xss_clean($this->input->post('car-mileage-select'.$vehiclecount)).'</vehiclemileage></vehicle>';
				
				
				
				
			}}else{
				
				break;
				
			}
			$vehiclecount++;
		}
$dob=$this->security->xss_clean($this->input->post('driver-birth-month-select')).'-'.$this->security->xss_clean($this->input->post('driver-birth-day-select')).'-'.$this->security->xss_clean($this->input->post('driver-birth-year-select'));
$formxml=$formxml.'<driver><firstname>'.$this->security->xss_clean($this->input->post('first-name-input')).'</firstname>';
$formxml=$formxml.'<lastname>'.$this->security->xss_clean($this->input->post('last-name-input')).'</lastname>';
$formxml=$formxml.'<gender>'.$this->security->xss_clean($this->input->post('gender-select')).'</gender>';
$formxml=$formxml.'<dob>'.$dob.'</dob>';
$formxml=$formxml.'<marital>'.$this->security->xss_clean($this->input->post('marital-status-select')).'</marital>';
$formxml=$formxml.'<education>'.$this->security->xss_clean($this->input->post('education-select')).'</education>';
$formxml=$formxml.'<homeowner>'.$this->security->xss_clean($this->input->post('owns-home-select')).'</homeowner>';
$formxml=$formxml.'<occupation>'.$this->security->xss_clean($this->input->post('occupation-select')).'</occupation>';
$formxml=$formxml.'<licance>'.$this->security->xss_clean($this->input->post('license-status-select')).'</licance>';
$formxml=$formxml.'<accidents>'.$this->security->xss_clean($this->input->post('incident-select')).'</accidents></driver>';

$drcount=1;
		while($drcount<10){
				
			if($driverCount>$drcount){
			if($this->security->xss_clean($this->input->post('first-name-input'.$drcount)))
			{
$dob1=$this->security->xss_clean($this->input->post('driver-birth-select'.$drcount));
$formxml=$formxml.'<driver><firstname>'.$this->security->xss_clean($this->input->post('first-name-input'.$drcount)).'</firstname>';
$formxml=$formxml.'<last-name>'.$this->security->xss_clean($this->input->post('last-name-input'.$drcount)).'</last-name>';
$formxml=$formxml.'<gender>'.$this->security->xss_clean($this->input->post('gender-select'.$drcount)).'</gender>';
$formxml=$formxml.'<dob>'.$dob1.'</dob>';
$formxml=$formxml.'<marital>'.$this->security->xss_clean($this->input->post('marital-status-select'.$drcount)).'</marital>';
$formxml=$formxml.'<education>'.$this->security->xss_clean($this->input->post('education-select'.$drcount)).'</education>';
$formxml=$formxml.'<homeowner>'.$this->security->xss_clean($this->input->post('owns-home-select'.$drcount)).'</homeowner>';
$formxml=$formxml.'<occupation>'.$this->security->xss_clean($this->input->post('occupation-select'.$drcount)).'</occupation>';
$formxml=$formxml.'<licance>'.$this->security->xss_clean($this->input->post('license-status-select'.$drcount)).'</licance>';
$formxml=$formxml.'<accidents>'.$this->security->xss_clean($this->input->post('incident-select'.$drcount)).'</accidents></driver>';
				
				
				
				
			}}else{
				
				break;
				
			}
			$drcount++;
		}

$formxml=$formxml.'<insured>'.$this->security->xss_clean($this->input->post('insured-select')).'</insured>';
$formxml=$formxml.'<insurer>'.$this->security->xss_clean($this->input->post('current-insurer-select')).'</insurer>';
$formxml=$formxml.'<phone>'.$this->security->xss_clean($this->input->post('phone-input')).'</phone>';
$formxml=$formxml.'<email>'.$this->security->xss_clean($this->input->post('email-input')).'</email>';
$formxml=$formxml.'<zip>'.$this->security->xss_clean($this->input->post('zip-input')).'</zip>';
$formxml=$formxml.'<address>'.$this->security->xss_clean($this->input->post('address-input')).'</address></auto>';
		
		$savedata['ipaddress']= $_SERVER['REMOTE_ADDR'];
		$savedata['publisherId']= $this->security->xss_clean($this->input->post('publisherid'));
		$savedata['sub_publisherId']= $this->security->xss_clean($this->input->post('subpublisherid'));
		$savedata['categoryId']= AUTO_INSURANCE;
                $savedata['category_name']='Auto Insurance';
		$savedata['recomanded_advertiser']= $this->security->xss_clean($this->input->post('prefered_advertiser'));
		$savedata['form_data']=$formxml;
		$savedata['datetime']=time();
		
		$this->db->insert('ad_form_data',$savedata);
		$form_data_id= $this->db->insert_id();
                if($isprevois == 0){
                    $this->AddLeadInPurchase($form_data_id,$savedata['recomanded_advertiser']);
                    $this->CreditAccounts($savedata['recomanded_advertiser'], $savedata['publisherId'], $form_data_id);
                }
		return true;
		
		
		
		
	}
        public function getUsersBalance(){
            $query = $this->db->query("SELECT userId, (SUM( credit ) - SUM( debit )) AS balance FROM accounts GROUP BY userId");
            return $query->result();
        }
	public function getPreferedAdvertisers($catId){
		$advs = array();
		$query=$this->db->query("SELECT userId,name,activecategory,email FROM user_profile where userType = 1 and isActive = 1 and isAccepted = 1" );
		$results = $query->result();
                
                $balance = $this->getUsersBalance();
                $advForUpdateAndMail = array();
                //print_r($results);
                foreach ($results as $adv){
                    $catstr = $adv->activecategory;
                    $catPriceArr = strlen($catstr) > 0 ? explode(",", $catstr) : array();
                    foreach($catPriceArr as $cp){
                        $catpr = isset($cp) && strlen($cp) ? explode(":", $cp) : NULL;
                        $cat = isset($catpr[0]) ? $catpr[0] : NULL;
                        $pr = isset($catpr[1]) ? $catpr[1] : NULL;
                        if(isset($cat) && isset($pr)){
                            if($cat == $catId){
                                // now we have to check that this adv have enough balance in his account.
                                // if not so . then add him in $advForUpdateAndMail array and send him mail.
                                foreach($balance as $bal){
                                    if($adv->userId == $bal->userId){
                                        // if total balance of advertiser is greater than bid price of that category
                                        if($bal->balance > $pr){
                                            if(isset($advs[$pr])){
                                                $newArray = $advs[$pr];
                                            }else{
                                                $newArray = array();
                                            }
                                            $newArray = array_merge($newArray,array($adv));
                                            //if(isset($advs[]))
                                            $advs[$pr] = $newArray;
                                            
                                            
                                            // now perform sorting..
                                            /*foreach($advs as $advert){
                                                
                                                $i ++;
                                            }*/
                                            /*for($i=0;$i<count($advs);$i++){
                                                for($j=0;$j<count($advs);$j++){
                                                    if($advs[$i] > $advs[$j]){
                                                        $temp = $advs[$i];
                                                        $advs[$i] = $advs[$j];
                                                        $advs[$j] = $temp;
                                                    }
                                                }
                                            }*/
                                        }else{
                                            $advForUpdateAndMail[$adv->userId] = $adv;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                //print_r($advs);
                /*foreach($advs as $ad){
                    
                    echo "<br/><br/>";
                }*/
                if(count($advForUpdateAndMail) > 0){
                    $this->updateAdvAndSendMail($advForUpdateAndMail);
                }
                //print_r($advs);
                //echo "<br/>";
                // sort associative array by its key value
                ksort($advs,SORT_NUMERIC);
                $advs = array_reverse($advs,true);
                //print_r($advs);
                return $advs;
	}
        // this method sends mail and update those adv. who have low account balance.
        private function updateAdvAndSendMail($advs){
            require_once("mailer/Email.php");
            $strUserIds = implode(",", array_keys($advs));
            $query = $this->db->query("UPDATE user_profile SET isActive = 2 WHERE userId IN ($strUserIds)");
            $mailData['Site_name'] 		= SITE_NAME;
            //print_r($advs);
            foreach($advs as $adv){
                $user_email     = $adv->email;
                $name 		= $adv->name;
                $mailData["User_name_data"] = $name;
                $emailSender = new Email();
                $emailSender->SendEmail('low_balance',$mailData,$user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,'Low Account Balance');
            }
        }
	
	public function isPrevoiusVisitor($emailID, $catId){
		
		
		$previousTime=time()-5184000;
		
		$emailid=$emailID;
		
		$this->db->select(" * FROM ad_form_data where form_data like '%$emailid%' and datetime > $previousTime and categoryId=$catId" );
		$query= $this -> db -> get();
		$res= $query->result();
		return count($res);
	}
	
	
	
	// end of auto insuraance form
	
	
	// for auto insurance form
	
	public function submithome(){
		$title=	$this->security->xss_clean($this->input->post('selecttitle'));
		$fullname =	$this->security->xss_clean($this->input->post('fullname'));
		$marital =	$this->security->xss_clean($this->input->post('selectmarital'));
		$email =	$this->security->xss_clean($this->input->post('email'));
		$isprevois=$this->isPrevoiusVisitor($email,HOME_INSURANCE);
		
		if($isprevois >0 ){
			$savedata['fraud'] = 1;
			// for visitors how have visited in 2 months
		}
		$phone =	$this->security->xss_clean($this->input->post('phone'));
		$employment =	$this->security->xss_clean($this->input->post('selectemployment'));
		$street =	$this->security->xss_clean($this->input->post('street'));
		$statename =	$this->security->xss_clean($this->input->post('statename'));
		$zip =	$this->security->xss_clean($this->input->post('zip'));
		
		$property_type =	$this->security->xss_clean($this->input->post('selectproperty'));
		
		if($property_type==0){
			$property_type=$this->security->xss_clean($this->input->post('property_type'));
		}
		$number_rooms =	$this->security->xss_clean($this->input->post('number_rooms'));
		$number_toilets =	$this->security->xss_clean($this->input->post('number_toilets'));
	
		

		$formxml='<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><home_detail>';
$formxml=$formxml.'<name>'.$title.' '.$fullname.'</name>';
$formxml=$formxml.'<marital_status>'.$marital.'</marital_status>';
$formxml=$formxml.'<email>'.$email.'</email>';
$formxml=$formxml.'<phone>'.$phone.'</phone>';
$formxml=$formxml.'<employment>'.$employment.'</employment>';
$formxml=$formxml.'<address>'.$street.'</address>';
$formxml=$formxml.'<state>'.$statename.'</state>';
$formxml=$formxml.'<zipcode>'.$zip.'</zipcode>';
$formxml=$formxml.'<property_type>'.$property_type.'</property_type>';
$formxml=$formxml.'<number_of_rooms>'.$number_rooms.'</number_of_rooms>';
$formxml=$formxml.'<number_of_bathrooms>'.$number_toilets.'</number_of_bathrooms></home_detail>';


		
		$savedata['ipaddress']= $_SERVER['REMOTE_ADDR'];
		$savedata['publisherId']= $this->security->xss_clean($this->input->post('publisherid'));
		$savedata['sub_publisherId']= $this->security->xss_clean($this->input->post('subpublisherid'));
		$savedata['categoryId']= HOME_INSURANCE;
		$savedata['category_name']='home Insurance';
		$savedata['state_name']=$this->security->xss_clean($this->input->post('statename'));
		$savedata['recomanded_advertiser']= $this->security->xss_clean($this->input->post('prefered_advertiser'));
		$savedata['form_data']=$formxml;
		$savedata['datetime']=time();
		
		$this->db->insert('ad_form_data',$savedata);
		$form_data_id= $this->db->insert_id();
                if($isprevois  == 0 ){
                    $this->AddLeadInPurchase($form_data_id,$savedata['recomanded_advertiser']);
                    $this->CreditAccounts($savedata['recomanded_advertiser'], $savedata['publisherId'], $form_data_id);
		}
		return true;
	}
	
	public function AddLeadInPurchase($form_data_id, $userId)
	{
		$savedata['form_dataId']=$form_data_id;
		$savedata['givenDate']=time();
		$savedata['advertiserId']=	$userId;
		$this->db->insert('advertiser_form_data',$savedata);
		
		return true;
		
	}
	
	public function CreditAccounts($userId,$publisherId,$form_data_id)
	{
                //get category for which the form has been submitted . 
                $this->db->select("categoryId");
                $this->db->where("form_data_id" , $form_data_id);
                $query = $this->db->get("ad_form_data");
                $category =  $query->row();
            
		$this->db->select('*');
		$this -> db -> from('user_profile');
		$this->db->where('userId',$userId);
		$query=$this->db->get();
		$advertiser=$query->row();
                $bidpriceArr = isset($advertiser->bidprice) ? explode(",",$advertiser->bidprice) : array();
                
                //print_r($advertiser);
                $bidNotSet = false;
                foreach($bidpriceArr as $bid){
                    $bp = explode(":",$bid);
                    if(isset($bp[0]) && $category->categoryId == $bp[0]){
                        $advertiser->bidprice = $bp[1];
                        $bidNotSet = false;
                        break;
                    }else{
                        $bidNotSet = true;
                    }
                }
                // if bid price is not set by advertiser then pick up default value from categories table.
                if($bidNotSet){
                    $this->db->select("minbidprice");
                    $this->db->from("categories");
                    $this->db->where("categoryId",$category->categoryId);
                    $query = $this->db->get();
                    $row = $query->row();
                    $advertiser->bidprice = $row->minbidprice;
                }
                //echo $advertiser->bidprice;
		$query1=$this->db->query("select * FROM setting_admin_commission,user_profile where userId=$publisherId");
		$publisher=$query1->row();
		$pubprofit=0;
		$adminProfit=0;
		if($publisher->adminCommission !='' && $publisher->adminCommission != null)
		{
                    $adminProfit=($advertiser->bidprice*$publisher->adminCommission)/100;
                    //print_r($advertiser);
                    //print_r($publisher);
		}else{
			$adminProfit=($advertiser->bidprice*$publisher->commission)/100;
			
		}
		$pubprofit=$advertiser->bidprice - $adminProfit;
		$res=0;
		
		$setprice['debit']=$advertiser->bidprice;
		$setprice['transactionTime']=time();
		$setprice['comment']=2;
		$setprice['userId']=$userId;
		$setprice['memo']="Lead completed for advertiser";
		$setprice['form_data_id']=$form_data_id;
		
		$res=$this->db->insert('accounts',$setprice);
		
		
		
		$setprice1['credit']=$pubprofit;
		$setprice1['transactionTime']=time();
		$setprice1['comment']=1;
		$setprice1['userId']=$publisherId;
		$setprice1['memo']="Lead completed for advertiser profit added to publisher";
		$setprice1['admin_profile']=$adminProfit;
		$setprice1['form_data_id']=$form_data_id;
		$this->db->insert('accounts',$setprice1);
		
		
	}
	
	
	// end raj
        
	// start by nitesh
        //for Life Insurance Form
        public function LifeInsurance(){
            $mails=$this->security->xss_clean($this->input->post('email'));
            $isprevois=$this->isPrevoiusVisitor($mails,LIFE_INSURANCE);
            if($isprevois >0 ){
                $savedata['fraud'] = 1;
                    // for visitors how have visited in 2 months
            }
            $state_name = $this->security->xss_clean($this->input->post("state_name"));
            $publisherId = $this->security->xss_clean($this->input->post("publisherid"));
            $subPublisherId = $this->security->xss_clean($this->input->post("subpublisherid"));
            //$categoryid = $this->security->xss_clean($this->input->post("categoryid"));
            $prefered_advertiser = $this->security->xss_clean($this->input->post("prefered_advertiser"));
            $residence = $this->security->xss_clean($this->input->post("statename"));
            $selectgender = $this->security->xss_clean($this->input->post("selectgender"));
            $dob = $this->security->xss_clean($this->input->post("dob"));
            $conamount = $this->security->xss_clean($this->input->post("conamount"));
            $termlenght = $this->security->xss_clean($this->input->post("teamlenght"));
            $Tobacco_Nicotine_user = $this->security->xss_clean($this->input->post("Tobacco_Nicotine_user"));
            $health = $this->security->xss_clean($this->input->post("health"));
            $fullname = $this->security->xss_clean($this->input->post("fullname"));
            $phone = $this->security->xss_clean($this->input->post("phone"));
            
            $formxml = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
    <life>
        <person>
            <fullname>
              $fullname
            </fullname>
            <email>
              $mails
            </email>
            <phone>
              $phone
            </phone>
            <gender>
              $selectgender
            </gender>
            <dateofbirth>
              $dob
            </dateofbirth>
            <statename>
              $residence
            </statename>
            <coverageAmount>
              $conamount
            </coverageAmount>
            <termlenght>
              $termlenght
            </termlenght>
            <addicted>
              $Tobacco_Nicotine_user
            </addicted>
            <health>
              $health
            </health>
          </person>
      </life>
                    
EOD;
                $savedata['ipaddress']= $_SERVER['REMOTE_ADDR'];
		$savedata['publisherId']= $publisherId;
		$savedata['sub_publisherId']= $subPublisherId;
		$savedata['categoryId']= LIFE_INSURANCE;
		$savedata['category_name']='Life Insurance';
		$savedata['state_name']= $state_name;
		$savedata['recomanded_advertiser']= $prefered_advertiser;
		$savedata['form_data']=$formxml;
		$savedata['datetime']=time();
		
		$this->db->insert('ad_form_data',$savedata);
		$form_data_id= $this->db->insert_id();
                if($isprevois  == 0 ){
                    $this->AddLeadInPurchase($form_data_id,$savedata['recomanded_advertiser']);
                    $this->CreditAccounts($savedata['recomanded_advertiser'], $savedata['publisherId'], $form_data_id);
		}
		return true;
        }
        
        public function BusinessInsurance(){
            $mails=$this->security->xss_clean($this->input->post('email'));
            $isprevois=$this->isPrevoiusVisitor($mails,BUSINESS_INSURANCE);
            if($isprevois >0 ){
                $savedata['fraud'] = 1;
                    // for visitors how have visited in 2 months
            }
            $state_name = $this->security->xss_clean($this->input->post("state_name"));
            $publisherId = $this->security->xss_clean($this->input->post("publisherid"));
            $subPublisherId = $this->security->xss_clean($this->input->post("subpublisherid"));
            //$categoryid = $this->security->xss_clean($this->input->post("categoryid"));
            
            //business info
            $prefered_advertiser = $this->security->xss_clean($this->input->post("prefered_advertiser"));
            $fullemployees = $this->security->xss_clean($this->input->post("full_employees"));
            $parttime_employee = $this->security->xss_clean($this->input->post("parttime_employee"));
            $business_policy = $this->security->xss_clean($this->input->post("business_policy"));
            $business_address = $this->security->xss_clean($this->input->post("business_address"));
            
            //personal info
            $name = $this->security->xss_clean($this->input->post("name"));
            $dob = $this->security->xss_clean($this->input->post("dob"));
            $phone = $this->security->xss_clean($this->input->post("phone"));
            
            $formxml = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
  <businessinsurance>
          <fullemployees>
            $fullemployees
          </fullemployees>
          <parttimeemployees>
            $parttime_employee
          </parttimeemployees>
          <businesspolicy>
            $business_policy
          </businesspolicy>
          <businessaddress>
            $business_address
          </businessaddress>

          <name>
            $name
          </name>
          <dateofbirth>
            $dob
          </dateofbirth>                
          <email>
            $mails
          </email>
          <phone>
            $phone
          </phone>
  </businessinsurance>
EOD;
                $savedata['ipaddress']= $_SERVER['REMOTE_ADDR'];
		$savedata['publisherId']= $publisherId;
		$savedata['sub_publisherId']= $subPublisherId;
		$savedata['categoryId']= BUSINESS_INSURANCE;
		$savedata['category_name']='Business Insurance';
		$savedata['state_name']= $state_name;
		$savedata['recomanded_advertiser']= $prefered_advertiser;
		$savedata['form_data']=$formxml;
		$savedata['datetime']=time();
		
		$this->db->insert('ad_form_data',$savedata);
		$form_data_id= $this->db->insert_id();
                if($isprevois == 0 ){
                    $this->AddLeadInPurchase($form_data_id,$savedata['recomanded_advertiser']);
                    $this->CreditAccounts($savedata['recomanded_advertiser'], $savedata['publisherId'], $form_data_id);
                }
		return true;
        }
    public function TravelInsurance(){
            $mails=$this->security->xss_clean($this->input->post('email'));
            $isprevois=$this->isPrevoiusVisitor($mails,TRAVEL_INSURANCE);
            if($isprevois >0 ){
                $savedata['fraud'] = 1;
                    // for visitors how have visited in 2 months
            }
            $state_name = $this->security->xss_clean($this->input->post("state_name"));
            $publisherId = $this->security->xss_clean($this->input->post("publisherid"));
            $subPublisherId = $this->security->xss_clean($this->input->post("subpublisherid"));
            //$categoryid = $this->security->xss_clean($this->input->post("categoryid"));
            
            //travel Info
            $prefered_advertiser = $this->security->xss_clean($this->input->post("prefered_advertiser"));
            $travel_location = $this->security->xss_clean($this->input->post("travel_location"));
            //$travelling_country = $this->security->xss_clean($this->input->post("travelling_country"));
            $travel_start_date = $this->security->xss_clean($this->input->post("travel_start_date"));
            $travel_duration = $this->security->xss_clean($this->input->post("travel_duration"));
            $policy_type = $this->security->xss_clean($this->input->post("policy_type"));
            $require_cover_high_value_items = $this->security->xss_clean($this->input->post("require_cover_high_value_items"));
            
            //personal info
            $name = $this->security->xss_clean($this->input->post("name"));
            $dob = $this->security->xss_clean($this->input->post("dob"));
            $phone = $this->security->xss_clean($this->input->post("phone"));
            
            $formxml = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
  <travelinsurance>
          <travellocation>
            $travel_location
          </travellocation>
          <travelstartdate>
            $travel_start_date
          </travelstartdate>
          <travelduration>
            $travel_duration
          </travelduration>
          <policytype>
            $policy_type
          </policytype>
          <coverhighvalueitem>
            $require_cover_high_value_items
          </coverhighvalueitem>
          <name>
            $name
          </name>
          <dateofbirth>
            $dob
          </dateofbirth>                
          <email>
            $mails
          </email>
          <phone>
            $phone
          </phone>
  </travelinsurance>
EOD;
                $savedata['ipaddress']= $_SERVER['REMOTE_ADDR'];
		$savedata['publisherId']= $publisherId;
		$savedata['sub_publisherId']= $subPublisherId;
		$savedata['categoryId']= TRAVEL_INSURANCE;
		$savedata['category_name']='Travel Insurance';
		$savedata['state_name']= $state_name;
		$savedata['recomanded_advertiser']= $prefered_advertiser;
		$savedata['form_data']=$formxml;
		$savedata['datetime']=time();
		
		$this->db->insert('ad_form_data',$savedata);
		$form_data_id= $this->db->insert_id();
                if($isprevois == 0 ){
                    $this->AddLeadInPurchase($form_data_id,$savedata['recomanded_advertiser']);
                    $this->CreditAccounts($savedata['recomanded_advertiser'], $savedata['publisherId'], $form_data_id);
                }
		return true;
    }
    public function EducationInsurance(){
        $mails=$this->security->xss_clean($this->input->post('email'));
        $isprevois=$this->isPrevoiusVisitor($mails,TRAVEL_INSURANCE);
        if($isprevois >0 ){
            $savedata['fraud'] = 1;
                // for visitors how have visited in 2 months
        }
        $state_name = $this->security->xss_clean($this->input->post("state_name"));
        $publisherId = $this->security->xss_clean($this->input->post("publisherid"));
        $subPublisherId = $this->security->xss_clean($this->input->post("subpublisherid"));
        //$categoryid = $this->security->xss_clean($this->input->post("categoryid"));

        //education Info
        $prefered_advertiser = $this->security->xss_clean($this->input->post("prefered_advertiser"));
        $degreelevel = $this->security->xss_clean($this->input->post("degreelevel"));
        $area = $this->security->xss_clean($this->input->post("areaofinterest"));
        
        //personal info
        $name = $this->security->xss_clean($this->input->post("fullname"));
        $phone = $this->security->xss_clean($this->input->post("phone"));

        $formxml = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<educationinsurance>
      <degreelevel>
        $degreelevel
      </degreelevel>
      <area>
        $area
      </area>
      <name>
        $name
      </name>             
      <email>
        $mails
      </email>
      <phone>
        $phone
      </phone>
</educationinsurance>
EOD;
            $savedata['ipaddress']= $_SERVER['REMOTE_ADDR'];
            $savedata['publisherId']= $publisherId;
            $savedata['sub_publisherId']= $subPublisherId;
            $savedata['categoryId']= Education_INSURANCE;
            $savedata['category_name']='Education Insurance';
            $savedata['state_name']= $state_name;
            $savedata['recomanded_advertiser']= $prefered_advertiser;
            $savedata['form_data']=$formxml;
            $savedata['datetime']=time();

            $this->db->insert('ad_form_data',$savedata);
            $form_data_id= $this->db->insert_id();
            if($isprevois == 0 ){
                $this->AddLeadInPurchase($form_data_id,$savedata['recomanded_advertiser']);
                $this->CreditAccounts($savedata['recomanded_advertiser'], $savedata['publisherId'], $form_data_id);
                    // for visitors how have visited in 2 months
            }
            
            return true;
    }
    public function PaydayLoan(){
        $mails=$this->security->xss_clean($this->input->post('email'));
        $isprevois=$this->isPrevoiusVisitor($mails,TRAVEL_INSURANCE);
        if($isprevois >0 ){
            $savedata['fraud'] = 1;
                // for visitors how have visited in 2 months
        }
        $state_name = $this->security->xss_clean($this->input->post("state_name"));
        $publisherId = $this->security->xss_clean($this->input->post("publisherid"));
        $subPublisherId = $this->security->xss_clean($this->input->post("subpublisherid"));
        //$categoryid = $this->security->xss_clean($this->input->post("categoryid"));
        
        // PAYDAY_LOAN Info
        $prefered_advertiser = $this->security->xss_clean($this->input->post("prefered_advertiser"));
        $loan_amount = $this->security->xss_clean($this->input->post("loan_amount"));
        $fullname = $this->security->xss_clean($this->input->post("fullname"));
        $dob = $this->security->xss_clean($this->input->post("dob"));
        $residence = $this->security->xss_clean($this->input->post("residence"));
        $contacttime = $this->security->xss_clean($this->input->post("contacttime"));
        $streetaddress = $this->security->xss_clean($this->input->post("streetaddress"));
        $phone = $this->security->xss_clean($this->input->post("phone"));
        $incomesource = $this->security->xss_clean($this->input->post("incomesource"));
        $netincome = $this->security->xss_clean($this->input->post("netincome"));
        $employername = $this->security->xss_clean($this->input->post("employername"));
        $jobtitle = $this->security->xss_clean($this->input->post("jobtitle"));
        $timeemployed = $this->security->xss_clean($this->input->post("timeemployed"));
        
        $formxml = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<paydayloan>
      <loanamount>
        $loan_amount
      </loanamount>
      <fullname>
        $fullname
      </fullname>
      <dob>
        $dob
      </dob>
      <email>
        $mails
      </email>
      <residence>
        $residence
      </residence>
      <contacttime>
        $contacttime
      </contacttime>
      <streetaddress>
        $streetaddress
      </streetaddress>
      <phone>
        $phone
      </phone>
      <incomesource>
        $incomesource
      </incomesource>
      <netincome>
        $netincome
      </netincome>
      <employername>$employername</employername>
      <jobtitle>$jobtitle</jobtitle>
      <timeemployed>$timeemployed</timeemployed>   
</paydayloan>
EOD;
        
        $savedata['ipaddress']= $_SERVER['REMOTE_ADDR'];
        $savedata['publisherId']= $publisherId;
        $savedata['sub_publisherId']= $subPublisherId;
        $savedata['categoryId']= PAYDAY_LOAN;
        $savedata['category_name']='Payday Loan';
        $savedata['state_name']= $state_name;
        $savedata['recomanded_advertiser']= $prefered_advertiser;
        $savedata['form_data']=$formxml;
        $savedata['datetime']=time();

        $this->db->insert('ad_form_data',$savedata);
        $form_data_id= $this->db->insert_id();
        if($isprevois == 0 ){
            $this->AddLeadInPurchase($form_data_id,$savedata['recomanded_advertiser']);
            $this->CreditAccounts($savedata['recomanded_advertiser'], $savedata['publisherId'], $form_data_id);
        }
        return true;
    }
    public function Hotel(){
        $mails=$this->security->xss_clean($this->input->post('email'));
        $isprevois=$this->isPrevoiusVisitor($mails,TRAVEL_INSURANCE);
        if($isprevois >0 ){
            $savedata['fraud'] = 1;
                // for visitors how have visited in 2 months
        }
        $state_name = $this->security->xss_clean($this->input->post("state_name"));
        $publisherId = $this->security->xss_clean($this->input->post("publisherid"));
        $subPublisherId = $this->security->xss_clean($this->input->post("subpublisherid"));
        //$categoryid = $this->security->xss_clean($this->input->post("categoryid"));
        
        // Hotel Info
        $prefered_advertiser = $this->security->xss_clean($this->input->post("prefered_advertiser"));
        $preferedstate = $this->security->xss_clean($this->input->post("preferedstate"));
        $city = $this->security->xss_clean($this->input->post("city"));
        $checkin = $this->security->xss_clean($this->input->post("checkin"));
        $checkout = $this->security->xss_clean($this->input->post("checkout"));
        $rooms = $this->security->xss_clean($this->input->post("rooms"));
        $budget = $this->security->xss_clean($this->input->post("budget"));
        $pickupservice = $this->security->xss_clean($this->input->post("pickupservice"));
        $pickupinfo = $this->security->xss_clean($this->input->post("pickupinfo"));
        $fullname = $this->security->xss_clean($this->input->post("fullname"));
        $phone = $this->security->xss_clean($this->input->post("phone"));
        
        $formxml = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<hotel>
      <preferedstate>
        $preferedstate
      </preferedstate>
      <city>
        $city
      </city>
      <checkin>
        $checkin
      </checkin>             
      <checkout>
        $checkout
      </checkout>
      <rooms>
        $rooms
      </rooms>
      <budget>
        $budget
      </budget>
      <pickupservice>
        $pickupservice
      </pickupservice>
      <pickupinfo>
        $pickupinfo
      </pickupinfo>
      <fullname>
        $fullname
      </fullname>
      <phone>
        $phone
      </phone>
    <email>
        $mails
    </email>
</hotel>
EOD;
        
        $savedata['ipaddress']= $_SERVER['REMOTE_ADDR'];
        $savedata['publisherId']= $publisherId;
        $savedata['sub_publisherId']= $subPublisherId;
        $savedata['categoryId']= HOTELS;
        $savedata['category_name']='Hotel';
        $savedata['state_name']= $state_name;
        $savedata['recomanded_advertiser']= $prefered_advertiser;
        $savedata['form_data']=$formxml;
        $savedata['datetime']=time();

        $this->db->insert('ad_form_data',$savedata);
        $form_data_id= $this->db->insert_id();
        if($isprevois == 0 ){
            $this->AddLeadInPurchase($form_data_id,$savedata['recomanded_advertiser']);
            $this->CreditAccounts($savedata['recomanded_advertiser'], $savedata['publisherId'], $form_data_id);
        }
        return true;
    }
}