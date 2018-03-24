const http = require('http'); // http module allows transfer over the HTTP

const hostname = '127.0.0.1'; // localhost
const port = 3000;

const server = http.createServer(function(req, res) { // req = query information, res = response
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('Hello World\n');
});

server.listen(port, hostname, callback);

function callback() {
  console.log(`Server running at http://${hostname}:${port}/`);
}
