
var autoprefixer    = require('gulp-autoprefixer');
var browserify      = require('browserify');
var browserSync     = require('browser-sync');
var buffer          = require('vinyl-buffer');
var cache           = require('gulp-cache');
var config          = require('./config');
var del             = require('del');
var gulp            = require('gulp');
var imagemin        = require('gulp-imagemin');
var minify          = require('gulp-minify-css');
var notify          = require('gulp-notify');
var pixrem          = require('gulp-pixrem');
var rename          = require('gulp-rename');
var sass            = require('gulp-sass');
var sequence        = require('run-sequence');
var source          = require('vinyl-source-stream');
var uglify          = require('gulp-uglify');
var watch           = require('gulp-watch');

/**
 * Main build task
 */
gulp.task('default', ['clean'], function(callback) {

    // Sync tasks
    sequence(

        // Set up asset dependencies
        'dependencies',

        // Compile styles, scripts, minify images
        ['styles', 'scripts', 'images'],

        // Minify custom Modernizr build
        'modernizr',

        // Browser Sync
        'browserSync',

        // Watch
        'watch',

        // Finish sequence
        callback
    );

});

/**
 * Clean
 */
gulp.task('clean', function(callback) {

    del('./dist', callback);

});

/**
 * Set up asset dependencies
 */
gulp.task('dependencies', [
    'dependencies:normalize',
    'dependencies:jquery',
]);

/**
 * Dependency: normalize-css
 * Create a scss version of normalize.css
 */
gulp.task('dependencies:normalize', function() {
    return gulp.src('./node_modules/normalize-css/normalize.css')
        .pipe(rename('normalize.scss'))
        .pipe(gulp.dest('./node_modules/normalize-css'));
});

/**
 * Dependency: jquery
 * Copy a local version of jQuery
 * (along with source map)
 * TODO: figure out how to remove source map dependency
 */
gulp.task('dependencies:jquery', function() {
    return gulp.src('./node_modules/jquery/dist/jquery.min.*')
        .pipe(gulp.dest(config.scripts.dst));
});

/**
 * Compile styles
 */
gulp.task('styles', function() {
    return gulp.src(config.styles.src + '*.scss')
        .pipe(sass({
            errLogToConsole: true,
            includePaths: ['./node_modules', './bower_components']
        }))
        .pipe(pixrem())
        .pipe(autoprefixer())
        .pipe(minify())
        .pipe(gulp.dest(config.styles.dst))
        .pipe(browserSync.reload({stream: true}));
});

/**
 * Compile scripts
 */
gulp.task('scripts', function() {
    return browserify({
        paths: ['./node_modules', './bower_components'],
        entries: [config.scripts.src + 'main.js']
    })
    .bundle()
    .on('error', handleErrors)
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest(config.scripts.dst))
    .pipe(browserSync.reload({stream: true}));
});

/**
 * Minify custom Modernizr build
 */
gulp.task('modernizr', function() {
    return gulp.src(config.scripts.src + 'modernizr.js')
        .pipe(gulp.dest(config.scripts.dst));
});

/**
 * Minify images
 */
gulp.task('images', function() {
    return gulp.src(config.images.src + '**/*.{jpg,jpeg,gif,png}')
        .pipe(imagemin({
            optimizationLevel: 3,
            progressive: true,
            interlaced: true
        }))
        .pipe(gulp.dest(config.images.dst))
        .pipe(browserSync.reload({stream: true}));
});

/**
 * Browser sync
 */
gulp.task('browserSync', function() {
    return browserSync({
        notify: false,
        open: false,
        proxy: config.hostname
    });
});

/**
 * Watch files for changes
 */
gulp.task('watch', function() {

    // Scripts
    watch(config.scripts.src + '**/*.js', function() {
        gulp.start('scripts');
        gulp.start('modernizr');
    });

    // Styles
    watch(config.styles.src + '**/*.scss', function() {
        gulp.start('styles');
    });

    // Images
    watch(config.images.src + '**/*', function() {
        gulp.start('images');
    });

    // PHP
    watch([config.src + '*.php', config.src + 'templates/**/*.php'], function() {
        browserSync.reload();
    });
});

/**
 * Error handler
 */
var handleErrors = function() {
    notify.onError({
        title: 'Compile Error',
        message: '<%= error.message %>'
    }).apply(this, arguments);

    this.emit('end');
};
