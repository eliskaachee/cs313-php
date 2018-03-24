const { Pool } = require('pg');
const connectionString = process.env.DATABASE_URL || 'postgresql://ta_user:ta_pass@localhost:5432/scripture_ta';
// const connectionString =
const pool = new Pool({
  connectionString: connectionString
});

function getScriptureList(book, callback) {
  // var result = {
  //   status: 'success',
  //   list: [
  //     {book: 'John', chapter: 3, verse: 16},
  //     {book: "John", chapter: 7, verse: 17},
  //     {book: "Matthew", chapter: 5, verse: 16}
  //   ]
  // };

  pool.query('SELECT * FROM scripture WHERE book = $1', [book], function(err, res) {
    if(err) {
      throw err;
    } else {
      // RESULTS!!!
      console.log('Results: ' + res.rows);
      callback(null, res.rows); // this matches function(err, res)
    }
  })
}

// these are the functions I want available for everyone, like public methods
module.exports = {
  getScriptureList: getScriptureList
};
