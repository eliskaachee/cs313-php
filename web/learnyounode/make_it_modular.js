var filtered_list = require('./make_it_modular_module.js');

filtered_list(process.argv[2], process.argv[3], function (err, data) {
  data.forEach(function (file) {
        console.log(file);
    });
});
