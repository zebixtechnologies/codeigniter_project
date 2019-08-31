<script>
  $(document).ready(function(){
    var base_url = '<?=base_url();?>';
  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-2').addClass("active open");
  $('#content').removeClass();
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
  
</script>

<div id="main-content">
  <div class="row-fluid">
    <div class="span12 widget">
      <div class="widget-header"> 
        <span class="title"><i class="icon-list-2"></i>AD Tracking Listing</span>
        <div class="toolbar">
          <div class="btn-group" > 
                
          </div>
        </div>
      </div>

      <div class="widget-content table-container">
        <table class="table table-striped table-flipscroll table-hover" id="ad_track">
          <thead>
            <tr>
              <th>S.No.		</th>
              <th>Category	</th>
              <th>Publisher	</th>
              <th>Preferred Provider</th>
              <th>Date</th>
              <th>Email Address</th>
               <th>Details</th>
               <th>Action</th>
			</tr>
          </thead>
          <tbody>
           <?php
          // print_r($records);
           
            if(isset($records) && $records!='' && $records!='undefined'){
                $s_no = 1;
                $emails = array();
                foreach($records as $info){
            ?>
            <tr>
              <td><?=$s_no;?></td>
					<td><?=$info['category_name'];?></td>
					<td><?=$info['publisher_name'];?></td>
					<td><?=$info['advertiser_name'];?></td>
					<td><?=date('m-j-Y',$info['datetime']);?></td>
					<td><?php
                                                $formData = $info["form_data"];
                                                $formData = str_replace("&", "&amp;", $formData);
                                                $leadData = simplexml_load_string($formData);
                                                $email = "";
                                                switch ($info["categoryId"]){
                                                    case HOME_INSURANCE:
                                                    case AUTO_INSURANCE:
                                                    case BUSINESS_INSURANCE:
                                                    case TRAVEL_INSURANCE:
                                                    case Education_INSURANCE:
                                                    case PAYDAY_LOAN:
                                                    case HOTELS:
                                                    case AUTO_QUOTES;
                                                    case CAR_LOAN;
                                                    case THIRD_PARTY_ONLY;
                                                    $email = (string) $leadData->email;
                                                    break;
                                                    case LIFE_INSURANCE:
                                                    case Health_insurance;
                                                    $email = (string) $leadData->person->email;
                                                    break;
                                                }
                                                //print_r( $email );
                                                if(in_array($email, $emails)){
                                                    echo "<span style='color:red'>$email</span>";
                                                }else{
                                                    $emails[] = $email;
                                                    echo $email;
                                                }
                                                //print_r($emails);
                                            ?></td>
                                        
                                        <td><input type="button"  class="btn btn-danger userAction"  value="Lead Detail" url="<?=base_url().'admin/adtrack/showLeadDetails/'.$info['form_data_id'];?>"></td>
					<?php $olddatetime= strtotime('-30 days');
                                       $leadtime= $info['datetime'];
                                           if($leadtime < $olddatetime){ ?>
                                        <td><input type="button"  disabled class="btn btn-info" value="Rollback" style="background-color: gray;" ></td>
                                          <?php }   else{ ?>
                                        <td>
                                        <input type="button"  class="btn btn-info userAction"  value="RollBack" url="<?=base_url().'admin/adtrack/rollbackleadconfermation/'.$info['form_data_id'];?>"></td>
                                        <?php } ?>
					
			</tr>
            <?php $s_no++; } }?>
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
  $('#ad_track').dataTable({
   "sPaginationType":"full_numbers",
   "aaSorting":[[0, "asc"]]
 //  "aoColumnDefs": [{ 'bSortable':false,'aTargets':[8]}]
   });

})
</script>