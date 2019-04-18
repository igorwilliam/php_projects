module.exports = function(app){
  var basic = app.controllers.basic;

  app.route('/')
    .post(basic.autentication)
    .get(basic.login);

  app.route('/logout').get(basic.logout);

}
