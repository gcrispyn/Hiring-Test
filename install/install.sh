#!/bin/bash

# import SQL schema
mysql -u root c9 < install/database-dump.sql

# change VHOST file
sudo sed -i -e "s/workspace/workspace\/web/g" /etc/apache2/sites-available/001-cloud9.conf

# Include dependencies
composer install

# restart apache
sudo service apache2 restart
