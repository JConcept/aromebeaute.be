const gulp = require('gulp'); // task runner
const gulpIf = require('gulp-if'); // creates condition if
const del = require('del'); // allows delete
const gulpSass = require('gulp-sass'); // sass/scss to css
const browsersync = require('browser-sync'); // multi browser refresh
const minifyJS = require('gulp-uglify'); // JS minifier
const minifyCSS = require('gulp-minify-css'); // CSS minifier
const imagemin = require('gulp-imagemin'); // Pictures minifier

/*
	Create server and open browser task
*/
function browserSync(done) {
	browsersync({
		server: {
			baseDir: "/"
		},
		port: 3000
		// @TODO : ouvrir plusieurs pages de tailles différentes
	});
	return done();
}

/*
	Browser refresh task
*/
function reload() {
	return gulp
		.src('/')
		// .pipe(browsersync.stream()) // Or :
		.pipe(
			browsersync.reload({
				stream: true
			})
		)
		.pipe(gulp.dest("/"))
}

/*
	Sass/Scss task
*/
function sass() {
	return gulp
		.src([
			'src/sass/*.sass', // Gets all files SASS
			'src/sass/*.scss' // Gets all files SCSS
		])
		.pipe(gulpSass({ // Converts Sass to CSS
			outputStyle: "expanded"
		}))
		.pipe(gulp.dest('wp-content/themes/aromebeaute/css'))
		.pipe(minifyCSS()) // minify
		.pipe(gulp.dest("wp-content/themes/aromebeaute/css"))
}

/*
	Minify all media task (optimized performance)
*/
function build() {
	sass();
	return gulp
		.src([
			'src/**/*', // Include all
			'src/**/.*', // Include dot files
			'!src/sass/**/*', // Exclude 1
			'!src/sass' // Exclude 2
		], {
			base: 'src/'
		})
		.pipe(gulpIf('**/*.+(png|jpg|gif|svg)', imagemin()))
		.pipe(gulpIf('**/*.js', minifyJS()))
		.pipe(gulp.dest('wp-content/themes/aromebeaute/'))
};

/*	NOT essential tasks
		Clean task
	*/
function clean() {
	return del('app');
}
/*
	Completion success task
*/
function success(done) {
	// console.log('\n%c[BUILDEND]\n', 'color: #bada55'); color don't work :-(
	console.log('\n[BUILDEND]\n');
	return done();
}

/* 
	Watching files tasks
*/
function watchFiles() {
	gulp.watch('src/**/*', gulp.series(build, reload));
}

/* 
	Define complex tasks
*/
const serve = gulp.parallel(browserSync, watchFiles);
const watch = gulp.series(build, success, serve);
const first = gulp.series(clean, watch); // @BUG : @TODO ajouter une miinuterie/retardateur ?

/* 
	Export tasks
*/
exports.f = first; // @BUG
exports.clean = clean;
exports.c = exports.clean;
exports.build = build;
exports.b = exports.build;
exports.serve = serve;
exports.s = exports.serve;
exports.watch = watch;
exports.w = exports.watch;

/* 
	Default task
*/
exports.default = build;