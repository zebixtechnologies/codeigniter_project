<script>
  $(document).ready(function(){
    var currency = <?php echo "'". SITE_CURRENCY . "';" ;?>
    var cost = <?php echo LEAD_COST . ";"; ?>
    $('#navigation ul  #li6').addClass('active open');
    $('#navigation ul #li6 #li2-1').addClass("active open");
    $('#content').removeClass();  
        $('#getPurchase').click(function(e){
           // alert("This is function : " + jQuery.isFunction("testFunction"));
              e.preventDefault();
              var url = $(this).attr("url");
              var data = $("#pub_info").serialize();
              var purchaseUrl = $("#pub_info").attr("action");
              var msg = $(this).attr('msg');
              var countOfLead = "";
            //alert($("#leadwanted").val());
            // first get count of all records.
            if($("#leadwanted").val().length > 0){
              doAjaxCall(url,data,false,function(html){
                console.log(html);
                countOfLead = html;
                if(parseInt(countOfLead) > 0){
                    if(parseInt(countOfLead) <  $("#leadwanted").val()){
                        msg = "You will be charged "+currency+cost+" per lead. The total available lead count which matches your search criteria is " + countOfLead + ". Do you still want to continue?<br/>" ;
                  }
                    popup(msg,purchaseUrl,data,"Cancel","Proceed",function(html){
                        console.log(html);
                        //if something get purchased the we have to show popup which show "save as" option
                      if(html.indexOf("http://") == 0){
                          //$("#result123").append(html);
                          console.log(html);
                          alert(html);
                          msg = "You can <a href='"+html+"'>download</a> and save the data to your system in excel format.";
                          popup(msg,html,"","","Download","");
                          /*saveUrl = html;
                          popup(msg,saveUrl,data,"Cancel","Download",function(html){
                              if(html){
                                  alert("data saved");
                              }else{
                                  alert("error");
                              }
                          });*/
                      }
                    });
                }else{
                    popup("No record found","","","","Ok","");
                    // no record found.
                }
             });
          }else{
              popup("Enter Number of Leads Wanted..!!","","","","Ok","");
          }
        });
  
        $('#lead_listings').dataTable({
           "sPaginationType":"full_numbers",
           "iDisplayLength" : 10,
           "aaSorting":[[0, "asc"]]

           });
        $("#searchbtn").click(function(e){
           //alert("hi");
           e.preventDefault();
           var data = $("#pub_info").serialize();
           var url =  <?php echo "'" . base_url().'adv_loginuser/dashboard/purchaseLeadSearch' . "'" ;?>;
           doAjaxCall(url,data,true,function(html){
               //console.log(html);
               if(html != 0 ){
                   $("#result").show();
                   $("#searchResult").empty().append(html);
               }else{
                   $("#result").hide();
                   popup("No record found","","","","Ok","");
               }
           });
        });
  });
  
  function popup(msg,url,data,button1,button2,callback){
    if(button1 != ""){
        $.msgbox(msg, {
            type : "confirm",
            buttons : [
                   {type: "submit", value: button1},
                   {type: "submit", value: button2}
                 ]
             },function(result){
                if(result == button2){
                     //var data = $('#pub_info').serialize();
                     //alert(data);
                     doAjaxCall(url,data,false,function(html){
                        callback(html);
                        //$(resultContainer).html(html);
                     });
                }
         });
      }else{
        $.msgbox(msg, {
              type : "confirm",
              buttons : [
                     {type: "submit", value: button2}
                   ]
               },function(result){
                  if(result == button2 && button2== "Download"){
                      window.location.href = url;
                  }
         });
      }
  }
  
 </script>
  <div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>
 
            </ul>-->
          <h1 id="main-heading">Buy Old Leads</h1>
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
          <span class="title"><i class="icon-edit"></i>Purchase Leads (<?php echo SITE_CURRENCY . LEAD_COST ?> Per Lead)</span>      
        </div>
        <div class="widget-content form-container">
					<div class="row-fluid">
                                            <div style="padding: 10px;">Here you can purchase older leads for a fixed price of <?php echo SITE_CURRENCY . LEAD_COST ?> per lead! Old leads comprise of customers who once indicated interest in buying one of your competitor’s products. It is far easier to market to this category of people than a random person out there who has never shown interest in your line of product. Even a paying customer of another company can be won over to yours, or you can at least have them patronize you side by side in future. This is a unique opportunity to convert more leads on your side for cheap.</div>
                                            <form name="pub" id="pub_info" class="submitChange" action="<?=base_url().'adv_loginuser/dashboard/getpurchaseleads';?>" method="POST" onsubmit="return false;">
						<div class="span4">
							<div class="control-group">
               
                <label class="control-label" for="searchType">Category</label>
								<div class="controls">
									<select class="span12" id="usercat" name="usercat">
												<!--<option value="0">All</option>-->
											<?php
											//print_r($usercategories);
											foreach($usercategories as	$a){
                                                                                                $select = isset($_POST["usercat"]) && strlen($_POST["usercat"]) && $a->categoryId == $_POST["usercat"] ? "selected" : "";
												echo <<<EOT
                                                                                                    <option $select value="$a->categoryId">$a->categoryName</option>
EOT;
											}?>	
									</select>
								</div>
							
							</div>
						</div>
                                                <?php
                                                //$year = date("Y");
                                                  //              $start = strtotime("first day of january $year midnight");
                                                    //echo "date is " . date("j F Y H:i:s a",$start);
                                                ?>
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="statetype">State</label>
								<div class="controls">
									<select class="span12" id="statename" name="statename">
										<!--<option value="0">all</option>-->
										<?php
                                                                                        foreach($states as	$info){
                                                                                            $select = isset($_POST["statename"]) && strlen($_POST["statename"]) && $_POST["statename"] == $info->stateName ? "selected" : "";
                                                                                            echo <<<EOT
                                                                                                <option $select value="$info->stateName">$info->stateName</option>
EOT;
	
                                                                                    }?>
									</select>
								</div>
							
							</div>
						</div>
                                            <div class="span4">
							<div class="control-group">
								<label class="control-label" for="dateFrom">Date</label>
								<div class="controls">
                                                                    From <input type="text" autocomplete="off" id="datepicker-from" name="datepicker_from" class="input-small" <?php if(isset($datepicker_from)){ ?>value="<?=$datepicker_from;}?>">
									 To  <input type="text" autocomplete="off" id="datepicker-to" name="datepicker_to"  class="input-small" <?php if(isset($datepicker_to)){ ?>value="<?=$datepicker_to;}?>">
								
								
                                                                </div>
							</div>
						</div>
                                                <div class="span4">
							<div class="control-group">
								<label class="control-label" for="dateFrom">Age</label>
								<div class="controls">
                                                                    <select name='age' class="span12">
                                                                        <option value='18 – 20'>18 – 20</option>
                                                                        <option value='21 – 30'>21 – 30</option>
                                                                        <option value='31 – 40'>31 – 40</option>
                                                                        <option value='40 and above'>41 and above</option>
                                                                    </select>
                                                                </div>
							</div>
						</div>
                                            <div class="span4">
							<div class="control-group">
								<label class="control-label" for="dateFrom">Preferred Sex </label>
								<div class="controls">
                                                                    <select name='gender' class="span12">
                                                                        <option value='Male'>Male</option>
                                                                        <option value='Female'>Female</option>
                                                                    </select>
                                                                </div>
							</div>
						</div>
                                            <div class="span4">
							<div class="control-group">
								<label class="control-label" for="dateFrom">Number of Leads Wanted</label>
								<div class="controls">
                                                                    <input type="text" id="leadwanted" value='' name='leadswanted' class="number">
                                                                </div>
							</div>
						</div>
                                            <div class="span4" style="display: none;">
							<div class="control-group">
							
								<!-- change here-->
								<div style="display: block" class="alert-error">
									
								</div>
								<!-- change here-->
								<div style="display: block" class="alert-success">
									
								</div>
							</div>
						</div>
                                                <div class="row-fluid">
                                            <div class="span3">
                                                <div class="control-group">
                                                    <input type="button" id="searchbtn" class="btn search" value="Search">
                                                </div>
                                            </div>				
					</div>
                                    </form>
                                </div>
                                    <div id="result" style="display: none;">
                                        <div class="row-fluid">
						<table id="lead_listings" class="table table-striped">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>Category</th>
								</tr>
							</thead>
                                                        <tbody id="searchResult">
								<?php
                                                                        /*$i=1;
                                                                        //echo "Count is " . count($oldLeads);
                                                                        if(isset($oldLeads)){
                                                                        foreach($oldLeads as $info){ ?>
                                                            <tr>
                                                                    <td><?=$i;?></td>
                                                                    <td><?=$info->category_name;?></td>
                                                            </tr>
                                                                <?php	$i++;
                                                                        }}*/	?>
							</tbody>
						</table>
					</div>
                                        <div class="row-fluid">
                                                <div class="span3">
                                                    <div class="control-group">
                                                        <a id="getPurchase" href="#" msg="You will be charged <?php echo SITE_CURRENCY . LEAD_COST;?> per lead. Please confirm once again to proceed." url="<?php echo base_url() . "adv_loginuser/dashboard/getPurchaseLeadCount";?>" role="button"  data-toggle="modal">  
                                                            <input type="button" class="btn btn-info" value="Proceed to Buy Leads" >
                                                        </a>
                                                    </div>
                                                </div>				
                                            </div>
                                    </div>
                                    
                                        
					<!--<input type="hidden" name="totalLeads" value="<?php if(isset($oldLeads)) echo count($oldLeads); ?>">-->
			
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
<div id="usrInforMation" class="modal hide fade">
</div>
<script type="text/javascript">
		
		
		
</script>
<div id="result123"></div>