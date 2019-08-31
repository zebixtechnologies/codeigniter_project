<script>
$(document).ready(function(){
  
  $('#navigation ul  #li9').addClass('active open');
  $('#navigation ul #li9 #li9-2').addClass("active open");
  
});
</script>
   <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-plus"></i>Add Vehicle</span>                 
        </div>
        <div class="row-fluid">
         <form name="add_state" action="" method="post">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="year">Year</label>
						<div class="controls">
						<input  type="number" class="required span12 " name="year" value="<?php echo date('Y'); ?>" required />
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="make">Make</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="make" required />
						</div>
					</div> 
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="model">Model</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="model" required />
						</div>
					</div>
					</div>
				</div>
				
        
      </div>
      <div class="form-actions" >
       <input type="submit" class="btn btn-info" value="Add Vehicle">
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