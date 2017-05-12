create database mydb;
use mydb;


/******** Table blog *********/
drop table if exists blog;
create table blog (
    id int auto_increment,
    title varchar(255) not null,
    extract varchar(255) not null,
    created timestamp default current_timestamp,
    thumb varchar(100) not null,
    text text not null,
    primary key (id)
);

truncate blog;
select * from blog;
describe blog;
