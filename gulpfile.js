// gulpfile
// Config for 'gulp' task runner - gulpjs.com
//
// Ref: https://markgoodyear.com/2014/01/getting-started-with-gulp/
// 
// This is once-only on your computer:
// 1. Install npm
// 2. Install gulp globally:
//      npm install gulp -g
//
// This is per-project:
// 1. Install gulp into project. 'cd' into theme directory and run:
//       npm install gulp --save-dev
// 2. Install plugins with the below command:
//      npm install gulp-autoprefixer gulp-concat gulp-livereload gulp-minify-css gulp-notify gulp-rename gulp-sass gulp-uglify
//    
// Usage
// Run 'gulp' to run once, or 'gulp watch' to continually watch

// Load plugins
// Here we list all the plugins we'll be using, alphabetically please :)
// All plugins should be installed via npm on user's system
var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    livereload = require('gulp-livereload'),
    minifycss = require('gulp-minify-css'),
    notify = require('gulp-notify'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify');

// Styles task
// Compile Sass to CSS, automagically add vendor prefixes, output minified & non-minified CSS
gulp.task('styles', function() {
    gulp.src('assets/scss/main.scss')
    .pipe(sass({
        style: 'expanded',
        'sourcemap=none': true
    }))
    .on('error', function (err) {
        console.log(err.message)
        notify({ message: err.message }) // this doesn't appear to work. investigate
        this.emit('end')
    })
    .pipe(autoprefixer({browsers: ['> 5%', 'last 2 versions'] }))
    .pipe(gulp.dest('assets/css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('assets/css'))
    .pipe(notify({ message: 'Styles task complete' }))
    .pipe(livereload());
});

// Scripts task
// Combine all js files to a single file, output as minified & non-minified
// 
// Minification not currently working. Commend out the on error function to see the error message. Will need looking into. Don't have time right now.
// 
gulp.task('scripts', function() {
    return gulp.src([
        'assets/js/plugins/*.js',
        'assets/js/src/*.js'
    ])
    .pipe(concat('custom_scripts.js'))
    .pipe(gulp.dest('assets/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .on('error', function (err) { // this entire handler doesn't appear to work
        console.log(err.message)
        notify({ message: err.message })
        this.emit('end')
    })
    .pipe(gulp.dest('assets/js'))
    .pipe(notify({ message: 'Scripts task complete' }))
    .pipe(livereload());
});


// Markup task
// Reload page when markup files are changed
// gulp.task('markup', function() {
//     return gulp.src('public/robots.txt')
//     .pipe(livereload());
// });

// Default task
// What happens when user runs 'gulp'
gulp.task('default', function() {
    gulp.start('styles', 'scripts');
});


// Watch task
// What happens when user runs 'gulp watch'
gulp.task('watch', function() {

    // Livereload
    livereload.listen();

    // Watch .scss files
    gulp.watch('assets/scss/**/*.scss', ['styles']);

    // Watch .js files
    gulp.watch('assets/js/src/**/*.js', ['scripts']);

    // Watch .php files
    // gulp.watch('app/views/**/*.php', ['markup']);

});