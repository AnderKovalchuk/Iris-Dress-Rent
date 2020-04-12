let gulp          = require('gulp');

module.exports = function languagesDeploy(){
    return gulp.src('./src/wp/languages/**/*.**')
        .pipe(gulp.dest('./deploy/languages/'))
}