<script>
  $(document).ready(function(){
  
  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-1').addClass("active open");
  $('#content').removeClass();

  $('#save_adv_info,#saveAllChanges').click(function(){
  if($('#adv_info').valid()){
  var url =  $('#adv_info').attr('action');
  var data = $('#adv_info').serialize();
  var keeper = $('#adv_info');
  var msg,type,title;

  doAjaxCall(url,data,true,function(html){
  if(html == 1){
  msg = 'AD has been update successfully.';
  type = 'success';
  title = 'Update AD';
  } 
  
  if(html == 2){
		  msg = 'Please upload banner background.';
		  type = 'error';
		  title = 'upload backgournd';
		  }
		if(html == 3){
		  msg = 'Please upload banner image.';
		  type = 'error';
		  title = 'upload banner';
		  }
		if(html == 4){
		  msg = 'Please Select State.';
		  type = 'error';
		  title = 'Select State';
		  } 
		if(html == 5){
		  msg = 'Please Select Category.';
		  type = 'error';
		  title = 'Select Category';
		  }
		if(html == 6){
		  msg = 'Please Select Ad Type.';
		  type = 'error';
		  title = 'Select Ad Type';
		  }
		if(html == 7){
		  msg = 'Please Select Ad Icon .';
		  type = 'error';
		  title = 'Select Ad Icon For Ad';
		  }   

  $.pnotify({
  title: title,
  text: msg,
  type: type
  });
  });
  }
  })
  $('.bannerBack').click(function(){
  var $thisRef = $(this);
  var imageSrc = $('#bannerBackground_img').attr('src');
  var adID = $('#editId').val();
  var field = 2;
  var orignalSrc = imageSrc.replace(new RegExp("/", "g"), '-');
  orignalSrc = encodeURIComponent(orignalSrc);
  resizeImageD(orignalSrc,field,adID);
  });
  $('.bannerOrg').click(function(){
  var $thisRef = $(this);
  var imageSrc = $('#banner_img').attr('src');
  var adID = $('#editId').val();
  var field = 1;
  var orignalSrc = imageSrc.replace(new RegExp("/", "g"), '-');
  orignalSrc = encodeURIComponent(orignalSrc);
  resizeImageD(orignalSrc,field,adID);
  });

  });

  function resizeImageD(orignalSrc,field,adID){
  var base = '<?=base_url()?>';
			$("#usrInforMation").modal();
			var url = base+'adv_loginuser/dashboard/resizing/'+adID+'/'+orignalSrc+'/'+field;
			var data = '';
			
			doAjaxCall(url,data,true,function(html){
				$('#usrInforMation').html(html);
				$("#usrInforMation").modal('show');
				 $('#cropbox').Jcrop({
				  aspectRatio: 1,
				  onSelect: updateCoords
				});
			});
}

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords(btn)
  {
    if (parseInt($('#w').val())){
		var url =  $('#cropImage').attr('action');  
		var data = $('#cropImage').serialize();  
			 doAjaxCall(url,data,true,function(html){
							if(html == 0){
								msg = 'AD not Updated.';
								type = 'error';
								title = 'Failed to Image Resize';
							}else{
								msg = 'Image Resize successfully.';
								type = 'success';
								title = 'Update AD';
							}
							
						$.pnotify({
								title: title,
								text: msg,
								type: type
							});
							closeBox();
								
							var respo = $.parseJSON(html);
							var base_url = '<?=base_url()?>';
							banner.src = base_url+respo[0].bannerImage;
							$('#banner_img').attr('src',base_url+respo[0].bannerImage);
							
							banner_back.src = base_url+respo[0].bannerBackground;
							$('#bannerBackground_img').attr('src',base_url+respo[0].bannerBackground);
							
						});
						
						
		return false;
	}else{
    alert('Please select a crop region then press submit.');
    return false;
	} 
  };
  function closeBox()
  {
    $('.close').click();
  };
</script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }


</style>
<?
foreach($adinfo as $info)
?>
   <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-edit"></i> <?=$info->adName;?></span>      
		<div class="toolbar">
          <div class="btn-group" > 
               
				<a class="btn Reg" href="#" id="save_adv_info" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Save All Changes"><i class="icos-save"></i> Save All</a>	
          </div>
        </div>		  
        </div>
       <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
       			  <form name="adv_info" onsubmit="return false;" action="<?=base_url().'adv_loginuser/dashboard/saveAdvInfo'?>" method="post" id="adv_info">
          
                <div class="row-fluid">
                  <div class="span6">                    
                   <div class="control-group">                    		
                    <label class="control-label " >AD Name</label>
                    <div class="controls">
					<input  type="text" class="required span12 " name="adName"  value="<?=$info->adName;?>" />
                      
                     <input  type="hidden" class="required span12 " name="editId"  value="<?=$info->adId;?>" id="editId"/>
                    </div>
                  </div>
                </div>
                <div class="span6">
                 <div class="control-group">    
                  <label class="control-label">AD Title</label>                		
                  <div class="controls">
                    <input  type="text" class="required span12 " name="adTitle"  value="<?=$info->adTitle;?>"  maxlength="35"/>
					<p class="help-block">limit 35 character.</p>
                     
				</div>
                </div>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span6">
               <div class="control-group">    
              <!--  <label class="control-label" >Color</label> -->                		
                <div class="controls">
				      
					
                </div>
              </div>
            </div>

            <div class="span6">
			<div class="control-group">
                 <label class="control-label" for="siteUrl">Site Url</label>
                    <div class="controls">
                       	<div class="input-append class="span12"">
                           	<input type="text" name="siteUrl" value="<?=$info->siteUrl;?>" ><a href="<?=$info->siteUrl;?>" target="_blank" title="go for link">	<button type="button" class="btn"><i class=" icos-go-back-from-screen icos-white"></i></button>
											  </a>
                        </div>
                    </div>
             </div>
             
          </div>

        </div>  
		
		<div class="row-fluid">
			<div class="span6">
			<div class="control-group">                                                
				<label class="control-label" >State</label>
				<div class="controls">
					<select name="state">
						<?foreach($states as $state){?>
						<option value="<?=$state->stateId.'-'.$state->stateName?>" <?=($info->state == $state->stateId) ? 'selected':'';?>><?=$state->stateName?></option>
						
						<?	}?>
					</select>
					
				</div>                       
			  </div>
			  </div>
			  
			  
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Category</label>
				<div class="controls">
				  <select name="category" class="span12">
						<option>--Category--</option>
						<? foreach($category  as $ref){?>
						<option value="<?=$ref->categoryId?>"  <?=($info->categoryId == $ref->categoryId) ? 'selected':'';?>><?=$ref->categoryName?></option>
						<?}?>
					</select>
				</div>                       
			  </div>
			</div>
			
		</div>	
		
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Approval Time</label>
				<div class="controls">
				  <?=date('m-d-Y h:i:s',$info->approvalTime)?>
				</div>                       
			  </div>
			</div>
			<div class="span6">
			    <div class="control-group">                                                
				<label class="control-label" >bid</label>
				<div class="controls">
					<input type="text" name="bid_ppc" value="<?=$info->bid_ppc;?>">	
				</div>                       
			  </div>
			</div>
			
		</div>	
		<div class="row-fluid">
			
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Page View</label>
				<div class="controls">
				 <?=$info->pageView;?>
				</div>                       
			  </div>
			</div>
			
		</div>	
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Leads</label>
				<div class="controls">
				  <?=$info->click;?>
				  
				</div>                       
			  </div>
			</div>
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >CTR</label>
				<div class="controls">
				<?=$info->ctr;?>
				</div>                       
			  </div>
			</div>
			
		</div>	
		
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >ADV Status</label>
				<div class="controls">
				  <input type="checkbox" name="userActivation" value="1" <?=($info->userActivation == 1) ? 'checked':'';?>>  
				</div>                       
			  </div>
			</div>
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Admin Activation</label>
				<div class="controls">
				  <?if($info->isApproved == 0) {
					echo '<span class ="label  label-important"> Pending </span>';
					  }else if($info->isApproved == 1){
							echo  '<span class="label label-success">Approved </span>';
					  }else if($info->isApproved == 2){
							echo  '<span class="label label"> Declined </span>';
					  };?>
				</div>                       
			  </div>
			</div>
				
			
			
		</div>		
		<div class="row-fluid">
		
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Country</label>
				<div class="controls">
					<?=$info->countryName?>
				 
				</div>                       
			  </div>
			</div>
			
		
			
		
		
			
			
		</div>	
		
			<div class="row-fluid">
		
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Active By Admin</label>
				<div class="controls">
					 <td><?if($info->isActive == 0) {
					echo '<span class="label label-important"> Inactive </span>';
					  }else if($info->isActive == 1){
							echo  '<span class="label label-success"> Active </span>';
					  }else if($info->isActive == 2){
							echo  '<span class="label label"> Suspend </span>';
					  };?>
			  </td>
				 
				</div>                       
			  </div>
			</div>
			
	
			
		
		
			
			
		</div>	
		
		
			<fieldset>
			<legend> </legend>
			<div class="control-group">                                                
                   <div class="control">                                                
				   <label class="radio inline">
						<input type="radio" name="adtype" checked="checked" value="1" class="adType">
						Ad With Text And Description.
					</label>
					<label class="radio inline">
						
                    </label>
					<hr>

			</div>
			</div>
			</fieldset>

	
		<div class="row-fluid" rel="banner_text_image">
			<div class="span6">
			<div class="control-group">                                                
				<label class="control-label" >Ad Title </label>
				<div class="controls">
						<input type="text"  maxlength="35" name="display_title" class="span12 required" value="<?=$info->adTitle_display;?>" >
						<p class="help-block"> Display On Site limit 35 character.</p>
						<input type="hidden" name="adIcon" id="adIconImageVal" value="<?=$info->adIcon_display;?>" >
						<input type="hidden" id="bannerBackground_img_val" value="<?=$info->bannerBackground;?>" name="banner_background">
						<input type="hidden" id="banner_img_val" value="<?=$info->bannerImage?>?>" name="newbanner">
				</div>                       
			  </div>
			  </div>
			  
			  
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Ad Description </label>
				<div class="controls">
					 <textarea  maxlength="70" name="description_display" class="span12 required"><?=$info->adDiscription_display;?></textarea>
					 <p class="help-block"> Display On Site limit 70 character.</p>
				</div>                       
			  </div>
			</div>
			
		</div>	
	<div class="row-fluid" rel="banner_text_image">
	<div class="span3">
			   <div style="display: none" class="control-group">                                                
				<label class="control-label" >AD Icon (Recommended size 200 x 150)</label>
				<div class="controls">
				<?php echo form_open_multipart(); ?>
					<?php echo form_upload('adIcon','','id="adIcon"'); ?>
					<?php echo (isset($error)) ? $error : ''; ?>
										
				<?php echo form_close(); ?>
				
				</div>                       
			  </div>
			  </div>
			  <div class="span3" style="display: none" id="adIconImage">
				<img src="<?=base_url().$info->adIcon_display?>" alt="Please Wait">
				
			  </div>
			  
			  <div class="row-fluid">

			<?/*	 <div class="span4">
					<a href="javascript:" class="bannerBack"><span class="label label-warning"> Resize image  </span></a>
				</div> */?>
			</div>
		
</div>
	
		<div class="row-fluid" rel="banner_image" style="display:none">
		<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Banner Background (recommended size 1000 x 120)</label>
				<div class="controls">
				<?php echo form_open_multipart(); ?>
					<?php echo form_upload('userfile','','id="userfile"'); ?>
					<?php echo (isset($error)) ? $error : ''; ?>
										
				<?php echo form_close(); ?>
				
				</div>                       
			  </div>
			  <div class="row-fluid">
			  <div class="span6 ">
				<img src="<?=base_url().$info->bannerBackground;?>" alt="wait" id="bannerBackground_img" >
				
			  </div>
			  
			  <div class="span4">
					<span class="label label-important" id="sizer_bannerBackground">  </span>
				</div>
				 <div class="span4">
					<a href="javascript:" class="bannerBack"><span class="label label-warning"> Resize image  </span></a>
				</div>
			</div>
		</div>
		<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Banner (recommended size 1000 x 120)</label>
				<div class="controls">
				<?php echo form_open_multipart(); ?>
					<?php echo form_upload('userBanner','','id="userBanner"'); ?>
					<?php echo (isset($error)) ? $error : ''; ?>
										
				<?php echo form_close(); ?>
				 
				</div>                       
			  </div>
			 <div class="row-fluid">
			  <div class="span6 ">
				<img src="<?=base_url().$info->bannerImage?>" alt="wait" id="banner_img">
			 </div>
			  <div class="span4">
					<span class="label label-important" id="sizer_bannerImage">  </span>
				</div>
				 
				 <div class="span4">
					<a href="javascript:" class="bannerOrg"><span class="label label-warning"> Resize image  </span></a>
				</div>
			</div>
		</div>
		
   
    
		</div>
      </div>
     
      <div class="form-actions" >
	    
        
	   <div class="pull-right">
		
			
				<input type="button" class="btn btn-primary" value="Save All" id="saveAllChanges">
			
			
		</div>
		
			</form>
		
      </div>
  </div>
</div>


</div>
</div>
</div>
<div id="usrInforMation" class="modal hide fade">
</section>	
</div>

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
		
		
		$(document).ready(function(){
			
		
				$('.adType').click(function(){
					var adType = $(this).val();
					if(adType == 1){
					$('div[rel="banner_image"]').hide('fade');
					$('div[rel="banner_text_image"]').show('fade');	
					}else{
					$('div[rel="banner_text_image"]').hide('fade');
					$('div[rel="banner_image"]').show('fade');
					}
					
				})
				
				
		
				var base_url  = '<?=base_url();?>';
				var adId  = '<?=$info->adId;?>';
				var CuserId  = '<?=$user['user_id'];?>';
				var fileInfo='';
				$('#upload-file').click(function (e) {
					e.preventDefault();
					$('#userfile').uploadify('upload', '*');
				});
				$('#userfile').uploadify({
					'debug':false,
					'auto':true,
					'swf': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify.swf',
					'uploader': base_url+'adv_loginuser/dashboard/ad_upload/'+adId+'/'+2+'/'+ CuserId,
					'cancelImg': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify-cancel.png',
					'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif;*.jpeg;*.gif',
					'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif,.gif,.jpeg)',
					'fileSizeLimit':'2MB',
					'fileObjName':'userfile',
					'buttonText':'Change Image',
					'multi':false,
					'removeCompleted':true,
					'onUploadError' : function(file, errorCode, errorMsg, errorString) {
						alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
					},
					 'onUploadSuccess' : function(file, data, response) {
						Info = $.parseJSON(data);
						$('#bannerBackground_img').attr('src',base_url+'assets/uploads/banners/'+Info.file_name);
						$('#bannerBackground_img_val').val('assets/uploads/banners/'+Info.file_name);
						banner_back.src = base_url+'assets/uploads/banners/'+Info.file_name
					}
				});
				
				$('#userBanner').click(function (e) {
					e.preventDefault();
					$('#userBanner').uploadify('upload', '*');
				});
				$('#userBanner').uploadify({
					'debug':false,
					'auto':true,
					'swf': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify.swf',
					'uploader': base_url+'adv_loginuser/dashboard/ad_upload/'+adId+'/'+1+'/'+ CuserId ,
					'cancelImg': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify-cancel.png',
					'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif;*.jpeg;*.gif',
					'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif,.gif,.jpeg)',
					'fileSizeLimit':'2MB',
					'fileObjName':'userfile',
					'buttonText':'Change Image',
					'multi':false,
					'removeCompleted':true,
					'onUploadError' : function(file, errorCode, errorMsg, errorString) {
						alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
					},
					 'onUploadSuccess' : function(file, data, response) {
						Info = $.parseJSON(data);
						$('#banner_img').attr('src',base_url+'assets/uploads/banners/'+Info.file_name);
						banner.src = base_url+'assets/uploads/banners/'+Info.file_name;
						$('#banner_img_val').val('assets/uploads/banners/'+Info.file_name);
					}
				});
				
				$('#adIcon').click(function (e) {
					e.preventDefault();
					$('#adIcon').uploadify('upload', '*');
				});
				$('#adIcon').uploadify({
					'debug':false,
					'auto':true,
					'swf': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify.swf',
					'uploader': base_url+'adv_loginuser/dashboard/newadIcon_upload/'+ CuserId ,
					'cancelImg': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify-cancel.png',
					'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif;*.jpeg;*.gif',
					'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif,.gif,.jpeg)',
					'fileSizeLimit':'2MB',
					'fileObjName':'userfile',
					'buttonText':'Change Image',
					'multi':false,
					'removeCompleted':true,
					'onUploadError' : function(file, errorCode, errorMsg, errorString) {
						alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
					},
					 'onUploadSuccess' : function(file, data, response) {
						Info = $.parseJSON(data);
						$('#adIconImage').find('img').attr('src',base_url+'assets/uploads/adicon/'+Info.file_name);
						$('#adIconImageVal').val('assets/uploads/adicon/'+Info.file_name);
					}
					
				});
				
				
				
					var adType = '<?=$info->adType?>';
				if(adType =='1'){
				$('.adType[value="1"]').trigger('click');		
				}else{
				$('.adType[value="2"]').trigger('click');		
				}
		});
		
</script>