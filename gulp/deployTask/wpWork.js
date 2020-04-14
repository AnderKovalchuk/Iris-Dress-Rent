let gulp        = require('gulp');
    
let clean       = require('./_clean'),
    common      = require('./_common'),
    template    = require('./_template')
    connect     = require('./_connect');

function uploadCommon(){
    return gulp.src('./src/wp/common/*.php', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme'));
}
function uploadTemplate(){
    return gulp.src('./src/wp/template/*.php', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme'));
}

function watch(){
    gulp.watch('./src/wp/common/*.php', gulp.parallel(common, uploadCommon));
    gulp.watch('./src/wp/template/*.php', gulp.parallel(template, uploadTemplate));
}

module.exports = gulp.parallel(watch);
