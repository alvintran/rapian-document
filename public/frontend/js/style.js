$(function() {
	var headerHeight = $('.navbar').height();
	$(window).on('scroll', {
	       previousTop: 0
	   },
	   function() {
	       var currentTop = $(window).scrollTop();
	       //check if user is scrolling up
	       if (currentTop < this.previousTop) {
	           //if scrolling up...
	            $('.navbar').removeClass('hiden');
	            $('.navbar').addClass('visible');
	            $('.navbar').css('top', '0');
	       } else {
	           	//if scrolling down...
	           	if (currentTop > headerHeight) {
	           		$('.navbar').addClass('hiden');
	           		$('.navbar').removeClass('visible');
	           		$('.navbar').css('top', -headerHeight);
	           	}
	       }
	       this.previousTop = currentTop;
	   });
		$('.navbar').addClass('visible');

		var contentHeight = $('.content').height();
		var asideHeight = $('.aside').height();
		if(asideHeight < contentHeight) {
			$('.aside').height(contentHeight);
		}
});