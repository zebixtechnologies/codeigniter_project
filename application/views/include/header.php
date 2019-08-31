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

        <link rel="icon"  type="image/png"  href="<?= base_url() ?>assets/admin_property/assets/images/favicon.png">
         <title>Key Verticals | Insurance Leads Marketplace</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="author" content="<?= (isset($meta_name)) ? 'KeyVerticals | ' . $meta_name : 'Key Verticals | Insurance Leads Marketplace'; ?>" />
        <meta name="description" content="Free Quote for car insurance, health insurance, home insurance, life insurance, business insurance and travel insurance. Call Now: 08055970045, 01-4540940 or simply visit us www.keyverticals.com." />
        <meta name="keywords" content="auto insurance, car insurance, health insurance, insurance leads, home insurance, life insurance, business insurance, travel insurance, marketing, key verticals, online business, marketing strategy, network marketing, affiliate marketing, online marketing, digital marketing, internet business, keyverticals, affiliate programs, affiliate, making money on the internet, insurance" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="<?php echo base_url() . 'assets/user/design/'; ?>css/reset.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url() . 'assets/user/design/'; ?>css/1140.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url() . 'assets/user/design/'; ?>css/all.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url() . 'assets/user/design/'; ?>css/jquery.bxslider.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url() . 'assets/user/design/'; ?>css/check_radio.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin_property/assets/'; ?>css/jquery.msgbox.css" media="screen">
        <!--[if lt IE 9]>
                 <script src="jscript/html5shiv.js"></script>
        <![endif]-->
        <script src="<?php echo base_url() . 'assets/user/design/'; ?>jscript/jquery.min.js"></script>

        <script src="<?php echo base_url() . 'assets/user/design/'; ?>jscript/modernizr.js"></script>

        <!--[if (gte IE 6)&(lte IE 8)]>
                    <script type="text/javascript" src="<?php echo base_url() . 'assets/user/design/'; ?>jscript/selectivizr.js"></script>
            <![endif]-->
        <?php if ($this->uri->segment(1) == 'autoreminder') { ?>
            <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
            <link rel="stylesheet" type='text/css' href="<?= base_url() ?>assets/forms/css/auto_reminder_form.css">
            <link rel="stylesheet" type='text/css' href="<?= base_url() ?>assets/forms/css/auto_reminder.css">
            <link rel="stylesheet" type='text/css' href="<?= base_url() ?>assets/forms/css/auto-quote-form.css">
            <script type="text/javascript" src="<?= base_url() ?>assets/forms/js/jquery.js" /></script>
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/user/design/jscript/custom.js" /></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin_property/assets/js/jquery.validate.min.js"></script>
   
<?php } ?>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8703398-10']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body class="homeindex" >
    <div id="container">
        <div id="bodycontent">
            <div class="topheader">
                <div class="row"> 
                    <a href="<?= base_url() . 'home/faq' ?>" name="top">FAQ</a>
                    <a href="<?= base_url() ?>home/contactus" name="top">Contact Us</a>
                    <?php
                    if (isset($user['user_name']) && $user['user_name'] != '') {
                        ?>
                        <a href="<?= base_url() . 'home/logout'; ?>">Logout</a>
                        <span href="#"><?= ucfirst($user['user_name']); ?></span>
                        <a href="<?= ($user['user_type'] == 1) ? base_url() . 'advertiser' : base_url() . 'publisher' ?>">Dashboard</a>
                    <?php } else {
                        ?>
                        <a href="<?= base_url() . 'sign_up'; ?>">Sign up</a>
                        <div id="logindropdowncontainer">
                            <div id="logindropdown">
                                <div class="login_error  alert-error"></div>

                                <form name="" id="" action="<?= base_url() . 'home/userlogin/'; ?>" onsubmit="return false" >
                                    <input type="text" name="username" id="header_username" placeholder="username" value="<?= base64_decode($this->input->cookie('username', TRUE)); ?>"/>
                                    <input type="password" name="password" id="header_password" placeholder="password" value="<?= base64_decode($this->input->cookie('password', TRUE)); ?>"/>
                                    <div id="remember-me-container">
                                        <ul class="options gf-checkbox">
                                            <li>
                                                <input type="checkbox" name="remember" id="remember" value="1" <?= (base64_decode($this->input->cookie('username', TRUE)) != '') ? 'checked' : ''; ?>/>
                                                <label for="remember">Remember me</label>
                                            </li>
                                        </ul>

                                        <p id="remember-me-info">Do not tick if using a public or shared computer.</p>
                                    </div>
                                    <div class="loginfooter"> <a class="forgotpassword" href="javascript:">Forgot Password?</a>
                                        <input type="submit" id="expressLogin" class="no-underline btn" value="Login">
                                    </div>
                                </form>
                                <div style="clear:both;"></div>

                            </div>

                        </div>

                        <div id="forgotPassword">
                            <div id="forgotdropdown">
                                <div class="login_error  alert-error"></div>

                                <form name="forget_password" id="forget_password" action="<?= base_url() . 'home/forgotPass'; ?>" onsubmit="return false;" >
                                    <input type="email" name="useremail" id="header_username" placeholder="Enter Your Email Address" value=""/>
                                    <div class="loginfooter">
                                        <input type="submit" id="resetPass" class="no-underline btn" value="Send Password">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <a href="javascript:" id="loginlink">Login</a> 
                        <?}?>
                    </div>
                </div>
                <div class="container">
                    <div class="navheader row">
                        <nav>
                            <ul >
                                <li> <a href="<?= base_url() ?>" class="icon"><img src="<?= base_url() . 'assets/user/design/images/keyverticals.PNG'; ?>" alt="key verticals" /></a> </li>
                                <li class="dropMenu"> <a href="#" id="pull" title="Menu">Menu</a></li>
                                <li class="nav_right hoverable aboutus"> <a href="<?= base_url() . 'home/ourcompany' ?>"> <span class="main">ABOUT US</span>
                                        <hr />
                                        <span class="sub">Who we are</span> </a>
                                    <?/*	 <ul class="sub">
                                    <li>
                                    <div></div>
                                    <a href="<?= base_url() . 'home/ourcompany' ?>">Our Company</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="<?= base_url() . 'home/verticalworks' ?>">How KeyVerticals Works</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="<?= base_url() . 'home/oureporting' ?>">Our Reporting Platform</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="<?= base_url() . 'home/datareporting' ?>">Data Reporting</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="<?= base_url() . 'home/highfocused' ?>">Highly Focused Source</a> </li> 
                                    </ul> */ ?>
                                    <div class="arrow"></div>
                                </li>
    <!--                        <li class="nav_right hoverable resources"> <a href="<?= base_url() . 'home/faq' ?>"> <span class="main">FAQ</span>
                                <hr />
                                <span class="sub">Need to know more?</span> </a>-->
                                <?/*   <ul class="sub">
                                <li>
                                <div></div>
                                <a href="#">Getting started</a> </li>
                                <li>
                                <div></div>
                                <a href="#">Why choose add site?</a> </li>
                                <li>
                                <div></div>
                                <a href="#">Our Merchant Program</a> </li>
                                <li>
                                <div></div>
                                <a href="#">Testimonials</a> </li>
                                <li>
                                <div></div>
                                <a href="#" target="_blank">Support</a> </li>
                                </ul> */ ?>
                                <!--                                <div class="arrow"></div>
                                                            </li>-->
                                <li class="nav_right hoverable publisher "> <a href="<?= base_url() . 'home/publishers'; ?>"> <span class="main">AFFILIATES</span>
                                        <hr />
                                        <span class="sub">Is it for you?</span> </a>
                                    <? /*     <ul class="sub">
                                    <li>
                                    <div></div>
                                    <a href="#">Who can use us?</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="#">Blogs &amp; Editorial</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="#">Forums &amp; Communities</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="#">News sites</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="#">Content Networks</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="#">Publisher Platforms</a> </li>
                                    </ul> */ ?>
                                    <div class="arrow"></div>
                                </li>
                                <li class="nav_right hoverable advertiser"> <a href="<?= base_url() . 'home/advertisers'; ?>"> <span class="main">ADVERTISERS</span>
                                        <hr />
                                        <span class="sub">What we do</span> </a>
                                    <?/*     <ul class="sub">
                                    <li>
                                    <div></div>
                                    <a href="#">Product Overview</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="#">add site</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="#">SkimWords</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="#">Showcases</a> </li>
                                    <li>
                                    <div></div>
                                    <a href="#">Our APIs</a> </li>
                                    </ul> */?>
                                    <div class="arrow"></div>
                                </li>
                                <li class="nav_right hoverable getinsured"> <a href="<?= base_url() . 'home/getInsured'; ?>"> <span class="main">GET INSURED</span>
                                        <hr />
                                        <span class="sub">Get a free quote</span> </a>
                                    <div class="arrow"></div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div style="clear: both;"></div>
                <input type="hidden" name="base_url" id="base_url" value="<?= base_url() ?>">
