<script>
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li3').addClass('active open');
  $('#navigation ul #li3 #li3-1').addClass("active open");
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
});
function saveCreditAccountForm(){
			
			if($('#creditForm').valid()){
				var url =  $('#creditForm').attr('action');  
			  var data = $('#creditForm').serialize();  
			doAjaxCall(url,data,true,function(html){
					window.location.href="<?=base_url();?>"+'admin/manage_advertiser';
					
					})
			
			return false;
			}
			  
	
}

function closeMe(){
	$('#popup').click();
	
}
</script>
<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>Registered Advertiser Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
                
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll table-hover" id="advertiser_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>User Name</th>
              <th>Company</th>
              <th>Website</th>
              <!--<th>Active ADS</th>-->
              <th>Balance</th>
              <th>Last Login</th>
              <th>Account </th>
              <th>ADS Action </th>
			 
			  
            </tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
            foreach($request_pending as $cat){
            ?>
            <tr id="<?=$cat->userId;?>" >
              <td><?=$s_no;?></td>
              <td><?=$cat->userName;?></td>
			  <td><?=substr($cat->company,0,20);?></td>
			  <td><a href="<?=$cat->website?>" target="_blank"><?=substr($cat->website,0,20);?></a></td>
			  <!--<td><?php // $cat->total_activeAds;?></td>-->
			  <td>
          <?= SITE_CURRENCY;?>
          <span class="label label-important"><?=($cat->balance==0 || $cat->balance=='') ? '0.00':number_format($cat->balance,2)?>
          </span></td>
			  <td><?=date('m-d-Y h:m:s',$cat->lastLogin);?></td>
			  <td><input type="button" class="btn btn-danger userAction" value="Manage Account" url="<?=base_url().'admin/manage_advertiser/creditaccountview/'.$cat->userId?>"></td>			  
			  <td><a href="<?=base_url().'admin/manage_advertiser/user_advs/'.$cat->userId; ?>"><input type="button" class="btn btn-info" value="View Leads"> </a></td>			  
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
<div id="usrInforMation" class="modal hide fade">
</div>