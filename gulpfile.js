/* 
FUNCIONES DE NIVEL SUPERIOR UTILIZADAS EN GULP 
gulp.task : se utiliza para definir la tarea. 
gulp.src : se utiliza para señalar el archivo que se utilizará. 
gulp.dest : se usa para apuntar a la carpeta de salida. 
gulp.watch: esta función observa los cambios en los archivos para que no tengamos que ejecutar cada vez una función cuando se realiza un cambio.
*/

let gulp  = require('gulp'),
rename = require("gulp-rename"),
concat    = require('gulp-concat'),
cleanCSS = require('gulp-clean-css'),
uglify    = require('gulp-uglify'),
browserSync = require('browser-sync').create();

gulp.task('browser-sync',  () => {
 
    browserSync.init({
        server: {
            baseDir: './'
        }
    });

    gulp.watch("./css/*.css", gulp.series('minify-css','reload'));
    gulp.watch('./js/*.js', gulp.series('js','reload'));
    gulp.watch("./*.php").on('change', browserSync.reload);
});
 
gulp.task("reload", (done) => { browserSync.reload(); done(); });

//Tarea para compilar archivos scss a css
gulp.task('minify-css', () => {
    // Folder with files to minify
    return gulp.src('./css/*.css')
    //The method pipe() allow you to chain multiple tasks together 
    //I execute the task to minify the files
   .pipe(cleanCSS())
   .pipe(rename('style.min.css'))
   //I define the destination of the minified files with the method dest
   .pipe(gulp.dest('dist/'));
});

//Tarea para concatenar y minificar archivos js  
gulp.task('js', () =>
    gulp.src(['./js/*.js'])
    // './node_modules/popper.js/dist/popper.js',
     .pipe(concat('scripts.min.js'))
     .pipe(gulp.dest('js'))
     .pipe(uglify())
     .pipe(gulp.dest('./dist/'))
);

