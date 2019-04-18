module.exports = function(app){
  var holder = app.controllers.holders;

  app.route('/holders/:id').get(holder.index);
  app.route('/holders/create/:id')
    .post(holder.post)
    .get(holder.create);
}
