$(function() {
    // Check event to scroll window is top > 1500 to display
    // $(window).scroll(function(){
    //     var opacity = 1- $(this).scrollTop() / 300 - 0.1;
    //     $('.hero_content, .home_scroll, .copyright').css({
    //         'opacity': opacity
    //     });

    //     if ($(document).height() == $(this).scrollTop() + $(window).height()) {
    //         $('.copyright').css({
    //             'opacity': 1
    //         });
    //     }

    //     if ($(this).scrollTop() > 70) {
    //         $('.header').addClass('scroll');
    //     }else {
    //         $('.header').removeClass('scroll');
    //     }
    // });
    $('.col').matchHeight();
});