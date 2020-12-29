from  flask import render_template,Blueprint,render_template_string,redirect,url_for,flash,request,session,make_response
from application.Form import Login_Form,Func_User,Func_Admin
from application.Waf import waf_config
import os.path
import json
import datetime
import time
import html
import cgi


KSE=Blueprint('kseonline',__name__)

@KSE.route('/welcome')
def index():
    try:
        if session['name']:
            return render_template('appliacation/index.html',datetime=str(datetime.date.today()),name=cgi.escape(session['name'].replace('{','')))
        else:
            return redirect(url_for('kseonline.login'))
    except:
        session['name']=None
        return redirect(url_for('kseonline.login'))


@KSE.route('/login')
def login():
    if  session['name']==None:
        form = Login_Form()
        return render_template('appliacation/login.html', form=form)
    else:
        return render_template('appliacation/index.html',datetime=str(datetime.date.today()),name=cgi.escape(session['name'].replace('{',"")))

@KSE.route('/check_login',methods=['POST'])
def check_login():
    form = Login_Form()
    username = form.username.data
    password = form.password.data

    if username!="" and password != "":
        if username == 'admin':
            return render_template('hack.html')
        else:
            session['name']=username
            return redirect(url_for('kseonline.index'))
    else:
        return render_template('hack.html')

@KSE.route('/logout')
def logout():
    session['name']=None
    return redirect(url_for('kseonline.login'))

@KSE.route('/func',methods=['GET','POST'])
def func_user():
    if session['name']!=None:
        form = Func_User()
        return  render_template('appliacation/func.html',form=form)
    else:
        return redirect(url_for('kseonline.login'))
@KSE.route('/info',methods=['POST'])
def GetInfo():
    form = Func_User()
    status_1 = form.status_1.data
    if form.status_2.data == 'Yes' and form.status_3.data == 'Yes':
        health='Yes'
    else:
        health='No'
    status_3 = form.status_3.data
    ntime = str(datetime.date.today())
    name = waf_config(session['name'])
    data_all ="name:"+name+"\nhealth:"+health+"\nback_sc:"+status_3+"\ntime:s"+ntime
    res = 'res:'+ data_all
    return render_template_string(res)
@KSE.route('/admin123',methods=['GET'])
def func_admin():
    if session['name']=='admin':
        form = Func_Admin()
        return  render_template('appliacation/admin.html',form=form)
    else:
        return redirect(url_for('kseonline.login'))
@KSE.route('/admin_dowmload',methods=['POST'])
def admin_dowmload():
    if session['name']=='admin':
        form = Func_Admin()
        filename = form.filename.data
        f = open("/app/static/{}".format(filename),"r")
        res = f.read()
        f.close()
        return res
