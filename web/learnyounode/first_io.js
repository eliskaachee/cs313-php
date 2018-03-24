var fs = require('fs');
var file = fs.readFileSync(process.argv[2]);
var numLines = file.toString().split("\n").length - 1;
console.log(numLines);
