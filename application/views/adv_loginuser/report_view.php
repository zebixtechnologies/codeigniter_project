<script>
  $(document).ready(function(){
  
   $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-1').addClass("active open");
  $('#content').removeClass();

  $('#save_adv_info,#savePublisher').click(function(){
  if($('#pub_info').valid()){
  var url =  $('#pub_info').attr('action');
  var data = $('#pub_info').serialize();
  var keeper = $('#pub_info');
  var msg,type,title;
  doAjaxCall(url,data,false,function(html){
  if(html == 1){
						    $('.sign_up.alert-success').text('Publisher added Successfully.').show('fade');
							formReset(keeper);
						}
						
						else{
						    $('.sign_up.alert-error').text('Not Saved.').show('fade');
						}
  });
  }
  });
  $('.submitChange').change(function(){
	$(this).closest('form').submit();
  })
  $('.userAction').click(function (){
			$("#usrInforMation").modal();
			var url = $(this).attr('url');
			var data = '';
			doAjaxCall(url,data,true,function(html){
				$('#usrInforMation').html(html);
				$("#usrInforMation").modal('show');
			
			});
 });
 $('.exportleads').click(function (){
			//$("#usrInforMation").modal();
			var url = $(this).attr('url');
			var data = '';
			doAjaxCall(url,data,true,function(html){
                            //console.log(html);
				//$('#usrInforMation').html(html);
                                 document.location.href = html;
				//$("#usrInforMation").modal('show');
			
			});
 });
 
 $('.exportoldrecords').click(function (){
			//$("#usrInforMation").modal();
			var url = $(this).attr('url');
			var data = $("#reportView").serialize();
			doAjaxCall(url,data,true,function(html){
				//$('#usrInforMation').html(html);
                                document.location.href = html;
				//$("#usrInforMation").modal('show');
			
			});
 });
 
  });
 </script>
 <div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>
 
            </ul>-->
          <h1 id="main-heading">Leads Report</h1>
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
          <span class="title"><i class="icon-edit"></i>Advertiser Lead Report
          </span>      
		<div class="toolbar">
          <div class="btn-group" > 
				<a class="btn Reg" href="<?php echo base_url();?>adv_loginuser/dashboard/report/" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Reset Search"><i class="icon-info"></i> Reset Search</a>
				
          </div>
        </div>		  
        </div>
        <div class="widget-content form-container">
			<div class="row-fluid">
                            <div style='padding: 10px;'>
                                Below are your leads for today as they accumulate in real time. We advise you follow up immediately with your leads while they are still hot and fresh! You can easily convert them into paying customers while their interest level is still very high.<br/><br/>
                                <label class="control-label" for="lasthistory"><b style='font-size:20px;'>Today's Leads</b></label>
                            </div>
                            <table id="todaysLead" class="table table-striped">
                                    <thead>
                                            <tr>
                                                    <th>S. No.</th>
                                                    <th>Category</th>
                                                    <th>Time</th>
                                                    <th>Cost Per Lead</th>
                                                    <th>Lead Details</th>
                                                    
                                                   
                                            </tr>
                                    </thead>
                                    <tbody>
                                            <?	$i=1;
                                                    foreach($todaysLead as $info){ ?>
                                                            <tr>
                                                                    <td><?=$i;?></td>
                                                                    <td><?=$info->category_name;?></td>
                                                                    <td><?php echo date('h:m:s a',$info->datetime);?></td>
                                                                    <td><?=SITE_CURRENCY.$info->debit;?></td>
                                                                    <td>
                                                                            <input type="button" class="btn btn-danger userAction" value="Lead Detail" url="<?=base_url().'admin/adtrack/showLeadDetails/'.$info->form_data_id;?>">
                                                                    </td>
                                                                  


                                                            </tr>
                                                          
                                            <?	$i++;
                                            }	?>
                                    </tbody>
                                    <tfoot>
                                        <tr><td> <input type="button" class="btn btn-info exportleads" value="Export Lead(s)" url="<?=base_url().'adv_loginuser/dashboard/Exportleads'?>"></td></tr> </tfoot>
                            </table>	
                    </div>
					<div class="row-fluid">
                                            <div style='padding: 10px;'>
                                                <label class="control-label" for="lasthistory"><b style='font-size:20px;'>Search Leads</b></label>
                                            </div>
                                            <form  id="reportView" name="" class="submitChange" action="<?=base_url().'adv_loginuser/dashboard/report/?'?><?=$_SERVER['QUERY_STRING'];?>" >	
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="lasthistory">Choose Report</label>
								<div class="controls">
									<select class="span12" id="lasthistory" name="lasthistory">
										<option value="0" >All</option>
										<option value="1" <?if(isset($lasthistory)){ echo ($lasthistory==1) ? 'selected':'';}?>>Daily</option>
										<option value="7" <?if(isset($lasthistory)){ echo ($lasthistory==7) ? 'selected':'';}?>>Week</option>
										<option value="30" <?if(isset($lasthistory)){ echo($lasthistory==30) ? 'selected':'';}?>>Month</option>
										<option value="365" <?if(isset($lasthistory)){ echo($lasthistory==365) ? 'selected':'';}?>>Year</option>
										
									</select>
								</div>
							</div>
						</div>
					
						<div class="span4">
							<div class="control-group">
               
                <label class="control-label" for="searchType">Category</label>
								<div class="controls">
									<select class="span12" id="advertisment" name="advertise">
												<option value="0">All</option>
											<?
										
											foreach($userCategories as	$info){?>
												<option value="<?=$info->categoryId;?>" <? if(isset($advertise)){ echo ($advertise == $info->categoryId) ? 'selected':'';}?>><?=$info->categoryName;?></option>
											<?}?>	
									</select>
								</div>
							
							</div>
						</div>
						<div class="span4">
							<div class="control-group">
							
								<label class="control-label" for="statetype">State</label>
								<div class="controls">
									<select class="span12" id="statetype" name="state">
										<option value="">all</option>
										<?foreach($getStates as	$info){?>
												<option value="<?=$info->stateName;?>" <?if(isset($state)){ echo ($state == $info->stateName) ? 'selected':'';}?>><?=$info->stateName;?></option>
											<?}?>
									</select>
								</div>
							
							</div>
						</div>
							
					</div>
					<div class="row-fluid">
						<div class="span9">
							<div class="control-group">
								<label class="control-label" for="dateFrom">Date</label>
								<div class="controls">
                                                                    From <input type="text" id="datepicker-from" autocomplete="off" name="datepicker_from" class="input-small" <?php if(isset($datepicker_from)){ ?>value="<?=$datepicker_from;}?>">
									 To  <input type="text" id="datepicker-to" autocomplete="off" name="datepicker_to"  class="input-small" <?php if(isset($datepicker_to)){ ?>value="<?=$datepicker_to;}?>">
								
								
							</div>
							</div>
						</div>
						<div class="span3">
							<div class="control-group">
                                                            <input type="submit" id="" class="btn btn-info" value="Run Report">
							</div>
						</div>
					</form>				
					</div>
                                        
					<div class="row-fluid">
						<table id="adv_listings" class="table table-striped">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>Category</th>
									<th>Date</th>
									<th>Lead Details</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                                                        $i=1;
                                                                        if(isset($records_info)){
                                                                        foreach($records_info as $info){ ?>
                                                            <tr>
                                                                    <td><?=$i;?></td>
                                                                    <td><?=$info->category_name;?></td>
                                                                    <td><?php echo date('j F Y  h:m:s a',$info->datetime);?></td>
                                                                    <td>
                                                                        <input type="button" class="btn btn-danger userAction" value="Lead Detail" url="<?=base_url().'admin/adtrack/showLeadDetails/'.$info->form_data_id;?>">
                                                                    </td>


                                                            </tr>
                                                                <?php	$i++;
                                                                        }}	?>
							</tbody>
                                                         <tfoot>
                                        <tr><td> <input type="button" class="btn btn-info exportoldrecords" value="Export Old Leads" url="<?=base_url().'adv_loginuser/dashboard/Exportoldleads'?>"></td></tr> </tfoot>
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
<div id="usrInforMation" class="modal hide fade">
</div>
<script type="text/javascript">
		
		$(document).ready(function(){
				$('#pub_info').validate();
				
		   $('#adv_listings').dataTable({
			   "sPaginationType":"full_numbers",
                           "iDisplayLength" : 50,
			   "aaSorting":[[0, "asc"]]
			
			   });
                    $("#todaysLead").dataTable({
                        "sPaginationType":"full_numbers",
                        "iDisplayLength" : 50,
			   "aaSorting":[[0, "asc"]]
                    });

		});
		
</script>