FROM python:3.11

COPY . /app

ENV FLAG=NSSCTF{123456}

WORKDIR /app
RUN pip install flask
EXPOSE 5000
CMD ["python", "app.py"]