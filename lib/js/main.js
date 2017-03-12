$(document).ready(function() {
    var images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', '11.jpg', '12.jpg', '13.jpg', '14.jpg', '15.jpg', '16.jpg', '17.jpg', '18.jpg', '19.jpg', '20.jpg', '21.jpg', '22.jpg', '23.jpg', '24.jpg', '25.jpg', '26.jpg', '27.jpg', '28.jpg', '29.jpg', '30.jpg', '31.jpg', '32.jpg', '33.jpg', '34.jpg', '35.jpg', '36.jpg', '37.jpg', '38.jpg', '39.jpg', '40.jpg'];
    $('.dynamic-banner').css({
        'background': 'no-repeat center top url(/img/banners/' + images[Math.floor(Math.random() * images.length)] + ')'
    });
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    var $wavebarFX = $(".visual-wavebar-1"),
        wavebarWidth = 25,
        wavebarCount = $(window).width() / wavebarWidth;
    for (var i = 0; i < wavebarCount; i++) {
        $wavebar = $("<div>").addClass('wavebar-1').css('width', wavebarWidth + 'px').css('left', i * wavebarWidth + 'px').css('animation-delay', (i / wavebarCount) + 's');
        $wavebar.appendTo($wavebarFX);
    }
});
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
$(window).load(function() {
    $(".fade-onload").fadeIn(288);
});
$(document).ready(function() {
    $('.delayed-fade').delay(500).fadeIn();
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 70) {
        $("#menu-ico-patreon").addClass("min-ico-patreon").fadeIn(288)
    } else {
        $("#menu-ico-patreon").removeClass("min-ico-patreon").fadeIn(288);
    }
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 500) {
        $("#menu-btn-backtotop").removeClass("div-hidden").fadeIn(288)
    } else {
        $("#menu-btn-backtotop").addClass("div-hidden").fadeIn(288);
    }
});
/*--------------------------------------------------------------------------------------------------------------------------------------*/
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
/*--------------------------------------------------------------------------------------------------------------------------------------*/
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
    $(".toggle-video-4").hide();
    $(".page-video-4").click(function() {
        $(".toggle-video-4").fadeIn('fast');
    });
    $(".toggle-video-4").hide();
    $(".toggle-video-4").click(function() {
        $(".toggle-video-4").fadeOut('fast');
    });
    $(".toggle-video-5").hide();
    $(".page-video-5").click(function() {
        $(".toggle-video-5").fadeIn('fast');
    });
    $(".toggle-video-5").hide();
    $(".toggle-video-5").click(function() {
        $(".toggle-video-5").fadeOut('fast');
    });
    $(".toggle-video-6").hide();
    $(".page-video-6").click(function() {
        $(".toggle-video-6").fadeIn('fast');
    });
    $(".toggle-video-6").hide();
    $(".toggle-video-6").click(function() {
        $(".toggle-video-6").fadeOut('fast');
    });
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
$(document).ready(function() {
    $(function() {
        $(".page-video-1").on("click", function() {　　
            videoControl("playVideo");
        });

        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-1')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
$(document).ready(function() {
    $(function() {
        $(".page-video-2").on("click", function() {　　
            videoControl("playVideo");
        });

        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-2')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
$(document).ready(function() {
    $(function() {
        $(".page-video-3").on("click", function() {　　
            videoControl("playVideo");
        });

        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-3')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
$(document).ready(function() {
    $(function() {
        $(".page-video-4").on("click", function() {　　
            videoControl("playVideo");
        });

        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-4')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
$(document).ready(function() {
    $(function() {
        $(".page-video-5").on("click", function() {　　
            videoControl("playVideo");
        });
        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-5')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
$(document).ready(function() {
    $(function() {
        $(".page-video-6").on("click", function() {　　
            videoControl("playVideo");
        });
        $(".stop-video").on("click", function() {
            videoControl("stopVideo");
        });
        function videoControl(action) {
            var $playerWindow = $('#video-6')[0].contentWindow;
            $playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
        }
    });
});
$(document).ready(function() {
    $(function() {
        $(".page-video-7").on("click", function() {　　
            videoControl("playVideo");
        });
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
 $(document).ready(function() {
   $('#announce-btn-overlay').mouseover(function() {
      $('#announce-btn-overlay').fadeOut('fast', function() {
      });
   });
 });
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