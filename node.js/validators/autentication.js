module.exports = function(req, res){

  req.assert('login', 'login inválido').notEmpty();
  req.assert('password', 'Senha inválida').notEmpty();

  var validateErrors = req.validationErrors() || [];

  if (validateErrors.length > 0) {
    validateErrors.forEach(function(e){
      req.flash('erro', e.msg);
    });
    return false;
  }
  return true;
}
