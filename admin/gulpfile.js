'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var clean = require('gulp-clean-css');
var uglify = require('gulp-uglify')

gulp.task('sass-u', function () {
	return gulp.src('./sass/**/*.scss')
	.pipe(sass(
			{outputStyle: 'compressed'}
		).on('error', sass.logError))
	.pipe(gulp.dest('./public/css/'));
	});
gulp.task('root', function () {
   return gulp.src('./sass/root.scss')
   .pipe(sass(
        {outputStyle: 'compressed'}
        ).on('error', sass.logError))
   .pipe(gulp.dest('./build/css/'));
});
gulp.task('root2', function () {
   return gulp.src('./sass/root2.scss')
   .pipe(sass(
        {outputStyle: 'compressed'}
        ).on('error', sass.logError))
   .pipe(gulp.dest('./public/css/'));
});
gulp.task('compress', function() { 
        return gulp.src('./public/js/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('./build/js'))
});

gulp.task('default', ['sass-u', 'root', 'root2', 'compress']);