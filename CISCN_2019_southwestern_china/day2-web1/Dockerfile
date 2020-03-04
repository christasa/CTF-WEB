FROM php:7.2-apache


COPY ./web /var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod 0755 -R /var/www 

WORKDIR /var/www/html

EXPOSE 80

RUN set -ex \
	&& echo 'flag{flag_test} ' > /flag \
	&& chmod 755 /flag \
	&& chown www-data:www-data /flag
    
