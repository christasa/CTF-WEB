const randomize = require('randomatic')

const init_session = function () {
  var init = function (req, res, next) {
    if (!req.session.role) {
        req.session.role = 'guest';
    }
    if (!req.session.file) {
        req.session.file = randomize('aA0', 12) + ".json"
    }
    next();
  }
  return init;
};

module.exports = init_session;