<script>
	$(document).ready(function(){
		var base_url = '<?=base_url();?>';
		$('#navigation ul  #li9').addClass('active open');
		$('#navigation ul #li9 #li9-1').addClass("active open");
	});
</script>
<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>Vehicle Models</span>
        <div class="toolbar">
          <div class="btn-group" > 
                
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll" id="user_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Year</th>
              <th>Make</th>
              <th>Model</th>
			  <th>Action</th>
			  <th>Action</th>
		</tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($vehicles as $vehicle){
             ?>
            <tr>
              <td><?=$s_no;?></td>
              <td><?=$vehicle->year;?></td>
			  <td><?=$vehicle->make;?></td>
              <td><?=$vehicle->model;?></td>
			  <td><a href="<?=base_url().'admin/manage_vehicle/edit/'.$vehicle->id;?>" class="btn btn-info">Edit</a></td>
			  <td><a href="<?=base_url().'admin/manage_vehicle/deleteVehicle/'.$vehicle->id;?>"   class="btn btn-info">Delete</a></td>
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
