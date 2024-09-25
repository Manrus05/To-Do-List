create database wgaufgaben;

use wgaufgaben;

create table aufgaben(
    id int not null primary key auto_increment,
    bezeichnung varchar(50) not null
);

create table aktuelle(
    id int not null primary key auto_increment,
    bezeichnung varchar(50) not null,
    zeitstempel datetime not null default current_time(),
    regelmesigkeit int not null
);

create table erledigt(
    id int not null primary key auto_increment,
    nutzer varchar(30),
    bezeichnung varchar(30),
    zeitstempel datetime not null default current_time(),
);
