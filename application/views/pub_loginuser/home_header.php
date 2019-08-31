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
											window.location.href="<?=base_url().'home/logout';?>";
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
            <div class="brand-img"> <a class="brand" href="<?php echo base_url();?>publisher"> <img src="<?php echo base_url().'assets/admin_property/assets/';?>images/logo.png" alt="" style="width: 180px; "> </a> </div>
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
                 <li><a href="<?php echo base_url();?>pub_loginuser/dashboard/profileinfo"><i class="icol-user"></i> My Profile</a></li>
                <? /* <li><a href="#"><i class="icol-layout"></i> My Invoices</a></li>   */ ?>
                 <li class="divider"></li>
                 <li><a href="<?php echo base_url().'home/logout';?>"><i class="icol-key"></i> Logout</a></li>
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
              <li id="li1"> <a href="<?php echo base_url();?>publisher"><span title="Dashboard"> <i class="icon-home"></i> <span class="nav-title">Home</span> </span> </a></li>
             <li id="li2"><span title="system"> <i class="icon-table"></i> <span class="nav-title">Reports</span> </span>
               
              <ul class="inner-nav">
                 
              <li id="li2-1"><a href="<?php echo base_url();?>pub_loginuser/dashboard/report"><i class="icol-hammer-screwdriver"></i>Leads Report
               </a>
              </li>
               
                   <li id="li2-2"> <a href="<?php echo base_url();?>pub_loginuser/dashboard/leadsviews"> <i class="icol-hammer-screwdriver"></i>Total Form Views
               </a>
              </li>
                
                </ul>
              </li>
              
             
              <li id="li3"> <a href="<?php echo base_url();?>pub_loginuser/dashboard/installation"><span title="Advertise Activity"> <i class="icon-graph"></i> <span class="nav-title">Installation</span> </span> </a></li>
            <!--  <li id="li5"> <a href="<?php echo base_url();?>pub_loginuser/dashboard/category"><span title="Advertise Activity"> <i class="icon-graph"></i> <span class="nav-title">Categories</span> </span> </a></li> -->
            <li id="li4">    <a href="<?php echo base_url();?>pub_loginuser/subpublisher/"> <span title="Manage Site"> <i class="icon-list"></i> <span class="nav-title">Sub Publishers</span> </span></a> </li>
            <li id="li5">    <a href="<?php echo base_url();?>pub_loginuser/dashboard/paymentdetails"> <span title="Manage Site"> <i class="icon-list"></i> <span class="nav-title">Payment Details</span> </span></a> </li>
            
           <!--   <li id="li5"> <span title="CMS Page Management"> <i class="icon-html5"></i> <span class="nav-title">Static Block</span> </span></li>
              <li id="li6"> <span title="User Management"> <i class="icon-users"></i> <span class="nav-title">User Management</span> </span> </li>
               <li id="li7"> <span title="Manage Publisher"> <i class="icon-publish"></i> <span class="nav-title">Publisher Activity</span> </span></li>
             -->
            </ul>
          </nav>
        </aside>
        <div id="sidebar-separator"></div>
        <section id="main" class="clearfix">
          <!--<div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>

            </ul>-->
            <!--<h1 id="main-heading"> Welcome to <?=SITE_NAME;?> </h1>-->
			  <!-- <div id="msg">
          <?
            if(isset($msg)){
              echo $msg;
            }
          ?>
        </div>
          </div>-->
       