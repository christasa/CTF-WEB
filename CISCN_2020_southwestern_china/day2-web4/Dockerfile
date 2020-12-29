FROM php:7.2-apache

COPY ./src/ /var/www/html/
COPY flag.txt /flag.txt

RUN set -ex \
    && chown root:root -R /var/www \
    && chmod 0755 -R /var/www 
