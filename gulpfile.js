'use strict';

var gulp = require('gulp');
var less = require('gulp-less');
var jade = require('gulp-jade-php');

gulp.task('less', function() {
	gulp.src('./resources/assets/less/cart.less')
	.pipe(less())
	.pipe(gulp.dest('./public/css'));
});

gulp.task('jade', function(){
  gulp.src([
  	'./resources/assets/jade/*.*',
  	// './resources/assets/jade/partial/*.*',
  	// './resources/assets/jade/directive/*.*'
  	], 
  	{'base' : './resources/assets/jade'})
    .pipe(jade({
    	pretty: true
    }))
    .pipe(gulp.dest('./resources/views/'))
});

gulp.task('watch', function() {
    gulp.run('less');
    gulp.run('jade');
	gulp.watch('./resources/assets/less/*.less', function() {
	    gulp.run('less');
	});
	gulp.watch('./resources/assets/jade/*.*', function() {
	    gulp.run('jade');
	});
});	