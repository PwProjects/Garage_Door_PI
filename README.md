# Garage_Door_PI

Garage Door web application front-end for Raspberry PI.

Requires a web server with PHP installed.

Example Lighttpd with PHP installation for Raspbian:
1. `sudo apt-get update`
2. `sudo apt-get -y install lighttpd`
3. `sudo apt-get -y install php5-common php5-cgi php5`
4. `sudo lighty-enable-mod fastcgi-php`

# Installation
1. Wire your Raspberry PI to a relay, and the relay to your garage door opener.
2. Edit `/includes/server.php` to configure user login information and map the output pins to your Raspberry PI.
3. Copy all source files to your web root folder (e.g. /var/www/html).

# Usage
1. Navigate to your domain name (or your Raspberry PI's IP address if local network) from any javascript enabled browser.
