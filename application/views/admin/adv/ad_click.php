<!--<script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery.js" /></script>-->
<script>
  $(document).ready(function(){
  
  $('#navigation ul  #li7').addClass('active open');
  $('#navigation ul #li7 #li7-3').addClass("active open");
  $('#content').removeClass();


  $('#updateSettingButton').click(function(){
  if($('#show_reseller').valid()){
  var url =  $(this).closest('form').attr('action');
  var data = $(this).closest('form').serialize();
  var keeper = $(this).closest('form');
  var msg,type,title;
  doAjaxCall(url,data,true,function(html){
  if(html == 1){
  msg = 'Setting has been Saved';
  type = 'success';
  title = 'Setting  Saved';
  }else{
  msg = 'Setting Not Saved';
  type = 'error';
  title = 'Setting Not Saved';
  }

  $.pnotify({
  title: title,
  text: msg,
  type: type
  });
  });
  }
  })
  $('#saveCommissionSetting').click(function(){
		//if($('#show_reseller').valid()){
				  var url =  $(this).closest('form').attr('action');
				  var data = $(this).closest('form').serialize();
				  var keeper = $(this).closest('form');
				  var msg,type,title;
				  doAjaxCall(url,data,true,function(html){
				  if(html == 1){
				  msg = 'Setting has been Saved';
				  type = 'success';
				  title = 'Setting  Saved';
				  }else{
				  msg = 'Setting Not Saved';
				  type = 'error';
				  title = 'Setting Not Saved';
				  }

				  $.pnotify({
				  title: title,
				  text: msg,
				  type: type
				  });
				  });
		//}
  
  })
  
  });
</script>
<?
foreach($setting as $info){
?>
   <div id="main-content">
   <div class="row-fluid">
                                    <!--<div class="span6 widget">
                                        <div class="widget-header">
                                            <span class="title">Accept Max Click From Same IP</span>
                                        </div>
                                        <div class="widget-content form-container">
                                           <div class=" form-horizontal remove-top-border">
            <form name="show_subscription" onsubmit="return false;" action="<?=base_url().'admin/adv_manage/saveclicksetting/'?>" method="post" id="show_reseller">
          

                <div class="row-fluid">
                
                   <div class="control-group">                    		
                    <label class="control-label"> Ad Max Click </label>
                    <div class="controls">
                      <input type="text" name="max_clicks" value="<?=$info->maxClickLimit;?>" class="number required" />
					 <span class="help-block">Showing warning Message to you.When Max Clcik From same Ip. </span>
                     </div>
                  </div>
             
			   <div class="form-actions">
						<input type="submit" class="btn btn-primary" value="Save Click Setting" id="updateSettingButton" />
				</div>
                </div>
        </form>
            </div>

                                        </div>
                                    </div>-->
<?}?>
<? foreach($cmm_setting as $info){?>
                                    <div class="span6 widget">

                                        <div class="widget-header">
                                            <span class="title">Set Commission Value For Admin</span>
                                        </div>
                                        <div class="widget-content form-container">
                                            <form class="form-horizontal" id="save_commision" action="<?=base_url().'admin/adv_manage/savecommisionsetting'?>" onsubmit="return false;">
                                                <div class="control-group">
                                                    <label class="control-label" for="input23">Commission Rate</label>
                                                    <div class="controls">
                                                       <div class="input-append input-prepend">
                                                            	<input type="text" id="input13" name="commission_rate" value="<?=$info->commission;?>" class="required number"><span class="add-on">%</span>
                                                            </div>
														<span class="help-block">Set Commission Value For Admin.</span>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary" id="saveCommissionSetting">Save Commission Setting</button>
                                                    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
									
<?}?>									
                                </div>

  
</div>
<div id="usrInforMation" class="modal hide fade">
</div>

  </section>
</div>	

</div>
</div>
<blockquote>&nbsp;</blockquote>
</div>

<script>
	$(document).ready(function(){
            $('#save_commision').validate();
	})
</script>