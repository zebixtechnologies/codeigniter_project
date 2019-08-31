<script type="text/javascript">
    $(document).ready(function () {
        var base_url = '<?= base_url(); ?>';
        $('#navigation ul  #li2').addClass('active open');
        $('#navigation ul #li2 #li2-3').addClass("active open");
//        $("#percentage").change(function(){
//            $("#flat_rate").val("");
//        })
//        $("#flat_rate").change(function(){
//            $("#percentage").val("");
//        })
    });
</script>

<style type="text/css">
    .pad-xl {
        padding:15px 0px;
    }
    .alignCenter {text-align:center;}
</style>

<div id="main-content">
    <div class="row-fluid">

        <div class="span12 widget">
            <div class="widget-header"> 

                <span class="title"><i class="icon-list-2"></i>Manage quotes for <?php echo isset($categories) && is_object($categories) && !empty($categories) ? $categories->categoryName : ""; ?></span>
                <div class="toolbar">
                    <!--<div class="btn-group" > 
                          <a class="btn Reg" href="<?php //echo base_url(); ?>admin/manage_advertiser/addnewAd/<?php //$userId; ?>" data-trigger="hover" data-toggle="tooltip" data-placement="top"  title="Create AD To Adevertiser <? if(isset($userads[0]->userName)){echo '('. $userads[0]->userName .')';}?> "><i class="icon-plus"></i> Add New Ad</a>
                    </div>-->
                </div>

            </div>

            <div class="widget-content table-container">
                <div class="row-fluid">
                    <div class="widget">
                        <div class="widget-content form-container">
                            <div class=" form-horizontal remove-top-border">
                                <form action="<?= base_url() . 'adv_loginuser/dashboard/manage_lead_quotes/'.$categories->categoryId ;?>" method="POST" enctype="multipart/form-data" >
                                    <div class="row-fluid">
                                        <div class="">    
                                                    <div class="control-group">  <span style="color:red">
                                                <?php echo isset($rate_error) && strlen($rate_error) > 0 ? $rate_error : "";  ?>
                                                </span>
                                            </div>
                                            <div class="control-group">                    		
                                                <label class="control-label " for="PageName">Premium Rate(%)</label>
                                                <div class="controls">
                                                    <label>
                                                        <input type="hidden" value="<?php echo isset($categories) && is_object($categories) && !empty($categories) ? $categories->categoryId : ""; ?>" name="category_id"/>
                                                        <input type="text" name="percentage" id="percentage" class="" value="<?php echo isset($leadQuotes) && !empty($leadQuotes) && is_object($leadQuotes) && $leadQuotes->percentage > 0 ? $leadQuotes->percentage : ''; ?>"/>
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="control-group">
                                                or
                                            </div>
                                            <div class="control-group"> 
                                                <label class="control-label " for="PageName">Flat Rate(<?php echo SITE_CURRENCY;?>)</label>
                                                <div class="controls">
                                                    <label>
                                                        <input type="text" name="flat_rate" id="flat_rate" class="" value="<?php echo  isset($leadQuotes) && !empty($leadQuotes) && is_object($leadQuotes) ? $leadQuotes->flat_rate : ''; ?>"/>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Additional Information</label>
                                                <div class="controls">
                                                    <label>
                                                        <textarea name="addition_info"><?php echo isset($leadQuotes) && !empty($leadQuotes) && is_object($leadQuotes) ? $leadQuotes->additional_info : ''; ?></textarea>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="" style="font-weight: bold;"><span style="color:red;">Note: </span>You can add a link to an external website for customers to buy online if you want e.g. <?php  echo htmlspecialchars('<a href="url" target="_blank">Click Here!</a>'); ?></label>
                                            </div>
                                            <div class="form-actions">
                                                <input type="submit" name="submit" class="btn btn-info" value="Submit" style="cursor: pointer;" />
                                                <a href="<?= base_url() . 'adv_loginuser/dashboard/leadquotes' ?>" class="btn btn-warning"> Cancel </a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
