var path = require('path');
var fs = require('fs');
var pkg = JSON.parse(fs.readFileSync('./package.json'));
var assetsPath = path.resolve(pkg.path.assetsDir);
var cleanCss = require('gulp-clean-css');

var gulp = require('gulp');

// sass compiler
var sass = require('gulp-sass');

var cmq = require('gulp-merge-media-queries');

// add vender prifix
var autoprefixer = require('gulp-autoprefixer');

// error handling
var plumber = require('gulp-plumber');

gulp.task('sass', function() {
    gulp.src(path.join(assetsPath, '_scss/*.scss'))
        .pipe(plumber())
        .pipe(sass())
				.pipe(cmq({log:true}))
        .pipe(autoprefixer())
				.pipe(cleanCss())
        .pipe(gulp.dest(path.join(assetsPath, 'css/')));
});

gulp.task('default', function() {
    gulp.watch(path.join(assetsPath, '_scss/**/*.scss'),['sass','dist']);
});

// copy dist ////////////////////////////////////////////////

gulp.task('dist', function() {
	return gulp.src(
			[
				'./**/*.php',
				'./**/*.txt',
				'./**/*.css',
				'./**/*.scss',
				'./**/*.bat',
				'./**/*.rb',
				'./**/*.eot',
				'./**/*.svg',
				'./**/*.ttf',
				'./**/*.woff',
				'./images/**',
				'./inc/**',
				'./js/**',
				'./languages/**',
				'./library/**',
				"!./tests/**",
				"!./dist/**",
        "!./**/compile.bat",        
				"!./node_modules/**/*.*"
			], {
				base: './'
			}
		)
		.pipe(gulp.dest('dist/lightning-skin-fort')); // distディレクトリに出力
});
