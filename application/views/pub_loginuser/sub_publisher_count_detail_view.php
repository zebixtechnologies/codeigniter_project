<script>
  $(document).ready(function(){
  var base_url = '<?=base_url();?>';
  $('#navigation ul  #li4').addClass('active open');


  });
 </script>
<div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>

            </ul>-->
            <h1 id="main-heading">Welcome to <?=SITE_NAME;?></h1>
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
          <span class="title"><i class="icon-edit"></i>Subpublisher Report </span>      
			  
        </div>
        <div class="widget-content form-container">
			
				
					<div class="row-fluid">
						<table id="adv_listing" class="table table-striped">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>Category Name</th>
									<th>Date & Time</th>
								</tr>
							</thead>
							<tbody>
								<?php	$i=1;
									foreach($pubifo as $info){ ?>
										<tr>
											<td><?=$i?></td>
											<td><?=$info->category_name;?></td>
											<td><?=date('m-d-Y h:m:s',$info->datetime);?></td>
										</tr>
								<?php	$i++;
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
				
		   $('#adv_listing').dataTable({
			   "sPaginationType":"full_numbers",
			   "aaSorting":[[0, "asc"]],
			
			   });

		});
		
</script>