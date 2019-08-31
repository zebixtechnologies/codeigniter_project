  <footer id="footer">
    <div class="footer-left">Copyright &copy; <?=SITE_NAME;?>  All rights reserved - <a target="_blank" href="http://www.keyverticals.com/home/terms">Terms &amp; Conditions</a></div>
    <div class="footer-right">
      <p>Load Time : 26.0001 Milliseconds 0.0260001 Seconds 0.000433335 Mins</p>
    </div>
  </footer>
</div>
<!--
multi image uploader
-->
<script src="<?php echo base_url().'assets/admin_property/';?>bootstrap/js/jquery/uploadify_31/jquery.uploadify-3.1.min.js" type="text/javascript"></script>
<!-- Core Scripts --> 

<script src="<?php echo base_url().'assets/admin_property/bootstrap/js/';?>bootstrap.min.js"></script> 
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/libs/jquery.placeholder.min.js"></script>
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/libs/jquery.mousewheel.min.js"></script> 

<!-- Template Script --> 
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/template.js"></script> 
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/setup.js"></script> 
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/setup.js"></script> 
 
<!--bx slider for icons -->
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/bootstrap-transition.js"></script> 
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/bootstrap-carousel.js"></script> 

<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/jquery.ibutton.min.js"></script>
<!-- jquery-ui Scripts --> 
<script src="<?php echo base_url().'assets/admin_property/assets/';?>jui/js/jquery-ui-1.9.1.min.js"></script> 
<script src="<?php echo base_url().'assets/admin_property/assets/';?>jui/jquery-ui.custom.min.js"></script> 
<script src="<?php echo base_url().'assets/admin_property/assets/';?>jui/timepicker/jquery-ui-timepicker.min.js"></script> 
<script src="<?php echo base_url().'assets/admin_property/assets/';?>jui/jquery.ui.touch-punch.min.js"></script> 

<!-- Plugin Scripts --> 
<!-- DataTables -->
<script src="<?php echo base_url().'assets/admin_property/';?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url().'assets/admin_property/';?>plugins/datatables/TableTools/js/TableTools.min.js"></script>

<script src="<?php echo base_url().'assets/admin_property/';?>plugins/datatables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url().'assets/admin_property/';?>plugins/datatables/jquery.dataTables.columnFilter.js"></script>

<!-- PrettyPhoto -->
  <script src="<?php echo base_url().'assets/admin_property/';?>plugins/prettyphoto/js/jquery.prettyPhoto.min.js"></script>


<!-- Flot --> 
<!--[if lt IE 9]>
    <script src="<?php echo base_url().'assets/admin_property/assets/';?>js/libs/excanvas.min.js"></script>
    <![endif]--> 

<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/jquery.msgbox.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url().'assets/admin_property/';?>ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/demo/gallery.js"></script>
<!-- Demo Scripts --> 
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/demo/dashboard.js"></script>
  <script src="<?php echo base_url().'assets/admin_property/';?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/jquery.pnotify.min.js"></script>

<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/jquery.uniform.min.js"></script>
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/script.js"></script>
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/jquery.livequery.js"></script>
<script src="<?php echo base_url().'assets/admin_property/assets/';?>js/jquery.Jcrop.js"></script>
<script src="<?php echo base_url().'assets/user/design/jscript/adver.js';?>"></script>

 <script>

   function showAlert() /* function for hide alert after 5 seconds */
   {
   setTimeout( "$('.alert').slideUp('slow');",5000);
   }

   $(document).ready(function(){
   showAlert(); // call function on body load


   /* start lazy loading function for image showing style*/
   $("img.lazy").lazyload();
   $("img.lazy").show().lazyload();
   /*$("img.lazy").lazyload({
   event : "click"
   });
   $("img.lazy").lazyload({ threshold : 5000 });
   End of lazy load
   */



   /*START data tables validation for searching and sortings*/
   
   $('#adv_listing').dataTable({
   "sPaginationType":"full_numbers",
   "aaSorting":[[0, "asc"]],
   "aoColumnDefs": [{ 'bSortable':false,'aTargets':[10]}]
     
   });

   /*End of datatables */


   /*START validation on forms with validation rules also validate by id's*/


   $("#adv_profile_view").validate({rules: {new_c_pass: {equalTo: "#input04"} , new_pass: {minlength:5} }});

   /* END of avalidations */



   /* start datepicker */
   $(".datepicker").datepicker();
   /* end datepicker*/



   /* START tool tip */
   $('.Reg').tooltip().mouseenter(function(e) {
   e.preventDefault()
   })
   });
   /*END tool tip*/



   /**************************/
   /*      Ajax function     */
   /*                        */
   /**************************/
   function doAjaxCall(url,data,showLoading,callback){
   if (showLoading){
   $('.loadingDiv').show();
   }
   $.ajax({
   url: url,
   type: "POST",
   data: data,
   cache: false,
   success: function(html){
   callback(html);
   if (showLoading){
   $('.loadingDiv').hide();
   }
   }
   });
   }



   /*Example of calling Ajax*/
   function activationAd(currentVal,adId,adGroupId)
   {
   var url = $.trim($(currentVal).attr('src'));
   doAjaxCall(url,'',true,function(html){});
   }
   /*End Example Of calling function*/

 </script>

</body>
</html>