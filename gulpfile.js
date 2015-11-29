/**
 * Created by Happykiller on 29/11/2015.
 */
var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
plugins.browserSync = require('browser-sync');

gulp.task('browser-sync', function() {
    plugins.browserSync.init({
        proxy: "localhost:80/ODA/"
    });
    gulp.watch("content/**/*.yaml", function(){
        plugins.browserSync.reload();
    });
});