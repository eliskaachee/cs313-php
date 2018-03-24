function count_lines(error, data) {
  var numLines = data.toString().split("\n").length - 1;
  console.log(numLines);
}

var fs = require('fs');
var file = fs.readFile(process.argv[2], count_lines);
