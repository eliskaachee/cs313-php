var scriptureModel = require('../models/scriptureModel.js');

function handleScriptureList(req, res) {
  console.log("Handling Scripture List Stuff");

  var book = req.query.book;

  console.log("Book: " + book);

  // var result = getScriptureList();
  // res.json(result);
  scriptureModel.getScriptureList(book, function(err, result) { // instead of waiting for the database to come back, we will use a callback
    // res.json(result) is short hand for all of this:
    // res.header(200, 'application/JSON');
    // res.write(result);
    // res.close();
    res.json(result);
  });
}

module.exports = {
  handleScriptureList: handleScriptureList
};
