<script>
$(document).ready(function(){
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li4 #li4-2').addClass("active open");
  $('#content').removeClass();
  
  $('.delRow').click(function(){
	var subCatNames='';
	var subCatIds=[];
	var data='';
	var keeper = $(this).closest('tr');  
    var url = $(this).closest('td').attr('src');
	
		
		doAjaxCall(url,'',true,function(html){
			msg ='Are you sure you want to delete this Country...???';
			readyToDelete(url,data,msg,function(response){
													if(response==1){
																		var title = 'Delete Country';
																		var text = 'Country has been deleted..';
																		var type = 'success';
																	}else{
																		var title = 'Delete Failed';
																		var text = 'Country failed to deleted..';
																		var type = 'error';
																		}
														$.pnotify({
                                                                       title: title,
                                                                        text: text,
                                                                        type: type});
																if(response==1){
																	keeper.fadeOut(1000);
																	showAlert();
																}	
																
				
				})
			
			
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
        <span class="title"><i class="icon-list-2"></i>Registered Country Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
                <a class="btn Reg" href="<?php echo base_url();?>admin/country_manage/addcountry" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Add New Country"><i class="icon-plus"></i> Add New Country</a>
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll" id="country_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Country Name</th>
              <th>Country value</th>
           
              <th>Active Status</th>
			  			  
              <th class="action-col">Actions</th>
            </tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($country as $cat){
             ?>
             <tr catId="<?=$cat->countryId;?>"  >
              <td><?=$s_no;?></td>
              <td ><?=$cat->name;?></td>
			  <td><?=$cat->value;?></td>
			  <td><?=($cat->isActive ==1) ? '<span class="label label-warning">A</span>':'<span class="label label-inverse">I</span>';?></td>			  
              
              <td class="action-col" src="<?=base_url().'admin/country_manage/removecountry/'.$cat->countryId;?>">
                <span class="btn-group"> 
                  <a href="<?=base_url().'admin/country_manage/editcountry/'.$cat->countryId;?>" class="btn btn-small"><i class="icon-pencil"></i></a> 
                  <a href="javascript:" class="delRow btn btn-small"><i class="icon-trash"></i></a> 
                </span>
              </td>
            </tr>
            <? $s_no++; }?>
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
