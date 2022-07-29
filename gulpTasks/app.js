const gulp = require('gulp');
const babel = require('gulp-babel');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const watch = require('gulp-watch');


gulp.task('app', [ 'app.css', 'app.js', 'app.images']);


gulp.task('app.css', () => {
    return gulp.src('src/assets/sass/style.scss')
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(concat('app.min.css'))
        .pipe(gulp.dest('public_html/wp-content/themes/prototipoLP/assets/css'))
});

gulp.task('admin.css', () => {
    return gulp.src('src/assets/sass/style-admin.scss')
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(concat('admin.min.css'))
        .pipe(gulp.dest('public_html/wp-content/themes/prototipoLP/assets/css'))
});

gulp.task('app.js', () => {
    return gulp.src([
        'src/assets/js/**/*.js'
    ])
        .pipe(babel({
            presets: ['env'],
            minified: true,
            comments: false
        }))
        .pipe(concat('app.min.js'))
        .pipe(gulp.dest('public_html/wp-content/themes/prototipoLP/assets/js'))
});

gulp.task('app.images', () => {
    return gulp.src('src/assets/images/**/*.*')
        .pipe(gulp.dest('public_html/wp-content/themes/prototipoLP/assets/images'))
});

gulp.task('monitorarMudancas', () => {
    watch('src/**/*.scss', () => gulp.start('app.css'));
    watch('src/**/*.scss', () => gulp.start('admin.css'));
    watch('src/**/*.js', () => gulp.start('app.js'));
    watch('src/assets/images/**/*.*', () => gulp.start('app.images'));
});