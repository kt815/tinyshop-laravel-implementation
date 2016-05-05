'use strict';

var gulp = require('gulp');
var less = require('gulp-less');
var jade = require('gulp-jade-php');
var unescapeHtml = require('gulp-unescape-html');
var entities = require('gulp-html-entities');

gulp.task('less', function() {
	gulp.src('./resources/assets/less/cart.less')
	.pipe(less())
	.pipe(gulp.dest('./public/css'));
});

gulp.task('jade', function(){
  gulp.src([
  	'./resources/assets/jade/*.*', // './resources/assets/jade/partial/*.*',
  	], 
  	{'base' : './resources/assets/jade'})
    .pipe(jade({
    	pretty: true
    }))
    .pipe(gulp.dest('./resources/assets/jade/tmp/'))
});

gulp.task('decode', function() {
  return gulp.src('./resources/assets/jade/tmp/*.*')
    .pipe(entities('decode'))
    .pipe(gulp.dest('./resources/views/'));
});


gulp.task('watch', function() {
    gulp.run('less');
    gulp.run('jade');
    gulp.run('decode');    
	gulp.watch('./resources/assets/less/*.less', function() {
	    gulp.run('less');
	});
	gulp.watch('./resources/assets/jade/*.*', function() {
	    gulp.run('jade');
	});
  gulp.watch('./resources/assets/jade/tmp/*.*', function() {
      gulp.run('decode');
  });  
});	
