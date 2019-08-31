<style>
	.widget .form-container .form-horizontal .control-label {
text-align: left;
width: 216px;
line-height: 6px;
}
</style>
<script>
  $(document).ready(function(){
  
  $('#navigation ul  #li7').addClass('active open');
  //$('#navigation ul #li2 #li2-1').addClass("active open");
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
 <div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>
 
            </ul>-->
          <h1 id="main-heading">Pause or Activate Your Leads</h1>
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
          <span class="title"><i class="icon-edit"></i>Pause Or Activate Your Leads </span>      
		<div class="toolbar">
          <div class="btn-group" > 
				
          </div>
        </div>		  
        </div>
        <div class="widget-content ">
			<div class="form-container">
				
					<div class="row-fluid">
						
					<h4>You can pause or activate your leads for ANY or ALL the categories anytime.</h4>
 <form class="form-horizontal" method="post" action="<?=base_url().'adv_loginuser/dashboard/activecategory'?>" id="update_category" onsubmit="return true;">
       
                  
                <ul class=" gf-checkbox inline">
					<?php
                                        
                                       
						$i=0;
						
						foreach($usercat as $info){
                                                    if(in_array($info->categoryId,$activecats)){
                                                        echo ' <li>
														<div class="control-group">      
														<label style="color: #000000;" for="cat_'.$i.'" class="control-label" >'.$info->categoryName.'</label>
														 <div class="controls">
														<input checked type="checkbox" class="" value="'.$info->categoryId.'" name="category[]"  id="cat_'.$i.'" data-provide="ibutton" data-label-on="Active category" data-label-off="Pause category"/>
														 </div>                       
														</div>
														</li>';
                                                    }else{
							echo ' <li>
							<div class="control-group">    
							<label style="opacity: 0.8;" class="control-label" for="cat_'.$i.'" >'.$info->categoryName.'</label>
							 <div class="controls">
							<input type="checkbox" class="" value="'.$info->categoryId.'" name="category[]"  data-provide="ibutton" data-label-on="Active category" data-label-off="Pause category" id="cat_'.$i.'"/>
							 </div>                       
							</div>
							</li>';
                                                    
													}
                                                    $i++;
                                                }
					?>
               
                </ul>
                
					</div>
                                        <input type="submit" id="activecategory" class="btn btn-info" value="Update">
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