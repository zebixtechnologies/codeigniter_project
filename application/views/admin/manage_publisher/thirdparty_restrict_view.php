<script>
$(document).ready(function(){
    $('#navigation ul  #li7').addClass('active open');
    $('#navigation ul #li7 #li7-4').addClass("active open");
    $('#saverestrictuser').click(function(){
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

    });
    $('#publishers').change(function(){
        var url = "<?php echo base_url();?>admin/manage_publisher/selectedPubResAdvertisres/"+ $(this).val()   ;
      //  alert(url);
        var data ="";
        doAjaxCall(url,data,true,function(html){
//            console.log(html);
            $("#checkboxContainer").html(html);
        });
    });
});
</script>
<style>
    ul li{
        list-style-type: none;
    }
</style>
<div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-list-2"></i>Third Party Restrict</span>                 
        </div>
        <div class="row-fluid">
            <form name="sendmail" action="<?=base_url();?>admin/manage_publisher/saveRestrictUser" method="post" id="sendmail" onsubmit='return false;'>
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
        
                <div class="row-fluid">
                  <div class="span6">                    
                        <div class="control-group">                    		
                            <label class="control-label " for="email">Publishers</label>
                            <div class="controls">
                                <select name="publishers" id="publishers">
                                    <?php
                                        foreach($publishers as $publisher){
                                            echo "<option value='$publisher->userId'>$publisher->name</option>";
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
                            <label class="control-label " for=""> Advertisers</label>
                            <div class="controls" id="checkboxContainer">
                                <ul><?php 
                                if(isset($advs) && is_array($advs)){
                                    foreach ($advs as $adv){
                                        //print_r($adv);
                                        foreach ($adv as $advertiser){
                                            $checked = isset($restrictAdv) && is_array($restrictAdv) && in_array($advertiser->userId, $restrictAdv) ? "checked" : "";
                                            echo "<li><input $checked type='checkbox' name='advertisers[]' value='$advertiser->userId'/>$advertiser->name</li>";
                                        }
                                    }
                                }
                                ?></ul>
                                                    
                            </div>
                        </div>
                    </div>
                </div>
				
	   </div>
      <div class="form-actions" >
        <button type="submit" class="btn btn-info" id="saverestrictuser">Save</button>
  
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
</div>
</div>
</div>
</div>