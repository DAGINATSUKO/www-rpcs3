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
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Animation: Landing fade-in
$(window).on('load', function() {
	$('.fade-in-onload').delay(100).fadeIn(300);
	$('.fade-out-onload').delay(8000).fadeOut(300); // For warning messages
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Animation: Header fade-in
$(document).ready(function() {
	$('.fade-up-onstart').delay(100).fadeIn(300); // Header text
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Animation: Fade out
$(document).ready(function () {
    $('.menu-btn-tx1-settings-tooltip').delay(16000).fadeOut(1000);
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Animation: Glowing text pulsation
 $(document).ready(function() {
	var glow = $('.pulsate');
	setInterval(function() {
		glow.hasClass('glow') ? glow.removeClass('glow') : glow.addClass('glow');
}, 1000);
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Animation: Shine effect for video carousel
$(document).ready(function() {
	$('.video-img-thumbnail').on('mouseenter mouseleave', function(e) {
		$('.video-con-animate').trigger(e.type);
	});
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Animation: Cycle between images for various elements
$(document).ready(function () {
  const cyclers = [
    { selector: '.build-ico-os',       interval: 5000 }, // OS icons for download button
    { selector: '.item-ico-dynamic-a', interval: 2000 }, // OS icons for system requirements
    { selector: '.item-ico-dynamic-b', interval: 2000 }, // OS icons for system requirements
    { selector: '.handheld-img-screen', interval: 5000 } // Handheld screens for download button
  ];

  cyclers.forEach(function ({ selector, interval }) {
    $(`${selector} img:gt(0)`).hide();
    setInterval(function () {
      $(`${selector} :first-child`).fadeOut(200)
        .next().fadeIn(200).end().appendTo(selector);
    }, interval);
  });

});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Theme menu fade-out and fade-in animations
$(document).ready(function () {
  const $landingEls = $('.landing-con-left, .landing-con-right, .landing-ico-scrolldown, .banner-con-title, .alipay-con-alipay, .alipay-con-footer, .error-con-content');

  $('.toggle-theme').on('click', function () {
    $('.theme-btn-close').fadeIn(200);
    $('.theme-con-spinner').fadeIn(200).fadeOut(200);
    $('.window-con-theme').fadeIn(200);
    $('.window-bg-theme').delay(1000).fadeIn(2000);
    $('.wavebar-con-container-theme').delay(200).fadeIn(2000);
    $('.theme-tx1-description').delay(2000).fadeIn(200);
    $('.menu-con-container').fadeOut(200);
    $landingEls.fadeOut(200);
    $('body').css('position', 'fixed'); // Lock body scrolling
  });

  $('.theme-btn-close').on('click', function () {
    $('.theme-btn-close, .theme-con-spinner, .window-con-theme, .window-bg-theme').fadeOut(200);
    $('.wavebar-con-container-theme, .theme-tx1-description').fadeOut(10);
    $('.menu-con-container').delay(500).fadeIn(200);
    $landingEls.delay(500).fadeIn(200);
    $('body').css('position', 'unset'); // Unlock body scrolling
  });

});