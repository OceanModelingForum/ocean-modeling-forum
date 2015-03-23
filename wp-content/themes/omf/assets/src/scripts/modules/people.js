
var tappy = require('tappy-js');

var People = function() {
    this.init();
};

People.prototype = {
    $display: $('.People-display'),
    displayActiveClass: 'People-display--active',
    $personLink: $('.Person-link'),
    personActiveClass: 'Person--active'
};

People.prototype.init = function() {

    // Change all people

    this.events();
};

People.prototype.events = function() {
    var _this = this;

    // Clicking a person link
    this.$personLink.on('tap, click', function(event) {
        //event.preventDefault();
        var id = $(this).attr('href');
        _this.show(id);
        //window.location = id;
    });
};

/**
 * Show a person's bio in the display area
 */
People.prototype.show = function(id) {
    this.$display.addClass(this.displayActiveClass);
    this.$display.find(id).addClass(this.personActiveClass);
};

module.exports = new People();
