<script>
  $(document).ready(function(){
  
  $('#navigation ul  #li5').addClass('active open');
  $('#navigation ul #li5 #li2-1').addClass("active open");
  $('#content').removeClass();

  
  $('.userAction').click(function (){
			$("#usrInforMation").modal();
			var url = $(this).attr('url');
			var data = '';
			doAjaxCall(url,data,true,function(html){
				$('#usrInforMation').html(html);
				$("#usrInforMation").modal('show');
				$('#creditForm').validate();
			});
			});
  });
  function saveCreditAccountForm(){
			
			if($('#creditForm').valid()){
				var url =  $('#creditForm').attr('action');  
			  var data = $('#creditForm').serialize();  
			doAjaxCall(url,data,true,function(html){
					window.location.href="<?=base_url();?>"+'admin/manage_advertiser';
					
					})
			
			return false;
			}
			  
	
}

function closeMe(){
	$('#popup').click();
	
}
 </script>
	<div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>
 
            </ul>-->
            <h1 id="main-heading"> Welcome to <?=SITE_NAME;?>  </h1>
			   <div id="msg">
          <?php
            if(isset($msg)){
              echo $msg;
            }
          ?>
        </div>
 </div>
   <div id="main-content">
   	<p class="sign_up"><p>
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-edit"></i>Leads information
          </span>      
		<div class="toolbar">
          <div class="btn-group" > 
				<a class="btn Reg" href="<?php echo base_url();?>adv_loginuser/dashboard/report/" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Reset Search"><i class="icon-info"></i> Shows All</a>
				
          </div>
        </div>		  
        </div>
        <div class="widget-content form-container">
			
					<div class="row-fluid">
						<table id="adv_listings" class="table table-striped">
							<thead>
								<tr>
									<th>S. No.</th>
									
									<th>Lead Time</th>
									<th>Lead Ip</th>
									<th>Action</th>
									
									
								</tr>
							</thead>
							<tbody>
								<?	$i=1;
									foreach($leadsinfo as $info){ ?>
										<tr>
											<td><?=$i?></td>
											
											<td><?=date('m-d-Y h:m:s',$info->clickTime);?></td>
											<td><?=$info->ipaddress;?></td>
											<td><a url="<?=base_url().'adv_loginuser/dashboard/formInfo/'.$info->emailId;?>" class="btn btn-info userAction">User info </a></td>
										</tr>
								<?	$i++;
								}	?>
							</tbody>
						</table>
					
					</div>
												
			
        </div>
	
	</div>
	</div>
	</div>
	</div>
	<div id="usrInforMation" class="modal hide fade">
	</div>	
	</div>
	</div>
	</div>
	<blockquote>&nbsp;</blockquote>
	</div>

<script type="text/javascript">
		
		$(document).ready(function(){
				$('#pub_info').validate();
				
		   $('#adv_listings').dataTable({
			   "sPaginationType":"full_numbers",
			   "aaSorting":[[0, "asc"]],
			
			   });

		});
		
</script>