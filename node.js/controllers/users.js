module.exports = function(app){

  var validation = require('../validators/users');
  var User = app.models.users;

  var UserController = {
    index: function(req,res){
      User.find(function(err,data){
        if (err) {
          req.flash('erro', 'Erro ao buscar Usuários: '+err);
          res.redirect('/users');
        }else {
          res.render('users', {list: data});
        }
      });
    },

    create: function(req,res){
      res.render('users/create', {user: new User()});
    },

    post: function(req, res){

      if (validation(req,res)) {

        var model = new User();

        model.name = req.body.name;
        model.login = req.body.login;
        model.password = model.generateHash(req.body.password);

        User.findOne({'login':model.login}, function(err,data){
          if (data) {

            req.flash('erro', 'login já cadastrado');
            res.render('users/create', {user: model});

          }else {

            model.save(function(err){
              if (err) {
                req.flash('erro', 'Erro ao Cadastrar:' +err);
                res.render('users/create', {user: req.body});
              }else {
                req.flash('info', 'Usuário Cadastrado');
                res.redirect('/users');

              }
            });
          }
        });
      }else {
        res.render('users/create', {user: req.body});
      }

    }



  }

  return UserController;

}
