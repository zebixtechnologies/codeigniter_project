<script>
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li7').addClass('active open');
  $('#navigation ul #li7 #li7-1').addClass("active open");
  $('#content').removeClass();
  
  $('.userAction').click(function (){
			$("#usrInforMation").modal(); 
			var url = $(this).attr('url');
			var data = '';
			doAjaxCall(url,data,true,function(html){
				$('#usrInforMation').html(html);
				$("#usrInforMation").modal('show');
				$('#debitForm').validate();
			});
			});
  $('.alltypepayment').click(function (){
			$("#usrInforMation").modal();
			var url = $(this).attr('url');
                        var data1 = $(this).siblings("input").val();
                        var data ="pub_name="+data1;
			doAjaxCall(url,data,true,function(html){
				$('#usrInforMation').html(html);
				$("#usrInforMation").modal('show');
				$('#debitForm').validate();
			});
			});
                  
});
function saveDebitAccountForm(){
			
			if($('#debitForm').valid()){
                          var url =  $('#debitForm').attr('action');  
			  var data = $('#debitForm').serialize();  
			doAjaxCall(url,data,true,function(html){
					window.location.href="<?=base_url();?>"+'admin/manage_publisher';
					
					})
			
			return false;
			}
			  
	
}
function saveAllTimePaymentForm(){
			
			if($('#debitForm').valid()){
			  var url =  $('#debitForm').attr('action');  
			  var data = $('#debitForm').serialize(); 
                          //alert(data);
			doAjaxCall(url,data,true,function(html){
					window.location.href="<?=base_url();?>"+'admin/manage_publisher';
					
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
        <span class="title"><i class="icon-list-2"></i>Registered Publisher Listing</span>
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
              <th>All Time Earnings</th>
              <th>Current Month Balance</th>
              <th>Last Month Balance</th>
              <th>All Time Payments</th>
              <th>Last Login</th>
              <th>Account </th>
              <th> Action</th>
              <th>Set Commission</th>
              <th>Account Details</th>
              
			</tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($request_pending as $cat){  ?>
            <tr id="<?=$cat->userId;?>" >
              <td><?=$s_no;?></td>
              <td><?=$cat->userName;?></td>
			  <td><?=substr($cat->company,0,20);?></td>
			  <td><a target="_blank" href="<?=$cat->website;?>"><?=substr($cat->website, 0,30);?></a></td>
			  <td>
          <?= SITE_CURRENCY;?>
          <span class="label label-warning balance"><?=($cat->balance == '') ? '0.00':sprintf("%.2f",$cat->balance);?></span></td>
                          <td>   <?= SITE_CURRENCY;?>
          <span class="label label-warning balance"><?=($cat->currentbalance == '') ? '0.00':sprintf("%.2f",$cat->currentbalance);?></span></td>
                          <td> <?= SITE_CURRENCY;?>
          <span class="label label-warning balance"><?=($cat->lastmonthbalance == '') ? '0.00':sprintf("%.2f",$cat->lastmonthbalance);?></span></td>
                           <td> <?= SITE_CURRENCY;?>   
                               <input type="hidden" class="pub_name_<?=$s_no;?>" value="<?=$cat->userName;?>" >
                               <input type="button" style=" border: none;" class="label label-warning balance alltypepayment" value="<?=($cat->pub_all_time_payment == '') ? '0.00':sprintf("%.2f",$cat->pub_all_time_payment);?>" url="<?=base_url().'admin/manage_publisher/pub_all_time_payment/'.$cat->userId?>">
                           </td>
			  <td><?=date('m-d-Y h:m:s',$cat->lastLogin);?></td>
			  <td><input type="button" class="btn btn-danger userAction" value="Manage Account" url="<?=base_url().'admin/manage_publisher/debitaccountview/'.$cat->userId?>"></td>			  
			  <td><a href="<?=base_url().'admin/manage_publisher/publisher_info/'.$cat->userId; ?>" class="btn btn-info" > View Profile </a>
			  </td>	
                          <td><input type="button" class="btn btn-primary userAction" value="Set Commission" url="<?=base_url().'admin/manage_publisher/setcommissoinview/'.$cat->userId?>"></td>	
                          <td><input type="button" class="btn btn-warning userAction" value="Account Details" url="<?=base_url().'admin/manage_publisher/accountdetailsview/'.$cat->userId;?>"></td>
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