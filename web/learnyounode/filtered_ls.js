function print_directory(error, list) {
  var extension = "." + process.argv[3];
  var path = require('path');
  for(var i = 0; i < list.length; i++) {
    if(path.extname(list[i]) == extension) {
      console.log(list[i]);
    }
  }
}

var fs = require('fs');
fs.readdir(process.argv[2], print_directory);
