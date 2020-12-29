FROM php:5.6-fpm-alpine

COPY ./src /var/www/html
COPY web3.sql /tmp/web3.sql
COPY nginx.conf /tmp/nginx.conf
COPY run.sh /var/www/html/run.sh

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories \
    && apk add --update --no-cache tar nginx mysql mysql-client \
    && mkdir /run/nginx \
    # && sed -i 's/skip-network/#skip-network/' /etc/my.cnf.d/mariadb-server.cnf \
    && mysql_install_db --user=mysql --datadir=/var/lib/mysql \
    && sh -c 'mysqld_safe &' \
    && sleep 5s \
    && mysqladmin -uroot password 'root' \
    && mysql -uroot -proot -e "UPDATE mysql.user SET Password=PASSWORD('root') WHERE user='root';" \
    && mysql -uroot -proot -e "source /tmp/web3.sql;" \
    && cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
    && sed -i -e 's/display_errors.*/display_errors = Off/' /usr/local/etc/php/php.ini \
    && mv /tmp/nginx.conf /etc/nginx/nginx.conf \
    && chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html

EXPOSE 80

CMD ["/bin/sh", "run.sh"]
