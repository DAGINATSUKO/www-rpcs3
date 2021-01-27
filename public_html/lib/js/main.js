// Mobile touch overflow
$(document).bind("mobileinit", function() {
	$.mobile.touchOverflowEnabled = true;
});
// Mobile friendly touch compatibility
$(document).ready(function() {
	document.documentElement.addEventListener('touchstart', function(event) {
		if (event.touches.length > 1) {
			event.preventDefault(); // Prevents otherwise
		}
	}, false);
});
// Landing fade-in
$(window).on('load', function() {
	$('.fade-in-onload').delay(100).fadeIn(300);
	$('.fade-out-onload').delay(8000).fadeOut(300); // For warning messages
});
// Header fade-in
$(document).ready(function() {
	$('.fade-up-onstart').delay(100).fadeIn(300); // Header text
});
// Dynamic scaling for landing hero
$(window).on("load resize", function(e) {
	$('.scale-content-txt-1').css({
		'position': 'absolute',
		'top': '50%',
		'margin-top': -$('.scale-content-txt-1').height() / 2 // Divide div height by half
	});
	$('.scale-content-txt-2').css({
		'position': 'absolute',
		'top': '50%',
		'margin-top': -$('.scale-content-txt-2').height() / 2 // Divide div height by half
	});
	$('.scale-content-txt-3').css({
		'position': 'absolute',
		'top': '50%',
		'margin-top': -$('.scale-content-txt-3').height() / 2 // Divide div height by half
	});
});
// Menu opacity and scroll indicator on scroll distance
$(window).scroll(function() {
	var scroll = $(window).scrollTop();
	if (scroll >= 10) { // Scroll down 10px to init fill
		$(".menu-con-backdrop").fadeIn(400);
	} else {
		$(".menu-con-backdrop").fadeOut(400);
	}
	if ($(this).scrollTop() > 10) { // Scroll up 10px to init fill
		$('.landing-ico-scrolldown').fadeOut(400);
	} else {
		$('.landing-ico-scrolldown').fadeIn(400);
	}
});
// Glowing text pulsation
$(document).ready(function() {
	var glow = $('.pulsate');
	setInterval(function() {
		glow.hasClass('glow') ? glow.removeClass('glow') : glow.addClass('glow');
	}, 1000);
});
// Cookie disclaimer acceptance states
$(document).ready(function() {
	var sel = $.cookie("save-accept"); // Retrieve cookie
	sel = sel == "true"; // Load setting if cookie is available
	$('.menu-btn-cookies').toggleClass("activate-accept", sel).on('click', function(e) {
		$(".menu-con-cookies").toggleClass("object-hidden");
	});
	$(".menu-btn-cookies").on("click", function() {
		var $this = $(this);
		sel = !sel;
		$this.toggleClass("activate-accept", sel); // If this class is available, apply setting
		$.cookie("save-accept", sel, { // Save cookie
			expires: 365,
			path: '/'
		});
	});
	if ($('.menu-btn-cookies').hasClass('activate-accept')) {
		$(".menu-con-cookies").addClass("object-hidden");
	} else {
		$(".menu-con-cookies").removeClass("object-hidden");
	}
});
// Text pulsate setting states
$(document).ready(function() {
	var sel = $.cookie("save-pulsate"); // Retrieve cookie
	sel = sel == "true"; // Load setting if cookie is available
	$('.toggle-pulsate').toggleClass("activate-pulsate", sel).on('click', function(e) {
		location.reload(); // Reload on apply
	});
	$(".toggle-pulsate").on("click", function() {
		var $this = $(this);
		sel = !sel;
		$this.toggleClass("activate-pulsate", sel); // If this class is available, apply setting
		$.cookie("save-pulsate", sel, { // Save cookie
			expires: 365,
			path: '/'
		});
	});
	if ($('.toggle-pulsate').hasClass('activate-pulsate')) {
		$('.pulsate').addClass("disable-pulsate");
		$('.btn-pulsate').text("Pulsate - Off");
	} else {
		$('.pulsate').removeClass("disable-pulsate");
	}
});
// GPU transparency setting states
$(document).ready(function() {
	var sel = $.cookie("save-transparency"); // Retrieve cookie
	sel = sel == "true"; // Load setting if cookie is available
	$('.toggle-transparency').toggleClass("activate-transparency", sel).on('click', function(e) {
		$('.menu-con-container').toggleClass("disable-transparency");
		$('.video-btn-play').toggleClass("disable-transparency");
		$('.menu-con-cookies').toggleClass("disable-transparency");
		$('.menu-tx1-message').toggleClass("disable-transparency");
		$('.mobile-menu-con-container').toggleClass("disable-transparency");
		location.reload(); // Reload on apply
	});
	$(".toggle-transparency").on("click", function() {
		var $this = $(this);
		sel = !sel;
		$this.toggleClass("activate-transparency", sel); // If this class is available, apply setting
		$.cookie("save-transparency", sel, { // Save cookie
			expires: 365,
			path: '/'
		});
	});
	if ($('.toggle-transparency').hasClass('activate-transparency')) {
		$('.menu-con-container').addClass("disable-transparency");
		$('.video-btn-play').addClass("disable-transparency");
		$('.menu-con-cookies').addClass("disable-transparency");
		$('.menu-tx1-message').addClass("disable-transparency");
		$('.mobile-menu-con-container').addClass("disable-transparency");
		$('.btn-transparency').text("Transparency - Off");
	} else {
		$('.menu-con-container').removeClass("disable-transparency");
		$('.video-btn-play').removeClass("disable-transparency");
		$('.menu-con-cookies').removeClass("disable-transparency");
		$('.menu-tx1-message').removeClass("disable-transparency");
		$('.mobile-menu-con-container').removeClass("disable-transparency");
	}
});
// GPU particles setting states
$(document).ready(function() {
	var sel = $.cookie("save-particles"); // Retrieve cookie
	sel = sel == "true"; // Load setting if cookie is available
	$('.toggle-particles').toggleClass("activate-particles", sel).on('click', function(e) {
		$('#object-particles').toggleClass("object-hidden");
		location.reload(); // Reload on apply
	});
	$(".toggle-particles").on("click", function() {
		var $this = $(this);
		sel = !sel;
		$this.toggleClass("activate-particles", sel); // If this class is available, apply setting
		$.cookie("save-particles", sel, { // Save cookie
			expires: 365,
			path: '/'
		});
	});
	if ($('.toggle-particles').hasClass('activate-particles')) {
		$('#object-particles').addClass("object-hidden");
		$('.btn-particles').text("Particles - Off");
	} else {
		$('#object-particles').removeClass("object-hidden");
	}
});
// GPU waves save state
$(document).ready(function() {
	var sel = $.cookie("save-waves"); // Retrieve cookie
	sel = sel == "true"; // Load setting if cookie is available
	$('.toggle-waves').toggleClass("activate-waves", sel).on('click', function(e) {
		$('.wavebar-con-wrap').toggleClass("object-hidden");
		location.reload(); // Reload on apply
	});
	$(".toggle-waves").on("click", function() {
		var $this = $(this);
		sel = !sel;
		$this.toggleClass("activate-waves", sel); // If this class is available, apply setting
		$.cookie("save-waves", sel, { // Save cookie
			expires: 365,
			path: '/'
		});
	});
	if ($('.toggle-waves').hasClass('activate-waves')) {
		$('.wavebar-con-wrap').addClass("object-hidden");
		$('.btn-waves').text("Waves - Off");
	} else {
		$('.wavebar-con-wrap').removeClass("object-hidden");
	}
});
// Theme menu fade-out and fade-in animation
$(document).ready(function() {
	$(".toggle-theme").click(function() {
		$(".theme-btn-close").fadeIn(200);
		$(".theme-con-spinner").fadeIn(200).fadeOut(200);
		$(".window-con-theme").fadeIn(200);
		$(".window-bg-theme").delay(1000).fadeIn(2000);
		$(".wavebar-con-container-theme").delay(200).fadeIn(2000);
		$(".theme-tx1-description").delay(2000).fadeIn(200);
		$(".menu-con-container").fadeOut(200);
		$(".landing-con-left").fadeOut(200);
		$(".landing-con-right").fadeOut(200);
		$(".landing-ico-scrolldown").fadeOut(200);
		$(".banner-con-title").fadeOut(200);
		$(".alipay-con-alipay").fadeOut(200);
		$(".alipay-con-footer").fadeOut(200);
		$(".error-con-content").fadeOut(200);
		$('body').css({ // Lock body scrolling
			'position': 'fixed',
		});
	});
	$(".theme-btn-close").click(function() {
		$(".theme-btn-close").fadeOut(200);
		$(".theme-con-spinner").fadeOut(200);
		$(".window-con-theme").fadeOut(200);
		$(".window-bg-theme").fadeOut(200);
		$(".wavebar-con-container-theme").fadeOut(10);
		$(".theme-tx1-description").fadeOut(10);
		$(".menu-con-container").delay(500).fadeIn(200);
		$(".landing-con-left").delay(500).fadeIn(200);
		$(".landing-con-right").delay(500).fadeIn(200);
		$(".landing-ico-scrolldown").delay(500).fadeIn(200);
		$(".banner-con-title").delay(500).fadeIn(200);
		$(".alipay-con-alipay").delay(500).fadeIn(200);
		$(".alipay-con-footer").delay(500).fadeIn(200);
		$(".error-con-content").delay(500).fadeIn(200);
		$('body').css({ // Unlock body scrolling
			'position': 'unset',
		});
	});
});
// Show settings sub menu
$(document).ready(function() {
	$('.menu-tx1-settings').delay(3000).fadeOut(100);
	$(".settings-submenu").fadeOut();
	$(".toggle-settings").click(function() {
		$(".settings-submenu").fadeToggle(100);
		$(".patreon-submenu").fadeOut(); // Fade-out patreon sub menu if open
		$('.menu-tx1-settings').fadeIn(100);
	});
	$(".settings-submenu").fadeOut();
	$(".settings-submenu").click(function() {
		$(".settings-submenu").fadeOut(100);
	});
});
// Show patreon sub menu
$(document).ready(function() {
	$(".patreon-submenu").fadeOut();
	$(".toggle-support").click(function() {
		$(".patreon-submenu").fadeToggle(100);
		$(".settings-submenu").fadeOut(); // Fade-out settings sub menu if open
	});
	$(".patreon-submenu").fadeOut();
	$(".patreon-submenu").click(function() {
		$(".patreon-submenu").fadeOut(100);
	});
});
// Show mobile menu
$(document).ready(function() {
	$(".popup-mobilemenu").hide();
	$(".toggle-mobilemenu").click(function() {
		$(".popup-mobilemenu").fadeToggle(100);
	});
	$(".popup-mobilemenu").hide();
	$(".popup-mobilemenu").click(function() {
		$(".popup-mobilemenu").fadeOut(100);
	});
	// Show Quickstart and Blog side bar menus
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
// Compatibility database search box focusing
$(document).ready(function() {
	$('.database-search').on('focus', function() { // Adds focus effect to search bar
		$('.search-inp-search').addClass('object-focused');
		$('#compat-con-searchbox').addClass('object-focused');
	});
	$('.database-search').on('blur', function() { // Removes focus effect to search bar
		$('.search-inp-search').removeClass('object-focused');
		$('#compat-con-searchbox').removeClass('object-focused');
	});
});
// Shine effect for video carousel
$(document).ready(function() {
	$('.video-img-thumbnail').on('mouseenter mouseleave', function(e) {
		$('.video-con-animate').trigger(e.type);
	});
});
// Video carousel controls
$(document).ready(function() {
	$('.content-btn-left').click(function() { // Apply left fade-in animation
		$('.item').addClass('carousel-left');
		$('.video-tx2-heading').addClass('carousel-left');
		$('.video-btn-play').addClass('carousel-left');
	});
	$('.content-btn-left').click(function() {
		$('.item').removeClass('carousel-right');
		$('.video-tx2-heading').removeClass('carousel-right');
		$('.video-btn-play').removeClass('carousel-right');
	});
	$('.content-btn-right').click(function() { // Apply right fade-in animation
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
// Handles featured video toggles
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
	$(".toggle-video-1").fadeOut(); // Open video #1
	$(".page-video-1").click(function() {
		$(".toggle-video-1").fadeIn('fast');
	});
	$(".toggle-video-1").fadeOut(); // Close video #1
	$(".close-video").click(function() {
		$(".toggle-video-1").fadeOut('fast');
	});
	$(".toggle-video-2").fadeOut();
	$(".page-video-2").click(function() { // Open video #2
		$(".toggle-video-2").fadeIn('fast');
	});
	$(".toggle-video-2").fadeOut(); // Close video #2
	$(".close-video").click(function() {
		$(".toggle-video-2").fadeOut('fast');
	});
	$(".toggle-video-3").fadeOut(); // Open video #3
	$(".page-video-3").click(function() {
		$(".toggle-video-3").fadeIn('fast');
	});
	$(".toggle-video-3").fadeOut(); // Close video #3
	$(".close-video").click(function() {
		$(".toggle-video-3").fadeOut('fast');
	});
	$(".page-video-1").click(function() {
		var iframe = $("#video-1"); // Load video #1's iframe 
		iframe.attr("src", iframe.data("src"));
	});
	$(".page-video-2").click(function() {
		var iframe = $("#video-2"); // Load video #2's iframe
		iframe.attr("src", iframe.data("src"));
	});
	$(".page-video-3").click(function() {
		var iframe = $("#video-3"); // Load video #3's iframe
		iframe.attr("src", iframe.data("src"));
	});
	$(function() {
		$(".stop-video").on("click", function() {
			videoControl("stopVideo"); // Stop and un-load video #1
		});

		function videoControl(action) {
			var $playerWindow = $('#video-1')[0].contentWindow;
			$playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
		}
	});
	$(function() {
		$(".stop-video").on("click", function() {
			videoControl("stopVideo"); // Stop and un-load video #2
		});

		function videoControl(action) {
			var $playerWindow = $('#video-2')[0].contentWindow;
			$playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
		}
	});
	$(function() {
		$(".stop-video").on("click", function() {
			videoControl("stopVideo"); // Stop and un-load video #3
		});

		function videoControl(action) {
			var $playerWindow = $('#video-3')[0].contentWindow;
			$playerWindow.postMessage('{"event":"command","func":"' + action + '","args":""}', '*');
		}
	});
});
// Responsive anchor functions
$(document).ready(function() {
	$('a[rel="anchor-select"]').click(function() {
		$('html, body').animate({
			scrollTop: $($.attr(this, 'href')).offset().top
		}, 500); //Scroll within 500ms
		return false;
	});
});