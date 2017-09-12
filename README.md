# Garage_Door_PI
Garage Door web application front end for Raspberry PI

Requires a web server and with php.

Edit server.php to configure login information and map the pins to your Raspberry PI.

Example Lighttpd /w pHp setup:
  sudo apt-get update
  sudo apt-get -y install lighttpd
  sudo apt-get -y install php5-common php5-cgi php5
  sudo lighty-enable-mod fastcgi-php
  
Copy source files to your web root, usually /var/www/html.
