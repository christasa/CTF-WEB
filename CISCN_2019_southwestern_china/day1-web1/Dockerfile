FROM python:3.6-alpine


COPY ./app /home/ciscn/app
WORKDIR /home/ciscn/app
RUN pip install -r requirements.txt


WORKDIR /home/ciscn/app
ENTRYPOINT ["python"]
CMD ["app.py"]
