// Global: Scroll to top controller
$(document).ready(function () {

  // Show or hide the "Back to Top" button based on scroll position
  $(window).on('scroll', function () {
    $('.menu-btn-backtotop').fadeToggle($(window).scrollTop() > 250);
  });

  // Animate scroll to top on "Back to Top" button click
  $('.menu-btn-backtotop').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 400);
  });

});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Global: scroll anchor controller
$(document).ready(function () {

  // Smooth scroll to target element on anchor link click
  $('a[rel="anchor-select"]').on('click', function (e) {
    e.preventDefault();
    const target = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1500, 'easeInOutQuad'); // Scroll duration: 1500ms, easing: easeInOutQuad
    history.pushState(null, null, target); // Update the URL bar with the anchor
  });

});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Global: horizontal scroller controller
$(document).ready(function () {

  // jQuery plugin for stepped horizontal scroll on mouse wheel
  $.fn.hScroll = function (amount) {
    amount = amount || 200;
    $(this).on('DOMMouseScroll mousewheel', function (e) {
      const oEvent = e.originalEvent;

      // Skip scroll stepping for touchpad events
      if (oEvent.wheelDeltaY === undefined || oEvent.wheelDeltaY === 0) return;

      const direction = oEvent.detail ? oEvent.detail * -amount : oEvent.wheelDelta;
      const newPosition = $(this).scrollLeft() + (direction > 0 ? -amount : amount);
      $(this).stop().animate({ scrollLeft: newPosition }, 200, 'linear');
      e.preventDefault();
    });
  };

  // Horizontal scroll on mouse wheel for gamepad wrapper
  $('.gamepad-con-wrapper').on('wheel', function (e) {
    // Skip scroll stepping for touchpad events
    if (e.originalEvent.wheelDeltaY === undefined || e.originalEvent.wheelDeltaY === 0) return;

    e.preventDefault();
    const newPosition = $(this).scrollLeft() + e.originalEvent.deltaY * 3; // Multiplied by 3 to increase scroll distance
    $(this).stop().animate({ scrollLeft: newPosition }, 100, 'linear');
  });

});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Mobile: Touch overflow controller
$(document).on('mobileinit', function () {
  $.mobile.touchOverflowEnabled = true;
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Mobile: Touch controller
$(document).ready(function () {

  // Prevent default behavior for multi-touch events
  document.documentElement.addEventListener('touchstart', function (e) {
    if (e.touches.length > 1) e.preventDefault();
  }, false);

});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Menu: Toggle for submenu/settings
$(document).ready(function() {
	$(".settings-submenu").fadeOut();
	$(".toggle-settings").click(function() {
		$(".settings-submenu").fadeToggle(100);
		$(".patreon-submenu").fadeOut();
	});
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Menu: Toggle for mobile
$(document).ready(function() {
	$(".popup-mobilemenu").hide();
	$(".toggle-mobilemenu").click(function() {
		$(".popup-mobilemenu").fadeToggle(100);
		$(".mobile-menu-btn-darkmode").fadeToggle(100);
	});
	$(".popup-mobilemenu").hide();
	$(".popup-mobilemenu").click(function() {
		$(".popup-mobilemenu").fadeOut(100);
	});
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Menu: Toggle for discord advisory
$(document).ready(function() {
	$(".popup-discord").hide();
	$(".toggle-discord").click(function() {
		$(".popup-discord").fadeToggle(100);
	});
	$(".popup-discord").hide();
	$(".popup-discord").click(function() {
		$(".popup-discord").fadeOut(100);
	});
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Menu: Toggle for reddit advisory
$(document).ready(function() {
	$(".popup-reddit").hide();
	$(".toggle-reddit").click(function() {
		$(".popup-reddit").fadeToggle(100);
	});
	$(".popup-reddit").hide();
	$(".popup-reddit").click(function() {
		$(".popup-reddit").fadeOut(100);
	});
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Menu: Toggle for Quickstart and Blog side bars
$(document).ready(function() {
  // Hide all sidebars initially
  $(".toggle-navsidebar, .toggle-blogbar").hide();
  // Toggle navigation sidebar on click
  $(".nav-standard").on("click", function() {
    $(".toggle-navsidebar").fadeToggle(100);
  });
  // Hide navigation sidebar when clicked
  $(".toggle-navsidebar").on("click", function() {
    $(this).fadeOut(100);
  });
  // Toggle blog sidebar on click
  $(".nav-blog").on("click", function() {
    $(".toggle-blogbar").fadeToggle(100);
  });
  // Hide blog sidebar when clicked
  $(".toggle-blogbar").on("click", function() {
    $(this).fadeOut(100);
  });
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Index: Hero position scaling
$(document).ready(function () {
  const selectors = [
    '.scale-content-txt-1',
    '.scale-content-txt-2',
    '.scale-content-txt-3',
    '.scale-content-txt-4',
    '.scale-content-txt-5',
    '.scale-content-txt-6'
  ];

  // Vertically center each element
  function centerElements() {
    selectors.forEach(function (selector) {
      $(selector).css({
        position: 'absolute',
        top: '50%',
        'margin-top': -$(selector).height() / 2 // Divide element height by half
      });
    });
  }

  $(window).on('load resize', centerElements);
  setInterval(centerElements, 50); // Call every 50 milliseconds
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Index: Video carousel controls
$(document).ready(function () {
  const $carouselEls = $('.item, .video-tx1-description, .video-btn-play');

  // Apply left or right fade-in animation on carousel button click
  $('.content-btn-left').on('click', function () {
    $carouselEls.addClass('carousel-left').removeClass('carousel-right');
  });

  $('.content-btn-right').on('click', function () {
    $carouselEls.addClass('carousel-right').removeClass('carousel-left');
  });
});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Index: Video carousel viewport controller
$(document).ready(function () {
  const videos = [1, 2, 3];

  // Hide all video toggles on load
  videos.forEach(function (n) {
    $(`.toggle-video-${n}`).fadeOut();
  });

  videos.forEach(function (n) {
    // Show viewport flash on video page click
    $(`.page-video-${n}`).on('click', function () {
      $('.video-img-viewport').show().delay(500).fadeOut();

      // Open video panel
      $(`.toggle-video-${n}`).fadeIn('fast');

      // Load and autoplay video iframe
      const $iframe = $(`#video-${n}`);
      $iframe.attr('src', $iframe.data('src'));
    });
  });

  // Close all video panels and stop playback on close/stop
  $('.close-video, .stop-video').on('click', function () {
    videos.forEach(function (n) {
      $(`.toggle-video-${n}`).fadeOut('fast'); // Close video panel
      $(`#video-${n}`).attr('src', ''); // Clear src to stop playback
    });
  });

});
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Compatibility database search focusing
$(document).ready(function() {
  // Function to add focus effect to search bar
  function addFocusEffect() {
    $('.search-inp-search, #compat-con-searchbox').addClass('object-focused');
  }
  // Function to remove focus effect from search bar
  function removeFocusEffect() {
    $('.search-inp-search, #compat-con-searchbox').removeClass('object-focused');
  }
  // Attach focus event handler to the search bar
  $('.database-search').on('focus', addFocusEffect);
  // Attach blur event handler to the search bar
  $('.database-search').on('blur', removeFocusEffect);
});

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Function to generate array of image paths
$(document).ready(function() {
function generateImagePaths(count) {
    return Array.from({ length: count }, (_, i) => `/img/graphics/rpcn/games/game-${i + 1}.jpg`);
}

class ImageCycler {
    constructor(elementSelector, imageCount) {
        // Get the container element
        this.container = document.querySelector(elementSelector);
        
        // Create two image elements for cross-fading
        this.imageElements = [
            document.createElement('div'),
            document.createElement('div')
        ];
        
        // Set up the image elements
        this.imageElements.forEach(el => {
            el.style.position = 'absolute';
            el.style.top = '0';
            el.style.left = '0';
            el.style.width = '100%';
            el.style.height = '100%';
            el.style.backgroundSize = 'cover';
            el.style.backgroundPosition = 'center';
            el.style.transition = 'opacity 1s ease-in-out';
            this.container.appendChild(el);
        });
        
        // Make sure container has relative positioning
        this.container.style.position = 'relative';
        
        // Initialize state
        this.images = generateImagePaths(imageCount);
        this.unusedImages = [...this.images];
        this.currentIndex = 0; // Track which image element is currently visible
        this.isTransitioning = false;
        
        // Set initial random image
        this.setRandomImage();
    }
    
    async setRandomImage() {
        if (this.isTransitioning) return;
        this.isTransitioning = true;
        
        // Reset unused images if necessary
        if (this.unusedImages.length === 0) {
            this.unusedImages = [...this.images];
            if (this.currentImage) {
                const index = this.unusedImages.indexOf(this.currentImage);
                if (index > -1) {
                    this.unusedImages.splice(index, 1);
                }
            }
        }
        
        // Get next random image
        const randomIndex = Math.floor(Math.random() * this.unusedImages.length);
        const newImage = this.unusedImages[randomIndex];
        this.unusedImages.splice(randomIndex, 1);
        
        // Get references to current and next elements
        const currentEl = this.imageElements[this.currentIndex];
        const nextEl = this.imageElements[this.currentIndex === 0 ? 1 : 0];
        
        // Set up next image
        nextEl.style.backgroundImage = `url('${newImage}')`;
        nextEl.style.opacity = '0';
        
        // Force browser reflow
        void nextEl.offsetHeight;
        
        // Perform the cross-fade
        currentEl.style.opacity = '0';
        nextEl.style.opacity = '1';
        
        // Update state
        this.currentImage = newImage;
        this.currentIndex = this.currentIndex === 0 ? 1 : 0;
        
        // Wait for transition to complete
        await new Promise(resolve => setTimeout(resolve, 1000));
        this.isTransitioning = false;
    }
}

// Initialize the cycler when the DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.rpcn-playerbase-img-banner')) {
    // Add necessary CSS
    const style = document.createElement('style');
    style.textContent = `
        .rpcn-playerbase-img-banner {
            position: relative;
            overflow: hidden;
        }
    `;
    document.head.appendChild(style);
    
    const imageCycler = new ImageCycler('.rpcn-playerbase-img-banner', 20);
    
    // Change image every 10 seconds
    setInterval(() => {
        imageCycler.setRandomImage();
    }, 10000);
  }
});
});