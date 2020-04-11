let gulp    = require('gulp'),
    ftp     = require('vinyl-ftp'),
    gutil   = require('gulp-util');

let connect =  ftp.create({
    host:      '160.153.131.156',
    user:      'gulp@iris.anderkovalchuk.com',
    password:  'Ge$D9Ixj(G-G',
    parallel:  5,
    log: gutil.log
});

module.exports = connect;