FROM ctftraining/base_image_nginx_mysql_php_73


COPY index.php /var/www/html/
COPY flag.php /var/www/html/
COPY www.zip /var/www/html/

RUN chmod -R 777 /var/www/html/ 
	

EXPOSE 80

VOLUME ["/var/log/nginx"]
ENTRYPOINT sed -i "s/FLAGGG/$FLAG/" /var/www/html/index.php  && export FLAG=not_flag && FLAG=not_flag && /usr/local/bin/docker-php-entrypoint