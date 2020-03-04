import requests
import time
from bs4 import BeautifulSoup
import re

host = "http://localhost:8081/"
def calc(a, inputs):
    formats = ''
    for i in range(len(a)):
        formats += a[i].text
    formats = str(inputs) + formats
    formats = formats[:-1]
    ans = eval(formats)
    return ans


def exploit():
    ses = requests.session()
    get_content = ses.get(host)
    for i in range(5):
        html = get_content.text
        soup=BeautifulSoup(html,'html.parser')
        inputs = 10000019
        a=soup.find_all('div',attrs={'style': 'display:inline;'})
        ans = calc(a, inputs)
        time.sleep(2)
        anwser = {
        'input' : str(inputs),
        'ans' : str(ans)
        }

        get_content = ses.post(host, data = anwser)
        if 'right answer' in get_content.text:
            print("success for %d'th "%(i + 1))

    flag = re.findall(r'flag{.*}', get_content.text)
    flag = flag[0]
    print(flag)

    

if __name__ == '__main__':
    exploit()