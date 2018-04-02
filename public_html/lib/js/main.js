/* Handles mobile friendly touch gesture compatibility */
$(document).ready(function() {
    document.documentElement.addEventListener('touchstart', function(event) {
        if (event.touches.length > 1) {
            event.preventDefault();
        }
    }, false);
});
/* Randomly loads header banner image for each page */
$(document).ready(function() {
    var images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', '11.jpg', '12.jpg', '13.jpg', '14.jpg', '15.jpg', '16.jpg', '17.jpg', '18.jpg', '19.jpg', '20.jpg', '21.jpg', '22.jpg', '23.jpg', '24.jpg', '25.jpg', '26.jpg', '27.jpg', '28.jpg', '29.jpg', '30.jpg', '31.jpg', '32.jpg', '33.jpg', '34.jpg', '35.jpg', '36.jpg', '37.jpg', '38.jpg', '39.jpg', '40.jpg', '41.jpg', '42.jpg', '43.jpg', '44.jpg', '45.jpg', '46.jpg', '47.jpg', '48.jpg', '49.jpg', '50.jpg', '51.jpg', '52.jpg', '53.jpg', '54.jpg', '55.jpg', '56.jpg', '57.jpg', '58.jpg', '59.jpg', '60.jpg', '61.jpg', '62.jpg', '63.jpg', '64.jpg'];
    $('.header-img-head').css({
        'background': 'no-repeat center top url(/img/banners/' + images[Math.floor(Math.random() * images.length)] + ')'
    });
});
/* Handles menubar opacity swap on scroll */
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 60) {
        $(".menu-con-menubar").css('border-bottom', 'solid 1px rgba(255,255,255,.0)');
    } else {
        $(".menu-con-menubar").css('border-bottom', 'solid 1px rgba(255,255,255,.1)');
    }
});
/* Handles page-specific menubar dimmer */
$(window).load(function() {
    $(function() {
        if ($('body').is('.gallery-page')) {
            $('.darkmode-menubar').toggleClass("gm-menubar-l0");
            $('.darkmode-menubar-l1').toggleClass("gm-menubar-l1");
            $('.darkmode-menubar-l2').toggleClass("gm-menubar-l2");
        }
    });
});
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 60) {
        $(".menu-und-l1").fadeIn(100);
    } else {
        $(".menu-und-l1").fadeOut(100);
    }
});
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 400) {
        $(".menu-und-l2").fadeIn(100);
    } else {
        $(".menu-und-l2").fadeOut(100);
    }
});
$(document).ready(function() {
    $(function() {
        $('.support-subtrigger').hover(function() {
            $('.support-submenu').fadeIn(100);
            $('.support-submenu').show();
        }, function() {
            $('.support-submenu').fadeOut(100);
            $('.support-submenu').hide();
        });
    });
});
/* Handles globla banner fade in on load */
$(window).load(function() {
    $('.header-img-head').fadeIn(300);
});
/* Handles scalable home feature text module 2 */
$(window).resize(function() {
    $('.scale-feature-txt-1').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-feature-txt-1').height() / 2
    });
});
$(document).ready(function() {
    $('.scale-feature-txt-1').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-feature-txt-1').height() / 2
    });
});
/* Handles scalable home feature text module 2 */
$(window).resize(function() {
    $('.scale-feature-txt-2').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-feature-txt-2').height() / 2
    });
});
$(document).ready(function() {
    $('.scale-feature-txt-2').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-feature-txt-2').height() / 2
    });
});
/* Handles scalable home feature text module 3 */
$(window).resize(function() {
    $('.scale-feature-txt-3').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-feature-txt-3').height() / 2
    });
});
$(document).ready(function() {
    $('.scale-feature-txt-3').css({
        'position': 'absolute',
        'top': '50%',
        'margin-top': -$('.scale-feature-txt-3').height() / 2
    });
});
/* Handles all delayed fade events */
$(window).load(function() {
    $('.delay-fadeout').delay(8000).fadeOut(288);
});
/* Handles all fade on scroll events */
$(window).scroll(function() {
    if ($(this).scrollTop() > 40) {
        $('.fade-on-scroll').fadeIn(288);
    } else {
        $('.fade-on-scroll').fadeOut(288);
    }
});
$(window).scroll(function() {
    if ($(this).scrollTop() > 0) {
        $('.fade-in-sc').fadeOut();
    } else {
        $('.fade-in-sc').fadeIn();
    }
});
/* Handles anchor links */
$(document).ready(function() {
    $('a[rel="anchor"]').click(function() {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        return false;
    });
});
/* Handles mobile menu toggles */
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
/* Handles blog sidebar toggle */
$(document).ready(function() {
    $(".toggle-blogsidebar").hide();
    $(".nav-blog").click(function() {
        $(".toggle-blogsidebar").fadeToggle(100);
    });
    $(".toggle-blogsidebar").hide();
    $(".toggle-blogsidebar").click(function() {
        $(".toggle-blogsidebar").fadeOut(100);
    });
});
/* Handles standard sidebar toggle */
$(document).ready(function() {
    $(".toggle-navsidebar").hide();
    $(".nav-standard").click(function() {
        $(".toggle-navsidebar").fadeToggle(100);
    });
    $(".toggle-navsidebar").hide();
    $(".toggle-navsidebar").click(function() {
        $(".toggle-navsidebar").fadeOut(100);
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
/* Handles pre-load and unload of video iframes */
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
/* Handles start and stop of featured video #1 */
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