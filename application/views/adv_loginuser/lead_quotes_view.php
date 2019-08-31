<script>
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-3').addClass("active open");
 });
</script>
<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>Lead Qutes Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
                
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll table-hover" id="advertiser_listing">
          <thead>
            <tr>
              <th class="">S.No.</th>
              <th class="span2">Category Name</th>
              <th class="span2">Premium Rate(%)</th>
              <th class="span2">Flat Rate (<?php echo SITE_CURRENCY;?>)</th>
              <th>
                  Additional Information
              </th>
              <th class="span2">Action</th>
              <!--<th>Active ADS</th>-->
              
			 
			  
            </tr>
          </thead>
          <tbody>
           <?php 
            $s_no = 1;
            foreach($categories as $cat){
                
            ?>
            <tr id="<?=$cat->categoryId;?>" >
                <td><?php echo $s_no;?></td>
              <td><?php echo $cat->categoryName;?></td>
              <td><?php echo $cat->percentage; ?></td>
              <td><?php  echo $cat->falt_rate; ?></td>
              <td><?php  echo $cat->additional_info; ?></td>
              <td><a href="<?=base_url().'adv_loginuser/dashboard/manage_lead_quotes/'.$cat->categoryId; ?>"><input type="button" class="btn btn-info" value="Manage Quotes"> </a></td>			  
			</tr>
            <?php $s_no++; } ?>
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