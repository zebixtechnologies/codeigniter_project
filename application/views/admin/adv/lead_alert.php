<!--<script type="text/javascript" src="<?=base_url()?>assets/forms/js/jquery.js" /></script>-->
<script>
  $(document).ready(function(){
  
  $('#navigation ul  #li7').addClass('active open');
  $('#navigation ul #li7 #li7-5').addClass("active open");
  $('#content').removeClass();
  });
</script>

   <div id="main-content">
   <div class="row-fluid">
       <?php foreach($cmm_setting as $info){
       if($info->lead_alert=='1'){?>
       <script type="text/javascript">
       $(document).ready(function(){
       document.getElementById("enable").checked=true;
       });
       </script>
       <?php  }else{?>
       <script type="text/javascript">
       $(document).ready(function(){
       document.getElementById("disable").checked=true;
       });
       </script>
       <?php }}?>


        <div class="span6 widget">

            <div class="widget-header">
                <span class="title"> Enable Lead Alert</span>
            </div>
            <div class="widget-content form-container">
                <form class="form-horizontal" id="lead_alrt" action="<?=base_url().'admin/adv_manage/saveLeadAlert'?> " method="post">
                    <div class="control-group">
                        <label class="control-label">Enable</label>
                        <div class="controls">
                            <div class="input-append input-prepend">
                                <input type="radio" id="enable" name="enable" value="1" class="required number">
                            </div>
                         </div>
                         <br />
                         <label class="control-label">Disable</label>
                         <div class="controls">
                             <div class="input-append input-prepend">
                                <input type="radio" id="disable" name="enable" value="0" class="required number">
                             </div>
                         </div>	
                     </div>
                     <div class="form-actions">
                          <button type="submit" class="btn btn-primary" id="saveLeadalert">Save Lead Alert</button>

                     </div>
                </form>
            </div>
        </div>
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
