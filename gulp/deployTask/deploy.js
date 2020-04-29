let gulp        = require('gulp');
    
let clean           = require('./_clean'),
    build           = require('../buildTask/build'),
    index           = require('./_index.js'),
    functions       = require('./_functions'),
    common          = require('./_common'),
    templates       = require('./_templates'),
    templateParts   = require('./_template-parts'),
    woocommerce     = require('./_woocommerce'),
    includes        = require('./_includes'),  
    languages       = require('./_languages'),
    static          = require('./_static'),
    connect         = require('./_connect');
    
function upload(){
    return gulp.src('./deploy/**/*.*', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme'));
}
function moveBuild(){
    return gulp.src([
        './build/**/*.*',
        '!./build/**/*.html'
    ])
    .pipe(gulp.dest('./deploy'))
}

module.exports = gulp.series(
    clean, build, moveBuild,
    gulp.parallel(index, functions, common, templates, templateParts, woocommerce, includes, languages, static),
    upload
);