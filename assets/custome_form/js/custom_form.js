$(document).ready(function () {
    formContent();
    $('#Add_a_Field ul li').click(function () {
        var propName = $(this).attr('prop');
        addHtml(propName);
    })
    $('#tab3').off('click').on('click', function () {
        var formTitle = $('#form_Title').text();
        $('#formProperties form input[name="FormTitle"]').val(formTitle);
        $('#formProperties form input[name="FormTitle"]').keyup(function () {
            $('#form_Title').text($(this).val());
        });

        var form_Desc = $('#form_Desc').text();
        $('#formProperties textarea#form_description').val(form_Desc);
        $('#formProperties textarea#form_description').keyup(function () {
            $('#form_Desc').text($(this).val());
        });
		
		var submitbutton = $('#submitbutton').val();
        $('#formProperties form #submit_button').val(submitbutton);
        $('#formProperties form #submit_button').keyup(function () {
            $('#submitbutton').val($(this).val());
        });


    });


});

var hosting = $('#base_url').val();
function formContent(){
    //alert('form');
	
    if ($('#Elements ul li').length == 0) {
        $('#Select_field').show();
        $('.saveChanges').hide();
    }else{
        $('#Select_field').hide();
        $('.saveChanges').show();
        $('#Elements ul input[type="text"],input[type="checkbox"],input[type="radio"]').attr('readonly','readonly');
    
    }
	
	$('.del_element').off('click').on('click',function(){
		var didconfirm = confirm('Are You Sure You Want To Delete ???');
		var $tbn = $(this);
		if(didconfirm){
		 $tbn.closest('li').remove();
		}else{
		
		}
	});
	
	$('.dublicate').off('click').on('click',function(){
		var $btn = $(this);
		var clone  = $btn.closest('li').clone();
		$('#Elements ul').append(clone);
		
	});
	
	$('#Elements ul li').off('click').on('click',function(){
		var $this = $(this);
		var rel  = $this.attr('rel');
		$('#Elements ul li').removeClass('active');
		$this.closest('li').addClass('active');
		var margin = $this.offset().top  - $('#Elements').offset().top;
		$('div[relfield="'+rel+'"]').css('margin-top',margin);
		//$(window).offset({ top: offset.top, left: offset.left});
		
		$('#Edit_Field_properties .displayNo').hide();
		$('#tab2').click();
		$('#Notice_select_field').hide();
		editHtml($this,rel);
	});
	
	$('.add_another_field').off('click').on('click',function(){
		$('#Edit_Field_properties .displayNo').hide();
		$('#Notice_select_field').show();
		$('#tab1').trigger('click');
	});
	
	
}

function editHtml($this,rel){
	 switch (rel){
		case 'singleLine': editSingleLine($this,rel,formContent);
                break;
		case 'number': editNumber($this,rel,formContent);
                break;
		case 'pText': editSingleLine($this,'singleLine',formContent);
                break;
		case 'multipleChoice': editMultipleChoice($this,rel,formContent);
                break;
		case 'checkbox': editCheckbox($this,rel,formContent);
                break;
		case 'dropDown': editDropDown($this,rel,formContent);
                break;
		case 'nameText': editNameText($this,rel,formContent);
                break;
		case 'dateText': editNameText($this,'nameText',formContent);
                break;
		case 'timeText': editNameText($this,'nameText',formContent);
                break;
		case 'phoneText': editPhoneText($this,rel,formContent);
                break;
		case 'addressText': editNameText($this,'nameText',formContent);
                break;
		case 'websiteText': editSingleLine($this,'singleLine',formContent);
                break;
		case 'priceText': editPriceText($this,rel,formContent);
                break;
		case 'emailText': editEmailText($this,'emailText',formContent);
                break;
		case 'sectionBreak': editSectionBreak($this,rel,formContent);
                break;		
	 }
}

function editPriceText($this,rel,callBack){
	var label =  $this.find('label.primary').text();
	$('div[relfield="'+rel+'"] #Field_Label_name').off('keyup').on('keyup',function(){
			$this.find('label').text($(this).val());
			$this.find('input[type="hidden"]').val($(this).val());
		});
	$('div[relfield="'+rel+'"]').find('#Field_Label_name').val(label);
		var className =  $this.find('input[type="text"]').attr('class');
		if(className)
		{
			var twoClasses = className.split(' ');
			
			$('div[relfield="'+rel+'"]').find('#field_size').val(twoClasses[0]);
			if(twoClasses[1]){
			$('div[relfield="'+rel+'"]').find('#Field_Label_price_required').prop('checked',true);
			}
		}
		var guidence =$this.find('.helpMark').attr('title'); 
	$('div[relfield="'+rel+'"]').find('#Field_Label_guidence_price').val(guidence);
		
		var priceN = $this.find('.pricename .priceN').text();
			$('div[relfield="'+rel+'"] #money_format').val(priceN);
			
	$('div[relfield="'+rel+'"] #money_format').off('change').on('change',function(){
			$this.find('.pricename .priceN').html($(this).val());
			
			if ('Dollar' == $(this).val())
			{
				$('.pricename .price_ico').html("$");
			}
				else if ('Euro' == $(this).val())
					{
						$('.pricename .price_ico').html("&euro;");
					}
					else if ('Pound' == $(this).val())
						{
							$('.pricename .price_ico').html("&pound;");
						}
						else if ('Yen' == $(this).val())
							{
								$('.pricename .price_ico').html("&yen;");
							}
					
		});
		
		$('div[relfield="'+rel+'"] #Field_Label_price_required').off('click').on('click',function(){
			if($(this).is(':checked')){
				$this.find('input[type="text"]').addClass('required');
			}else{
				$this.find('input[type="text"]').removeClass('required');
			}
		});
	$('div[relfield="'+rel+'"] #Field_Label_guidence_price').off('keyup').on('keyup',function(){
		$this.find('label').attr('title',$(this).val());
		});
		//alert(rel);	
	$('div[relfield="'+rel+'"]').show();
		callBack();
}
function editSectionBreak($this,rel,callBack){

var label =  $this.find('label.primary').text();
	$('div[relfield="'+rel+'"]').find('#Field_Label_section').val(label);
	$('div[relfield="'+rel+'"] #Field_Label_section').off('keyup').on('keyup',function(){
			$this.find('label').text($(this).val());
			$this.find('input[type="hidden"]').val($(this).val());
		});
		var guidence = $('div[relfield="'+rel+'"]').find('#section_guidence').val();
		$this.find('.helpMark').attr('title',guidence);
		
		$('div[relfield="'+rel+'"] #section_guidence').off('keyup').on('keyup',function(){
		$this.find('.helpMark').attr('title',$(this).val());
		});	

$('div[relfield="'+rel+'"]').show();
callBack();
}
function editEmailText($this,rel,callBack){

		var label =  $this.find('label.primary').text();
		$('div[relfield="'+rel+'"]').find('#Field_Label_name').val(label);
		var className =  $this.find('input[type="email"]').attr('class');
		if(className)
		{
			var twoClasses = className.split(' ');
			if($.inArray('small',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#field_size_email').val('small');
			}
			if($.inArray('medium',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#field_size_email').val('medium');
			}
			if($.inArray('large',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#field_size_email').val('large');
			}
			if($.inArray('required',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#Email_Label_required').prop('checked',true);
			}
		}
		
		
		
		var guidence = $('div[relfield="'+rel+'"]').find('#Field_Label_guidence').val();
		$this.find('.helpMark').attr('title',guidence);
		
		$('div[relfield="'+rel+'"] #Field_Label_name').off('keyup').on('keyup',function(){
			$this.find('label').text($(this).val());
			$this.find('input[type="hidden"]').val($(this).val());
		});
		$('div[relfield="'+rel+'"] #field_size_email').off('change').on('change',function(){
			$this.find('input[type="email"]').removeClass('small medium large').addClass($(this).val());
		});
		$('div[relfield="'+rel+'"] #Email_Label_required').off('click').on('click',function(){
			if($(this).is(':checked')){
				$this.find('input[type="email"],textarea').addClass('required');
			}else{
				$this.find('input[type="email"]').removeClass('required');
			}
		});
		$('div[relfield="'+rel+'"] #Field_Label_guidence').off('keyup').on('keyup',function(){
		$this.find('label').attr('title',$(this).val());
		});

		$('div[relfield="'+rel+'"]').show();
		callBack();
}


function editPhoneText($this,rel,callBack){
var label =  $this.find('label.primary').text();
	
	$('div[relfield="'+rel+'"] #Field_Label_input_phone').val(label);
	$('div[relfield="'+rel+'"] #Field_Label_input_phone').off('keyup').on('keyup',function(){
	$this.find('label.primary').text($(this).val());
	$this.find('input[type="hidden"]').val($(this).val());
	});
	
	var textClass = $this.find('.element_div input[type="text"]').attr('class');
	if(textClass){
	var multiClass = textClass.split(' ');
	if($.inArray('required',multiClass) != -1){
	$('div[relfield="'+rel+'"] #phoneRequired').prop('checked',true);
	}
	}
	
	$('div[relfield="'+rel+'"] #phoneRequired').off('click').on('click',function(){
	if($(this).is(':checked')){
	$this.find('input[type="text"]').addClass('required');
	}else{
	$this.find('input[type="text"]').removeClass('required');
	}
	});
	var labelGuidence =  $this.find('.helpMark').attr('title');
	if(labelGuidence){
		$('div[relfield="'+rel+'"] #phoneGuidence').val(labelGuidence);
	}
	$('div[relfield="'+rel+'"] #phoneGuidence').off('keyup').on('keyup',function(){
	$this.find('.helpMark').attr('title',$(this).val());
	})
	
	if($this.find('.element_div input[type="text"]').length > 1){
	$('div[relfield="'+rel+'"] #phone_format').val('element_phone');
	}else{
	$('div[relfield="'+rel+'"] #phone_format').val('element_simple_phone');
	}
	$('div[relfield="'+rel+'"] #phone_format').off('change').on('change',function(){
	if($(this).val() == 'phone'){
	$this.closest('.element_div').addClass('threeinputs');
	$this.find('.tempStore').html('<span><div><input type="text"  name="phoneStart[]" class="ui-input-text ui-body-c"/></div><label class="label_bottom">(###)</label></span><b class="v_middle">-</b><span><div ><input type="text" id="Text10" name="phoneMid[]" class="ui-input-text ui-body-c" /></div><label class="label_bottom">###</label></span><b class="v_middle">-</b><span><div ><input type="text" id="Text11" name="phoneLast[]" class="ui-input-text ui-body-c"  /></div><label class="label_bottom">####</label></span>');
	}else{
//	alert($this.find('label.primary').html());
	
	$this.closest('.element_div').removeClass('threeinputs');
	$this.find('.tempStore').html('<input type="text"  name="phoneStart[]" class="large"/>');
	}
	})
	$('div[relfield="'+rel+'"]').show();
	callBack();
}



function editNameText($this,rel,callBack){

var label =  $this.find('label.primary').text();
	
	$('div[relfield="'+rel+'"] #Field_Label_input').val(label);
	$('div[relfield="'+rel+'"] #Field_Label_input').off('keyup').on('keyup',function(){
	$this.find('label.primary').text($(this).val());
	$this.find('input[type="hidden"]').val($(this).val());
	});
	var textClass = $this.find('.element_div input[type="text"]').attr('class');
	if(textClass){
	var multiClass = textClass.split(' ');
	if($.inArray('required',multiClass) != -1){
	$('div[relfield="'+rel+'"] #nameTextRequired').prop('checked',true);
	}
	}
	
	$('div[relfield="'+rel+'"] #nameTextRequired').off('click').on('click',function(){
		if($(this).is(':checked')){
		$this.find('input[type="text"]').addClass('required');
		}else{
		$this.find('input[type="text"]').removeClass('required');
		}
	});
	
	var labelGuidence =  $this.find('.helpMark').attr('title');
	if(labelGuidence){
		$('div[relfield="'+rel+'"] #nameTextGuidence').val(labelGuidence);
	}
	$('div[relfield="'+rel+'"] #nameTextGuidence').off('keyup').on('keyup',function(){
	$this.find('.helpMark').attr('title',$(this).val());
	})

$('div[relfield="'+rel+'"]').show();
callBack();
}
function  editDropDown($this,rel,callBack){
	var label =  $this.find('label.primary').text();
	$('div[relfield="'+rel+'"] #Field_Label_name').val(label);
	$('div[relfield="'+rel+'"] #Field_Label_name').off('keyup').on('keyup',function(){
		$this.find('label.primary').text($(this).val());
		$this.find('input[type="hidden"]').val($(this).val());
	});
	
	var labelOption='';
	$this.find('.selectDropdown select option').each(function(){
		labelOption += '<li><input type="text" value="'+$(this).text()+'"/><span class="pointer Addinput"><img src="'+hosting+'assets/custome_form/images/icon_add.gif" alt="" id="AddCheckbox" /></span><span class="pointer deleteinput"><img src="'+hosting+'assets/custome_form/images/icon_delete.gif" alt="" id="DelCheckbox"/></span><span class="pointer defaultinput" title="default"><img src="'+hosting+'assets/custome_form/images/icon_unstar.gif" alt="" id="DefaultCheckbox"/></span></li>'
	});
	$('div[relfield="'+rel+'"] ul.ListItems').html(labelOption);
	$('div[relfield="'+rel+'"] ul.ListItems li input[type="text"]').off('keyup').on('keyup',function(){
	
	var changeOfIndex = $('div[relfield="'+rel+'"] ul.ListItems li input[type="text"]').index($(this));
	$this.find('.selectDropdown select option').eq(changeOfIndex).text($(this).val());	
	$this.find('.selectDropdown select option').eq(changeOfIndex).attr('value',$(this).val());	
	});
	
	
	$('div[relfield="'+rel+'"] ul.ListItems li .Addinput').off('click').on('click',function(){
	var lengthCount = $('div[relfield="'+rel+'"] ul.ListItems li .Addinput').length+1;
	//alert(lengthCount);
	$this.find('.selectDropdown select').append('<option value="Option '+lengthCount+'">Option '+lengthCount+'</label>')
	$this.closest('li').click();
	});
	$('div[relfield="'+rel+'"] ul.ListItems li .deleteinput').off('click').on('click',function(){
	var delOfIndex = $('div[relfield="'+rel+'"] ul.ListItems li .deleteinput').index($(this));
	$this.find('.selectDropdown select option').eq(delOfIndex).hide(function(){ $(this).remove(); 
	$this.closest('li').click();
	});
	
	});
	
	$('div[relfield="'+rel+'"] ul.ListItems li .defaultinput').off('click').on('click',function(){
	var defaultOfIndex = $('div[relfield="'+rel+'"] ul.ListItems li .defaultinput').index($(this));
	$this.find('.selectDropdown select option:eq('+defaultOfIndex+')').prop('selected',true);
	
	});
	var className = $this.find('.selectDropdown select').attr('class');
	if(className){
		var twoClass = className.split(' ');
		if($.inArray('required',twoClass) != -1){
		$('div[relfield="'+rel+'"] #drop_down_rquired').prop('checked',true);
		}
	}
	
	if($.inArray('small',twoClass) != -1){
	$('div[relfield="'+rel+'"] select.select').val('small');
	}
	if($.inArray('medium',twoClass) != -1){
	$('div[relfield="'+rel+'"] select.select').val('medium');
	}
	if($.inArray('large',twoClass) != -1){
	$('div[relfield="'+rel+'"] select.select').val('large');
	}
	$('div[relfield="'+rel+'"] select.select').off('change').on('change',function(){
	$this.find('.selectDropdown select').removeClass('small medium large').addClass($(this).val());
	$this.find('.selectDropdown').removeClass('small medium large').addClass($(this).val());
	})
	
	$('div[relfield="'+rel+'"] #drop_down_rquired').off('click').on('click',function(){
	if($(this).is(':checked')){
	$this.find('.selectDropdown select').addClass('required');
	}else{
	$this.find('.selectDropdown select').removeClass('required');
	}
	});
	$('div[relfield="'+rel+'"] #dropDowm_guidence').off('keyup').on('keyup',function(){
		$this.find('.helpMark').attr('title',$(this).val());
	});
	
	
	
	$('div[relfield="'+rel+'"]').show();
	callBack();
}

function editCheckbox($this,rel,callBack){
	var label =  $this.find('label.primary').text();
	$('div[relfield="'+rel+'"] #Field_Label_name').val(label);
	$('div[relfield="'+rel+'"] #Field_Label_name').off("keyup").on("keyup",function(){
	    $this.find('label.primary').text($(this).val());
		$this.find('input[type="hidden"]').val($(this).val());
	});
	
	var labelOption='';
	$this.find('.checkboxes_div label').each(function(){
		labelOption += '<li><input type="text" value="'+$(this).text()+'"/><span class="pointer Addinput"><img src="'+hosting+'assets/custome_form/images/icon_add.gif" alt="" id="AddCheckbox" /></span><span class="pointer deleteinput"><img src="'+hosting+'assets/custome_form/images/icon_delete.gif" alt="" id="DelCheckbox"/></span><span class="pointer defaultinput" title="default"><img src="'+hosting+'assets/custome_form/images/icon_unstar.gif" alt="" id="DefaultCheckbox"/></span></li>'
	});
	
	$('div[relfield="'+rel+'"] ul.ListItems').html(labelOption);
	
	$('div[relfield="'+rel+'"] ul.ListItems li input[type="text"]').off('keyup').on('keyup',function(){
	
	var changeOfIndex = $('div[relfield="'+rel+'"] ul.ListItems li input[type="text"]').index($(this));
	$this.find('.checkboxes_div label').eq(changeOfIndex).text($(this).val());
	$this.find('.checkboxes_div input[type="checkbox"]').eq(changeOfIndex).val($(this).val());
	
	});
	$('div[relfield="'+rel+'"] ul.ListItems li .Addinput').off('click').on('click',function(){
	var lengthCount = $('div[relfield="'+rel+'"] ul.ListItems li .Addinput').length+1;
	//alert(lengthCount);
	$this.find('.checkboxes_div').append('<div><input type="checkbox" name="checkboxChoice[]" id="checkboxChoice'+ lengthCount +'" />  <label for="checkboxChoice'+ lengthCount +'">checkbox ' + lengthCount + '</label></div>')
	$this.closest('li').click();
	});
	$('div[relfield="'+rel+'"] ul.ListItems li .deleteinput').off('click').on('click',function(){
	var delOfIndex = $('div[relfield="'+rel+'"] ul.ListItems li .deleteinput').index($(this));
	$this.find('.checkboxes_div label').eq(delOfIndex).hide(function(){ $(this).remove(); });
	$this.find('.checkboxes_div input[type="checkbox"]').eq(delOfIndex).hide(function(){ $(this).remove(); 
	$this.closest('li').click();
	});
	
	});
	
	$('div[relfield="'+rel+'"] ul.ListItems li .defaultinput').off('click').on('click',function(){
	var defaultOfIndex = $('div[relfield="'+rel+'"] ul.ListItems li .defaultinput').index($(this));
	//alert(defaultOfIndex);
	$this.find('.checkboxes_div input[type="checkbox"]:eq('+defaultOfIndex+')').trigger('click');
	});
	
	var requiredStatus = $this.find('.checkboxes_div input[type="checkbox"]').attr('class');
	if(requiredStatus){
		var requiredStatusMulti = requiredStatus.split(' ');
		if($.inArray('required',requiredStatusMulti) != -1){
		$('div[relfield="'+rel+'"] #required_checkbox1').prop('checked',true);
		}
	}
	
	$('div[relfield="'+rel+'"] #required_checkbox1').off('click').on('click',function(){
		if($(this).is(':checked')){
		$this.find('.checkboxes_div input[type="checkbox"]').addClass('required');	
		}else{
		$this.find('.checkboxes_div input[type="checkbox"]').removeClass('required');	
		}
	});
   var guindence = $this.find('.helpMark').attr('title');
	$('div[relfield="'+rel+'"] #field_label_guindence').val(guindence);
	$('div[relfield="'+rel+'"] #field_label_guindence').off('keyup').on('keyup',function(){
	   $this.find('.helpMark').attr('title', $(this).val());
	});
	$('div[relfield="'+rel+'"]').show();
	callBack();
}
function editNumber($this,rel,callBack){
		
		var label =  $this.find('label').text();
		$('div[relfield="'+rel+'"]').find('#Field_Label_name').val(label);
		$('div[relfield="'+rel+'"] #Field_Label_name').off('keyup').on('keyup',function(){
			$this.find('label').text($(this).val());
			$this.find('input[type="hidden"]').val($(this).val());
		});

		var className =  $this.find('input[type="text"],textarea').attr('class');
		if(className)
		{
			var twoClasses = className.split(' ');
			if($.inArray('small',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#field_size').val('small');
			}
			if($.inArray('medium',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#field_size').val('medium');
			}
			if($.inArray('large',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#field_size').val('large');
			}
			if($.inArray('required',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#Field_Label_required').prop('checked',true);
			}
		}
		
		$('div[relfield="'+rel+'"] #field_size').off('change').on('change',function(){
			$this.find('.c1').removeClass('small medium large').addClass($(this).val());
			$this.find('input[type="number"]').removeClass('small medium large').addClass($(this).val());
		});


    var guidence = $this.find('.helpMark').attr('title');
		$('div[relfield="'+rel+'"]').find('#Field_Label_guidence').val(guidence);
		$('div[relfield="'+rel+'"] #Field_Label_guidence').off('keyup').on('keyup',function(){
	        $this.find('.helpMark').attr('title', $(this).val());
		});
		
		
		
		
		$('div[relfield="'+rel+'"] #Field_Label_required').off('click').on('click',function(){
			if($(this).is(':checked')){
				$this.find('input[type="text"],textarea').addClass('required');
			}else{
				$this.find('input[type="text"]').removeClass('required');
			}
		});
		$('div[relfield="'+rel+'"]').show();
		callBack();
}

function editSingleLine($this,rel,callBack){
		
		var label =  $this.find('label').text();
		$('div[relfield="'+rel+'"]').find('#Field_Label_name').val(label);
		$('div[relfield="'+rel+'"] #Field_Label_name').off('keyup').on('keyup',function(){
			$this.find('label').text($(this).val());
			$this.find('input[type="hidden"]').val($(this).val());
		});

		var className =  $this.find('input[type="text"],textarea').attr('class');
		if(className)
		{
			var twoClasses = className.split(' ');
			if($.inArray('small',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#field_size').val('small');
			}
			if($.inArray('medium',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#field_size').val('medium');
			}
			if($.inArray('large',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#field_size').val('large');
			}
			if($.inArray('required',twoClasses) !=-1){
			$('div[relfield="'+rel+'"]').find('#Field_Label_required').prop('checked',true);
			}
		}
		
		$('div[relfield="'+rel+'"] #field_size').off('change').on('change',function(){
		    $this.find('textarea').removeClass('small medium large').addClass($(this).val());
			$this.find('.c1').removeClass('small medium large').addClass($(this).val());
            $this.find('input[type="text"]').removeClass('small medium large').addClass($(this).val());
		    
		});


		var guidence = $this.find('.helpMark').attr('title');
		$('div[relfield="'+rel+'"]').find('#Field_Label_guidence').val(guidence);
		$('div[relfield="'+rel+'"] #Field_Label_guidence').off('keyup').on('keyup',function(){
		    $this.find('.helpMark').attr('title', $(this).val());
		});
		

		$('div[relfield="'+rel+'"] #Field_Label_required').off('click').on('click',function(){
			if($(this).is(':checked')){
				$this.find('input[type="text"],textarea').addClass('required');
			}else{
				$this.find('input[type="text"]').removeClass('required');
			}
		});
		$('div[relfield="'+rel+'"]').show();
		callBack();
}
function editMultipleChoice($this,rel,callBack){


    var label = $this.find('label.primary').text();
	
	$('div[relfield="'+rel+'"] #Field_Label_name').val(label);
	
	$('div[relfield="'+rel+'"] #Field_Label_name').off('keyup').on('keyup',function(){
	    $this.find('label.primary').text($(this).val());
		$this.find('input[type="hidden"]').val($(this).val());
	});
	
	
	
	
	var labelOption='';
	$this.find('.radio_div label').each(function(){
		labelOption += '<li><input type="text" value="'+$(this).text()+'"/><span class="pointer Addinput"><img src="'+hosting+'assets/custome_form/images/icon_add.gif" alt="" id="AddCheckbox" /></span><span class="pointer deleteinput"><img src="'+hosting+'assets/custome_form/images/icon_delete.gif" alt="" id="DelCheckbox"/></span><span class="pointer defaultinput" title="default"><img src="'+hosting+'assets/custome_form/images/icon_unstar.gif" alt="" id="DefaultCheckbox"/></span></li>'
	});
	
	$('div[relfield="'+rel+'"] ul.ListItems').html(labelOption);
	$('div[relfield="'+rel+'"] ul.ListItems li input[type="text"]').off('keyup').on('keyup',function(){
	var changeOfIndex = $('div[relfield="'+rel+'"] ul.ListItems li input[type="text"]').index($(this));
	
	$this.find('.radio_div label').eq(changeOfIndex).text($(this).val());	
	});
	$('div[relfield="'+rel+'"] ul.ListItems li .Addinput').off('click').on('click',function(){
	var lengthCount = $('div[relfield="'+rel+'"] ul.ListItems li .Addinput').length+1;

	$this.find('.radio_div').append('<div><input type="radio" name="multipleChoiceRadio[]" id="multipleChoiceRadio'+ lengthCount +'"/>  <label for="multipleChoiceRadio'+ lengthCount +'">option ' + lengthCount + '</label></div>')
	$this.closest('li').click();
	});
	$('div[relfield="'+rel+'"] ul.ListItems li .deleteinput').off('click').on('click',function(){
	var delOfIndex = $('div[relfield="'+rel+'"] ul.ListItems li .deleteinput').index($(this));
		//alert($this.find('.radio_div input[type="radio"]').eq(delOfIndex).closest('div').length);
	$this.find('.radio_div label').eq(delOfIndex).hide(1000,function(){ $(this).remove(); });
	$this.find('.radio_div input[type="radio"]').eq(delOfIndex).closest('div').hide(1000,function(){ $(this).remove(); 
	$this.closest('li').click();
	});
	
	});
	
	$('div[relfield="'+rel+'"] ul.ListItems li .defaultinput').off('click').on('click',function(){
	var defaultOfIndex = $('div[relfield="'+rel+'"] ul.ListItems li .defaultinput').index($(this));
	//alert(defaultOfIndex);
	$this.find('.radio_div input[type="radio"]:eq('+defaultOfIndex+')').prop('checked',true);
	
	});
	
	
	var requiredStatus = $this.find('.radio_div input[type="radio"]').attr('class');
	if(requiredStatus){
			var requiredStatusmulti = requiredStatus.split(' ');
			if($.inArray('required',requiredStatusmulti) !=-1){
			$('div[relfield="'+rel+'"] #required_checkbox').prop('checked',true);
		}
	}

	$('div[relfield="'+rel+'"] #required_checkbox').off('click').on('click',function(){
		if($(this).is(':checked')){
		$this.find('.radio_div input[type="radio"]').addClass('required');	
		}else{
		$this.find('.radio_div input[type="radio"]').removeClass('required');	
		}
	});




   var guindence = $this.find('.helpMark').attr('title');
	$('div[relfield="'+rel+'"] #field_label_guindence').val(guindence);
	$('div[relfield="'+rel+'"] #field_label_guindence').off('keyup').on('keyup',function(){
	    $this.find('.helpMark').attr('title', $(this).val());
	});
	
	
	
	$('div[relfield="'+rel+'"]').show();
	callBack();
}
function addHtml (propName) {
        switch (propName) {
            case 'singleLine': addSingleLine(formContent);
                break;
            case 'number': addNumber(formContent);
                break;
			case 'pText': addPText(formContent);
                break;
			case 'checkbox': addCheckbox(formContent);
                break;
			case 'multipleChoice': addMultipleChoice(formContent);
                break;
			case 'multipleChoice': addMultipleChoice(formContent);
                break;
			case 'dropDown': addDropDown(formContent);
                break;
			case 'nameText': addNameText(formContent);
                break;
			case 'dateText': addDateText(formContent);
                break;
			case 'timeText': addTimeText(formContent);
                break;
			case 'phoneText': addPhoneText(formContent);
                break;
			case 'addressText': addAddressText(formContent);
                break;
			case 'websiteText': addWebsiteText(formContent);
                break;
			case 'priceText': addPriceText(formContent);
                break;
			case 'emailText': addEmailText(formContent);
                break;
			case 'sectionBreak': addSectionBreak(formContent);
                break;
    }
}
function addSingleLine(callBack){
    var TempHtml = $('#singleLine').html();
   // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
	
}
function addNumber(callBack) {
    var TempHtml = $('#number').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addPText(callBack) {
    var TempHtml = $('#pText').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addCheckbox(callBack) {
    var TempHtml = $('#checkbox').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addMultipleChoice(callBack){
    var TempHtml = $('#multipleChoice').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addDropDown(callBack) {
    var TempHtml = $('#dropDown').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addNameText(callBack) {
    var TempHtml = $('#nameText').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addDateText(callBack) {
    var TempHtml = $('#dateText').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addTimeText(callBack) {
	
    var TempHtml = $('#timeText').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addPhoneText(callBack) {
    var TempHtml = $('#phoneText').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addAddressText(callBack) {
    var TempHtml = $('#addressText').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addWebsiteText(callBack) {
    var TempHtml = $('#websiteText').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addPriceText(callBack) {
    var TempHtml = $('#priceText').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addEmailText(callBack) {
    var TempHtml = $('#emailText').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}
function addSectionBreak(callBack) {
    var TempHtml = $('#sectionBreak').html();
    // alert(TempHtml);
    $('#Elements ul').append(TempHtml);
    callBack();
}