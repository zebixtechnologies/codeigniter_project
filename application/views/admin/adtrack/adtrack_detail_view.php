<script>
$(document).ready(function(){

  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-1').addClass("active open");
 
 
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
			if(html ==1){
				alert('yes');
			}
		});	
	
}
function submitMailMessage(ref){
	var url 	= $('#reply_mail').attr('action');
	
	var data 	= $('#reply_mail').serialize();
	var button  = $(ref).val();
					$(ref).val('Sending Mail');
					$(ref).attr('disabled','disabled');
	
	doAjaxCall(url,data,false,function(html){
	$(ref).val('Mail Sent');
			if(html ==1){
				alert('yes');
			}
		});	
	
}
</script>
<?

foreach($statusReport as $info)
?>
   <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-plus"></i>AD Tracking Detail</span>      
		<div class="toolbar">
          <div class="btn-group" > 
                <!--<a class="btn Reg" href="#" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title=""><i class="icon-info"></i> Request Time</a> --> 
          </div>
        </div>		  
        </div>
        
          <div class="widget-content form-container">
         <form name="show_subscription" onsubmit="return false;" action="" method="post" id="show_reseller"  class=" form-horizontal remove-top-border">
          
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
                <label class="control-label" >Ad Approval Time</label>                		
                <div class="controls">
					<?php echo date('m-d-Y h:i:s',$info->approvalTime)?>
                </div>
              </div>
            </div>
			<div class="span6">
               <div class="control-group">    
                <label class="control-label" >SiteUrl</label>                		
                <div class="controls">
						<a href="<?=$info->siteUrl?>" class="btn btn-danger" target="_blank">Go For Site Url </a>
                </div>
              </div>
            </div>

          

        </div>  
		
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >State Name</label>
				<div class="controls">
				 <span class="label label-important"> <?=$info->stateName; ?> </span>
				</div>                       
			  </div>
			</div>
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Color</label>
				<div class="controls">
				 <span class="label label-important"> <?=$info->color; ?> </span>
				</div>                       
			  </div>
			</div>
		</div>	
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Category Name</label>
				<div class="controls">
			 <?=$info->categoryName; ?>
				</div>                       
			  </div>
			</div>
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >bid PPC</label>
				<div class="controls">
          <?= SITE_CURRENCY;?>
          <span class="label label-important"> <?=$info->bid_ppc; ?></span>
				
				</div>                       
			  </div>
			</div>
		</div>	
		
		<div class="row-fluid">
			
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >PPA</label>
				<div class="controls">
				<?=$info->bid_ppc * $info->click;?>
				</div>                       
			  </div>
			</div>
		</div>	
		
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >User Activation</label>
				<div class="controls">
			 <?if($info->userActivation == 0) {
					echo '<span label ="label  label-inverse"> Inactive </span>';
					  }else if($info->userActivation == 1){
							echo  '<span class="label label-success"> Active </span>';
					  }?>
				</div>                       
			  </div>
			</div>
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >page View</label>
				<div class="controls">
				 <?=$info->pageView; ?>
				</div>                       
			  </div>
			</div>
		</div>	
		
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Clicks</label>
				<div class="controls">
					<?if($info->click > 0 ){?>
					<a href="<?=base_url().'admin/adtrack/adclickdetail/'.$info->adId;?>" class="btn btn-info">Clicks Info total(<?=$info->click;?>)</a>
					<?}else{
						echo '<span class="label label-impotant">No Click History</span>';
					}?>
				</div>                       
			  </div>
			</div>
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >CTR</label>
				<div class="controls">
				 <?=$info->ctr; ?>
				</div>                       
			  </div>
			</div>
		</div>	
		
		
		
		<div class="row-fluid">
		<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Banner</label>
				<div class="controls">
				
				 
				</div>                       
			  </div>
			  <div class="span6 ">
				<img src="<?=base_url().$info->bannerImage?>" alt="wait" id="banner_img">
			 </div>
			 <div class="row-fluid">
			  <div class="span4">
					<span class="label label-important" id="sizer_bannerImage">  </span>
				</div>
				 
			</div>
		</div>

		
   
    
		</div>
                <div class="form-actions" >


                  <div class="pull-right">
                    <a href="<?=base_url()?>admin/adtrack/" class="btn btn-primary" role="button"  data-toggle="modal">
                     Go To Back
			</a>

                  </div>



                </div>
      
     
       

         </form>
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
	
		banner.src = '<?=base_url().$info->bannerImage?>';
		
</script>

