FROM php:7.2-apache


COPY ./src /var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod 0755 -R /var/www 

WORKDIR /var/www/html

EXPOSE 80

RUN set -ex \
	&& echo 'flag{a57a1893-897a-47fd-9f8c-1df97b55ee28}' > /flag \
	&& chmod 755 /flag \
	&& chown www-data:www-data /flag
    
