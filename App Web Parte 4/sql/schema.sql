create database bankoint;
use bankoint;

create table user(
	id int not null auto_increment primary key,
	name varchar(50),
	lastname varchar(50),
	username varchar(50),
	email varchar(255),
	password varchar(60),
	image varchar(255),
	status int default 1,
	kind int default 1,
	created_at datetime
);

/**
* password: encrypted using sha1(md5("mypassword"))
* status: 1. active, 2. inactive, 3. other, ...
* kind: 1. root, 2. other, ...
**/

/* insert user example */
insert into user (name,username,password,created_at) value ("Administrator","admin",sha1(md5("admin")),NOW());


create table person(
	id int not null auto_increment primary key,
	name varchar(50),
	lastname varchar(50),
	email varchar(255),
	address varchar(255),
	phone varchar(255),
	image varchar(255),
	password varchar(255),
	created_at datetime
);


create table operation(
	id int not null auto_increment primary key,
	description varchar(50),
	amount double,
	person_id varchar(255),
	kind int, /* 1. entrada, 2. salida */
	status int default 1, /* 0. pendiente, 1. realizado, 2. cancelado */ 
	created_at datetime
);

