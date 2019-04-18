var mongoose = require('mongoose');
var bcrypt = require('bcrypt-nodejs');

module.exports = function(){
  var userSchema = mongoose.Schema({
    login: {type: String, trim: true, unique: true, index: true},
    name: {type: String, trim: true},
    password: {type: String}

  });

  userSchema.methods.generateHash = function(password){
    return bcrypt.hashSync(password, bcrypt.genSaltSync(8), null);
  };

  userSchema.methods.validPassword = function(password1, password2){
    return bcrypt.compareSync(password1, password2, null);
  }

  return mongoose.model('users', userSchema);
}
