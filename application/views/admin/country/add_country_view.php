<script>
$(document).ready(function(){
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li4 #li4-2').addClass("active open");
  
    /*add function */
  $('#addNewCountryButton').click(function(){
  if($('#add_country').valid()){
	  var url =  $(this).closest('form').attr('action');  
	  var data = $(this).closest('form').serialize();  
	  var keeper = $(this).closest('form');
	  var msg,type,title;
	  doAjaxCall(url,data,true,function(html){
			if(html == 1){
				msg = 'Country has been added successfully.';
				type = 'success';
				title = 'add new Country';
			}else{
				msg = 'Country name already exist.';
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
          <span class="title"><i class="icon-plus"></i>Add New Country</span>                 
        </div>
        <div class="row-fluid">
         <form name="add_country" action="<?=base_url();?>admin/country_manage/addcountryprocess" method="post" id="add_country" onsubmit="return false;">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">New Country Name</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="country_name" id="email"/>
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Country Value</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="country_val" />
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
       <input type="submit" class="btn btn-info" value="Add New Country" id="addNewCountryButton">
       <a href="<?=base_url().'admin/country_manage'?>">
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