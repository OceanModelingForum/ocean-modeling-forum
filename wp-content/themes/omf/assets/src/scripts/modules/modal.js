
var tappy = require('tappy-js');

/**
 * Create a new Modal instance.
 *
 * @param {Object} $element
 * @param {Object} options
 */
var Modal = function($element) {

    this.$el = $element;

    this.$modal = $('#' + this.$el.data('id'));

    this.init();
};

Modal.prototype = {
    $body: $('body'),
    bodyTransitionClass: 'Modal--transition',
    bodyActiveClass: 'Modal--active',
    transitionDuration: 150,
    isActive: false
};

/**
 * Initializer.
 */
Modal.prototype.init = function() {

    var _this = this,
        allowedKeys = [27],
        activeKeys = [];

    this.$el.on('tap', function(event) {
        event.preventDefault();
        _this.toggle();
    });

    // Handle keys
    $(document).on('keydown', function(event) {

        // Check for allowed key
        if ($.inArray(event.which, allowedKeys) === -1) return;

        switch(event.which) {
            case 27: //esc
                // track active keys to prevent key holding
                if (!activeKeys['27']) {
                    _this.close();
                    activeKeys['27'] = true;
                }
                break;
        }
    });

    // Clear key array on keyup
    $(document).on('keyup', function(event) {
        var keycode = event.keycode ? event.keycode : event.which;
        activeKeys[keycode] = false;
    });
};

/**
 * Toggle menu open/close state
 */
Modal.prototype.toggle = function() {
    this.isActive ? this.close() : this.open();
};

/**
 * Open the menu
 */
Modal.prototype.open = function() {

    var _this = this;

    this.$body.addClass(this.bodyTransitionClass);
    this.$body.addClass(this.bodyActiveClass);

    this.transitionEnd(function() {
        _this.$body.removeClass(_this.bodyTransitionClass);
        _this.$modal.trigger('focus');
        _this.isActive = true;
    });
};

/**
 * Cross-browser transition end event
 */
Modal.prototype.transitionEnd = function(callback) {

    // Removed transitionEndEvent, because FF on IE9 was
    // showing support for transitions, but wasn't actually
    // supporting them.
    return setTimeout(callback, this.transitionDuration);
};

/**
 * Close the modal.
 */
Modal.prototype.close = function(url) {

    var _this = this;

    this.$body.addClass(this.bodyTransitionClass);
    this.$body.removeClass(this.bodyActiveClass);

    this.transitionEnd(function() {
        _this.$body.removeClass(_this.bodyTransitionClass);
        _this.isActive = false;

        if (url) window.location.href = url;
    });
};

/**
 * Make jQuery plugin.
 *
 * @param  {String}     id
 * @return {Object}     new Modal()
 */
$.fn.modal = function(id) {
    return this.each(function() {
        new Modal($(this));
    });
};

/**
 * Auto-initialize for elements with [data-modal] attribute.
 */
$('[data-modal]').modal();
