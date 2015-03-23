
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
