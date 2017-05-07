create database mydb;
use mydb;


/******** Table user *********/
create table user (
    id int auto_increment,
    name varchar(50) not null,
    password varchar(255) not null,
    primary key (id)
);
