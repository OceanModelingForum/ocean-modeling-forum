(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

require('./modules/menu');
require('./modules/banner');
require('./modules/scroller').init();
require('./modules/bios');

},{"./modules/banner":2,"./modules/bios":3,"./modules/menu":4,"./modules/scroller":5}],2:[function(require,module,exports){

var getStyleProperty = require('desandro-get-style-property');
//var raf = require('requestanimationframe');

var transitionProp = getStyleProperty('transition');
var transitionEndEvent = {
    WebkitTransition: 'webkitTransitionEnd',
    MozTransition: 'transitionend',
    OTransition: 'otransitionend',
    transition: 'transitionend'
}[transitionProp];

var Banner = function() {
    //this.scroller();
    //this.init();
};

Banner.prototype = {
    $el: $('.Banner'),
    scrollTop: $(window).scrollTop()
};

Banner.prototype.init = function() {

    this.$el.outerHeight($(window).height());

};

Banner.prototype.scroller = function() {

    var _this = this;

    function onScroll() {
        _this.scrollTop = $(window).scrollTop();
        console.log(_this.scrollTop);
    };

    $(window).on('scroll', function() {
        requestAnimationFrame(onScroll);
    });

};

module.exports = new Banner();

},{"desandro-get-style-property":6}],3:[function(require,module,exports){

var getStyleProperty = require('desandro-get-style-property');
require('tappy-js');

var scroller = require('./scroller');

var transitionProp = getStyleProperty('transition');
var transitionEndEvent = {
    WebkitTransition: 'webkitTransitionEnd',
    MozTransition: 'transitionend',
    OTransition: 'otransitionend',
    transition: 'transitionend'
}[transitionProp];

var Bios = function() {
    this.init();
};

Bios.prototype = {
    $body: $('body'),
    $card: $('a.Bio-card'),
    $bio: $('.Bio'),
    bioActiveClass: 'Bio--active',
    $bios: $('.Bios'),
    biosActiveClass: 'Bios--active',
    biosSectionAnchor: '#member-bios',
    $closeButton: $('[data-member-bios-close]')
};

Bios.prototype.init = function() {
    var _this = this;

    this.$card.on('tap, click', function() {
        _this.open($(this).attr('href'));
    });

    this.$closeButton.on('tap, click', function() {
        _this.closeAll(true);
    });
};

Bios.prototype.open = function(id) {

    var _this = this;

    // Close any other active bios
    this.closeAll();

    // Scroll to the bios section
    scroller.scrollTo(_this.biosSectionAnchor);

    this.$bios.addClass(this.biosActiveClass);
    this.$bios.find(id).addClass(this.bioActiveClass);
};

Bios.prototype.closeAll = function(withScroll) {

    var _this = this;

    var close = function() {
        _this.$bios.removeClass(_this.biosActiveClass);
        _this.$bios.find('.' + _this.bioActiveClass).removeClass(_this.bioActiveClass);
    };

    if (! withScroll) {
        return close();
    }

    this.$body.one('scrollComplete', function() {
        close();
    });
};

module.exports = new Bios();

},{"./scroller":5,"desandro-get-style-property":6,"tappy-js":8}],4:[function(require,module,exports){

var tappy = require('tappy-js');

var Menu = function() {
    this.init();
};

Menu.prototype = {
    $body: $('body'),
    $menu: $('.Menu'),
    $button: $('.Header-menu-button'),
    bodyTransitionClass: 'Menu--transition',
    bodyActiveClass: 'Menu--active',
    transitionDuration: 150,
    isActive: false
};

/**
 * Initialize
 */
Menu.prototype.init = function() {

    this.interactions();
};

/**
 * Handle interactions
 */
Menu.prototype.interactions = function() {

    var _this = this;

    /**
     * Handle the menu button
     */
    this.$button.on('tap', function(event) {
        event.preventDefault();
        _this.toggle();
    });
};

/**
 * Toggle menu open/close state
 */
Menu.prototype.toggle = function() {
    this.isActive ? this.close() : this.open();
};

/**
 * Open the menu
 */
Menu.prototype.open = function() {

    var _this = this;

    this.$body.addClass(this.bodyTransitionClass);
    this.$body.addClass(this.bodyActiveClass);

    this.transitionEnd(function() {
        _this.$body.removeClass(_this.bodyTransitionClass);
        _this.$menu.trigger('focus');
        _this.isActive = true;
    });
};

/**
 * Cross-browser transition end event
 */
Menu.prototype.transitionEnd = function(callback) {

    // Removed transitionEndEvent, because FF on IE9 was
    // showing support for transitions, but wasn't actually
    // supporting them.
    return setTimeout(callback, this.transitionDuration);
};

/**
 * Close the menu
 */
Menu.prototype.close = function() {

    var _this = this;

    this.$body.addClass(this.bodyTransitionClass);
    this.$body.removeClass(this.bodyActiveClass);

    this.transitionEnd(function() {
        _this.$body.removeClass(_this.bodyTransitionClass);
        _this.isActive = false;
    });
};

/**
 * Exporter
 */
module.exports = new Menu();

},{"tappy-js":8}],5:[function(require,module,exports){

// Pull in jquery.smooth-scroll,
// skipping jquery dependency
require('jquery-smooth-scroll/src/jquery.smooth-scroll');

var $body = $('body');

module.exports.init = function() {
    $('a').smoothScroll({
        afterScroll: events.scrollComplete
    });
};

module.exports.scrollTo = function(target) {
    $.smoothScroll({
        scrollTarget: target,
        afterScroll: events.scrollComplete
    });
};

var events = {

    scrollComplete: function() {
        $body.trigger('scrollComplete')
    },

}

},{"jquery-smooth-scroll/src/jquery.smooth-scroll":7}],6:[function(require,module,exports){
/*!
 * getStyleProperty v1.0.4
 * original by kangax
 * http://perfectionkills.com/feature-testing-css-properties/
 * MIT license
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false, exports: false, module: false */

( function( window ) {

'use strict';

var prefixes = 'Webkit Moz ms Ms O'.split(' ');
var docElemStyle = document.documentElement.style;

function getStyleProperty( propName ) {
  if ( !propName ) {
    return;
  }

  // test standard property first
  if ( typeof docElemStyle[ propName ] === 'string' ) {
    return propName;
  }

  // capitalize
  propName = propName.charAt(0).toUpperCase() + propName.slice(1);

  // test vendor specific properties
  var prefixed;
  for ( var i=0, len = prefixes.length; i < len; i++ ) {
    prefixed = prefixes[i] + propName;
    if ( typeof docElemStyle[ prefixed ] === 'string' ) {
      return prefixed;
    }
  }
}

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( function() {
    return getStyleProperty;
  });
} else if ( typeof exports === 'object' ) {
  // CommonJS for Component
  module.exports = getStyleProperty;
} else {
  // browser global
  window.getStyleProperty = getStyleProperty;
}

})( window );

},{}],7:[function(require,module,exports){
(function($) {
  var version = '1.5.5',
      optionOverrides = {},
      defaults = {
        exclude: [],
        excludeWithin:[],
        offset: 0,

        // one of 'top' or 'left'
        direction: 'top',

        // jQuery set of elements you wish to scroll (for $.smoothScroll).
        //  if null (default), $('html, body').firstScrollable() is used.
        scrollElement: null,

        // only use if you want to override default behavior
        scrollTarget: null,

        // fn(opts) function to be called before scrolling occurs.
        // `this` is the element(s) being scrolled
        beforeScroll: function() {},

        // fn(opts) function to be called after scrolling occurs.
        // `this` is the triggering element
        afterScroll: function() {},
        easing: 'swing',
        speed: 400,

        // coefficient for "auto" speed
        autoCoefficient: 2,

        // $.fn.smoothScroll only: whether to prevent the default click action
        preventDefault: true
      },

      getScrollable = function(opts) {
        var scrollable = [],
            scrolled = false,
            dir = opts.dir && opts.dir === 'left' ? 'scrollLeft' : 'scrollTop';

        this.each(function() {

          if (this === document || this === window) { return; }
          var el = $(this);
          if ( el[dir]() > 0 ) {
            scrollable.push(this);
          } else {
            // if scroll(Top|Left) === 0, nudge the element 1px and see if it moves
            el[dir](1);
            scrolled = el[dir]() > 0;
            if ( scrolled ) {
              scrollable.push(this);
            }
            // then put it back, of course
            el[dir](0);
          }
        });

        // If no scrollable elements, fall back to <body>,
        // if it's in the jQuery collection
        // (doing this because Safari sets scrollTop async,
        // so can't set it to 1 and immediately get the value.)
        if (!scrollable.length) {
          this.each(function() {
            if (this.nodeName === 'BODY') {
              scrollable = [this];
            }
          });
        }

        // Use the first scrollable element if we're calling firstScrollable()
        if ( opts.el === 'first' && scrollable.length > 1 ) {
          scrollable = [ scrollable[0] ];
        }

        return scrollable;
      };

  $.fn.extend({
    scrollable: function(dir) {
      var scrl = getScrollable.call(this, {dir: dir});
      return this.pushStack(scrl);
    },
    firstScrollable: function(dir) {
      var scrl = getScrollable.call(this, {el: 'first', dir: dir});
      return this.pushStack(scrl);
    },

    smoothScroll: function(options, extra) {
      options = options || {};

      if ( options === 'options' ) {
        if ( !extra ) {
          return this.first().data('ssOpts');
        }
        return this.each(function() {
          var $this = $(this),
              opts = $.extend($this.data('ssOpts') || {}, extra);

          $(this).data('ssOpts', opts);
        });
      }

      var opts = $.extend({}, $.fn.smoothScroll.defaults, options),
          locationPath = $.smoothScroll.filterPath(location.pathname);

      this
      .unbind('click.smoothscroll')
      .bind('click.smoothscroll', function(event) {
        var link = this,
            $link = $(this),
            thisOpts = $.extend({}, opts, $link.data('ssOpts') || {}),
            exclude = opts.exclude,
            excludeWithin = thisOpts.excludeWithin,
            elCounter = 0, ewlCounter = 0,
            include = true,
            clickOpts = {},
            hostMatch = ((location.hostname === link.hostname) || !link.hostname),
            pathMatch = thisOpts.scrollTarget || ( $.smoothScroll.filterPath(link.pathname) === locationPath ),
            thisHash = escapeSelector(link.hash);

        if ( !thisOpts.scrollTarget && (!hostMatch || !pathMatch || !thisHash) ) {
          include = false;
        } else {
          while (include && elCounter < exclude.length) {
            if ($link.is(escapeSelector(exclude[elCounter++]))) {
              include = false;
            }
          }
          while ( include && ewlCounter < excludeWithin.length ) {
            if ($link.closest(excludeWithin[ewlCounter++]).length) {
              include = false;
            }
          }
        }

        if ( include ) {

          if ( thisOpts.preventDefault ) {
            event.preventDefault();
          }

          $.extend( clickOpts, thisOpts, {
            scrollTarget: thisOpts.scrollTarget || thisHash,
            link: link
          });

          $.smoothScroll( clickOpts );
        }
      });

      return this;
    }
  });

  $.smoothScroll = function(options, px) {
    if ( options === 'options' && typeof px === 'object' ) {
      return $.extend(optionOverrides, px);
    }
    var opts, $scroller, scrollTargetOffset, speed, delta,
        scrollerOffset = 0,
        offPos = 'offset',
        scrollDir = 'scrollTop',
        aniProps = {},
        aniOpts = {};

    if (typeof options === 'number') {
      opts = $.extend({link: null}, $.fn.smoothScroll.defaults, optionOverrides);
      scrollTargetOffset = options;
    } else {
      opts = $.extend({link: null}, $.fn.smoothScroll.defaults, options || {}, optionOverrides);
      if (opts.scrollElement) {
        offPos = 'position';
        if (opts.scrollElement.css('position') === 'static') {
          opts.scrollElement.css('position', 'relative');
        }
      }
    }

    scrollDir = opts.direction === 'left' ? 'scrollLeft' : scrollDir;

    if ( opts.scrollElement ) {
      $scroller = opts.scrollElement;
      if ( !(/^(?:HTML|BODY)$/).test($scroller[0].nodeName) ) {
        scrollerOffset = $scroller[scrollDir]();
      }
    } else {
      $scroller = $('html, body').firstScrollable(opts.direction);
    }

    // beforeScroll callback function must fire before calculating offset
    opts.beforeScroll.call($scroller, opts);

    scrollTargetOffset = (typeof options === 'number') ? options :
                          px ||
                          ( $(opts.scrollTarget)[offPos]() &&
                          $(opts.scrollTarget)[offPos]()[opts.direction] ) ||
                          0;

    aniProps[scrollDir] = scrollTargetOffset + scrollerOffset + opts.offset;
    speed = opts.speed;

    // automatically calculate the speed of the scroll based on distance / coefficient
    if (speed === 'auto') {

      // $scroller.scrollTop() is position before scroll, aniProps[scrollDir] is position after
      // When delta is greater, speed will be greater.
      delta = aniProps[scrollDir] - $scroller.scrollTop();
      if(delta < 0) {
        delta *= -1;
      }

      // Divide the delta by the coefficient
      speed = delta / opts.autoCoefficient;
    }

    aniOpts = {
      duration: speed,
      easing: opts.easing,
      complete: function() {
        opts.afterScroll.call(opts.link, opts);
      }
    };

    if (opts.step) {
      aniOpts.step = opts.step;
    }

    if ($scroller.length) {
      $scroller.stop().animate(aniProps, aniOpts);
    } else {
      opts.afterScroll.call(opts.link, opts);
    }
  };

  $.smoothScroll.version = version;
  $.smoothScroll.filterPath = function(string) {
    string = string || '';
    return string
      .replace(/^\//,'')
      .replace(/(?:index|default).[a-zA-Z]{3,4}$/,'')
      .replace(/\/$/,'');
  };

  // default options
  $.fn.smoothScroll.defaults = defaults;

  function escapeSelector (str) {
    return str.replace(/(:|\.|\/)/g,'\\$1');
  }

})(jQuery);

},{}],8:[function(require,module,exports){
/*! Tappy! - a lightweight normalized tap event. Copyright 2013 @scottjehl, Filament Group, Inc. Licensed MIT */
(function( w, $, undefined ){

	// handling flag is true when an event sequence is in progress (thx androood)
	w.tapHandling = false;
	w.tappy = true;

	var tap = function( $els ){
		return $els.each(function(){

			var $el = $( this ),
				resetTimer,
				startY,
				startX,
				cancel,
				scrollTolerance = 10;

			function trigger( e ){
				$( e.target ).trigger( "tap", [ e, $( e.target ).attr( "href" ) ] );
			}

			function getCoords( e ){
				var ev = e.originalEvent || e,
					touches = ev.touches || ev.targetTouches;

				if( touches ){
					return [ touches[ 0 ].pageX, touches[ 0 ].pageY ];
				}
				else {
					return null;
				}
			}

			function start( e ){
				if( e.touches && e.touches.length > 1 || e.targetTouches && e.targetTouches.length > 1 ){
					return false;
				}

				var coords = getCoords( e );
				startX = coords[ 0 ];
				startY = coords[ 1 ];
			}

			// any touchscroll that results in > tolerance should cancel the tap
			function move( e ){
				if( !cancel ){
					var coords = getCoords( e );
					if( coords && ( Math.abs( startY - coords[ 1 ] ) > scrollTolerance || Math.abs( startX - coords[ 0 ] ) > scrollTolerance ) ){
						cancel = true;
					}
				}
			}

			function end( e ){
				clearTimeout( resetTimer );
				resetTimer = setTimeout( function(){
					w.tapHandling = false;
					cancel = false;
				}, 1000 );

				// make sure no modifiers are present. thx http://www.jacklmoore.com/notes/click-events/
				if( ( e.which && e.which > 1 ) || e.shiftKey || e.altKey || e.metaKey || e.ctrlKey ){
					return;
				}

				e.preventDefault();

				// this part prevents a double callback from touch and mouse on the same tap

				// if a scroll happened between touchstart and touchend
				if( cancel || w.tapHandling && w.tapHandling !== e.type ){
					cancel = false;
					return;
				}

				w.tapHandling = e.type;
				trigger( e );
			}

			$el
				.bind( "touchstart.tappy MSPointerDown.tappy", start )
				.bind( "touchmove.tappy MSPointerMove.tappy", move )
				.bind( "touchend.tappy MSPointerUp.tappy", end )
				.bind( "click.tappy", end );
		});
	};

	var untap = function( $els ){
		return $els.unbind( ".tappy" );
	};

	// use special events api
	if( $.event && $.event.special ){
		$.event.special.tap = {
			add: function( handleObj ) {
				tap( $( this ) );
			},
			remove: function( handleObj ) {
				untap( $( this ) );
			}
		};
	}
	else{
		// monkeybind
		var oldBind = $.fn.bind,
			oldUnbind = $.fn.unbind;
		$.fn.bind = function( evt ){
			if( /(^| )tap( |$)/.test( evt ) ){
				tap( this );
			}
			return oldBind.apply( this, arguments );
		};
		$.fn.unbind = function( evt ){
			if( /(^| )tap( |$)/.test( evt ) ){
				untap( this );
			}
			return oldUnbind.apply( this, arguments );
		};
	}

}( this, jQuery ));

},{}]},{},[1]);
