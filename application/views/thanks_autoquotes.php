<style>
body {
background: rgba(35, 107, 141, 0.87);
}
 .generic_rate{
    text-align: center;
        font-size: 16px !important;
    line-height: 22px !important;
        color: #AB2A2A !important;
        font-weight: normal !important;
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
text-align:right;
color:#2F83D3;
font-family:arial;
font-size: 15pt;
}
.header{
border-bottom: 4px solid #2F83D3;
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
text-align:right;
margin:10px 0px;
padding:3em;
}
.thanks{
margin: 0em 0px 0px;   
padding:10px;
}

</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    var height = $(".container").height();
    $("body").height(height);
    $("iframe").height(height);
});
</script>
<div class="container dotted-back">
<div class="header">
    <a href="<?=base_url(); ?>"><h1></h1></a>
</div>
  <div class="row clearfix">
    <div class="twelvecol">     
        <h2 style="text-align:center">THANK YOU - YOUR REQUEST HAS BEEN RECEIVED!</h2>
                        <h4><P style="color:#2F83D3">An email with pricing information on your car is on the way and you should be contacted immediately with a quote and additional information.</p>

                        <p style="color:#2F83D3">In some geographic areas and over weekends it may take 1-2 business days before a representative is able to contact you.</p></h4>
                        <span class="generic_rate">
                  Below is the generic rate quote for <strong><?php echo isset($category->categoryName) ? $category->categoryName : ""; ?></strong> from <strong><?php echo isset($adv_name) ? $adv_name : ""; ?></strong> going by the <br> information you provided (we'll let you know if you qualify for extra discounts).
              </span>
        <?php 
            if(isset($leadQuotes) && is_object($leadQuotes) && !empty($leadQuotes)){
                $baseurl = $this->config->item("base_url");
                $img = "";
                if(isset($advbanner) && is_object($advbanner) && !empty($advbanner)){
                    $logo = $advbanner->logo;
                    if($logo==""){
                        $logo ="no_image.png" ; 
                    }
                    $img = "<img src='{$baseurl}assets/uploads/advertiser/icon/{$logo}' alt='' style=' width: 100%;max-width: 175px;'/>";  

                }else{
                    $img =  isset($adv_name) ? $adv_name : "";;
                }
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
                        <tr>
                            <td><?php echo $img; ?></td>
                            <td>
                            <?php 
                            if(isset($leadQuotes->percentage) && strlen($leadQuotes->percentage) > 0 ){
                                echo $leadQuotes->percentage ;?>
                               <?php
                                }else{
                                echo "-";
                            } ?>
                            </td>
                            <td><?php echo isset($leadQuotes->flat_rate) && strlen($leadQuotes->flat_rate) > 0 ? $leadQuotes->flat_rate : "-"; ?></td>
                            <td><?php echo $leadQuotes->additional_info; ?></td>
                        </tr>
                     </tbody>
                </table>
            </div>
            <?php  } ?>  
        
        <div class="content">
            <img src="<?=base_url().'assets/user/design/';?>images/thankYou.png"  alt="" />
        </div>   
    </div>
	</div>

</div>
