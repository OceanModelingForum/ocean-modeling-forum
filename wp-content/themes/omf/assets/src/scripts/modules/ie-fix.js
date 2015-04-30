
module.exports.init = function() {

    imageElementHeight();

};

var imageElementHeight = function() {

    var $el = $('.Image--bleed');
    var $container = $el.parent();

    $el.height($container.height());

};
