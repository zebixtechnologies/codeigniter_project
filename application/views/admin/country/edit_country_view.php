<script>
$(document).ready(function(){
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li4 #li4-2').addClass("active open");
  
    /*add function */
  $('#updateCountryButton').click(function(){
  if($('#edit_country').valid()){
	  var url =  $(this).closest('form').attr('action');  
	  var data = $(this).closest('form').serialize();  
	  var keeper = $(this).closest('form');
	  var msg,type,title;
	  doAjaxCall(url,data,true,function(html){
			if(html == 1){
				msg = 'Country has been update successfully.';
				type = 'success';
				title = 'Update Country';
			}else{
				msg = 'Country name already exist.';
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
          <span class="title"><i class="icon-plus"></i>Edit Current Country</span>                 
        </div>
        <div class="row-fluid">
		<? foreach($country_info as $info )?>
         <form name="edit_country" action="<?=base_url();?>admin/country_manage/updatecountryprocess" method="post" id="edit_country" onsubmit="return false;">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Country Name</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="country_name" id="email" value="<?=$info->name;?>"/>
						<input type="hidden" name="editId" value="<?=$info->countryId;?>">
						</div>
					</div>
					</div>
				</div>
			
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Country Value</label>
						<div class="controls">
						<input type="text" name="country_val" value="<?=$info->value;?>">
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
       <input type="submit" class="btn btn-info" value="Update Country" id="updateCountryButton">
       <a href="<?=base_url().'admin/country_manage'?>" class="btn btn-info" >Cancel   </a>
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