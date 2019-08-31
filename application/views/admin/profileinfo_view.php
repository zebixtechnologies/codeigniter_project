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
			});
	}
  });
  });
</script>


<div id="main-content">

  <div class="row-fluid">

    <div class="span12 widget no-widget">
      <div class="widget-header">
        <span class="title">
          <i class="icon-list-2"></i>My Profile
        </span>
      </div>
      <!-- form start-->
      <form id="admin_profile_view" enctype="multipart/form-data" method="POST" action="<?=base_url();?>admin/dashboard/updateprofileinfo" novalidate="novalidate">
        
          <div class="widget-container form-container">
            <div class="form-horizontal">
              <!-- <div class="controls" style="padding-top: 14px;">
						 <span class="control-label" for="input03">Role: </span>
                            <input type="text"  id="input03" class="span4" name="user_role" value="Admin"  readonly="readonly">
                     </div> -->
              <div class="row-fluid clearfix margin-x">
                <div class="span6">
                  <div class="no-widget widget">
                    <div class="widget-header light">
                      <span class="title">
                        <i class="icon-edit"></i>Account Information
                      </span>
                    </div>
                    <div class="widget-content form-container">
                      <?php 
				foreach($admininfo as $nn)	
				{
					?>
                      <div class="control-group">
                        <label class="control-label" for="input00">User Name:</label>
                        <div class="controls">
                          <input type="text" value="<?echo $nn->user_name;?>" name="user_name" class="span7" id="input01" />
                          <input type="hidden" value="1" name="user_id" class="span2" />
                        </div>
                      </div>
                       <div class="control-group">
                        <label class="control-label" for="input00">Name:</label>
                        <div class="controls">
                          <input type="text" value="<?echo $nn->admin_name;?>" name="admin_name" class="span7" id="input01" />
                          
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="input00">Email:</label>
                        <div class="controls">
                          <input type="text" readonly="readonly" value="<?echo $nn->user_email;?>" name="user_email" class="span7" id="input02"/>

                        </div>
                      </div>

                      <?php
				}
			?>
                      <div class="control-group">
                        <label class="control-label" for="input00">Current Password:</label>
                        <div class="controls">
                          <input type="password" name="old_pass" class="required span7" id="input22"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="input00">New Password:</label>
                        <div class="controls">
                          <input type="password" name="new_pass"  id="input04"  class="required span7" />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="input00">Confirm Password:</label>
                        <div class="controls">
                          <input type="password" name="new_c_pass" class="required span7" id="input05"/>
                        </div>
                      </div>
                      <div class="form-actions">
                        <input type="submit"  value="Update Profile" class="btn btn-primary" />
                        <a class="btn btn-danger" href="<?=base_url().'admin/dashboard'?>">
                          <i class="icol-cancel"></i> Cancel
                        </a>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="span6">
                  <div class=" no-widget widget">
                    <div class="widget-header light">
                      <span class="title">
                        <i class="icon-list"></i>Login History
                      </span>
                    </div>
                    <div class="widget-content form-container">
                      <div class="row-fluid">
                        <div class="span8">
							<dl class="dl-horizontal">
								  <dt>Last Login Time:</dt>
								  <dd><?echo date('m-d-Y H:m A',$nn->last_login);?></dd>
								  <dt>Last Login IP: </dt>
								  <dd> <?echo $nn->ip_address;?></dd>
								  <dt>Account Created By: </dt>
								  <dd><?foreach($admininfo as $nn) echo $nn->admin_name; ?></dd>
								  <dt>Last Login Time:</dt>
								  <dd><?echo date('m-d-Y H:m A',$nn->last_login);?></dd>
							</dl>
						  
                        </div>
                        <div class="span3 profile-pic">
                          <?=($nn->user_image == '') ? '<img src="'.base_url().'assets/admin_property/assets/images/pp.jpg" alt="profile Image" title="profile Image" />':'<img src="'.base_url().$nn->user_image.'" alt="profile Image" title="profile Image" />';?>

                          <?php echo form_open_multipart(); ?>

                          <?php echo form_upload('userfile','','id="userfile"'); ?>

                          <?php echo form_close(); ?>
                        </div>
                      </div>
                      
                      </div>
                    </div>
                  </div>
                </div>





              </div>

            </div>


        </form>

      <!-- form end-->
    </div>
  </div>
</div>
</section>
</div>
</div>
</div>
<blockquote>&nbsp;</blockquote>
</div>
<script type="text/javascript">
  $(document).ready(function(){
  var base_url  = '<?=base_url();?>';
  var userId  = '<?=$user['user_id'];?>';
  var fileInfo='';
  $('#upload-file').click(function (e) {
  e.preventDefault();
  $('#userfile').uploadify('upload', '*');
  });
  $('#userfile').uploadify({
  'debug':false,
  'auto':true,
  'swf': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify.swf',
  'uploader': base_url+'admin/dashboard/do_upload/'+userId,
  'cancelImg': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify-cancel.png',
  'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif;*.jpeg;*.gif',
  'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif,.gif,.jpeg)',
  'fileSizeLimit':'2MB',
  'fileObjName':'userfile',
  'buttonText':'Change image',
  'multi':true,
  'removeCompleted':true,
  'onUploadError' : function(file, errorCode, errorMsg, errorString) {
  alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
  },
  'onUploadSuccess' : function(file, data, response) {
  var Info = $.parseJSON(data);
  //alert(Info.file_name);
  $('.profile-pic img').attr('src',base_url+'assets/admin_property/profile/'+Info.file_name);
  }
  });
  });
</script>