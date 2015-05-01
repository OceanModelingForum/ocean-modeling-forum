
var Caption = function($el) {
    this.$el = $el;
    this.$btn = this.$el.find('.Image-caption-button');

    this.init();
};

Caption.prototype = {
    activeClass: 'Image-caption--active',
    isActive: false,
};

Caption.prototype.init = function() {

    var _this = this;

    this.$btn.on('click', function(event) {
        event.preventDefault();

        _this.toggle();
    });
};

Caption.prototype.toggle = function() {
    this.isActive ? this.deactivate() : this.activate();
};

Caption.prototype.activate = function() {
    this.$el.addClass(this.activeClass);
    this.isActive = true;
};

Caption.prototype.deactivate = function() {
    this.$el.removeClass(this.activeClass);
    this.isActive = false;
};

/**
 * Auto-initialize
 */
$('.Image-caption').each(function() {
    new Caption($(this));
});
