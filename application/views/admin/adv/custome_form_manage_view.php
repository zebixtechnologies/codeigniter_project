<script>
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li4 #li4-4').addClass("active open");
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
			
	 $('.delRow').click(function(){
	var data='';
	var keeper = $(this).closest('tr');  
    var url = $(this).attr('src');
		msg ='Are you sure you want to delete this Form...???';
			readyToDelete(url,data,msg,function(response){
													if(response==1){
																		var title = 'Delete Form';
																		var text = 'Form has been deleted..';
																		var type = 'success';
																	}else{
																		var title = 'Delete Failed';
																		var text = 'Form failed to deleted..';
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
  function readyToDelete(url,data,msg,callback){
	
  
        $.msgbox(msg, {
          type: "confirm",
          buttons : [
            {type: "submit", value: "Yes"},
            {type: "submit", value: "No"}
          ]
          }, function(result) 
                             {
								
                                if(result=='Yes'){
								
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
        <span class="title"><i class="icon-list-2"></i>Custom Forms</span>
        <div class="toolbar">
          <div class="btn-group" > 
                 <a class="btn Reg" href="<?php echo base_url();?>admin/customeform/addnewform" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Create New Form"><i class="icon-plus"></i> Create New Form</a>
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll table-hover" id="custom_forms">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Form Name</th>
              <th>Active Status</th>
              <th>Created Time(mm-dd-yy)</th>
              <th>Action</th>
              <th>Action</th>
              <th>Action</th>
			  
            </tr>
          </thead>
          <tbody>
           <?php
           $s_no = 1;
           foreach($customeForm as $info){
             ?>
            <tr id="<?=$info->formId;?>" >
              <td><?=$s_no;?></td>
              <td><?=$info->formName;?> </td>
              <td><?=($info->isActive==1) ? '<span class="label label-success">Active</span>':'<span class="label label-important">Inactive</span>';?> </td>
            <td><?=date('m-d-Y h:m:s',$info->created);?></td>			  
			<td><a href="javascript:" url="<?=base_url().'admin/customeform/formPreview/'.$info->formId;?>" class=" userAction btn btn-info">Preview</a></td>
			<td><a href="<?=base_url().'admin/customeform/editform/'.$info->formId;?>" class="btn btn-danger">Edit</a></td>
			<td><a href="javascript:" src="<?=base_url().'admin/customeform/deleteform/'.$info->formId;?>" class=" delRow btn btn-inverse">Delete</a></td>
			</tr>
            <? $s_no++; }  ?>
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
<div id="usrInforMation" class="modal hide fade">
</div>
<script>
	$(document).ready(function(){
		$('#custom_forms').dataTable({
	   "sPaginationType":"full_numbers",
	   "aaSorting":[[0, "asc"]],
	   //"aoColumnDefs": [{ 'bSortable':false,'aTargets':[5]}]
   });

	})
</script>
