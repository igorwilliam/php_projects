var express = require('express');
var path = require('path');
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');
var session = require('express-session');
var load = require('express-load');
var mongoose = require('mongoose');
var flash = require('express-flash');
var expressValidator = require('express-validator');

//connect with mongodb
mongoose.connect('mongodb://localhost/harleydb', function(err){
  if (err) {
    console.log("Erro ao conectar o mongodb" +err);
  }else {
    console.log("conexão com mongodb com sucesso");
  }
});

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');

// uncomment after placing your favicon in /public
//app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(expressValidator());
app.use(cookieParser());
app.use(session({ secret: 'harley' }));
app.use(express.static(path.join(__dirname, 'public')));
app.use(flash());

//helpers
app.use(function(req,res,next){
	res.locals.session  = req.session.user;
	res.locals.isLogged = req.session.user ? true : false;
	next();
});

load('models').then('controllers').then('routes').into(app);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  var err = new Error('Página Não Encontrada');
  err.status = 404;
  next(err);
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;

app.listen(3000, function(){
  console.log('Express server listening on port 3000');
});
