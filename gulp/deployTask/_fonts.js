let gulp          = require('gulp');

module.exports = function commonDeploy(){
    return gulp.src('./src/assets/fonts/*.*')
        .pipe(gulp.dest('./deploy/fonts'))
}