#!/bin/bash

# import SQL schema
mysql -u root c9 < database-dump.sql

# change VHOST file
sudo sed -i -e "s/\/workspace\/ssense-test/\/workspace\/ssense-test\/web/gI" /etc/apache2/sites-available/001-cloud9.conf

# restart apache
sudo service apache2 restart
