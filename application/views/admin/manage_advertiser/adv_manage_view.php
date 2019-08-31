<script type="text/javascript">
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li3').addClass('active open');
  $('#navigation ul #li3 #li3-1').addClass("active open");
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
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i> Advertisment Listing</span>
        <div class="toolbar">
          <!--<div class="btn-group" > 
                <a class="btn Reg" href="<?php //echo base_url();?>admin/manage_advertiser/addnewAd/<?php //$userId;?>" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Create AD To Adevertiser <? if(isset($userads[0]->userName)){echo '('. $userads[0]->userName .')';}?> "><i class="icon-plus"></i> Add New Ad</a>
          </div>-->
        </div>
      </div>
	    <div class="widget-content form-container" style="display:none;">
                <div class="row-fluid pad-xl">
    <div class="span4">
		<div class="alignCenter">
      <?php if(!empty($formIcon)){?>
      <img src="<?= ($formIcon[0]->adverFromIcon !='') ? base_url().$formIcon[0]->adverFromIcon : base_url().'assets/user/design/images/no_ad_icon.jpg' ?>" id="adver_ad_icon"><br/>
        <?php }else{?>
        <img src="<?= base_url().'assets/user/design/images/no_ad_icon.jpg'; ?>" id="adver_ad_icon"><br/>
             <?php }?>
        <span class="lead">(Recommended size <?=ADVER_LOGO_WIDTH.' x '.ADVER_LOGO_HEIGHT?>)</span>
		</div>
	</div>
	<div class="span6">
		     <?php echo form_open_multipart(); ?>
											
												<?php echo form_upload('userfile','','id="userfile"'); ?>
												
											  
											<?php echo form_close(); ?>
	</div>
	</div>
	</div>
	
	
	
      <div class="widget-content table-container">
          <div class="row-fluid">
                <table id="adv_listings" class="table table-striped">
                        <thead>
                                <tr>
                                        <th>S. No.</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Publisher</th>
                                        <th>Lead Details</th>
                                        
                                </tr>
                        </thead>
                        <tbody>
                                <?	$i=1;
                                        foreach($records_info as $info){ ?>
                                                <tr>
                                                        <td><?=$i;?></td>
                                                        <td><?=$info->category_name;?></td>
                                                        <td><?=date('m-d-Y h:m:s',$info->givenDate);?></td>
                                                        <td><?=$info->name;?></td>
                                                        <td>
                                                                <input type="button" class="btn btn-danger userAction" value="Lead Detail" url="<?=base_url().'admin/adtrack/showLeadDetails/'.$info->form_data_id;?>">
                                                        </td>


                                                </tr>
                                <?	$i++;
                                }	?>
                        </tbody>
                </table>

        </div>
        <!--<table class="table table-striped table-flipscroll table-hover" id="adv_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Banner Image</th>
              <th>Adv Name</th>
              <th>Adv Title</th>
              <th>Bid Per Lead</th>
              <th>Adv Status</th>
              <th>Admin Approval</th>
              <th>Site URL </th>
			  <th>Approval Time</th>
			</tr>
          </thead>
          <tbody>
           <?php 
           //$s_no = 1;
           //foreach($userads as $info){
             ?>
            <tr id="<?=$info->adId;?>" class="goforDetail" style="cursor:pointer">
              <td><?=$s_no;?></td>
              <td><img src="<?=base_url().'assets/admin_property/assets/images/loading.gif';?>" data-original="<?=($info->adType==1) ? base_url().$info->adIcon_display : base_url().$info->small_bannerImage;?>" class="lazy" title="<?=$info->adName;?>" alt="<?=$info->adName;?>"></td>
              <td><?=$info->adName;?></td>
			  <td><?=substr($info->adTitle,0,20);?></td>
              <td><span class="label label-warning"> <?=SITE_CURRENCY;?><?=number_format($info->bid_ppc,2);?> </span></td>
			   <td><?if($info->isActive == 0) {
					echo '<span class ="label  label-inverse"> Inactive </span>';
					  }else if($info->isActive == 1){
							echo  '<span class="label label-success"> Active </span>';
					  }else if($info->isActive == 2){
							echo  '<span class="label label"> Suspend </span>';
					  };?>
			  </td>
			  <td><?if($info->isApproved == 0) {
					echo '<span class ="label label-important"> Pending </span>';
					  }if($info->isApproved == 1){
							echo  '<span class="label label-success"> Approved </span>';
					  }else if($info->isApproved == 2){
							echo  '<span class="label label"> Decline </span>';
					  };?></td>
			  <td><a href="<?=$info->siteUrl;?>" target="_blank"><?=substr($info->siteUrl,0,30);?></a></td>
			  <td><?=date('m-d-Y h:m:s',$info->approvalTime);?></td>			  
			</tr>
            <?php// $s_no++; } ?>
          </tbody>
        </table>-->
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