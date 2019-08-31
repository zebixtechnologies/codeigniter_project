
<script>
$(document).ready(function(){
  
  $('#navigation ul  #li6').addClass('active open');
  $('#navigation ul #li6 #li6-4').addClass("active open");
   $('#sendemailtopubs').click(function(){
  $('#sendmail').valid()
   });
  });
</script>
<style>
    .row-fluid .span6 .controls .cke_chrome {
        width: 600px;
    } 
</style>
 <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-list-2"></i>Send Email To ALL Publishers</span>                 
        </div>
        <div class="row-fluid">
         <form name="sendmail" action="<?=base_url();?>admin/user_manage/sendemailpubs" method="post" id="sendmail">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                    <div class="row-fluid">
                      <div class="span6">                    
                            <div class="control-group">                    		
                                <label class="control-label " for="email">Mail Subject</label>
                                <div class="controls">
                                <input  type="text" class="required span12 " name="mailsubject" id="mailsubject"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">                    
                            <div class="control-group">                    		
                              <label class="control-label " for=""> Message</label>
                            <div class="controls">
                                                      <textarea name="mail_massage" class="ckeditor required span12" ></textarea>
                            </div>
                            </div>
                        </div>
                    </div>
				
	   </div>
      <div class="form-actions" >
       <input type="submit" class="btn btn-info" value="Send Email" id="sendemailtopubs">
       <a href="<?=base_url().'admin/user_manage'?>">
          <input type="button" class="btn btn-info" value="Cancel" >
        </a>
      </div>
  </div>
</div>
             </form>
</div>

</div>
</div>
</div>