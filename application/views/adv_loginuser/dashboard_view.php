<script src="<?=base_url();?>assets/admin_property/assets/js/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){
$('#navigation ul  #li1').addClass('active open');
$('.task-list .close').click(function(){
if (confirm('Are you sure You Have Done this Task..??')) {
var keep = $(this).closest('li');
var src = $(this).closest('li').attr('src');
		$.ajax({
		url: src,
		type: "get",
		success: function( strData ){
						keep.remove();
						}
					})
					}
					})
					});
</script>
<style>
.center{
	margin:0px auto;
	width:1000px;
}
.pad10{
	padding:10px;
}
@media (max-width: 1160px) {
    .center{
        width:100% !important;
    }
}
@media (max-width: 981px) {
    .left_block , .right_block{
        width:100% !important;
        margin-left: 0px !important;
    }
    .left_block .span4{
        width:100% !important;
        margin-left: 0px !important;
    }

}
</style>
<script>
// just for the demos, avoids form submit
/*jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#third_party_form" ).validate({
  rules: {
    thirdparty: {
      required: true,
      url: true
    }
  }
});*/
</script>
<div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>
 
            </ul>-->
            <h1 id="main-heading"> Welcome to <?=SITE_NAME;?>  </h1>
			   <div id="msg">
          <?php
            if(isset($msg)){
              echo $msg;
            }
          ?>
        </div>
 </div>

<?php 
// print_r($topBids);
foreach($topBids as $top){
    
   
} ?>
            <div id="main-content">
              
           <ul class="stats-container">
                                    <li style="display:none">
                                        <a href="#" class="stat summary">
                                          <span class="icon icon-circle bg-orange">
                                                <i class="icon-user"></i>
                                            </span>
                                            <span class="digit">
                                                <span class="text">Pending Ads</span>
                                               <?php echo ($ads->pendingAds)?$ads->pendingAds:'0';?>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="stat summary">
                                            <span class="icon icon-circle bg-orange">
                                                <i class="icon-business-card"></i>
                                            </span>
                                            <span class="digit">
                                                <span class="text">Last Payment to Keyverticals</span>
                                                <?php $lastpayment=number_format($amount->lastPaidAmount,2);?>
                                              <?= SITE_CURRENCY;?>
                                              <?php echo ($lastpayment)? $lastpayment:'0';?>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="stat summary">
                                            <span class="icon icon-circle bg-orange">
                                                <i class="icon-stats"></i>
                                            </span>
                                            <span class="digit">
                                                <span class="text">Current Balance</span>
                                                  <?php $balance=number_format($amount->balance,2);?>
                                              <?= SITE_CURRENCY;?>
                                              <?php echo ($balance)?$balance:'0';?>
                                            </span>
                                        </a>
                                    </li>
                                    <li style="display:none">
                                        <a href="#" class="stat summary">
                                            <span class="icon icon-circle bg-orange">
                                                <i class="icon-cyclop"></i>
                                            </span>
                                            <span class="digit">
                                                <span class="text">Active Ads</span>
                                                <?php echo ($ads->activeAds)?$ads->activeAds:'0';?>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                	<div class="center clearfix">
                                            <div class="span5 left_block">
                                                <div class="span4 widget">
                                                <div class="widget-header">
                                                    <span class="title">Top 3 Bids</span>
                                                </div>
                                                <div class="widget-content form-container" style="padding: 10px;">
                                                    <table width="100%">
                                                        <tr>
                                                            <th>Category</th>
                                                            <th>Top1</th>
                                                            <th>Top2</th>
                                                            <th>Top3</th>
                                                          </tr>
                                                        <?php
                                                            foreach ($topBids as $key => $value){
                                                                $top1 = isset($value[0]) ? SITE_CURRENCY . $value[0] : "---";
                                                                $top2 = isset($value[1]) ? SITE_CURRENCY . $value[1] : "---";
                                                                $top3 = isset($value[2]) ? SITE_CURRENCY . $value[2] : "---";
                                                                
                                                                echo <<<EOT
                                                                    <tr align='center'><td><b>$key</b></td><td>$top1</td><td>$top2</td><td>$top3</td></tr>
EOT;
                                                            }
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                <?php 
                                foreach($userCategories as $cat){
                                     if(isset($cat['id']) && $cat['id'] == THIRD_PARTY_ONLY ){
                                         foreach($thirdpartyurl as $link){
                                            // echo $link;
                                        
                                ?>
                                  <div class="span4 widget" >

                                        <div class="widget-header">
                                            <span class="title">For Third Party Auto Insurance Only</span>
                                        </div>
                                             <div class="widget-content form-container pad10">
                                            <form class="form-horizontal" id="third_party_form" onsubmit ="" action="<?=base_url().'adv_loginuser/dashboard/thirdpartyonlyForm'?>" method="post">
                                                <div style="padding: 10px;">
                                                 
                                                    <div class="table_form">
                                                         <label><b>Please Enter Direct Quotes/Payment Page URL & Click Submit</b></label>
                                                         <input type="text" id="thirdparty" name="thirdpartylink" style="width:330px;" value="http://<?php echo trim($link,'http://'); ?>" class="required url">
                                                    </div>
                                                               
                                                        
                                                </div>
                                                            <!--<span class="add-on">₦</span><input type="text" id="input13" name="minimum_bid" value="<?=MINIMUM_BID_PRICE;?>" class="required number">-->
                                               
                                                <div class="form-actions">
                                                    <input type="submit" class="btn btn-primary" id="saveCommissionSetting" value="Submit">
                                                </div>
                                            </form>
                                        </div>
                                     </div>
                                                     <?php 
                                                     
                                                            }
                                                             }
                                                   } 
                                                     ?>
                                            </div>
                                            
                                            
                                 
                                            
                                            <div class="span4 widget" style="display:none">
                                        <div class="widget-header">
                                            <span class="title">
                                              Please select Your Form icon (Recommended size <?=ADVER_LOGO_WIDTH.' x '.ADVER_LOGO_HEIGHT?>)</span>
                                        </div>
                                        <div class="widget-content form-container">
                                           <?php echo form_open_multipart(); ?>
											
												<?php echo form_upload('userfile','','id="userfile"'); ?>
												
											  
											<?php echo form_close(); ?>
                                        
										<div>
                                                                                    <img src="<?php if(isset($forminfo[0]->adverFromIcon) && strlen($forminfo[0]->adverFromIcon) > 0 ){
                                                                                                echo base_url().trim($forminfo[0]->adverFromIcon);
                                                                                                
                                                                                        }else{
                                                                                                echo base_url(). "assets/forms/images/noimage.jpg";
                                                                                        } ?>" alt="no image Found" id="formIcon">
										</div>
										</div>
                                    </div>
                                            <div class="span5 widget right_block" style="float:right">

                                        <div class="widget-header">
                                            <span class="title">Bid Price(s)</span>
                                        </div>
                                        <div class="widget-content form-container pad10">
                                            <form class="form-horizontal" id="save_bid" onsubmit ="return validateBidPrices()" action="<?=base_url().'adv_loginuser/dashboard/updateBidPrice'?>" method="post">
                                                <div style="padding: 10px;">
                                                        <?php
                                                            $msg = $this->session->flashdata('item');
                                                            if(strlen($msg) > 0){
                                                                echo "<div class='alert alert-error'>$msg</div>";
                                                            }
                                                        ?>
                                                        <div class="message">
                                                        </div>
                                                            
                                                            <?php
                                                               
                                                                echo "<table width='100%' class='bidPriceTable'><tbody>";
                                                                foreach($userCategories as $cat){
                                                                    echo <<<EOT
                                                                        <tr><td>
                                                                            <label><b>{$cat["name"]}</b></label>
                                                                        </td><td>
                                                                            <input type="hidden" name='category[]' value="{$cat["id"]}">
                                                                            <span class="add-on">₦</span><input type="text" name="minimum_bid[]" value="{$cat["userbidprice"]}" class="required number"><br/>
                                                                        </td><td>
																			<input type="hidden" name="minimum_price[]"  class="minimum_price" value="{$cat["minbidprice"]}">
                                                                            Minimum Bid Price : {$cat["minbidprice"]}
                                                                            </td></tr>
EOT;
                                                                
                                                                    
                                                              }
                                                                echo "</tbody></table>";
                                                            ?>
                                                </div>
                                                            <!--<span class="add-on">₦</span><input type="text" id="input13" name="minimum_bid" value="<?=MINIMUM_BID_PRICE;?>" class="required number">-->
                                               
                                                <div class="form-actions">
                                                    <input type="submit" class="btn btn-primary" id="saveCommissionSetting" value="Save Setting">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
										
								</div>
          <div id="AddTask" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 id="myModalLabel">Add New Task</h3>
</div>
<div class="form-horizontal">
<div class="modal-body">
<form class="form-container" action="<?=base_url().'admin/dashboard/update_task'?>" method="post">

<div class="control-group">
<label class="control-label" for="task">Task</label>
<div class="controls">
<input name="task" type="text" class="" >
</div>
</div>
<div class="control-group">
<label class="control-label" for="taskPriority">Task Priority</label>
<div class="controls">
<select id="" name="taskPriority" class="">
<option>No Priority</option>
<option value="badge badge-warning,Urgent">Urgent</option>
<option value="badge badge-success,Important">Important</option>
<option value="badge badge-important,Today">Today</option>
<option value="badge badge-info,Tomorrow">Tomorrow</option>


</select>
</div>
</div>

</div>
<div class="modal-footer">
<input class="btn btn-primary" value="Save changes" type="submit">
</div>
</form>
</div>
</div>

		  </section>
        </div>
      </div>
    </div>
    <blockquote>&nbsp;</blockquote>
  </div>
  <script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
 <script>
	$(document).ready(function(){
		var base_url = "<?=base_url();?>";
		var userId = "<?=$user['user_id'];?>";
		$('#upload-file').click(function (e) {
		  e.preventDefault();
		  $('#userfile').uploadify('upload', '*');
		  });
		  $('#userfile').uploadify({
		  'debug':false,
		  'auto':true,
		  'swf': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify.swf',
		  'uploader': base_url+'adv_loginuser/dashboard/icon_upload/'+userId,
		  'cancelImg': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify-cancel.png',
		  'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif;*.jpeg;*.gif',
		  'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif,.gif,.jpeg)',
		  'fileSizeLimit':'2MB',
		  'fileObjName':'userfile',
		  'buttonText':'Form Icon',
		  'multi':true,
		  'removeCompleted':true,
		  'onUploadError' : function(file, errorCode, errorMsg, errorString) {
		  alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
		  },
		  'onUploadSuccess' : function(file, data, response) {
		  var Info = $.parseJSON(data);
			$('#formIcon').attr('src',base_url+'assets/uploads/advertiser/icon/'+Info.file_name);
			}
		 });
      //  $('#save_bid').validate();         
	});     
		
	function validateBidPrices(){
		var valids	=	0;
		$('table.bidPriceTable tbody tr').each(function(){
			var minimum_price	=	parseInt($(this).find('input.minimum_price').val());
			var apply_bid	=	 parseInt($(this).find('input[type="text"]').val());
			if(parseFloat(minimum_price) > parseFloat(apply_bid) ){
				$('.message').html('<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">×</a>Please enter bid greater than the minimum bid price</div>');
				valids	=	1	;
				if(apply_bid % 20	!= 0){
						valids	=	1	;
						var remainder	=	parseInt(apply_bid % 20);
						var amount	=	apply_bid + 20 - remainder;
						$(this).find('input[type="text"]').val(amount);
						$('.message').html('<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">×</a>Please bid in multiples of ₦20. </div>');
						return false;
					}
				return false;
				}else{
				
					if(apply_bid % 20	!= 0){
					
						valids	=	1;
						var remainder	=	parseInt(apply_bid % 20);
						var amount	=	apply_bid + 20 - remainder;
						$(this).find('input[type="text"]').val(amount);
						$('.message').html('<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">×</a>Please bid in multiples of ₦20. </div>');
						return false;
					}	
				}
			})
			if(valids==1){
				return false;
			}else{
				return true;
			}
	}
 </script>

<script>
$('#input13').keyup(function() {
    var val = $(this).val();
    $(".error").remove();
    if (val.length == 0) $(this).after('<label for="input13" class="error">This field is required.</label>');
    else if (isNaN(val)) $(this).after('<label for="input13" class="error">Invalid Number</label>');
    else if (parseInt(val,10) != val || val < <?=MINIMUM_BID_PRICE;?> ) $(this).after('<label for="input13" class="error">Minimum Bid Price is <?=MINIMUM_BID_PRICE;?></label>');
    else $(".error").remove();
});
</script>