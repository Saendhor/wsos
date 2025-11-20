--create database exam;
USE myDatabase;

CREATE TABLE santabox (
   id          int auto_increment primary key,
   name        varchar(32) not null,
   gift        varchar(128) not null,
   quantity    int default 1,
   delivered   smallint default 0
);


-- https://viralnova.com/best-selling-christmas-gifts/
insert into santabox(name, gift, quantity, delivered) values
('Kids in 1936', 'Monopoly',1,1),
('Kids in 1943', 'Slinky',1,1),
('Kids in 1952', 'Mr. Potato Head',1,1),
('Kids in 1959', 'Barbie',1,1),
('Kids in 1975', 'Pet Rock',1,1),
('Kids in 1978', 'Hungry Hungry Hippos',1,1),
('Kids in 1980', 'Rubik Cube',1,1),
('Kids in 1989', 'Game Boy',1,1),
('Kids in 1991', 'POG',1,1),
('Kids in 1995', 'Beanie Babies',1,1),
('Kids in 1996', 'Tickle Me Elmo',1,1),
('Kids in 1997', 'Tamagotchis',1,1),
('Kids in 1998', 'Furby',1,1),
('Kids in 1999', 'Pokemon',1,1),
('Kids in 2000', 'Razor scooters',1,1),
('Kids in 2001', 'Bratz',1,1),
('Kids in 2007', 'iPod Touch',1,1),
('Kids in 2007', 'iPad',1,1),
('Kids in 2012', 'Wii U',1,1),
('Kids in 2016', 'NES Classic',1,1)
