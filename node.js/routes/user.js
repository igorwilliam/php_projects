module.exports = function(app){
  var user = app.controllers.users;
  var autenticate = require('../middleware/autenticate');


  app.route('/').get(autenticate, user.index);
  app.route('/users').get(autenticate, user.index);
  app.route('/users/create')
    .get(user.create)
    .post(user.post);
}
