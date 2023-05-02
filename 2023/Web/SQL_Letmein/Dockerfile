FROM ctftraining/base_image_nginx_mysql_php_73


COPY html /var/www/html



RUN sh -c 'mysqld_safe &' \
	&& sleep 5s \
    && mysqladmin -uroot password '123456' \
	&& mysql -e "CREATE DATABASE ctf;use ctf;create table users (id varchar(300),username varchar(300),password varchar(300));insert into users values('1','tanji','OHHHHHHH');insert into users values('2','fake_flag','F1rst_to_Th3_eggggggggg!} (4/4)');" -uroot -p123456 \
    && chmod -R 777 /var/www/html/ \
    && rm -rf /tmp/* \
    && rm -rf /etc/apk
	


EXPOSE 80

VOLUME ["/var/log/nginx"]

ENTRYPOINT  /usr/local/bin/docker-php-entrypoint