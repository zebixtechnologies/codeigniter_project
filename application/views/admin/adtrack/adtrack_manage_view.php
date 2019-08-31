<script>
  $(document).ready(function(){
    var base_url = '<?=base_url();?>';
  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-1').addClass("active open");
  $('#content').removeClass();
 
  });
  
</script>

<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>AD Tracking Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
                
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll table-hover" id="ad_track">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Banner</th>
              <th>AD Name</th>
              <th>PPA</th>
              
              <th>State</th>
              <th>Leads</th>
              <th>CTR</th>
              <th>Action</th>
			</tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($records as $info){
             ?>
            <tr id="<?=$info->adId;?>" class="goforDetail" style="cursor:pointer">
              <td><?=$s_no;?></td>
              <td><img src="<?=base_url().'assets/admin_property/assets/images/loading.gif';?>" 	data-original="<?=base_url().$info->small_bannerImage;?>" class="lazy" 	title="<?=$info->adName;?>" alt="<?=$info->adName;?>">
               	 </td>
					<td><?=$info->adName;?></td>
					<td><?=$info->bid_ppc * $info->click;?></td>
					
					<td><?=$info->stateName;?></td>
					<td><?if($info->click > 0 ){?>
					<a href="<?=base_url().'admin/adtrack/adclickdetail/'.$info->adId;?>" class="btn btn-info">Leads Info total(<?=$info->click;?>)</a>
					<?}else{
						echo '<span class="label label-impotant">No History</span>';
					}?></td>
					<td><?=$info->ctr;?></td>
					<td><a href="<?=base_url();?>admin/adtrack/adtrackdetail/<?=$info->adId?>" class="btn btn-info">view</a></td>
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
<script>
$(document).ready(function(){
  $('#ad_track').dataTable({
   "sPaginationType":"full_numbers",
   "aaSorting":[[0, "asc"]]
 //  "aoColumnDefs": [{ 'bSortable':false,'aTargets':[8]}]
   });

})
</script>