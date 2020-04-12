let gulp          = require('gulp');

module.exports = function staticDeploy(){
    return gulp.src('./src/wp/static/**/*.*')
        .pipe(gulp.dest('./deploy/'))
}