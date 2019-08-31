<script>
$(document).ready(function(){
  
  $('#navigation ul  #li9').addClass('active open');
  $('#navigation ul #li9 #li9-3').addClass("active open");
  
});
</script>
   <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-plus"></i>Duplicate Vehicle</span>                 
        </div>
        <div class="row-fluid">
         <form name="add_state" action="" method="post">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="year">Duplicate from Year</label>
						<div class="controls">
							<select class="required span12 " name="duplicateyear" required>
								<?php
									if(isset($years) && !empty($years)){
										foreach($years as $year){
											echo '<option value="'.$year->year.'">'.$year->year.'</option>';
										}
									}
								?>
							</select>
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="make">Next Year</label>
						<div class="controls">
						<input  type="number" class="required span12 " name="year" value="<?php echo date('Y'); ?>" required />
						</div>
					</div> 
					</div>
				</div>
      </div>
      <div class="form-actions" >
       <input type="submit" class="btn btn-info" value="Duplicate Vehicle">
       <a href="<?=base_url().'admin/manage_vehicle'?>">
          <input type="button" class="btn btn-info" value="Cancel" >
        </a>
      </div>
  </div>
</div>
</div>
</form>
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