/*
 * MoonCake v1.3 - UI Components Demo JS
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
			
	var demos = {
		basicDatepicker: function(target) {
			
			target.datepicker();
			
		}, 
		
		inlineDatepicker: function( target ) {
			
			target.datepicker( { showOtherMonths: true, onSelect: function( dateText, ins ) {
				$( '#dp-02-target' ).text( dateText );
			} } );
			
			$( '#dp-02-target' ).text( $.datepicker.formatDate( 'mm/dd/yy', target.datepicker( 'getDate' ) ) );
			
		}, 
		
		weekDatepicker: function( target ) {
			
			target.datepicker( { showOtherMonths: true, showWeek: true } );
			
		}, 
		
		changeYearMonth: function( target ) {
			
			target.datepicker( { changeMonth: true, changeYear: true } );
			
		}, 
		
		dateRangePicker: function( from, to ) {
			
			from.datepicker({
				defaultDate: "+1w",
				numberOfMonths: 3, 
				showOtherMonths: true, 
				onSelect: function( selectedDate ) {
					to.datepicker( "option", "minDate", selectedDate );
				}
			});
			
			to.datepicker({
				defaultDate: "+1w",
				numberOfMonths: 3, 
				showOtherMonths: true, 
				onSelect: function( selectedDate ) {
					from.datepicker( "option", "maxDate", selectedDate );
				}
			});
			
		}, 

		basicTimepicker: function( target ) {

			target.timepicker({});

		}, 

		dateTimepicker: function( target ) {
            alert("123");
			target.datetimepicker({ ampm: true });

		}	
	};

	$(document).ready(function() {
	
		$('.hasDatepicker').datetimepicker();
	});
	
}) (jQuery, window, document);