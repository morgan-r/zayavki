/*<![CDATA[*/

	var $d = jQuery.noConflict();
	
	$d(document).ready(function() {
	
		// ”казываем дейтпикеру что выводить все нужно на русском
		$d.datepicker.setDefaults($d.datepicker.regional['ru']);
		
		$d("#startDate,#endDate").datepicker({ 
		    beforeShow: customRange, 
		    showOn: "both", 
		    buttonImage: "calendar.gif", 
		    buttonImageOnly: true 
		});
	
	});	

	function customRange(input) { 
	    return {minDate: (input.id == "endDate" ? $d("#startDate").datepicker("getDate") : null), 
	        maxDate: (input.id == "startDate" ? $d("#endDate").datepicker("getDate") : null)}; 
	} 	

/* ]]> */