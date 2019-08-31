<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>
  <title><?=SITE_NAME;?> | Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="icon"  type="image/png"  href="<?=base_url().'assets/admin_property/assets/images/favicon.png'?>">
  <!-- Bootstrap Stylesheet -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>bootstrap/css/bootstrap.min.css" media="all">
  
  <!-- jquery-ui Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>assets/jui/css/jquery-ui.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>jui/jquery-ui.custom.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>jui/timepicker/jquery-ui-timepicker.css" media="screen">

  <!-- Circular Stat -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>custom-plugins/circular-stat/circular-stat.css">
  <!-- Main Layout Stylesheet -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/fonts/icomoon/style.css" media="screen">

  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/mooncake.min1.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/customizer.css" media="screen">

  <!--bx slider for images -->
  
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/smoothDivScroll.css" media="screen">
 <!-- END bx slider for images -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/custom.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/demo.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/chosen.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/plugins/plugins.min.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/jquery.ibutton.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/MyCustom.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/uniform.default.css" media="screen">
 
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/jquery.msgbox.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/jquery.pnotify.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/assets/';?>css/jquery.Jcrop.css" media="screen">
  <!-- PrettyPhoto -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>plugins/prettyphoto/css/prettyPhoto.css" media="screen">
  <!--uplodify csss for multi image uploader-->
   <link href="<?php echo base_url().'assets/admin_property/';?>bootstrap/js/jquery/uploadify_31/uploadify.css" type="text/css" media="screen" rel="stylesheet"/>
<!-- mystyle Stylesheet -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/admin_property/';?>bootstrap/css/mystyle.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/custome_form/';?>css/Dyanmic_forms.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/custome_form/';?>css/custom-mobile-theme.css">

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/libs/jquery-1.8.2.min.js"></script> 
<!-- LAZY LOADING -->
 <script src="<?php echo base_url().'assets/admin_property/';?>assets/js/jquery.lazyload.js" type="text/javascript"></script>

 <style>
 /* css for lazy load*/
.lazy {
  display: none;
}
/* example of lazy load 
<img class="lazy" src="lodind image src" data-original="orignal img src">
*/
</style>

<script>
$(document).ready(function(){
  $('#logOutButtonCon').click(function(){
			
		$.msgbox($(this).attr('msg'), {
         type: "confirm",
         buttons : [
            {type: "submit", value: "Yes"},
            {type: "submit", value: "No"}
          ]
          },function(result) 
                             {
                                if(result == 'Yes'){
											window.location.href="<?=base_url().'admin/login/logout';?>";
                                                  }
                              });
  });
})
</script>
</head>
<body data-show-sidebar-toggle-button="true" data-fixed-sidebar="true">
  <div id="wrapper" class="full">
    <header id="header" class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <div class="brand-wrap pull-left">
            <div class="brand-img"> <a class="brand" href="<?php echo base_url();?>admin/dashboard/"> <img src="<?php echo base_url().'assets/admin_property/assets/';?>images/logo.png" alt="" style="width: 180px; "> </a> </div>
          </div>
          <div id="header-right" class="clearfix">
            <div id="nav-toggle" data-toggle="collapse" data-target="#navigation" class="collapsed"> <i class="icon-caret-down"></i> </div>
            <div id="header-functions" class="pull-right">
             <div id="user-info" class="clearfix">
              <span class="info">
               Welcome
               <span class="name"><?=ucfirst($user['user_name']);?></span>
             </span>
             <div class="avatar">
               <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                 	<?=($user['user_image'] == '') ? '<img src="'.base_url().'assets/admin_property/assets/images/pp.jpg" alt="profile Image" title="profile Image" />':'<img src="'.base_url().$user['user_image'].'" alt="profile Image" title="profile Image" />';?>
               </a>
               <ul class="dropdown-menu pull-right">
                 <li><a href="<?php echo base_url();?>admin/dashboard/profileinfo/"><i class="icol-user"></i> My Profile</a></li>
                <?php /* <li><a href="#"><i class="icol-layout"></i> My Invoices</a></li>   */ ?>
                 <li class="divider"></li>
                 <li><a href="<?php echo base_url().'admin/login/logout';?>"><i class="icol-key"></i> Logout</a></li>
               </ul>
             </div>
           </div>
           <div id="logout-ribbon"> <a id="logOutButtonCon" msg="Are you sure you want to logout ..?" href="javascript:"><i class="icon-off"></i></a> </div>
         </div>
       </div>
     </div>
   </div>
 </header>

 <div id="content-wrap">
   <div class="loadingDiv">
<div class="overlay">
<div class="loading"></div>
</div>
</div>

  
  <div id="content">
    <div id="content-outer">
      <div id="content-inner">
        <aside id="sidebar">
          <nav id="navigation" class="collapse">
            <ul>
              <li id="li1"> <a href="<?php echo base_url();?>admin/dashboard"><span title="Dashboard"> <i class="icon-home"></i> <span class="nav-title">Home</span> </span> </a></li>
             <li id="li2"> <span title="system"> <i class="icon-table"></i> <span class="nav-title">Ad Tracking</span> </span>
              <ul class="inner-nav">
                  <!--<li id="li2-1"><a href="<?=base_url().'admin/adtrack'?>"><i class="icol-style"></i> Ad Status</a></li>-->
                 <li id="li2-2"><a href="<?=base_url().'admin/adtrack/overclick'?>"><i class="icol-hammer-screwdriver"></i>leads Tracking</a></li>
                 <li id="li2-3"><a href="<?=base_url().'admin/adtrack/leadformViews'?>"><i class="icol-hammer-screwdriver"></i>Total Lead Form Views <br><div style="margin-left: 31px;"> by Publisher</div></a></li>
                <li id="li2-4"><a href="<?=base_url().'admin/adtrack/leadscatviews'?>"><i class="icol-hammer-screwdriver"></i>Total Lead Form Views</a></li>
                <li id="li2-5"><a href="<?=base_url().'admin/adtrack/autoreminder'?>"><i class="icol-hammer-screwdriver"></i>Auto Reminder Service</a></li>
                <li id="li2-6"><a href="<?=base_url().'admin/adtrack/exportautoreminder'?>"><i class="icol-hammer-screwdriver"></i>Export Auto Reminder Service</a></li>
               <?php /*    <li id="li2-3"><a href="#"><i class="icol-table"></i> Customer Listing</a></li>
                  <li id="li2-4"><a href="#"><i class="icol-eye"></i> System Setup</a></li>
                  <li id="li2-5"><a href="#"><i class="icol-eye"></i> Default Pricing</a></li>
                  <li id="li2-6"><a href="#"><i class="icol-eye"></i> Service Types</a></li>
                  <li id="li2-7"><a href="#"><i class="icol-eye"></i> Special Pricing</a></li> */ ?>
                </ul>
              </li>
              <li id="li3"> <span title="Advertise Activity"> <i class="icon-graph"></i> <span class="nav-title">Advertiser Activity</span> </span> 
			     <ul class="inner-nav">
                  <li id="li3-1"><a href="<?=base_url().'admin/manage_advertiser'?>"><i class="icol-style"></i>Manage Advertisers</a></li>
                  <li id="li3-2"><a href="<?=base_url().'admin/manage_advertiser/manage_banners'?>"><i class="icol-style"></i>Manage Banners</a></li>
                  <li id="li3-3"><a href="<?=base_url().'admin/manage_advertiser/manage_form_banners'?>"><i class="icol-style"></i>Manage Form Banners</a></li>
                  <!--<li id="li3-2"><a href="<?=base_url().'admin/adv_manage'?>"><i class="icol-hammer-screwdriver"></i> ADs Pending Requests </a></li>-->
                  
              <?php /*    <li id="li3-4"><a href="#"><i class="icol-eye"></i> System Setup</a></li>
                  <li id="li3-5"><a href="#"><i class="icol-eye"></i> Default Pricing</a></li>
                  <li id="li3-6"><a href="#"><i class="icol-eye"></i> Service Types</a></li>
                  <li id="li3-7"><a href="#"><i class="icol-eye"></i> Special Pricing</a></li> */ ?>
                </ul>
			  </li>
            <li id="li4"> <span title="Manage Site"> <i class="icon-list"></i> <span class="nav-title">Manage Site</span> </span>
                <ul class="inner-nav">
                  <li id="li4-1"><a href="<?=base_url().'admin/category_manage'?>"><i class="icol-layout-select"></i> Category Management </a></li>
                  <li id="li4-2"><a href="<?=base_url().'admin/country_manage'?>"><i class="icol-ui-text-field-password"></i> Country Management </a></li>
                  <li id="li4-3"><a href="<?=base_url().'admin/state_manage'?>"><i class="icol-error"></i> State Management</a></li>
                
                  <!--<li id="li4-4"><a href="<?=base_url().'admin/customeform'?>"><i class="icol-wand"></i> Custom Forms</a></li> -->
				 <? /*         <li id="li4-5"><a href="#"><i class="icol-wand"></i> Industry Management</a></li>
                  <li id="li4-6"><a href="#"><i class="icol-accept"></i> Upload Bulk Icons </a></li>
                <li id="li4-7"><a href="#"><i class="icol-ui-tab-content"></i>Pending Reseller Request</a></li>
				
				 <li id="li4-8"><a href="#"><i class="icol-box"></i>Upload Theme Images</a></li>
				 <li id="li4-9"><a href="#"><i class="icol-images"></i>Upload Background</a></li>
				 <li id="li4-10"><a href="#"><i class="icol-ui-tab-content"></i>Current Resellers</a></li> */?>
			   </ul>
              </li>
              <li id="li5"> <span title="CMS Page Management"> <i class="icon-html5"></i> <span class="nav-title">Static Block</span> </span>
                <ul class="inner-nav">
                	
                <li id="li5-7"><a href="<?=base_url().'admin/staticblock/aboutus'?>"><i class="icon-graph"></i><b>About Us</b><i class="icos-arrow-right"></i>Our Company</a></li>
                
                <?php /* <li id="li5-6"><a href="<?=base_url().'admin/staticblock/verticalworks'?>"><i class="icon-graph"></i><b>About Us</b><i class="icos-arrow-right"></i>Vertical Works</a></li>
                 
                <li id="li5-5"><a href="<?=base_url().'admin/staticblock/report'?>"><i class="icon-graph"></i><b>About Us</b><i class="icos-arrow-right"></i>Reporting Platform</a></li>
                <li id="li5-2"><a href="<?=base_url().'admin/staticblock/datareport'?>"><i class="icon-graph"></i><b>About Us</b><i class="icos-arrow-right"></i>Data Reports </a></li>
                <li id="li5-4"><a href="<?=base_url().'admin/staticblock/highlyfocuse'?>"><i class="icon-graph"></i> <b>About Us</b><i class="icos-arrow-right"></i>Highly Focused </a></li> */ ?>
                <li id="li5-1"><a href="<?=base_url().'admin/staticblock/publishers'?>"><i class="icon-graph"></i><b>Publisher</b></a></li>
                <li id="li5-9"><a href="<?=base_url().'admin/staticblock/advertisers'?>"><i class="icon-graph"></i><b>Advertiser</b></a></li>
                <li id="li5-10"><a href="<?=base_url().'admin/staticblock/faq'?>"><i class="icon-graph"></i><b>FAQ</b></a></li>
                <li id="li5-12"><a href="<?=base_url().'admin/staticblock/terms'?>"><i class="icon-graph"></i><b>Terms</b></a></li>
                <li id="li5-13"><a href="<?=base_url().'admin/staticblock/privacy'?>"><i class="icon-graph"></i><b>Privacy & Policy</b></a></li>
                <li id="li5-14"><a href="<?=base_url().'admin/staticblock/careers'?>"><i class="icon-graph"></i><b>Careers</b></a></li>
                
                 
                 
               <?php /*  <li id="li5-10"><a href="<?=base_url().'admin/staticblock/securehosting'?>"><i class="icol-hammer-screwdriver"></i>Secure Hosting</a></li>
                 <li id="li5-11"><a href="<?=base_url().'admin/staticblock/beautifulapps'?>"><i class="icol-layout-select"></i>Beautiful Apps</a></li>
                 <li id="li5-12"><a href="<?=base_url().'admin/staticblock/helpfultraining'?>"><i class="icol-ui-text-field-password"></i>Helpful Training</a></li> */ ?>
                     
                </ul>
              </li>
              <li id="li6"> <span title="User Management"> <i class="icon-users"></i> <span class="nav-title">User Management</span> </span>
               <ul class="inner-nav">
                  <li id="li6-1"><a href="<?=base_url().'admin/signuprequest'?>"><i class="icol-user"></i>User Pending Request</a></li>
                  <li id="li6-2"><a href="<?=base_url().'admin/user_manage'?>"><i class="icol-email"></i>View Users </a></li>
                   <li id="li6-3"><a href="<?=base_url().'admin/user_manage/add_user'?>"><i class="icol-email"></i>Add Advertiser </a></li>
                     <li id="li6-4"><a href="<?=base_url().'admin/user_manage/emailpubs'?>"><i class="icol-email"></i> Email ALL Publishers </a></li>
                  <li id="li6-5"><a href="<?=base_url().'admin/user_manage/emailadvs'?>"><i class="icol-email"></i> Email ALL Advertisers </a></li>
                  <li id="li6-6"><a href="<?=base_url().'admin/user_manage/emailadvpubs'?>"><i class="icol-email"></i>Email ALL Pubs & Adv</a></li>
            <?php /*      <li id="li6-3"><a href="#"><i class="icol-blog"></i> undefined</a></li>
                  <li id="li6-4"><a href="#"><i class="icol-ruby"></i> Customer List</a></li>
                  <li id="li6-5"><a href="#"><i class="icol-images"></i> Driver List</a> </li>
                  <li id="li6-6"><a href="#"><i class="icol-vcard"></i> Live Docket</a></li>
                  <li id="li6-7"><a href="#"><i class="icol-error"></i> KPI Report</a></li>
                  <li id="li6-8"><a href="<?=base_url().'admin/paycontrol'?>"><i class="icol-money-dollar"></i>App Payment Controller</a></li> */?>
                </ul>
              </li>
               <li id="li7"> <span title="Manage Publisher"> <i class="icon-publish"></i> <span class="nav-title">Publisher Activity</span> </span>
               <ul class="inner-nav">
                  <li id="li7-1"><a href="<?=base_url().'admin/manage_publisher'?>"><i class="icol-user"></i>Manage Publisher</a></li>
                  <li id="li7-3"><a href="<?=base_url().'admin/adv_manage/adclicklimit'?>"><i class="icol-table"></i> Admin Commission</a></li>
                  <li id="li7-2"><a href="<?=base_url().'admin/user_manage'?>"><i class="icol-email"></i>View Users </a></li>
                  <li id="li7-4"><a href="<?=base_url().'admin/manage_publisher/thirdparty_restrict'?>"><i class="icol-email"></i>Third Party Restrict</a></li>
                  <li id="li7-5"><a href="<?=base_url().'admin/adv_manage/lead_alert'?>"><i class="icol-table"></i>  Lead Alert</a></li>
            <?php /*      <li id="li6-3"><a href="#"><i class="icol-blog"></i> undefined</a></li>
                  <li id="li6-4"><a href="#"><i class="icol-ruby"></i> Customer List</a></li>
                  <li id="li6-5"><a href="#"><i class="icol-images"></i> Driver List</a> </li>
                  <li id="li6-6"><a href="#"><i class="icol-vcard"></i> Live Docket</a></li>
                  <li id="li6-7"><a href="#"><i class="icol-error"></i> KPI Report</a></li>
                  <li id="li6-8"><a href="<?=base_url().'admin/paycontrol'?>"><i class="icol-money-dollar"></i>App Payment Controller</a></li> */?>
                </ul>
              </li>
              
               <li id="li8"><a href="<?=base_url().'admin/manage_vehicle'?>"> <span title="Manage Publisher"> <i class="icon-publish"></i> <span class="nav-title">Manage Account</span> </span>
			   <li id="li9"> <span title="Manage Vehicle"> <i class="icon-publish"></i> <span class="nav-title">Manage Vehicle</span> </span>
               <ul class="inner-nav">
                  <li id="li9-1"><a href="<?=base_url().'admin/manage_vehicle'?>"><i class="icol-user"></i>Manage Vehicle</a></li>
                  <li id="li9-2"><a href="<?=base_url().'admin/manage_vehicle/add_vehicle'?>"><i class="icol-email"></i>Add Vehicle </a></li>
				  <li id="li9-3"><a href="<?=base_url().'admin/manage_vehicle/duplicate_vehicle'?>"><i class="icol-email"></i>Duplicate Vehicle</a></li>
				</ul>
              </li>
            </ul>
          </nav>
        </aside>
        <div id="sidebar-separator"></div>
        <section id="main" class="clearfix">
          <div id="main-header" class="page-header">
            <ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>

            </ul>
            <h1 id="main-heading"> Welcome to <?=SITE_NAME;?> </h1>
			   <div id="msg">
          <?php
            if(isset($msg)){
              echo $msg;
            }
          ?>
        </div>
          </div>
       