FROM python:3-slim

RUN useradd -m ctf

ENV LD_LIBRARY_PATH=/usr/local/lib

WORKDIR /home/ctf

RUN cp -R /lib* /home/ctf

# Install necessary compilers and interpreters
RUN sed -i 's/http:\/\/deb.debian.org\/debian\//http:\/\/mirrors.tuna.tsinghua.edu.cn\/debian\//g' /etc/apt/sources.list \
    && apt-get update -o Acquire::http::Timeout=10 \
    && apt-get install -y --no-install-recommends gcc g++ openjdk-11-jdk-headless \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN mkdir /home/ctf/dev && \
    mknod /home/ctf/dev/null c 1 3 && \
    mknod /home/ctf/dev/zero c 1 5 && \
    mknod /home/ctf/dev/random c 1 8 && \
    mknod /home/ctf/dev/urandom c 1 9 && \
    chmod 666 /home/ctf/dev/*

RUN mkdir /home/ctf/usr/local -p
RUN cp -R /usr/local/* /home/ctf/usr/local/

RUN rm -rf /home/ctf/usr/local/etc && \
    rm -rf /home/ctf/usr/local/games/ && \
    rm -rf /home/ctf/usr/local/man && \
    rm -rf /home/ctf/usr/local/share && \
    rm -rf /home/ctf/usr/local/src && \
    rm -f /home/ctf/usr/local/bin/*

RUN rm -f /home/ctf/usr/local/lib/python3.10/socket.py && \
    rm -f /home/ctf/usr/local/lib/python3.10/socketserver.py && \
    rm -rf /home/ctf/usr/local/lib/python3.10/site-packages && \
    rm -f /home/ctf/usr/local/lib/python3.10/subprocess.py

RUN cp /usr/local/bin/python /home/ctf/usr/local/bin/python

RUN chown -R root:ctf /home/ctf && \
    chmod -R 750 /home/ctf

RUN pip install flask

COPY ./start.sh /start.sh
COPY app.py /app/app.py
# Copy input and answer files
COPY 0.in 1.in 2.in 3.in 4.in 5.in 6.in 7.in 8.in 9.in /home/ctf/
COPY 0.ans 1.ans 2.ans 3.ans 4.ans 5.ans 6.ans 7.ans 8.ans 9.ans /home/ctf/
RUN chmod +x /start.sh

EXPOSE 5000

CMD ["/start.sh"]
