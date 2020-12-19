$(document).ready(function () {
    //Active Class 
    $('.main-links li').click(function(){
        $('.main-links li').removeClass('active');
        $(this).addClass('active');
    });
    if ($(window).scrollTop() > 230) {
        $('nav').addClass('fixed-nav');
    } else {
        $('nav').removeClass('fixed-nav');
    }
    $(window).scroll(function () {
        if ($(window).scrollTop() > 230) {
            $('nav').addClass('fixed-nav');
        } else {
            $('nav').removeClass('fixed-nav');
        }
        if ($(window).scrollTop() >= $('header').height() / 2) {
            $('.goTop').fadeIn(1000);
        } else {
            $('.goTop').fadeOut(1000);
        }
    });
    $('.goTop').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1500);
    });


    $(window).scroll(function () {
        $('.box').each(function () {
            if ($(window).scrollTop() > $(this).offset().top - $('nav').height() - 1) { // Not Equal
                var boxId = $(this).attr('id');
                var lastBoxId = $('.box').last().attr('id');
                $('nav li').removeClass('active');
                console.log();
                if ($(window).scrollTop() >= $('#contact-us').offset().top + 1) {
                    $('nav li a[data-scroll="' + lastBoxId + '"]').parent().addClass('active');
                } else {
                    $('nav li a[data-scroll="' + boxId + '"]').parent().addClass('active');
                }
                var lastScroll = $(document).height()  - $(window).height();
                if($(window).scrollTop() + $(window).height() == $(document).height())  {
                    $('nav li a[data-scroll="' + lastBoxId + '"]').parent().addClass('active');
                } else {
                    console.log('No');
                }
            

            }
        });

    });

    $('nav li a').click(function () {
        $('html, body').animate({
            scrollTop: $('#' + $(this).data('scroll')).offset().top - $('nav').height()
        }, 1000);
    });
    

    $('.scroll-down span').click(function () {
        $('html, body').animate({
            scrollTop: $('.about').offset().top - $('nav').height()
        }, 2000)
    });
    
});
