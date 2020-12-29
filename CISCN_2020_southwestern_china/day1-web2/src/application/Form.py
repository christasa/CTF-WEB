from wtforms import StringField,SubmitField,PasswordField,SelectField
from wtforms.validators import  Required,DataRequired
from flask_wtf import FlaskForm
import datetime
#登录表单
class Login_Form(FlaskForm):
    username=StringField('username',validators=[Required()])
    password=PasswordField('password',validators=[Required()])
    submit=SubmitField('Login')
class Func_User(FlaskForm):
    status_1=SelectField('本人是否健康',validators=[DataRequired('默认')],choices=[('',''),('Yes','Yes'),('No','No')])
    status_2=SelectField('家人是否健康',validators=[DataRequired('默认')],choices=[('',''),('Yes','Yes'),('No','No')])
    status_3=SelectField('  是否返校  ',validators=[DataRequired('默认')],choices=[('',''),('Yes','Yes'),('No','No')])
    submit=SubmitField('提交')
class Func_Admin(FlaskForm):
    filename = StringField('文件名',validators=[Required()],default=str('img/logo.jpg'))
    submit =SubmitField('Get It!')