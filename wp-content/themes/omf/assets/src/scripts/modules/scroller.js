
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
