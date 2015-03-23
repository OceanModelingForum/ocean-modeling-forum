
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
