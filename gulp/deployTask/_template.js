let gulp          = require('gulp');

module.exports = function commonDeploy(){
    return gulp.src('./src/wp/template/*.php')
        .pipe(gulp.dest('./deploy'))
}