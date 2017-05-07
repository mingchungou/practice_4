create database mydb;
use mydb;


/******** Table pagination *********/
create table pagination (
    id int auto_increment,
    article text not null,
    primary key (id)
);


/******** Get first five rows and request the quantity of articles *********/
select sql_calc_found_rows * from pagination limit 0, 5;


/******** Get the quantity of articles by above *********/
select found_rows() as total;
