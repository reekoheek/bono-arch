module.exports = function() {
    var cmd = this.require('./utils/cmd'),
        Q = this.require('q');

    this.task('init', function(logger) {
        if (arguments.length > 1) {
            throw new Error('Wrong argument');
        }

        logger.head('Installing package from composer...');
        return cmd('composer', ['install']).then(function(stream) {
            logger.log(stream[0].trim());
        });
    });

};
