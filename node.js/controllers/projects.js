module.exports = function(app){

  var Project = app.models.projects;

  var ProjectController = {

    index: function(req,res){
      Project.find(function(err,data){
        if (err) {
          req.flash('erro', 'Erro ao buscar projetos: '+err);
          res.render('projects/index', {list: null});
        }
        res.render('projects/index', {list: data});
      });
    },

    create: function(req, res){
      res.render('projects/create', {model: new Project()});
    },

    post: function(req, res){
      var model = new Project();
      model.name = req.body.name;
      model.description = req.body.description;
      model.price = req.body.price;
      model.duration = req.body.duration;

      model.save(function(err){
        if (err) {
          req.flash('erro', 'Erro ao Cadastrar projeto' +err);
          res.redirect('projects/create');
        }else {
          req.flash('info', 'Projeto Cadastrado com Sucesso');
          res.redirect('index');
        }
      });

    },

    show: function(req,res){
      Project.findById(req.params.id, function(err,data){
        if (err) {
          req.flash('erro', 'Erro ao carregar Projeto' +err);
          res.redirect('/projects');
        }else{
          res.render('projects/show', {model: data});
        }

      });
    }
  }

  return ProjectController;
}
