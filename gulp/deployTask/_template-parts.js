let gulp          = require('gulp');

module.exports = function templatesDeploy(){
    return gulp.src('./src/wp/template-parts/**/*.php')
        .pipe(gulp.dest('./deploy/template-parts'))
}