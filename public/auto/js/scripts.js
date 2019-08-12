$(document).ready(function() {
	
	$(document).on('click', '.bc', function() {
		
		var this_val = $(this).attr('title');
		
		$(this).parent().find('input').val(this_val);
		$(this).parent().find('.bc').removeClass('active');
		$(this).addClass('active');
		
	});
	
});