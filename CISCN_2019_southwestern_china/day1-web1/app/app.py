# -*- coding:utf-8 -*-
from flask import Flask, render_template, render_template_string, request
import tax
from jinja2 import Template
import re

app = Flask(__name__)
flag = 1
@app.route('/cal', methods=['GET'])
def cal_tax() -> 'html':
    try:
        # income = int(request.form['income'])
        income = int(request.args.get('income', 0))
        insurance = int(request.args.get('insurance', 0))
        exemption = int(request.args.get('exemption', 0))
        # insurance = int(request.form['insurance'])
        # exemption = int(request.form['exemption'])
        before = income-insurance-exemption
        free = 5000
        rule = [
        (80000, 0.45, 15160),
        (55000, 0.35, 7160),
        (35000, 0.3, 4410),
        (25000, 0.25, 2660),     
        (12000, 0.2, 1410),
        (3000, 0.1, 210),
        (0,0.03, 0)
        ]
        title = '个税计算结果'
        mytax = tax.calc_tax(before,free,rule)
        aftertax_income = income - insurance - mytax
        return render_template('results.html',
                                the_title=title,
                                the_income=str(income),
                                the_insurance=str(insurance),
                                the_exemption=str(exemption),
                                the_tax=str(mytax),
                                the_aftertax_income=str(aftertax_income))
    except ValueError:
        print('------------error-------------\n\n')
        def safe_jinja(s):
            # 替换括号
            s = s.replace('()', '')
            s = s.replace('[]', '')
            blacklist = ['import','os','sys','commands','subprocess','open','eval']
            for bl in blacklist:
                s = s.replace(bl, "")
            return s
        title = "输入参数的值有错"
        # income = request.form['income']
        # income = request.form['income']
        # insurance = request.form['insurance']
        # exemption = request.form['exemption']
        income = request.args.get('income', 0)
        insurance = request.args.get('insurance', 0)
        exemption = request.args.get('exemption', 0)
        print(safe_jinja(exemption))
        template = '''
        <!doctype html>
        <html>
            <head>
                <title>%s</title>
                <link rel="stylesheet" href="static/hf.css" />
            </head>
            <body>
            </body>
        </html>
            <h2>%s</h2>
            <table>
                <p>请检查输入的信息:</p>
                <tr><td>税前月收入:</td><td>%s</td></tr>
                <tr><td>四险一金:</td><td>%s</td></tr>
                <tr><td>专项附加扣除:</td><td>%s</td></tr>
            </table>
        ''' % (title, title, safe_jinja(income), safe_jinja(insurance), safe_jinja(exemption))
        t = Template(template)
        return t.render()

@app.route('/')
@app.route('/index')
def entry_page() -> 'html':
    return render_template('index.html', 
                            the_title='PY个人所得税计算器')

@app.errorhandler(404)
def page_not_found(e) -> 'html':
    return render_template('404.html',
    url=request.url), 404

@app.errorhandler(500)
def server_error(e) -> 'html':
    template = '''
    <title>500 Internal Server Error</title>
        <h1>Internal Server Error</h1>
    <p>The server encountered an internal error and was unable to complete your request. 
    Please check jinjia2 syntax. Either the server is overloaded or there is an error in the application.</p>
    '''
    return render_template_string(template), 500
if __name__ == '__main__':
    app.run(debug=False, port = 8003, host="0.0.0.0")