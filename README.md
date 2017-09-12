# Garage_Door_PI
Garage Door web application front end for Raspberry PI

Requires a web server application and with PHP installed.

Edit server.php to configure login information and map the pins to your Raspberry PI.

Lighttpd with PHP installation for Raspbian:
1. sudo apt-get update
2. sudo apt-get -y install lighttpd
3. sudo apt-get -y install php5-common php5-cgi php5
4. sudo lighty-enable-mod fastcgi-php
  
Copy source files to your web root folder (e.g. /var/www/html).
