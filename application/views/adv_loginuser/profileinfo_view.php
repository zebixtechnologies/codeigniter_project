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
<div id="main-content">

  <div class="row-fluid">

    <div class="span12 widget no-widget">
      <div class="widget-header">
        <span class="title">
          <i class="icon-list-2"></i>My Profile
        </span>
      </div>
     
        <div class="row-fluid">
          <div class="no-widget widget">
            <div class="form-container">
              <div class="form-horizontal">
                <!-- <div class="controls" style="padding-top: 14px;">
						 <span class="control-label" for="input03">Role: </span>
                            <input type="text"  id="input03" class="span4" name="user_role" value="Admin"  readonly="readonly">
                     </div> -->
					  <!-- form start-->
      <form id="adv_profile_view" enctype="multipart/form-data" method="POST" action="
        <?=base_url();?>adv_loginuser/dashboard/updateprofileinfo" onsubmit="return false;">
                <div class="row-fluid clearfix min-height-x margin-x">
                  <div class="span4">
                    <div class="widget">
                      <div class="widget-header light">
                        <span class="title">
                          <i class="icon-edit"></i> Account Information (Change Password)
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
                            <input type="text" value="<?=$info->userName;?>" name="user_name" readonly="readonly" class="span12" id="input01" />
                            
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="input00">Email:</label>
                          <div class="controls">
                            <input type="text" readonly="readonly" value="<?echo $info->email;?>" name="user_email" class="span12" id="input02" />
                          </div>
                        </div>

                        <?php
				}
			?>
                        <div class="control-group">
                          <label class="control-label" for="input00">Current Password:</label>
                          <div class="controls">
                            <input type="password" name="old_pass" class="required span12" id="input22">
						</div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="input00">New Password:</label>
                          <div class="controls">
                            <input type="password" name="new_pass"  id="input04"  class="required span12" />
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="input00">Confirm Password:</label>
                          <div class="controls">
                            <input type="password" name="new_c_pass" class="required span12" id="input05"/>
                          </div>
                        </div>
                        <div class="form-actions">
                          <input type="submit"  value="Update Password" id="updateadverProfile" class="btn btn-primary" />
                          <a class="btn btn-danger" href="<?=base_url().'advertiser'?>"> Cancel</a>
                        </div>

                      </div>
                    </div>
                  </div>
			<!-- form end-->
				 </form>
                  <div class="span4">
                    <div class="widget">
                      <div class="widget-header light">
                        <span class="title">
                          <i class="icon-list"></i>Secure Information
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
						<div class="control-group">
                          <label class="control-label" for="input00"> Your Current Balance </label>
                          <div class="controls">
                           <i class="icol-money-dollar"></i><span class="label label-important"><?=($info->current_balance=='')? '0.00':$info->current_balance;?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

<div class="span4">
  <form id="update_profile_view" enctype="multipart/form-data" method="POST" action="<?=base_url().'adv_loginuser/dashboard/updateAdvInfo'?>" onsubmit="return false;">               
			   <div class="widget">
                      <div class="widget-header light">
                        <span class="title">
                          <i class="icon-edit"></i> Edit Your Profile
                        </span>
                      </div>
               <div class="widget-content form-container">
                      	
                        <?php 
				foreach($userinfo as $info)	
				{
					?>
                        
						<div class="control-group">
                          <label class="control-label" for="input98">Your Name (as Info): </label>
                          <div class="controls">
                            <input type="text" name="info_name" value="<?=$info->name;?>"  id="input98"  class="required span12" />
                          </div>
                        </div>
						<div class="control-group">
                          <label class="control-label" for="input97">Website:</label>
                          <div class="controls">
                            <input type="text" value="<?=$info->website;?>" name="website" class="span12 required url" id="input97" />
                            
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="input96">Email:</label>
                          <div class="controls">
                            <input type="text" value="<?echo $info->email;?>" name="email" class="span12 required" id="input96" />
                          </div>
                        </div>

                        <?php
				}
			?>
                        <div class="control-group">
                          <label class="control-label" for="input99">Phone:</label>
                          <div class="controls">
                            <input type="text" name="phone" class="required number span12" value="<?=$info->phone;?>" id="input99">
						</div>
                        </div>
                      
                        <div class="form-actions">
                          <input type="submit"  value="Update Profile" id="submitadverProfile" class="btn btn-primary" />
                          <a class="btn btn-danger" href="<?=base_url().'advertiser'?>"><i class="icol-cancel"></i> Cancel</a>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#submitadverProfile').click(function(){
  if($('#update_profile_view').valid()){
  var url =  $('#update_profile_view').attr('action');
  var data = $('#update_profile_view').serialize();
  var keeper = $('#update_profile_view');
  var msg,type,title;

  doAjaxCall(url,data,true,function(html){
  		if(html == 1){
			  msg = 'Profile Has been Updated Successfully.';
			  type = 'success';
			  title = 'Update Profile';
		  }
		if(html == 2){
			  msg = 'Profile Not Updated.';
			  type = 'error';
			  title = 'Failed Update';
		  }
		   
  $.pnotify({
  title: title,
  text: msg,
  type: type
  });
  });
  }
  })
  
  
$('#update_profile_view').validate();
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
  'uploader': base_url+'adv_loginuser/dashboard/do_upload/'+userId,
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