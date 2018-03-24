var express = require('express');
var app = express();

app.set('port', 5000)
   .use(express.json()) // these are middleware, they parse out the body of the post before it gets to the /addGame
   .use(express.urlencoded({extended: true}))
   .get('/game/:id', handleSingleGameFromParam) // handleSingleGame is the callback after the url is called. :id is if they type in /game/12
   .get('/game', handleSingleGameFromQuery) // would use query, like /game?id=12
   .get('/games', handleGameList) // will pass the whole list of games
   .post('/addGame', handleNewGame) // it is a post because we are changing data
   .listen(app.get('port'), function() {
     console.log('Listening on port: ' + app.get('port'));
   });

function handleSingleGameFromParam(req, res) {
  var id = req.params.id; // pulls the :id from the /game/12.
  console.log('Getting game from params: ' + id);
  var result = {id: id, title: 'Super Smash Bros'};
  res.json(result);
}

function handleSingleGameFromQuery(req, res) {
  var id = req.query.id; // pulls the :id from the /game/12.
  console.log('Getting game from query: ' + id);
  var result = {id: id, title: 'Super Smash Bros'};
  res.json(result);
}

function handleGameList(req, res) {
  console.log('Getting game list . . .');
  var resultList = [
    {id: 1, title: 'Super Smash Bros'},
    {id: 2, title: 'Legend of Zelda'},
    {id: 3, title: 'Oregon Trail'}
  ];
  res.json(resultList);
}

function handleNewGame(req, res) {
  var title = req.body.title;
  console.log("Game Added: " + title);
  res.json({success: true});
  //ew . . .
}
