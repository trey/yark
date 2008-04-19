$(document).ready(function() {
	// Show links to delete sections/pages on hover of the dt or dd.
	$('.del').hide();
	
	$('dt, dd').hover(function() {
		$(this).children('.del').show();
	}, function() {
		$(this).children('.del').hide();
	});
});