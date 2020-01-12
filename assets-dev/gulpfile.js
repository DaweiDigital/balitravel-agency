// Gulp Vars
var gulp = require('gulp');
var sass = require('gulp-sass');
//var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var livereload = require('gulp-livereload');
var md5 = require('gulp-md5-assets');
var wppot = require('gulp-wp-pot');



// onError Message
var onError = function(error) {
	notify({
		title: 'Gulp Task Error',
		message: 'Check the console'
	}).write(error);
	console.log(error.toString());
	this.emit('end');
}



// JavaScript Concat and Uglify
gulp.task('javascript', gulp.series( function() {
	return gulp.src([
		// 'node_modules/cookies-info/js/cookies-info.js', // CookiesInfo
		// 'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js', // Fancybox
		// 'node_modules/swiper/dist/js/swiper.js', // Swiper
		'js/main.js'
	])
		//.pipe(plumber({errorHandle: onError}))
		.pipe(concat('main.min.js'))
		.on('error', onError)
		.pipe(gulp.dest('../assets/js'))

		// Uglify
		.pipe(uglify())
		.on('error', onError)
		.pipe(gulp.dest('../assets/js'))

		// Notify
		.pipe(notify({
			title: 'Gulp Task Completed',
			message: 'JavaScript has been compiled'
		}))

		// LiveReload
		.pipe(livereload());
}));



// SASS Compile and Autoprefixer
gulp.task('style', gulp.series( function() {
	return gulp.src('scss/style.scss')
		//.pipe(plumber({errorHandle: onError}))
		.pipe(sass({outputStyle: 'compressed'}))
		.on('error', onError)
		.pipe(rename('style.css'))
		.pipe(gulp.dest('../'))

		// Autoprefixer
		.pipe(autoprefixer({
			browsers: ['last 5 versions'],
			cascade: false
		}))
		.pipe(gulp.dest('../'))

		// Notify
		.pipe(notify({
			title: 'Gulp Task Completed',
			message: 'Styles have been compiled'
		}))

		// LiveReload
		.pipe(livereload());
}));



// Node Modules Copy
gulp.task('jquery', gulp.parallel( function() {
	return gulp.src('node_modules/jquery/dist/jquery.min.js')
		.pipe(gulp.dest('../assets/js'));
}));

gulp.task('bs', gulp.parallel( function() {
	return gulp.src('node_modules/bootstrap/js/dist/carousel.js')
		.pipe(gulp.dest('js'));
}));



// MD5 Hash
gulp.task('md5:css', gulp.parallel( function() {
	return gulp.src('../style.css')
		.pipe(md5(10, '../functions/add-style.php'));
}));

gulp.task('md5:js', gulp.parallel( function () {
	return gulp.src('../assets/js/main.min.js')
		.pipe(md5(10, '../functions/add-script.php'));
}));

gulp.task('md5', gulp.parallel('md5:css', 'md5:js'));



// POT Translation
gulp.task('pot', gulp.series( function () {
	return gulp.src('../**/*.php')
		.pipe(wppot( {
			domain: 'DOMAIN'
		} ))
		.pipe(gulp.dest('../../../languages/themes/DOMAIN.pot'));
}));



// Critical CSS
/*
gulp.task('critical', gulp.series( function() {
	return gulp.src('../style.css')
		.pipe(penthouse({
			out: '/includes/critical.php',
			url: 'http://URL.localhost',
			width: 1400,
			height: 900
		}))
		.pipe(gulp.dest('../'))
		.pipe(notify({
			title: 'Gulp Task Completed',
			message: 'Critical CSS has been created'
		}));
}));
*/


// Build All
gulp.task('build', gulp.series('style', 'md5:css', 'javascript', 'md5:js'));



// Watch
gulp.task('default', gulp.series( function() {
		livereload.listen();
		gulp.watch('scss/**/*.scss', gulp.series(['style', 'md5:css'])); // Watch SCSS
		gulp.watch('js/**/*.js', gulp.series(['javascript','md5:js'])); // Watch JS
	}
));
