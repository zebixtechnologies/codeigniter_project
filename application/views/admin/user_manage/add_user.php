<script>
$(document).ready(function(){
  
  $('#navigation ul  #li6').addClass('active open');
  $('#navigation ul #li6 #li6-3').addClass("active open");
  
    /*add function */
  $('#addNewAdvertiser').click(function(){
  if($('#add_state').valid()){
	  var url =  $(this).closest('form').attr('action');  
	  var data = $(this).closest('form').serialize();  
	  var keeper = $(this).closest('form');
	  var msg,type,title;
	  doAjaxCall(url,data,true,function(html){
			if(html == 1){
				msg = 'Advertiser has been added successfully.';
				type = 'success';
				title = 'add new Advertiser';
			}if(html==2){
				msg = 'Advertiser already exist.';
				type = 'error';
				title = 'Failed to add';
			}if(html==3){
				msg = 'Email already exist.';
				type = 'error';
				title = 'Failed to add';
			}if(html==4){
				msg = 'Category not selected.';
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
          <span class="title"><i class="icon-plus"></i>Add Advertiser</span>                 
        </div>
        <div class="row-fluid">
         <form name="add_state" action="<?=base_url();?>admin/user_manage/saveuser" method="post" id="add_state" onsubmit="return false;">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Advertiser Name</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="name" id="name"/>
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Company</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="company_name" />
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Login Name</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="user_name" />
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Email</label>
						<div class="controls">
						<input  type="text" class="required email span12 " name="email" />
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Password</label>
						<div class="controls">
						<input  type="password" class="required span12 " name="password" />
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Phone</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="phone" />
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">WebSite URL</label>
						<div class="controls">
						<input  type="text" class="required span12 " name="website" value="http://"/>
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Categories</label>
						<div class="controls">
							<?php foreach($category as $cat){?>
						
						<label class="checkbox" for="cat_<?=$cat->categoryId;?>"><?=$cat->categoryName;?>
							<input type="checkbox"  value="<?=$cat->categoryId;?>" name="category[]" />
							
						</label>
						<?}?>
						</div>
					</div>
					</div>
				</div>
				
				
				 
       
        
      </div>
      <div class="form-actions" >
       <input type="submit" class="btn btn-info" value="Add Advertiser" id="addNewAdvertiser">
       <a href="<?=base_url().'admin/user_manage'?>">
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