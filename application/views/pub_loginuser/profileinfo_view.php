<div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>

            </ul>-->
            <h1 id="main-heading">Welcome to <?=SITE_NAME;?></h1>
			   <div id="msg">
          <?php
            if(isset($msg)){
              echo $msg;
            }
          ?>
        </div>
 </div>
<div id="main-content">

  <div class="row-fluid">

    <div class="span12 widget no-widget">
      <div class="widget-header">
        <span class="title">
          <i class="icon-list-2"></i>My Profile
        </span>
      </div>
      <!-- form start-->
      <form id="adv_profile_view" enctype="multipart/form-data" method="POST" action="
        <?=base_url();?>pub_loginuser/dashboard/updateprofileinfo" onsubmit="return false;">
        <div class="row-fluid">
          <div class="no-widget widget">
            <div class="form-container">
              <div class="form-horizontal">
                <!-- <div class="controls" style="padding-top: 14px;">
						 <span class="control-label" for="input03">Role: </span>
                            <input type="text"  id="input03" class="span4" name="user_role" value="Admin"  readonly="readonly">
                     </div> -->
                <div class="row-fluid clearfix min-height-x margin-x">
                  <div class="span6">
                    <div class="widget">
                      <div class="widget-header light">
                        <span class="title">
                          <i class="icon-edit"></i> Account Imformation
                        </span>
                      </div>
                      <div class="widget-content form-container">
                      	
                        <?php 
				foreach($userinfo as $info)	
				{
					?>
                        <div class="control-group">
                          <label class="control-label" for="input00">Name:</label>
                          <div class="controls">
                            <input type="text" value="<?=$info->userName;?>" name="user_name" readonly="readonly" class="span7" id="input01" />
                            
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="input00">Email:</label>
                          <div class="controls">
                            <input type="text" readonly="readonly" value="<?echo $info->email;?>" name="user_email" class="span7" id="input02" />
                          </div>
                        </div>

                        <?php
				}
			?>
                        <div class="control-group">
                          <label class="control-label" for="input00">Current Password:</label>
                          <div class="controls">
                            <input type="password" name="old_pass" class="required span7" id="input22">
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
                          <input type="submit"  value="Update Profile" id="updateadverProfile" class="btn btn-primary" />
                          <a class="btn btn-danger" href="<?=base_url().'publisher'?>"><i class="icol-cancel"></i> Cancel</a>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="span6">
                    <div class="widget">
                      <div class="widget-header light">
                        <span class="title">
                          <i class="icon-list"></i>Login History
                        </span>
                      </div>
                      <div class="widget-content form-container">
                        <div class="row-fluid">
                          <div class="span8">
                            <div class="control-group">
                              <label class="control-label" for="input00">Last Login Time:</label>
                              <div class="controls">
                                <?echo date('m-d-Y H:m A',$info->lastLogin);?>
                              </div>
                            </div>
                          </div>
                          <div class="span3 profile-pic">
                            <?=($info->profilePic == '') ? '<img src="'.base_url().'assets/admin_property/assets/images/pp.jpg" alt="profile Image" title="profile Image" />':'<img src="'.base_url().$info->profilePic.'" alt="profile Image" title="profile Image" />';?>

                            <?php echo form_open_multipart(); ?>
                            
                                <?php echo form_upload('userfile','','id="userfile"'); ?>
                                
                              
                            <?php echo form_close(); ?>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="input00"> Last Login IP: </label>
                          <div class="controls">
                            <?echo $info->lastLoginIp;?>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="input00"> Account Created By:  </label>
                          <div class="controls">
                            <? echo $info->admin_name; ?>
                          </div>
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
  var msg,type,title;
  $('#upload-file').click(function (e) {
  e.preventDefault();
  $('#userfile').uploadify('upload', '*');
  });
  $('#userfile').uploadify({
  'debug':false,
  'auto':true,
  'swf': base_url+'assets/admin_property/bootstrap/js/jquery/uploadify_31/uploadify.swf',
  'uploader': base_url+'pub_loginuser/dashboard/do_upload/'+userId,
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
  $('.profile-pic img').attr('src',base_url+'assets/uploads/user/profile/'+Info.file_name);
 							 msg = 'Image will reflect on your next login.';
							type = 'success';
							title = 'Profile picture has been saved';
  $.pnotify({
								title: title,
								text: msg,
								type: type
							});
  }
  });
  });
</script>