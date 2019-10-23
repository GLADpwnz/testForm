## pls follow the instructions below

#### clone the project into your apache directory

`composer install`

###### needs only for twig, twig - cuz i luv it ;)


#### enter mysql bash:
`sudo mysql -u root`


#### create database and select:
`CREATE DATABASE testdb;`

`use testdb;`


#### create table for the form
`CREATE TABLE user_props (id INT AUTO_INCREMENT NOT NULL, lastName VARCHAR(255) NOT NULL, firstName VARCHAR(255) NOT NULL, middleName VARCHAR(255) NOT NULL, sex VARCHAR(10) NOT NULL, bday date DEFAULT NULL, weight smallint(6) DEFAULT NULL, height smallint(6) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;`


#### open localhost/public/index.php via browser
