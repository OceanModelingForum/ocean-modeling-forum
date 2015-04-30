
var debounce = require('lodash.debounce');

/**
 * Keep track of various measurements
 */
var Geometry = function() {
    this.init();
};

Geometry.prototype = {
    $window: $(window),
    window: {}
};

Geometry.prototype.init = function() {

    this.onResize();
    this.onScroll();

    this.$window.on('resize', debounce(this.onResize), 10);
    this.$window.on('scroll', debounce(this.onScroll), 10);

};

Geometry.prototype.onResize = function() {

};

Geometry.prototype.onScroll = function() {

};

module.exports = new Geometry();
