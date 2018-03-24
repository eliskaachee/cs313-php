var http = require('http');

function onRequest (req, res) {
  var url = req.url;
  console.log(url);

  if(url == "/home") {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write('<h1>Welcome to the Home Page</h1>');
    return res.end();
  } else if(url == "/getData") {
    res.writeHead(200, {'Content-Type': 'application/json'});
    res.write('{"name": "Eliska", "class": "CS313"}');
    return res.end();
  } else {
    res.writeHead(404, {'Content-Type': 'text/html'});
    return res.end("404 Not Found");
  }
}

http.createServer(onRequest).listen(8888);
