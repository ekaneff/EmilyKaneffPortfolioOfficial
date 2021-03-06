#!/usr/bin/env bash

# Use single quotes instead of double quotes to make it work with special-character passwords
PASSWORD='root'
PROJECTFOLDER='myframework'

# create project folder
sudo mkdir "/var/www/html/${PROJECTFOLDER}"

# update / upgrade
sudo apt-get update
sudo apt-get -y upgrade

# install apache 2.5 and php 5.5
sudo apt-get install -y apache2
sudo apt-get install -y php5

# install mysql and give password to installer
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $PASSWORD"
sudo apt-get -y install mysql-server
sudo apt-get install php5-mysql

echo "$PASSWORD"
# install phpmyadmin and give password(s) to installer
# for simplicity I'm using the same password for mysql and phpmyadmin
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
sudo apt-get -y install phpmyadmin

# setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
    DocumentRoot "/var/www/html/${PROJECTFOLDER}"
    <Directory "/var/www/html/${PROJECTFOLDER}">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf

# enable mod_rewrite
sudo a2enmod rewrite


echo -e "\n--- Setting up our MySQL user and db ---\n"
mysql -uroot --password='root' -e "CREATE DATABASE fruits"
mysql -uroot --password='root' -e "grant all privileges on fruits.* to 'root'@'localhost' identified by 'root'" 
mysql -uroot --password='root' -e "USE fruits;create table fruit_table (id INT AUTO_INCREMENT PRIMARY KEY,name varchar(20))"
mysql -uroot --password='root' -e "USE fruits;INSERT INTO fruit_table (name) values ('apples')"


echo -e "\n--- We definitly need to see the PHP errors, turning them on ---\n"
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/short_open_tag = On/" /etc/php5/apache2/php.ini



# restart apache
service apache2 restart

# install git
sudo apt-get -y install git

#install php5-curl
sudo apt-get install php5-curl

# install Composer
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
