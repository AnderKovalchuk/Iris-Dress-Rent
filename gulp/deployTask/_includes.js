let gulp          = require('gulp');

module.exports = function includesDeploy(){
    return gulp.src('./src/wp/includes/**/*.php')
        .pipe(gulp.dest('./deploy/includes/'))
}