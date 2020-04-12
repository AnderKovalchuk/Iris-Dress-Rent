let gulp          = require('gulp');

module.exports = function commonDeploy(){
    return gulp.src('./src/wp/common/**/*.php')
        .pipe(gulp.dest('./deploy/'))
}