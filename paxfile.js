module.exports = function() {
    var context = this;

    var cmd = context.require('./utils/cmd'),
        Q = context.require('q');

    this.task('init', function(logger) {
        if (arguments.length > 1) {
            throw new Error('Wrong argument');
        }

        logger.log('Updating composer...'.yellow);
        return cmd('composer', ['update']).then(function(stream) {
            console.log(stream[0]);
        });
    });

};
