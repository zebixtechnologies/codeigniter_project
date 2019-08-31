<script>
$(document).ready(function(){

	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li6').addClass('active open');
  $('#navigation ul #li6 #li6-1').addClass("active open");
  $('#content').removeClass();
  $('.goforDetail').click(function(){
		window.location.href = base_url+"admin/signuprequest/userdetail/"+$(this).attr('id');
  })
  $('.delRow').click(function(){
	var subCatNames='';
	var subCatIds=[];
	var data='';
	var keeper = $(this).closest('tr');  
    var url = $(this).closest('td').attr('src');
	var childUrl = $(this).closest('tr').attr('src');
		/*get child category names*/
		doAjaxCall(childUrl,'',true,function(html){
			
			if($.isEmptyObject(html)){
				msg ='Are you sure you want to delete this category...???';
				readyToDelete(url,data,msg,function(response){
													if(response==1){
																		var title = 'Delete Category';
																		var text = 'Category has been deleted..';
																		var type = 'success';
																	}else{
																		var title = 'Delete Failed';
																		var text = 'Category failed to deleted..';
																		var type = 'error';
																		}
														$.pnotify({
                                                                       title: title,
                                                                        text: text,
                                                                        type: type});
																	
																	keeper.fadeOut(1000);
																	showAlert();
				
				})
			
			}else{
				
				$.each(html,function(i,item){
					subCatIds[i] = item.categoryId;	
					subCatNames += '<span class="label label-info" style="margin-left:3px;">'+item.categoryName + '</span>';
				});
			
				//alert(subCatIds);
				var msg = 'This is an parent category ... <br/> Are You Sure You Want to delete Parent category and also sub categories showing below...??<br/> '+subCatNames; 
				readyToDelete(url,data,msg,function(response){
																	if(response==1){
																		var title = 'Delete Category';
																		var text = 'Category has been deleted..';
																		var type = 'success';
																	}else{
																		var title = 'Delete Failed';
																		var text = 'Category failed to deleted..';
																		var type = 'error';
																		}
																		$.pnotify({
                                                                              title: title,
                                                                              text: text,
                                                                              type: type});
																			  var ids = subCatIds;
																			   for(var i=0;i<ids.length;i++){
																					$('#categry_listing tbody tr[catId="'+ids[i]+'"]').fadeOut(1000);	
																				}
																				keeper.fadeOut(1000);
																				showAlert();
				});
			}
		})
		
		
	

    
  })
});

function readyToDelete(url,data,msg,callback){
	
  
        $.msgbox(msg, {
          type: "confirm",
          buttons : [
            {type: "submit", value: "Yes"},
            {type: "submit", value: "No"}
          ]
          }, function(result) 
                             {
                                if(result == 'Yes'){
                                  doAjaxCall(url,data,true,function(html){
                                                                        callback(html); 
                                                                            });
                                                  }
                              } )
}
</script>
<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>Request Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
                
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll" id="user_request_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>User Name</th>
              <th>Company</th>
              <th>Website</th>
              <th>Request For</th>
			  <th>Request Time (mm-dd-yy)</th>
			  
            </tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($request_pending as $cat){
             ?>
            <tr id="<?=$cat->userId;?>" class="goforDetail" style="cursor:pointer">
              <td><?=$s_no;?></td>
              <td><?=$cat->userName;?></td>
			  <td><?=substr($cat->company,0,20);?></td>
			  <td><?=$cat->website;?></td>
			  <td><?=($cat->userType==1) ? '<span class="label label-info">Advertiser</span>':'<span class="label label-important"> Publisher </span>';?></td>
              <td><?=date('m-d-Y h:m:s',$cat->requesTime);?></td>			  
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
