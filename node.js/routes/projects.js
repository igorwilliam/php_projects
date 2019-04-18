module.exports = function(app){
    var project = app.controllers.projects;
    var autenticate = require('../middleware/autenticate');


    app.route('/projects/index').get(autenticate, project.index);
    app.route('/projects').get(autenticate, project.index);
    app.route('/projects/create')
      .get(autenticate, project.create)
      .post(autenticate, project.post);

    app.route('/projects/show/:id').get(project.show);

}
