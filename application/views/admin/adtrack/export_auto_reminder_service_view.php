<script>
    $(document).ready(function () {
        var base_url = '<?= base_url(); ?>';
        $('#navigation ul  #li2').addClass('active open');
        $('#navigation ul #li2 #li2-6').addClass("active open");
        $('.userAction').click(function () {
            $("#usrInforMation").modal();
            var url = $(this).attr('url');
            var data = '';
            doAjaxCall(url, data, true, function (html) {
                $('#usrInforMation').html(html);
                $("#usrInforMation").modal('show');
            });
        });
        $("#select").click(function () {
            var chk = $(this);
            $.each($(".input-small"), function(index, value) {
              
                $(this).prop("checked", chk.is(":checked") ? true : false);
            });
        });

    });
</script>

<div id="main-content">
    <div class="row-fluid">
        <div class="span12 widget">
            <div class="widget-header"> 
                <span class="title"><i class="icon-list-2"></i>Export Auto Reminder Services</span>
                <div class="toolbar">
                    <div class="btn-group" > 

                    </div>
                </div>
            </div>

            <div class="row-fluid" style="border: 1px solid #ccc;">
                <form  id="leadsviews" name="" class="submitChange"  action="<?= base_url() . 'admin/adtrack/ExportAutoReminderleads/?' ?><?= $_SERVER['QUERY_STRING']; ?>" >
                    <div class="span9">
                        <div class="control-group" style="margin-left: 10px; margin-top: 10px;">
                            <label class="control-label" for="dateFrom">Filter By</label>
                            <!--                            <div class="controls">
                                                            None <input type="radio" id="select" autocomplete="off" name="select" class="input-small" value="none" checked="checked" style="margin: 0px;">
                                                            Weekly  <input type="radio" id="select" autocomplete="off" name="select"  class="input-small" value="weekly" style="margin: 0px;">
                                                            Monthly  <input type="radio" id="select" autocomplete="off" name="select"  class="input-small" value="monthly" style="margin: 0px;">
                                                        </div>-->
                            <div class="controls">
                                <select class="span8" id="advertisment" name="Filter_By">
                                    <option value="alldata">All</option>
                                    <option value="weekly">Expiring in 7 days</option>
                                    <option value="monthly">Expiring in 30 days</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="span12" style="margin: 0px; padding: 0px;">
                        <div class="control-group" style="margin-left: 10px; margin-top: 10px;">
                            <label class="control-label" for="dateFrom"></label>

                            <div class="controls">
<!--                                <select class="span12" id="insurance-type" name="insurance-type" class="small required">
                                    <option selected="selected" value="all">All</option>
                                    <option value="Third Party Only">Third Party Only</option>
                                    <option value="auto Insurance">Auto (Comprehensive)</option>
                                    <option value="health Insurance">Health Insurance</option>
                                    <option value="home Insurance">Home Insurance</option>
                                    <option value="life Insurance">Life Insurance</option>
                                    <option value="business Insurance">Business Insurance</option>
                                    <option value="travel Insurance">Travel Insurance</option>
                                </select>-->
                                <div class="controls">
                                    <input type="checkbox" id="select" autocomplete="off" class="input-small" value="all" style="margin: 5px;"> All
                                    <input type="checkbox" id="select1" autocomplete="off" name="select1" class="input-small" value="Third Party Only"  style="margin: 5px;">Third Party Only
                                    <input type="checkbox" id="select2" autocomplete="off" name="select2" class="input-small" value="auto Insurance" style="margin: 5px;">Auto (Comprehensive)
                                    <input type="checkbox" id="select3" autocomplete="off" name="select3" class="input-small" value="health Insurance"  style="margin: 5px;">Health Insurance 
                                    <br /><br />
                                    <input type="checkbox" id="select4" autocomplete="off" name="select4" class="input-small" value="home Insurance"  style="margin: 5px;">Home Insurance 
                                    <input type="checkbox" id="select5" autocomplete="off" name="select5" class="input-small" value="life Insurance" style="margin: 5px;">Life Insurance 
                                    <input type="checkbox" id="select6" autocomplete="off" name="select6" class="input-small" value="business Insurance" style="margin: 5px;">Business Insurance 
                                    <input type="checkbox" id="select7" autocomplete="off" name="select7" class="input-small" value="travel Insurance" style="margin: 5px;">Travel Insurance 
                                </div>                                 


                            </div>
                        </div>
                    </div>
                    <div class="span5" style="margin: 0px; padding: 0px;">
                        <div class="control-group" style="margin-left: 10px; margin-top: 10px;">
                            <label class="control-label" for="dateFrom"></label>
                            <!--                            <div class="controls">
                                                            None <input type="radio" id="select" autocomplete="off" name="select" class="input-small" value="none" checked="checked" style="margin: 0px;">
                                                            Weekly  <input type="radio" id="select" autocomplete="off" name="select"  class="input-small" value="weekly" style="margin: 0px;">
                                                            Monthly  <input type="radio" id="select" autocomplete="off" name="select"  class="input-small" value="monthly" style="margin: 0px;">
                                                        </div>-->
                            <div class="controls">
                                <input type="submit" id="" class="btn btn-info" value="Export Report">
                            </div>
                        </div>
                    </div>

                </form>

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
