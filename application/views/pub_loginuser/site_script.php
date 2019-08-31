<script>
	$(document).ready(function() {
		$('#navigation ul  #li3').addClass('active open');
		$('#lasthistory').change(function() {
			
			var cattext=$("#lasthistory option:selected").text();
			var catval=$("#lasthistory option:selected").val();
                        var linkpath='auto';
			if(catval==38 || catval==43 || catval==44 || catval==45 || catval==46 || catval==47){
                            linkpath='selectadvertiser';
                            
                        }else if(catval==49 || catval==41 || catval==55 || catval==56 || catval==48 || catval==57){
                            
                            linkpath='auto';
                        }
			var d1=$('#selCatData1').val();
			var d2=$('#selCatData2').val();
			
			//$('#textdata').val(d1+'<input type="radio" id="radcat" checked name="category" value="'+catval+'" /><label id="cattext" >'+cattext+'</label> '+d2);	
			$('#textdata').val(d1+'Zipcode'+ '<input type="text" name="zipcode" size="10"  maxlength="5" />'+d2);
			var statedata=$('#statevalues').val();
			var statedata2=$('#statevalues2').val();
			var dt1	=	$('#dt1').val();
			var dt2	=	$('#dt2').val();
                        var dt3	=	$('#dt3').val();
                        var dt4 =       $('#dt4').val();
                       //console.log(dt1+linkpath+dt3+'category_code="'+catval+'";'+dt2);
			$('#iframeData').val(dt1+linkpath+dt3+dt4+'category_code="'+catval+'";'+dt2);
			
			$('#zipscript').val(statedata+statedata2);
			
		});	
	}); 
</script>

<div id="main-header" class="page-header">
            <!--<ul class="breadcrumb">
              <li> <i class="icon-home"></i><?=SITE_NAME;?> <span class="divider">&raquo;</span> </li>
              <li> <a href="<?php echo base_url();?>admin/dashboard/">Dashboard</a> <span class="divider">&raquo;</span></li>

            </ul>-->
            <h1 id="main-heading">Installation Codes</h1>
			   <div id="msg">
          <?php
            if(isset($msg)){
              echo $msg;
            }
          ?>
        </div>
          </div>



<div id="main-content">
	
	<div class="row-fluid">
 <div class="selectWigdet">
						
					</div>
              <div class="widget">
              <div class="widget-content ">
				<b class="text-error padding5"><strong>Note</strong></b>
				<p class="padding5">In order to properly display our lead forms, each site must have an HTML form for the user to submit initial information. Example forms are below:
	</p>
				<h4> Step 1</h4>
								<p>
									
									<select class="span12" id="lasthistory" name="lasthistory">
										<option value="0">Select Category</option>
									<?php	 foreach ($cat as $category) {
									echo	'<option value='.$category->categoryId.'>'.$category->categoryName.'</option>';
									} ?> 
									</select>	
									<p>
                                                                                    <table width="100%">
                                                                                        <tr>
                                                                                            <td width="50%" align="center">
                                                                                                <b>State form html code (recommended)</b>
                                                                                            </td>
                                                                                            <td align="center">
                                                                                                <b>Zip code form</b>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
			<div class="row-fluid margin-xl">
				<div class="span6">
                     <div class=" form-container">
                  <div class="form-horizontal">
							<div class="codeArea padding5">
								
			<?php
			
			$statevalues='<form action="results.html" method="get" >';
							$statevalues2='
							<label>State:</label>
							<select id="state" name="statecode">';
							foreach ($state as $st) {
								$statevalues2.='<option value="'.$st->stateName.'">'.$st->stateName.'</option>';
							}
							$statevalues2.='</select>
						
						
							<input type="submit" name="search" value="Get Quotes" />
						
    </form>';	
			?>			
			
		<input type="hidden" value='<? echo $statevalues;?>' id="statevalues" name="statevalues"  />	
		<input type="hidden" value='<? echo $statevalues2;?>' id="statevalues2" name="statevalues2"  />	
		
								<textarea style="height: 15em;" id="zipscript" class="span12 largeArea">
									
						
									
									</textarea>
							<?php

													$zipdata =	'<!-- EXAMPLE ZIP CODE FORM -->
 <form action="results.html" method="get" >';
	
        
           

													

												
            
			$zipdata1 =  '<input type="submit" name="search" value="Get Quotes" />
        
    </form>';
		$dt1='
<html>
<head>
<title>Best Rate Quotes from KeyVerticals</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<style type="text/css">
          #loading {

            width: 100%;

            height: 100%;

            top: 0px;

            left: 0px;

            position: fixed;

            display: none;

            opacity: 0.5;

            background-color: #fff;

            z-index: 99;

            text-align: center;

          }

        #loading-image {

          position: absolute;

         top: 225px;
          left: 580px;

          z-index: 100;

        }
	</style>
<script type="text/javascript">

function getInternetExplorerVersion()
// Returns the version of Internet Explorer or a -1
// (indicating the use of another browser).
{
var rv = -1; // Return value assumes failure.
if (navigator.appName == "Microsoft Internet Explorer")
{
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
    rv = parseFloat( RegExp.$1 );
}
return rv;
}
checkVersion();
function checkVersion()
{
    var msg = "You are not using Internet Explorer.";
    var ver = getInternetExplorerVersion();

    if (ver > -1 )
    {
            if ( ver < 9.0 ){ 
                msg ="You are using an outdated browser. Please upgrade your browser to improve your experience";
				alert( msg );
				}
    }
    
}
          
function makeFrame(category_code,ni_str_state_code,ni_ad_client,ni_subad_client) { 
	if(category_code==""){
		category_code="0";
	}
        ifrm = document.createElement("IFRAME"); 
        ifrm.setAttribute("src", "'. base_url() .'home/';
                
                
        
        $dt3 = '/?category="+category_code+"&statecode="+ni_str_state_code+"&publisherid="+ni_ad_client+"&subpublisherid="+ni_subad_client);
        ifrm.style.width = "100%"; 
        ifrm.style.height = "100%"; 
        ifrm.style.border = "none";
        document.body.appendChild(ifrm); 
   }
    function makeFrame1(category_code,ni_str_state_code,ni_ad_client,ni_subad_client,ni_advertiserid) { 
	if(category_code==""){
		category_code="0";
	}
        
        ifrm = document.createElement("IFRAME"); 
        ifrm.setAttribute("src", "'. base_url() .'home/auto';
        
        $dt4='/?category="+category_code+"&statecode="+ni_str_state_code+"&publisherid="+ni_ad_client+"&subpublisherid="+ni_subad_client+"&userid="+ni_advertiserid);
        ifrm.style.width = "100%"; 
        ifrm.style.height = "100%"; 
        ifrm.style.border = "none";
        document.body.appendChild(ifrm); 
   }
  $(window).load(function (){
    ni_ad_client = "'.$user["user_id"].'";
    ni_subad_client="'.$subpublisherID.'";
    ni_advertiserid="0";    
    ni_str_state_code="";';
        
        // end dt3
        
        
		$dt2	=	'var params = {};
    var ps = window.location.search.split(/\?|&/);
    for (var i = 0; i < ps.length; i++) {
        if (ps[i]) {
            var p = ps[i].split(/=/);
            params[p[0]] = p[1];
            if(p[0]=="category"){
                   // category_code=	p[1];
            }else if(p[0]=="statecode"){
                    ni_str_state_code=p[1];
            }
            if(p[0]=="userid"){
				ni_advertiserid=p[1];
			}
        }
    }
   if(ni_advertiserid!=0){
		makeFrame1(category_code,ni_str_state_code,ni_ad_client,ni_subad_client,ni_advertiserid);

	}else{
	
    makeFrame(category_code,ni_str_state_code,ni_ad_client,ni_subad_client);
}	
});
</script>
</head> 
<body> 
  <div id="loading">
                     <img id="loading-image" src="'. base_url() .'assets/forms/images/loadiii.gif" alt="Loading..." />
                 </div>
         <script>
      $("#loading").show();
 $(document).ready(function(){
  setTimeout(function(){
      $("#loading").hide();
  }, 1000);
 
});
</script>          
</body> 
</html>'; 
		?>
										
					<input type="hidden" id="selCatData1" value='<?php echo $zipdata;?>' />				
					<input type="hidden" id="selCatData2" value='<?php echo $zipdata1;?>' />
					<input type="hidden" id="dt1" value='<?php echo $dt1;?>' />
					<input type="hidden" id="dt2" value='<?php echo $dt2;?>' />
								<input type="hidden" id="dt3" value='<?php echo $dt3 ;?>' />
                                                                <input type="hidden" id="dt4" value='<?php echo $dt4 ;?>' />

							</div>
						
                  </div>
				  </div>


				</div>
				<div class="span6">	
                     <div class="form-container ">
                     
                  <div class="form-horizontal">
                 
							<div class=" codeArea padding5"><textarea id="textdata" style="height: 15em;" class="span12 largeArea">
								
								
							</textarea>
							</div>
						
                  </div>
				  </div>


				</div>

			</div>
			<div  class="row-fluid margin-xl">

				<div class="span6">
                     <div class="form-container">
                  <div class="form-horizontal">
							<div class="codeArea padding5"><span align="center" style="margin: 109px;"><b>Iframe Code (implement this code on the lead form page)</b></span><textarea style="height: 15em;" id="iframeData"class="span12 largeArea">
										</textarea>

							</div>
						
                  </div>
				  </div>


				</div>
				<div class="span6">
                     <div class="form-container ">
                  <div class="form-horizontal">
                  		<p>All Fields are auto generated please do not delete or replace any value</p>
							<div class=" codeArea padding5">
								
								<dl class="dl-horizontal">
								  <dt>ni_ad_client</dt>
								  <dd>your account</dd>
								</dl>
								<dl class="dl-horizontal">
								  <dt>ni_subad_client</dt>
								  <dd>Sub Publisher ID</dd>
								</dl>
								<dl class="dl-horizontal">
								  <dt>category_code</dt>
								  <dd>Ads Category</dd>
								</dl>
								<dl class="dl-horizontal">
								  <dt>ni_str_state_code</dt>
								  <dd>State Code</dd>
								</dl>
							</div>
						
                  </div>
				  </div>


				</div>

			</div>
		
		</div>
<br/><br/>
<p><strong>How it works:- </strong></p>
<p>Step 1: Select the category of interest, copy the state html code and implement it on the search box on your website (you may need a coder to do this for you). </p>
<p>Step 2: Copy and paste the iframe code into the newly created results.html file OR whichever file you specified in the "action" of your form where you want the lead form to display (you may need a coder to implement this for you).</p>
</div>

               </div>
	
	</div>

<!--	
<input type="hidden" name="statecode" value="0" />
              <input type="hidden" name="publisherid" value="'.$user["user_id"].'" />
<input type="hidden" name="subpublisherid" value="'.$subpublisherID.'" />-->
	
