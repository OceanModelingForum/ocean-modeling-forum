
var tappy = require('tappy-js');

/**
 * Create a new Modal instance.
 *
 * @param {Object} $element
 * @param {Object} id
 */
var Modal = function($element, id) {

    this.$el = $element;

    this.$modal = $('#' + id);

    this.init();
};

Modal.prototype = {
    $body: $('body'),
    bodyTransitionClass: 'State--modal-transition',
    bodyActiveClass: 'State--modal-active',
    modalActiveClass: 'Modal--active',
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

    // Handle clicking on modal
    this.$modal.on('tap', function(event) {

        var $el = $(event.target);

        if ($(event.target).parents('[data-modal-prevent-dismiss]').length === 0) {
            _this.toggle();
        }

    });
};

/**
 * Toggle modal open/close state
 */
Modal.prototype.toggle = function() {
    this.isActive ? this.close() : this.open();
};

/**
 * Open the modal
 */
Modal.prototype.open = function() {

    var _this = this;

    this.$body.addClass(this.bodyTransitionClass);
    this.$body.addClass(this.bodyActiveClass);
    this.$modal.addClass(this.modalActiveClass);

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
    this.$modal.removeClass(this.modalActiveClass);

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
$.fn.modal = function() {
    return this.each(function() {
        var $el = $(this);
        var id = $el.data('modal');

        new Modal($el, id);
    });
};

/**
 * Auto-initialize for elements with [data-modal] attribute.
 */
$('[data-modal]').modal();
