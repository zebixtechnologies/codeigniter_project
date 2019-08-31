
<script>
$(document).ready(function(){

	var base_url = '<?=base_url();?>';
  $('#navigation ul  #li2').addClass('active open');
  $('#navigation ul #li2 #li2-3').addClass("active open");
 
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
                  <form  id="leadsviews" name="" class="submitChange"  action="<?=base_url().'admin/adtrack/leadformViews/?'?><?=$_SERVER['QUERY_STRING'];?>" >
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
                  <th>Publisher	</th>
                  <?php
                    if(isset($records) && is_array($records) && count($records) > 0){
                        foreach($records as $cat){
                            echo "<th>" . $cat->categoryName . "</th>";
                        }
                    }
                  ?>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $publisherMap = array();
                    //print_r($records_info);
                    //echo "<br/><br/><br/>";
                    foreach($records_info as $pubDetail){
                        $strPubId =  "'" . $pubDetail->publisher_id . "'";
                        $newArray = array();
                        $oldArray = array();
                        if(array_key_exists($strPubId, $publisherMap)){
                            $oldArray = $publisherMap[$strPubId];
                        }
                        $catId = "'$pubDetail->category_id'";
                        $newArray = array($catId => $pubDetail->views);
                        $publisherMap[$strPubId] = array_merge($newArray,$oldArray);
                    }
                    
                    if(isset($records) && is_array($records) && count($records) > 0){
                        $uniqueArray = array();
                        //print_r($publisherMap);
                        $srNo = 1;
                        foreach($publisherMap as $key => $publisher){
                            echo "<tr>";
                            echo "<td>{$srNo}</td>";
                            foreach($records_info as $pubDetail){
                                //echo "key is $key and publisher id is : $pubDetail->publisher_id";
                                    if(!in_array($key,$uniqueArray)){
                                        if( $key == "'$pubDetail->publisher_id'"){
                                            $uniqueArray[] = $key;  
                                            //print_r($pubDetail->userName);
                                            echo "<td>{$pubDetail->userName}</td>";
                                        }
                                    }
                                }
                                $pubCatCount = $publisherMap[$key];
                                foreach($records as $cat){
                                    $strCatId = "'$cat->categoryId'";
                                    $catCount =  isset($pubCatCount[$strCatId]) ? $pubCatCount[$strCatId] : 0;
                                    echo "<td>{$catCount}</td>";
                                }
                            //}
                            //echo "<td>{}</td>";
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
