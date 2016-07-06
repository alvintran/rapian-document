$(function() {
	$(window).scroll(function() {
        var heightNote = $('#pageNote').height();
		if ($(this).scrollTop() >= heightNote - 10 ) {
			$('body').addClass('scroll');
		} else {
			$('body').removeClass('scroll');
		}
	});
});