    
</div>
<div id="footerwrapper">
    <div class="container footer">
        <footer class="row">
            <nav class="twocol">
                <h4 class="sub_5">About us</h4>
                <? /*  <a href="<?= base_url() . 'home/ourcompany' ?>">Our Company</a><br /> */ ?>
                <a href="<?= base_url() . 'home/ourcompany' ?>">How KeyVerticals Works</a><br />
                <a href="<?= base_url() . 'assets/user/design/ppt/Platform Demo_Advertisers.pptx' ?>">Platform Demo (Adv)</a><br />
                <a href="<?= base_url() . 'assets/user/design/ppt/Platform Demo_Publishers.pptx' ?>">Platform Demo (Pubs)</a><br />
                <? /*      <a href="<?= base_url() . 'home/oureporting' ?>">Our Reporting Platform</a><br />
                  <a href="<?= base_url() . 'home/datareporting' ?>">Data Reporting</a><br />
                  <a href="<?= base_url() . 'home/highfocused' ?>">Highly Focused Source</a><br /> */ ?>
            </nav>
            <nav class="twocol">
                <h4 class="sub_5">Reach Us</h4>
                <a href="<?= base_url() . 'home/contactus' ?>" >Contact Us</a><br />
                <a href="<?= base_url() . 'home/careers' ?>" >Careers</a><br />
            </nav> 
            <nav class="twocol">
                <h4 class="sub_5">Legal</h4>
                <a href="<?= base_url() . 'home/terms' ?>" >Terms of Service</a><br />
                <a href="<?= base_url() . 'home/privacy' ?>" >Privacy Policy</a><br />

            </nav>
            <nav class="twocol">
                <h4 class="sub_5">Key Verticals</h4>
                <a href="<?= base_url() . 'home/advertisers' ?>" >Advertisers</a><br />
                <a href="<?= base_url() . 'home/publishers' ?>" >Affiliates</a><br />
                <a href="<?= base_url() . 'home/getInsured'; ?>" >Get Insured</a><br />
                <a href="<?= base_url() . 'autoreminder' ?>" >Auto Reminder</a><br />
            </nav>	
            <nav class="twocol">
                <h4 class="sub_5">Get in touch</h4>
                <a href="<?= base_url() . 'home/contactus' ?>">Contact us</a><br />
                <a href="<?= base_url() . 'home/faq' ?>">Support</a><br />
                <a href="<?= base_url() . 'home/faq' ?>">FAQ</a><br />
            </nav> 
            <nav class="twocol last">
                <h4 class="sub_5">Follow us</h4>
                <a href="https://twitter.com/KeyVerticals" class="twitter" 	target="_blank">Twitter</a><br />
                <a href="https://www.facebook.com/KeyVerticals" class="facebook" 	target="_blank">Facebook</a><br />
                <a href="https://www.linkedin.com/company/key-verticals" class="linkedin" 	target="_blank">LinkedIn</a><br />
                <a href="https://plus.google.com/u/0/111690909766826767219" class="google" 		target="_blank">Google+</a><br />
            </nav>
        </footer>
    </div>
    <div class="container bottomfooter">
        <footer class="row">
            <div class="center"> Copyright © 2012 - 2018 <?= SITE_NAME ?> Limited</div>
        </footer>
    </div>
</div>
</div>
</div>
<!--! end of #container --> 

<script src="<?= base_url() ?>assets/user/design/jscript/plugins.js"></script> 
<script src="<?= base_url() ?>assets/user/design/jscript/modernizr-ext.js"></script> 
<script src="<?= base_url() ?>assets/user/design/jscript/script.js"></script> 
<script src="<?= base_url() ?>assets/user/design/jscript/jquery.bxslider.js"></script> 
<script src="<?= base_url() ?>assets/user/design/jscript/home.js"></script> 
<script src="<?= base_url() ?>assets/user/design/jscript/custom.js"></script> 
<script src="<?= base_url() ?>assets/admin_property/assets/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url() . 'assets/admin_property/assets/'; ?>js/jquery.msgbox.min.js"></script> 
<script>
    /*START validation on forms with validation rules also validate by id's*/
    $(document).ready(function () {
        $("#add_user").validate();
    });
</script>
<?php if ($this->uri->segment(1) == 'autoreminder') { ?>
    <script type="text/javascript" src="<?= base_url() ?>assets/forms/js/core.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/forms/js/jquery_003.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/forms/js/jquery_002.js"></script>
    <div class="acResults" style="display: none; position: absolute;"></div>
    <script type="text/javascript" src="<?= base_url() ?>assets/forms/js/myform.js"></script>

<?php } ?>

<!-- end scripts--> 

<!--[if lt IE 7 ]>
        <script src="jscript/dd_belatedpng.js"></script>
        <script>DD_belatedPNG.fix('img, .png_bg'); // Fix any <img> or .png_bg bg-images. Also, please read goo.gl/mZiyb </script>
        <![endif]-->
</body>
</html>