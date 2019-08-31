<script>
  $(document).ready(function(){
  
  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-1').addClass("active open");
  $('#content').removeClass();

  $('#updatecategory').click(function(){
  {
  var url =  $('#update_category').attr('action');
  var data = $('#update_category').serialize();
  var keeper = $('#update_category');
  var msg,type,title;
  doAjaxCall(url,data,false,function(html){
  if(html == 1){
						    $('.sign_up.alert-success').text('Category Updated Successfully.').show('fade');
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
<?// print_r($pubifo);?>
   <div id="main-content">
   	<p class="sign_up"><p>
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-edit"></i>Categories </span>      
		<div class="toolbar">
          <div class="btn-group" > 
				
          </div>
        </div>		  
        </div>
        <div class="widget-content ">
			<div class="form-container">
				
					<div class="row-fluid">
						
					<h4>Select one or more categories<b class="req_field">*</b></h4>
 <form class="form-horizontal" method="post" action="<?=base_url().'adv_loginuser/dashboard/updatecategory'?>" id="update_category" onsubmit="return true;">
       
                  
                <ul class=" gf-checkbox inline">
					<?	 $ifon=explode('-' , $usercat->categoryId);
						$i=0;
						
						foreach($cat as $info){
						
							
							
								
								if(in_array($info->categoryId,$ifon)){
									
							echo ' <li>
						
						<input type="checkbox" checked class="" value="'.$info->categoryId.'" name="category[]"  id="cat_'.$i.'"/><label for="cat_'.$i.'" >'.$info->categoryName.'</label>
						</li>';		
									
								}
								else{
						echo ' <li>
						
						<input type="checkbox" class="" value="'.$info->categoryId.'" name="category[]"  id="cat_'.$i.'"/><label for="cat_'.$i.'" >'.$info->categoryName.'</label>
						</li>';
								$i++;
								
								
						}
							
							}
					?>
               
                </ul>
                
					</div>
												
			 <input type="submit" id="updatecategory" class="btn btn-info" value="Update Categories">
			 </form>
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