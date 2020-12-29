FROM python:3.6-alpine


COPY ./src /app
COPY flag2333_canufindit ./flag.txt
WORKDIR /app

RUN pip install -r requirements.txt


CMD ["gunicorn", "-w", "4", "-b", "0.0.0.0:5000", "app:app"]
