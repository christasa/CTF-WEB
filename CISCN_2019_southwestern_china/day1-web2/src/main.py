#-*- coding:utf-8 -*-
from flask import *
from os import urandom
from jinja2 import Template
from hashlib import md5
import sqlite3

app=Flask(__name__)
app.config['SECRET_KEY']=urandom(24)


@app.route('/',methods=['GET','POST'])
def root():
    if session.get('ID')=='admin':
        return redirect(url_for('index'))
    return redirect(url_for('login'))


def sql_filter(x):
    x = x.replace(' ', '')
    x = x.replace('select', '')
    x = x.replace('union', '')
    x = x.replace('from', '')
    return x

def md5encode(x):
    md=md5()
    md.update(x.encode(encoding="utf-8"))
    return md.hexdigest()

def sql_login(username,password):
    conn=sqlite3.connect("database.db")
    c=conn.cursor()
    curser=c.execute("select password from users where username='{}' limit 1;".format(sql_filter(username)))
    for row in curser:
        if row[0]==md5encode(password):
            conn.close()
            return True
        else:
            conn.close()
            return False


@app.route('/login',methods=['GET','POST'])
def login():
    if request.method=='POST':
        username=request.form['username']
        password=request.form['password']
        if sql_login(username,password)==True:
            session['ID']='admin'
            return redirect(url_for('index'))
        else:
            return render_template('login.html')
    return render_template('login.html')


def jinja_filter(x):
    x=x.replace('[','')
    x=x.replace(']','')
    print(x)
    return x


@app.route('/index')
def index():
    if session.get('ID')=='admin':
        name=request.args.get('username','admin')
        t=Template(
            '''<img src="static/img/niaoju.jpeg" alt="巫女赛高"><!--/flag--><h1>Welcome {}<h1/>'''.format(jinja_filter(name)))
        return t.render()
    else:
        return redirect(url_for('login'))


@app.route('/robots.txt')
def robot():
    return render_template('robots.txt')

@app.errorhandler(404)
def not_found(error):
    return render_template('404.html'),404

if __name__=='__main__':
    # app.run(host="0.0.0.0",port=80,debug=True)
    app.run()
