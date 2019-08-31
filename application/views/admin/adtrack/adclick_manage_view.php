<script>
$(document).ready(function(){
	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-1').addClass("active open");
  $('#content').removeClass();
	$('.rollBackTrnas').click(function(){
	var url = $(this).attr('src');
	var keeper =  $(this);
	var data = '';
	 doAjaxCall(url,data,true,function(html){
				  if(html == 1){
				  msg = 'Roll Back Your Transaction.';
				  type = 'success';
				  title = 'Rollback Transaction';
					keeper.closest('tr').hide('fade');
				  }else{
				  msg = 'Roll Back Your Transaction.';
				  type = 'error';
				  title = 'Rollback Transaction Failed';
				  }

				  $.pnotify({
				  title: title,
				  text: msg,
				  type: type
				  });
				  });
	})
 })
</script>

<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i><?if(isset($statusReport[0]->adName))echo strtoupper($statusReport[0]->adName);?>   (Leads History)</span>
        <div class="toolbar">
          <div class="btn-group" > 
                
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll table-hover" id="cliks_listing">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Lead Ip</th>
              <th>Form Fill Date</th>
              
              <th>State</th>
              <th>Mac Address</th>
              <th>Lead Time</th>
              <th>Credit To</th>
              <th>Debit From</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?
           $s_no = 1;
           foreach($statusReport as $info){
             ?>
            <tr>
              <td><?=$s_no;?></td>
              <td><?=$info->ipaddress;?></td>
              <td><?=date('m-d-Y m:j:s',$info->formFillDate);?></td>
			
			  <td><?=$info->stateName;?></td>
			  <td><?=$info->mac_address;?></td>
              <td><?=date('m-d-Y m:j:s',$info->created);?></td>
			  <td>  <?=$info->PublisherName;?><i class="icol-money-dollar"></i><span class="label label-important"><?=($info->credit=='')? '0.00':sprintf("%.2f",$info->credit);?></span></td>
			  <td><?=$info->advertiserName;?> <i class="icol-money-dollar"></i><span class="label label-important"><?=($info->debit=='')? '0.00':sprintf("%.2f",$info->debit);?></span></td>
			  <td><a href="javascript:" src="<?=base_url().'admin/adtrack/rollbacktransaction/'.$info->adStatusId?>" class="btn btn-danger rollBackTrnas">Roll Back Transaction</a></td>
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
<script>
$(document).ready(function(){
  $('#cliks_listing').dataTable({
   "sPaginationType":"full_numbers",
   "aaSorting":[[0, "asc"]]
 //  "aoColumnDefs": [{ 'bSortable':false,'aTargets':[8]}]
   });

})
</script>