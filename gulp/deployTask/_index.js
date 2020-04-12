let gulp          = require('gulp');

module.exports = function indexDeploy(){
    return gulp.src('./src/wp/index.php')
        .pipe(gulp.dest('./deploy/'))
}