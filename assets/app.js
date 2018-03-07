// ### POPPER JS 
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

// ### VENDORS
import 'bootstrap';
import './fontawesome-free-5.0.6/js/fontawesome-all';
import 'particles.js';

// ### SCSS
require('./app.scss');

// ### COMPONENTS
require('./js/portfolio');
require('./js/security');
require('./js/dashboard');

// ### PARTICLES JS LOAD
particlesJS.load('particles-js', '~node_modules/particle.js/demo/particles.json', function() {
    console.log('callback - particles.js config loaded');
});

