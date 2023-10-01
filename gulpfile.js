const uglify = require('gulp-uglify');
const concat = require('gulp-concat');

const { src, dest } = require('gulp');
const terser = require('gulp-terser');
const { minify } = require('terser');

function defaultTask(cb) {
    // place code for your default task here
    return (
        src('./assets/js/**/*.js')
            .pipe(concat('src.js'))
            .pipe(
                terser(
                    {
                        keep_fnames: false,
                    },
                    minify,
                ),
            )
            // .pipe(uglify())
            .pipe(dest('./assets/build'))
    );
}

exports.default = defaultTask;
