/* Handles Particles.js simulation*/
$(document).ready(function() {
    $(function() {
        particlesJS("particles-js-1", {
            "particles": {
                "number": {
                    "value": 32,
                    "density": {
                        "enable": true,
                        "value_area": 1024
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
                        "nb_sides": 5
                    },
                    "image": {
                        "src": " ",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 1,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 200,
                    "color": "#fff",
                    "opacity": .5,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 10,
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
                    "resize": false
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
        });
        var update;
        update = function() {
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {}
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    });
});