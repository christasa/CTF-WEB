const unless = require('express-unless');

const auth = function () {
  var authm = function (req, res, next) {
    if (req.session.role !== 'admin') {
        res.status(403);
        res.render('error');
    } else {
		  next();
    }
  }
  authm.unless = unless;
  return authm;
};

module.exports = auth;