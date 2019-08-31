<style>
body {
background: rgba(35, 107, 141, 0.87);
}
.container {
margin: 0 auto 0px auto;
overflow: auto;
width: 800px;
background:#fff;
box-shadow: 0px 1px 9px #fff;
border-radius:5px;
min-height:650px;
}	
h2{
margin:0px;
padding:0px;
text-align:center;
color:#4F81BD;
font-family:arial;
font-size: 15pt;
line-height: 31px;
}
.header{
border-bottom: 4px solid #232842;
}
.header h1 {
background: url(http://www.keyverticals.com/assets/user/design/images/logo.png) no-repeat;
height: 81px !important;
margin: 18px 0 0 20px;
width: 350px;
}
.row{
padding:15px;
}
.content{
text-align:Center;
margin:0px 0px;
padding:3em;
}
.thanks{
margin:3em 0px 0px;
padding:10px;
}
.red{
    color:red;
}
.marginb20{
    margin-bottom: 3em;
}
.margint20{
    margin-top:20px;
}
.thanks {
 text-align: center;  
 margin: 3em 0px 0px;   
}
.thanks p span{
    text-decoration: underline;
font-size: 26px;
color: red;
}
.thanks span{
    color: #232842;
font-size: 23px;
font-weight: bold;
}
.thanks p{
    font-size: 26px;
    font-weight: bold;
    
    margin-top: 12px;
}
.thanks .thanks-heading{
    font-family: inherit;
    font-size: 30px;
}
</style>
<div class="container dotted-back">
<!--<div class="header">
<h1></h1>
</div>-->
<?php $advertiserName=$this -> security -> xss_clean($this -> input -> post('advertiserName'));?> 
  <div class="row clearfix">
    <div class="twelvecol">   
        <div style=" text-align: center;"><img src="<?=base_url().'assets/admin_property/assets/images/logo.png';?>" width="150px;"></div>
        <div class="thanks">
           <h2 class="thanks-heading">Auto Reminder Setup</h2>
           <h2 class="thanks-heading" style="margin-top:15px;">was Successful!</h2>
         </div>
        <div class="content">
            <img src="<?=base_url().'assets/user/design/';?>images/thankYou.png"  alt="" />
        </div>   
    </div>
	</div>

</div>
