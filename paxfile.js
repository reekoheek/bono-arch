module.exports = function() {
    var context = this;

    var cmd = context.require('./utils/cmd');

    this.task('init', function(logger) {
        logger.log('Updating composer...'.yellow);
        cmd('composer', ['update']).then(function(stream) {
            console.log(stream[0]);
        });
    });

};