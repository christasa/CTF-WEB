const fs = require('fs');
const express = require('express');
const bodyParser = require('body-parser');
const lodash = require('lodash');
const session = require('express-session');
const store = require('session-file-store')(session);
const app = express();

config = require('./config');
helper = require('./helper');
init_session = require('./init_session')();
auth = require('./auth')();
config.session.store = new store();
app.use(bodyParser.urlencoded({extended: true})).use(bodyParser.json());
app.use('/static', express.static('static'));
app.use(session(config.session));
app.use(`/*`, init_session);
app.use(`/*`, auth.unless({path: config.whitelistPaths}));

app.engine('ejs', function (filePath, options, callback) {
    fs.readFile(filePath, (err, content) => {
        if (err) return callback(new Error(err));
        let compiled = lodash.template(content);
        let rendered = compiled({...options});

        return callback(null, rendered);
    })
});
app.set('views', './views');
app.set('view engine', 'ejs');

app.get('/', (req, res) => {
    res.render('index', {
        'role': req.session.role,
        'file': req.session.file
    });
});

app.all('/shop', (req, res) => {
    let data = req.session.get || {id: 0}
    if (req.method == 'POST') {
        req.session.get = helper.clone(req.body);
        res.send("OK!");
    }else {
        res.render('shop', {
            "id": data.id
        });
    }
});

app.get('/profile', (req, res) => {
    let data = req.session.get || {id: 0, name: "", data: ""}
    res.render('profile', {
        "id": data.id,
        "name": data.name,
        "data": data.data
    });
});

app.post(`${config.apiPrefix}/read`, (req, res) => {
    let f = req.body.file;
    if (f.indexOf('flag') >= 0 || f.indexOf('proc') >= 0) {
        res.send("Forbidden!");
    }else {
        fs.stat("/tmp/" + f, function(err,stats) {
            if (!err && stats.size <= 5000) {
                fs.readFile("/tmp/" + f, function(err, data) {
                    if (err) {
                        res.send("Error!");
                    }else {
                        res.header("Cache-Control", "no-store");
                        res.send(data);
                    }
                });
            }else {
                res.send("No this file or too big!");
            }
        });
    } 
});

app.post(`${config.apiPrefix}/write`, (req, res) => {
    let data = JSON.stringify(req.body);
    fs.writeFile("/tmp/" + req.session.file, data, function(err) {
        if (err) {
            res.send("Error!");
        }else {
            res.send("OK!");
        }
    });
});

app.listen(config.server.port, () => console.log(`App listening on port 3000!`));