<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class manage_publisher extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('admin/publisher/publisher_model');
	 }

	 public function index()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['request_pending'] = $this->publisher_model->getpublishers();
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_publisher/publisher_manage_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }

	 public function publisher_info($userId)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['userads'] = $this->publisher_model->getpublisherInfo($userId);
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_publisher/publisher_detail_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 public function adv_info($advInfo)
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['states'] = $this->advertiser_model->getStates();
			$data['category'] = $this->advertiser_model->getCategory();
			$data['adinfo'] = $this->advertiser_model->getadvinfo($advInfo);
			$this->load->helper('form');
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_advertiser/adv_info_view');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	
	 public function saveAdvInfo()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$result = $this->advertiser_model->updateAdvData();
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		}
	   else
	   {
		    redirect('admin/login', 'refresh');
	   }
	 }



		 public function debitaccountview($userId)
		 {
		  if($this->session->userdata('logged_in'))
			{
				$user_data 		 = $this->session->userdata('logged_in');
				$data['user'] 	 = $user_data;
				$sendata = '';
				
				$sendata .='<form name="debitForm" action="'.$this->config->base_url().'admin/manage_publisher/saveDeditbalance" method="post" id="debitForm" onsubmit="return saveDebitAccountForm();" class="form-container">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
						&times;</button>
						<h3 id="myModalLabel">Manage Publisher Account</h3>
						</div>
						<div class="modal-body">
						
						<div class="row-fluid">
								<div class="control-group">
									<label class="control-label" for="task">Hello '.ucfirst($user_data['user_name']).' ,<br/>
										<strong> Here you can debit or credit in publisher&#8217;s account...  </strong>
									</label>
									
									<div class="controls">
										<input type="hidden" id="userId" name="userId" value="'.$userId.'"/>
									</div>
							</div>
						</div>
						
					
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task"> Amount: </label>
								
								<div class="controls">
									<div class="input-append input-prepend">
                                       <span class="add-on">'.SITE_CURRENCY.'</span><input type="text" id="amount" name="amount" class="number span5 required" />
                                    </div>
									
									<input type="hidden" id="userId" name="userId" value="'.$userId.'"/>
								</div>
								</div>
								</div>
						
						<div class="row-fluid">
                                                    <div class="control-group">
                                                        <label class="control-label" for="task"> Debit/Credit: </label>
                                                        <div class="controls">
                                                            <select name="option">
                                                                <option value="debit">Debit</option>
                                                                <option value="credit">Credit</option>
                                                            </select>

                                                        </div>
                                                    </div>
						</div>
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task"> Memo: </label>
								
								<div class="controls">
									<textarea name="memo" class="required span6"></textarea>
									
								</div>
								</div>
								</div>
						
						</div>
						
						
						<div class="modal-footer">
							<div class="row-fluid">
							<div class="pull-right">
								<input type="submit" class="btn btn-info" value="Update Account">
								<input type="button" class="btn btn-warning" value="Cancel" onclick ="closeMe();">
							</div>
						</div>
						</form>
						</div>';
						echo $sendata;
			}
		   else
		   {
				redirect('admin/login', 'refresh');
		   }
		 }
               public function accountdetailsview($userId){
              
                   if($this->session->userdata('logged_in'))
			{
				$user_data 		 = $this->session->userdata('logged_in');
				$data['user'] 	 = $user_data;
                                //$current_user = $user_data['user_id'];
				$sendata = '';
                               
                                if($this->publisher_model->getPaymentdetails($userId))
                                 {
                                     $payment = $this->publisher_model->getPaymentdetails($userId) ;
                                 }else{
                                     $payment = new stdClass(); 
                                     //$pg->payment="";
                                      $payment->bank_name= "";
                                      $payment->bank_address = "";
                                      $payment->account_name = "";
                                      $payment->account_number = "";
                                      $payment->account_type = "" ; 
                                     
                                 }
				
				$sendata .='<form name="debitForm" id="debitForm"  class="form-container">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
						&times;</button>
						<h3 id="myModalLabel">Manage Publisher Account</h3>
						</div>
						<div class="modal-body">
						
						<div class="row-fluid">
								<div class="control-group">
									<label class="control-label" for="task">Hello '.ucfirst($user_data['user_name']).' ,<br/>
										<strong> Here you can Update publisher&#8217;s account...  </strong>
									</label>
									
									<div class="controls">
										
									</div>
							</div>
						</div>
						
					
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task"> Bank Name: </label>
								
								<div class="controls">
									
                                      <input type="text" id="amount" name="amount" class="number span5 required" disabled="disabled" value="'.$payment->bank_name.'"/>
                                    
					
								</div>
								</div>
								</div>
						
						<div class="row-fluid">
                                                    <div class="control-group">
                                                        <label class="control-label" for="task"> Bank Address: </label>
                                                        <div class="controls">
                                                        <textarea name="memo" class="required span6" disabled="disabled">'.$payment->bank_address.'</textarea>
                                                        
                                                         </div>
                                                    </div>
						</div>
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task"> Account Name </label>
								
								<div class="controls">
								<input type="text" id="amount" name="amount" class="number span5 required" disabled="disabled" value="'.$payment->account_name.'" />
								</div>
								</div>
								</div>
                                                <div class="row-fluid">
                                                <div class="control-group">
                                                <label class="control-label" for="task"> Account Number </label>

                                                <div class="controls">
                                                <input type="text" id="amount" name="amount" class="number span5 required" disabled="disabled"  value="'.$payment->account_number.'"/>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="row-fluid">
                                                <div class="control-group">
                                                <label class="control-label" for="task"> Account Type </label>

                                                <div class="controls">
                                                <input type="text" id="amount" name="amount" class="number span5 required" disabled="disabled" value="'.$payment->account_type.'" />
                                                </div>
                                                </div>
                                                </div>
						
						</div>
						
						
						<div class="modal-footer">
							<div class="row-fluid">
							<div class="pull-right">
								<input type="button" class="btn btn-warning" value="Cancel" onclick ="closeMe();">
							</div>
						</div>
						</form>
						</div>';
						echo $sendata;
			}
		   else
		   {
				redirect('admin/login', 'refresh');
		   }
                   
               }
               
		 
		  public function saveDeditbalance()
				 {
				  if($this->session->userdata('logged_in'))
					{
						$user_data 		 = $this->session->userdata('logged_in');
						$data['user'] 	 = $user_data;
						$result = $this->publisher_model->updatePublisherBalance();
						if($result){
							echo 1;
						}else{
							echo 0;
						}
					}
				   else
				   {
					    redirect('admin/login', 'refresh');
				   }
				 }
			 public function saveadminratio()
				 {
				  if($this->session->userdata('logged_in'))
					{
						$user_data 		 = $this->session->userdata('logged_in');
						$data['user'] 	 = $user_data;
						$result = $this->publisher_model->updatePublisherratio();
						if($result){
							echo 1;
						}else{
							echo 0;
						}
					}
				   else
				   {
					    redirect('admin/login', 'refresh');
				   }
				 }
				 
				 
		 public function setcommissoinview($userId)
		 {
		  if($this->session->userdata('logged_in'))
			{
				$user_data 		 = $this->session->userdata('logged_in');
				$data['user'] 	 = $user_data;
				$sendata = '';
				$result = $this->publisher_model->getpublishersRatio($userId);
				foreach($result as $info){
					$pub_name	=	$info->userName;
					$adminCommission	=	$info->adminCommission;
					if($adminCommission =='' || $adminCommission == 0){
						$Commission = 0;
					}else{
					$Commission = $adminCommission;
					}
				}
				$sendata .='<form name="debitForm" action="'.$this->config->base_url().'admin/manage_publisher/saveadminratio" method="post" id="debitForm" onsubmit="return saveDebitAccountForm();" class="form-container">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
						&times;</button>
						<h3 id="myModalLabel">Set Profit Ratio</h3>
						</div>
						<div class="modal-body">
						
						<div class="row-fluid">
								<div class="control-group">
									<label class="control-label" for="task">Hello '.ucfirst($user_data['user_name']).' ,<br/>
										<strong>Here you can set special profit ratio with the publisher.  <br/>(Set percentage to ‘0’ to use default settings) </strong>
									</label>
									
									<div class="controls">
										<input type="hidden" id="userId" name="userId" value="'.$userId.'"/>
									</div>
							</div>
						</div>
						
					
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task"> Admin  Ratio: </label>
								
								<div class="controls">
									<div class="input-append input-prepend">
                                       <span class="add-on">%</span><input type="text" id="ratio" name="ratio" class="number span5 required" value="'.$Commission.'" />
                                    </div>
									
								
								</div>
								</div>
								</div>
						</div>
						<div class="modal-footer">
							<div class="row-fluid">
							<div class="pull-right">
								<input type="submit" class="btn btn-info" value="Update Ratio">
								<input type="button" class="btn btn-warning" value="Cancel" onclick ="closeMe();">
							</div>
						</div>
						</form>
						</div>';
						echo $sendata;
			}
		   else
		   {
				redirect('admin/login', 'refresh');
		   }
		 }
                 
                 public function  manageaccount(){
                     if($this->session->userdata('logged_in')){
                                $user_data 		 = $this->session->userdata('logged_in');
                                $data['user'] 	 = $user_data;
                        }
                       if($this->session->userdata('logged_in')){
                            
                            $data["extenedAccountsInfo"] = $this->publisher_model->getAccountinfo();
                            /*$extenedAccountsInfo = array();
                            for($i=0;$i < count($accountsInfo); $i+=2){
                                $extenedAccountsInfo[] = $accountsInfo[$i]; // adv.
                                $extenedAccountsInfo[] = $accountsInfo[$i+1]; // pub.
                                $adminProfit = floatval($accountsInfo[$i]->debit) - floatval($accountsInfo[$i+1]->credit);
                                $objAdmin = new stdClass;
                                $objAdmin->credit = $adminProfit;
                                $objAdmin->name = "Admin";
                                $objAdmin->userType = "";
                                $objAdmin->debit = "";
                                $objAdmin->transactionTime = $accountsInfo[$i+1]->transactionTime;
                                //$extenedAccountsInfo = array_merge($extenedAccountsInfo, array($objAdmin));
                                $extenedAccountsInfo[] = $objAdmin; // admin
                            }
                            //print_r($extenedAccountsInfo);
                            $data["extenedAccountsInfo"] = $extenedAccountsInfo;*/
                             $this->load->view('admin/home_header',$data);
                             $this->load->view('admin/manage_account');
                             $this->load->view('admin/home_footer');
                        }else{
                            redirect('admin/login', 'refresh');
                        }
                 }
                 public function thirdparty_restrict(){
                     if($this->session->userdata('logged_in')){
                         $this->load->model('business_model');
                        $user_data = $this->session->userdata('logged_in');
                        $data['user'] = $user_data;
                        $data['publishers'] = publisher_model::getPublishersActive();
                        $firstPublisher = $data['publishers'][0];
                        $restrictAdvArr = array();
                        foreach(business_model::getRestrictUsers($firstPublisher->userId) as $adv){
                            $restrictAdvArr[] = $adv->restrict_adv_id;
                        }
                        $data['restrictAdv'] = $restrictAdvArr;
                        $data['advs'] = $this->business_model->getActiveAdvertisers(THIRD_PARTY_ONLY);
                       // print_r($advs);
                        //print_r($data);
                        $this->load->view('admin/home_header',$data);
                        $this->load->view('admin/manage_publisher/thirdparty_restrict_view');
                        $this->load->view('admin/home_footer');
                    }else{
                        redirect('admin/login', 'refresh');
                    }
                 }
                 public function saveRestrictUser(){
                    if($this->session->userdata('logged_in')){
                        $user_data = $this->session->userdata('logged_in');
                        $result = publisher_model::saveRestrictUsers();
                        if($result){
                            echo 1;
                        }else{
                            echo 0;
                        }
                    }else{
                        redirect('admin/login', 'refresh');
                    }
                 }
                 
                 public function selectedPubResAdvertisres($publisherId){
                     if($this->session->userdata('logged_in')){
                        $this->load->model('business_model');
//                        $user_data = $this->session->userdata('logged_in');
                        $restrictAdv = array();
                        foreach(business_model::getRestrictUsers($publisherId) as $adv){
                            $restrictAdv[] = $adv->restrict_adv_id;
                        }
                        echo "<ul>";
                        foreach($this->business_model->getActiveAdvertisers(THIRD_PARTY_ONLY) as $advertisers){
                            foreach($advertisers as $advertiser){
                                $checked = isset($restrictAdv) && is_array($restrictAdv) && in_array($advertiser->userId, $restrictAdv) ? "checked" : "";
                                echo "<li><input $checked type='checkbox' name='advertisers[]' value='$advertiser->userId'/>$advertiser->name &nbsp;</li>";
                            }
                        }
                        echo "</ul>";
                    }
                 }
                 //code by sarvesh(15/10/2014)
                 public function pub_all_time_payment($userId)
		 {  
                  $pub_name	= $this->security->xss_clean($this->input->post('pub_name'));
		  if($this->session->userdata('logged_in'))
			{
				$user_data 		 = $this->session->userdata('logged_in');
				$data['user'] 	 = $user_data;
				$sendata = '';
				$all_time_payment_data = publisher_model::pub_all_time_payment_data($userId);
                                $all_time_payment_balance = publisher_model::pub_all_time_payment_balance($userId);
				$sendata .='<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="popup">
						&times;</button>
						<h3 id="myModalLabel">'.$pub_name.'</h3>
						</div>
                                    <script>
                                    $(document).ready(function(){
                                      $(".btn_btn_danger_userActioncredit").click(function (){
                                      $("#debitForm").css("display","block");
                                      $("#trasection_type").val("credit");
                                      $("#trasectiontype").text("credit");
                                      $(".btn_btn_danger_userActioncredit").css("display","none");
                                      $(".btn_btn_danger_userActiondebit").css("display","none");
                                      $(".main_cancle").css("display","none");
                                     $(".balance_main").css("display","none");
                                     }) ;  
                                     $(".btn_btn_danger_userActiondebit").click(function (){
                                      $("#debitForm").css("display","block");
                                      $("#trasection_type").val("debit");
                                      $("#trasectiontype").text("debit");
                                      $(".btn_btn_danger_userActiondebit").css("display","none");
                                      $(".btn_btn_danger_userActioncredit").css("display","none");
                                      $(".main_cancle").css("display","none");
                                      $(".balance_main").css("display","none");
                                     }) ; 
                                     $(".cancel_botton").click(function (){
                                      $("#debitForm").css("display","none");
                                      $(".btn_btn_danger_userActiondebit").css("display","block");
                                      $(".btn_btn_danger_userActioncredit").css("display","block");
                                      $(".main_cancle").css("display","block");
                                      $(".balance_main").css("display","block");
                                     }) ;  
                                     })
                                     </script>
                                    <table style="width:95%;margin:15px;" border="1">
                                    <tr>
                                    <td style="padding:5px;"><strong>Date</strong></td>
                                    <td style="padding:5px;"><strong>Credit (N)</strong></td>
                                    <td style="padding:5px;"><strong>Debit (N)</strong></td>
                                    <td style="padding:5px;"><strong>Memo</strong></td>
                                    </tr>
                                    '; ?> <?php foreach ($all_time_payment_data as $value) { ?>
                                    
                                  <?php $sendata .= '<tr>
                                    <td style="padding:5px;">'.$value->transaction_date.'</td>
                                    <td style="padding:5px;">'.SITE_CURRENCY.' '.sprintf("%.2f",$value->credit).'</td>
                                    <td style="padding:5px;">'.SITE_CURRENCY.' '.sprintf("%.2f",$value->debit).'</td>
                                    <td style="padding:5px;">'.$value->memo.'</td>
                                    </tr>';?>
                                    <?php } ?>
                                       <?php $sendata .= '</table>
                                       
                                        <form name="debitForm" action="'.$this->config->base_url().'admin/manage_publisher/saveAllTimePaymentForm" method="post" id="debitForm" onsubmit="return saveAllTimePaymentForm();" class="form-container" style=" display: none">
						
						<div class="modal-body">
						
						<div class="row-fluid">
								<div class="control-group">
									<label class="control-label" for="task">Hello '.ucfirst($user_data['user_name']).' ,<br/>
										<strong> Here you can <span id="trasectiontype"></span> in publisher&#8217;s account...  </strong>
									</label>
									
									<div class="controls">
										<input type="hidden" id="userId" name="userId" value="'.$userId.'"/>
									</div>
							</div>
						</div>
						
					
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task"> Amount: </label>
								
								<div class="controls">
									<div class="input-append input-prepend">
                                       <span class="add-on">'.SITE_CURRENCY.'</span><input type="text" id="amount" name="amount" class="number span5 required" />
                                    </div>
									
									<input type="hidden" id="userId" name="userId" value="'.$userId.'"/>
                                                                        <input type="hidden" id="trasection_type" name="trasection_type" value=""/>
								</div>
								</div>
								</div>
						
						<div class="row-fluid">
								<div class="control-group">
								<label class="control-label" for="task"> Memo: </label>
								
								<div class="controls">
									<textarea name="memo" class="required span6"></textarea>
									
								</div>
								</div>
								</div>
						
						</div>
						
						
						<div class="modal-footer">
							<div class="row-fluid">
							<div class="pull-right publisher">';?>
                                                <?php foreach ($all_time_payment_balance as $value) { ?>
                                                        <?php $sendata .= '<div style="" class="balance_main11">
                                                         <strong>Total Balance Paid :</strong>
                                                       <strong>'.SITE_CURRENCY.' '.sprintf("%.2f",$value->balance).'</strong></div>  
                                                        ';?>
                                                          <?php }?>
                                                                                      
								<?php $sendata .= '<input type="submit" class="btn btn-info" value="Update Account">
								<input type="button" class="btn btn-warning cancel_botton" value="Cancel">
							</div>
						</div>
						</form>
                                        
						</div>
                                                <div class="balance clearfix">
                                        <input type="button" class="btn btn-info btn_btn_danger_userActioncredit payment_btn" value="Add To Payments">
                                        <input type="button" class="btn btn-info btn_btn_danger_userActiondebit payment_btn" value="Subtract From Payments">
                                        <input type="button" class="btn btn-warning main_cancle payment_btn" value="Cancel" onclick ="closeMe();"></div>';?>
                                            
                                       <?php foreach ($all_time_payment_balance as $value) { ?>
                                        <?php $sendata .= '<div style="" class="balance_main">
                                    <strong>Total Balance Paid :</strong>
                                    <strong>'.SITE_CURRENCY.' '.sprintf("%.2f",$value->balance).'</strong></div>  
                                     ';?>
                                       <?php }
						echo $sendata;
			}
		   else
		   {
				redirect('admin/login', 'refresh');
		   }
		 } 
                 public function saveAllTimePaymentForm()
				 {
				  if($this->session->userdata('logged_in'))
					{
						$user_data 		 = $this->session->userdata('logged_in');
						$data['user'] 	 = $user_data;
						$result = $this->publisher_model->updatePubAllTimePaymentBalance();
						if($result){
							echo 1;
						}else{
							echo 0;
						}
					}
				   else
				   {
					    redirect('admin/login', 'refresh');
				   }
				 }
}
?>