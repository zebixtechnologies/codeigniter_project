
<script>
$(document).ready(function(){

	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-4').addClass("active open");
 
 });


</script>

<div id="main-content">
      <div class="row-fluid">
        <div class="span12 widget">
          <div class="widget-header"> 
            <span class="title"><i class="icon-list-2"></i>Total Leads Views</span>
            <div class="toolbar">
              <div class="btn-group" > 

              </div>
            </div>
          </div>

            <div class="row-fluid" style="border: 1px solid #ccc;">
                  <form  id="leadsviews" name="" class="submitChange"  action="<?=base_url().'admin/adtrack/leadscatviews/?'?><?=$_SERVER['QUERY_STRING'];?>" >
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
                    <th>Category Name</th>
                    <th>Total Views</th>
                    <th>Total Leads</th>
                  </tr>
              </thead>
              <tbody>
                 
                    <?php 
           $s_no = 1;
           $categorymap = array();
          if(isset($totalleads) && is_array($totalleads) && count($totalleads) > 0){
              foreach($totalleads as $countleads){
                    $catId = "$countleads->categoryId";
                    $categorymap[$catId] = $countleads->totalleads;
               }
          }
           foreach($totalviews as $views){
             ?>
            <tr>
              <td><?=$s_no;?></td>
              <td><?=$views->categoryName;?></td>
		
                <td><?=$views->views;?></td>
                <td>
                <?php
                    echo isset($categorymap[$views->category_id]) ? $categorymap[$views->category_id] : 0;
                ?>
                </td>
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
<blockquote>&nbsp;</blockquote>
</div>
<div id="usrInforMation" class="modal hide fade">
</div>
