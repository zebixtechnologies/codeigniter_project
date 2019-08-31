<script>
$(document).ready(function(){
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li4 #li4-1').addClass("active open");
  $('#content').removeClass();
  
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
                                                                                             type: type
                                                                                         });

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
                                                                              type: type
                                                                          });
                                                                          
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
 
 $('.activeSuspend').click(function(){
    //var catid = $('.act').attr('id');
    var url=$(this).closest('td').attr('src');
    var data='';
    var msg ='Are you sure you want to activate or suspend this category...???';
    var currentReference = $(this).children("input").eq(0);
    readyToChangeAct(url,data,msg,function(data){
                          var title = '';
                          var text = '';
                          var type = 'success';
                          
                            if(data == 1){
                                          currentReference.val("Set to Suspend");
                                          title = 'Update Category';
                                          text = 'Category has been Activated';
          
                                         }else{
                                             
                                            currentReference.val("Set to Active");
                                            title = 'Update Category';
                                            text = 'Category has been suspended';
                                 }

                $.pnotify({
                            title: title,
                             text: text,
                             type: type
                         });

                keeper.fadeOut(1000);
                showAlert();
                
                

    })
 
    })
    
});

function readyToChangeAct(url,data,msg,callback){

        $.msgbox(msg, {
          type: "confirm",
          buttons : [
            {type: "submit", value: "Yes"},
            {type: "submit", value: "No"}
          ]
          }, function(result) 
                             {
                                if(result == 'Yes'){
                                  //  return true;        
                                  doAjaxCall(url,data,false,function(html){
                                      //console.log(html);
                                                                        callback(html); 
                                                                            });
                                                  }
                              } )
}

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
        <span class="title"><i class="icon-list-2"></i>Registered Category Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
               <a class="btn Reg" href="<?php echo base_url();?>admin/category_manage/addcategory" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Add New Category"><i class="icon-plus"></i> Add New Category</a> 
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll" id="categry_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Category Name</th>
              <th>Category Description</th>
              <th>Min Bid Price</th>
              <th>Set Bid Price</th>
              <th>Active / Suspend</th>
			  <th>Action</th>
              <!--<th>Active Status</th>
			  <th>Created</th>
			  <th>Last Update</th>			  -->
              <!--<th class="action-col">Actions</th>-->
            </tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($category as $cat){
             ?>
             <tr catId="<?=$cat->categoryId;?>"  src="<?=base_url().'admin/category_manage/getsubcategory/'.$cat->categoryId;?>">
              <td><?=$s_no;?></td>
              <td ><?=$cat->categoryName;?></td>
			  <td><?=substr($cat->categoryDescription,0,20);?></td>
			  <td><?=($cat->minbidprice != '') ? '<span class="label label-info "> '.$cat->minbidprice.' </span>':'<span class="label label-important">Min Bid Price</span>';?></td>
                          <td><input type="button" class="btn btn-primary userAction" value="Set Bid Price" url="<?=base_url().'admin/category_manage/setBidPriceView/'.$cat->categoryId?>"></td>
              <!--<td><?=($cat->isActive ==1) ? '<span class="label label-warning">A</span>':'<span class="label label-inverse">I</span>';?></td>
              <td><?=date("d/m/Y",$cat->created);?></td>
			  <td><?=date("d/m/Y",$cat->lastUpdate);?></td>-->
                          
              <td src="<?=base_url().'admin/category_manage/setActiveSuspend/'.$cat->categoryId;?>">
             
                  <a href="javascript:" class="activeSuspend">
                      <input type="button" id='' class="btn btn-info" style="width:110px" value="<?php echo $cat->isActive == "1" ? "Set to Suspend" : "Set to Active"  ?>">
              </a>
      
              </td>
              
              <td src="<?=base_url().'admin/category_manage/removecategory/'.$cat->categoryId;?>">
              
                  <!--<a href="<?=base_url().'admin/category_manage/editcategory/'.$cat->categoryId;?>" class="btn btn-small"><i class="icon-pencil"></i></a> --> 
                  <a href="javascript:" class="delRow">
				  <input type="button" class="btn btn-warning" value="Delete" ></a> 
                
              </td>
			  
			 
            </tr>
            <?php $s_no++; }  ?>
            <? //$s_no++; }?>
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
<div id="usrInforMation" class="modal hide fade"></div>
<script>
    $(function(){
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
   function closeMe(){
    $('#popup').click();
   }
   function savebidForm(){
        if($('#setbid').valid()){
            var url =  $('#setbid').attr('action');  
            var data = $('#setbid').serialize();
            doAjaxCall(url,data,true,function(html){
                closeMe();
                //window.location.href="http://localhost/keyverticals/"+'admin/manage_publisher';

            });
            return false;
        }
    }

</script>
