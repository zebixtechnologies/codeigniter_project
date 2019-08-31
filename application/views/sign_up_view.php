<link rel="stylesheet" href="<?php echo $this->config->item("base_url"). "assets/admin_property/bootstrap/css/bootstrap.min.css"; ?>" media="screen">
<script src="<?php echo $this->config->item("base_url"). "assets/admin_property/bootstrap/js/bootstrap.min.js"?>"></script>
<script type="text/javascript">
    function popup(msg,url,data,button1,button2,callback){
        $.msgbox(msg, {
            type : "confirm",
            height: 300
        });
    }
    
  $(document).ready(function(){
     $('body').removeClass('homeindex');
     $('#addNewUserButton').click(function(){
         
           // if($('.gf-radio.options input[type="radio"]:checked').val()==2){
                    //if ($('#agreement').prop('checked') == false) {
                     //$('#agreementlabel').show(); 
                   // }
            //}
         $("html, body").animate({ scrollTop: 0 }, 600);
           return false;
    });
    /*$("#add_user").submit(function(e){
        e.preventDefault();
        if(!$("#agreement").is(":checked")){
            $("#agreementlabel").css("display","block");
        }else{
            $(this).submit();
        }
    });*/
     $('.showPopup').click(function (e){
         e.preventDefault();
         $("#usrInforMation").modal("show");
	 //popup($("#agreementdetail").html(),"","","","","");
         //$("#agreementdetail").html();
         //alert("#agreementdetail").html());
    });
    
    $('.closePopup').click(function (e){
         e.preventDefault();
         $("#usrInforMation").modal("hide");
         
    });
    /*$("#agreement").click(function(){
        if($(this).is(":checked")){
            $("#agreementlabel").css("display","none");
        }else{
            $("#agreementlabel").css("display","block");
        }
    });
    /*$("#radio-2").click(function(){
        //if($(this).is(":checked")){
            $("#agreement").addClass("required").addClass("error");
        //}
    });
     $("#radio-1").click(function(){
        //if($(this).is(":checked")){
            $("#agreement").removeClass("required").removeClass("error");
        //}
    });*/
});
</script>    <!-- content-->

<style>
.modal {
position: fixed;
top: 50%;
left: 50%;
z-index: 1050;
width: 720px;
margin: -290px 0 0 -350px;
background-color: #ffffff;
border: 1px solid #999;
border: 1px solid rgba(0, 0, 0, 0.3);
-webkit-border-radius: 6px;
-moz-border-radius: 6px;
border-radius: 6px;
-webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
-moz-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
-webkit-background-clip: padding-box;
-moz-background-clip: padding-box;
background-clip: padding-box;
outline: none;
height: 600px;
overflow-y: auto;
}
</style>
    <div class="container dotted-back">
          <div class="row clearfix">
        <h1 class="pagehead">Sign Up To Key Verticals</h1>
        <div class="sixcol ">
            <form class="form-horizontal signup" action="<?=base_url().'sign_up/addnewuser'?>" id="add_user" method="post" onsubmit="return false;">
        <h5>Just fill out this form to get started:</h5>
			<div class="sign_up error alert-error"></div>
			<div class="sign_up success alert-success"></div>
             <div class="control-group">
            <label class="control-label" for="your_name">Your Name<b class="req_field">*</b></label>
            <div class="controls">
                  <input type="text" id="your_name" placeholder="Your Name" name="name" class="required">
                </div>
          </div>
			<div class="control-group">
            <label class="control-label" for="company">Company<b class="req_field">*</b></label>
            <div class="controls">
                  <input type="text" id="company" placeholder="Company Name" name="company_name" class="required" >
                </div>
          </div>
              <div class="control-group">
            <label class="control-label" for="user_name">User Name (Login name)<b class="req_field">*</b></label>
            <div class="controls">
                  <input type="text" id="user_name" placeholder="User Name" name="user_name" class="required" >
                </div>
          </div>
              <div class="control-group">
            <label class="control-label" for="Email">Email<b class="req_field">*</b></label>
            <div class="controls">
                  <input type="text" id="Email" placeholder="Email" name="email" class="required email" >
                </div>
          </div>
              <div class="control-group">
            <label class="control-label" for="p_number">Phone<b class="req_field">*</b></label>
            <div class="controls">
                  <input type="text" id="p_number" placeholder="Phone Number" name="phone" class="required" >
                </div>
          </div>
              <div class="control-group">
            <label class="control-label" for="weburl">Website URL<b class="req_field">*</b></label>
            <div class="controls">
                  <input type="text" id="weburl" placeholder="Website URL" name="website" class="required url" value="http://" >
                </div>
          </div>
              <div class="control-group">
            <label class="control-label" for="start">I'd like to start as an</label>
            <div class="controls">
				<ul class="gf-radio options">
                <li>
                    <input type="radio" name="userType" id="radio-1"  value="1" /><label for="radio-1"> Advertiser </label>
                </li>
				<li>
                                    <input type="radio" value="2" checked="checked" name="userType" id="radio-2" /><label for="radio-2" class="required"> Affiliate </label>
                </li>
            </ul>

					
                </div>
          </div>
                  
           
                        
              <div class="control-group clearfix">
                  <div class="pullleft clearfix">
               <label class="control-label" for="start" id="adminmsg">Select one or more to advertise in:<b class="req_field">*</b></label>
               <div class="control-group control1" style="display: none;">
               
               
             
                  <label class="control-label" for="start">
                      <input type="checkbox" id="agreement"  value="1" style="margin: -5px 0px;
margin-right: 5px;"/>Check this box if you agree to Keyverticals's <a href="#" class="showPopup">affiliate terms and conditions.</a> </label>		
                  <label for="agreement" style="display:none;color: red;padding: 0px 15px;" id="agreementlabel">Please accept the terms & conditions</label>
              
           </div>
              
                  </div>
                  <div class="pullright clearfix" style="width:60%;float: left;">
                      <div class="controls" style="margin-left: 0;">  
                          <ul class="options gf-checkbox" style="width: 100%;">
					<?	$i=1;
						foreach($category as $info){
						echo ' <li>
						<input type="checkbox" class="" value="'.$info->categoryId.'" name="category[]"  id="cat_'.$i.'"/><label for="cat_'.$i.'" >'.$info->categoryName.'</label>
						</li>';
						$i++;
						}
					?>
               
                </ul>
                </div>
                  </div>
                  

          </div>
              <div class="center action-btn">
            <input type="submit" id="addNewUserButton" class="btn btn-large" value="Signup">
            

          </div>
            </form>
      </div>
      
              <div class="sixcol last">
              
              	<h3>Why Key Verticals?</h3>
                <p>Businesses are looking to generate leads using the Internet instead of the traditional offline marketing vehicles that have been around forever. Cost Per Action (CPA) marketing isn’t something new, the only reason it took off and grew was because so did the Internet. It only makes sense for businesses and corporations to leverage the scale and scope of the Internet and take lead generation to a whole new level.</p>
                <p>The Internet is so massive and so abundant that it’s virtually impossible for any company to penetrate even a fraction of it without the help of an army of affiliates. Even with an army, they still won’t even come close to penetrating the whole market. There are way too many channels, too many outlets, too many traffic sources, and too many new mechanisms to get traffic that come out on a DAILY basis that it’s impossible to do this exclusively in-house. </p>
                <p>Find out how we can partner today - Sign up now for free!</p>
                <div class="signupimage center">
                    <img src="<?=base_url() ?>/assets/user/design/images/Signup.png" alt="">
                    
                </div>
              </div>
        </div>
  </div>
 
    
<div id="usrInforMation" class="modal hide fade">
    <div class="container dotted-back">
			<div class="row clearfix">
				<h1 class="pagehead">AFFILIATE AGREEMENT</h1>
               <p>  THIS AFFILIATE AGREEMENT (the "Agreement"), together with any amendments, are entered into by and between KeyVerticals.com registered as Key Verticals Limited. ("KeyVerticals"), and the applying party submitting the Application for Affiliate / Publisher Status (the "Affiliate"), also referred to herein jointly as the parties ("Parties", each a "Party"). This Affiliate Agreement supplements all other Campaign Terms subsequently agreed to by the Affiliate.
WHEREAS, KeyVerticals and Affiliate desire to provide for the terms and conditions of this Affiliate Agreement as more specifically set forth herein;
THEREFORE, the Parties agree to be legally bound as follows:</p>
               <p><b>1.     Definitions.</b><br>
1.1. "Opt-in" or "Opted-in" means that the consumer has made an active, affirmative choice to receive Ads from the Affiliate.<br>
1.2. "User" means any person using the Internet.<br>
1.3. "Action" means a User's completion of an action (such as a form view or lead) defined by the Advertiser or KeyVerticals.<br>
1.4. "Network" means the advertising network operated by KeyVerticals, which is made up of Affiliates and Advertisers.<br>
1.5. "Advertiser" means the advertiser, merchant or advertising agency providing advertisements to KeyVerticals for use by the Affiliate.<br>
1.6. "Ad" means the advertisement in the form of graphics, forms and/or text supplied to KeyVerticals for inclusion in the KeyVerticals Network and to be made available for Affiliate use.<br>
1.7. "Spam" means unsolicited bulk email where recipients have not agreed in advance to receive Ads.<br>
1.8. "Campaign Terms" means the specific guidelines for each Advertiser campaign as listed in the KeyVerticals network.</p>
               <p><b> 2.     Amendments.</b><br>
                   2.1. From time to time, KeyVerticals may amend, replace or supplement the Agreement, including but not limited to changing Advertiser payouts, and it shall be deemed effective immediately unless otherwise noted, and Affiliate will be deemed to have consented to, and agreed to be bound by the updated Campaign Terms. The KeyVerticals marketplace platform operates a bid system for advertisers hence, bids and payouts will often change. It is the responsibility of the Affiliate to abide by these modifications with or without notice of change from KeyVerticals.,</p>
               <p><b>3.     Affiliate Requirements.</b><br>
3.1. Affiliate is subject to review and may be rejected for any reason, and at any time, by KeyVerticals.<br>

3.2. Affiliate must submit valid and correct contact information, including but not limited to name, e-mail address, website, and telephone number. Affiliate must ensure this information remains up-to-date at all times within the KeyVerticals Network. Affiliate must accurately, clearly and completely describe all promotional methods in the follow up emails and provide additional information when necessary.<br>
3.3. Affiliate websites must not be associated with or contain any illegal activity, or pornographic, obscene, racist, or hateful content, or deceptive advertising, piracy, libelous or defamatory statements.<br>
3.4. Affiliate websites must not contain any mechanisms that could be downloaded on to a User's computer without the User's explicit knowledge and consent.<br>
3.5. In its sole discretion, if at any time KeyVerticals deems the Affiliate's website or advertising activities are contrary to the terms set out in the Agreement, the Affiliate shall be terminated from the Network and shall forfeit any and all commissions and earnings.</p>
               <p><b> 4.     Affiliate Rules.</b><br>
4.1. Failure to adhere to the following rules is a violation of the Agreement and will result in immediate termination of the Affiliate from the KeyVerticals Network with forfeiture of all monies due to Affiliate.<br>
4.2. Affiliate must only load the KeyVerticals lead forms within a frameset or iframe unless prior written approval is obtained from KeyVerticals.<br>
4.3. Affiliate must not modify the iframe codes supplied by KeyVerticals in any way unless prior written approval is obtained from KeyVerticals.<br>
4.4. Affiliate will not provide an incentive in any form, directly or indirectly, to Website users to fill any of the KeyVerticals lead forms. Breach of this provision may result in deletion of all leads generated by affiliate from the System, in additional to any other remedies available to KeyVerticals.<br>
4.5. Affiliate must not make misleading or disparaging statements, oral or written, about any category lead form, Advertiser or KeyVerticals.<br>
4.6. Affiliate must agree to receive periodic communications from KeyVerticals. This communication could be in the form of e-mail, instant message, postal mail, telephone or fax.<br>
4.7. Affiliate must not display any Ad in third party newsgroups, social networks, message boards, blogs, link farms, counters, chatrooms or guestbooks without the consent of such third party entity.<br>
4.8. Affiliate must comply with all Terms of Service as outlined in KeyVerticals Terms of Use webpage.<br>
4.9. Affiliates must not use SMS/text messages to deliver Ads to Users.<br>
4.10. Affiliate must not generate any Actions in bad faith or through fraudulent mechanisms. This includes, but is not limited to, generating own Actions using manual or automated processes, misrepresenting product or service offered by Advertisers, deceiving Users into obtaining product or service offered by Advertisers, and encouraging or educating Surfers to cancel any product purchase or service provided by Advertisers.<br>
4.11. Affiliate must not share, lend, lease, sell or transfer their account to any third party unless prior written approval is obtained from KeyVerticals.<br>
4.12. Any Affiliate engaged in the distribution of Ads via email must comply with all of the following rules:<br>
4.12.1. Affiliate must distribute Ads only to those recipients who have Opted-in to receive such email from the Affiliate. KeyVerticals prohibits the use of Spam. Any use of Spam whatsoever by Affiliate will result in the forfeiture of Affiliate's entire commission for all campaigns, and the termination of the Affiliate's account. Affiliate will also be held liable for any and all damages resulting from a violation of this provision including reasonable court costs.<br>
4.12.2. If requested by KeyVerticals, Affiliate must be able within 24 hours of such request, to supply the name, date, time, IP address and URL where the User gave permission to the Affiliate to receive such Ads through e-mail.<br>
4.12.3. Affiliate must ensure each email recipient is provided with a valid opt-out mechanism within each email delivered in order for the recipients to "opt-out" of future mailings from Affiliate.<br>
4.12.4. Affiliate must not use the Advertiser or KeyVerticals name (including any abbreviation thereof) in the originating email address line ("From" line) or subject line of any email transmission, unless specific permission is given otherwise.<br>
4.12.5. Affiliate must not use falsified sender information or falsified IP Addresses.<br>
4.12.6. Affiliate must use only legitimate routing information.<br>
4.12.7. Affiliate must have a proper privacy policy on their website, and it must be in compliance with all legal guidelines, rules and regulations in respect to online privacy and shall warrant that email campaigns are conducted in accordance with that privacy policy, and in accordance with any applicable local or international laws.<br>
4.12.8. Affiliate must ensure each email clearly contains the Affiliate's physical address, which cannot be a PO BOX.<br>
4.12.9. Affiliate must comply with all campaign instructions from KeyVerticals<br>
4.12.10. Affiliate must comply with any and all applicable rules, regulations and laws, specified or not within this Agreement, in respect to email distribution and advertising and relating thereto.</p>
               <p><b> 5.     Advertising Services and Warranties.</b><br>
5.1. Provided that Affiliate complies with all provisions of this Agreement and Campaign Terms, KeyVerticals hereby grants to Affiliate a non-exclusive, limited, revocable license to market, display, perform, copy, transmit, and promote the Ad in connection with its obligations hereunder; and market display, perform, copy, transmit, and promote the Ad to third parties in connection with its obligations hereunder. Affiliate's use of Ads or copyrighted materials in violation of this Agreement is strictly forbidden and will result in this limited license being immediately withdrawn and may further result in the termination of the Affiliate's account and being held liable under applicable law.<br>
5.2. KeyVerticals's sole obligation to the Affiliate under this Agreement with respect to Ads shall be to provide such Ads for use in their advertising efforts. The advertising services provided by KeyVerticals are provided "as is". KeyVerticals makes no warranties, guaranties, promises, or estimates, expressed or implied, oral, written or otherwise except as specifically set forth herein, AND does not guarantee, including but not limited to, demographic profiling of Users, click to Action conversion rates, response rates or conversion rates from Action to sale.<br>
5.3. No additional warranties are provided.</p>
               <p><b>6.     Commission Earnings and Payments.</b><br>
6.1. KeyVerticals shall send Affiliate's commission payment approximately fifteen (15) days from the last business day of each month in which earnings are accrued if the amount due to Affiliate exceeds ten thousand (10,000) naira. Commissions will only be earned on Actions reported by the Advertiser, and only after KeyVerticals receives full payment from the Advertiser. KeyVerticals is under no obligation to pay Affiliates for Actions which are rejected or not paid by the Advertiser.<br>
6.2. KeyVerticals or the Advertiser may reverse any Action generated by the Affiliate. Circumstances for Action reversals include but are not limited to duplicate Actions, fraudulently generated Actions, non-payment, Affiliate's failure to comply with the Agreement, invalid or incomplete data, or product returns. Reversals for any lead may be applied only within 30 days, including for Actions during a period where payment has already been issued to the Affiliate.<br>
6.3. In the event reversals are applied to Actions for which an Affiliate has already been paid, Affiliate is required to return payment for these Actions to KeyVerticals.<br>
6.4. To ensure proper payment, affiliate is solely responsible for providing and maintaining accurate contact and payment information associated with affiliate’s account.</p>
               <p><b>7.     Representations and Warranties.</b><br>
7.1. Each Party represents and warrants they have full corporate right, power, and authority to enter into this Agreement, to grant the rights and licenses granted and to perform the acts required of it.<br>
7.2. Each Party acknowledges that the other Party makes no representations, warranties, or agreements related to the subject matter hereof that are not expressly provided for in this Agreement.</p>
               <p><b> 8.     Non-Circumvention.</b><br>
                   8.1. Affiliate shall not solicit or recruit, directly or indirectly, any Advertiser that is known to Affiliate to be an Advertiser of KeyVerticals, for purposes of offering products or services that are competitive with KeyVerticals, nor contact such Advertisers for any purpose, during the term of Affiliate's membership in the KeyVerticals Network and for the twelve (12) month period following termination of Affiliate's membership in the KeyVerticals Network.</p>
               <p><b>9.     Limitation of Liability.</b><br>
9.1. UNDER NO CIRCUMSTANCES SHALL EITHER PARTY BE LIABLE TO THE OTHER FOR INDIRECT, INCIDENTAL, PUNITIVE, CONSEQUENTIAL, SPECIAL OR EXEMPLARY DAMAGES OR COSTS, DIRECT OR INDIRECT, (EVEN IF SUCH PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES), ARISING FROM AFFILIATE PARTICIPATION IN KEYVERTICALS'S NETWORK. KEYVERTICALS SHALL NOT IN ANY EVENT BE LIABLE TO AFFILIATE FOR MORE THAN THE AMOUNT PAID TO AFFILIATE HEREUNDER. NO ACTION, SUIT OR PROCEEDING SHALL BE BROUGHT AGAINST KEYVERTICALS MORE THAN ONE YEAR AFTER THE DATE OF SERVICE.<br>
9.2. Affiliate agrees to not to hold KeyVerticals or Advertisers liable for any of the consequences of interruption or service.</p>
               <p><b> 10.     Indemnification.</b><br>
10.1. Affiliate hereto agrees to indemnify and hold harmless KeyVerticals, Advertiser, and each if its agents, officers, directors and employees against all liability to third parties resulting from the acts or failure to act of such indemnifying party, or any act of its customers or users. Affiliate is solely responsible for any legal liability arising out of or relating to the Affiliate's website(s), any material to which Users can link through the Affiliate's website(s) and/or any consumer and/or governmental/regulatory complaint arising out of any e-mail campaign or other advertising campaign conducted by Affiliate, including but not limited to any Spam or fraud complaint and/or any complaint relating to failure to have proper permission to conduct such campaign to the consumer.</p>
               <p><b> 11.     Confidentiality.</b><br>
11.1. Affiliate agrees to refrain from disclosing KeyVerticals's confidential information or the Advertiser's confidential information (including but not limited to commission rates, conversion rates, email addresses, fees, identities of Advertisers) to any third-party without prior written permission from KeyVerticals.</p>
               <p><b> 12.     Force Majeure.</b><br>
12.1. Neither party shall be deemed in default of this Agreement to the extent that performance of its obligations or attempts to cure any breach are delayed or prevented by reason of any act of God, fire, natural disaster, accident, terrorism, riots, acts of government, shortage of materials or supplies, or any other cause beyond the reasonable control of such party; provided, that the party whose performance is affected by any such event gives the other party written notice thereof within three (3) business days of such event or occurrence.</p>
               <p><b> 13.     Relationship.</b><br>
13.1. The Parties to the Agreement are independent non-exclusive contractors. Neither Party will have any right, or authority to enter into any agreement on behalf of, or incur any obligation or liability of, or to otherwise bind the other Party, nor is either party an agent, representative, partner, employee, or joint venture of the other Party.</p>
               <p><b> 14.     Remedies.</b><br>
14.1. KeyVerticals reserves the right to withhold payment and take appropriate legal action to cover its damages against any Affiliate that violates the terms of this Agreement or breaches the representations and warranties set forth in this Agreement, or commits fraudulent activity against KeyVerticals. Except as otherwise specified, the rights and remedies granted to a Party under the Agreement are cumulative and in addition to, not in lieu of, any other rights and remedies which the Party may possess at law or in equity.</p>
               <p><b>15.     Entire Agreement.</b><br>
15.1. This Agreement constitutes the entire and only agreement and supersedes any and all prior agreements, whether written, oral, express, or implied, of the Parties with respect to the transactions set forth herein.</p>
               <p><b>16.     Governing Law.</b><br>
16.1. The rights and obligations of the parties under this Agreement shall be governed by and construed under the laws of the Federation of Nigeria, without reference to conflict of laws principles.</p>
               <p><b>17.     Termination.</b><br>
17.1. This Agreement may be terminated by either party. This Agreement may be terminated immediately upon notice for your breach of this Agreement.<br>
17.2. Upon termination of this Agreement, any permissions granted under this Agreement will terminate, and Affiliate must immediately remove all Ads and links to our lead forms.<br>
IN WITNESS WHEREOF, the Parties have caused this Agreement to be duly executed and binding upon Affiliate's submission and KeyVerticals's acceptance of Affiliate's properly completed Affiliate network application without need for further action by KeyVerticals.
               </p>
               <div style="float: right; margin-bottom:20px"><button class="closePopup">Close</button></div>
                        </div></div>
</div>
  
      <!-- content--> 
      <style>
          .pullleft{
               float: left;
                width: 32%;
          }  
        

      </style>