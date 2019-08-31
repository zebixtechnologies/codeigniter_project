<script>
$(document).ready(function(){

	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li6').addClass('active open');
  $('#navigation ul #li6 #li6-2').addClass("active open");
  $('#content').removeClass();
  $('.goforDetail').click(function(){
		window.location.href = base_url+"admin/user_manage/userdetail/"+$(this).attr('id');
  })
  
  $('.userAction').click(function (){
			$("#usrInforMation").modal();
			var url = $(this).attr('url');
			var data = '';
			doAjaxCall(url,data,true,function(html){
				$('#usrInforMation').html(html);
				$("#usrInforMation").modal('show');
				$('#change_pass').validate({rules: {c_password: {equalTo: "#password"} , password: {minlength:5} }});
			});
			});
 });

function submitchangePassForm(ref){
  var url 	= $('#change_pass').attr('action');

  var data 	= $('#change_pass').serialize();
  var button  = $(ref).val();
  $(ref).val('Updating');
  $(ref).attr('disabled','disabled');

  doAjaxCall(url,data,false,function(html){
  $(ref).val('Updated');
  if(html ==1){
  //alert('yes');
  }
  });

  }
</script>
<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>Registered User Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
                
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll" id="user_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>User Name</th>
              <th>Company</th>
              <th>Website</th>
              <th>User Status</th>
              <th>User Type</th>
			  <th>Last Login</th>
			  <th>Action</th>
			  <th>Action</th>
			 
			  
            </tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($request_pending as $cat){
             ?>
            <tr>
              <td><?=$s_no;?></td>
              <td><?=$cat->userName;?></td>
			  <td><?=substr($cat->company,0,20);?></td>
			  <td><?=$cat->website;?></td>
			  <td><?if($cat->isActive == 0) {
						echo '<span label ="label  badge-inverse">Inactive</span>';
			  }else if($cat->isActive == 1){
				echo  '<span class="label  label-success">Active</span>';
			  }else if($cat->isActive == 2){
				echo  '<span class="label  label">Suspend</span>';
			  };?></td>
			  <td><?=($cat->userType==1) ? '<span class="label label-info">Advertiser</span>':'<span class="label label-important"> Publisher </span>';?></td>
              <td><?=date('d F Y g:h:i',$cat->lastLogin);?></td>	
			 <td><input type="button" class="btn btn-danger userAction" value="Change Password" url="<?=base_url().'admin/user_manage/changePasswordView/'.$cat->userId;?>"></td>		
			<td><input type="button" class="btn btn-info goforDetail" value="view" id="<?=$cat->userId;?>" ></td>	
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
<div id="usrInforMation" class="modal hide fade">
</div>
