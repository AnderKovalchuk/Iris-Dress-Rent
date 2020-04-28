let dev             = require('./gulp/devTask/dev'),
    build           = require('./gulp/buildTask/build'),
    deploy          = require('./gulp/deployTask/deploy'),
    wpWork          = require('./gulp/deployTask/wpWork');

exports.deploy         = deploy;
exports.wpwork         = wpWork;
exports.dev            = dev;
exports.build          = build;