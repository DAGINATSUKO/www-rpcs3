/* Randomly loads banner image for each page */
$(document).ready(function() {
    var images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', '11.jpg', '12.jpg', '13.jpg', '14.jpg', '15.jpg', '16.jpg', '17.jpg', '18.jpg', '19.jpg', '20.jpg', '21.jpg', '22.jpg', '23.jpg', '24.jpg', '25.jpg', '26.jpg', '27.jpg', '28.jpg', '29.jpg', '30.jpg', '31.jpg', '32.jpg', '33.jpg', '34.jpg', '35.jpg', '36.jpg', '37.jpg', '38.jpg', '39.jpg', '40.jpg'];
    $('.dynamic-banner').css({
        'background': 'no-repeat center top url(/img/banners/' + images[Math.floor(Math.random() * images.length)] + ')'
    });
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
/* Handles standard wavebar animation */
$(document).ready(function() {
    var $wavebarFX = $(".visual-wavebar-1"),
        wavebarWidth = 25,
        wavebarCount = $(window).width() / wavebarWidth;
    for (var i = 0; i < wavebarCount; i++) {
        $wavebar = $("<div>").addClass('wavebar-1').css('width', wavebarWidth + 'px').css('left', i * wavebarWidth + 'px').css('animation-delay', (i / wavebarCount) + 's');
        $wavebar.appendTo($wavebarFX);
    }
});
/* Handles denser wavebar animation */
$(document).ready(function() {
    var $wavebarFX = $(".visual-wavebar-2"),
        wavebarWidth = 25,
        wavebarCount = $(window).width() / wavebarWidth;
    for (var i = 0; i < wavebarCount; i++) {
        $wavebar = $("<div>").addClass('wavebar-2').css('width', wavebarWidth + 'px').css('left', i * wavebarWidth + 'px').css('animation-delay', (i / wavebarCount) + 's');
        $wavebar.appendTo($wavebarFX);
    }
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
/* Handles menubar opacity swap on scroll */
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 440) {
        $("#menu-con-menubar ").addClass("div-menubar-opacity ");
    } else {
        $("#menu-con-menubar ").removeClass("div-menubar-opacity ");
    }
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
/* Handles all fade on scroll events */
$(document).ready(function() {
    $('.delayed-fade').delay(500).fadeIn();
});
$(window).scroll(function() {
    if ($(this).scrollTop() > 40) {
         $('.fade-on-scroll').fadeIn(100);
    } else {
        $('.fade-on-scroll').fadeOut(100);
    }
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
/* Handles all submenu rollovers */
$(document).ready(function() {
    $(function() {
        $('.support-subtrigger').hover(function() {
            $('.support-submenu').css('display', 'block');
        }, function() {
            $('.support-submenu').css('display', 'none');
        });
    });
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
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
    $(".page-video-4").click(function() {
        var iframe = $("#video-4");
        iframe.attr("src", iframe.data("src"));
    });
    $(".page-video-5").click(function() {
        var iframe = $("#video-5");
        iframe.attr("src", iframe.data("src"));
    });
    $(".page-video-6").click(function() {
        var iframe = $("#video-6");
        iframe.attr("src", iframe.data("src"));
    });
    $(".page-video-7").click(function() {
        var iframe = $("#video-7");
        iframe.attr("src", iframe.data("src"));
    });
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
/* Handles menu toggles */
$(document).ready(function() {
    $(".toggle-menu").hide();
    $("#menu-btn-open").click(function() {
        $(".toggle-menu").fadeToggle(100);
    });
    $(".toggle-menu").hide();
    $(".toggle-menu").click(function() {
        $(".toggle-menu").fadeOut(100);
    });
});
/* Handles blog sidebar toggle */
$(document).ready(function() {
    $(".toggle-bloglinks").hide();
    $("#bloglinks-btn-open").click(function() {
        $(".toggle-bloglinks").fadeToggle(100);
    });
    $(".toggle-bloglinks").hide();
    $(".toggle-bloglinks").click(function() {
        $(".toggle-bloglinks").fadeOut(100);
    });
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
/* Handles featured video #1 toggle */
$(document).ready(function() {
    $(".toggle-video-1").hide();
    $(".page-video-1").click(function() {
        $(".toggle-video-1").fadeIn('fast');
    });
    $(".toggle-video-1").hide();
    $(".toggle-video-1").click(function() {
        $(".toggle-video-1").fadeOut('fast');
    });
	/* Handles featured video #2 toggle */
    $(".toggle-video-2").hide();
    $(".page-video-2").click(function() {
        $(".toggle-video-2").fadeIn('fast');
    });
    $(".toggle-video-2").hide();
    $(".toggle-video-2").click(function() {
        $(".toggle-video-2").fadeOut('fast');
    });
	/* Handles featured video #3 toggle */
    $(".toggle-video-3").hide();
    $(".page-video-3").click(function() {
        $(".toggle-video-3").fadeIn('fast');
    });
    $(".toggle-video-3").hide();
    $(".toggle-video-3").click(function() {
        $(".toggle-video-3").fadeOut('fast');
    });
	/* Handles featured video #4 toggle */
    $(".toggle-video-4").hide();
    $(".page-video-4").click(function() {
        $(".toggle-video-4").fadeIn('fast');
    });
    $(".toggle-video-4").hide();
    $(".toggle-video-4").click(function() {
        $(".toggle-video-4").fadeOut('fast');
    });
	/* Handles featured video #5 toggle */
    $(".toggle-video-5").hide();
    $(".page-video-5").click(function() {
        $(".toggle-video-5").fadeIn('fast');
    });
    $(".toggle-video-5").hide();
    $(".toggle-video-5").click(function() {
        $(".toggle-video-5").fadeOut('fast');
    });
	/* Handles featured video #6 toggle */
    $(".toggle-video-6").hide();
    $(".page-video-6").click(function() {
        $(".toggle-video-6").fadeIn('fast');
    });
    $(".toggle-video-6").hide();
    $(".toggle-video-6").click(function() {
        $(".toggle-video-6").fadeOut('fast');
    });
	/* Handles featured video #7 toggle */
    $(".toggle-video-7").hide();
    $(".page-video-7").click(function() {
        $(".toggle-video-7").fadeIn('fast');
    });
    $(".toggle-video-7").hide();
    $(".toggle-video-7").click(function() {
        $(".toggle-video-7").fadeOut('fast');
    });
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
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
});
/* Handles start and stop of featured video #2 */
$(document).ready(function() {
    $(function() {
        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-2')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
/* Handles start and stop of featured video #3 */
$(document).ready(function() {
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
/* Handles start and stop of featured video #4 */
$(document).ready(function() {
    $(function() {
        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-4')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
/* Handles start and stop of featured video #5 */
$(document).ready(function() {
    $(function() {
        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-5')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
/* Handles start and stop of featured video #6 */
$(document).ready(function() {
    $(function() {
        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-6')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
/* Handles start and stop of featured video #7 */
$(document).ready(function() {
    $(function() {
        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-7')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
 /* Handles fullscreen announcement toggles */
 $(document).ready(function() {
   $('#announce-btn-overlay').mouseover(function() {
      $('#announce-btn-overlay').fadeOut('fast', function() {
      });
   });
 });
 /* Handles start and stop of announcement video */
$(document).ready(function() {
    $(function() {
	    $("#announce-btn-overlay").mouseover("click", function() {　　
            videoControl("playVideo");
        });
        $(".stop-video-a").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-announce')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});