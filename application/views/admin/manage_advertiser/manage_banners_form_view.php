<script>
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li3').addClass('active open');
  $('#navigation ul #li3 #li3-3').addClass("active open");
 });
</script>
<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>Registered Advertiser Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
                
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll table-hover" id="advertiser_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Category Name</th>
              <th>Banner</th>
              <th>Banner URL</th>
              <th>Action</th>
              <th>Delete</th>
              
			 
			  
            </tr>
          </thead>
          <tbody>
           <?php 
            $s_no = 1;
            foreach($categories as $cat){
                if($cat->categoryId != THIRD_PARTY_ONLY){
            ?>
            <tr id="<?=$cat->categoryId;?>" >
              <td><?php echo $s_no;?></td>
              <td><?php echo $cat->categoryName;?></td>
              <td><?php if(strlen($cat->banner_name) > 0){ ?><img src="<?=base_url().'assets/uploads/category/'.$cat->banner_name?>" width="80px" height="40px"/><?php } ?></td>
              <td><?php if(strlen($cat->banner_link) > 0){ echo $cat->banner_link;  } ?></td>
              <td><a href="<?=base_url().'admin/manage_advertiser/manage_banner_category/'.$cat->categoryId; ?>"><input type="button" class="btn btn-info" value="Manage Banner"> </a></td>	
              <td><a href="<?=base_url().'admin/manage_advertiser/deleteBanner/'.$cat->categoryId; ?>"><input type="button" class="btn btn-warning" value="Delete Banner"> </a></td>	
			</tr>
            <?php $s_no++; }} ?>
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
<div id="usrInforMation" class="modal hide fade">
</div>