<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
  <!--<![endif]-->
  <!--[if IE 7]>

<script type="text/javascript">
		alert("Please upgrade your browser for best performance");
 </script>
<![endif]-->


  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
    <link rel="icon"  type="image/png"  href="<?=base_url()?>assets/admin_property/assets/images/favicon.png">
    <title>Best Rate Quotes from KeyVerticals</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/core.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/auto-quote-form.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/core_002.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/HometownQuotes.css">
    <script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery.js" /></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/user/design/jscript/custom.js" /></script>
    <script type="text/javascript" src="<?=base_url()?>assets/admin_property/assets/js/jquery.validate.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#selectproperty').change(function(){
            var t=$('#selectproperty').val();
            if(t=='0'){
              $('#property_type1').css("display","block");
            }else{
              $('#property_type1').css("display","none");
            }
        });
        $( "#datepicker" ).datepicker({
              changeMonth: true,
              changeYear: true,
              maxDate: '0',
			  yearRange: '1920:+0'
          });
          $("#autoloan").validate();
          
      });
	  function calculateAdsPay(){
				/* if($('#prefered_advertiser :selected').index() == 0 ){
					var bid_price	=	parseInt($('#prefered_advertiser :selected').attr('bid_price'));
					var Next_bid_price	=	parseInt($('#prefered_advertiser option').eq(1).attr('bid_price'));
					if(Next_bid_price+50 < bid_price){
						$('#bid_priceToken').val('1');
						$('#bid_priceTokenValue').val(Next_bid_price +50);
					}
				} */
                            if($('#prefered_advertiser :selected').index() == 0 ){
                                        var bid_price	=	parseInt($('#prefered_advertiser :selected').attr('bid_price'));
                                        var Next_bid_price	=	parseInt($('#prefered_advertiser option').eq(2).attr('bid_price'));
                                        if(Next_bid_price+50 < bid_price){
                                                $('#bid_priceToken').val('1');
                                                $('#bid_priceTokenValue').val(Next_bid_price +50);
                                        }

                                }
                              if($('#prefered_advertiser :selected').index() == 1 ){
					var bid_price	=	parseInt($('#prefered_advertiser :selected').attr('bid_price'));
					var Next_bid_price	=	parseInt($('#prefered_advertiser option').eq(2).attr('bid_price'));
					if(Next_bid_price+50 < bid_price){
						$('#bid_priceToken').val('1');
						$('#bid_priceTokenValue').val(Next_bid_price +50);
					}
				} 
			}
    </script>

  </head>
  <body id="is-form" class="">
    <div id="page-container">
    <!--  <div class="landing-header">
        <h1></h1> -->
        <style type="text/css">
          #loading {
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            position: fixed;
           
            opacity: 0.5;
            background-color: #fff;
            z-index: 99;
            text-align: center;
          }
        #loading-image {
          position: absolute;
          top: 50px;
          left: 340px;
          z-index: 100;
        }
		  .error{
		   color: #F00 !important;
		   margin-left:5px;
		  }
		   .pageheading{
		   margin-left:10px;
		   text-align:center;
	   }
	   .pageheading h2{
		   font-size:22px;
		   font-weight:bold;
		   color: #005CB3;
	   }
        </style>
      <!--  <ul class="headlines">
          <li class="quality">
            <img alt="Quality Check" src="<?=base_url()?>assets/forms/images/quality-small.png">
          </li>
          <li>
            <span class="landing-headline"></span>
          </li>
        </ul>
      </div>-->
      <div id="page-content">
        <div id="great-rates-img-container">&nbsp;</div>
        <div>
          <div id="sub-form">
            <?php 
                 foreach($prefered as	$info){
                     foreach($info as $adv){
                     if(isset($adv->adverFromIcon) && strlen($adv->adverFromIcon) > 0){
            ?>
                 <img style="margin-bottom: 20px;" src="<?=base_url();?><?=$adv->adverFromIcon;?>" /> 
                     <?php }}}?>
          </div>
          <div id="main-form">
          <div class="pageheading">
                <h2>Get A Auto Loan Now Quickly And Easily!</h2>
            </div>
              <form id="autoloan" name="autoLoan" onsubmit="return calculateAdsPay()" action="<?=base_url().'home/submitautoloan'?>" method="post" style="margin-bottom: -26px;">
			  <input type="hidden" name="bid_priceToken" id="bid_priceToken" value="0" />
		<input type="hidden" name="bid_priceTokenValue" id="bid_priceTokenValue" value="0" />
		
                <input type="hidden" name="state_name" value="<?=$state;?>" />
                <input type="hidden" name="publisherid" value="<?=$publisherid;?>" />
                <input type="hidden" name="subpublisherid" value="<?=$subpublisherid;?>" />
                <input type="hidden" name="categoryid" value="<?=$categoryid;?>" /><br>
                <div class="heading">
                    <h3 >Employment Information</h3>
                </div>
                <ul class="quote-list requested-coverage-list">
                    
               	 <li class="odd">
                    <label for="Employer-Name">Employer Name</label>
                    <span>
                        <input type="text" name="empName" class="required">
                    </span>
               	 </li>
                 <li>
                    <label for="Employer-Phone">Employer Phone</label>
                    <span>
                        <input type="text" name="empPhone" class="required">
                    </span>
               	 </li>
                 <li class="odd">
                    <label for="Time-at-Job">Time at Job</label>
                    <span>
                        <select name="timeatJob"><option value="">Less than 1 year</option><?php for($i=1;$i<=20;$i++){ echo "<option value='$i year'>$i year</option>";} ?></select>
                       
                    </span>
               	 </li>
                 <li>
                    <label for="Occupation">Occupation</label>
                    <span>
                        <input type="text" name="occupation" class="required">
                    </span>
               	 </li>
                 <li class="odd">
                    <label for="Monthly-Income">Monthly Income</label>
                    <span>
                        <input type="text" name="monthlyIncome" class="required">
                    </span>
               	 </li>
                 
               <!--  

                    <?php
                       /* foreach($states as	$info){
                            if($info->stateName == $state){
                                echo "<option selected value='$info->stateName'>$info->stateName</option>";
                            }else{
                                echo "<option value='$info->stateName'>$info->stateName</option>";
                            }
                        }*/
                    ?>
                  </select>
                  </span>
                </li>
                <li class="odd">
                  <label for="contacttime">Best Contact Time</label>
                  <span>
                      <select name="contacttime">
                          <option value="Anytime">Anytime</option>
                          <option value="Morning">Morning</option>
                          <option value="Afternoon">Afternoon</option>
                          <option value="Evening">Evening</option>
                      </select>
                  </span>
                </li>
                <li>
                    <label for="streetaddress">Street Address</label>
                    <span>
                        <input type="text" name="streetaddress" class="required">
                    </span>
                </li>
                <li class="odd">
                    <label for="phone">Phone Number</label>
                    <span>
                        <input type="text" class="required number" name="phone">
                    </span>
                </li>
                <li>
                    <label for="income-source">Income Source</label>
                    <span>
                        <select class="required" name="incomesource">
                            <option value="Job Income">Job Income</option>
                            <option value="Benefits">Benefits</option>
                        </select>
                    </span>
                </li>
                <li class="odd">
                    <label for="Monthly-Net-Income">Monthly Net Income</label>
                    <span>
                        <select class="required" name="netincome">
                            <option value="Less than <?php echo SITE_CURRENCY; ?>50,000">Less than <?php echo SITE_CURRENCY; ?>50,000</option>
                            <option value="<?php echo SITE_CURRENCY; ?>50,000 - <?php echo SITE_CURRENCY; ?>100,000"><?php echo SITE_CURRENCY; ?>50,000 - <?php echo SITE_CURRENCY; ?>100,000</option>
                            <option value="<?php echo SITE_CURRENCY; ?>100,001 - <?php echo SITE_CURRENCY; ?>150,000"><?php echo SITE_CURRENCY; ?>100,001 - <?php echo SITE_CURRENCY; ?>150,000</option>
                            <option value=" <?php echo SITE_CURRENCY; ?>150,001 - <?php echo SITE_CURRENCY; ?>200,000"><?php echo SITE_CURRENCY; ?>150,001 - <?php echo SITE_CURRENCY; ?>200,000</option>
                            <option value=" <?php echo SITE_CURRENCY; ?>200,001 - <?php echo SITE_CURRENCY; ?>300,000"> <?php echo SITE_CURRENCY; ?>200,001 - <?php echo SITE_CURRENCY; ?>300,000</option>
                            <option value="<?php echo SITE_CURRENCY; ?>300,001 - <?php echo SITE_CURRENCY; ?>400,000"><?php echo SITE_CURRENCY; ?>300,001 - <?php echo SITE_CURRENCY; ?>400,000</option>
                            <option value="<?php echo SITE_CURRENCY; ?>400,001 - <?php echo SITE_CURRENCY; ?>500,000"><?php echo SITE_CURRENCY; ?>400,001 - <?php echo SITE_CURRENCY; ?>500,000</option>
                            <option value="Over <?php echo SITE_CURRENCY; ?>500,000">Over <?php echo SITE_CURRENCY; ?>500,000</option>
                        </select>
                    </span>
                </li>
                <li>
                    <label for="employer-name">Employer Name</label>
                    <span>
                        <input type="text" class="required" name="employername">
                    </span>
                </li>
                <li class="odd">
                    <label for="job-title">Job Title</label>
                    <span><input type="text" class="required" name="jobtitle"></span>
                </li>
                <li>
                    <label for="time-employed">Time Employed</label>
                    <span>
                        <select class="required" name="timeemployed">
                            <option value="1-3 Months">1-3 Months</option>
                            <option value="3-6 Months">3-6 Months</option>
                            <option value="6-12 Months">6-12 Months</option>
                            <option value="1 Year">1 Year</option>
                            <option value="2 Years">2 Years</option>
                            <option value="3 Years">3 Years</option>
                            <option value="4 Years">4 Years</option>
                            <option value="5+ years">5+ years</option>
                        </select>
                    </span>
                </li>
                  </ul>
                </li>-->
              </ul>
                <br/><br/>
              <div class="heading"> 
                  <h2>Basic Information </h2>
             </div>
                <ul class="quote-list requested-coverage-list">
                    <li class="odd">
                    <label for="Preferred-Provider">Preferred Provider</label>
                    <span>
                        <input type="text" name="prfProvider" class="required">
                    </span>
               	 </li>
                    <li>
                  <label for="date-of-birth">Birthdate</label>
                  <span>
                    <input type="text" name="birthdate" id="datepicker" class="required" />
                  </span>
                </li>
                <li class="odd">
                  <label for="date-of-birth">Credit Problem</label>
                  <span>
                      <select name="crdProb" class=""><option>No Credit Problems</option></select>
                  </span>
                </li>
                 </ul>
                 
                 <br/><br/>
                <div class="heading"> 
             <h2>Residential Information </h2>
             </div>
                <ul class="quote-list requested-coverage-list">
                    <li class="odd">
                       <label for="Preferred-Provider">Time at Residence</label>
                        <span>
                            <select name="timeatResidence"><option>Less than 1 year</option><?php for($i=1;$i<=20;$i++){ echo "<option value=''>$i year</option>";} ?></select>
                       </span>
               	   </li>
                   <li>
                    <label for="Rent-Mortgage">Rent/Mortgage</label>
                    <span>
                      <input type="text" name="rent" id="datepicker" class="required" />
                    </span>
                </li>
                <li class="odd">
                  <label for="date-of-birth">I Currently</label>
                  <span>
                      <select name="curr">
                          <option value="rent">Rent</option>
                          <option value="own">Own</option>
                      </select>
                  </span>
                </li>
              </ul>
                
                
                
                    <div style="clear: both; overflow: auto; width:560px;" class="submit-container">
                        <div style="text-align: left; float: left; width: 47%; padding: 0 15px 30px 6px; height: 120px; font-size: 9px;line-height: 10px;" class="tcpa"><p></p><p style="font-size: 10px;line-height: 10px;color: #aaa;">By clicking the button to the right, I agree to receive marketing via automatic telephone dialing system or by artificial/pre-recorded message, or by text message from one or more insurance companies or their agents, this website, and partner companies at the telephone number I have provided. I understand that my consent is not required as a condition of purchasing any goods or services. </p>
                 <p style="font-size: 10px;line-height: 10px;color: #aaa;margin-top:5px;">By clicking the button to the right, I authorize these insurance companies or their agents to confirm my information through the use of a consumer report, which may include my credit score and driving record.</p><p></p></div>
                <div id="loading">
                     <img id="loading-image" src="<?=base_url()?>assets/forms/images/loading.gif" alt="Loading..." />
                 </div>
                 <script>
                      $('#loading').show();
                      $(document).ready(function(){
                         $('#loading').hide();
                      });
                  </script>

                        <input type="submit" value="" id="submit-anchor" >
                          </a>
                      </div>
            </form>
            <style type="text/css">
                .disclaimers {
                    display: none;
                }
                #footer {
                    background: #f3f5f6;
                    margin-top: 50px;
                }
                .seals {
                    text-align: left;
                }
                .landing-link {
                    display: none;
                }
          </style>
        </div>
      </div>
        <div style="clear:both;"></div>
    </div>
      <div class="landing-header" style="overflow-y: hidden;"><center><h1 style="  height: 58px !important; margin: 18px 0 0 20px;  width: 350px;font-size: 18px; font-weight: bold; color: #005CB3;">Powered by <a href="<?=base_url()?>" target="_blank"><img src="<?=base_url().'assets/user/design/images/keyverticals.png';?>" style="height: 42px;"/></a></center></h1>
        
<ul class="headlines"><li class="quality"><img alt="Quality Check" src="<?=base_url()?>assets/forms/images/quality-small.png"></li><li><span class="landing-headline"></span></li></ul></div>
	</div>
      <div id="footer" style="display:none;">
      <div id="footer-content">
        <ul>
          <li class="first">
            <a href="#" target="_blank">Terms of Use</a>
          </li>
          <li class="last">
            <a href="#" target="_blank">Privacy Notice</a>
          </li>
        </ul>
        <div class="disclaimers">
          <p>
            By
            clicking "Get Quotes Now" and seeking a quote request I authorize and
            agree several insurance companies or their agents and partner companies
            may contact me using this information or to obtain additional
            information needed to provide quotes where permitted by law. I
            acknowledge that I have read and understand all of the Terms and
            Conditions of this website and agree to be bound by them.
          </p>
        </div>
        <p>
          Copyright ©
          2013

        </p>
      </div>
    </div>
    <script type="text/javascript">
      var coreInit = {};
      coreInit.host = 'auto.hometownquotes.com';
      coreInit.affiliateId = '2100';
      coreInit.affiliateAccountId = '5156';
      coreInit.affiliateAccountName = 'HometownQuotes';

      var aff = "OldHTQ";
      var affAccount = "HometownQuotes";
      if(aff == "") {
      coreInit.affiliateName = 'quoteengine';
      } else {
      coreInit.affiliateName = 'OldHTQ';
      }
      if(affAccount == "") {
      coreInit.affiliateAccountName = 'quoteengine';
      } else {
      coreInit.affiliateAccountName = 'HometownQuotes';
      }
    </script>
    <script type="text/javascript" src="<?=base_url()?>assets/forms/js/core.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery_003.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery_002.js"></script>
    <div class="acResults" style="display: none; position: absolute;"></div>
    <!--<script type="text/javascript" src="<?=base_url()?>assets/forms/js/myform.js"></script>-->
  
    