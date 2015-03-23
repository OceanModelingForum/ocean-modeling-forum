
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
