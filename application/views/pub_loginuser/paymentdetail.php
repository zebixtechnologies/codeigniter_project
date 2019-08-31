<script src="<?php echo base_url().'assets/admin_property/';?>assets/js/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){
$('#navigation ul  #li5').addClass('active open');

 $('#add_state').validate();
 
});

</script>
<div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>

            </ul>-->
            <h1 id="main-heading">Update Your Publisher Payment Details</h1>
			   <div id="msg">
          <?php
            if(isset($msg)){
              echo $msg;
            }
          ?>
        </div>
          </div>
<div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icon-plus"></i>Add Payment Details</span>                 
        </div>
        <div class="row-fluid">
     <form name="add_state" action="<?=base_url();?>pub_loginuser/dashboard/addpaymentDetails" method="post" id="add_state">
          <div class="widget">
            <div class="widget-content form-container">
                <div class=" form-horizontal remove-top-border">
                  <div class="row-fluid">
                 
                  <div class="control-group">      
                     <b class="text-error padding5"><strong>Note</strong></b>
				<p class="padding5">Please update your payment details below. Payments are on net 15 terms for the previous month’s earnings.  Note that you need a minimum balance of ₦10,000 to be eligible for payment by direct deposit only.

	</p>
                  </div>
                     </div>
                <div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Bank Name</label>
						<div class="controls">
                                                    <input  type="text" class="required span12 " name="bank_name" id="name" value="<?=$payment->bank_name;?>"/>
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Bank Address</label>
						<div class="controls">
                                                    <textarea class="required span12 " name="bank_address"><?=$payment->bank_address;?></textarea>
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Account Name</label>
						<div class="controls">
                                                    <input  type="text" class="required span12 " name="account_name" value="<?=$payment->account_name;?>" />
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Account Number</label>
						<div class="controls">
                                                    <input  type="text" class="required  span12 " name="account_number" value="<?=$payment->account_number;?>" />
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
                  <div class="span6">                    
                    <div class="control-group">                    		
						<label class="control-label " for="email">Account Type</label>
						<div class="controls">
                                                    <select  name="account_type">
                                                        <option value="saving"  <?php if($payment->account_type== 'saving'){echo "selected";}?>>Savings</option>
                                                         <option value="current" <?php if($payment->account_type== 'current'){echo "selected";}?>>Current</option>
                                                    </select>
						
						</div>
					</div>
					</div>
				</div>
				
		 </div>
      <div class="form-actions" >
       <input type="submit" class="btn btn-info" value="Save Details" id="adddetails">
      <input type="reset" class="btn btn-info" value="Cancel" >
        </a>
      </div>
  </div>
</div>
</div>
</form>
</div>
</div>
</div>