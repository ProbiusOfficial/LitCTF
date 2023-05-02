FROM python:3.11

COPY . /app

RUN echo 'flag=FLAG' > /flag

WORKDIR /app

EXPOSE 9999
CMD ["python", "app.py"]