<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?=SITE_NAME;?>| Welcome To Admin</title>
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>bootstrap/css/bootstrap.min.css" media="all">
<!-- Main Layout Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>assets/css/fonts/icomoon/style.css" media="screen">
<link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>assets/css/mooncake.min.css" media="screen">
<link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>assets/css/customizer.css" media="screen">
<link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>assets/css/demo.css" media="screen">
<link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>assets/css/plugins/plugins.min.css" media="screen">
<link rel="stylesheet" href="<?php echo base_url().'assets/admin_property/';?>assets/css/login.min.css" media="screen">
    <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Core Scripts -->
<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script>

</head>
<body>
    
        <div id="login-wrap">
            <div id="login-ribbon">
                <i class="icon-lock"></i>
            </div>
            <div id="login-buttons">
                <div class="btn-wrap">
                    <button type="button" class="btn btn-inverse disabled" data-target="#login-form"><i class="icon-key"></i></button>
                </div>

                <div class="btn-wrap">
                    <button type="button" class="btn btn-inverse" data-target="#forget-form"><i class="icon-question-sign"></i></button>
                </div>

            </div>
            <div id="login-inner" class="login-inset">
                <div id="login-circle" class="">
                    <section id="login-form" class="login-inner-form active" data-angle="0">
<form method="post" action='<?php echo base_url();?>admin/login/process' enctype="multipart/form-data" name="form1" id="form1" >                      
					  <h1>Login</h1>
                       <span class="span3 text-error"><?if(isset($msg))echo $msg;?></span>
                       <div class="form-vertical">
                        <div class="control-group-merged">
                         <div class="control-group">
                           <input name="username" type="text" id="txtUserName" class="big required" placeholder="Username">
                           
                       </div>
                       <div class="control-group">
                        <input name="password" type="password" id="txtPassword" class="big required" placeholder="Password">

                    </div>
                </div>
                <div class="form-actions">
                   <input type="submit" name="btnLogin" value="Login" id="btnLogin" class="btn btn-success btn-block btn-large">
                   <div id="trSession" runat="server" visible="true">

                   </div>
               </div>
           </div>
       </form>			
   </section>
       <section id="forget-form" class="login-inner-form form-sectoin" data-angle="180">
   <form method="post" action='<?php echo base_url();?>admin/login/forgetpassword' enctype="multipart/form-data" name="form1" id="form1" >
           <h1>Reset Password</h1>
           <div class="form-vertical">
              <div class="control-group">
                 <div class="controls">
                     <span class="span3" id="forgetMsg"></span>   
                    <input type="text" name="email" id="forgetEmail" class="big required email" placeholder="Enter Your Email...">
                </div>
            </div>
            <div class="form-actions">
             <button type="button" class="btn btn-danger btn-block btn-large" id="forgetPassword">Send Password</button>
         </div>
     </div>
</form>           
 </section>
</div>
</div>
</div>

<script src="<?php echo base_url().'assets/admin_property/';?>assets/js/libs/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url().'assets/admin_property/';?>assets/js/libs/jquery.placeholder.min.js"></script>
<!-- Login Script -->
<script src="<?php echo base_url().'assets/admin_property/';?>assets/js/login.js"></script>
<!-- Validation -->
<script src="<?php echo base_url().'assets/admin_property/';?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url().'assets/admin_property/';?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script>

$(document).ready(function(){
    $('#forgetPassword').click(function(){
		var btnval=$(this).text();
			$(this).text('Cheking Mail');
			$('#forgetMsg').text('');
        var url  = $(this).closest('form').attr('action');
        var email = $('#forgetEmail').val();
        var data  = 'email='+email;
         $.ajax({
                    url: url,   
                    type: "GET",
                    data: data,     
                    cache: false,
                    success: function(html){
                       if(html==2){
					    $('#forgetMsg').html('<b class="text-error"> Email Address Not Found..!!</b>');
						 $('#forgetPassword').text(btnval)
					   }else{
					   		 $('#forgetPassword').text('Mail Sent')
					   }
                       
					   
                    }
                });
     })
})
</script>
</body>
</html>
