FROM python:3.11

COPY . /app

ENV FLAG=NSSCTF{123456}

RUN echo $FLAG > /flag.txt

WORKDIR /app

EXPOSE 5000
CMD ["python", "app.py"]