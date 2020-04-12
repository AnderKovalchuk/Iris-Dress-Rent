let gulp          = require('gulp');

module.exports = function functionsDeploy(){
    return gulp.src('./src/wp/functions.php')
        .pipe(gulp.dest('./deploy/'))
}