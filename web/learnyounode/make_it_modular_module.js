var fs = require('fs');
var path = require('path');

module.exports = function (directory, extension, callback) {
  extension = '.' + extension;

  fs.readdir(directory, function (err, data) {
    if (err) {
      return callback(err);
    }

    data = data.filter(function (file) {
      if (path.extname(file) === ext) {
        return true;
      } else {
        return false;
      }
    });
    callback(null, data);
  });
}
