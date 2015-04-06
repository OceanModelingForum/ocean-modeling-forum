
var getStyleProperty = require('desandro-get-style-property');
var tappy = require('tappy-js');

var transitionProp = getStyleProperty('transition');
var transitionEndEvent = {
    WebkitTransition: 'webkitTransitionEnd',
    MozTransition: 'transitionend',
    OTransition: 'otransitionend',
    transition: 'transitionend'
}[transitionProp];

var Modal = function(element, options) {

    // The linking element
    this.$el = element;

    this.init(options);
};

Modal.prototype = {

    // ID linking element and modal
    id: 0,

    // Is the modal open?
    isActive: false,

    // Select the body element once
    $body: $('body'),

    // Default settings
    defaults: {
        modalClass: 'Modal',
        modalContainerClass: 'Modal-container',
        modalTransitionClass: 'Modal--transition',
        modalActiveClass: 'Modal--active',
        backgroundEffects: []
    },

    // Registered background effects
    backgroundEffects: []
};

Modal.prototype.init = function(options) {

    // Make options from defaults and element settings
    this.options = $.extend({}, this.defaults, options, this.$el.data('modal'));

    // Exit if no id
    if (this.options.id === 0) return false;

    // Select modal
    this.$modal = $('#' + this.options.id);

    // Exit if no modal
    if (this.$modal.length === 0) return false;

    // Register background effects
    //this.registerBackgroundEffects();

    // Register events
    this.events();
};

Modal.prototype.events = function() {

    var _this = this,
        allowedKeys = [27],
        activeKeys = [];

    // Selecting an element opens the modal
    this.$el.on('tap, click', function(event) {
        event.preventDefault();
        _this.toggle();
    });

    // Selecting outside of the modal closes the modal
    this.$modal.on('tap, click', function(event) {

        if ($(event.target).hasClass(_this.options.modalContainerClass)) {
            _this.close();
        }
    });

    // Escape key closes the modal
    $(document).on('keydown', function(event) {

        // Key whitelist
        if ($.inArray(event.which, allowedKeys) === -1) return;

        // Esc key only
        if (event.which !== 27) return;

        // Prevent key hold
        if (activeKeys['27']) return;

        _this.close();
        activeKeys[27] = true;
    });

    // Clear key array on keyup
    $(document).on('keyup', function() {
        var keycode = event.keycode ? event.keycode : event.which;
        activeKeys[keycode] = false;
    })
};

Modal.prototype.toggle = function(action) {
    this.isActive ? this.close() : this.open();
};

Modal.prototype.open = function() {
    var _this = this;

    // Necessary because some events are unaware of which
    // modal they're affecting
    if (this.isActive) return;

    //this.addBackgroundEffects();
    this.$modal.addClass(this.options.modalTransitionClass);
    this.$modal.addClass(this.options.modalActiveClass);

    this.$modal.one(transitionEndEvent, function() {
        _this.$modal.removeClass(_this.options.modalTransitionClass);
        _this.isActive = true;
    })
};

Modal.prototype.close = function() {
    var _this = this;

    // Necessary because some events are unaware of which
    // modal they're affecting
    if (! this.isActive) return;

    this.$modal.addClass(this.options.modalTransitionClass);
    this.$modal.removeClass(this.options.modalActiveClass);
    //this.removeBackgroundEffects();

    this.$modal.one(transitionEndEvent, function() {
        _this.$modal.removeClass(_this.options.modalTransitionClass);
        _this.isActive = false;
    });
};

/**
 * Register background effects
 */
// Modal.prototype.registerBackgroundEffects = function() {
//
//     if (! this.options.backgroundEffects) return;
//
//     var _this = this;
//
//     $.each(this.options.backgroundEffects, function() {
//         var effect = 'Effect-' + this;
//         if ($.inArray(effect, _this.backgroundEffects) !== -1) return;
//         _this.backgroundEffects.push(effect);
//     });
//
// };

/**
 * Add background effects to body
 */
// Modal.prototype.addBackgroundEffects = function() {
//
//     var $body = this.$body;
//
//     $.each(this.backgroundEffects, function(index, val) {
//         $body.addClass(val);
//     });
// };

/**
 * Remove background effects from body
 */
// Modal.prototype.removeBackgroundEffects = function() {
//     var $body = this.$body;
//
//     $.each(this.backgroundEffects, function(index, val) {
//         $body.removeClass(val);
//     });
// };

/**
 * Register jQuery plugin
 */
$.fn.modal = function(options) {
    return this.each(function() {
        new Modal($(this), options);
    });
};

/**
 * Auto-initialize for for elements with 'data-modal' attribute
 */
$('[data-modal]').modal();
