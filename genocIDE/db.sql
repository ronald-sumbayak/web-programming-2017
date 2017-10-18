drop database if exists PW2_B_5115100174;
create database PW2_B_5115100174;
use PW2_B_5115100174;

create table userdata (
    email varchar (50),
    pass  varchar (50),
    primary key (email)
);

create table files (
    own      varchar (50),
    filename varchar (50),
    content  text,
    primary key (filename),
    foreign key (own) references userdata (email)
);