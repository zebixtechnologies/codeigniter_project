<script>
$(document).ready(function(){
  
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li4 #li4-3').addClass("active open");
  
    /*add function */
  $('#addNewstateButton').click(function(){
  if($('#add_state').valid()){
	  var url =  $(this).closest('form').attr('action');  
	  var data = $(this).closest('form').serialize();  
	  var keeper = $(this).closest('form');
	  var msg,type,title;
	  doAjaxCall(url,data,true,function(html){
			if(html == 1){
				msg = 'State has been added successfully.';
				type = 'success';
				title = 'add new State';
			}else{
				msg = 'State name already exist.';
				type = 'error';
				title = 'Failed to add';
			}
			
		$.pnotify({
				title: title,
				text: msg,
				type: type
			});
		if(html==1){
		keeper.find('input[type="text"],input[type="password"],textarea').val('');
		keeper.find('textarea.ckeditor').val('');
		keeper.find('input[type="checkbox"]').prop('checked',false);
		keeper.find('input[type="checkbox"]').removeAttr('checked');
	   
		}
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
          <span class="title"><i class="icon-plus"></i>Add New State</span>                 
        </div>
        <div class="row-fluid">
         <form name="add_state" action="<?=base_url();?>admin/state_manage/addstateprocess" method="post" id="add_state" onsubmit="return false;">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">New State Name</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="state_name" id="email"/>
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">State Value</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="state_val" />
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Country Selection</label>
						<div class="controls">
						<select name="country" class="required">
							<option value="">Country</option>
							<?foreach($country as $cou) {
							?>
							<option value="<?=$cou->countryId?>"><?=$cou->name?></option>
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
              <input type="checkbox"  class="" name="isActive" id="isActive" data-provide="ibutton" data-label-on="It's Active" data-label-off="It's Deactive" value="1" >
            </div>                       
          </div>
        </div>
        
      </div>
      <div class="form-actions" >
       <input type="submit" class="btn btn-info" value="Add New State" id="addNewstateButton">
       <a href="<?=base_url().'admin/state_manage'?>">
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