FROM ctftraining/base_image_nginx_mysql_php_73


COPY index.php /var/www/html/

RUN chmod -R 777 /var/www/html/ \
    && mkdir /var/www/html/upload \
    && chmod -R 777 /var/www/html/index.php \
    && chmod -R 777 /var/www/html/upload \
	&& echo 'flag=FLAG' > /flag

EXPOSE 80

VOLUME ["/var/log/nginx"]
ENTRYPOINT sed -i "s/FLAG/$FLAG/" /flag  && export FLAG=not_flag && FLAG=not_flag && /usr/local/bin/docker-php-entrypoint