'use strict';

var gulp = require('gulp');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var livereload = require('gulp-livereload');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var plumberErrorHandler = { errorHandler: notify.onError({
 
    title: 'Gulp',
 
    message: 'Error: <%= error.message %>'
 
  })
 
};


gulp.task('default', function(done){
 console.log('default gulp task...')
 done();
});


/* js */

var jsVendor = 'js/vendor/*.js',
    jsCustom = 'js/custom/*.js',
    jsSrc = 'js/';
    
gulp.task('scripts', function(done) {  
    gulp.src(jsVendor)
        .pipe(concat('vendor.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsSrc))
         done();
});

gulp.task('customscripts', function(done) {  
  gulp.src(jsCustom)
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsSrc))
         done();
});




/* sass */

var options = {};
options.sass = {
  errLogToConsole: true,
  precision: 8,
  noCache: true,
  //imagePath: 'assets/img'
};

options.sassmin = {
  errLogToConsole: true,
  precision: 8,
  noCache: true,
  outputStyle: 'compressed'
};


gulp.task('sass', function (done) {
 
      gulp.src('style.scss')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sourcemaps.init())
        .pipe(sass())
        
        .pipe(autoprefixer({
          env: 'previous'
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./'));
        done();
 
});

gulp.task('sass-min', function (done) {
 
    gulp.src('style.scss')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sourcemaps.init())
        .pipe(sass(options.sassmin).on('error', sass.logError))
        .pipe(autoprefixer({
          env: 'previous'
        }))

        .pipe(rename( { suffix: '.min' } ) )
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./'))
        //.pipe(notify({ title: 'Sass', message: 'sass-min task complete' }));
        done();
 
});
 
gulp.task('watch', function(done) {
  livereload.listen();
  gulp.watch('inc/sass/*.scss', gulp.series('sass', 'sass-min'));
  gulp.watch('inc/sass/blocks/*.scss', gulp.series('sass', 'sass-min'));
  gulp.watch('inc/sass/elements/*.scss', gulp.series('sass', 'sass-min'));
  gulp.watch('inc/sass/pages/*.scss', gulp.series('sass', 'sass-min'));
  gulp.watch('style.scss', gulp.series('sass', 'sass-min')); 
  gulp.watch( 'js/vendor/*.js', gulp.series('scripts'));
  gulp.watch( 'js/custom/*.js', gulp.series('customscripts'));

 done();
});

gulp.task('default', gulp.parallel( 'watch'));

