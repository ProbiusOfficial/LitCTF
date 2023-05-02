#!/bin/sh	
sed -i "s/flag{testflag}/$FLAG/" /var/www/html/index.php 
export FLAG=""	
