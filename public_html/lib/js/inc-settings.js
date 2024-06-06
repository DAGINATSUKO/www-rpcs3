// Cookie Setting: Piracy notice popup
$(document).ready(function() {
  var piracyPolicyAgreed = Cookies.get("save-piracy-policy") === "true"; // Retrieve cookie value
  // Function to update the piracy policy state
  function updatePiracyPolicyState(agreed) {
    $('.mini-menu-btn-agree').toggleClass("activate-accept", agreed);
    $('.mini-menu-con-dimmer').toggleClass("object-show", !agreed).toggleClass("object-hidden", agreed);
  }
  // Initialize piracy policy state based on cookie value
  updatePiracyPolicyState(piracyPolicyAgreed);
  // Toggle piracy policy on click
  $('.mini-menu-btn-agree').on('click', function() {
    piracyPolicyAgreed = !piracyPolicyAgreed;
    updatePiracyPolicyState(piracyPolicyAgreed);
    Cookies.set("save-piracy-policy", piracyPolicyAgreed, { expires: 365, path: '/' }); // Save cookie
  });
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Cookie Setting: Text pulsate setting states
$(document).ready(function() {
  var pulsateEnabled = Cookies.get("save-pulsate") === "true"; // Retrieve cookie value
  // Function to update the pulsate state
  function updatePulsateState(enabled) {
    $('.toggle-pulsate').toggleClass("activate-pulsate", enabled);
    $('.pulsate').toggleClass("disable-pulsate", enabled);
    $('.btn-pulsate').text(enabled ? "Pulsate - Off" : "Pulsate - On");
  }
  // Initialize pulsate state based on cookie value
  updatePulsateState(pulsateEnabled);
  // Toggle pulsate on click
  $('.toggle-pulsate').on('click', function() {
    pulsateEnabled = !pulsateEnabled;
    updatePulsateState(pulsateEnabled);
    Cookies.set("save-pulsate", pulsateEnabled, { expires: 365, path: '/' }); // Save cookie
    location.reload(); // Reload on apply
  });
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Cookie Setting: GPU transparency
$(document).ready(function() {
  var transparencyEnabled = Cookies.get("save-transparency") === "true"; // Retrieve cookie value
  // Function to update the transparency state
  function updateTransparencyState(enabled) {
    $('.toggle-transparency').toggleClass("activate-transparency", enabled);
    $('.menu-con-container, .video-btn-play, .menu-tx1-message, .mobile-menu-con-container').toggleClass("disable-transparency", enabled);
    $('.btn-transparency').text(enabled ? "Transparency - Off" : "Transparency - On");
  }
  // Initialize transparency state based on cookie value
  updateTransparencyState(transparencyEnabled);
  // Toggle transparency on click
  $('.toggle-transparency').on('click', function() {
    transparencyEnabled = !transparencyEnabled;
    updateTransparencyState(transparencyEnabled);
    Cookies.set("save-transparency", transparencyEnabled, { expires: 365, path: '/' }); // Save cookie
    location.reload(); // Reload on apply
  });
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
$(document).ready(function() {
  var particlesEnabled = Cookies.get("save-particles") === "true"; // Retrieve cookie value
  // Function to update the particles state
  function updateParticlesState(enabled) {
    $('.toggle-particles').toggleClass("activate-particles", enabled);
    $('#object-particles').toggleClass("object-hidden", enabled);
    $('.btn-particles').text(enabled ? "Particles - Off" : "Particles - On");
  }
  // Initialize particles state based on cookie value
  updateParticlesState(particlesEnabled);
  // Toggle particles on click
  $('.toggle-particles').on('click', function() {
    particlesEnabled = !particlesEnabled;
    updateParticlesState(particlesEnabled);
    Cookies.set("save-particles", particlesEnabled, { expires: 365, path: '/' }); // Save cookie
    location.reload(); // Reload on apply
  });
});
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// Cookie Setting: GPU wavebar
$(document).ready(function() {
  var wavesEnabled = Cookies.get("save-waves") === "true"; // Retrieve cookie value
  // Function to update the waves state
  function updateWavesState(enabled) {
    $('.toggle-waves').toggleClass("activate-waves", enabled);
    $('.wavebar-con-wrap').toggleClass("object-hidden", enabled);
    $('.btn-waves').text(enabled ? "Waves - Off" : "Waves - On");
  }
  // Initialize waves state based on cookie value
  updateWavesState(wavesEnabled);
  // Toggle waves on click
  $('.toggle-waves').on('click', function() {
    wavesEnabled = !wavesEnabled;
    updateWavesState(wavesEnabled);
    Cookies.set("save-waves", wavesEnabled, { expires: 365, path: '/' }); // Save cookie
    location.reload(); // Reload on apply
  });
});