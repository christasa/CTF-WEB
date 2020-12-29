FROM php:7.3-fpm-alpine

COPY ./src /var/www/html
COPY ./files /tmp/
COPY flag.txt /flag.txt

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk add --update --no-cache tar nginx mysql mysql-client \
    && mkdir /run/nginx \
    && docker-php-source extract \
    && docker-php-ext-install pdo_mysql mysqli \
    && docker-php-source delete \
    && mysql_install_db --user=mysql --datadir=/var/lib/mysql \
    && sh -c 'mysqld_safe &' \
    && sleep 5s \
    && mysqladmin -uroot password 'root' \
    && mysql -e "source /tmp/web.sql;" -uroot -proot \
    && chmod +x /usr/local/bin/docker-php-entrypoint \
    && mv /tmp/nginx.conf /etc/nginx/nginx.conf \
    && chown -R www-data:www-data /var/www/html \ 
    && mv /tmp/run.sh /var/www/html/run.sh \  
    && mv /tmp/docker-php-ext-mysqli.ini /usr/local/etc/php/conf.d \
    && mv /tmp/docker-php-ext-pdo_mysql.ini /usr/local/etc/php/conf.d \
    && rm -rf /tmp/*

WORKDIR /var/www/html

EXPOSE 80

CMD ["/bin/sh", "run.sh"]
