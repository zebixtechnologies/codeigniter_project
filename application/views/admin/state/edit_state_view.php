<script>
$(document).ready(function(){
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li4 #li4-3').addClass("active open");
  
    /*add function */
  $('#updateStateButton').click(function(){
  if($('#edit_state').valid()){
	  var url =  $(this).closest('form').attr('action');  
	  var data = $(this).closest('form').serialize();  
	  var keeper = $(this).closest('form');
	  var msg,type,title;
	  doAjaxCall(url,data,true,function(html){
			if(html == 1){
				msg = 'State has been update successfully.';
				type = 'success';
				title = 'Update State';
			}else{
				msg = 'State name already exist.';
				type = 'error';
				title = 'Failed to update';
			}
			
		$.pnotify({
				title: title,
				text: msg,
				type: type
			});
		});
	}
})
 /*end add function */
});
</script>
   <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-plus"></i>Edit Current State</span>                 
        </div>
        <div class="row-fluid">
		<? foreach($state_info as $info )?>
         <form name="edit_state" action="<?=base_url();?>admin/state_manage/updatestateprocess" method="post" id="edit_state" onsubmit="return false;">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">State Name</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="state_name" id="email" value="<?=$info->stateName;?>"/>
						<input type="hidden" name="editId" value="<?=$info->stateId;?>">
						</div>
					</div>
					</div>
				</div>
			
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">State Value</label>
						<div class="controls">
						<input type="text" name="state_val" value="<?=$info->stateValue;?>">
						</div>
					</div>
					</div>
				</div>
				
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Country Selection</label>
						<div class="controls">
						<select name="country">
							<option value="">Country</option>
							<?foreach($country as $cou) {
							?>
							<option value="<?=$cou->countryId?>" <?=($cou->countryId==$info->countryId) ? 'selected':'';?>><?=$cou->name?></option>
							<?
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
            <label class="control-label" for="isActive">Active Status</label>
            <div class="controls">
              <input type="checkbox"  class="" name="isActive" id="isActive" data-provide="ibutton" data-label-on="It's Active" data-label-off="It's Deactive" value="1" <?=( $info->isActive == 1 ) ? 'checked':'';?>>
            </div>                       
          </div>
        </div>
        
      </div>
      <div class="form-actions" >
       <input type="submit" class="btn btn-info" value="Update State" id="updateStateButton">
         <a href="<?=base_url().'admin/state_manage'?>" class="btn btn-info" >Cancel   </a>
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