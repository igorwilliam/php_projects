var mongoose = require('mongoose');

module.exports = function(){

  var holderSchema = mongoose.Schema({
    userHolder: {type: String, required: true},
    value: {type: String, required: true},
  })

  var projectSchema = mongoose.Schema({
    name: {type: String, required: true},
    description: {type: String, default: "Projeto sem Descrição"},
    price: {type: String, required: true},
    duration: {type: String, required: true},
    holders: [holderSchema]
  });

  return mongoose.model('projects', projectSchema);

}
