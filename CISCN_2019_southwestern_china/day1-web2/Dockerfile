FROM python:3.6-alpine


COPY ./src /var/www/html
WORKDIR /var/www/html

RUN pip install -r requirements.txt
RUN echo 'flag{82d6e5ad-eaec-474a-b519-6c457b0ae0fb} ' > /flag \
	&& chmod 755 /flag 


CMD ["gunicorn", "-w", "4", "-b", "0.0.0.0:5000", "main:app"]

