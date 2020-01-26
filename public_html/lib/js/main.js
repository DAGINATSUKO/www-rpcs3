/* Mobile touch overflow */
$(document).bind("mobileinit", function() {
    $.mobile.touchOverflowEnabled = true;
});
/* Mobile friendly touch gesture compatibility */
$(document).ready(function() {
    document.documentElement.addEventListener('touchstart', function(event) {
        if (event.touches.length > 1) {
            event.preventDefault();
        }
    }, false);
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
/* Handles cookie acceptance state */
$(document).ready(function() {
    var sel = $.cookie("save-accept"); // get the cookie
    sel = sel == "true";
    $('.cookie-btn-button').toggleClass("activate-accept", sel).on('click', function(e) {
        $(".content-con-cookie").toggleClass("hidden");
    });
    $(".cookie-btn-button").on("click", function() {
        var $this = $(this);
        sel = !sel;
        $this.toggleClass("activate-accept", sel);
        $.cookie("save-accept", sel, {
            expires: 365,
            path: '/'
        });
    });
});
$(document).ready(function() {
    if ($('.cookie-btn-button').hasClass('activate-accept')) {
        $(".content-con-cookie").addClass("hidden");
    } else {
        $(".content-con-cookie").removeClass("hidden");
    }
});
/* Animation handlers */
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
/* Content update on load and re-size */
$(window).on("load resize", function(e) {
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
 /* Handles text pulsation*/
$(document).ready(function() {
    var glow = $('.pulsate');
    setInterval(function() {
        glow.hasClass('glow') ? glow.removeClass('glow') : glow.addClass('glow');
    }, 1000);
});
/* Menu opacity and scroll indicator on scroll distance */
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
        $(".menu-ovr-fill").fadeIn(400);
    } else {
        $(".menu-ovr-fill").fadeOut(400);
    }
    if ($(this).scrollTop() > 10) {
        $('.landing-ico-scrolldown').fadeOut(400);
    } else {
        $('.landing-ico-scrolldown').fadeIn(400);
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
    /* Add focus effect to search bar */
    $('.database-search').on('focus', function() {
        $('.search-inp-search').addClass('focused');
		$('#compat-con-searchbox').addClass('focused');
    });
    $('.database-search').on('blur', function() {
        $('.search-inp-search').removeClass('focused');
		$('#compat-con-searchbox').removeClass('focused');
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
    /* Quickstart and Blog sidebar toggles */
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
/* Handles video-con-animate effect on videorollover */
$(document).ready(function() {
    $('.video-img-thumbnail').on('mouseenter mouseleave', function(e) {
        $('.video-con-animate').trigger(e.type);
    });
});
/* Handles featured video toggles */
$(document).ready(function() {
    $(".page-video-1").click(function() {
        $('.video-img-viewport').show().delay(500).fadeOut();		
    });
	$(".page-video-2").click(function() {
        $('.video-img-viewport').show().delay(500).fadeOut();
    });
	$(".page-video-3").click(function() {
        $('.video-img-viewport').show().delay(500).fadeOut();
    });
    $(".toggle-video-1").hide();
    $(".page-video-1").click(function() {
        $(".toggle-video-1").fadeIn('fast');
    });
    $(".toggle-video-1").hide();
    $(".close-video").click(function() {
        $(".toggle-video-1").fadeOut('fast');
    });
    $(".toggle-video-2").hide();
    $(".page-video-2").click(function() {
        $(".toggle-video-2").fadeIn('fast');
    });
    $(".toggle-video-2").hide();
    $(".close-video").click(function() {
        $(".toggle-video-2").fadeOut('fast');
    });
    $(".toggle-video-3").hide();
    $(".page-video-3").click(function() {
        $(".toggle-video-3").fadeIn('fast');
    });
    $(".toggle-video-3").hide();
    $(".close-video").click(function() {
        $(".toggle-video-3").fadeOut('fast');
    });
    /* Pre-load and unload of video iframes */
    $(".page-video-1").click(function() {
        var iframe = $("#video-1");
        iframe.attr("src", iframe.data("src"));
    });
    /* Pre-load and unload of video iframes */
    $(".page-video-2").click(function() {
        var iframe = $("#video-2");
        iframe.attr("src", iframe.data("src"));
    });
    /* Pre-load and unload of video iframes */
    $(".page-video-3").click(function() {
        var iframe = $("#video-3");
        iframe.attr("src", iframe.data("src"));
    });
    /* Start and stop video functions */
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
/* Submenu mouse events */
$(document).ready(function() {
    $('.content-btn-left').click(function() {
        $('.item').addClass('carousel-left');
        $('.video-tx2-heading').addClass('carousel-left');
		$('.video-btn-play').addClass('carousel-left');
    });
    $('.content-btn-left').click(function() {
        $('.item').removeClass('carousel-right');
        $('.video-tx2-heading').removeClass('carousel-right');
		$('.video-btn-play').removeClass('carousel-right');
    });
    $('.content-btn-right').click(function() {
        $('.item').addClass('carousel-right');
        $('.video-tx2-heading').addClass('carousel-right');
		$('.video-btn-play').addClass('carousel-right');
    });
    $('.content-btn-right').click(function() {
        $('.item').removeClass('carousel-left');
        $('.video-tx2-heading').removeClass('carousel-left');
		$('.video-btn-play').removeClass('carousel-left');
    });
});