Pizzeria
========
To start you have to install: php, apache2 and mysql.

Set Apache
----------
1. Go in the apache folder and set the virtual host:
 ```terminal
 sudo nano /etc/apache2/sites-available/000-default.conf
```

2. Add this statement:
```nano
setEnv MYSQL_HOST "the name host"
setEnv MYSQL_PASSWORD "the password"
setEnv PASSWORD_SALT "the salt"
```

3. Restart apache:
```terminal
sudo service apache2 restart
```

Do you have to put your host name, your password and your
salt for the cryptography.



Set Database User
----------
1. Open mysql as root and insert password:
```terminal
mysql -u root -p
```

2. Create a database:
```mysql
CREATE DATABASE pizzeria;
```

3. And next:
```mysql
USE pizzeria;
```

4. Create a table for the user:
```mysql
CREATE TABLE utenti(username varchar(20), password varchar(40), name varchar(15), PRIMARY KEY(username));
```


 Set Database Pizze
 ----------
1. Open mysql as root and insert password:
```terminal
mysql -u root -p;
```

2. Create a table for the user:
```mysql
CREATE TABLE utenti(name varchar(20), price float, description varchar(40), image varchar(15), PRIMARY KEY(name));
```

3. For each pizza you must run the following command:
```mysql
INSERT INTO pizze (name, description, price, image) VALUES ('<name>', '<description>', <price>, '<image in ./assets/images>')
```
