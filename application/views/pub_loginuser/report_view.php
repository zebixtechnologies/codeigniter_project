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
  });
 </script>
<!--<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function()
{
    $("#loading").hide();
});
</script>
 <style>
     
     #loading {
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            position: fixed;
            opacity: 0.5;
            background-color: #fff;
            z-index: 99;
            text-align: center;
          }
        #loading-image {
          position: absolute;
          top: 50px;
          left: 340px;
          z-index: 100;
        }
 </style>
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
          <span class="title"><i class="icon-edit"></i>Publisher Report </span>      
		<div class="toolbar">
          <div class="btn-group" > 
				<a class="btn Reg" href="<?php echo base_url();?>pub_loginuser/dashboard/report/" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Reset Search"><i class="icon-info"></i> Reset Search</a>
				
          </div>
        </div>		  
        </div>
          <div style='padding: 10px; margin-bottom: -24px; border: 1px solid #ccc;"'>
                        <p class="padding5"><b class="text-error padding5"><strong>Note:</strong></b>&nbsp;  Leads will be adjusted for quality by the end of the day/week/month.<br/><br/>
          </div>
                              
         
        <div class="widget-content form-container">
			
					<div class="row-fluid">
					<form name="" class="submitChange" action="<?=base_url().'pub_loginuser/dashboard/report/?'?><?=$_SERVER['QUERY_STRING'];?>" >	
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
						
								<label class="control-label" for="searchType">Categories</label>
								<div class="controls">
									<select class="span12" id="advertisment" name="advertise">
												<option value="0">All</option>
											<?foreach($activeads as	$info){?>
												<option <?if(isset($advertise)){ echo ($advertise==$info->categoryId) ? 'selected':'';}?> value="<?=$info->categoryId;?>"><?=$info->categoryName;?></option>
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
												<option value="<?=$info->stateName;?>" <?if(isset($lasthistory)){ echo ($state == $info->stateName) ? 'selected':'';}?>><?=$info->stateName;?></option>
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
									From <input type="text" id="datepicker-from" name="datepicker_from" class="input-small" <?php if(isset($datepicker_from)){ ?>value="<?=$datepicker_from;}?>">
									 To  <input type="text" id="datepicker-to" name="datepicker_to"  class="input-small" <?php if(isset($datepicker_to)){ ?>value="<?=$datepicker_to;}?>">
								
								
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
						<table id="adv_listing" class="table table-striped">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>Category</th>
									<th>Date</th>
									<th>Earning</th>
								</tr>
							</thead>
							<tbody>
								<?	$i=1;
                                                                     $totalearnings=0;
									foreach($records_info as $info){ ?>
										<tr>
											<td><?=$i?></td>
											<td><?php echo $info->category_name;?></td>
                                                                                        <td><?php echo date('m-d-Y h:m:s',$info->datetime) ?></td>
											<td><?=SITE_CURRENCY;?><?php echo $info->credit;?></td>
										</tr>
                                                                                 <?php   if(!$totalearnings){ $totalearnings = 0; }
                                                                                        $totalearnings += $info->credit;
                                                                                        ?> 
                                                     
                                                                                 <?	$i++;
								}	?>
                                                                   
								
							</tbody>
                                                   <!--  <tfoot>
                                                        <tr align="center"><td colspan="3"><div align='center'>Total Earnings</div></td><td><?php echo SITE_CURRENCY.$totalearnings;?></td></tr>
                                                     <tr><th colspan="3">Total Earnings</th><td>  <?= SITE_CURRENCY;?>
                                              <?= (($totalearning)==NULL)?'0':sprintf("%.2f",$totalearning); ?></td> </tr>  
                                                           
                                                    </tfoot>-->
                                                       
						</table>
					
					</div>
            <div align='center' style="color: darkslategray;"><h4 style="font-size:20px;">Total Earnings:   <?php echo SITE_CURRENCY.$totalearnings;?></h3></div>
												
			
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
       <div id="loading">
                  <img id="loading-image" src="<?=base_url()?>assets/forms/images/loading.gif" alt="Loading..." />
                </div>
<script type="text/javascript">
		
		$(document).ready(function(){
				$('#pub_info').validate();
				
		   $('#adv_listing').dataTable({
			   "sPaginationType":"full_numbers",
			   "aaSorting":[[0, "asc"]],
			
			   });

		});
		
</script>
