//Global Variabls 
var windowHeight = jQuery(window).height();
var windowWidth = jQuery(window).width();



/*----------------------------- Dynamic Height Banner --------------------------*/
if(windowHeight>=640){
  jQuery('#top-section').css({'height':windowHeight});
}
if (windowHeight<768){
  jQuery('#top-section').addClass('small-height');
}






/*----------------------------- Menu clicked animation on window --------------------------*/
jQuery(function($) {
  "use strict";
  $('#headernavigation li a[href^="#"]').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});



/*----------------------------- Navigation --------------------------*/
var topSecHeight = jQuery ('#top-section').height(); 

jQuery(window).on('scroll', function (){
  "use strict";

    var currentWindowWidth = jQuery(window).width();
    // main menu 
      if (jQuery(this).scrollTop() > topSecHeight ){
        jQuery('.home #main-menu').addClass('navbar-fixed-top');
      } else {
        jQuery('.home #main-menu').removeClass('navbar-fixed-top');
      } 

   
    // Scroll to top
    if (jQuery(this).scrollTop() > 80) {
      jQuery('#scroll-to-top').fadeIn('slow');
    } else {
      jQuery('#scroll-to-top').fadeOut('slow');
    }


    // Single page Nav
    if (jQuery(this).scrollTop() > 400) {
      jQuery('.post-navigation .nav-links').fadeIn('slow');
    } else {
      jQuery('.post-navigation .nav-links').fadeOut('slow');
    }

  });

  // menu toggle
  jQuery( "ul.sub-menu").parent().append("<span class='toggle_nav_button'>+</span>");
  jQuery(".toggle_nav_button").click(
    function(){
      var link = jQuery(this);
      jQuery(this).parent().find("ul.sub-menu").slideToggle('fast', function(){
        if (jQuery(this).is(':visible')){
          link.text('-');
        } else {
          link.text('+');
        }
      });
    });


jQuery(document).ready(function($) {
  "use strict";


 
  /*------------------- Scroll to Feature Section ---------------*/
  var  nextSection = jQuery('#next-section').data('next-sec-id');
  jQuery('#next-section').click(function() {
    jQuery('html,body').animate({scrollTop:jQuery(nextSection).offset().top + 5}, 1000);
  });



  /*------------- Scroll to Top -----------------*/
  $('#scroll-to-top').click(function(){
    $("html,body").animate({ scrollTop: 0 }, 1000);
    return false;
  });



  /*--------------------- call boxer lighbox  --------------------*/
  jQuery(".boxer").boxer();


  /*--------------------- Call FitVids --------------------*/ 
  jQuery(".video-container").fitVids(); 


  /*-------------------------  Parallax Style  --------------------------*/
	jQuery("#top-section").parallax("50%", 0.25);
	jQuery("#team").parallax("50%", 0.25);
  jQuery("#features").parallax("50%", 0.25);
  jQuery("#clients").parallax("50%", 0.25);
  //jQuery("#watch-video").parallax("50%", 0.25);
  jQuery("#blog-head").parallax("50%", 0.25); 
  jQuery("#social-buttons").parallax("50%", 0.25); 

/*-------------------------------- Parallax ---------------------------------------*/
    jQuery(document).ready(function(){
       "use strict";

      jQuery('#watch-video[data-type="background"]').each(function(){
        var $bgobj = jQuery(this); // assigning the object

        jQuery(window).scroll(function() {
          var $window = jQuery(window);
          var yPos = -($window.scrollTop() / $bgobj.data('speed')); 

            // Put together our final background position
            var coords = '50% '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });
          }); 
      });    
    });


/*------------------------- Pricing Slider -------------------------*/
var priceSlider = jQuery("#pricing-slider");

priceSlider.owlCarousel({
  autoPlay : 3000,
  stopOnHover : true,
  pagination : true,
  paginationNumbers: false,

  itemsCustom : [
  [0, 1],
  [450, 1],
  [600, 1],
  [700, 2],
  [1000, 3],
  [1200, 4],
  ],
        // Responsive 
        responsive: true,
        responsiveRefreshRate : 200,
        responsiveBaseWidth: window
});





/*------------------------- Welcome Slider -------------------------*/
var featureSlider = jQuery("#feature-slider");

featureSlider.owlCarousel({
  autoPlay : 3000,
  stopOnHover : true,
  pagination : true,
  paginationNumbers: false,

  itemsCustom : [
  [0, 1],
  [450, 1],
  [600, 1],
  [700, 2],
  [1000, 3],
  [1200, 3],
  ],
        // Responsive 
        responsive: true,
        responsiveRefreshRate : 200,
        responsiveBaseWidth: window
});




/*------------------------- Team Member Slider -------------------------*/
var teamSlider = jQuery("#team-slider");

teamSlider.owlCarousel({
	autoPlay : 3000,
	stopOnHover : true,
	pagination : true,
	paginationNumbers: false,

	itemsCustom : [
	[0, 1],
	[450, 1],
	[600, 1],
	[700, 2],
	[1000, 3],
	[1200, 4],
	],
        // Responsive 
        responsive: true,
        responsiveRefreshRate : 200,
        responsiveBaseWidth: window
});


  /*------------------------------ Counter ----------------------------*/
  jQuery('.counter').counterUp({
    delay: 10,
    time: 1000
  });


  /*------------  Progress bar  ---------------*/
  jQuery( '.progress-bar' ).each(function() { 
    var  barWidth = jQuery(this).data('progress-value');
    jQuery(this).css({
      'width': barWidth
    });
  });

/*----------- wow animation ----------------*/
var wow = new WOW(
{
  boxClass:     'wow',      // animated element css class (default is wow)
  animateClass: 'animated', // animation css class (default is animated)
  offset:       0,          // distance to the element when triggering the animation (default is 0)
  mobile:       false       // trigger animations on mobile devices (true is default)
});
wow.init();




  /*----------- Circular Progress Bars  ----------------*/
  // IE9 Fix Animation
  window.requestAnimationFrame||(window.requestAnimationFrame=function(){return window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(n){window.setTimeout(n,1e3/60)}}());
  // Run Circular
  jQuery('.skill-item').circliful();
  jQuery('.circle-text:contains(%)').each(function(){
    jQuery(this).html(
      jQuery(this).html().replace('%','<span class=\'percent\'>%</span>')
      );
  });



});
//Document Ready Close





/*-------------------------- Portfolio Item Filter -----------------------*/


/*-------------------------- Isotop -----------------------*/

  jQuery(window).on("load resize",function(e){
    "use strict"
    var $container = $('#portfolio-item'),
    colWidth = function () {
      var w = $container.width(), 
      columnNum = 1,
      columnWidth = 0;
      if (w > 1366)     { columnNum  = 5; }  
      else if (w > 1150) { columnNum  = 4; }  
      else if (w > 900) { columnNum  = 3; }  
      else if (w > 480) { columnNum  = 2; }
      columnWidth = Math.floor(w/columnNum);

      //Isotop Version 1
      var $containerV1 = $('#portfolio-item');
      $containerV1.find('.item').each(function() {
        var $item = $(this), 
        width = columnWidth,
        height = columnWidth*.8-10;
        $item.css({ width: width, height: height });
      });  


      //Isotop Version 2
      var $containerV2 = $('.isotope.v2');
      $containerV2.find('.item').each(function() {
        var $item = $(this), 
        width = columnWidth,
        height = columnWidth;
        $item.css({ width: width, height: height });
      });  

      $containerV2.find('.width2').each(function() {
        var $item = $(this), 
        width = columnWidth*2,
        height = columnWidth;
        $item.css({ width: width, height: height });
      }); 

      $containerV2.find('.height2').each(function() {
        var $item = $(this), 
        width = columnWidth,
        height = columnWidth*2;
        $item.css({ width: width, height: height });
      }); 

      $containerV2.find('.width2.height2').each(function() {
        var $item = $(this), 
        width = columnWidth*2,
        height = columnWidth*2;
        $item.css({ width: width, height: height });
      }); 

      //end v2

      //Isotop Version Grid
      var $containerV3 = $('.isotope.grid');
      $containerV3.find('.item').each(function() {
        var $item = $(this), 
        width = columnWidth*.96,
        height = columnWidth*.75;
        $item.css({ width: width, height: height });
      }); 


      //Isotop Version 4
      var $containerV4 = $('.isotope.v4');
      $containerV4.find('.item').each(function() {
        var $item = $(this), 
        width = columnWidth*.96,
        height = columnWidth*1.45;
        $item.css({ width: width, height: height });
      }); 


      return columnWidth;
    },
    isotope = function () {
      $container.isotope({
        resizable: true,
        itemSelector: '.item',
        masonry: {
          columnWidth: colWidth(),
          gutterWidth: 10
        }
      });
    };
    isotope();



    var $container = $('#portfolio-item')
    // bind filter button click
    $('.portfolioFilter').on( 'click', 'button', function() {
      $('.portfolioFilter .current').removeClass('current');
      $(this).addClass('current');
      var filterValue = $( this ).attr('data-filter');
      $container.isotope({ filter: filterValue });
    });

  });
  // Isotop End 

//  Run Nice Scroll
// $(document).ready(function() {  
//   $("html").niceScroll({
//     scrollspeed: 30,
//     mousescrollstep: 70,
//     cursorwidth: 10,
//     zindex: 9999,
//     cursorborderradius: 2,
//     hwacceleration: true,
//     cursorborder: "1px solid transparent",
//     background: "#FFF",
//   });
// });



// SmoothScroll for websites v1.2.1
// Licensed under the terms of the MIT license.

// People involved
//  - Balazs Galambosi (maintainer)  
//  - Michael Herf     (Pulse Algorithm)

(function(){
  
// Scroll Variables (tweakable)
var defaultOptions = {

    // Scrolling Core
    frameRate        : 150, // [Hz]
    animationTime    : 400, // [px]
    stepSize         : 120, // [px]

    // Pulse (less tweakable)
    // ratio of "tail" to "acceleration"
    pulseAlgorithm   : true,
    pulseScale       : 8,
    pulseNormalize   : 1,

    // Acceleration
    accelerationDelta : 20,  // 20
    accelerationMax   : 1,   // 1

    // Keyboard Settings
    keyboardSupport   : true,  // option
    arrowScroll       : 50,     // [px]

    // Other
    touchpadSupport   : true,
    fixedBackground   : true, 
    excluded          : ""    
};

var options = defaultOptions;


// Other Variables
var isExcluded = false;
var isFrame = false;
var direction = { x: 0, y: 0 };
var initDone  = false;
var root = document.documentElement;
var activeElement;
var observer;
var deltaBuffer = [ 120, 120, 120 ];

var key = { left: 37, up: 38, right: 39, down: 40, spacebar: 32, 
            pageup: 33, pagedown: 34, end: 35, home: 36 };


/***********************************************
 * SETTINGS
 ***********************************************/

var options = defaultOptions;


/***********************************************
 * INITIALIZE
 ***********************************************/

/**
 * Tests if smooth scrolling is allowed. Shuts down everything if not.
 */
function initTest() {

    var disableKeyboard = false; 
    
    // disable keyboard support if anything above requested it
    if (disableKeyboard) {
        removeEvent("keydown", keydown);
    }

    if (options.keyboardSupport && !disableKeyboard) {
        addEvent("keydown", keydown);
    }
}

/**
 * Sets up scrolls array, determines if frames are involved.
 */
function init() {
  
    if (!document.body) return;

    var body = document.body;
    var html = document.documentElement;
    var windowHeight = window.innerHeight; 
    var scrollHeight = body.scrollHeight;
    
    // check compat mode for root element
    root = (document.compatMode.indexOf('CSS') >= 0) ? html : body;
    activeElement = body;
    
    initTest();
    initDone = true;

    // Checks if this script is running in a frame
    if (top != self) {
        isFrame = true;
    }

    /**
     * This fixes a bug where the areas left and right to 
     * the content does not trigger the onmousewheel event
     * on some pages. e.g.: html, body { height: 100% }
     */
    else if (scrollHeight > windowHeight &&
            (body.offsetHeight <= windowHeight || 
             html.offsetHeight <= windowHeight)) {

        // DOMChange (throttle): fix height
        var pending = false;
        var refresh = function () {
            if (!pending && html.scrollHeight != document.height) {
                pending = true; // add a new pending action
                setTimeout(function () {
                    html.style.height = document.height + 'px';
                    pending = false;
                }, 500); // act rarely to stay fast
            }
        };
        html.style.height = 'auto';
        setTimeout(refresh, 10);

        // clearfix
        if (root.offsetHeight <= windowHeight) {
            var underlay = document.createElement("div");   
            underlay.style.clear = "both";
            body.appendChild(underlay);
        }
    }

    // disable fixed background
    if (!options.fixedBackground && !isExcluded) {
        body.style.backgroundAttachment = "scroll";
        html.style.backgroundAttachment = "scroll";
    }
}


/************************************************
 * SCROLLING 
 ************************************************/
 
var que = [];
var pending = false;
var lastScroll = +new Date;

/**
 * Pushes scroll actions to the scrolling queue.
 */
function scrollArray(elem, left, top, delay) {
    
    delay || (delay = 1000);
    directionCheck(left, top);

    if (options.accelerationMax != 1) {
        var now = +new Date;
        var elapsed = now - lastScroll;
        if (elapsed < options.accelerationDelta) {
            var factor = (1 + (30 / elapsed)) / 2;
            if (factor > 1) {
                factor = Math.min(factor, options.accelerationMax);
                left *= factor;
                top  *= factor;
            }
        }
        lastScroll = +new Date;
    }          
    
    // push a scroll command
    que.push({
        x: left, 
        y: top, 
        lastX: (left < 0) ? 0.99 : -0.99,
        lastY: (top  < 0) ? 0.99 : -0.99, 
        start: +new Date
    });
        
    // don't act if there's a pending queue
    if (pending) {
        return;
    }  

    var scrollWindow = (elem === document.body);
    
    var step = function (time) {
        
        var now = +new Date;
        var scrollX = 0;
        var scrollY = 0; 
    
        for (var i = 0; i < que.length; i++) {
            
            var item = que[i];
            var elapsed  = now - item.start;
            var finished = (elapsed >= options.animationTime);
            
            // scroll position: [0, 1]
            var position = (finished) ? 1 : elapsed / options.animationTime;
            
            // easing [optional]
            if (options.pulseAlgorithm) {
                position = pulse(position);
            }
            
            // only need the difference
            var x = (item.x * position - item.lastX) >> 0;
            var y = (item.y * position - item.lastY) >> 0;
            
            // add this to the total scrolling
            scrollX += x;
            scrollY += y;            
            
            // update last values
            item.lastX += x;
            item.lastY += y;
        
            // delete and step back if it's over
            if (finished) {
                que.splice(i, 1); i--;
            }           
        }

        // scroll left and top
        if (scrollWindow) {
            window.scrollBy(scrollX, scrollY);
        } 
        else {
            if (scrollX) elem.scrollLeft += scrollX;
            if (scrollY) elem.scrollTop  += scrollY;                    
        }
        
        // clean up if there's nothing left to do
        if (!left && !top) {
            que = [];
        }
        
        if (que.length) { 
            requestFrame(step, elem, (delay / options.frameRate + 1)); 
        } else { 
            pending = false;
        }
    };
    
    // start a new queue of actions
    requestFrame(step, elem, 0);
    pending = true;
}


/***********************************************
 * EVENTS
 ***********************************************/

/**
 * Mouse wheel handler.
 * @param {Object} event
 */
function wheel(event) {

    if (!initDone) {
        init();
    }
    
    var target = event.target;
    var overflowing = overflowingAncestor(target);
    
    // use default if there's no overflowing
    // element or default action is prevented    
    if (!overflowing || event.defaultPrevented ||
        isNodeName(activeElement, "embed") ||
       (isNodeName(target, "embed") && /\.pdf/i.test(target.src))) {
        return true;
    }

    var deltaX = event.wheelDeltaX || 0;
    var deltaY = event.wheelDeltaY || 0;
    
    // use wheelDelta if deltaX/Y is not available
    if (!deltaX && !deltaY) {
        deltaY = event.wheelDelta || 0;
    }

    // check if it's a touchpad scroll that should be ignored
    if (!options.touchpadSupport && isTouchpad(deltaY)) {
        return true;
    }

    // scale by step size
    // delta is 120 most of the time
    // synaptics seems to send 1 sometimes
    if (Math.abs(deltaX) > 1.2) {
        deltaX *= options.stepSize / 120;
    }
    if (Math.abs(deltaY) > 1.2) {
        deltaY *= options.stepSize / 120;
    }
    
    scrollArray(overflowing, -deltaX, -deltaY);
    event.preventDefault();
}

/**
 * Keydown event handler.
 * @param {Object} event
 */
function keydown(event) {

    var target   = event.target;
    var modifier = event.ctrlKey || event.altKey || event.metaKey || 
                  (event.shiftKey && event.keyCode !== key.spacebar);
    
    // do nothing if user is editing text
    // or using a modifier key (except shift)
    // or in a dropdown
    if ( /input|textarea|select|embed/i.test(target.nodeName) ||
         target.isContentEditable || 
         event.defaultPrevented   ||
         modifier ) {
      return true;
    }
    // spacebar should trigger button press
    if (isNodeName(target, "button") &&
        event.keyCode === key.spacebar) {
      return true;
    }
    
    var shift, x = 0, y = 0;
    var elem = overflowingAncestor(activeElement);
    var clientHeight = elem.clientHeight;

    if (elem == document.body) {
        clientHeight = window.innerHeight;
    }

    switch (event.keyCode) {
        case key.up:
            y = -options.arrowScroll;
            break;
        case key.down:
            y = options.arrowScroll;
            break;         
        case key.spacebar: // (+ shift)
            shift = event.shiftKey ? 1 : -1;
            y = -shift * clientHeight * 0.9;
            break;
        case key.pageup:
            y = -clientHeight * 0.9;
            break;
        case key.pagedown:
            y = clientHeight * 0.9;
            break;
        case key.home:
            y = -elem.scrollTop;
            break;
        case key.end:
            var damt = elem.scrollHeight - elem.scrollTop - clientHeight;
            y = (damt > 0) ? damt+10 : 0;
            break;
        case key.left:
            x = -options.arrowScroll;
            break;
        case key.right:
            x = options.arrowScroll;
            break;            
        default:
            return true; // a key we don't care about
    }

    scrollArray(elem, x, y);
    event.preventDefault();
}

/**
 * Mousedown event only for updating activeElement
 */
function mousedown(event) {
    activeElement = event.target;
}


/***********************************************
 * OVERFLOW
 ***********************************************/
 
var cache = {}; // cleared out every once in while
setInterval(function () { cache = {}; }, 10 * 1000);

var uniqueID = (function () {
    var i = 0;
    return function (el) {
        return el.uniqueID || (el.uniqueID = i++);
    };
})();

function setCache(elems, overflowing) {
    for (var i = elems.length; i--;)
        cache[uniqueID(elems[i])] = overflowing;
    return overflowing;
}

function overflowingAncestor(el) {
    var elems = [];
    var rootScrollHeight = root.scrollHeight;
    do {
        var cached = cache[uniqueID(el)];
        if (cached) {
            return setCache(elems, cached);
        }
        elems.push(el);
        if (rootScrollHeight === el.scrollHeight) {
            if (!isFrame || root.clientHeight + 10 < rootScrollHeight) {
                return setCache(elems, document.body); // scrolling root in WebKit
            }
        } else if (el.clientHeight + 10 < el.scrollHeight) {
            overflow = getComputedStyle(el, "").getPropertyValue("overflow-y");
            if (overflow === "scroll" || overflow === "auto") {
                return setCache(elems, el);
            }
        }
    } while (el = el.parentNode);
}


/***********************************************
 * HELPERS
 ***********************************************/

function addEvent(type, fn, bubble) {
    window.addEventListener(type, fn, (bubble||false));
}

function removeEvent(type, fn, bubble) {
    window.removeEventListener(type, fn, (bubble||false));  
}

function isNodeName(el, tag) {
    return (el.nodeName||"").toLowerCase() === tag.toLowerCase();
}

function directionCheck(x, y) {
    x = (x > 0) ? 1 : -1;
    y = (y > 0) ? 1 : -1;
    if (direction.x !== x || direction.y !== y) {
        direction.x = x;
        direction.y = y;
        que = [];
        lastScroll = 0;
    }
}

var deltaBufferTimer;

function isTouchpad(deltaY) {
    if (!deltaY) return;
    deltaY = Math.abs(deltaY)
    deltaBuffer.push(deltaY);
    deltaBuffer.shift();
    clearTimeout(deltaBufferTimer);
    var allDivisable = (isDivisible(deltaBuffer[0], 120) &&
                        isDivisible(deltaBuffer[1], 120) &&
                        isDivisible(deltaBuffer[2], 120));
    return !allDivisable;
} 

function isDivisible(n, divisor) {
    return (Math.floor(n / divisor) == n / divisor);
}

var requestFrame = (function () {
      return  window.requestAnimationFrame       || 
              window.webkitRequestAnimationFrame || 
              function (callback, element, delay) {
                  window.setTimeout(callback, delay || (1000/60));
              };
})();


/***********************************************
 * PULSE
 ***********************************************/
 
/**
 * Viscous fluid with a pulse for part and decay for the rest.
 * - Applies a fixed force over an interval (a damped acceleration), and
 * - Lets the exponential bleed away the velocity over a longer interval
 * - Michael Herf, http://stereopsis.com/stopping/
 */
function pulse_(x) {
    var val, start, expx;
    // test
    x = x * options.pulseScale;
    if (x < 1) { // acceleartion
        val = x - (1 - Math.exp(-x));
    } else {     // tail
        // the previous animation ended here:
        start = Math.exp(-1);
        // simple viscous drag
        x -= 1;
        expx = 1 - Math.exp(-x);
        val = start + (expx * (1 - start));
    }
    return val * options.pulseNormalize;
}

function pulse(x) {
    if (x >= 1) return 1;
    if (x <= 0) return 0;

    if (options.pulseNormalize == 1) {
        options.pulseNormalize /= pulse_(1);
    }
    return pulse_(x);
}

var isChrome = /chrome/i.test(window.navigator.userAgent);
var wheelEvent = null;
if ("onwheel" in document.createElement("div"))
  wheelEvent = "wheel";
else if ("onmousewheel" in document.createElement("div"))
  wheelEvent = "mousewheel";

if (wheelEvent && isChrome) {
  addEvent(wheelEvent, wheel);
  addEvent("mousedown", mousedown);
  addEvent("load", init);
}

})();