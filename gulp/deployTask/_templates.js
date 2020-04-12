let gulp          = require('gulp');

module.exports = function templatesDeploy(){
    return gulp.src('./src/wp/templates/**/*.php')
        .pipe(gulp.dest('./deploy/'))
}