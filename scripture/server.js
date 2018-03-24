var express = require('express');
var app = express();

var controller = require('./controllers/scriptureController.js') // ./ requires it to start in the current directory istead of the default to look in the node_modules directory

app.set('port', process.env.PORT || 5000) //if there already is a port, use inspect
   .get('/scriptures', controller.handleScriptureList)
   .use(express.static(__dirname + '/public'))
   .listen(app.get('port'), function() {
     console.log("Listening on port: " + app.get('port'));
   });
