FROM php:7.2-apache


COPY ./html /var/www/html
COPY flag.txt /flag.txt

RUN chown -R www-data:www-data /var/www/html \
    && chmod 0755 -R /var/www

WORKDIR /var/www/html

EXPOSE 80

