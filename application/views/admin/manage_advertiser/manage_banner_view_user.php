<script type="text/javascript">
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li3').addClass('active open');
  $('#navigation ul #li3 #li3-2').addClass("active open");
  $('#content').removeClass();
  $('.goforDetail').click(function(){
        window.location.href = base_url+"admin/manage_advertiser/adv_info/"+$(this).attr('id');
  });
    $('.userAction').click(function (){
      $("#usrInforMation").modal();
      var url = $(this).attr('url');
      var data = '';
      doAjaxCall(url,data,true,function(html){
            //alert(html);
            $('#usrInforMation').html(html);
            $("#usrInforMation").modal('show');
      });
   });
 });
</script>

<style type="text/css">
	.pad-xl {
		padding:15px 0px;
	}
	.alignCenter {text-align:center;}
</style>

<div id="main-content">
  <div class="row-fluid">
      <?php  foreach($request_pending as $cat){
            ?>
    <div class="span12 widget">
      <div class="widget-header"> 
         
        <span class="title"><i class="icon-list-2"></i>Manage Banners for <?=$cat->userName;?></span>
        <div class="toolbar">
          <!--<div class="btn-group" > 
                <a class="btn Reg" href="<?php //echo base_url();?>admin/manage_advertiser/addnewAd/<?php //$userId;?>" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Create AD To Adevertiser <? if(isset($userads[0]->userName)){echo '('. $userads[0]->userName .')';}?> "><i class="icon-plus"></i> Add New Ad</a>
          </div>-->
        </div>
        
      </div>

      <div class="widget-content table-container">
          <div class="row-fluid">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                   <div class="control-group">                    		
                    <label class="control-label " for="PageName">Advertiser Logo</label>
                    <div class="controls">
                        <form action="<?=base_url().'admin/manage_advertiser/upload_image/'.$cat->userId;?>" method="POST" enctype="multipart/form-data" >
                            <label><input type="file" name="file" style="cursor: pointer;" multiple required />
        <input type="submit" value="upload" style="cursor: pointer;" />
                      </label></form>
                    </div>
                  </div>
                </div>
                <div class="span6">
                 <div class="control-group">                  		
                  <div class="controls">
                    <?php  foreach($request_updates as $manage){
                      if($manage->logo !="") { ?>
                      <img src="<?php echo base_url().'assets/uploads/advertiser/icon/'.$manage->logo;?>" alt="" width="100%" style=" max-width: 100px;" />
                       <?php }else{?>
                       <img src="<?php echo base_url().'assets/uploads/advertiser/icon/no_image.png';?>" alt="" />
                       <?php }?>
                        
                  </div>
                </div>
              </div>
            </div>
         <form name="add_subscription" action="<?=base_url().'admin/manage_advertiser/updateManageBannerContent/'.$cat->userId;?>" method="post" id="Edit_About" >
          <div class="row-fluid">
         <div class="control-group">    
                  <label class="control-label" for="pagetitle">Home Insurance Title</label>                		
                  <div class="controls">
                    <input  type="text" class="required span12 " name="pagetitle1" id="pagetitle1" value="<?=$manage->home_insurance_title;?>"/>
                  </div>
                </div>
         
           <div class="control-group">                                                
            <label class="control-label" for="pagedescription">	Home Insurance Content</label>
            <div class="controls">
             <textarea id="pagedescription" class="ckeditor span12 required" name="pagedescription1"><?=$manage->home_insurance;?></textarea>
                                
          </div>
            
        </div>
              <div class="control-group">    
                  <label class="control-label" for="pagetitle">Auto Insurance Title</label>                		
                  <div class="controls">
                    <input  type="text" class="required span12 " name="pagetitle2" id="pagetitle2" value="<?=$manage->auto_insurance_title;?>"/>
                  </div>
                </div>
              <div class="control-group">                                                
            <label class="control-label" for="pagedescription">Auto Insurance Content</label>
            <div class="controls">
                <textarea id="pagedescription" class="ckeditor span12 required" name="pagedescription2"><?=$manage->auto_insurance;?></textarea>                    
          </div>     
        </div>
              <div class="control-group">    
                  <label class="control-label" for="pagetitle">Life Insurance Title</label>                		
                  <div class="controls">
                    <input  type="text" class="required span12 " name="pagetitle3" id="pagetitle3" value="<?=$manage->life_insurance_title;?>"/>
                  </div>
                </div>
              <div class="control-group">                                                
            <label class="control-label" for="pagedescription">Life Insurance Content</label>
            <div class="controls">
             <textarea id="pagedescription" class="ckeditor span12 required" name="pagedescription3"><?=$manage->life_insurance;?></textarea>
                                
          </div>
            
        </div>
              <div class="control-group">    
                  <label class="control-label" for="pagetitle">Business Insurance Title</label>                		
                  <div class="controls">
                    <input  type="text" class="required span12 " name="pagetitle4" id="pagetitle4" value="<?=$manage->business_insurance_title;?>"/>
                  </div>
                </div>
              <div class="control-group">                                                
            <label class="control-label" for="pagedescription">Business Insurance Content</label>
            <div class="controls">
             <textarea id="pagedescription" class="ckeditor span12 required" name="pagedescription4"><?=$manage->business_insurance;?></textarea>
                                
          </div>
            
        </div>
              <div class="control-group">    
                  <label class="control-label" for="pagetitle">Travel Insurance Title</label>                		
                  <div class="controls">
                    <input  type="text" class="required span12 " name="pagetitle5" id="pagetitle5" value="<?=$manage->travel_insurance_title;?>"/>
                  </div>
                </div>
              <div class="control-group">                                                
            <label class="control-label" for="pagedescription">Travel Insurance Content</label>
            <div class="controls">
             <textarea id="pagedescription" class="ckeditor span12 required" name="pagedescription5"><?=$manage->travel_insurance;?></textarea>
                                
          </div>
            
        </div>
              <div class="control-group">    
                  <label class="control-label" for="pagetitle">Health Insurance Title</label>                		
                  <div class="controls">
                    <input  type="text" class="required span12 " name="pagetitle6" id="pagetitle6" value="<?=$manage->health_insurance_title;?>"/>
                  </div>
                </div>
              <div class="control-group">                                                
            <label class="control-label" for="pagedescription">Health Insurance Content</label>
            <div class="controls">
             <textarea id="pagedescription" class="ckeditor span12 required" name="pagedescription6"><?=$manage->health_insurance;?></textarea>
                                
          </div>
            
        </div>
      </div>
      <div class="form-actions" >
       <input type="submit" class="btn btn-info" value="Update <?=$cat->userName;?>" id="EditAboutButton" >
       <a href="<?=base_url().'admin/dashboard'?>" class="btn btn-warning" > Cancel </a>
      </div>
     </form>
  </div>
</div>
</div>
 </div>
      </div>
    </div>
      <?php }?> 
<?php }?>
  </div>
</div>
</section>
</div>
</div>
</div>
<blockquote>&nbsp;</blockquote>
</div>
<div id="usrInforMation" class="modal hide fade">
</div>
 <script>
	$(document).ready(function(){
		var base_url = "<?=base_url();?>";
		var userId = "<?=$userId?>";
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
			$('#adver_ad_icon').attr('src',base_url+'assets/uploads/advertiser/icon/'+Info.file_name);
			}
		 });
	})
 </script>