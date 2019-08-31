<script>
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li4').addClass('active open');

  $('#content').removeClass();
  
  
  
 	$('.deleteMe').click(function(){
 		var name = $(this).attr('name');
 		var msg = 'Are You Sure You Want To Delete <span class="label label-important">'+name+'</span> .. ??';
 		var keeper = $(this);
 		var url = $(this).attr('src');
 		
 		var data ='';
 			 $.msgbox(msg, 
 			 	{  type: "confirm",
 			           buttons : [
		            {type: "submit", value: "Yes"},
		            {type: "submit", value: "No"}
		          ]
		         }, function(result) 
                             {
                                if(result == 'Yes'){
                                doAjaxCall(url,data,true,function(html){
                                                                        if(html==1){
                                                                        	var title = 'Delete Sub Publisher';
																			var text = 'Data has been deleted..';
																			var type = 'success';
                                                                        }else{
                                                                        	var title = 'Delete Failed';
																			var text = 'Data has not been deleted..';
																			var type = 'error';
                                                                        }
		                                                                      	  $.pnotify({
			                                                                       title: title,
			                                                                        text: text,
			                                                                        type: type});
                                                                        
                                                                           	keeper.closest('tr').hide('fade');
                                                                            });
                                               }
                              } )
 	})
 })
</script>

<div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>

            </ul>-->
            <h1 id="main-heading">Your Sub-Publishers | Traffic Sources</h1>
			   <div id="msg">
          <?php
            if(isset($msg)){
              echo $msg;
            }
          ?>
        </div>
          </div>


<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>Sub Publishers</span>
        <div class="toolbar">
          <div class="btn-group" > 
               <a data-placement="top" data-toggle="tooltip" data-trigger="hover" href="<?=base_url().'pub_loginuser/subpublisher/addsubpublisher';?>" class="btn Reg" data-original-title="Add Sub Publisher"><i class="icon-plus"></i> Add Sub Publisher</a>
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll table-hover" id="adv_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Leads</th>
              <!--<th>Views</th>-->
              
               <th>Details</th>
			  <th>get Code</th>
			 <th>Delete</th>	
			  
            </tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($sub as $info){
             ?>
            <tr id="<?=$info['sub_publisherId'];?>" style="cursor:pointer">
              <td><?=$s_no;?></td>
              <td><?=$info['name'];?></td>
				<td><?=$info['email'];?></td>
				<td>
				<?php if($info['clicked'] ==0 || $info['clicked'] ==null){?>
						<span class="label label">No Leads</span>
					<?php }else{?>
				<a href="<?=base_url().'pub_loginuser/subpublisher/subpublisherDetail/'.$info['sub_publisherId'].'/'.$info['publisherId'];?>" class="btn btn-primary">View Details(<?=$info['clicked'];?>)</a>
					<?php }?>
				
				
				<!--<td>
					<?php //if($info['viewed'] ==0 || $info['viewed'] ==null){?>
						<span class="label label">No Views</span>
					<?php //}else{?>
				<a href="<?php// echo base_url().'pub_loginuser/subpublisher/subpublisherDetail/'.$info['sub_publisherId'].'/'.$info['publisherId'];?>" class="btn btn-danger">Details Views(<?=$info['viewed'];?>)</a>
					<?php //}?>
				</td> -->
				
			  <td><a href="<?=base_url().'pub_loginuser/subpublisher/editsubpublisher/'.$info['sub_publisherId'];?>" class="btn btn-inverse" >View/Edit</a></td>	  
			  <td><a href="<?=base_url().'pub_loginuser/dashboard/installation/'.$info['sub_publisherId'] ;?>" class="btn btn-info" >GetCode</a></td>
			  <td><a href="javascript:" class="btn btn-warning deleteMe" src="<?=base_url().'pub_loginuser/subpublisher/deletesubpublisher/'.$info['sub_publisherId'];?>" name="<?=$info['name'];?>">Delete</a></td>	  
			 
			</tr>
            <?php $s_no++; } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
</section>
</div>
</div>
</div>
<blockquote>&nbsp;</blockquote>
</div>
