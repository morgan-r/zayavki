var $d = jQuery.noConflict();
	
	$d(document).ready(function() {
	
		// ”казываем дейтпикеру что выводить все нужно на русском
		$d.datepicker.setDefaults($d.datepicker.regional['ru']);
		
		$d("#date_sozd,#srok_doc,#date_isp").datepicker({ 
		    showOn: "both", 
		    buttonImage: "calendar.gif", 
		    buttonImageOnly: true 
		});
	
	});	
/*	
$(function()
{
$('#date_sozd').datepicker({
displayClose:true,
closeOnSelect:false
})
});


$(function()
{
$('#srok_doc').datepicker();
});

$(function()
{
$('#date_isp').datepicker();
}); */