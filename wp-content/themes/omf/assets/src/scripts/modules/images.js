
var debounce = require('lodash.debounce');

/**
 * Handle full bleed image sizing for IE
 */
var Images = function() {

    // Only for IE9 and below
    if ($('html').hasClass('gt-ie9')) {
        return;
    }

    this.init();
};

Images.prototype = {
    $window: $(window),
    $el: $('.Image--bleed'),
    $container: $('.Image--bleed').parent(),
};

Images.prototype.init = function() {

    var _this = this;

    var onResize = function() {
        _this.$el.height(_this.$container.height());
    };

    onResize();

    this.$window.on('resize', debounce(onResize, 100));
};

module.exports = new Images();
