<script>
$(document).ready(function(){

  $('#navigation ul  #li3').addClass('active open');
  $('#navigation ul #li3 #li3-2').addClass("active open");
  $('#content').removeClass();
 
  $('.userAction').click(function (){
			$("#usrInforMation").modal();
			var url = $(this).attr('url');
			var data = '';
			doAjaxCall(url,data,true,function(html){
				$('#usrInforMation').html(html);
				$("#usrInforMation").modal('show');
			});
			});
});


function submitMailForm(ref){
	var url 	= $('#approval_mail').attr('action');
	
	var data 	= $('#approval_mail').serialize();
	var button  = $(ref).val();
					$(ref).val('Sending Mail');
					$(ref).attr('disabled','disabled');
	
	doAjaxCall(url,data,false,function(html){
	$(ref).val('Mail Sent');
	window.location.href='<?=base_url()?>'+'admin/adv_manage/';
			
		});	
	
}
function submitMailMessage(ref){
	var url 	= $('#reply_mail').attr('action');
	
	var data 	= $('#reply_mail').serialize();
	var button  = $(ref).val();
					$(ref).val('Sending Mail');
					$(ref).attr('disabled','disabled');
	
	doAjaxCall(url,data,false,function(html){
			if(html ==1){
			$(ref).val('Mail Sent');
				
			}
		});	
	
}
</script>
<?
foreach($request_pending as $info)
?>
   <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-plus"></i>Request Pending</span>      
		<div class="toolbar">
          <div class="btn-group" > 
                <a class="btn Reg" href="#" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="  <?=date('m-d-Y h:i:s',$info->requesTime)?>"><i class="icon-info"></i> Request Time</a> 
          </div>
        </div>		  
        </div>
        <div class="row-fluid">
          <div class="widget-content form-container">
            <div class=" form-horizontal remove-top-border">
              <form name="show_subscription" onsubmit="return false;" action="" method="post" id="show_reseller">
         
            
                <div class="row-fluid">
                  <div class="span6">                    
                   <div class="control-group">                    		
                    <label class="control-label " >AD Name</label>
                    <div class="controls">
                      <?=$info->adName;?>
                     
                    </div>
                  </div>
                </div>
                <div class="span6">
                 <div class="control-group">    
                  <label class="control-label">AD Title</label>                		
                  <div class="controls">
                    <?=$info->adTitle;?>
				</div>
                </div>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span6">
               <div class="control-group">    
                <label class="control-label" >Color</label>                		
                <div class="controls">
					<?php echo $info->color?>
                </div>
              </div>
            </div>

            <div class="span6">
             <div class="control-group">    
              <label class="control-label" >Site Url</label>                		
              <div class="controls">
                <a href="<?=$info->siteUrl;?>" target="_blank"> <?=substr($info->siteUrl, 0,30);?></a>
              </div>
            </div>
          </div>

        </div>  
		
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Category Name</label>
				<div class="controls">
				  <?=$info->categoryName;?>
				</div>                       
			  </div>
			</div>
		
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >bid ppc</label>
				<div class="controls">
				 <span class="label label-important"> <?=$info->bid_ppc; ?> </span>
				</div>                       
			  </div>
			</div>
		</div>	
		
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" > CPC </label>
				<div class="controls">
				  <?=$info->cpc;?>
				</div>                       
			  </div>
			</div>
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" > State </label>
				<div class="controls">
				  <?=$info->stateName;?>
				</div>                       
			  </div>
			</div>
		</div>	
										
												
		<div class="row-fluid">
		<fieldset style="display: none">
													<legend>Ad Type (banner Only)</legend>	
		<div class="span6">
	
		<div class="control-group">                                                
				<label class="control-label" >Banner Background</label>
				<div class="controls">
				
				
				</div>                       
			  </div>
      
        <div class="span6">
				<img src="<?=base_url().$info->bannerBackground;?>" alt="wait" id="bannerBackground_img" />
				
			  </div>
			  
			  
			  <div class="span4">
					<span class="label label-important" id="sizer_bannerBackground">  </span>
				</div>
				 
			
		</div>
		<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Banner</label>
				<div class="controls">
				
				 
				</div>                       
			  </div>
			
      <div class="span6 ">
				<img src="<?=base_url().$info->bannerImage?>" alt="wait" id="banner_img" />
			 </div>
			 
			  <div class="span4">
					<span class="label label-important" id="sizer_bannerImage">  </span>
				</div>
				 
			
		</div>
		
   
    </fieldset>
		</div>
		
		
		<div class="row-fluid">
			<div class="">
		<fieldset>
													<legend>Ad Type (banner with text and ad icon)</legend>
													<div class="control-group">
														<label class="control-label" for="input16">Ad Title (Display)</label>
														<div class="controls">
															 <?=$info->adTitle_display;?>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Package</label>
														<div class="controls">
															<textarea readonly class="span12"><?=$info->adDiscription_display;?></textarea>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Ad Icon</label>
														<div class="controls">
															<? if($info->adIcon_display !=''){ ?>
															<img src="<?=base_url().$info->adIcon_display?>">
															<?}?>
														</div>
													</div>
												</fieldset>
												
												
			 </div>
			</div>	
      <div class="form-actions" >


                <div class="pull-right">
                  <a href="
                    <?=base_url().'admin/adv_manage/declinerequest/'.$info->adId;?>"  role="button"  data-toggle="modal">
                    <input type="button" class="btn btn-inverse" value="Decline Request" >
				
			</a>
                  <a href="#" class="userAction" url="
                    <?=base_url().'admin/adv_manage/requestapproval/'.$info->adId;?>" role="button"  data-toggle="modal">
                    <input type="button" class="btn btn-info" value="Custom Messege With Approval" >
			</a>
                  <a href="#" class="userAction" url="
                    <?=base_url().'admin/adv_manage/mailtocutomer/'.$info->adId;?>" role="button"  data-toggle="modal">
                    <input type="button" class="btn btn-primary" value="Reply by mail" >
			</a>

                </div>



              </div>
              </form>
</div>


              
            </div>
     
      
  
</div>
</div>

</div>
</div>

<div id="usrInforMation" class="modal hide fade">
</div>
</section>
</div>	

</div>
</div>
<blockquote>&nbsp;</blockquote>
</div>
<script type="text/javascript">
var banner = new Image();
				banner.onload = function() {
					$('#sizer_bannerImage').text('width '+this.width + ' x height ' + this.height);
				 
				}
		var banner_back = new Image();
				banner_back.onload = function() {
				  $('#sizer_bannerBackground').text('width '+this.width + ' x height ' + this.height);
				}
		banner.src = '<?=base_url().$info->bannerImage?>';
		banner_back.src = '<?=base_url().$info->bannerBackground?>';
</script>

