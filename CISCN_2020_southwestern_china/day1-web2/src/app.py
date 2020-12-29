from flask import Flask,redirect,url_for,render_template,session
from flask_moment import Moment
from flask_bootstrap import Bootstrap

app = Flask(__name__)
app.config['SECRET_KEY']='tulongzhezhongjiangchenglong'

bootstrap = Bootstrap(app)
moment=Moment(app)

from application.View import KSE
app.register_blueprint(blueprint=KSE,url_prefix='/kaisaier')

@app.errorhandler(404)
def miss(e):
    return render_template('404.html')
@app.errorhandler(500)
def error(e):
    return render_template('500.html')
@app.route('/')
def index():
    return redirect(url_for('kseonline.index'))

if __name__ == '__main__':
    app.run(host='0.0.0.0',port=5000)