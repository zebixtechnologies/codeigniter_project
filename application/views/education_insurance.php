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
    


    <link rel="icon"  type="image/png"  href="<?=base_url()?>assets/admin_property/assets/images/favicon.png">
    <title>Best Rate Quotes from KeyVerticals</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/core.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/auto-quote-form.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/core_002.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/HometownQuotes.css">
    <script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery.js" /></script>
    <script type="text/javascript" src="<?=base_url()?>assets/user/design/jscript/custom.js" /></script>
    <script type="text/javascript" src="<?=base_url()?>assets/admin_property/assets/js/jquery.validate.min.js"></script>
    <script>
       var isError = false;
        var isSubmitted = false;
      $(document).ready(function(){
        
          $('#selectproperty').change(function(){
              var t=$('#selectproperty').val();
              if(t=='0'){
                  $('#property_type1').css("display","block");
              }else{
                  $('#property_type1').css("display","none");
              }
          });
          $("#educationinsurance").validate();
          $("input[name='phone']").change(function(){
                $(".invalidphone").html("");
                $(this).removeClass("phoneerror");
                var phonenumber = $(this).val();
                var regex = /^(?:0)[0-9]{10}$|^(?:0)[0-9]{8}$|^(?:\+234)[0-9]{10}$|^(?:\+234)[0-9]{8}$|^(?:234)[0-9]{8}$|^(?:234)[0-9]{10}$/;
                if(phonenumber != ""){
                    if(regex.test(phonenumber)){
                        $(this).removeClass("phoneerror");
                        $(".invalidphone").html("");
                        isError = false;
                    }else{
                        $(this).addClass("phoneerror");
                        $(".invalidphone").html("Please enter a valid number");
                        isError = true; 
                    }
                    
                }else{
                    $(this).addClass("phoneerror");
                    $(".invalidphone").html("This field is required.");
                    isError = true; 
                }
          });
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
                                var phonenumber = $("input[name='phone']").val();
                                if(phonenumber == ""){
                                    $("input[name='phone']").addClass("phoneerror");
                                    $(".invalidphone").html("This field is required.");
                                    isError = true; 
                                }
                                  if(isError){
                                      return false;
                                  }else{
                                      if(!isSubmitted){
                                            isSubmitted = true;
                                            $("#loading1").show();
                                            return true;
                                        }else{
                                            return false;
                                        }
                                  }
			}
    </script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/responsive.css">
  </head>
  <body id="is-form" class="">
      <div id="loading1" style="display: none;">
                     <img id="loading-image1" src="<?php echo base_url() ?>assets/forms/images/processing.gif" alt="Loading...">
                 </div>
    <div id="page-container">
   <!--   <div class="landing-header">
        <h1></h1> -->
        <style type="text/css">
            .phoneerror{
    color: #F00 !important;
    margin-left:5px;
}
         #loading1 {

            width: 100%;

            height: 100%;

            top: 0px;

            left: 0px;

            position: fixed;

            display: none;

            opacity: 0.5;

            background-color: #fff;

            z-index: 99;

            text-align: center;

          }

        #loading-image1 {

          position: absolute;

         top: 225px;
          left: 580px;

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
       <!-- <ul class="headlines">
          <li class="quality">
            <img alt="Quality Check" src="<?=base_url()?>assets/forms/images/quality-small.png">
          </li>
          <li>
            <span class="landing-headline"></span>
          </li>
        </ul>
      </div> -->
      <div id="page-content">
        <div id="great-rates-img-container">&nbsp;</div>
        <div>

          <div id="sub-form">
             <?php
                $baseurl = $this->config->item("base_url");
                if(isset($advbanner) && is_object($advbanner) && !empty($advbanner)){
                    $logo = $advbanner->logo;
                    if($logo==""){
                        $logo ="no_image.png" ; 
                    }
                    echo "<img src='{$baseurl}assets/uploads/advertiser/icon/{$logo}' alt='' />";  

                }

                 if(isset($banner) && is_object($banner) && !empty($banner)){
                    echo "<div style='margin-top: 10px;'>";
                    $logo = $banner->banner_name;
                    if($logo != ""){
                        if(isset($banner->banner_link) && strlen($banner->banner_link) > 0){
                            echo "<a href='{$banner->banner_link}' target='_blank'>";
                        }
                        echo "<img src='{$baseurl}assets/uploads/category/{$logo}' alt='' />";  
                        if(isset($banner->banner_link) && strlen($banner->banner_link) > 0){
                            echo "</a>";
                        }   
                    }
                    echo "</div>";
                }
            ?>
            <?php 
//                 foreach($prefered as	$info){
//                     foreach($info as $adv){
//                     if(isset($adv->adverFromIcon) && strlen($adv->adverFromIcon) > 0){
            ?>
                 <!--<img style="margin-bottom: 20px;" src="<?//=base_url();?><?//=$adv->adverFromIcon;?>" />--> 
                     <?php // }}}?>
          </div>
            <div id="main-form">
            <div class="pageheading">
 			<h2>Quick School Search (Up to 9.5% off school fees)</h2>
 		</div>
                <form id="educationinsurance" name="educationinsurance" action="<?=base_url().'home/submiteducationInsurance'?>" method="post" onsubmit="return calculateAdsPay()" style="margin-bottom: -25px;">
		<input type="hidden" name="bid_priceToken" id="bid_priceToken" value="0" />
		<input type="hidden" name="bid_priceTokenValue" id="bid_priceTokenValue" value="0" />
		<input type="hidden" name="state_name" value="<?=$state;?>" />
                <input type="hidden" name="publisherid" value="<?=$publisherid;?>" />
                <input type="hidden" name="subpublisherid" value="<?=$subpublisherid;?>" />
                <input type="hidden" name="categoryid" value="<?=$categoryid;?>" />
 		<div style="<?php echo isset($msgValidate) && strlen($msgValidate) >0 ? 'margin-top:10px;' : '' ?>"><label class="error"><?php echo isset($msgValidate) && strlen($msgValidate) >0 ? $msgValidate : ""; ?></label></div>
              <ul class="quote-list requested-coverage-list">
                    <li class="odd">
                      <label>
                        <label for="prefered-provider">Preferred Provider</label>
                      </label>
                      <span>
                        <select class="span12 medium required" id="prefered_advertiser" name="prefered_advertiser">
                         <?php $preferred_user_count=0 ;?>
						  <?php foreach($prefered as	$info){
                                    foreach($info as $adv){
									foreach (explode(',',$adv->activecategory) as $cats){
												$bids	=	explode(':',$cats);
												for($i=0;$i<count($bids);$i++){
													if($bids[$i]==Education_INSURANCE){
														$bid_price	=	$bids[$i+1]	;
												}
											}
										}
if ($preferred_user_count==0){ ?>
                                                      <option bid_price="<?=$bid_price;?>" value="<?=$adv->userId;?>">Recommend For Me</option>
                                                    <?php } ?>
                          <option value="<?=$adv->userId;?>" bid_price="<?=$bid_price;?>"><?=$adv->name;?>
                          </option>
                          <?php $preferred_user_count=1; }}?>
                        </select>
                      </span>
                    </li>
                
                    <li>
                	<label for="insured-select">Select Degree Level </label>
                	<select class="span12 required" id="travel_location" name="degreelevel">
                            <option value="Bachelors">Bachelor's</option>
                            <option value="Masters">Master's</option>
                            <option value="Doctorate">Doctorate</option>
                            <option value="Diploma">Diploma</option>
                        </select>
               	 </li>
               	 <li>
                	<label for="insured-select">Select Program of Interest/Area of Study</label>
                	<span>
                            <select class="span12 required" id="area" name="areaofinterest">
    
                    <option value="Bachelors">Business</option>
                    <option value="Masters">Creative Arts</option>
                    <option value="Doctorate">Education & Teaching</option>
                     <option value="Diploma">Health Care</option>
                 	<option value="Diploma">IP & Computer Science</option>
                 	<option value="Diploma">Legal</option>
                 	<option value="Diploma">Nursing & Medical</option>
                 	<option value="Diploma"> Social Scences</option>
                 	<option value="Diploma"> Technical & Engineering</option>
                 	
                    </select>
                	</span>
                  
               	 </li>
               	 
               	 
               	 
                    <li class="odd">
                      <label for="car-series-select">Full Name</label>
                      <span>
                        
                     <input type="text" name="fullname" class="required" />
                      </span>
                    </li>
                    
                    <li>
                      <label for="car-own-select">Phone Number</label>
                      <span>
                     
                      <input type="text" name="phone" class="" />
                       <label class="invalidphone phoneerror"></label>
                      </span>
                    </li>
                    
                    <li class="odd">
                      <label for="car-series-select">Email Address</label>
                      <span>
                        
                     <input type="text" name="email" class="required email" />
                      </span>
                    </li>
                    
                    
                  </ul>
                </li>
             	 
              </ul>
             
             
             
           
        
              <div style="clear: both; overflow: auto; width:560px;" class="submit-container">
                <div style="text-align: left; float: left; width: 47%; padding: 0 15px 30px 6px !important; font-size: 9px;line-height: 10px;" class="tcpa"><p></p><p style="font-size: 10px;line-height: 10px;color: #aaa;text-align: justify;">By clicking the button to the right, I agree to receive marketing via automatic telephone dialing system or by artificial/pre-recorded message, or by text message from one or more insurance companies or their agents, this website, and partner companies at the telephone number I have provided. I understand that my consent is not required as a condition of purchasing any goods or services. </p>
                 <!--<p style="font-size: 10px;line-height: 10px;color: #aaa;margin-top:5px;">By clicking the button to the right, I authorize these insurance companies or their agents to confirm my information through the use of a consumer report, which may include my credit score and driving record.</p>-->
                 <p></p></div>
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
	</div><div id="footer" style="display:none;">
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
   <!-- <script type="text/javascript" src="<?=base_url()?>assets/forms/js/myform.js"></script>-->
    