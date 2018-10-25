var gulp = require('gulp');
var notify = require("gulp-notify");
var $ = require('gulp-load-plugins')();
var uglify = require("gulp-uglify");
var concat = require("gulp-concat");

var sassPaths = [
    'bower_components/normalize.scss/sass',
    'bower_components/foundation-sitegulps/scss',
    'bower_components/motion-ui/src',
    'bower_components/neutroncss',
    'core/scss',
    'includes/css/*.scss'
];

var js = [
    './core/js/jquery.js',
    './core/js/what-input.js',
    './core/js/foundation.js',
    './core/js/wow.js',
    './includes/js/main.js'
];

// Tarefa de minificação do Javascript
gulp.task('minify-js', function () {
    gulp.src(js)
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./includes/js'))
        .pipe(notify("Arquivo compilado: <%= file.relative %>!"))
        .on("error", notify.onError(function (error) {
            return "Erro: " + error.message;
        }));
});

gulp.task('sass', function () {
    $.autoprefixer = function (param) {
    };

    /** @namespace $.sass */
    return gulp.src('includes/css/*.scss')

        .pipe($.sass({
            includePaths: sassPaths,
            outputStyle: 'uncompressed'
        })

            .on('error', $.sass.logError))
        .pipe($.autoprefixer({
            browsers: ['last 2 versions', 'ie >= 9']
        }))
        .pipe(gulp.dest('includes/css'))

        .pipe(notify("Arquivo compilado: <%= file.relative %>!"))
        .on("error", notify.onError(function (error) {
            return "Erro: " + error.message;
        }));
});


gulp.task('default', ['sass', 'minify-js'], function () {
    gulp.watch(['includes/css/**/*.scss'], ['sass']);
    gulp.watch(['core/scss/**/*.scss'], ['sass']);
    gulp.watch(js, ['minify-js']);
});
