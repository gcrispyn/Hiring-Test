#!/bin/bash

# install some librairies
sudo apt-get update
sudo apt-get -y install mysql-server php5-mysql php5 php5-memcached memcached

# # change VHOST file
sudo sed -i -e "s/workspace/workspace\/web/g" /etc/apache2/sites-available/001-cloud9.conf

# # Include dependencies
composer install

# # restart apache
sudo service apache2 restart

# # start Redis
sudo service redis-server start

echo 'Database creation...'
mysql -uroot < ~/workspace/install/install-database.sql
echo 'Database created !'

php ~/workspace/install/insert-data.php