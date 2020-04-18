let gulp        = require('gulp');
    
let clean       = require('./_clean'),
    common      = require('./_common'),
    style       = require('./_style'),
    script      = require('./_script'),
    fonts       = require('./_fonts'),
    template    = require('./_template')
    connect     = require('./_connect');

function upload(){
    return gulp.src('./deploy/**/*.*', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme'));
}

module.exports = gulp.series(
    clean, 
    gulp.parallel(common, template, style, script, fonts),
    upload);