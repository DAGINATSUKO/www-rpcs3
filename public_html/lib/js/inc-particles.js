// Handles Particles.js simulation
$(document).ready(function () {
  const config = {
    particles: {
      number: {
        value: 32, // Number of particles to display
        density: {
          enable: true, // Enable density-based particle distribution
          value_area: 768 // Area density (particles per square unit)
        }
      },
      color: {
        value: '#fff' // Particle color (white)
      },
      shape: {
        type: 'circle' // Particle shape
      },
      opacity: {
        value: 1, // Initial opacity value
        random: true, // Randomize opacity values
        anim: {
          enable: true, // Enable opacity animation
          speed: 1, // Animation speed
          opacity_min: 0, // Minimum opacity value
          sync: false // Synchronize animation
        }
      },
      size: {
        value: 6, // Base particle size
        random: true, // Randomize particle sizes
        anim: {
          enable: true, // Enable size animation
          speed: 4, // Animation speed
          size_min: 0.1, // Minimum size value
          sync: false // Synchronize animation
        }
      },
      line_linked: {
        enable: false // Disable connections between particles
      },
      move: {
        enable: true, // Enable particle movement
        speed: 1, // Movement speed
        out_mode: 'out' // Behavior when particles leave canvas
      }
    },
    interactivity: {
      detect_on: 'canvas', // Detect interactions on canvas
      events: {
        onhover: { enable: false }, // Disable hover effects
        onclick: { enable: false }, // Disable click effects
        resize: true // Enable resize detection
      },
      modes: {
        push: { particles_nb: 4 }, // Number of particles to push
        remove: { particles_nb: 2 } // Number of particles to remove
      }
    },
    retina_detect: true // Enable retina display support
  };

  function initParticles() {
    // Initialize particles.js with the specified container and options
    particlesJS('object-particles', config);
  }

  function refreshParticles() {
    pJSDom[0].pJS.fn.vendors.destroypJS(); // Destroy existing particles.js instance
    pJSDom = []; // Clear the pJSDom array
    initParticles(); // Reinitialize particles
  }

  initParticles(); // Initialize particles on document ready
  $(window).on('resize', refreshParticles); // Refresh particles on window resize
});