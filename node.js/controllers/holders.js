module.exports = function(app){
  var Project = app.models.projects;

  var HolderController = {
    index: function(req, res){
      var _id = req.params.id;
      Project.findById(_id, function(err,data){
        if (err) {
          req.flash('erro', 'Erro ao Listar Apoiadores');
          res.render('holders/index', {list: null});
        }
        res.render('holders/index', {list: data.holders, id: _id});
      });
    },

    create: function(req, res){
      res.render('holders/create', {model: new Project(), id : req.params.id});
    },

    post: function(req, res){
      var _id = req.params.id;
      Project.findById(_id, function(err,data){
          var holder = req.body.projects;
          data.projects.push(project);
          data.save(function(err){
            if(err){
              req.flash('erro', 'Erro ao Cadastrar Apoiador');
            }
            res.redirect('/holders/'+_id);
          });
        });
      }
    }

  return HolderController;

}
