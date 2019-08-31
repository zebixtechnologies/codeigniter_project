<script>
  $(document).ready(function(){
   var base_url = '<?=base_url()?>';
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li2 #li2-1').addClass("active open");
  $('#content').removeClass();

  $('#save_adv_info,#savePublisher').click(function(){
  if($('#pub_info').valid()){
  var url =  $('#pub_info').attr('action');
  var data = $('#pub_info').serialize();
  var keeper = $('#pub_info');
  var msg,type,title;
  doAjaxCall(url,data,true,function(html){
  
						 window.location.href	=	base_url+"pub_loginuser/subpublisher";
						 //   	$('.sign_up.alert-success').text('Publisher added Successfully.').show('fade');
						//		formReset(keeper);
						
						
  });
  }
  });
  });
 </script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }


</style>
<div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>

            </ul>-->
            <h1 id="main-heading">Welcome to <?=SITE_NAME;?></h1>
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
          <span class="title"><i class="icon-edit"></i>Add New Publisher</span>      
		<div class="toolbar">
          <div class="btn-group" > 
               
				<a class="btn Reg" href="#" id="save_adv_info" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Save All Changes"><i class="icos-save"></i> Save All</a>	
          </div>
        </div>		  
        </div>
        <div class="row-fluid">
         <form name="pub_info" onsubmit="return false;" action="<?=base_url().'pub_loginuser/subpublisher/insertsubpublisher'?>" method="post" id="pub_info">
          <div class="widget">
            <div class="widget-content form-container">
              <div class=" form-horizontal remove-top-border">
                <div class="row-fluid">
                  <div class="span6">                    
                   <div class="control-group">                    		
                    <label class="control-label">Publisher Name</label>
                    <div class="controls">
					<input  type="text" class="required span12 " name="name"  value=""/>
                    </div>
                  </div>
                </div>
                <div class="span6">
                 <div class="control-group">    
                  <label class="control-label">Email</label>                		
                  <div class="controls">
                    <input  type="text" class="required email span12 " name="email"  value=""/>
                     <input  type="hidden"  name="publisherId"  value="<?= $publisherid; ?>"/>
				</div>
                </div>
              </div>
            </div>
           
     
      <div class="form-actions" >
	    
        
	   <div class="pull-right">
		
			
				<input type="button" class="btn btn-primary" value="Save All" id="savePublisher">
			
			
		</div>
		
			
		
	      </div>
	  </div>
	</div>
	</div>
	</form>
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
				
		
		});
		
</script>