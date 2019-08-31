<script type="text/javascript">
  $(document).ready(function(){
     $('body').removeClass('homeindex');
  });
</script>
<!-- content-->
<div class="container dotted-back">
  <div class="row clearfix">
    <h1 class="pagehead">Contact Us</h1>
    <div class="sixcol">
      <div class="panel-grey nobackground findbox highpanel">
          <strong>OUR OFFICES</strong>
          <br/><br/>
          <address>
          <strong>Anthony Office:</strong>
          <p>The Penthouse, Theodolite House,</p>
          <p>306 Ikorodu Road, Anthony - Lagos.</p>
          <p>tel: 01-4540940</p>
        </address>

        <address>
          <strong>Bode Thomas Office:</strong>
          <p>No.94 Mustapha Close, Off Eric Manuel Crescent</p>
          <p>Bode Thomas, 101211, Lagos.</p>
        </address>
 
     <p>P.O.Box 73893 Victoria island.</p>
      <br/>


        <address>
          <strong>Customer Support</strong>
          <br>
            <a href="mailto:contact@keyverticals.com">contact@keyverticals.com</a>
          </address>

        <div id="map_canvas" class="google-maps"></div>
      </div>
    </div>
    <div class="sixcol last contact_form">
        <h3 style="font-weight: normal; padding: 0px 0 10px;">Contact Key Verticals Limited</h3>
      <h5> Any questions? Comments? Yes, you can type over 150 characters.</h5>
	  <div class="customer error alert-error"></div>
			<div class="customer success alert-success"></div>
      <form class="form-horizontal" action="<?=base_url().'home/sendinquiry'?>" enctype="multipart/form-data" id="user_inquires" name="user_inquires" onsubmit="return false;">
        <div class="control-group">
          <label class="control-label" for="F_name">First Name</label>
          <div class="controls">
            <input type="text" id="F_name" name="fname" placeholder="First Name" class="required">
                    </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="L_name">Last Name</label>
          <div class="controls">
            <input type="text" id="L_name" name="lname" placeholder="Last Name" class="required" >
                    </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="p_number">Phone</label>
          <div class="controls">
            <input type="text" id="p_number" name="phone" placeholder="Phone Number" class="required" >
                    </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="Email">Email</label>
          <div class="controls">
            <input type="email" id="Email" name="email" placeholder="Email" class="required">
                    </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="Comments">Comments</label>
          <div class="controls">
            <textarea id="" class="required Comments" name="comment" placeholder="Comments Questions" ></textarea>
          </div>
        </div>
        <div class="right">
          <input type="submit" id="sendInquiery" class="btn btn-info" value="Send">
            <input type="reset" id="reset" class="btn btn-warning " value="Cancel">
                  </div>

      </form>

    </div>
  </div>
</div>
<!-- content-->
