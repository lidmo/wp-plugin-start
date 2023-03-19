var gulp            = require('gulp');
var concat          = require('gulp-concat');
var uglify          = require('gulp-uglify-es').default;
var merge           = require('merge-stream');
var sass            = require('gulp-sass')(require('node-sass'));
var autoprefixer    = require('gulp-autoprefixer');
var gcmq            = require('gulp-group-css-media-queries');
var livereload      = require('gulp-livereload');
var zip             = require('gulp-zip');
var path            = require('path');
var projectName     = path.basename(__dirname);
var spawn           = require('child_process').spawn;

sass.compiler = require('node-sass');

var assetsFolder = 'assets/',
    assetsAdmin  = assetsFolder + 'admin/',
    assetsPublic = assetsFolder + 'public/';

var config = {
    //Admin Assets folders
    srcAdminDirJS: assetsAdmin + 'js/src',
    destAdminDirJS:  assetsAdmin + 'js',
    srcAdminDirSASS:  assetsAdmin + 'css/sass',
    destAdminDirSASS:  assetsAdmin + 'css',
    //Public Assets folders
    srcDirJS: assetsPublic + 'js/src',
    destDirJS: assetsPublic + 'js',
    srcDirSASS: assetsPublic + 'css/sass',
    destDirSASS: assetsPublic + 'css'
};


//The sass styles to compile combine and minify
var styles = [
    {
        src : [
            config.srcAdminDirSASS + '/base.scss'
        ],
        name : 'admin.min',
        dest : config.destAdminDirSASS + ''
    },
    {
        src : [
            config.srcDirSASS + '/base.scss'
        ],
        name : 'public.min',
        dest : config.destDirSASS + ''
    }
];


//The scripts to combine and minify
var scripts = [
    {
        src : [
            config.srcAdminDirJS + '/base.js'
        ],
        name : 'admin.min',
        dest : config.destAdminDirJS + ''
    },
    {
        src : [
            config.srcDirJS + '/base.js'
        ],
        name : 'public.min',
        dest : config.destDirJS + ''
    }
];


//Task to Compile the styles, scripts are combined and minified
gulp.task('sass:compile', function () {

    var tasks = styles.map(function( file){
        return gulp.src( file.src )
            .pipe( concat(file.name + '.css' ) )
            // .pipe(gcmq())
            .pipe( sass({outputStyle: 'compressed'}).on('error', sass.logError) )
            .pipe( autoprefixer({
                overrideBrowserslist: ['last 6 versions'],
                cascade: false
            }))
            .pipe( gulp.dest( file.dest )  )
            .pipe( livereload({ start: true }) );
    });

    return merge(tasks);


});


//Task to Compile the scripts, scripts are combined and minified
gulp.task('scripts:compile', function() {

    var tasks = scripts.map(function( file){
        return gulp.src( file.src )
            .pipe( concat(file.name + '.js' ) )
            .pipe( uglify().on('error', function(e){ console.log(e); } ) )
            .pipe( gulp.dest( file.dest ) )
            .pipe( livereload({ start: true }) );
    });

    return merge(tasks);

});


//Task to Watch only for changes in styles
gulp.task('sass:watch', function (done) {
    livereload.listen();
    gulp.watch( config.srcAdminDirSASS + '/**/*.scss', gulp.series( 'sass:compile' ) );
    gulp.watch( config.srcDirSASS + '/**/*.scss', gulp.series( 'sass:compile' ) );
    done();
});


//Task to Watch only for changes in scripts
gulp.task( 'scripts:watch', function(done) {
    livereload.listen();
    gulp.watch( config.srcAdminDirJS + '/**/*.js', gulp.series( 'scripts:compile' ) );
    gulp.watch( config.srcDirJS + '/**/*.js', gulp.series( 'scripts:compile' ) );
    done();
});


//Task to Watch both styles and scripts
gulp.task('watch', function(done){

    gulp.watch( config.srcAdminDirSASS + '/**/*.scss', gulp.series( 'sass:compile' ) );
    gulp.watch( config.srcAdminDirJS + '/**/*.js', gulp.series( 'scripts:compile' ) );
    gulp.watch( config.srcDirSASS + '/**/*.scss', gulp.series( 'sass:compile' ) );
    gulp.watch( config.srcDirJS + '/**/*.js', gulp.series( 'scripts:compile' ) );
    gulp.watch('gulpfile.js', gulp.series( 'gulp:restart' ) );
    done();

});

var p;
gulp.task('gulp:restart', function(done) {

    console.log( '\x1b[36m%s\x1b[0m', 'gulpfile.js has been changed');

    // kill previous spawned process
    if(p) { p.kill(); }

    p = spawn('gulp', ['default'], {shell: true} );
    done();

});

//Change the default gulp task to compile styles and scripts and then watch
gulp.task( 'default', gulp.series( 'sass:compile', 'scripts:compile', 'watch' ) );

var zipFileName = projectName + '.zip';
gulp.task('export' , function (done) {
    return gulp.src( [ './**', '!./node_modules/**', '!./wordpress/**', '!./bin/**', '!Gulp Install.txt', '!Plugin Install Guide' ], { base: '../'} )
        .pipe(zip(zipFileName))
        .pipe(gulp.dest('..'))
        .on('end',  function () {
            //open the destination folder where the zip is located
            require('child_process').exec('start explorer.exe /select,  ' + path.dirname(__dirname) + '\\' + zipFileName );

            // console.log( path.dirname(__dirname) + '\\' + zipFileName );

            //add a fancy message to the console
            console.log( '\n');
            console.log( '\x1b[36m%s\x1b[0m', '############################################');
            console.log( '\x1b[36m%s\x1b[0m', '#  ',  zipFileName + ' has been created.');
            console.log( '\x1b[36m%s\x1b[0m', '############################################', '\n' );
        });
});

