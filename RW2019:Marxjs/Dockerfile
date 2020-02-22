FROM ubuntu:16.04

# fxxk GWF
RUN sed -i "s/http:\/\/archive.ubuntu.com/http:\/\/mirrors.tuna.tsinghua.edu.cn/g" /etc/apt/sources.list
RUN apt-get update && apt-get -y upgrade
RUN apt-get install -y vim curl apt-transport-https
# install node12
RUN curl -sL https://nginx.org/keys/nginx_signing.key | apt-key add -
COPY unit.list /etc/apt/sources.list.d/unit.list
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
# install unit : https://unit.nginx.org/installation/#ubuntu
RUN apt-get install -y unit
RUN apt-get install -y unit-dev unit-go unit-jsc8 unit-perl unit-php unit-python2.7 unit-python3.5 unit-ruby
RUN apt-get install -y nodejs
# fxxk GWF
RUN npm config set registry https://registry.npm.taobao.org   # If failed to download typescript, delete it
RUN npm install -g typescript
RUN mkdir /app
COPY real-world-cms /app/real-world-cms
COPY flag /flag
RUN chmod 444 /flag
WORKDIR /app/real-world-cms
RUN npm install
# starting webserver
RUN useradd -m ctf
RUN npm run build:app;
RUN chmod +x build/index.js;
COPY run.sh /root/run.sh
RUN chmod 700 /root/run.sh
CMD ["/root/run.sh"]


