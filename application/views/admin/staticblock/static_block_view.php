<script>
$(document).ready(function(){
  $('#navigation ul  #li5').addClass('active open');
  $('#navigation ul #li5 #li5-'+'<?=$active?>').addClass("active open");
  $('#content').removeClass();
     /*add function */
  $('#EditAboutButton').click(function(){
   var pagedescription = encodeURIComponent(CKEDITOR.instances.pagedescription.getData());
  if($('#Edit_About').valid()){
     var url =  $(this).closest('form').attr('action');  
     var data = $(this).closest('form').serialize(); 
	  data+= '&pagedescription='+pagedescription; 
     var keeper = $(this).closest('form');
     var msg,type,title;
  doAjaxCall(url,data,true,function(html){
    				if(html == 1){
							msg = $('#PageName').val()+ ' Page Successfully Update .';
							type = 'success';
							title = 'Update Block';
					}else{
							msg = 'Your current Password does not match.';
							type = 'error';
							title = 'Update Block Failed';
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
<?
foreach($blockInfo as $info);
?>
   <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-plus"></i><?=ucfirst($info->pagename);?></span>                 
        </div>
        <div class="row-fluid">
         <form name="add_subscription" action="<?=base_url();?>admin/staticblock/updateBlock" method="post" id="Edit_About" onsubmit="return false;">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                   <div class="control-group">                    		
                    <label class="control-label " for="PageName">Page Name</label>
                    <div class="controls">
                      <input  type="text" class="required span12 " name="PageName" id="PageName" value="<?=$info->pagename;?>"/>
                    </div>
                  </div>
                </div>
                <div class="span6">
                 <div class="control-group">    
                  <label class="control-label" for="pagetitle">Page Title</label>                		
                  <div class="controls">
                    <input  type="text" class="required span12 " name="pagetitle" id="pagetitle" value="<?=$info->pagetitle;?>"/>
                    <input  type="hidden" class="required span12 " name="edit_id"  value="<?=$info->pageid;?>"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span6">
               <div class="control-group">    
                <label class="control-label" for="metaname">Page Meta</label>                		
                <div class="controls">
                  <input  type="text" class="span12 required" name="metaname" id="metaname" value="<?=$info->metaname;?>"/>
                </div>
              </div>
            </div>

            

        
         
        <div class="span6">
           <div class="control-group">                                                
            <label class="control-label" for="metadescription">Meta Description</label>
            <div class="controls">
             <textarea id="metadescription" class="span12 required" name="metadescription"><?=$info->metadescription;?></textarea>
            </div>                       
          </div>
        </div>
      </div><div class="row-fluid">
         
        
           <div class="control-group">                                                
            <label class="control-label" for="pagedescription">Page Description</label>
            <div class="controls">
             <textarea id="pagedescription" class="ckeditor span12 required" name="pagedescription"><?=$info->pagedescription;?></textarea>
                                
          </div>
        </div>
      </div>
      <div class="form-actions" >
       <input type="submit" class="btn btn-info" value="Update <?=$info->pagename;?>" id="EditAboutButton" >
       <a href="<?=base_url().'admin/dashboard'?>" class="btn btn-warning" > Cancel </a>
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