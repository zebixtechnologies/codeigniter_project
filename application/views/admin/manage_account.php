<script>
$(document).ready(function(){

	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li8').addClass('active open');
  
 
  
  
  });
 

</script>
<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>Account Management</span>
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
              <th>User Type</th>
              <th>Debit</th>
              <th>Credit</th>
              <th>Admin Profit</th>
              <th>Transaction Time</th>
		</tr>
          </thead>
          <tbody>
           <?php 
           $s_no = 1;
           foreach($extenedAccountsInfo as $cat){
             ?>
            <tr>
              <td><?=$s_no;?></td>
              <td><?=$cat->name;?></td>
		
                          <td><?php
              if($cat->userType == 1){
                  echo '<span class="label label-info">Advertiser</span>';
               } else{
                   echo '<span class="label label-important"> Publisher </span>';
                }?></td>
                          <td><?=$cat->debit;?></td>
                          <td><?=$cat->credit;?></td>
                          <td><?=$cat->admin_profile;?></td>
                          <td><?=date('d F Y g:h:i',$cat->transactionTime);?></td>	
			 	
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
