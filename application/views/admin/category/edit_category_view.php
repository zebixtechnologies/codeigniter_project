<script>
$(document).ready(function(){
var base_url='<?=base_url()?>';
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li4 #li4-1').addClass("active open");
  
    /*add function */
  $('#updateCategoryButton').click(function(){
  if($('#edit_category').valid()){
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
          <span class="title"><i class="icon-plus"></i>Edit Current Category</span>                 
        </div>
        <div class="row-fluid">
		<? foreach($category_info as $info )?>
         <form name="edit_category" action="<?=base_url();?>admin/category_manage/updatecategoryprocess" method="post" id="edit_category" onsubmit="return false;">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Category Name</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="category_name" id="email" value="<?=$info->categoryName;?>"/>
						<input type="hidden" name="editId" value="<?=$info->categoryId;?>">
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
								<option value="0" <?=($info->parentCategory==0) ? 'selected':'';?>> Parent Category </option>
								<?
								foreach($category as $cat){
								?>
									<option value="<?=$cat->categoryId;?>" <?=($info->parentCategory==$cat->categoryId) ? 'selected':'';?>> <?=$cat->categoryName;?></option>
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
						<textarea name="category_detail" ><?=$info->categoryDescription;?></textarea>
						</div>
					</div>
					</div>
				</div>
				 
        <div class="row-fluid">
          <div class="span6">
           <div class="control-group">                    		                        
            <label class="control-label" for="isActive">Active Status</label>
            <div class="controls">
				
              <input type="checkbox"  name="isActive" id="isActive" data-provide="ibutton" data-label-on="It's Active" data-label-off="It's Deactive" value="1" <?=( $info->isActive == 1 ) ? 'checked="checked"':'';?>/>
            </div>                       
          </div>
        </div>
        
      </div>
      <div class="form-actions" >
       <input type="submit" class="btn btn-info" value="Update Category" id="updateCategoryButton">
       <a href="<?=base_url().'admin/category_manage'?>" class="btn btn-info" >Cancel</a>
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