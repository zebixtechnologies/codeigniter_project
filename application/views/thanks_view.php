<style>
body {
background: rgba(35, 107, 141, 0.87);
margin:0px;
}
.container {
        margin: 0 auto 0px auto;
        overflow: auto;
        width: 800px;
        background:#fff;
        box-shadow: 0px 1px 9px #fff;
        border-radius:5px;
        min-height:619px;
    }	
h2{
margin:0px;
padding:0px;
text-align:center;
color:#232842;
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
padding:1em 3em 0em 3em; 
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
 margin: 0em 0px 0px;   
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
font-size: 22px;
font-weight: normal;
margin-top: 12px;
}
.thanks .thanks-heading{
    font-family: inherit;
    font-size: 28px;
}
.generic_rate{
    text-align: center;
        font-size: 16px !important;
    line-height: 22px !important;
        color: #AB2A2A !important;
        font-weight: normal !important;
}
</style>

<style>
    body{
        margin:0px;
    }
    .thanks_quotestable{
        font-family: verdana;
    }
    .thanks_quotestable table{
        width: 100%;
            font-size: 12px;
                border: 1px solid #ddd;
                    border-spacing: 0;
    border-collapse: collapse;
        
    }
    .thanks_quotestable table tr th{
        padding: 8px;
    line-height: 1.42857143;
        border: 1px solid #ddd;
            color: #1f497d;
            text-align: center;
    }
    
    .thanks_quotestable table tr td{
        padding: 8px;
    line-height: 1.42857143;
        border: 1px solid #ddd;
            text-align: center;
    }
    @media (min-width: 768px) and (max-width: 900px) {
        
.container {
	margin: 0;
	width: auto;
	padding:0px 15px;
}
}
 
@media (max-width: 767px) {
.container {
	margin: 0;
	width: auto;
	padding:0px 15px;
}
.thanks .thanks-heading {
font-family: inherit;
font-size: 22px;
line-height: 28px;
}
.thanks p {
font-size: 22px;
}

.thanks span {
font-size: 23px;
line-height: 30px;
display: block;
}
.content {
padding: 0;
}
.thanks_page{
width:100%;
max-width:431px;
}
}
 
@media (max-width: 480px) {
}
</style>
 <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/responsive.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    var height = $(".container").height();
    $("body").height(height);
    $("iframe").height(height);
});
</script>

<?php 
                    $prifix='';
                      $k='';
                      $countInc = 0;
                      if(isset($AdvrtiserArr) && is_array($AdvrtiserArr) && !empty($AdvrtiserArr)){
                          $countofAdvertisers = count($AdvrtiserArr);
                     foreach($AdvrtiserArr as $key => $Advrtiser){
                          $countInc++;
                         if( $countofAdvertisers == $countInc){
                             $prifix = " and ";
                         }
                  // echo $key;
                       $k .= $prifix . $key;
                        $prifix=',';
                   // echo "'".implode(',', array_keys($AdvrtiserArr))."'";
                     }
                  }?>
<div class="container dotted-back thanks_auto">
<!--<div class="header">
<h1></h1>
</div>-->
<?php $advertiserName=$this -> security -> xss_clean($this -> input -> post('advertiserName'));?> 
  <div class="row clearfix">
    <div class="twelvecol">   
        <div style=" text-align: center;"><a href="<?=base_url(); ?>"><img src="<?=base_url().'assets/admin_property/assets/images/logo.png';?>" width="150px;"></a></div>
        <div class="thanks">
              <?php if(!empty($advertiserName)){ ?>
            <h2 class="thanks-heading">Your request for Insurance Quotes has been received.</h2>
            <?php }else{?>
              <h2 class="thanks-heading">Your request for Quotes has been submitted.</h2>   
           <?php }?>
              <p class="red" style="margin-bottom: 0; margin-top: 15px; font-weight: bold;">You will be contacted <span>within minutes!</span></p>
            
              <p class="red" style="margin: 10px 0px; font-family: verdana; line-height: 30px;"><img src="<?=base_url().'assets/user/design/';?>images/arrow-right (2).png" style="vertical-align: bottom; width:30px; margin-right: 10px" >Note: We will Reach Out to You with your Customized and<br/>Discounted Quotes via Phone Call and Email.</p>
              <span class="generic_rate">
                  Below is the generic rate quote for <strong><?php echo isset($category->categoryName) ? $category->categoryName : ""; ?></strong> from <strong><?php echo $k;?></strong> going by the <br> information you provided (we'll let you know if you qualify for extra discounts).
              </span>
              
        </div>
        <?php 
//            if(isset($leadQuotes) && is_object($leadQuotes) && !empty($leadQuotes)){
//                $baseurl = $this->config->item("base_url");
//                $img = "";
//                if(isset($advbanner) && is_object($advbanner) && !empty($advbanner)){
//                    $logo = $advbanner->logo;
//                    if($logo==""){
//                        $logo ="no_image.png" ; 
//                    }
//                    $img = "<img src='{$baseurl}assets/uploads/advertiser/icon/{$logo}' alt='' style=' width: 100%;max-width: 175px;'/>";  
//
//                }else{
//                    $img =  isset($adv_name) ? $adv_name : "";;
//                }
            ?>
            <div class="thanks_quotestable">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 25%;">Insurance Provider</th>
                            <th style="width: 20%;">Premium Rate(%)</th>
                            <th style="width: 15%;">Flat Rate(&#x20a6;)</th>
                            <th>Additional Information</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php 
            $baseurl = $this->config->item("base_url");
        //     echo $baseurl;
            if(isset($AdvrtiserArr) && is_array($AdvrtiserArr) && !empty($AdvrtiserArr)){
            foreach($AdvrtiserArr as $key=> $advrData){
            //  print_r($advrData);
               
                    if(isset($advrData['advbanner']->logo) && !empty($advrData['advbanner']->logo)){
                    $logo = $advrData['advbanner']->logo;
                 //  echo $logo;
                    if($logo==""){
                        $logo ="no_image.png" ; 
                    }
                    $img = "<img src='{$baseurl}assets/uploads/advertiser/icon/{$logo}' alt='' style=' width: 100%;max-width: 175px;'/>";  

                }else{
                    $img =  isset($key) ? $key : "";;
                }
            ?>
                       <tr>
                            <td><?php echo $img; ?></td>
                            <td>
                            <?php 
                            if(isset($advrData['leadQuotes']->percentage) && strlen($advrData['leadQuotes']->percentage) > 0 ){
                                echo $advrData['leadQuotes']->percentage ;?>
                               <?php
                                }else{
                                echo "-";
                            } ?>
                            </td>
                            <td><?php echo isset($advrData['leadQuotes']->flat_rate) && strlen($advrData['leadQuotes']->flat_rate) > 0 ? $advrData['leadQuotes']->flat_rate : "-"; // echo isset($leadQuotes->flat_rate) && strlen($leadQuotes->flat_rate) > 0 ? $leadQuotes->flat_rate : "-"; ?></td>
                             <td><?php
                            
                            if(isset($advrData['leadQuotes']->additional_info) && !empty($advrData['leadQuotes']->additional_info) ){
                             echo $advrData['leadQuotes']->additional_info;?>
                               <?php
                                }else{
                                echo "-";
                            }
//                            echo $advrData['leadQuotes']->additional_info;?></td>
                        </tr>
                        
                          <?php  } 
            }
                    ?>
                     </tbody>
                </table>
            </div>
          
          <div class="content">
              <span style="display:inline-block;margin-bottom:0px !important;line-height: 32px; margin-bottom: 0px;width:50%;box-sizing: border-box;margin: 40px 0px;font-family: verdana;font-weight: normal;font-size: 15px;color:#1f497d;">Helpful Agents are always standing by.<br/> Please Call: 09078595250.</span>
              <img style="float: right;width:43%;max-width: 200px;vertical-align: bottom;margin-right: 10%;box-sizing: border-box;" src="<?=base_url().'assets/user/design/';?>images/thankYou.png"  alt="" class="thanks_page" />
        </div>   
    </div>
	</div>

</div>
<!-- Advertiser 'Emmanuel Ojuor',  Conversion tracking 'image non secure' - DO NOT MODIFY THIS PIXEL IN ANY WAY -->
<img src="http://ads.yahoo.com/pixel?id=2464910&t=2" width="1" height="1" />
<!-- End of conversion tag -->
