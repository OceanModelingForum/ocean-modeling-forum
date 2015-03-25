
var config = {};

/**
 * Hostname
 *
 * Proxied to localhost:3000
 */
config.hostname = 'oceanmodelingforum.dev';

/**
 * Source directory
 */
config.src = './';

/**
 * Destination directory
 */
config.dst = './';

/**
 * Styles
 */
config.styles = {
    src: config.src + 'assets/src/styles/',
    dst: config.dst + 'assets/dst/styles/'
};

/**
 * Scripts
 */
config.scripts = {
    src: config.src + 'assets/src/scripts/',
    dst: config.dst + 'assets/dst/scripts/'
};

/**
 * Images
 */
config.images = {
    src: config.src + 'assets/src/images/',
    dst: config.dst + 'assets/dst/images/'
};


module.exports = config;
