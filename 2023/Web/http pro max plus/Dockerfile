FROM ctftraining/base_image_nginx_mysql_php_56     

LABEL Author="J_0k3r"
LABEL Blog="https://j-0k3r.github.io/"

COPY src /var/www/html 
    
RUN mv /var/www/html/flag.sh / \	
    && chmod +x /flag.sh