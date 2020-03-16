FROM node:11-alpine
ADD ./src /var/www/web/
WORKDIR /var/www/web/

RUN npm config set registry https://registry.npm.taobao.org 
RUN npm install -g typescript

RUN echo 'flag{flag_test}' > /flag && \
	chmod 755 flag

EXPOSE 3000
CMD ["node","server.js"]

