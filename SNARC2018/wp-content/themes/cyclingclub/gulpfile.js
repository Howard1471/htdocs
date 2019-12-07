var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();


gulp.task('sass', function(){
  return gulp.src('sass/style.scss')
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(sass({outputStyle: 'expanded'})) // Converts Sass to CSS with gulp-sass
    .pipe(gulp.dest(''))
    .pipe(browserSync.reload({
      stream: true
    }))
});

gulp.task('browserSync', function() {
  browserSync.init({
      proxy: 'dev.cyclingclub.local', // or project.dev/app/
  })
});

gulp.task('watch', ['browserSync', 'sass'], function(){
  gulp.watch('sass/**/*.scss', ['sass']); 
  // Other watchers
});