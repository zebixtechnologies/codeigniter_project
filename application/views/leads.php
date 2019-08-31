<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<title>Banner</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="author" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style type="text/css">
body {
	margin:0;
	padding:0;
	font-family:Arial, sans-serif;
	outline:none;
	line-height: 20px;
}
iframe {border:none; max-width:1000px}
a {text-decoration:none; color:#222}
a:hover { color:#259}
*{outline:none;}

.wrapper {
	max-width:1000px;
	width:100%;
	margin:0 auto;
}


.wrapper .banner_box{
	padding:0px;
	list-style:none;
	margin:0px;
}
h2 {
text-align:center;
font-size:20px;
}
.wrapper .banner_box li {
	display:block;
	border:1px solid #666;
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	-ms-border-radius:10px;
	-o-border-radius:10px;
	border-radius:10px;
	margin:10px 0px;
	background: #fff;
	padding:10px;
}
.wrapper .banner_box img{
	display:block;
	width:100%;
	max-width:1000px;
	max-height:120px;
}
.wrapper .banner_box li .details {
	float:left;
	margin: 0 2%;
    width: 68%;
}
.wrapper .banner_box li .details h3 {
	margin:0 0 10px;
	color:#259;
}
.wrapper .banner_box li .details p { font-size:14px;  margin: 0 0 10px;}
.wrapper .banner_box li .logo {
	float:left;
	padding:5px;
	width: 13%;
}
.wrapper .banner_box li .logo img {
	max-width: 100px;
	max-height: 120px;
}
.wrapper .banner_box li .getQ {
	float:left;
	width: 13%;
	padding-top: 10px;
}
.wrapper .banner_box li .getQ img{
	max-width:119px;
}
.clearfix:before, .clearfix:after {
	content: "\0020";
	display: block;
	height: 0;
	overflow: hidden;
}
.clearfix:after {
	clear: both;
}
.pad5 {padding:5px}
	</style>
</head>

    <body >
	
	<div class="wrapper">
		<h2> Providers</h2>
		<ul class="banner_box">
			<?php
			if(!empty($ads)){
			foreach ($ads as $ad) {
				if($ad['adType']==1){
				?>
				<li>
				<div class="clearfix pad5">
					<a target="_blank" " href="<?php  echo base_url().'home/formview/';?><?= $ad['adId'] ;?>/<?=  $publisher ;?>/<?=$ad['adStatusId'];?>/<?=$ad['created'];?>/<?=$ad['userId'];?> ">
					<div class="logo"><img src="<?php  echo base_url().$ad['adIcon_display']?>" alt="" /></div>
					<div class="details">
						<h3><?=$ad['adTitle_display'];?></h3>
						<p><?=substr($ad['adDiscription_display'],0,75);?></p>
					</div>
					
					<div class="getQ"><img src="<?php  echo base_url()?>assets/admin_property/assets/images/getQuote.png" alt="" /></div>
					</a>
				</div>
			</li>
			
			
				<?
				}else{	
		?>
				<li><a target="_blank" " href="<?php  echo base_url().'home/formview/';?><?= $ad['adId'] ;?>/<?=  $publisher ;?>/<?=$ad['adStatusId'];?>/<?=$ad['created'];?>/<?=$ad['userId'];?> "><img src="<?php  echo base_url().$ad['bannerImage']; ?>" alt="loading.." /></a></li>
	
			<?}}}else{?>
			<li style="padding-left: 40%">No relevant result found</li> <?}?>
			
		</ul>
	</div>
	
	</body>
	
	<html>

