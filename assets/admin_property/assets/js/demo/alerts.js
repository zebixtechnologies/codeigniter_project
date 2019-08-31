/*
 * MoonCake v1.3 - Alerts Demo JS
 *
 * This file is part of MoonCake, an Admin template build for sale at ThemeForest.
 * For questions, suggestions or support request, please mail me at maimairel@yahoo.com
 *
 * Development Started:
 * July 28, 2012
 * Last Update:
 * November 14, 2012
 *
 */

;(function( $, window, document, undefined ) {

	$(document).ready(function() {
		
		
		if( $.msgbox ) {
			
			$( '#msgbox-trigger-1' ).on( 'click', function(e) {

				$.msgbox( "The selection includes process white objects. Overprinting such objects is only useful in combination with transparency effects." );

			});

			$( '#msgbox-trigger-2' ).on( 'click', function(e) {

				$.msgbox("jQuery is a fast and concise JavaScript Library that simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development.", {type: "info"});

			});

			$( '#msgbox-trigger-3' ).on( 'click', function(e) {

				$.msgbox("An error 1053 ocurred while perfoming this service operation on the MySql Server service.", {type: "error"});

			});

			$( '#msgbox-trigger-4' ).on( 'click', function(e) {

				$.msgbox("Are you sure that you want to permanently delete the selected element?", {
					type: "confirm",
					buttons : [
						{type: "submit", value: "Yes"},
						{type: "submit", value: "No"},
						{type: "cancel", value: "Cancel"}
					]
					}, function(result) {
						$.msgbox("You clicked " + result)
					}
				);

			});

			$( '#msgbox-trigger-5' ).on( 'click', function(e) {
				$.msgbox("<p>Driver Allocation Job No :</p>", {
					type    : "prompt",
					select  : [
						{Option: "10",     label: "Call Sign :", value: "", required: true},
						//{type: "password", label: "Insert your Password:", required: true}
					],
					buttons : [
						{type: "submit", value: "OK"},
						{type: "cancel", value: "Cancel"},						
						{type: "cancel", value: "Exit"}
					]
					}, function(name, password) {
						if (name) {
							$.msgbox("Reason added", {type: "info"});
						} else {
							$.msgbox("Reason Not Added!", {type: "info"});
					}
				});
			});

			$( '#msgbox-trigger-6').on('click', function(e){
				$.msgbox("<p>COA Job No. :</p>", {
					type    : "prompt",
					inputs  : [
						{type: "text",     label: "Reason:", value: "", required: true},
						//{type: "password", label: "Insert your Password:", required: true}
					],
					buttons : [
						{type: "submit", value: "OK"},
						{type: "cancel", value: "Cancel"},						
						{type: "cancel", value: "Exit"}
					]
					}, function(name, password) {
						if (name) {
							$.msgbox("Reason added", {type: "info"});
						} else {
							$.msgbox("Reason Not Added!", {type: "info"});
					}
				});
			});
			
		}



		if( $.pnotify ) {

			$( '#pnotify-trigger-1').on('click', function(e){
				$.pnotify({
					title: 'Regular Notice',
					text: 'Check me out! I\'m a notice.'
				});
			});

			$( '#pnotify-trigger-2').on('click', function(e){
				$.pnotify({
				    title: 'New Thing',
				    text: 'Just to let you know, something happened.',
				    type: 'info'
				});
			});

			$( '#pnotify-trigger-3').on('click', function(e){
				$.pnotify({
				    title: 'Regular Success',
				    text: 'That thing that you were trying to do worked!',
				    type: 'success'
				});
			});

			$( '#pnotify-trigger-4').on('click', function(e){
				$.pnotify({
				    title: 'Oh No!',
				    text: 'Something terrible happened.',
				    type: 'error'
				});
			});


			$( '#pnotify-trigger-5').on('click', function(e){
				$.pnotify({
				    title: 'Sticky Notice',
				    text: 'Check me out! I\'m a sticky notice. You\'ll have to close me yourself.',
				    hide: false
				});
			});

			$( '#pnotify-trigger-6').on('click', function(e){
				$.pnotify({
				    title: 'Sticky Info',
				    text: 'Sticky info, you know, like a newspaper covered in honey.',
				    type: 'info',
    				hide: false
				});
			});

			$( '#pnotify-trigger-7').on('click', function(e){
				$.pnotify({
				    title: 'Sticky Success',
				    text: 'Sticky success... I\'m not even gonna make a joke.',
				    type: 'success',
    				hide: false
				});
			});

			$( '#pnotify-trigger-8').on('click', function(e){
				$.pnotify({
				    title: 'Uh Oh!',
				    text: 'Something really terrible happened. You really need to read this, so I won\'t close automatically.',
				    type: 'error',
    				hide: false
				});
			});
		}
	});
	
}) (jQuery, window, document);