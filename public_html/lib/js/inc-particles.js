// Handles Particles.js simulation
$(document).ready(function() {
  var particlesJS = window.particlesJS;
  var particlesContainer = "object-particles";
  var particlesOptions = {
    "particles": {
      "number": {
        "value": 32,
        "density": {
          "enable": true,
          "value_area": 768
        }
      },
      "color": {
        "value": "#fff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#fff"
        },
        "polygon": {
          "nb_sides": 3
        },
        "image": {
          "src": " ",
          "width": 100,
          "height": 100
        }
      },
      "opacity": {
        "value": 1,
        "random": true,
        "anim": {
          "enable": true,
          "speed": 1,
          "opacity_min": 0,
          "sync": false
        }
      },
      "size": {
        "value": 6,
        "random": true,
        "anim": {
          "enable": true,
          "speed": 4,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": false,
        "distance": 200,
        "color": "#fff",
        "opacity": 0.5,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 1,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 1200,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": false,
          "mode": "grab"
        },
        "onclick": {
          "enable": false,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 400,
          "line_linked": {
            "opacity": 1
          }
        },
        "grab": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 4,
          "speed": 3
        },
        "grab": {
          "distance": 200,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true
  };

  // Initialize particles
  function initParticles() {
    particlesJS(particlesContainer, particlesOptions);
  }

  // Refresh particles on window resize
  function refreshParticles() {
    pJSDom[0].pJS.fn.vendors.destroypJS();
    pJSDom = [];
    initParticles();
  }

  // Initialize particles on document ready
  initParticles();

  // Refresh particles on window resize
  $(window).on('resize', refreshParticles);
});