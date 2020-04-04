let gulp          = require('gulp'),
    pug           = require('gulp-pug'),
    htmlValidator = require('gulp-w3c-html-validator'),
    sass          = require('gulp-sass'),
    autoprefixer  = require('gulp-autoprefixer'),
    cleanCSS      = require('gulp-clean-css');
    browserSync   = require('browser-sync'),
    notify        = require( 'gulp-notify' ),
    plumber       = require("gulp-plumber"),
    uglify        = require('gulp-uglify'),
    concat        = require('gulp-concat'),
    del           = require('del'), 
    Fiber         = require('fibers');

sass.compiler = require('node-sass');

gulp.task('html', function(){
  return gulp.src('src/pug/pages/**/*.pug')
    .pipe(pug({
      pretty: '\t'
    }))
    .pipe(htmlValidator())
    .pipe(htmlValidator.reporter())
    .pipe(gulp.dest('build'))
});
gulp.task('htmlDev', function(){
  return gulp.src('src/pug/pages/**/*.pug')
    .pipe(plumber({
      errorHandler: notify.onError( function( err ) {
        return {
          title: 'Pug',
          message: err
        };
      })
    }))
    .pipe(pug({
      pretty: '\t'
    }))
    .pipe(htmlValidator())
    .pipe(htmlValidator.reporter())
    .pipe(gulp.dest('dev'))
    .pipe(browserSync.stream());
});

gulp.task('style', function(){
  return gulp.src('src/sass/*.sass')
    .pipe(sass({
      fiber: Fiber,
      outputStyle: 'expanded',
    }))
    .pipe(autoprefixer(['last 1 versions']))
    .pipe(cleanCSS({
      level: 2,
    }))
    .pipe(gulp.dest('build/css'))
});
gulp.task('styleDev', function(){
  return gulp.src('src/sass/*.sass')
    .pipe(plumber())
    .pipe(sass({
      fiber: Fiber,
      outputStyle: 'expanded',
    }).on('error', notify.onError({
        message: "<%= error.message %>",
        title  : "Sass Error!"
    })))
    .pipe(gulp.dest('dev/css'))
    .pipe(browserSync.stream());
});

gulp.task('script', function(){
  return gulp.src('src/js/*.js')
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(gulp.dest('build/js'))
});
gulp.task('scriptDev', function(){
  return gulp.src('src/js/*.js')
    .pipe(plumber())
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dev/js'))
    .pipe(browserSync.stream());
});

gulp.task('assets', function(){
  return gulp.src([
      'src/assets/font/*.*',
      'src/assets/img/*.*'
    ])
    .pipe(gulp.dest('build'));
});
gulp.task('assetsDev', function(){
  return gulp.src([
    'src/assets/font/*.*',
    'src/assets/img/*.*'
  ])
  .pipe(gulp.dest('dev'));
});

gulp.task('static', function(){
  return gulp.src('src/assets/static/*.*')
    .pipe(gulp.dest('build'))
});
gulp.task('staticDev', function(){
  return gulp.src('src/assets/static/*.*')
    .pipe(gulp.dest('dev'))
});

gulp.task('watch', function(){
  gulp.watch('src/sass/**/*.sass', gulp.parallel('styleDev'));
  gulp.watch('src/pug/**/*.pug', gulp.parallel('htmlDev'));
  gulp.watch('src/ja/*.js', gulp.parallel('script'));
  gulp.watch('src/assets/**/*.*', gulp.parallel('assetsDev', 'staticDev'));
});

gulp.task('browser-sync', function() {
  browserSync.init({
    server: {
      baseDir: "dev/"
    }
  });
});


gulp.task('clean', async function(){
  del.sync(['build'])
});

gulp.task('cleanDev', async function(){
  del.sync(['dev'])
});

gulp.task('buildDev', gulp.parallel('htmlDev', 'styleDev', 'scriptDev', 'assetsDev', 'staticDev', 'browser-sync', 'watch'));
gulp.task('default', gulp.parallel('cleanDev', 'buildDev'));
gulp.task('build', gulp.series('clean', 'html', 'style', 'script', 'assets', 'static'));