create database mydb;
use mydb;


/******** Table user *********/
drop table if exists user;
create table user (
    id int auto_increment,
    name varchar(50) not null,
    password varchar(255) not null,
    primary key (id)
);

truncate user;
select * from user;
describe user;
