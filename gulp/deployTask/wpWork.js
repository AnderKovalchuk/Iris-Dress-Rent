let gulp            = require('gulp');
    
let index           = require('./_index.js'),
    functions       = require('./_functions'),
    common          = require('./_common'),
    templates       = require('./_templates'),
    templateParts   = require('./_template-parts'),
    woocommerce     = require('./_woocommerce'),
    includes        = require('./_includes'),  
    connect         = require('./_connect');

function uploadIndex(){
    return gulp.src('./src/wp/index.php', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme'));
}
function uploadFunctions(){
    return gulp.src('./src/wp/functions.php', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme'));
}
function uploadCommon(){
    return gulp.src('./src/wp/common/**/*.php', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme'));
}
function uploadTemplates(){
    return gulp.src('./src/wp/templates/**/*.php', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme'));
}
function uploadTemplateParts(){
    return gulp.src('./src/wp/template-parts/**/*.php', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme/template-parts'));
}
function uploadWoocommerce(){
    return gulp.src('./src/wp/woocommerce/**/*.php', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme/woocommerce/'));
}
function uploadIncludes(){
    return gulp.src('./src/wp/includes/**/*.php', {buffer: false})
        .pipe(connect.dest('/public_html/wp-content/themes/iris-teme/includes'));
}

function watch(){
    gulp.watch('./src/wp/index.php', gulp.parallel(index, uploadIndex));
    gulp.watch('./src/wp/functions.php', gulp.parallel(functions, uploadFunctions));
    gulp.watch('./src/wp/common/*.php', gulp.parallel(common, uploadCommon));
    gulp.watch('./src/wp/templates/**/*.php', gulp.parallel(templates, uploadTemplates));
    gulp.watch('./src/wp/template-parts/**/*.php', gulp.parallel(templateParts, uploadTemplateParts));
    gulp.watch('./src/wp/woocommerce/**/*.php', gulp.parallel(woocommerce, uploadWoocommerce));
    gulp.watch('./src/wp/includes/**/*.php', gulp.parallel(includes, uploadIncludes));
}

module.exports = gulp.parallel(watch);
