let gulp          = require('gulp');

module.exports = function woocommerceDeploy(){
    return gulp.src('./src/wp/woocommerce/**/*.php')
        .pipe(gulp.dest('./deploy/woocommerce/'))
}