$(document).ready(function() {
  // Piracy notice popup - keeping this separately to ensure it works exactly as before
  var piracyPolicyAgreed = Cookies.get("save-piracy-policy") === "true";
  
  function updatePiracyPolicyState(agreed) {
    $('.mini-menu-btn-agree').toggleClass("activate-accept", agreed);
    $('.mini-menu-con-dimmer').toggleClass("object-show", !agreed).toggleClass("object-hidden", agreed);
  }
  
  updatePiracyPolicyState(piracyPolicyAgreed);
  
  $('.mini-menu-btn-agree').on('click', function() {
    piracyPolicyAgreed = !piracyPolicyAgreed;
    updatePiracyPolicyState(piracyPolicyAgreed);
    Cookies.set("save-piracy-policy", piracyPolicyAgreed, { expires: 365, path: '/' });
  });
  
 /*
  // Inform notice popup - keeping this separately to ensure it works exactly as before
var informPolicyAgreed = Cookies.get("save-inform-policy") === "true";

function updateInformPolicyState(agreed) {
  $('.menu-btn-inform-close').toggleClass("activate-accept", agreed);
  $('.menu-con-inform').toggleClass("object-show", !agreed).toggleClass("object-hidden", agreed);
  
  // Force display block when showing, none when hiding
  if (!agreed) {
    $('.menu-con-inform').css('display', 'block');
  } else {
    $('.menu-con-inform').css('display', 'none');
  }
}
*/

// Force display block on initial load if not agreed
if (!informPolicyAgreed) {
  $('.menu-con-inform').css('display', 'block');
}

updateInformPolicyState(informPolicyAgreed);

$('.menu-btn-inform-close').on('click', function() {
  informPolicyAgreed = !informPolicyAgreed;
  updateInformPolicyState(informPolicyAgreed);
  Cookies.set("save-inform-policy", informPolicyAgreed, { expires: 365, path: '/' });
});

  // Configuration for other toggle features
  const features = [
    {
      name: 'pulsate',
      selector: '.toggle-pulsate',
      activeClass: 'activate-pulsate',
      toggleElements: [{
        selector: '.pulsate',
        hideClass: 'disable-pulsate'
      }],
      buttonTextSelector: '.btn-pulsate',
      onText: 'Pulsate Off',
      offText: 'Pulsate On'
    },
    {
      name: 'transparency',
      selector: '.toggle-transparency',
      activeClass: 'activate-transparency',
      toggleElements: [{
        selector: '.menu-con-container, .video-btn-play, .menu-tx1-message, .mobile-menu-con-container',
        hideClass: 'disable-transparency'
      }],
      buttonTextSelector: '.btn-transparency',
      onText: 'Gaussian Off',
      offText: 'Gaussian On'
    },
    {
      name: 'particles',
      selector: '.toggle-particles',
      activeClass: 'activate-particles',
      toggleElements: [{
        selector: '#object-particles',
        hideClass: 'object-hidden'
      }],
      buttonTextSelector: '.btn-particles',
      onText: 'Particles Off',
      offText: 'Particles On'
    },
    {
      name: 'waves',
      selector: '.toggle-waves',
      activeClass: 'activate-waves',
      toggleElements: [{
        selector: '.wavebar-con-wrap',
        hideClass: 'object-hidden'
      }],
      buttonTextSelector: '.btn-waves',
      onText: 'Waves Off',
      offText: 'Waves On'
    }
  ];

  // Initialize and set up event handlers for all features
  features.forEach(feature => {
    const cookieName = `save-${feature.name}`;
    let isEnabled = Cookies.get(cookieName) === "true";
    
    // Function to update the feature state
    function updateState(enabled) {
      // Toggle active class on the control element
      $(feature.selector).toggleClass(feature.activeClass, enabled);
      
      // Toggle classes on elements
      feature.toggleElements.forEach(element => {
        $(element.selector).toggleClass(element.hideClass, enabled);
      });
      
      // Update button text if applicable
      if (feature.buttonTextSelector) {
        $(feature.buttonTextSelector).text(enabled ? feature.onText : feature.offText);
      }
    }
    
    // Initialize state based on cookie value
    updateState(isEnabled);
    
    // Set up click handler
    $(feature.selector).on('click', function() {
      isEnabled = !isEnabled;
      updateState(isEnabled);
      Cookies.set(cookieName, isEnabled, { expires: 365, path: '/' });
    });
  });
});