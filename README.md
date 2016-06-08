Pizzeria
========
To start you have to install: php, apache2 and mysql.

Set Apache
----------
1. Go in the apache folder and set the virtual host:
 >sudo nano /etc/apache2/sites-available/000-default.conf

2. Add this statement:
 >setEnv MYSQL_HOST "the name host"

 >setEnv MYSQL_PASSWORD "the password"

 >setEnv PASSWORD_SALT "the salt"

 3. Restart apache:
 >sudo service apache2 restart

Do you have to put your host name, your password and your
salt for the cryptography.


Set Database
----------
1. Open mysql as root and insert password:
 >mysql -u root -p

2. Create a database:
 >CREATE DATABASE pizzeria;

3. And next:
 >USE pizzeria;

4. Create a table for the user:
 >CREATE TABLE utenti(username varchar(20), password varchar(40), name varchar(15), PRIMARY KEY(username));
