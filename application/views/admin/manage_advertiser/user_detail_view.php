<script>
$(document).ready(function(){

  $('#navigation ul  #li6').addClass('active open');
  $('#navigation ul #li6 #li4-1').addClass("active open");
  $('#content').removeClass();
 
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
				alert('yes');
			}
		});	
	
}
function submitMailMessage(ref){
	var url 	= $('#reply_mail').attr('action');
	
	var data 	= $('#reply_mail').serialize();
	var button  = $(ref).val();
					$(ref).val('Sending Mail');
					$(ref).attr('disabled','disabled');
	
	doAjaxCall(url,data,false,function(html){
	$(ref).val('Mail Sent');
			if(html ==1){
				alert('yes');
			}
		});	
	
}
</script>
<?
foreach($request_pending as $info)
?>
   <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-edit"></i>User Profile</span>      
		<div class="toolbar">
          <div class="btn-group" > 
                <a class="btn Reg" href="#" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="<?=date('m-d-Y h:i:s',$info->acceptTime)?>"><i class="icon-edit"></i> Approval Time</a> 
          </div>
        </div>		  
        </div>
        <div class="row-fluid">
         <form name="show_subscription" onsubmit="return false;" action="" method="post" id="show_reseller">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
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
				<label class="control-label" >User Type</label>
				<div class="controls">
				  <?=($info->userType==1) ? '<span class="label label-info">Advertiser</span>':'<span class="label label-important"> Publisher </span>';?>
				</div>                       
			  </div>
			</div>
		</div>	
		
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Approval Time</label>
				<div class="controls">
				  <?=date('m-d-Y h:i:s',$info->acceptTime)?>
				</div>                       
			  </div>
			</div>
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Last Login</label>
				<div class="controls">
				  <?=date('m-d-Y h:i:s',$info->lastLogin)?>
				</div>                       
			  </div>
			</div>
		</div>	
		<div class="row-fluid">
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >Last Login Ip</label>
				<div class="controls">
				  <?=$info->lastLoginIp;?>
				</div>                       
			  </div>
			</div>
			<div class="span6">
			   <div class="control-group">                                                
				<label class="control-label" >User Status</label>
				<div class="controls">
				 <?if($info->isActive == 0) {
						echo '<span label ="label  badge-inverse">Inactive</span>';
			  }else if($info->isActive == 1){
				echo  '<span class="label  label-success">Active</span>';
			  }else if($info->isActive == 2){
				echo  '<span class="label  label">Suspend</span>';
			  };?>
				</div>                       
			  </div>
			</div>
			
		</div>	
		
   
    
      </div>
     
      <div class="form-actions" >
	    
        
	   <div class="pull-right">
			<a href="<?=base_url().'admin/user_manage/suspenduser/'.$info->userId;?>"  role="button"  data-toggle="modal">  
				<input type="button" class="btn btn-inverse" value="Suspend User" >
				
			</a>
			<a href="#" class="userAction" url="<?=base_url().'admin/user_manage/deleteUser/'.$info->userId;?>" role="button"  data-toggle="modal">  
				<input type="button" class="btn btn-warning" value="Delete User" >
			</a>
			<a href="#" class="userAction" url="<?=base_url().'admin/signuprequest/mailtocutomer/'.$info->userId;?>" role="button"  data-toggle="modal">  
				<input type="button" class="btn btn-primary" value="Reply by mail" >
			</a>
			
		</div>
		
			
		
      </div>
  </div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<div id="usrInforMation" class="modal hide fade">
  </section>
</div>	

</div>
</div>
<blockquote>&nbsp;</blockquote>
</div>