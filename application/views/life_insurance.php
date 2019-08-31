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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/core.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/auto-quote-form.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/core_002.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/HometownQuotes.css">
    <script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery.js" /></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
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
                  //jQuery(function($) { $( "#datepicker" ).datepicker(); });
                  $( "#datepicker" ).datepicker({
                      changeMonth: true,
                      changeYear: true,
                      maxDate: '0',
                                      yearRange: '1920:+0'
                  });
                  $("#lifeinsurance").validate();
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
				}*/
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
  </head>
  <body id="is-form" class="">
      <div id="loading1" style="display: none;">
                     <img id="loading-image1" src="<?php echo base_url() ?>assets/forms/images/loadiii.gif" alt="Loading...">
                 </div>
    <div id="page-container">
     <!-- <div class="landing-header">
        <h1></h1> -->
        <style type="text/css">
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
.phoneerror{
    color: #F00 !important;
    margin-left:5px;
}
		  .error{
		   color: #F00 !important;
		   margin-left:5px;
		  }
		   .pageheading{
		   margin-left:10px;
		   text-align:center;
                   height: 45px;    
	   }
	   .pageheading h2{
		   font-size:22px;
		   font-weight:bold;
		   color: #005CB3;
	   }
           .sidebarlogos{
               opacity: 0.5;
               -webkit-opacity: 0.5;
               -ms-opacity: 0.5;
               -o-opacity: 0.5;
                -moz-opacity: 0.5;
               
                margin-bottom: 14px;
           }
           .pageheading h2 u{
               vertical-align: inherit;
           }
           
           .block img{
               opacity: 0.5;
               -webkit-opacity: 0.5;
               -ms-opacity: 0.5;
               -o-opacity: 0.5;
                -moz-opacity: 0.5;
           }
           
            .advertiser{
width: 580px;
overflow: hidden;
overflow-x: auto;
}
.advertiser table{
  width: 100%;
}
.advertiser table tr td{
width: 25%;
white-space: pre;
    text-align: center;
}
.advertiser table tr td label{
display: inline-block;
vertical-align: middle;
margin-right: 5px;
} 
.advertiser table tr td input[type="checkbox"] {
display: inline-block;
vertical-align: middle;
}
        </style>
         <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/responsive.css">
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
<!--			<img class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/niger.png"/>
			<img style="width: 203px;" class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/adic.png"/>
			<img  class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/mutual.png"/>
			<img  class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/mansard.png"/>
			<img  class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/LOGO.gif"/>
			<img class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/zenith.jpg"/>-->
			
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
                 <?php foreach($selected_advertiser as	$info){?>
                <h2>Discounted Life Insurance Quotes From <br><u><?php echo $info->name;?></u></h2>
                 <?php }?>
 		</div>
              <form id="lifeinsurance" name="lifeinsurance" action="<?=base_url().'home/submitlifeInsurance'?>" method="post" onsubmit="return calculateAdsPay()">
				<input type="hidden" name="bid_priceToken" id="bid_priceToken" value="0" />
				<input type="hidden" name="bid_priceTokenValue" id="bid_priceTokenValue" value="0" />
		
                <input type="hidden" name="state_name" value="<?=$state;?>" />
                <input type="hidden" name="publisherid" value="<?=$publisherid;?>" />
                <input type="hidden" name="subpublisherid" value="<?=$subpublisherid;?>" />
                <input type="hidden" name="categoryid" value="<?=$categoryid;?>" />
                <div style="<?php echo isset($msgValidate) && strlen($msgValidate) >0 ? 'margin-top:10px;' : '' ?>"><label class="error"><?php echo isset($msgValidate) && strlen($msgValidate) >0 ? $msgValidate : ""; ?></label></div>
             <ul><li class="vehicle-list-item"> <ul class="quote-list requested-coverage-list">
                    <?php 
                    if(isset($userid) && $userid >0){

                    }else{
                        $userid=$this -> security -> xss_clean($this -> input -> get('userid'));    
                    }
                    ?>	
                                    <li class="odd" style=" display: none;">
 						<label for="insured-select">Preferred Provider </label>
 						
 						 <select class="span12 required" id="prefered_advertiser1" name="prefered_advertiser1">
								                   	<?php $preferred_user_count=0 ;?>	
										<?php foreach($advertiser_data as	$adv){
                                                
														foreach (explode(',',$adv->activecategory) as $cats){
														$bids	=	explode(':',$cats);
														//print_r($bids);
															for($i=0;$i<count($bids);$i++){
																if($bids[$i]==LIFE_INSURANCE){
																$bid_price	=	$bids[$i+1]	;
																}
															}
														}												
                                                    
                                                    																				
                                                     if ($preferred_user_count==0){ ?>
                                                    <input type="hidden" bid_price="<?=$bid_price;?>" class="span12 required" id="prefered_advertiser" name="prefered_advertiser" value="<?=$userid;?>" />
                                                     <input type="hidden" class="span12 required" id="advertiserName" name="advertiserName" value="<?=$adv->name;?>" />
                                                    <?php } ?>
                                                    

                                                                              <?php $preferred_user_count=1; }?>
                                                 </select>
                                               
 					</li>
                
                    <li>
                	<label for="insured-select">State of residence</label>
                	<select class="span12" id="statename" name="statename">
                     <?php
                        foreach($states as	$info){
                            if($info->stateName == $state){
                                echo "<option selected value='$info->stateName'>$info->stateName</option>";
                            }else{
                                echo "<option value='$info->stateName'>$info->stateName</option>";
                            }
                        }
                    ?>
                  </select>
               	 </li>
                    <li class="odd">
                      <label for="car-series-select">Gender</label>
                      <span>
                        
                       <select name="selectgender">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                      </span>
                    </li>
                    
                    <li>
                      <label for="car-own-select">Date of birth</label>
                      <span>
                     
                       <input type="text" class="required" id="datepicker" name="dob" />
                       
                      </span>
                    </li>
                    <li class="odd">
                      <label for="car-park-select"> Coverage amount</label>
                      
                        <input type="text" class="required number" name="conamount" />
                      
                    </li>
                    
                    <li>
                      <label for="car-use-select">Term Length</label>
                      <span>
                      <select name="teamlenght">
<!--                          <option value=" 10-years"> 10 years</option>
                           <option value=" 20-years"> 20 years</option>
                            <option value=" 30-years"> 30 years</option>-->
                            <option value="Less than 5 years">Less than 5 years</option>
                            <option value="5-10 years"> 5-10 years</option>
                            <option value="11-15 years"> 11-15 years</option>
                            <option value="16-20 years">16-20 years</option>
                            <option value="21-30 years"> 21-30 years</option>
                            <option value="31-40 years">31-40 years</option>
                            <option value="41-50 years">41-50 years</option>
                            <option value="Whole Life">Whole Life</option>
                         </select>
                      </span>
                    </li>
                    <li class="odd">
                      <label for="car-mileage-select">Tobacco / Nicotine user? </label>
                      <span>
                        <select name="Tobacco_Nicotine_user">
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        
                        </select>
                      </span>
                    </li>
                    <li class="salvaged-vehicle-list-item">
                      <label for="car-salvage-select">Tell us about your Health</label>
                      <span>
                        <select name="health">
                          <option value="Excellent" selected="selected">Excellent: I could be a professional athlete</option>
                          <option value="Very-Good:">Very Good: I usually work out and eat right</option>
                          <option value="Good:">Good: I take medication for minor health issues</option>
                          <option value="Fair">Fair: I'm a total couch potato</option>
                        </select>
                      </span>
                    </li>
                    
                     <li class="odd">
                      <label for="car-mileage-select">Full Name </label>
                      <span>
                        <input type="text" class="required" name="fullname" />  
                      </span>
                    </li>
                    
                    
                    <li>
                      <label for="car-mileage-select">Valid Email </label>
                      <span>
                        <input type="text" class="required email" name="email" />
                      
                        
                        
                      </span>
                    </li>
                    <li class="odd">
                      <label for="car-mileage-select">Phone number </label>
                      <span>
                        <input type="text" class="" name="phone" /> 
                        <label class="invalidphone phoneerror"></label>
                      </span>
                    </li>
                    
                    
                    
                  </ul>
                </li>
              </ul>
             
     <div class="advertiser clearfix">
          <?php 
                   $countArray=count($top_Advarr);
                  // echo $countArray;
                   if($countArray == 0){
                   }else{
                   ?>
       <table>
    <tr>
    <td><span>Also Get Quotes From:</span></td>
         <?php
         if(isset($top_Advarr) && is_array($top_Advarr) && !empty($top_Advarr)){

         foreach($top_Advarr as $topvalue){
          //  print_r($topvalue);
         ?>
     <td><label><?php echo $topvalue['username'];?></label><input type="checkbox" value="<?php echo $topvalue['userid']; ?>" name="topAdvrData[]" checked/></td>
         <?php
         }
         }?>
    </tr>
              </table>
     
                   <?php } ?>
 </div>       
        
              <div style="clear: both; overflow: auto; width:560px;" class="submit-container">
              <div style="text-align: left; float: left; width: 47%; padding: 0 15px 30px 6px; font-size: 9px;line-height: 10px;text-align: justify;" class="tcpa"><p></p><p style="font-size: 10px;line-height: 10px;color: #aaa;">By clicking the button to the right, I agree to receive marketing via automatic telephone dialing system or by artificial/pre-recorded message, or by text message from one or more insurance companies or their agents, this website, and partner companies at the telephone number I have provided. I understand that my consent is not required as a condition of purchasing any goods or services. </p>
                 <!--<p style="font-size: 10px;line-height: 10px;color: #aaa;margin-top:5px;">By clicking the button to the right, I authorize these insurance companies or their agents to confirm my information through the use of a consumer report, which may include my credit score and driving record.</p>-->
                 <p></p></div>               
<!--			   <div id="loading">
                     <img id="loading-image" src="<?=base_url()?>assets/forms/images/loading.gif" alt="Loading..." />
                 </div>-->
<!--                     <script>
                      $('#loading').show();
                      $(document).ready(function(){
                         $('#loading').hide(); 
                      });
                  </script>-->
                  
                <input type="submit" value="" id="submit-anchor" >
                  </a>
              </div>
<!--              <img style="margin-bottom: 20px; margin-left: 44px; width: 203px; opacity: 0.5;" src="<?=base_url();?>/assets/forms/images/igilogo-website_1.jpg"/>
			<img style="margin-bottom: 20px; margin-left: 60px; opacity: 0.5;" src="<?=base_url();?>/assets/forms/images/aiico.png"/>-->
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
        <div class="landing-header" style="overflow-y: hidden;"><center><h1 style="  height: 58px !important; margin: 18px 0 0 20px;  width: 350px;font-size: 18px; font-weight: bold; color: #005CB3;">Powered by <a href="<?=base_url()?>" target="_blank"><img src="<?=base_url().'assets/user/design/images/keyverticals.PNG';?>" style="height: 42px;"/></a></center></h1>
        
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
    <!--<script src="https://code.jquery.com/jquery-1.9.1.js"></script>-->
    <script type="text/javascript" src="<?=base_url()?>assets/forms/js/core.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery_003.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery_002.js"></script>
    <div class="acResults" style="display: none; position: absolute;"></div>
  <!--<script type="text/javascript" src="<?=base_url()?>assets/forms/js/myform.js"></script>-->
  </body>
</html>
    