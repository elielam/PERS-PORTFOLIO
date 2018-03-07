
/* NAVBAR */


/* NAVBTNS */
//navbar
$('#home-navbar-btn').click(function(){
    $('#home-navbar-col').slideToggle( "slow");
    return false;
});

//navigation
$(document).ready(function(){
    jQuery(function($) {

        var $topBtn = $('#page-top-btn');
        var $plusBtn = $('#page-plus-btn');
        var $minusBtn = $('#page-minus-btn');
        var $win = $(window);
        var winH = $win.height();   // Get the window height.

        $win.on("scroll", function () {
            if ($(this).scrollTop() > winH-5 ) {
                $topBtn.fadeIn();
            } else {
                $topBtn.fadeOut();
            }
        }).on("resize", function(){ // If the user resizes the window
            winH = $(this).height(); // you'll need the new height value
        });
    });

    $('#page-top-btn').click(function(){
        $('html, body').animate({scrollTop : 0},400);
        return false;
    });

    $('#page-plus-btn').click(function(){
        $('html, body').animate({scrollTop : window.pageYOffset - $(window).height()},400);
        $('#page-plus-btn').fadeOut(300);
        $('#page-plus-btn').fadeIn(800);
        return false;
    });

    $('#page-minus-btn').click(function(){
        $('html, body').animate({scrollTop : window.pageYOffset + $(window).height()},400);
        $('#page-minus-btn').fadeOut(300);
        $('#page-minus-btn').fadeIn(800);
        return false;
    });
});

//menuToSection
$('a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });

/* HEADER */
//txtRotate
var TxtRotate = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtRotate.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 300 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function() {
        that.tick();
    }, delta);
};

window.onload = function() {
    var elementsheader = document.getElementsByClassName('title-header-rotate');
    for (var iheader=0; iheader<elementsheader.length; iheader++) {
        var toRotateheader = elementsheader[iheader].getAttribute('data-rotate');
        var periodheader = elementsheader[iheader].getAttribute('data-period');
        if (toRotateheader) {
            new TxtRotate(elementsheader[iheader], JSON.parse(toRotateheader), periodheader);
        }
    }

    var cssheader = document.createElement("style");
    cssheader.type = "text/css";
    cssheader.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
    document.body.appendChild(cssheader);

    var elements = document.getElementsByClassName('title-service-rotate');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-rotate');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtRotate(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
    document.body.appendChild(css);
};

//particleJS
particlesJS('header-col',
    {
        "particles": {
            "number": {
                "value": 100,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 5,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
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
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true,
        "config_demo": {
            "hide_card": false,
            "background_color": "#b61924",
            "background_image": "",
            "background_position": "50% 50%",
            "background_repeat": "no-repeat",
            "background_size": "cover"
        }
    }
);

//goToFirstNavBtn
$('#fist-componentNav-btn').click(function(){
    $('html, body').animate({scrollTop : window.pageYOffset + $(window).height()},800);
    return false;
});



