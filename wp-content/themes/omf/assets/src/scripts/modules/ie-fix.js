
var IEFix = function() {
    //this.init();
};

IEFix.prototype.init = function() {

    // Only for IE 

    this.imageElementFix();
};

IEFix.prototype.imageElementFix = function() {

    var $el = $('.Image--bleed');
    var $container = $el.parent();

    $el.height($container.height());

};

module.exports = new IEFix();
