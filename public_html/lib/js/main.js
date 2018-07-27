/* Initialize mobile touch overflow */
$(document).bind("mobileinit", function() {
    $.mobile.touchOverflowEnabled = true;
});
/* Initialize mobile friendly touch gesture compatibility */
$(document).ready(function() {
    document.documentElement.addEventListener('touchstart', function(event) {
        if (event.touches.length > 1) {
            event.preventDefault();
        }
    }, false);
});
/* Initialize animation handlers */
$(window).on('load', function() {
    $('.header-img-head').fadeIn(300);
    $('.fade-in-onload').delay(100).fadeIn(300);
    $('.fade-up-onload').delay(100).fadeIn(300);
    $('.fade-down-onload').delay(100).fadeIn(300);
    $('.fade-out-delayed').delay(8000).fadeOut(288);
});
/* Initialize animation handlers */
$(document).ready(function() {
    $('.fade-up-onstart').delay(100).fadeIn(300);
});
/* Content resizers on window resize */
$(window).resize(function() {
    $('.scale-content-txt-1').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-content-txt-1').height() / 2
    });
    $('.scale-content-txt-2').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-content-txt-2').height() / 2
    });
    $('.scale-content-txt-3').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-content-txt-3').height() / 2
    });
});
/* Content resizers on window load */
$(window).on('load', function() {
    $('.scale-content-txt-1').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-content-txt-1').height() / 2
    });
    $('.scale-content-txt-2').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-content-txt-2').height() / 2
    });
    $('.scale-content-txt-3').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-content-txt-3').height() / 2
    });
});
/* Random banner image selection */
$(document).ready(function() {
    var images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', '11.jpg', '12.jpg', '13.jpg', '14.jpg', '15.jpg', '16.jpg', '17.jpg', '18.jpg', '19.jpg', '20.jpg', '21.jpg', '22.jpg', '23.jpg', '24.jpg', '25.jpg', '26.jpg', '27.jpg', '28.jpg', '29.jpg', '30.jpg', '31.jpg', '32.jpg'];
    $('.header-img-head').css({
        'background': 'no-repeat center top url(/img/banners/' + images[Math.floor(Math.random() * images.length)] + ')'
    });
});
/* Menu opacity and scroll indicator on scroll distance */
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
        $(".menu-con-bar").css('border-bottom', 'solid 1px rgba(255,255,255,.0)');
    } else {
        $(".menu-con-bar").css('border-bottom', 'solid 1px rgba(255,255,255,.1)');
    }
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
        $(".menu-ovr-fill").fadeIn(400);
    } else {
        $(".menu-ovr-fill").fadeOut(400);
    }
    if ($(this).scrollTop() > 10) {
        $('.arrow-ico-scroll').fadeOut(400);
    } else {
        $('.arrow-ico-scroll').fadeIn(400);
    }
});
/* Submenu mouse events */
$(document).ready(function() {
    $(function() {
        $('.support-subtrigger').hover(function() {
            $('.support-submenu').fadeIn(0);
            $('.support-submenu').show(0);
        }, function() {
            $('.support-submenu').fadeOut(0);
            $('.support-submenu').hide(0);
        });
    });
});
/* Anchor functions */
$(document).ready(function() {
    $('a[rel="anchor"]').click(function() {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        return false;
    });
});
/* Mobile menu toggles */
$(document).ready(function() {
    $(".popup-mobilemenu").hide();
    $(".toggle-mobilemenu").click(function() {
        $(".popup-mobilemenu").fadeToggle(100);
    });
    $(".popup-mobilemenu").hide();
    $(".popup-mobilemenu").click(function() {
        $(".popup-mobilemenu").fadeOut(100);
    });
});
/* Quickstart and Blog sidebar toggles */
$(document).ready(function() {
    $(".toggle-navsidebar").hide();
    $(".nav-standard").click(function() {
        $(".toggle-navsidebar").fadeToggle(100);
    });
    $(".toggle-navsidebar").hide();
    $(".toggle-navsidebar").click(function() {
        $(".toggle-navsidebar").fadeOut(100);
    });
    $(".toggle-blogbar").hide();
    $(".nav-blog").click(function() {
        $(".toggle-blogbar").fadeToggle(100);
    });
    $(".toggle-blogbar").hide();
    $(".toggle-blogbar").click(function() {
        $(".toggle-blogbar").fadeOut(100);
    });
});
/* Handles featured video toggles */
$(document).ready(function() {
    $(".toggle-video-1").hide();
    $(".page-video-1").click(function() {
        $(".toggle-video-1").fadeIn('fast');
    });
    $(".toggle-video-1").hide();
    $(".toggle-video-1").click(function() {
        $(".toggle-video-1").fadeOut('fast');
    });
    $(".toggle-video-2").hide();
    $(".page-video-2").click(function() {
        $(".toggle-video-2").fadeIn('fast');
    });
    $(".toggle-video-2").hide();
    $(".toggle-video-2").click(function() {
        $(".toggle-video-2").fadeOut('fast');
    });
    $(".toggle-video-3").hide();
    $(".page-video-3").click(function() {
        $(".toggle-video-3").fadeIn('fast');
    });
    $(".toggle-video-3").hide();
    $(".toggle-video-3").click(function() {
        $(".toggle-video-3").fadeOut('fast');
    });
});
/* Pre-load and unload of video iframes */
$(document).ready(function() {
    $(".page-video-1").click(function() {
        var iframe = $("#video-1");
        iframe.attr("src", iframe.data("src"));
    });
    $(".page-video-2").click(function() {
        var iframe = $("#video-2");
        iframe.attr("src", iframe.data("src"));
    });
    $(".page-video-3").click(function() {
        var iframe = $("#video-3");
        iframe.attr("src", iframe.data("src"));
    });
});
/* Start and stop video functions */
$(document).ready(function() {
    $(function() {
        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-1')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
    $(function() {
        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-2')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
    $(function() {
        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-3')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});