module.exports = function(app){

  var validation = require('../validators/autentication');
  var User = app.models.users;

  var BasicController = {
    index: function(req, res){
      res.render('index')
    },

    login: function(req,res){
      res.render('basic/login');
    },

    autentication: function(req,res){
      var user = new User();
      var login = req.body.login;
      var password = req.body.password;

      if (validation(req,res)) {
        User.findOne({'login': login}, function(err,data){
          if (err) {
            req.flash('erro', 'erro ao entrar no sistema:' +err);
            res.redirect('/');
          }else if(!data){
            req.flash('erro','Login não encontrado');
            res.redirect('/');
          }else if(!user.validPassword(password, data.password)){
            req.flash('erro', 'Senha não confere !!!');
            res.redirect('/');
          }else {
            req.session.user = data;
            res.redirect('./users');
          }
        });
      }else {
        res.redirect('/');
      }

    },

    logout: function(req,res){
      req.session.destroy();
      res.redirect('/');
    }
  }

  return BasicController
}
