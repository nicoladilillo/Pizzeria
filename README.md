# Pizzeria
To start do you have to unstall: php, apache2 and mysql.

##Set Apache
-Go in the apache folder and set the virtual host
 'sudo nano /etc/apache2/sites-available/000-default.conf'

-and add this statement:
 'setEnv MYSQL_HOST "the name host"'
 'setEnv MYSQL_PASSWORD "the password"'
Do you have to put your host name and your password


##Set Database
-Open mysql as root: 'mysql -u root -p' and insert password;

-Create a database:
  'CREATE DATABASE pizzeria';

-Create a table:
  'CREATE TABLE utenti(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username varchar(20), password varchar(15), nome varchar(15));'
