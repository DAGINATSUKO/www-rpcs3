// Global: Scroll to top controller
$(document).ready(function() {
  // Function to handle scroll event
  function handleScroll() {
    // Check if the user has scrolled more than 250 pixels
    if ($(window).scrollTop() > 250) {
      // Show the "Back to Top" button
      $('.menu-btn-backtotop').fadeIn();
    } else {
      // Hide the "Back to Top" button
      $('.menu-btn-backtotop').fadeOut();
    }
  }
  // Attach scroll event handler to the window
  $(window).on('scroll', handleScroll);
  // Function to handle click event on the "Back to Top" button
  function handleBackToTopClick(e) {
    e.preventDefault();
    // Animate the scroll to the top of the page
    $('html, body').animate({ scrollTop: 0 }, 400);
  }
  // Attach click event handler to the "Back to Top" button
  $('.menu-btn-backtotop').on('click', handleBackToTopClick);
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Global: scroll anchor controller
$(document).ready(function() {
  // Function to handle click event on anchor links
  function handleAnchorClick(e) {
    e.preventDefault();
    
    // Get the target element's ID from the href attribute
    var target = $(this).attr('href');
    
    // Animate the scroll to the target element with easing
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1500, 'easeInOutQuad'); // Scroll duration: 1500ms, easing: easeInOutQuad
  }
  // Attach click event handler to anchor links with the attribute 'rel="anchor-select"'
  $('a[rel="anchor-select"]').on('click', handleAnchorClick);
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Global: horizontal scroller controller
$(document).ready(function() {
  $.fn.hScroll = function(amount) {
    amount = amount || 200;
    $(this).bind("DOMMouseScroll mousewheel", function(event) {
      var oEvent = event.originalEvent,
          direction = oEvent.detail ? oEvent.detail * -amount : oEvent.wheelDelta,
          position = $(this).scrollLeft(),
          newPosition = position + (direction > 0 ? -amount : amount);
      
      // Check if the event is triggered by a touchpad
      if (oEvent.wheelDeltaY === undefined || oEvent.wheelDeltaY === 0) {
        return; // Skip scroll stepping for touchpad events
      }
      
      $(this).stop().animate({ scrollLeft: newPosition }, 200, 'linear');
      event.preventDefault();
    });
  };
  
  $('.gamepad-con-wrapper').on('wheel', function(e) {
    // Check if the event is triggered by a touchpad
    if (e.originalEvent.wheelDeltaY === undefined || e.originalEvent.wheelDeltaY === 0) {
      return; // Skip scroll stepping for touchpad events
    }
    
    e.preventDefault();
    var delta = e.originalEvent.deltaY * 3, // Multiplied by 3 to increase scroll distance
        currentPosition = $(this).scrollLeft(),
        newPosition = currentPosition + delta;
    $(this).stop().animate({ scrollLeft: newPosition }, 100, 'linear');
  });
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Mobile: Touch overflow controller
$(document).bind("mobileinit", function() {
	$.mobile.touchOverflowEnabled = true;
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Mobile: Touch controller
$(document).ready(function() {
  // Prevent default behavior for multi-touch events
  function handleTouchStart(event) {
    if (event.touches.length > 1) {
      event.preventDefault();
    }
  }
  // Attach touchstart event handler to the document element
  document.documentElement.addEventListener('touchstart', handleTouchStart, false);
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Menu: Toggle for submenu/settings
$(document).ready(function() {
	$(".settings-submenu").fadeOut();
	$(".toggle-settings").click(function() {
		$(".settings-submenu").fadeToggle(100);
		$(".patreon-submenu").fadeOut();
	});
	$(".settings-submenu").fadeOut();
	$(".settings-submenu").click(function() {
		$(".settings-submenu").fadeOut(100);
	});
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
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
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
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
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
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
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
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
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Index: Hero position scaling
$(window).on("load resize", function(e) {
// Function to vertically center elements
function centerElements() {
  // Array of element classes to center
  var elementClasses = [
    '.scale-content-txt-1',
    '.scale-content-txt-2',
    '.scale-content-txt-3',
    '.scale-content-txt-4',
    '.scale-content-txt-5',
    '.scale-content-txt-6'
  ];
  // Iterate over each element class and center it vertically
  elementClasses.forEach(function(elementClass) {
    $(elementClass).css({
      'position': 'absolute',
      'top': '50%',
      'margin-top': -$(elementClass).height() / 2 // Divide element height by half
    });
  });
}
// Call the centerElements function on window load and resize events
$(window).on("load resize", centerElements);
// Call the centerElements function every 50 milliseconds
setInterval(centerElements, 50);
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Index: Video carousel controls
$(document).ready(function() {
  // Function to apply left fade-in animation and remove right animation
  function applyLeftAnimation() {
    $('.item, .video-tx1-description, .video-btn-play').addClass('carousel-left').removeClass('carousel-right');
  }
  // Function to apply right fade-in animation and remove left animation
  function applyRightAnimation() {
    $('.item, .video-tx1-description, .video-btn-play').addClass('carousel-right').removeClass('carousel-left');
  }
  // Attach click event handler to the left content button
  $('.content-btn-left').on('click', applyLeftAnimation);
  // Attach click event handler to the right content button
  $('.content-btn-right').on('click', applyRightAnimation);
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Index: Video carousel viewport controller
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
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
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

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Function to generate array of image paths
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
});