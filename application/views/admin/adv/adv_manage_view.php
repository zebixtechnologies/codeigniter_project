<script>
$(document).ready(function(){

	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li3').addClass('active open');
  $('#navigation ul #li3 #li3-2').addClass("active open");
  $('#content').removeClass();
  $('.goforDetail').click(function(){
		window.location.href = base_url+"admin/adv_manage/advdetail/"+$(this).attr('id');
  })
  })
  
</script>

<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>Request Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
                
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll table-hover" id="user_request_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Banner</th>
              <th>AD Name</th>
              <th>AD Title</th>
              <th>User Name</th>
              <th>Category Name</th>
              <th>User Type</th>
			  <th>Request Time (mm-dd-yy)</th>
			  
            </tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($request_pending as $info){
             ?>
            <tr id="<?=$info->adId;?>" class="goforDetail" style="cursor:pointer">
              <td><?=$s_no;?></td>
               	<td><img src="<?=base_url().'assets/admin_property/assets/images/loading.gif';?>" data-original="<?=($info->adType==1) ? base_url().$info->adIcon_display : base_url().$info->small_bannerImage;?>" class="lazy" title="<?=$info->adName;?>" alt="<?=$info->adName;?>"></td>
              <td><?=$info->adName;?>
               	 </td>
               <td><?=$info->adName;?></td>
			    <td><?=substr($info->adTitle,0,20);?></td>
			    <td><?=$info->userName;?></td>
			    <td><?=$info->categoryName;?></td>
			  <td><?=($info->userType==1) ? '<span class="label label-info">Advertiser</span>':'<span class="label label-important"> Publisher </span>';?></td>
              <td><?=date('m-d-Y h:m:s',$info->requesTime);?></td>			  
			</tr>
            <? $s_no++; } ?>
          </tbody>
        </table>
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
