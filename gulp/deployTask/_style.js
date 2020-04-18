let gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    autoprefixer  = require('gulp-autoprefixer'),
    cleanCSS      = require('gulp-clean-css'),
    gcmq          = require('gulp-group-css-media-queries'),
    concat        = require('gulp-concat'),
    sort          = require('gulp-sort'),
    Fiber         = require('fibers');

sass.compiler = require('node-sass');

module.exports = function styleDeploy(){
  return gulp.src('./src/sass/*.sass')
    .pipe(sass({
      fiber: Fiber,
      outputStyle: 'expanded',
    }))
    .pipe(gcmq())
    .pipe(autoprefixer(['last 1 versions']))
    .pipe(cleanCSS({
      level: 2,
    }))
    .pipe(gulp.src(['./src/wp/style.css']))
    .pipe(sort({
      asc: false,
    }))
    .pipe(concat('style.css'))
    .pipe(gulp.dest('./deploy'));
}