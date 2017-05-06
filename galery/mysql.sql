create database mydb;
use mydb;


/******** Table image *********/
create table image (
    id int auto_increment,
    photo varchar(255),
    title varchar(255),
    description text,
    primary key (id);
);
