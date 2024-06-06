// Animation: Main menu scroll distance 
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
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Animation: Landing fade-in
$(window).on('load', function() {
	$('.fade-in-onload').delay(100).fadeIn(300);
	$('.fade-out-onload').delay(8000).fadeOut(300); // For warning messages
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Animation: Header fade-in
$(document).ready(function() {
	$('.fade-up-onstart').delay(100).fadeIn(300); // Header text
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Animation: Fade out
$(document).ready(function () {
    $('.menu-btn-tx1-settings-tooltip').delay(16000).fadeOut(1000);
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Animation: Glowing text pulsation
 $(document).ready(function() {
	var glow = $('.pulsate');
	setInterval(function() {
		glow.hasClass('glow') ? glow.removeClass('glow') : glow.addClass('glow');
}, 1000);
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Animation: Shine effect for video carousel
$(document).ready(function() {
	$('.video-img-thumbnail').on('mouseenter mouseleave', function(e) {
		$('.video-con-animate').trigger(e.type);
	});
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Animation: Cycle between OS icons for download button
$(document).ready(function() {
	$('.build-ico-os img:gt(0)').hide();
	setInterval(function () {
		$('.build-ico-os :first-child').fadeOut(200)
			.next().fadeIn(200).end().appendTo('.build-ico-os');
	}, 5000);
});
// Animation: Cycle between OS icons for system requirements
$(document).ready(function() {
	$('.item-ico-dynamic-a img:gt(0)').hide();
	setInterval(function () {
		$('.item-ico-dynamic-a :first-child').fadeOut(200)
			.next().fadeIn(200).end().appendTo('.item-ico-dynamic-a');
	}, 2000);
});
// Cycle between OS icons for system requirements
$(document).ready(function() {
	$('.item-ico-dynamic-b img:gt(0)').hide();
	setInterval(function () {
		$('.item-ico-dynamic-b :first-child').fadeOut(200)
			.next().fadeIn(200).end().appendTo('.item-ico-dynamic-b');
	}, 2000);
});
// Cycle between handheld screens for download button
$(document).ready(function() {
	$('.handheld-img-screen img:gt(0)').hide();
	setInterval(function () {
		$('.handheld-img-screen :first-child').fadeOut(200)
			.next().fadeIn(200).end().appendTo('.handheld-img-screen');
	}, 5000);
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Theme menu fade-out and fade-in animations
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