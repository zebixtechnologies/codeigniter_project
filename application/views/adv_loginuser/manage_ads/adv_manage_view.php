<script>
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li3 #li2-1').addClass("active open");
  $('#content').removeClass();
  
  
  
 	$('.deleteMe').click(function(){
 		var name = $(this).attr('name');
 		var msg = 'Are You Sure Want To delete <span class="label label-important">'+name+'</span> AD.. ??';
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
                                                                        	var title = 'Delete AD';
																			var text = 'AD has been deleted..';
																			var type = 'success';
                                                                        }else{
                                                                        	var title = 'Delete AD Failed';
																			var text = 'AD has not been deleted..';
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
 	});
 	$('.suspendMe').click(function(){
 		var name = $(this).attr('name');
 		var msg = 'Are You Sure to change status of <span class="label label-important">'+name+'</span> AD.. ??';
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
                                                                        	var title = 'Change Status of AD';
																			var text = 'AD status has been changed..';
																			var type = 'success';
                                                                        }else{
                                                                        	var title = 'Change Status of AD Failed';
																			var text = 'AD status has not been changed..';
																			var type = 'error';
                                                                        }
		                                                                      	  $.pnotify({
			                                                                       title: title,
			                                                                        text: text,
			                                                                        type: type});
                                                                        	location.reload();
                                                                           	//keeper.closest('tr').hide('fade');
                                                                            });
                                               }
                              } )
 	})
 })
</script>
<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>Advertisment Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
               <a data-placement="top" data-toggle="tooltip" data-trigger="hover" href="<?=base_url().'adv_loginuser/dashboard/addadv';?>" class="btn Reg" data-original-title="Add New AD"><i class="icon-plus"></i> Add New AD</a>
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll table-hover" id="adv_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Banner Image</th>
              <th>Adv Name</th>
              <th>Leads</th>
              <th>CTR</th>
              <th>Bid</th>
			 
              <th>Active Status(Admin)</th>
              <th>Approved</th>
              <th>Active Status</th>
              <th>Details</th>
			  <th>Action</th>
			  <th>Delete</th>
			</tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($ads as $info){
             ?>
            <tr id="<?=$info->adId;?>" style="cursor:pointer">
              <td><?=$s_no;?></td>
              <td><img src="<?=base_url().'assets/admin_property/assets/images/loading.gif';?>" data-original="<?=($info->adType==1) ? base_url().$info->adIcon_display : base_url().$info->small_bannerImage;?>" class="lazy" title="<?=$info->adName;?>" alt="<?=$info->adName;?>"></td>
              <td><?=$info->adName;?></td>
			
              <td> <?=$info->click;?> </td>
              <td> <?=$info->ctr;?> </td>
			  <td class=" ">
          
          <span class="label label-important"><?= SITE_CURRENCY;?><?=number_format($info->bid_ppc,2);?> </span></td>
             
             
			   <td><?if($info->isActive == 0) {
					echo '<span class="label label-important"> Inactive </span>';
					  }else if($info->isActive == 1){
							echo  '<span class="label label-success"> Active </span>';
					  }else if($info->isActive == 2){
							echo  '<span class="label label"> Suspend </span>';
					  };?>
			  </td>
			  <td><?if($info->isApproved == 0) {
					echo '<span class="label label-important"> Pending </span>';
					  }else if($info->isApproved == 1){
							echo  '<span class="label label-success"> Approved </span>';
					  }else if($info->isApproved == 2){
							echo  '<span class="label label"> Declined </span>';
					  };?>
			  </td>
			  <td>
			  	<?=($info->userActivation == 0) ? '<span class="label label-important"> Inactive By You</span>' : '<span class="label label-success"> Active </span>';?>
			  	
			  </td>
			  
			  		
			  <td><a href="<?=base_url().'adv/show/'. ($info->adId+159753) ;?>" class="btn btn-info" >View/Edit</a></td>	 
			  <td><a href="javascript:" class="btn btn-danger suspendMe" src="<?=base_url().'adv_loginuser/dashboard/changeadstatus/'.$info->adId.'/'.$info->userActivation ;?>" name="<?=$info->adName;?>"> <?=($info->userActivation == 0) ? 'Activate' : 'Suspend' ;?></a></td> 
			  <td><a href="javascript:" class="btn btn-warning deleteMe" src="<?=base_url().'adv_loginuser/dashboard/deleteadv/'.$info->adId;?>" name="<?=$info->adName;?>">Delete</a></td>	  
			 
			</tr>
            <? $s_no++; } ?>
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
