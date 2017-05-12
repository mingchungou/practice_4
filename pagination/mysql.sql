create database mydb;
use mydb;


/******** Table pagination *********/
drop table if exists pagination;
create table pagination (
    id int auto_increment,
    article text not null,
    primary key (id)
);

truncate pagination;
select * from pagination;
describe pagination;


/******** Some execute statement *********/
/* Get first five rows and request the quantity of articles */
select sql_calc_found_rows * from pagination limit 0, 5;

/* Get the quantity of articles by above */
select found_rows() as total;
