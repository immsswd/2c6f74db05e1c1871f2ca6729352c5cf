'use sctrict'

var gulp = require('gulp');
var sass = require('gulp-sass');
var clean = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var pump = require('pump');

gulp.task('sass-u', function(){
	return gulp.src('./sass/**/*.scss')
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

gulp.task('default', ['sass-u', 'compress']);