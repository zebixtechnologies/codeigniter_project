<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="en"> <!--<![endif]-->
<!--[if IE 7]>

<script type="text/javascript">
		alert("Please upgrade your browser for best performance");
 </script>
<![endif]-->


<head>
    <link rel="icon"  type="image/png"  href="<?=base_url()?>assets/admin_property/assets/images/favicon.png">
    <title>Best Rate Quotes from KeyVerticals</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" type='text/css' href="<?=base_url()?>assets/forms/css/form.css">
    <link rel="stylesheet" type='text/css' href="<?=base_url()?>assets/forms/css/core.css">
    <link rel="stylesheet" type='text/css' href="<?=base_url()?>assets/forms/css/auto-quote-form.css">
    <link rel="stylesheet" type='text/css' href="<?=base_url()?>assets/forms/css/core_002.css">
    <link rel="stylesheet" type='text/css' href="<?=base_url()?>assets/forms/css/HometownQuotes.css">
    <script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery.js" /></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/user/design/jscript/custom.js" /></script>
    <script type="text/javascript" src="<?=base_url()?>assets/admin_property/assets/js/jquery.validate.min.js"></script>
    <script>
        var isError = false;
        var isSubmitted = false;
        $(document).ready(function(){
            $("body").on("focus",".datepicker",function(){
                $(this).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    maxDate: '0',
		            yearRange: '1920:+0'
                });
				
            });
            $("#autoinsurance").validate();
            $("input[name='phone-input']").change(function(){
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
				/** if($('#prefered_advertiser :selected').index() == 0 ){
					var bid_price	=	parseInt($('#prefered_advertiser :selected').attr('bid_price'));
					var Next_bid_price	=	parseInt($('#prefered_advertiser option').eq(1).attr('bid_price'));
					if(Next_bid_price+50 < bid_price){
						$('#bid_priceToken').val('1');
						$('#bid_priceTokenValue').val(Next_bid_price +50);
					}
                                      
				} */
                            //  when customer selects 'Recommended for me' then the highest bidder should get the chance to get this lead.
                            if($('#prefered_advertiser :selected').index() == 0 ){
                                        var bid_price	=	parseInt($('#prefered_advertiser :selected').attr('bid_price'));
                                        var Next_bid_price	=	parseInt($('#prefered_advertiser option').eq(2).attr('bid_price'));
                                        if(Next_bid_price+50 < bid_price){
                                                $('#bid_priceToken').val('1');
                                                $('#bid_priceTokenValue').val(Next_bid_price +50);
                                        }

                                }
                                
                            // This is the case when higgest bidder is bidding more than his adjacent bidder
                            // Explanation : first_adv_bid_price > second_adv_bid_price + 50 then second_adv_bid_price + 50 will use as first_adv bid price
                              if($('#prefered_advertiser :selected').index() == 1 ){
					var bid_price	=	parseInt($('#prefered_advertiser :selected').attr('bid_price'));
					var Next_bid_price	=	parseInt($('#prefered_advertiser option').eq(2).attr('bid_price'));
					if(Next_bid_price+50 < bid_price){
						$('#bid_priceToken').val('1');
						$('#bid_priceTokenValue').val(Next_bid_price +50);
					}
				} 
                                var phonenumber = $("input[name='phone-input']").val();
                                if(phonenumber == ""){
                                    $("input[name='phone-input']").addClass("phoneerror");
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
 
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/responsive.css"/>	
<style>
	
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
                   min-height: 45px;
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
                margin-bottom: 22px;
               
                
           }
           .pageheading h2 u{
               vertical-align: inherit;
           }
           .height{
               max-width: 59px !important;
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
       .block{
        display: block;
        margin:5px 0px;
    }
    .block img{
        width: 150px;
display: inline-block;
margin: 0px 20px;
    }
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

 

 
</head>
<body id="is-form" class="">
     <div id="loading1" style="display: none;">
                     <img id="loading-image1" src="<?php echo base_url() ?>assets/forms/images/loadiii.gif" alt="Loading...">
                 </div>
	<div id="page-container"><div id="page-content"><div id="great-rates-img-container">&nbsp;</div>

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
<!--<img class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/niger.png"/>
<img style="margin-bottom: 23px; width: 203px;"src="<?=base_url();?>/assets/forms/images/adic.png"/>
<img class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/cornerstone.png"/>
<img class="sidebarlogos"  src="<?=base_url();?>/assets/forms/images/mutual.png"/>
<img class="sidebarlogos"  src="<?=base_url();?>/assets/forms/images/mansard.png"/>
<img class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/LOGO.gif"/>
<img class="sidebarlogos" style="width:150px;" src="<?=base_url();?>/assets/forms/images/igilogo-website_1.jpg"/>
<img class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/wapic.png"/>
<img class="sidebarlogos height" src="<?=base_url();?>/assets/forms/images/hallmark.png"/>
<img class="sidebarlogos" src="<?=base_url();?>/assets/forms/images/zenith.jpg"/>-->


<?php 

//     foreach($prefered as	$info){
//         foreach($info as $adv){
//         if(isset($adv->adverFromIcon) && strlen($adv->adverFromIcon) > 0){
?>
     <!--<img style="margin-bottom: 20px;" src="<?//=base_url();?><?//=$adv->adverFromIcon;?>" />--> 
         <?php // }}}?>
</div>
 

 <?php //echo $subpublisherid; ?>
 <div id="main-form">
         <div class="pageheading">
              <?php foreach($selected_advertiser as	$info){?>
             <h2>Discounted Auto Insurance Quotes From <br> <u><?php echo $info->name;?></u></h2>
              <?php } ?>
         </div>
     
 <form id='autoinsurance' method="post" onsubmit="return calculateAdsPay()" action="<?=base_url().'home/autosubmit'?>" id="auto-insurance-quote">
	<input type="hidden" name="bid_priceToken" id="bid_priceToken" value="0" />
	<input type="hidden" name="bid_priceTokenValue" id="bid_priceTokenValue" value="0" />
 	<input type="hidden" name="carcount" id="carcount" value="1" />
 	<input type="hidden" name="drivercount" id="drivercount" value="1" />
 	
 	<input type="hidden" name="state_name" value="<?=$state;?>" />
 	<input type="hidden" name="publisherid" value="<?=$publisherid;?>" />
 	<input type="hidden" name="subpublisherid" value="<?=$subpublisherid;?>" />
 	<input type="hidden" name="categoryid" value="<?=$categoryid;?>" />
 	
 	
        <div class="error" style="<?php echo isset($msgValidate) && strlen($msgValidate) >0 ? 'margin-top:10px;' : '' ?>"><?php echo isset($msgValidate) && strlen($msgValidate) >0 ? $msgValidate : ""; ?></div>
        <ul class="vehicle-list-area">
		<li class="vehicle-list-item">
                    <ul class="quote-list single-vehicle">
                        <li class="odd">
                            <label><label for="car-year-select">What is your Vehicle Year?</label></label>
                            <span>
                            <select id="car-year" name="car-year" class="small required">
                                    <option selected="selected" value="-1">---</option>
                                    <?php
										if(isset($vehicleyears) && !empty($vehicleyears)){
											foreach($vehicleyears as $vehicleyear){
												echo '<option value="'.$vehicleyear->year.'">'.$vehicleyear->year.'</option>';
											}
										}
									?>
                            </select>
                            </span>
                        </li>
 		<li><label><label for="car-make-select">What is your Vehicle Make?</label>
                        </label><span>

                        <select id="car-make-select" name="car-make-select" class="small required">

                            <option selected="selected" value="-1">---</option>
                        </select>
 			</span>
                </li>
                <li class="odd"><label for="car-model-select">What is the Model of your Vehicle?</label><span>
                        <select id="car-model-select" name="car-model-select" class="medium">
                                <option selected="selected" value="-1">---</option></select>
                                </span>
                </li>
                <li class="even">	
                    <label for="cost-of-vehicle">Kindly state the cost (or estimated cost) of your Vehicle (&#x20a6;)</label>
                        <input id="cost-of-vehicle" name="cost-of-vehicle" class="required number" type="text">
                </li>
               <!-- <li class="odd">
                    <label for="car-series-select">Vehicle Series</label>
                    <span>
                        <select id="car-series-select" name="car-series-select" class="medium"><option selected="selected" value="-1">---</option>
                        </select>
                    </span>
                </li>
                <li>
                    <label for="car-own-select">Ownership</label>
                    <span>
                        <select name="car-own-select" class="required">
                               <option value="true" selected="selected">Own</option>
                               <option value="false">Lease</option>
                        </select>

                    </span>
                </li>
                <li class="odd">
                    <label for="car-park-select">Night parking</label>
                    <span>
                        <select name="car-park-select" class="required">
                            <option selected="selected" value="GARAGE">Garage</option>
                            <option value="CAR_PORT">Car Port</option>
                            <option value="ON_STREET">On Street</option>
                        </select>
                    </span>
                </li>
                <li>
                    <label for="car-use-select">Primary Use</label>
                    <span>

                        <select id="car-use-select" name="car-use-select" class="small required">
                        <option selected="selected" value="COMMUTE_WORK">Commute Work</option>
                        <option value="COMMUTE_SCHOOL">Commute School</option>
                        <option value="PLEASURE">Pleasure</option>
                        <option value="VARIES">Varies</option>
                        <option value="BUSINESS_USE">Business Use</option>
                        <option value="FARM_USE">Farm Use</option>
                        </select>
                    </span>
                </li>
                                    
                <li class="odd">
                    <label for="car-mileage-select">Annual Mileage</label>
                    <span>
                        <select id="car-mileage-select" name="car-mileage-select" class="small required">
                            <option value="7500">5,001 to 7,500</option>
                            <option value="10000">7,501 to 10000</option>
                            <option value="12500" selected="selected">10,001 to 12,500</option>
                            <option value="15000">12,501 to 15,000</option>
                            <option value="20000">15,001 to 20,000</option>
                            <option value="25000">20,001 to 25,000</option>
                            <option value="30000">25,001 to 30,000</option>
                            <option value="40000">30,001 to 40,000</option>
                            <option value="50000">More than 40,000</option>
                            <option value="15000">I don't know</option>
                        </select>
                    </span>
                </li>-->
                                    <li class="hidden salvaged-vehicle-list-item"><label for="car-salvage-select">Is this a salvaged vehicle?</label><span><select name="car-salvage-select"><option value="false" selected="selected">No</option><option value="true">Yes</option></select></span></li>
                    <li class="hidden odd">												
                                                	<label for="first-name-input">First Name</label>
                                                    	<input id="first-name-input" name="first-name-input" class="required" type="text">
                                                 </li>
												   
                                                  <li class="hidden even">	
                                                    <label for="last-name-input">Last Name</label>
                                                    	<input id="last-name-input" name="last-name-input" class="required" type="text">
                                                   </li>
                                               
                                               <li class="odd">	
                                                    <label for="last-name-input">Tell us your Full Name</label>
                                                    	<input id="last-name-input" name="full-name-input" class="required" type="text">
                                                   </li>
<!--                                                <li class="even">
												<label for="gender-select">Gender</label>
                                                <select name="gender-select" class="required">
                                                <option selected="selected" value="-1">---</option><option value="MALE">Male</option><option value="FEMALE">Female</option></select>
												</li>-->
												
<!--                                                                                                <li class="odd">
												<label for="driver-birth-month-select">Date of Birth</label>
                                                <input type='text' class="required datepicker" name="driver-birth-select">
												</li>-->
												
												<li class="hidden">
													<label for="license-date-select">Age First Licensed</label>
													<select name="license-date-select"><option selected="selected" value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option></select>
													</li>
													
													<li class="hidden odd">
													<label for="marital-status-select">Marital Status</label>
													<select name="marital-status-select" class="required"><option selected="selected" value="-1">---</option><option value="SINGLE">Single</option><option value="MARRIED">Married</option><option value="DIVORCED">Divorced</option><option value="SEPARATED">Separated</option><option value="WIDOWED">Widowed</option><option value="DOMESTIC_PARTNER">Domestic Partner</option></select>
													</li>
													
												<!--<li>
													<label for="education-select">Education</label>
													<select name="education-select" class="required"><option value="SOME_OR_NO_HIGH_SCHOOL">Some High School</option><option value="HIGH_SCHOOL_DIPLOMA">High School Diploma</option><option value="SOME_COLLEGE">Some College</option><option value="ASSOCIATES_DEGREE">Associates Degree</option><option selected="selected" value="BACHELORS_DEGREE">Bachelors Degree</option><option value="MASTERS_DEGREE">Masters Degree</option><option value="DOCTORATE_DEGREE">Doctorate Degree</option><option value="OTHER">Other</option></select>
													</li>
													
													<li class="odd">
														<label for="owns-home-select">Home ownership</label>
														<select name="owns-home-select" class="required"><option selected="selected" value="true">Yes</option><option value="false">No</option></select>
													</li>-->
												
												<li>
												<label for="occupation-select">Your Occupation</label>
                                                <select name="occupation-select" class="Occupation"><option value="ADMINISTRATION">Administration</option>
												<option value="CONSTRUCTION_TRADE_LABORER">Construction</option><option value="DISABLED">Disabled</option><option value="DOCTOR_DENTIST">Doctor/Dentist</option><option value="TRUCK_DRIVER">Driver</option><option value="ENGINEER_SCIENTIST">Engineer/Architect</option><option value="FARMER_RANCHER">Farmer/Rancher</option><option value="GOVERNMENT_EMPLOYEE">Government</option><option value="HOMEMAKER">Homemaker</option><option value="LAW_ENFORCEMENT_POLICE_GUARD">Police/Fire</option><option value="LAWYER_JUDGE">Judge/Lawyer</option><option value="MILITARY_OTHER">Military</option><option value="OTHER">Other</option><option value="Professional" selected="selected">Professional</option><option value="RESTAURANT">Restaurant/Food Services</option><option value="RETAIL_SALES">Retail</option><option value="RETIRED">Retired</option><option value="SELF_EMPLOYED_BUSINESS_OWNER">Self Employed</option><option value="STUDENT_NOT_LIVING_W_PARENTS">Student</option><option value="UNEMPLOYED">Unemployed</option></select>
												</li>
												
												<li class="hidden relationship-list-item">
												<label for="relationship-select">Relationship</label><select name="relationship-select"><option selected="selected" value="SELF">Applicant</option><option value="SPOUSE">Spouse</option><option value="PARENT">Parent</option><option value="SIBLING">Sibling</option><option value="CHILD">Child</option><option value="GRANDPARENT">Grandparent</option><option value="GRANDCHILD">Grandchild</option><option value="OTHER">Other</option></select>
												</li>
												
												<li class="hidden gpa-list-item">
												<label for="gpa-select">3.0 GPA or above?</label>
												<select name="gpa-select"><option selected="selected" value="true">Yes</option><option value="false">No</option></select>
												</li>
												
                                                            <li class="hidden odd">
															<label for="license-status-select">License Status</label>
                                                            <select name="license-status-select" class="required"><option selected="selected" value="ACTIVE">Active</option><option value="EXPIRED">Expired</option><option value="FOREIGN">Foreign</option><option value="PERMIT">Permit</option><option value="RESTRICTED">Restricted</option><option value="SUSPENDED">Suspended</option><option value="TEMPORARY">Temporary</option><option value="UNLICENSED">Unlicensed</option></select>
															</li>
															
															<li class="hidden license-status-list-item">
															<label for="suspension-month-select">Suspension Date</label><select class="required-field" name="suspension-month-select"><option selected="selected" value="">Month</option><option value="01">Jan</option><option value="02">Feb</option><option value="03">Mar</option><option value="04">Apr</option><option value="05">May</option><option value="06">Jun</option><option value="07">Jul</option><option value="08">Aug</option><option value="09">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select><select class="required-field" name="suspension-day-select"><option selected="selected" value="">Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select class="required-field" name="suspension-year-select"><option selected="selected" value="">Year</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option></select>
															</li>
															
															<li class="hidden primary-vehicle-list-item">
															<label for="primary-vehicle-select">Primary Vehicle </label><select class="required-field" name="primary-vehicle-select"><option selected="selected" value="-1">---</option></select>
															</li>
															
                                                                                                                        <li class="hidden">
															<label for="incident-select">Any accidents in the past 3 years?</label>
                                                            <select name="incident-select" class="required"><option selected="selected" value="false">No</option><option value="true">Yes</option></select><input value="0" name="accident-count-input" type="hidden">
															</li>
															
															<li class="hidden incident-list-item">
															<label for="license-revoked-select">Has your license been suspended or revoked in the past 5 years</label><select name="license-revoked-select"><option selected="selected" value="false">No</option><option value="true">Yes</option></select>
															</li>
                                                                                                                        <li class="column-container">
                                                           
                                                            <li class="odd">
                                                            	<label for="phone-input">Phone number</label>
                                                                <input name="phone-input" id="phone-input" class="" type="text">
                                                                <label class="invalidphone phoneerror"></label>
                                                            </li>
                                                            <li>
                                                            	<label for="email-input">Valid Email</label>
                                                                <input id="email-input" name="email-input" class="required email" type="text">
                                                            </li>
                                                        </li><li class="column-container">
                                                            <li class="odd"><label for="address-input">Street Address</label>
                    <input name="address-input" id="address-input" class="required" type="text"></li>
                                                        <li>
                                                            <label for="insured-select">State of Residence</label>
                	<select class="span12 required" id="statename" name="zip-input">

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
					<!--<label for="zip-input">Zip Code</label>
                    <input name="zip-input" maxlength="5" id="zip-input" class="required number" type="text">--></li>
                    
                    </ul></li>
                                    
									</ul>
 				<!--<a id="add-vehicle-anchor" href="#">Add Another Vehicle</a>-->
                                <ul class="quote-list requested-coverage-list" style=" display: none;">
 					
                                    
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
																if($bids[$i]==AUTO_INSURANCE){
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
 					<li style=" display: none;">
 						
                                            <label for="insured-select">Have you had insurance in the past 30 days?</label>
                                            <select id="insured-select" name="insured-select" class="required"><option value="true" selected="selected">Yes</option><option value="false">No</option></select></li>
											<li class="current-insurer-list-item-group odd" id="current-insurer-list-item" style=" display: none;">
											<label for="current-insurer-select">Current Insurance Company</label>
                                            <select class="required" name="current-insurer-select" id="current-insurer-select"><!--<option selected="selected" value="-1">---</option><option value="2">AAA</option><option value="12">AIG</option><option value="17">Allied</option><option value="18">Allstate</option><option value="27">American Family</option><option value="144">Farm Bureau</option><option value="146">Farmers</option><option value="166">Geico</option><option value="218">Liberty Mutual</option><option value="232">Mercury</option><option value="268">Nationwide</option><option value="313">Progressive</option><option value="330">Safeco</option><option value="347">State Farm</option><option value="364">Travelers</option><option value="386">USAA</option><option value="0">Not Listed</option>-->
											<option selected="selected" value="-1">---</option><option value="ADIC">ADIC</option><option value="AIICO"> AIICO</option><option value="Anchor">Anchor</option><option value="Consolidated Hallmark"> Consolidated Hallmark</option><option value="Continental Reinsurance">Continental Reinsurance</option><option value="Cornerstone">Cornerstone</option><option value="Custodian And Allied">Custodian & Allied</option><option value="Equity Assurance">Equity Assurance</option><option value="Fin Insurance">Fin Insurance</option><option value="Gold Link">Gold Link</option><option value="Great Nigeria">Great Nigeria</option><option value="Guinea Insurance">Guinea Insurance</option><option value="IGI">IGI</option><option value="LASACO">LASACO</option><option value="Leadway">Leadway</option><option value="Linkage">Linkage</option>
											<option value="Mansard">Mansard</option><option value="Mutual Benefits">Mutual Benefits</option><option value="NEM">NEM</option><option value="NICON">NICON</option><option value="Niger Insurance">Niger Insurance</option><option value="Nigeria Reinsurance">Nigeria Reinsurance</option><option value="Oasis">Oasis</option><option value="Oceanic">Oceanic</option><option value="Prestige">Prestige</option><option value="Regency Alliance">Regency Alliance</option><option value="Royal Exchange">Royal Exchange</option><option value="Sovereign Trust">Sovereign Trust</option><option value="STACO">STACO</option><option value="Standard Alliance">Standard Alliance</option><option value="Sterling Assurance">Sterling Assurance</option><option value="Union Assurance">Union Assurance</option><option value="Unity Kapital">Unity Kapital</option>
											<option value="Universal">Universal</option><option value="WAPIC">WAPIC</option><option value="Zenith">Zenith</option>
											<option value="Not Listed">Not Listed</option>
											</select></li>
											<li class="hidden current-insurance-name-list-item current-insurer-list-item-group" style=" display: none;"><label for="current-coverage-other-input">Enter Insurance Company</label><input class="required-field acInput" id="current-coverage-other-input" name="current-coverage-other-input" type="text"></li>
											
							<li class="hidden current-insurance-list-item current-insurer-list-item-group" style=" display: none;"><label for="months-with-company-select">Years with this Company</label><select name="months-with-company-select" id="months-with-company-select"><option value="6">Less than 1</option><option value="12">1</option><option selected="selected" value="24">2</option><option value="36">3</option><option value="48">4</option><option value="60">5</option><option value="72">6</option><option value="84">7</option><option value="96">8</option><option value="108">9</option><option value="120">10</option><option value="132">More than 10</option></select></li>
							
							<li class="hidden current-insurance-lapse-list-item current-insurer-list-item-group" style=" display: none;"><label for="coverage-lapse-select">Have you had a lapse in coverage in the previous 24 months?</label><select name="coverage-lapse-select"><option selected="selected" value="false">No</option><option value="true">Yes</option></select></li>
							<li class="hidden current-insurance-list-item current-insurer-list-item-group" style=" display: none;"><label for="expiration-month-select">
                                                Date Current Policy Expires <span class="green">(Estimate OK)</span></label><select id="expiration-month-select" name="expiration-month-select"><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option selected="selected" value="11">Nov</option><option value="12">Dec</option></select><select id="expiration-day-select" name="expiration-day-select"><option selected="selected" value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select id="expiration-year-select" name="expiration-year-select"><option selected="selected" value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option></select></li></ul>
												
                                
                                
<!--												<ul class="quote-list requested-coverage-list">
												
													
												</ul>-->
															
															
															<!--<a id="add-driver-anchor" href="#">Add Another Driver</a>-->
<!--                                                                                                                        <ul class="quote-list misc-details-list">
                                                                                                                            </ul>-->
 </li></ul>
 
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
         }
         ?>
    </tr>
              </table>
     
                   <?php } ?>
 </div>
 
 <div style="clear: both; overflow: auto;" class="submit-container">
<div style="clear: both; overflow: auto; width:560px;" class="submit-container">
					<div style="text-align: left; float: left; width: 47%; padding: 0 15px 30px 6px; font-size: 9px;line-height: 10px;text-align: justify;" class="tcpa"><p></p><p style="font-size: 10px;line-height: 10px;color: #aaa;">By clicking the button to the right, I agree to receive marketing via automatic telephone dialing system or by artificial/pre-recorded message, or by text message from one or more insurance companies or their agents, this website, and partner companies at the telephone number I have provided. I understand that my consent is not required as a condition of purchasing any goods or services. </p>
<!--<p style="font-size: 10px;line-height: 10px;color: #aaa;margin-top:5px;">By clicking the button to the right, I authorize these insurance companies or their agents to confirm my information through the use of a consumer report, which may include my credit score and driving record.</p>-->
<p></p></div>
					<!--<div class="hidden" id="loading-image"><img src="images/circle-loader.gif"><p>Saving you money!</p></div>-->

<input type="submit" value="" id="submit-anchor" ></a></div>
               
</div>
<!--        <div class="block">
            <img  src="<?=base_url();?>/assets/forms/images/standard.png"/>
            <img src="<?=base_url();?>/assets/forms/images/oasis.png"/>
            <img src="<?=base_url();?>/assets/forms/images/aiico.png"/>
        </div>-->
        
        <div class="block">
           
           
            
            <input value="536ED3B4-42B4-0AC3-73C7-EAA8372B99C8" name="universal_leadid" id="leadid_token" type="hidden">
        </div>
</div></form></div>
<div style="clear:both;">
</div>
</div></div>
            <div class="landing-header" style="overflow-y: hidden;"><center><h1 style="  height: 58px !important; margin: 18px 0 0 20px;  width: 350px;font-size: 18px; font-weight: bold; color: #005CB3;">Powered by <a href="<?=base_url()?>" target="_blank"><img src="<?=base_url().'assets/user/design/images/keyverticals.PNG';?>" style="height: 42px;"/></a></h1></center>
        
<ul class="headlines"><li class="quality"><img alt="Quality Check" src="<?=base_url()?>assets/forms/images/quality-small.png"></li><li><span class="landing-headline"></span></li></ul></div>
</div>
<div id="footer" style="display:none;">
<div id="footer-content">
	<ul>
		<li class="first"><a href="#" target="_blank">Terms of Use</a></li>
		<li class="last"><a href="#" target="_blank">Privacy Notice</a></li>
	</ul>
	
	<div class="disclaimers">
	<p>By
 clicking "Get Quotes Now" and seeking a quote request I authorize and 
agree several insurance companies or their agents and partner companies 
may contact me using this information or to obtain additional 
information needed to provide quotes where permitted by law. I 
acknowledge that I have read and understand all of the Terms and 
Conditions of this website and agree to be bound by them.</p>
</div>
<p>
						Copyright ©
						2013
</p></div></div>
						
	<script type="text/javascript"> 
	var site_url = "<?=base_url()?>";
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
        <script type="text/javascript" src="<?=base_url()?>assets/forms/js/myform.js"></script>
<!--        <div id="loading">
          <img id="loading-image" src="<?=base_url()?>assets/forms/images/loading.gif" alt="Loading..." />
        </div>-->
    </body>
</html>