module.exports = function() {
    var cmd = this.require('./utils/cmd'),
        Q = this.require('q'),
        context = this;

    this.task('init', function(logger) {
        if (arguments.length > 1) {
            throw new Error('Wrong argument');
        }

        logger.head('Installing package from composer...');
        return context.exec(['php', 'composer', 'install'], logger);
    });

    this.task('serve', function(logger) {
        if (arguments.length > 1) {
            throw new Error('Wrong argument');
        }

        logger.head('Serve standalone http...');
        if (!this.argv.t) {
            this.argv.t = './www';
        }
        return context.exec(['php', 'serve'], logger);
    });

};
