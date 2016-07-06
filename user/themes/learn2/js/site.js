$(function() {
	// Check event to scroll window is top > 1500 to display
	$(window).scroll(function() {
		if ($(this).scrollTop() >50) {
			$('body').addClass('scroll');
		} else {
			$('body').removeClass('scroll');
		}
	});
});