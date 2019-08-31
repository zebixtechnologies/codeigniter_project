<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url().'assets/user/design/css/style.css';?>" media="screen">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/forms/css/HometownQuotes.css">
        <script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery.js" /></script>
<!--     <script type="text/javascript">
            $(document).ready(function(){
                $(".block a").live('click',function(e){      
                if(e.which===1||e.which===2){
                         var HyperLinkUrl=$(this).parents(".block").find("a").attr("Href");
                        if(HyperLinkUrl!="#")
                            window.open(HyperLinkUrl);
                        $(this).parents(".block").find("a").attr("Href","#");
                        $(this).parents(".block").find("a").attr("Target","");
                    }
                });
            });
        </script>-->
        <style>
            .headingbottom{
                text-align: center;
            }
            .headingbottom p{
                    background: #fffad2;
                    background: -moz-linear-gradient(top, #fffad2 0%, #ffee79 100%);
                    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fffad2), color-stop(100%,#ffee79));
                    background: -webkit-linear-gradient(top, #fffad2 0%,#ffee79 100%);
                    background: -o-linear-gradient(top, #fffad2 0%,#ffee79 100%);
                    background: -ms-linear-gradient(top, #fffad2 0%,#ffee79 100%);
                    background: linear-gradient(to bottom, #fffad2 0%,#ffee79 100%);
                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fffad2', endColorstr='#ffee79',GradientType=0 );
                    display: inline-block;
                    padding: 6px;
                    border: 1px solid #EAE7CD;
                    font-size: 13px;
                    font-family: verdana;
                    font-weight: bold;
            }
            .green{
                color: green;
                text-transform: capitalize;
            }
        </style>
        
</head>
<body>
    <div class="content">
       
        <div class="page-heading">
            <?php if($categoryid==AUTO_INSURANCE){?>
                <h1>Your Online <span class="green">Auto Insurance</span> search in <span class="green"><?php echo $state;?></span><br>
                    Returned the following pre-qualified companies.
                </h1>
                
               <?php }?>
                <?php if($categoryid==Health_insurance){?>
                <h1>Your Online <span class="green">Health Insurance </span> search in <span class="green"><?php echo $state;?></span><br>
                Returned the following pre-qualified companies.</h1>
                
               <?php }?> 
                <?php if($categoryid==LIFE_INSURANCE){?>
                <h1>Your Online <span class="green">Life Insurance </span> search in <span class="green"><?php echo $state;?></span><br>
                Returned the following pre-qualified companies.
                </h1>
              
               <?php }?> 
                <?php if($categoryid==HOME_INSURANCE){?>
                 <h1>Your Online <span class="green">Home Insurance </span> search in <span class="green"><?php echo $state;?></span><br>
                 Returned the following pre-qualified companies.</h1>
                
               <?php }?> 
                <?php if($categoryid==BUSINESS_INSURANCE){?>
                <h1>Your Online <span class="green">Business Insurance </span> search in <span class="green"><?php echo $state;?></span><br>
                Returned the following pre-qualified companies.</h1>
                 
               <?php }?> 
                <?php if($categoryid==TRAVEL_INSURANCE){?>
                <h1>Your Online <span class="green">Travel Insurance </span> search in <span class="green"><?php echo $state;?></span><br>
                 Returned the following pre-qualified companies.</h1>
                 
               <?php }?> 
            </div>
        <div class="headingbottom">
            <p>You Should Compare At Least 2 Rate Quotes Before Choosing</p>
        </div>
                <?php 
                $baseurl = $this->config->item("base_url");
                foreach($joinArray as $detail){
//                         print_r($detail);
                    if($categoryid == HOME_INSURANCE){
                        $logo = $detail->logo;
                        if($logo==""){
                          $logo ="no_image.png" ; 
                        }
                        $title = $detail->home_insurance_title;
                        $content =  $detail->home_insurance;
                        
                    }else if ($categoryid == LIFE_INSURANCE){
                        $logo = $detail->logo;
                        if($logo==""){
                          $logo ="no_image.png" ; 
                        }
                        $title = $detail->life_insurance_title;
                        $content =  $detail->life_insurance;
                        
                    }else if ($categoryid == AUTO_INSURANCE){
                        $logo = $detail->logo;
                        if($logo==""){
                          $logo ="no_image.png" ; 
                        }
                        $title = $detail->auto_insurance_title;
                        $content =$detail->auto_insurance;
                        
                    }else if ($categoryid == Health_insurance){
                    //print_r($detail->activecategory);
                        $logo = $detail->logo;
                        if($logo==""){
                          $logo ="no_image.png" ; 
                        }
                        $title = $detail->health_insurance_title;
                        $content = $detail->health_insurance;
                        
                    }else if ($categoryid == BUSINESS_INSURANCE){
                        $logo = $detail->logo;
                        if($logo==""){
                          $logo ="no_image.png" ; 
                        }
                        $title = $detail->business_insurance_title;
                        $content = $detail->business_insurance;
                       
                    }else if ($categoryid == TRAVEL_INSURANCE){
                        $logo = $detail->logo;
                        if($logo==""){
                          $logo ="no_image.png" ; 
                        }
                        $title = $detail->travel_insurance_title;
                        $content = $detail->travel_insurance;
                       
                    }
                    $current_url = $_SERVER['HTTP_REFERER'];
                    
                    echo <<<EOT
                    
                        <div class="block clearfix">
                    <a href="{$current_url}&userid=$detail->userId" target="_blank" class="decoration">
                            <div class="imgblock pull-left">
                                <img src="{$baseurl}assets/uploads/advertiser/icon/{$logo}" alt="" />   
                            </div>
                            
                            <div class="midblock pull-left">   
                                    <h2>$title</h2>
                                    <p><span style="font-family: Arial, Helvetica, 'Bitstream Vera Sans', sans-serif; font-size: 13px; letter-spacing: 0.7799999713897705px; line-height: 15.996000289916992px; text-align: justify;">
                                        $content
                                    </span></p>
                            </div>
                            <div class="righblock pull-right">
                              <div class="btn">
                                   <a href="{$current_url}&userid=$detail->userId" target="_blank">GET QUOTE</a>
                               </div>

                            </div>
                             </a>              
                        </div>
                                           
EOT;
                }
            ?>   
            
       
        
    </div>
     <div class="landing-header" style="overflow-y: hidden;"><center><h1 style="  height: 58px !important; margin: 18px 0 0 20px;  width: 350px;font-size: 18px; font-weight: bold; color: #005CB3;"><span style="vertical-align: top; margin-top: 10px; display: inline-block;">Listings By </span> <a href="<?=base_url()?>" target="_blank"><img class="footer_logo" src="<?=base_url().'assets/forms/images/keyverticalsNew.png';?>" style="height: 42px;"/></a></h1></center>
        
</div>  
</body>
</html>