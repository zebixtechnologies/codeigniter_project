<script>
$(document).ready(function(){
  $('#navigation ul  #li1').addClass('active open');
$('.task-list .close').click(function(){
if (confirm('Are you sure You Have Done this Task..??')) {
var keep = $(this).closest('li');
var src = $(this).closest('li').attr('src');
		$.ajax({
		url: src,
		type: "get",
		success: function( strData ){
						keep.remove();
						}
					})
					}
					})
					});
</script>


            <div id="main-content">
              
           <ul class="stats-container">
                                    <li>
                                        <a href="<?=base_url(). 'admin/signuprequest'?>" class="stat summary">
                                          <span class="icon icon-circle bg-orange">
                                                <i class="icon-user"></i>
                                            </span>
                                            <span class="digit">
                                                <span class="text">Pending User Approvals</span>
                                              
                                          
                                         
           
                                                <?php echo ($users->PendingUsers)?$users->PendingUsers:'0';?>
                                            </span>
                                        </a>
                                    </li>
                                    <!--<li>
                                        <a href="#" class="stat summary">
                                            <span class="icon icon-circle bg-orange">
                                                <i class="icon-business-card"></i>
                                            </span>
                                            <span class="digit">
                                                <span class="text">Pending AD Approvals</span>
                                                <?php echo ($ads->pendingAds)?$ads->pendingAds:'0';?>
                                            </span>
                                        </a>
                                    </li>-->
                                    <li>
                                        <a href="<?=base_url(). 'admin/manage_publisher/manageaccount'?>" class="stat summary">
                                            <span class="icon icon-circle bg-orange">
                                                <i class="icon-stats"></i>
                                            </span>
                                            <span class="digit">
                                                <span class="text">Month To Date Total Profit</span>
                                                 <?php $adminProfilt=number_format($profit->adminProfilt,2);?>
                                              <?= SITE_CURRENCY;?><?php echo ($adminProfilt)?$adminProfilt:'0';?>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url(). 'admin/user_manage'?>" class="stat summary">
                                            <span class="icon icon-circle bg-orange">
                                                <i class="icon-cyclop"></i>
                                            </span>
                                            <span class="digit">
                                                <span class="text">Active Customers</span>
                                                 <?php echo ($users->ActiveUser)?$users->ActiveUser:'0';?>
                                            </span>
                                        </a>
                                    </li>
                                </ul>				
								
								</div>
          <div id="AddTask" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 id="myModalLabel">Add New Task</h3>
</div>
<div class="form-horizontal">
<div class="modal-body">
<form class="form-container" action="<?=base_url().'admin/dashboard/update_task'?>" method="post">

<div class="control-group">
<label class="control-label" for="task">Task</label>
<div class="controls">
<input name="task" type="text" class="" >
</div>
</div>
<div class="control-group">
<label class="control-label" for="taskPriority">Task Priority</label>
<div class="controls">
<select id="" name="taskPriority" class="">
<option>No Priority</option>
<option value="badge badge-warning,Urgent">Urgent</option>
<option value="badge badge-success,Important">Important</option>
<option value="badge badge-important,Today">Today</option>
<option value="badge badge-info,Tomorrow">Tomorrow</option>


</select>
</div>
</div>

</div>
<div class="modal-footer">
<input class="btn btn-primary" value="Save changes" type="submit">
</div>
</form>
</div>
</div>

		  </section>
        </div>
      </div>
    </div>
    <blockquote>&nbsp;</blockquote>
  </div>
 