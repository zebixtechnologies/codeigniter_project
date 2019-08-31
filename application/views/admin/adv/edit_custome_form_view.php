<script>
$(document).ready(function(){
  $('#navigation ul  #li4').addClass('active open');
  $('#navigation ul #li4 #li4-4').addClass("active open");
  

 
	$("#formheader").off('click').on('click',function(){
			$("#tab3").click();
		});
		
		$("#Select_field").off('click').on('click',function(){
			$("#tab2").click();
		});

		$("#first_time_addField").off('click').on('click',function(){
			$("#tab1").click();
		});
		
		$("#dublicate").off('click').on('click',function(){
			$("#tab1").click();
		});
		$('.helpMark').tooltip({
			placement:'right',
			trigger:'hover'
		});
		
		
		
		$('#saveFomData1,#saveFomData2').click(function(){
			var url=$('#base_url').val()+"admin/customeform/updateform"	
			  $.msgbox("Insert your form name below ( if You want to Change name otherwise leave it blank) :", {
				  type: "prompt"
				}, function(result) {
				  if (result) {
					var form_data  =  $('#Elements').html();
					var form_name= result;
					var data = 'form_name='+form_name+'&form_data='+form_data+'&editId='+$('#editId').val();
					 doAjaxCall(url,data,true,function(html){
									window.location.href=$('#base_url').val()+"admin/customeform";
                                   });
                                }
				   else {
				  	$.msgbox("You didn't type anything")
				  }
				});
		
  
  });
		
});
</script>
<?foreach($formInfo as $info)?>
<input type="hidden" name="base_url" id="base_url" value="<?=base_url();?>">
<input type="hidden" name="editId" id="editId" value="<?=$info->formId;?>">
   <div id="main-content">
    <div class="row-fluid">
      <div class="span12 widget no-widget">
        <div class="widget-header"> 
          <span class="title"><i class="icos-create"></i>Customize Form Edit ( <?=ucfirst($info->formName);?> ) </span>                 
		  
        </div>
        <div class="widget-content">
         <form name="add_category" action="<?=base_url();?>admin/category_manage/addcategoryprocess" method="post" id="add_category" onsubmit="return false;">
		 <div class="FormContainer row-fluid">
    <div class="span6">
    	<div  class="pad15 center saveChanges" id="saveFomData1">
        	<a class="btn btn-info saveChanges" href="javascript:;">Save Form</a>
        </div>
       
        <div id="Select_field" class="pad15 bgBlue pointer">
            <h3 class="text-red" >You have no select fields yet!</h3>
            <p >Click the buttons on the right to add fields to your form.</p>
        </div>
        
        <div id="Elements" class="ElementsShowd">
	<?/*	<div id="formheader" class="pointer">
            <h3 id="form_Title">Untitle Form</h3>
            <h5 id="form_Desc">This is your form description. Click here to edit.</h5>
        </div> */?> 
	
		<?=htmlspecialchars_decode($info->formData);?>
        
       
        
        
        </div>
        
       	<div  class="form-actions saveChanges center" id="saveFomData2">
        	<a class="btn btn-info saveChanges" href="javascript:;">Save Form</a>
        </div>

    </div>
    
	<div class="span6">
			<ul class="nav nav-tabs">
				<li class="active"> <a href="#Add_a_Field" data-toggle="tab" id="tab1" >Add a Field</a> </li>
                <li > <a href="#field_properties" data-toggle="tab" id="tab2" >Field Properties</a> </li>
              <?/*  <li > <a href="#formProperties" data-toggle="tab" id="tab3">Form Properties</a> </li> */?>
				
			</ul>
             <div class="tab-content">
                 <div id="Add_a_Field" class="tab-pane active">
                    	<p class="center">Click To Add A Field.</p>
                        <div id="Form_elements" class="formElementsBox">
	                        <ul>
                            	<li prop="singleLine"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_single_line_text.gif" alt=""/>Single Line Text</a></li>
                                <li prop="number"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_number.gif" alt=""/>Number</a></li>
                                <li prop="pText"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_paragraph_text.gif" alt=""/>Paragraph Text</a></li>
                                <li prop="checkbox"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_checkbox.gif" alt=""/>Checkboxes</a></li>
                                <li prop="multipleChoice"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_multiplechoice.gif" alt=""/>Multiple Choices</a></li>
                                <li prop="dropDown"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_dropdown.gif" alt=""/>Drop Down</a></li>
                                <li prop="nameText"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_name.gif" alt=""/>Name</a></li>
                                <li prop="dateText"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_date.gif" alt=""/>Date</a></li>
                                <li prop="timeText"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_date.gif" alt=""/>Time</a></li>
                                <li prop="phoneText"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_phone.gif" alt=""/>Phone</a></li>
                                <li prop="addressText"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_address.gif" alt=""/>Address</a></li>
                                <li prop="websiteText"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_website.gif" alt=""/>Website</a></li>
                                <li prop="priceText"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_price.gif" alt=""/>Price</a></li>
                                <li prop="emailText"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_price.gif" alt=""/>Email</a></li>
                                <li prop="sectionBreak"><a href="javascript:;"><img src="<?=base_url().'assets/'?>custome_form/images/icon_section_break.gif" alt=""/>Section Break</a></li>
    	                    </ul>
                        
                        
                        </div>
                        
                        
                    
                 </div>
        
                    <div id="field_properties" class="tab-pane">
                        <div id="Notice_select_field" class="BgGray">
                            <h3>Please select a field</h3>
                            <p>Click on a field on the left to change its properties.</p>
                            <a href="javascript:" id="first_time_addField" class="sbtn">Add Another Field</a>                            
                        </div>
					<div id="Edit_Field_properties">
                        	<!-- for all text box, paragrah, website....-->
                        <div relfield="singleLine" class="displayNo">
                          	<div class="control-group">
								<label class="control-label" for="Field_Label">Field Label
									<span class="helpMark" title="To Place One or Two Words Above Input Fields."></span>
								
								</label>
								<div class="control"><input type="text" id="Field_Label_name" class="span10" /> <img src="<?=base_url().'assets/custome_form/'?>images/icon_arrow_left.gif" /></div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="Field_Size">Field Size 
									<span class="helpMark" title="It sets the visual appearance of the field. It does not limit nor increase the amount of data that can be collected by the field."></span>
								</label>

								<div class="control">
								<select class="select full" id="field_size" class="span10">
                                    	<option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="Field_Label_required">
                                    Required 
                                    <span class="helpMark" title="Checking this rule will make sure that a user fills out a particular field. A message will be displayed to the user if they have not filled out the field."></span>
                                    </label> 

								<div class="control">
									<input type="checkbox" id="Field_Label_required" />
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="guidlines">Guidelines for User
								<span class="helpMark" title="This text will be displayed to your users while they're filling out particular field."></span>
								</label>

								<div class="control">
									<textarea id="Field_Label_guidence"  rows="5" class="span10"></textarea>
								</div>
								
								<a href="javascript:" id="first_time_addField" class="sbtn add_another_field">Add Another Field</a>
                            </div>
							
                                    
                          
                            </div>
							
							
							
							
						<div relfield="number"  class="displayNo">
                          	<div class="control-group">
								<label class="control-label" for="Field_Label">Field Label
									<span class="helpMark" title="Field Label is one or two words placed directly above the field."></span>
								
								</label>
								<div class="control"><input type="text" id="Field_Label_name" class="span10" /> <img src="<?=base_url().'assets/custome_form/'?>images/icon_arrow_left.gif" /></div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="Field_Size">Field Size 
									<span class="helpMark" title="This property set the visual appearance of the field in your form. It does not limit nor increase the amount of data that can be collected by the field."></span>
								</label>

								<div class="control">
								<select class="select full" id="field_size" class="span10">
                                    	<option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="Field_Label_required">
                                    Required 
                                    <span class="helpMark" title="Checking this rule will make sure that a user fills out a particular field. A message will be displayed to the user if they have not filled out the field."></span>
                                    </label> 

								<div class="control">
									<input type="checkbox" id="Field_Label_required" />
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="guidlines">Guidelines for User
								<span class="helpMark" title="This text will be displayed to your users while they're filling out particular field."></span>
								</label>

								<div class="control">
									<textarea id="Field_Label_guidence"  rows="5" class="span10"></textarea>
								</div>
								
								<a href="javascript:" id="first_time_addField" class="sbtn add_another_field">Add Another Field</a>
                            </div>
							
                                    
                          
                            </div>
							
							<div relfield="emailText"  class="displayNo">
                          	<div class="control-group">
								<label class="control-label" for="Field_Label">Field Label
									<span class="helpMark" title="Field Label is one or two words placed directly above the field."></span>
								
								</label>
								<div class="control"><input type="text" id="Field_Label_name" class="span10" /> <img src="<?=base_url().'assets/custome_form/'?>images/icon_arrow_left.gif" /></div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="Field_Size">Field Size 
									<span class="helpMark" title="This property set the visual appearance of the field in your form. It does not limit nor increase the amount of data that can be collected by the field."></span>
								</label>

								<div class="control">
								<select class="select full" id="field_size" class="span10">
                                    	<option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="Field_Label_required">
                                    Required 
                                    <span class="helpMark" title="Checking this rule will make sure that a user fills out a particular field. A message will be displayed to the user if they have not filled out the field."></span>
                                    </label> 

								<div class="control">
									<input type="checkbox" id="Field_Label_required" />
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="guidlines">Guidelines for User
								<span class="helpMark" title="This text will be displayed to your users while they're filling out particular field."></span>
								</label>

								<div class="control">
									<textarea id="Field_Label_guidence"  rows="5" class="span10"></textarea>
								</div>
								
								<a href="javascript:" id="first_time_addField" class="sbtn add_another_field">Add Another Field</a>
                            </div>
							
                                    
                          
                            </div>
                        	
                        	<!-- for all multiple choises-->
                            <div relfield="multipleChoice" class="displayNo">
								
								<div class="bgWhitish pad10">
                                	
									<div class="control-group">
								<label class="control-label" for="Field_Label">Field Label
									<span class="helpMark" title="Field Label is one or two words placed directly above the field."></span>
								
								</label>
								<div class="control"><input type="text" id="Field_Label_name" class="span10" /> <img src="<?=base_url().'assets/custome_form/'?>images/icon_arrow_left.gif" /></div>
                            </div>                                   
								
									<label for="Field_Size">Choices <span class="helpMark" title="Use the plus and minus buttons to add and delete choices. Click on the star to make a choice the default selection."></span></label>
                                <ul class="ListItems">
                                   

                                </ul>

                                    <div class="control-group">
								<label class="control-label" for="Field_Label_required">
                                    Required 
                                    <span class="helpMark" title="Checking this rule will make sure that a user fills out a particular field. A message will be displayed to the user if they have not filled out the field."></span>
                                    </label> 

								<div class="control">
									<input type="checkbox" id="Field_Label_required" />
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="guidlines">Guidelines for User
								<span class="helpMark" title="This text will be displayed to your users while they're filling out particular field."></span>
								</label>

								<div class="control">
									<textarea id="Field_Label_guidence"  rows="5" class="span10"></textarea>
								</div>
								
								<a href="javascript:" id="first_time_addField" class="sbtn add_another_field">Add Another Field</a>
                            </div> 
                                    
                                    
                                    

                                
                                </div>
                            </div>
							 <div relfield="checkbox" class="displayNo">
                            	<div class="bgWhitish pad10">
                                	<div class="control-group">
								<label class="control-label" for="Field_Label">Field Label
									<span class="helpMark" title="Field Label is one or two words placed directly above the field."></span>
								
								</label>
								<div class="control"><input type="text" id="Field_Label_name" class="span10" /> <img src="<?=base_url().'assets/custome_form/'?>images/icon_arrow_left.gif" /></div>
                            </div>                                    
                                    <label for="Field_Size">Choices</label>
                                  <span class="helpMark" title="Use the plus and minus buttons to add and delete choices. Click on the star to make a choice the default selection."></span><br />
                                <ul class="ListItems">
                                   

                                </ul>

							<div class="control-group">
								<label class="control-label" for="Field_Label_required">
                                    Required 
                                    <span class="helpMark" title="Checking this rule will make sure that a user fills out a particular field. A message will be displayed to the user if they have not filled out the field."></span>
                                    </label> 

								<div class="control">
									<input type="checkbox" id="Field_Label_required" />
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="guidlines">Guidelines for User
								<span class="helpMark" title="This text will be displayed to your users while they're filling out particular field."></span>
								</label>

								<div class="control">
									<textarea id="Field_Label_guidence"  rows="5" class="span10"></textarea>
								</div>
								
								<a href="javascript:" id="first_time_addField" class="sbtn add_another_field">Add Another Field</a>
                            </div>
                                </div>
                            </div>

                        	<!-- for all select box-->
                            <div relfield="dropDown" class="displayNo">
                            	<div class="bgWhitish pad10">
                                	<div class="control-group">
								<label class="control-label" for="Field_Label">Field Label
									<span class="helpMark" title="Field Label is one or two words placed directly above the field."></span>
								
								</label>
								<div class="control">
									<input type="text" id="Field_Label_name" class="span10" /> <img src="<?=base_url().'assets/custome_form/'?>images/icon_arrow_left.gif" />
								</div>
                            </div>                                   
                                    <label for="Field_Size">Choices</label>
                                  <span class="helpMark" title="Use the plus and minus buttons to add and delete choices. Click on the star to make a choice the default selection."></span><br />
                                <ul class="ListItems">
                                  

                                </ul>
                                <div class="control-group">
								<label class="control-label" for="Field_Size">Field Size 
									<span class="helpMark" title="This property set the visual appearance of the field in your form. It does not limit nor increase the amount of data that can be collected by the field."></span>
								</label>

								<div class="control">
								<select class="select full" id="field_size" class="span10">
                                    	<option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="drop_down_rquired">
                                    Required 
                                    <span class="helpMark" title="Checking this rule will make sure that a user fills out a particular field. A message will be displayed to the user if they have not filled out the field."></span>
                                    </label> 

								<div class="control">
									<input type="checkbox" id="drop_down_rquired" />
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="guidlines">Guidelines for User
								<span class="helpMark" title="This text will be displayed to your users while they're filling out particular field."></span>
								</label>

								<div class="control">
									<textarea id="Field_Label_guidence"  rows="5" class="span10"></textarea>
								</div>
								
								<a href="javascript:" id="first_time_addField" class="sbtn add_another_field">Add Another Field</a>
                            </div>
							
                               </div>
                            </div>
							
							<!--for name text -->
							   <div relfield="nameText" class="displayNo">
                       	  <div class="bgWhitish pad10">
                                	
							<div class="control-group">
								<label class="control-label" for="Field_Label_input">Field Label
								<span class="helpMark" title="Field Label is one or two words placed directly above the field."></span>
								</label>
								
								</label>
								<div class="control">
									<input type="text" id="Field_Label_input"  value="Phone"  class="span10" /> <img src="<?=base_url().'assets/custome_form/'?>images/icon_arrow_left.gif" />
								</div>
                            </div>  
									
                                   <div class="control-group">
								<label class="control-label" for="nameTextRequired">Required 
								 <span class="helpMark" title="Checking this rule will make sure that a user fills out a particular field. A message will be displayed to the user if they have not filled out the field."></span>
                                   </label> 
									
									<div class="control">
									<input type="checkbox" id="nameTextRequired" />
								</div>
                            </div>
							
							


									<div class="control-group">
								<label class="control-label" for="nameTextGuidence">Guidelines for User
								<span class="helpMark" title="This text will be displayed to your users while they're filling out particular field."></span>
								</label>

								<div class="control">
									<textarea id="nameTextGuidence"  rows="5" class="span10"></textarea>
								</div>
								
								<a href="javascript:" id="first_time_addField" class="sbtn add_another_field">Add Another Field</a>
                            </div>

                                
                              </div>
                            </div>
                            
							
							<!--end-->
							
							
                            
                        	<!-- for Phone -->
                            
                            <div relfield="phoneText" class="displayNo">
                       	  <div class="bgWhitish pad10">
								 <div class="control-group">
								<label class="control-label" for="Field_Label">Field Label
								<span class="helpMark" title="Field Label is one or two words placed directly above the field."></span>
								</label>

									
									<div class="control">
									<input type="text" id="Field_Label_input_phone"  value="Phone" size="40"/> <img src="<?=base_url().'assets/custome_form/'?>images/icon_arrow_left.gif" />
								</div>
                            </div>

							<div class="control-group">
								<label class="control-label" for="Field_Size">Field Size
                    <span class="helpMark" title="This property set the visual appearance of the field in your form. It does not limit nor increase the amount of data that can be collected by the field."></span>
								</label>

									
									<div class="control">
									<select class="select full" id="phone_format">
									<option id="element_phone" value="phone">(###) ### - ####</option>
									<option id="element_simple_phone" value="simple_phone">International</option>
                                   </select>
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="phoneRequired">Required
                    <span class="helpMark" title="Checking this rule will make sure that a user fills out a particular field. A message will be displayed to the user if they have not filled out the field."></span>
								</label>

									
									<div class="control">
									<input type="checkbox" id="phoneRequired" />
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="nameTextGuidence">Guidelines for User
								<span class="helpMark" title="This text will be displayed to your users while they're filling out particular field."></span>
								</label>

								<div class="control">
									<textarea id="phoneGuidence"  rows="5" class="span10"></textarea>
								</div>
								
								<a href="javascript:" id="first_time_addField" class="sbtn add_another_field">Add Another Field</a>
                            </div>
                                
                              </div>
                            </div>
                            
                            <!-- for Price -->
                            
                            <div relfield="priceText" class="displayNo">
                       	  <div class="bgWhitish pad10">
                                	<div class="control-group">
								<label class="control-label" for="Field_Label">Field Label
								<span class="helpMark" title="Field Label is one or two words placed directly above the field."></span>
								</label>

									
									<div class="control">
									<input type="text" id="Field_Label_input_phone"  value="Phone" size="40"/> <img src="<?=base_url().'assets/custome_form/'?>images/icon_arrow_left.gif" />
								</div>
                            </div>                                   
                                    
									
									<div class="control-group">
								<label class="control-label" for="Field_Size">Field Size
                    <span class="helpMark" title="This property set the visual appearance of the field in your form. It does not limit nor increase the amount of data that can be collected by the field."></span>
								</label>

									
									<div class="control">
									
                                   <select class="" id="money_format" >
                                        <option  value="Dollar">$&nbsp;Dollars</option>
                                        <option  value="Euro"> &euro;&nbsp;Euros</option>
                                        <option  value="Pound">&pound;&nbsp;Pounds</option>
                                        <option  value="Yen">&yen;&nbsp;Yen</option>
                                   </select>
								</div>
                            </div>
									
							<div class="control-group">
								<label class="control-label" for="Field_Label_price_required">Required
                    <span class="helpMark" title="Checking this rule will make sure that a user fills out a particular field. A message will be displayed to the user if they have not filled out the field."></span>
								</label>

									
									<div class="control">
									<input type="checkbox" id="Field_Label_price_required" />
								</div>
                            </div>
							
							<div class="control-group">
								<label class="control-label" for="nameTextGuidence">Guidelines for User
								<span class="helpMark" title="This text will be displayed to your users while they're filling out particular field."></span>
								</label>

								<div class="control">
									<textarea id="Field_Label_guidence_price"  rows="5" class="span10"></textarea>
								</div>
								
								<a href="javascript:" id="first_time_addField" class="sbtn add_another_field">Add Another Field</a>
                            </div>			
                              </div>
                            </div>
                            
                            <!-- for Section Break -->
                            <div relfield="sectionBreak" class="displayNo">
                       	  <div class="bgWhitish pad10">
                                	<div class="control-group">
								<label class="control-label" for="Field_Label_section">Field Label
								<span class="helpMark" title="Field Label is one or two words placed directly above the field."></span>
								</label>

									
									<div class="control">
									<input type="text" id="Field_Label_section"  value="Section Break" class="span10"/> <img src="<?=base_url().'assets/custome_form/'?>images/icon_arrow_left.gif" />
								</div>
                            </div>  

					<div class="control-group">
								<label class="control-label" for="nameTextGuidence">Guidelines for User
								<span class="helpMark" title="This text will be displayed to your users while they're filling out particular field."></span>
								</label>

								<div class="control">
									<textarea id="section_guidence"  rows="5" class="span10"></textarea>
								</div>
								
								<a href="javascript:" id="first_time_addField" class="sbtn add_another_field">Add Another Field</a>
                            </div>
							    
                              </div>
                            </div>
                            
                            
                            
                            
                        
                        </div>
                        
                       
                   
				   
				   
				   </div>
				   
				   
				   
				   
				   
                   	 
                   <div id="formProperties" class="tab-pane">
					<div id="formPropertiesForm" class="form-container remove-top-border" >
                   	<div class="control-group">
						<label class="control-label" for="sendto">Send To
						<span class="helpMark"   title="The email address to which form submitted data will be sent."></span>
						</label>
						<div class="controls">
							<input type="text" id="sendto" name="sendto" class="span12"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="FormTitle">Form Title <span class="helpMark"  title="The title of your form displayed to the user when they see your form."></span></label>
						<div class="controls">
							<input type="text" id="FormTitle" name="FormTitle" value="Untitle Form" class="span12"/>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="form_description">Description<span class="helpMark"  title="This will appear directly below the form name. Useful for displaying a short description or any instructions, notes, guidelines."></span></label>
						<div class="controls">
							<textarea id="form_description" rows="7" class="span12" name="Description">This is your form description. Click here to edit.</textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="form_sucesss">Form Success <span class="helpMark"  title="This will appear directly below the form name. Useful for displaying a short description or any instructions, notes, guidelines."></span></label>
						<div class="controls">
							<textarea id="form_sucesss" rows="7" name="form_sucesss" class="span12" >This is your form description. Click here to edit.</textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="submit_button">Submit Button Lable <span class="helpMark"  title="This label used for submit button"></span></label>
						<div class="controls">
							<input type="text" id="submit_button" name="submit_button" value="Submit" class="span12">
						</div>
					</div>

					</div>
                   </div>
                    
             </div>

		</div>
    
    </div>
    
       
       
       
  <ul id="secondryUl" class="displayNo">
            	<div id="singleLine">
				<li rel="singleLine">
                	<div class="element_div">
                    	<label class="primary"> Text </label><span class="helpMark" ></span>
                        <div class="medium c1">
	                        <input type="text"  name="sinleLine[]" class="medium " />
                        </div>
                    </div>
                   	<div class="dublicate"></div> 
                  	<div class="del_element"></div>
                </li> 
            	</div>
			<div id="number">
                <li rel="number">
                	<div class="element_div">
                    	<label class="primary"> Number</label><span class="helpMark" ></span>
                        <div class="medium c1" >
	                        <input type="number"  id="Text1" name="NumberText[]" value="123" class="medium number" />
                        </div>
                    </div>
                   	<div class="dublicate"></div> 
                   	<div class="del_element"></div>
                </li> 
			</div>	
			<div id="pText">
                <li rel="pText">
                	<div class="element_div">
                    	<label class="primary"> Paragraph</label><span class="helpMark" ></span>
                        <div class="medium c1">
	                        <textarea class="small"  name="paraText[]"></textarea>
                        </div>
                    </div>
                   	<div class="dublicate"></div> 
                   	<div class="del_element"></div>
                </li>  
             </div> 
			<div id="checkbox">	
                 <li rel="checkbox">
                	<div class="element_div">
                    	<fieldset data-role="controlgroup">
	                       <legend class="primary">Checkboxes</legend><span class="helpMark" ></span>
                           <div class="checkboxes_div">
                           <div>
	                        <input type="checkbox" name="checkboxChoice[]" id="checkboxChoice1" />
                            <label for="checkboxChoice1">checkbox 1</label>
                           </div>
                           <div>
	                        <input type="checkbox" name="checkboxChoice[]" id="checkboxChoice2"/>
                            <label for="checkboxChoice2">checkbox 2</label>
                            </div>
                            <div>
	                        <input type="checkbox"  name="checkboxChoice[]" id="checkboxChoice3"/>
                            <label for="checkboxChoice3">checkbox 3</label>
                            </div>
                         </div>
                        </fieldset>
                        </div>
                   	<div class="dublicate"></div> 
                   	<div class="del_element"></div>
                </li>  
             </div> 
		<div id="multipleChoice">				 
                <li rel="multipleChoice">
                	<div class="element_div">
                    <fieldset data-role="controlgroup">
	                       <legend class="primary">Radio Button</legend><span class="helpMark" ></span>
                        <div class="radio_div">
	                        <div>
                            <input type="radio" name="multipleChoiceRadio[]" id="multipleChoiceRadio1"/>
                            <label for="multipleChoiceRadio1">option 1</label>
                            </div>
                            <div>
	                        <input type="radio" name="multipleChoiceRadio[]" id="multipleChoiceRadio2"/>
                            <label for="multipleChoiceRadio2">option 2</label>
                            </div>
                            <div>
	                        <input type="radio" name="multipleChoiceRadio[]" id="multipleChoiceRadio3"/>
                            <label for="multipleChoiceRadio3">option 3</label>
                            </div>
						</div>
                    </fieldset>
                    </div>
                   	<div class="dublicate"></div> 
                   	<div class="del_element"></div>
                </li>
            </div>    
            <div id="dropDown">    
                 <li rel="dropDown">
                	<div class="element_div">
                    	<label class="primary" for="dropDownList[]">Select Box</label><span class="helpMark" ></span>
                        <div class="selectDropdown medium">
	                        <select id="dropDownList[]" name="dropDownList[]" class="medium" >
                            	<option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                            </select>
                        </div>
                    </div>
                   	<div class="dublicate"></div> 
                   	<div class="del_element"></div>
                </li>  
             </div>  
			<div id="nameText">	
                <li rel="nameText">
                	<div class="element_div twoinputs">
                    	<label class="primary">Name</label><span class="helpMark" ></span>
                        <div>
                            <span class="two">
							<div >
                                <input type="text"  name="nameFirst[]" class="" />
                             </div>
                                <label class="label_bottom">First</label>
                            </span>
                            <span class="two">
							<div >
                                <input type="text"  name="nameLast[]" class="" />
                             </div>
                                <label class="label_bottom">Last</label>
                            </span>
                        </div>
                    </div>
                   	<div class="dublicate"></div> 
                  	<div class="del_element"></div>
                </li>
            </div>
			
			
			
                <div id="dateText"> 
				
                 <li rel="dateText">
                	<div class="element_div threeinputs">
                    	<label class="primary">Date</label><span class="helpMark" ></span>
                        <div>
                           	<span>
                            <div >
                                <input type="text" id="Text4" name="dateMm[]" class="number"/>
                            </div>
                                <label class="label_bottom">MM</label>
                           	</span>
                             <b class="v_middle">/</b>
                           	<span>
                            <div >
                                <input type="text" id="Text5" name="dateDd[]" class="number"/>
                            </div>
                                <label class="label_bottom">DD</label>
                            </span>
                             <b class="v_middle">/</b>
                            <span>
                            <div >
                                <input type="text" id="Text6" name="dateYy[]"  class="number"/>
                            </div>
                                <label class="label_bottom">YYYY</label>
                            </span>
                        </div>
                    </div>
                   	<div class="dublicate"></div> 
                  	<div class="del_element"></div>
                </li>
			</div>
			<div id="timeText">
                <li rel="timeText">
                	<div class="element_div fourinputs">
                    	<label class="primary">Time</label><span class="helpMark" ></span>
                        <div>
                           	<span>
                            <div >
                                <input type="text" id="Text7" name="timeHh[]" class="number" />
                             </div>
                                <label class="label_bottom">HH</label>
                           	</span>
                            <b class="v_middle">:</b>
                           	<span>
                            <div >
                                <input type="text" id="Text8" name="timeMm[]" class="number"/>
                            </div>
                                <label class="label_bottom">MM</label>
                            </span>
                            <b class="v_middle">:</b>
                            <span>
                            <div >
                                <input type="text" id="Text9" name="TimeSs[]" class="number"/>
                             </div>
                                <label class="label_bottom">SS</label>
                            </span>
                            <span>
                                <select id="Select2" name="timeLabel[]" class="medium">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                                <label class="label_bottom">AM/PM</label>
                            </span>
                        </div>
                    </div>
                   	<div class="dublicate"></div> 
                  	<div class="del_element"></div>
                </li>  
			</div>
			<div id="phoneText">
                <li rel="phoneText">
                	<div class="element_div threeinputs">
                    	<label class="primary">Phone</label><span class="helpMark"  ></span>
                        <div class="tempStore">
                           	<span>
                            	<div >
	                                <input type="text"  name="phoneStart[]" class="number"/>
                                </div>
                                <label class="label_bottom">(###)</label>
                           	</span>
                            <b class="v_middle">-</b>
                           	<span>
                            	<div >
                                	<input type="text" id="Text10" name="phoneMid[]" class="number" />
                                </div>
                                <label class="label_bottom">###</label>
                            </span>
                            <b class="v_middle">-</b>
                            <span>
                            	<div >
	                                <input type="text" id="Text11" name="phoneLast[]" class="number"  />
                                </div>
                               <label class="label_bottom">####</label>
                            </span>
                        </div>
                    </div>
                   	<div class="dublicate"></div> 
                  	<div class="del_element"></div>
                </li> 
			</div>	
			<div id="addressText">	
                <li rel="addressText">
                	<div class="element_div">
                    	<label class="primary">Adress</label><span class="helpMark" ></span>
						<div class="address">
                            <span>
                               <div >
                                <input type="text" name="addressName[]"  class="" size="77"/>
                                </div>
                                <label class="label_bottom">Street Address</label>
                                
                            </span>
                            <span>
                               <div >
                                <input type="text" id="Text12" name="addressStreet[]" class="" size="77"/>
                            </div>
                                
                                <label class="label_bottom">Address Line 2</label>
                            </span>
                        </div>
                     </div>
                    
                    <div class="element_div twoinputs">
                            <span class="two">
                               <div >
	                                <input type="text" id="Text13" name="addresscity[]" class=""/>
                                </div>
                                <label class="label_bottom">City</label>
                            </span>
                            <span class="two">
                            <div >
                                <input type="text" id="Text14" name="addressRegion[]" class=""/>
                            </div>
                                <label class="label_bottom">State/Province/Region</label>
                            </span>
                    </div>
                    <div class="element_div twoinputs">
                            <span class="two">
                               <div >
	                                <input type="text" id="Text15" name="addressZip[]" class="number"/>
                               </div>
                                <label class="label_bottom">Zip/Postal Code</label>
                            </span>
                            <span class="two">
                               <select id="Select3" name="addressCountry[]"  class="select200">
                                    <option value="India">India</option>
                                    <option  value="USA">USA</option>
                                    <option  value="UK">UK</option>
                                </select>
                                <label class="label_bottom">Country</label>
                            </span>
                    </div>
                   	<div class="dublicate"></div> 
                  	<div class="del_element"></div>
                </li>
             </div>
			 <div id="websiteText">
                <li rel="websiteText">
                	<div class="element_div">
                    	<label class="primary"> Website</label><span class="helpMark" ></span>
                        <div>
                         <div class="medium c1" >
	                        <input type="text" id="Text16" name="websiteText[]" class="medium url "  value="http://"/>
                         </div>
                        </div>
                    </div>
                   	<div class="dublicate"></div> 
                  	<div class="del_element"></div>
                </li>
               </div>
             <div id="priceText">
                <li rel="priceText">
                	<div class="element_div">
                    	<label class="primary">Price</label><span class="helpMark" ></span>
                        <div>
	                        <span>
                            <div class="small c1 pricename">
                             <b class="v_middle label_bottom price_ico">$</b>
                             <input type="text" id="Text17" name="priceText[]" class="small number" />
                             <b class="v_middle label_bottom priceN">Dollars</b>
                             </div>

                            
                            </span>
                        </div>
                    </div>
                   	<div class="dublicate"></div> 
                  	<div class="del_element"></div>
                </li> 
            </div> 
			<div id="emailText">
                 <li rel="emailText">
                	<div class="element_div">
                    	<label class="primary">Email</label><span class="helpMark" ></span>
						<div class="medium c1" >
                        	<input type="email"  name="emailText[]" class="medium email" value="@"/>
                       </div>
                    </div>
                   	<div class="dublicate"></div> 
                  	<div class="del_element"></div>
                </li> 
            </div> 
            <div id="sectionBreak"> 
                <li rel="sectionBreak">
                	<div class="element_div">
                    	<div class="Break">
	                        <label class="primary">Section Break</label><span class="helpMark" ></span>
                        </div>
                   </div>
                   	<div class="dublicate"></div> 
                  	<div class="del_element"></div>
                </li> 
			</div>

            </ul>


         </form>
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