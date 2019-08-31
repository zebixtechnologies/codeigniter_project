<script>
$(document).ready(function(){
var base_url='<?=base_url()?>';
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li4 #li4-1').addClass("active open");
  
    /*add function */
  $('#addNewCategoryButton').click(function(){
  if($('#add_category').valid()){
	  var url =  $(this).closest('form').attr('action');  
	  var data = $(this).closest('form').serialize();  
	  var keeper = $(this).closest('form');
	  var msg,type,title;
	  doAjaxCall(url,data,true,function(html){
			if(html == 1){
				window.location.href=base_url+"admin/category_manage";
			}else{
				msg = 'Category name already exist.';
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
          <span class="title"><i class="icon-plus"></i>Add New Category</span>                 
        </div>
        <div class="row-fluid">
         <form name="add_category" action="<?=base_url();?>admin/category_manage/addcategoryprocess" method="post" id="add_category" onsubmit="return false;">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">New Category Name</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="category_name" id="email"/>
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Select Parent Category</label>
						<div class="controls">
							<select name="parent_category" class="required">
								<option value="0"> Parent Category </option>
								<?
								foreach($category as $cat){
								?>
									<option value="<?=$cat->categoryId;?>"> <?=$cat->categoryName;?></option>
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
						<label class="control-label " for="email">Category Detail</label>
						<div class="controls">
						<textarea name="category_detail"></textarea>
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
       <input type="submit" class="btn btn-info" value="Add New Category" id="addNewCategoryButton">
       <a href="<?=base_url().'admin/category_manage'?>">
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