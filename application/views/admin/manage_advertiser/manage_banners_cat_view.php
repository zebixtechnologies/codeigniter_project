<script type="text/javascript">
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li3').addClass('active open');
  $('#navigation ul #li3 #li3-3').addClass("active open");
  
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
     
    <div class="span12 widget">
      <div class="widget-header"> 
         
        <span class="title"><i class="icon-list-2"></i>Manage Banners for <?=$category->categoryName;?></span>
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
                  <form action="<?=base_url().'admin/manage_advertiser/upload_banner_image/';?>" method="POST" enctype="multipart/form-data" >
                <div class="row-fluid">
                  <div class="">    
                    <div class="control-group">  <span style="font-weight:bold"><?php
                      $bannerheight = isset($banner_sizes[$category->categoryId]) && strlen($banner_sizes[$category->categoryId])>0 ? $banner_sizes[$category->categoryId]: "500";
                      echo "Image size should be {$widthOfBanner}px * {$bannerheight}px" ?></span>
                    </div>
                   <div class="control-group">                    		
                    <label class="control-label " for="PageName"><?=$category->categoryName;?> Banner</label>
                    <div class="controls">
                        
                            <label>
                                <input type="hidden" value="<?=$category->categoryId;?>" name="category_id"/>
                                <input type="file" name="file" style="cursor: pointer;" />
                                
                            </label>
                        <label>
                            <span style="color:red;">
                                <?php $err = isset($error) && strlen($error) > 0 ? $error : "" ;
                                echo $err; 
                                echo "<br>";
                                
                                ?>
                            </span>
                        </label>
                        
                    </div>
                    
                     
                    <div class="controls">
                        <?php 
                        if(strlen($category->banner_name) > 0){
                        ?>
                        <img src="<?=base_url().'assets/uploads/category/'.$category->banner_name?>" width="200px" height="100px"/>
                        
                    <?php } ?>
                    </div>
                  </div>
                      <div class="control-group"> 
                          <div class="controls">
                               <span style="color:red;"><?php
                                $er = isset($errorOfLink) && strlen($errorOfLink) > 0 ? $errorOfLink : "";
                                echo $er;
                                ?></span>
                          </div>
                          <label class="control-label " for="PageName">Banner URL</label>
                            <div class="controls">
                                <label>
                                    <input type="text" name="banner_link" class="" value="<?php echo isset($category->banner_link) && strlen($category->banner_link) > 0 ? $category->banner_link : ""  ?>"/>
                                </label>
                            </div>
                      </div>
                      <div class="form-actions">
                          <input type="submit" class="btn btn-info" value="upload" style="cursor: pointer;" />
                                <a href="<?=base_url().'admin/dashboard'?>" class="btn btn-warning"> Cancel </a>
                            </div>
                </div>
                
            </div>
         </form>
  </div>
</div>
</div>
 </div>
      </div>
    </div>
      

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