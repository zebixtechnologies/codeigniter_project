<script>
  $(document).ready(function(){
   $('#navigation ul  #li6').addClass('active open');
  $('#navigation ul #li6 #li4-1').addClass("active open");
  $('#content').removeClass();
  $('.userActionemail').click(function (){
    $("#usrInforMation").modal();
    var url = $(this).attr('url');
    var data = '';
    
    doAjaxCall(url,data,true,function(html){
    $('#usrInforMation').html(html);
    
     CKEDITOR.replace('mail_massage');
    $("#usrInforMation").modal('show');
    });
  });
  $('.userAction').click(function (){
    $("#usrInforMation").modal();
    var url = $(this).attr('url');
    var data = '';
    doAjaxCall(url,data,true,function(html){
    $('#usrInforMation').html(html);
    $("#usrInforMation").modal('show');
    });
  });
  });


  function submitMailForm(ref){
  var url 	= $('#approval_mail').attr('action');

  var data 	= $('#approval_mail').serialize();
  var button  = $(ref).val();
  $(ref).val('Sending Mail');
  $(ref).attr('disabled','disabled');

  doAjaxCall(url,data,false,function(html){
  $(ref).val('Mail Sent');
  if(html ==1){
  
  }
  });

  }
  /*var find = 'abc';
var re = new RegExp(find, 'g');

str = str.replace(re, '');
  function replaceAll(find, replace, str) {
  return str.replace(new RegExp(find, 'g'), replace);
}*/
  function submitMailMessage(ref){
  var url 	= $('#reply_mail').attr('action');
  var data 	= $('#reply_mail').serialize() + "&mail_massage=" + CKEDITOR.instances.mail_massage.getData().replace(/&/gi,"#") ;
  //alert(data);
  var button  = $(ref).val();
  $(ref).val('Sending Mail');
  $(ref).attr('disabled','disabled');

  doAjaxCall(url,data,false,function(html){
    //console.log($("#mail_massage"));
    //alert($("#mail_massage").html());
  $(ref).val('Mail Sent');
  //alert(html);
  if(html ==1){
  //alert('yes');
  }
  });

  }
</script>
<?
foreach($request_pending as $info)
?>
   <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-plus"></i>Request Pending</span>      
		<div class="toolbar">
          <div class="btn-group" > 
                <a class="btn Reg" href="#" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="  <?=date('m-d-Y h:i:s',$info->requesTime)?>"><i class="icon-info"></i> Request Time</a> 
          </div>
        </div>		  
        </div>
        
          <div class="widget-content form-container">
            
              <form name="show_subscription" onsubmit="return false;" action="" method="post" id="show_reseller" class="form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                   <div class="control-group">                    		
                    <label class="control-label " >User Name</label>
                    <div class="controls">
                      <?=$info->userName;?>
                     <input  type="hidden" class="required span12 " name="userId"  value="<?=$info->userId;?>"/>
                    </div>
                  </div>
                </div>
                <div class="span6">
                 <div class="control-group">    
                  <label class="control-label">Company</label>                		
                  <div class="controls">
                    <?=$info->company;?>
				</div>
                </div>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span6">
               <div class="control-group">    
                <label class="control-label" >Email</label>                		
                <div class="controls">
					<?php echo $info->email?>
                </div>
              </div>
            </div>

            <div class="span6">
             <div class="control-group">    
              <label class="control-label" >Website</label>                		
              <div class="controls">
                <a href="<?=$info->website;?>" target="_blank"> <?=$info->website;?></a>
              </div>
            </div>
          </div>

        </div>  
		
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Phone</label>
				<div class="controls">
				  <?=$info->phone;?>
				</div>                       
			  </div>
			</div>
		
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Request For</label>
				<div class="controls">
				  <?=($info->userType==1) ? '<span class="label label-info">Advertiser</span>':'<span class="label label-important"> Publisher </span>';?>
				</div>                       
			  </div>
			</div>
		</div>	
		
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Request Time</label>
				<div class="controls">
				  <?=date('m-d-Y h:i:s',$info->requesTime)?>
				</div>                       
			  </div>
			</div>
		</div>


                <div class="form-actions" >


                  <div class="pull-right">
                    <a href="
                      <?=base_url().'admin/signuprequest/declinerequest/'.$info->userId;?>"  role="button"  data-toggle="modal">
                      <input type="button" class="btn btn-inverse" value="Decline Request" >
				
			</a>
                    <a href="#" class="userAction" url="
                      <?=base_url().'admin/signuprequest/requestapproval/'.$info->userId;?>" role="button"  data-toggle="modal">
                      <input type="button" class="btn btn-info" value="<?=($info->lastLogin == '' && $info->isAccepted==1) ? 'Resend Custom Messege With Approval':'Custom Message With Approval' ?>" >
                    </a>
                    <a href="#" class="userActionemail" url="
                      <?=base_url().'admin/signuprequest/mailtocutomer/'.$info->userId;?>" role="button"  data-toggle="modal">
                      <input type="button" class="btn btn-primary" value="Reply by mail" >
			</a>

                  </div>



                </div>
      



            </form>
            
          
        </div>

</div>
      <div id="usrInforMation" class="modal hide fade"></div>
    </div>
</div>
</section>
</div>


</div>
</div>
<blockquote>&nbsp;</blockquote>
</div>