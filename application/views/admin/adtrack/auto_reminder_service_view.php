
<script>
$(document).ready(function(){

  var base_url = '<?=base_url();?>';
  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-5').addClass("active open");
 $('.deleteuserpmt').click(function(e){
        e.preventDefault();
        var url = $(this).attr("url");
        $.msgbox($(this).attr('msg'), {
         type: "confirm",
         buttons : [
            {type: "submit", value: "Yes"},
            {type: "submit", value: "No"}
          ]
          },function(result) 
                             {
                                if(result == 'Yes'){
                                    //alert($(this).attr("url"));
                                    window.location.href = url; //$(this).attr("href"); //"http://localhost/keyverticals/admin/login/logout";
                                }
            });
         });
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
function closeMe(){
    $("#popup").click();
  }
  
  function submitProfile(){
        var url 	= $('#update_profile').attr('action');
        var data 	= $('#update_profile').serialize();
        doAjaxCall(url,data,false,function(html){
            window.location.reload();
        });
        return false;
  }
</script>
<style>
    #user_listing th{
        vertical-align: middle;
    }
     #user_listing th:last-child{
         width:70px !important;
     }
     #user_listing{
         border-top:none !important;
     }
     .dataTable thead .sorting:last-child :before {
content: "";
margin-top: -9px;
display: none !important;
}

</style>
<div id="main-content">
      <div class="row-fluid">
        <div class="span12 widget">
          <div class="widget-header"> 
            <span class="title"><i class="icon-list-2"></i>Auto Reminder Services</span>
            <div class="toolbar">
              <div class="btn-group" > 

              </div>
            </div>
          </div>

            <div class="row-fluid" style="border: 1px solid #ccc;">
                  <form  id="leadsviews" name="" class="submitChange"  action="<?=base_url().'admin/adtrack/autoreminder/?'?><?=$_SERVER['QUERY_STRING'];?>" >
                        <div class="span9">
                                <div class="control-group" style="margin-left: 10px; margin-top: 10px;">
                                    <label class="control-label" for="dateFrom"></label>
                                    <div class="controls">
                                        From <input type="text" id="datepicker-from" autocomplete="off" name="datepicker_from" class="input-small" <?php if(isset($datepicker_from)){ ?>value="<?=$datepicker_from;}?>">
                                        To  <input type="text" id="datepicker-to" autocomplete="off" name="datepicker_to"  class="input-small" <?php if(isset($datepicker_to)){ ?>value="<?=$datepicker_to;}?>">
                                    </div>
                                </div>
                        </div>
                      <div class="span3" style="margin-top: 10px;">
                                <div class="control-group">
                                    <input type="submit" id="" class="btn btn-info" value="Run Report">
                                </div>
                        </div>
                  </form>

            </div>

          <div class="widget-content table-container">
            <table class="table table-striped table-flipscroll" id="user_listing">
              <thead>
                 <tr>
                  <th>S.No.</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <th>Currently Insured</th>
                  <th>Insurance Type</th>
                  <th>Expiry Date</th>
                  <th>Edit/Delete</th>
                  <?php
//                    if(isset($records) && is_array($records) && count($records) > 0){
//                        foreach($records as $cat){
//                            echo "<th>" . $cat->categoryName . "</th>";
//                        }
//                    }
//                  ?>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    if(isset($totalreminder) && is_array($totalreminder) && count($totalreminder) > 0){
                        $uniqueArray = array();
                        $srNo = 1;
                        foreach($totalreminder as $autoreminder){                       
                            echo "<tr>";
                            echo "<td>{$srNo}</td>";                          
                            echo "<td>{$autoreminder->name}</td>";
                            echo "<td>{$autoreminder->phone_number}</td>";
                            echo "<td>{$autoreminder->email}</td>"; 
                            echo "<td>{$autoreminder->current_insurance_status}</td>"; 
                            echo "<td>{$autoreminder->insurance_type}</td>"; 
                            echo "<td>".date("Y/m/d",$autoreminder->insurance_expiry_date)."</td>"; ?>
                           <td><a class="deleteuserpmt" href="#" msg="Are you sure you want to delete this user ..?" url="<?=base_url().'admin/adtrack/autoreminderdelete/'.$autoreminder->id;?>" role="button"  data-toggle="modal">  
				<input type="button" class="btn btn-warning" value="Delete User" >
			</a><a href="#" class="userAction" url="<?=base_url().'admin/adtrack/updateAutoReminder/'.$autoreminder->id;?>" role="button"  data-toggle="modal">  
				<input type="button" class="btn btn-primary" value="Update Profile" >
			</a></td> 
                         <?php   
                            echo "</tr>";
                            $srNo++;
                        }
                    }
                    //print_r($publisherMap);
                  ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

</section>

</div>
<blockquote>&nbsp;</blockquote>
</div>
<div id="usrInforMation" class="modal hide fade">
</div>
