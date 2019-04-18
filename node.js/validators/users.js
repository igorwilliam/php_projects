var url = require('url');

module.exports = function(req,res,app){

  //modulo de validação
  var createUrl = url.parse(req.url).pathname == "users/create";

  req.assert('name', 'Informe o seu Primeiro nome').notEmpty();
  req.assert('login', 'Campo obrigatório').notEmpty();

  var validateErrors = req.validationErrors() || [];

  if (validateErrors.length > 0) {
    validateErrors.forEach(function(e){
      req.flash('erro', e.msg);
    });
    return false;
  }else {
    return true;
  }

}
