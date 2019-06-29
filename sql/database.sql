-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

--
-- ULearn database creation and population
--

set SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
set time_zone = '+00:00';

create table User(
  User_Id int auto_increment primary key,
  User_Email varchar(255) not null,
  User_Password varchar(255) not null
)engine=innodb default charset=utf8;

create table UserScore(
  UserScore_Id datetime primary key,
  User_Id int not null,
  score int not null,
  subject varchar(30) not null,
  level varchar(30) not null,
  foreign key (User_Id) references User(User_Id)
)engine=innodb default charset=utf8;

-- superclass
create table Question(
  Question_Id int auto_increment primary key,
  Question_Description varchar(255) not null,
  Question_Answer varchar(255) not null,
  Question_Option varchar(255) not null
)engine=innodb default charset=utf8;

-- subclasses
create table English(
  Id int auto_increment primary key,
  Level varchar(30) not null,
  foreign key (Id) references Question(Question_Id)
)engine=innodb default charset=utf8;

create table Math(
  Id int auto_increment primary key,
  Level varchar(30) not null,
  foreign key (Id) references Question(Question_Id)
)engine=innodb default charset=utf8;

create table Computing(
  Id int auto_increment primary key,
  Level varchar(30) not null,
  foreign key (Id) references Question(Question_Id)
)engine=innodb default charset=utf8;

create table UserAnswer(
  UserAnswer_Id int auto_increment primary key,
  Question_Id int not null,
  User_Id int not null,
  foreign key (Question_Id) references Question(Question_Id),
  foreign key (User_Id) references User(User_Id)
)engine=innodb default charset=utf8;


-- populating the Database
insert into Question values (1,'I -- -- --  running yesterday','went','did, went, wanted');
insert into Question values (2,'Tomorrow -- -- - be a good day','will','will,not, has');
insert into Question values (3,'My birthday -- -- - last week','was','was, did, now');
insert into Question values (4,'Harry -- -- - mean to me','was','has, did, was');
insert into Question values (5,'-- -- - time please?','Have you got the','What is, Is the, Have you got the');
insert into English values (1,'Easy');
insert into English values (2,'Easy');
insert into English values (3,'Easy');
insert into English values (4,'Easy');
insert into English values (5,'Easy');

insert into Question values (6,'11 + 9 =','20','19, 21,20');
insert into Question values (7,'8 * 11 =','88','90, 88, 92');
insert into Question values (8,'20 * 5 =','100','10, 100, 1000');
insert into Question values (9,'50 / 5 =','10','25, 10, 50');
insert into Question values (10,'50 / 2 =','25','25, 15, 35');
insert into Math values (6,'Easy');
insert into Math values (7,'Easy');
insert into Math values (8,'Easy');
insert into Math values (9,'Easy');
insert into Math values (10,'Easy');

insert into Question values (11,'Identify the programming language?', 'Python', 'Snake, Noodle, Python');
insert into Question values (12,'What is the data type of Hello?', 'String', 'Words, letters, String');
insert into Question values (13,'What does HTML stand for?', 'Hypertext Markup Language', 'Hypertype Mandate Language, Help Tab Marked Loop, Hypertext Markup Language');
insert into Question values (14,'What does CSS stand for?', 'Cascading Style Sheets', 'Can Style Sheet, Cascading Static Sheet, Cascading Style Sheets');
insert into Question values (15,'What language is HTML?', 'markup language', 'programming language, markdown language, markup language');
insert into Computing values (11,'Easy');
insert into Computing values (12,'Easy');
insert into Computing values (13,'Easy');
insert into Computing values (14,'Easy');
insert into Computing values (15,'Easy');

insert into Question values (16,'It is my birthday today!','Congratulations','Congratulations, Thanks a lot, Help yourself, Well done');
insert into Question values (17,'Fate smiles ...... those who untiringly grapple with stark realities of life.','on','with, over, on, round');
insert into Question values (18,'Catching the earlier train will give us the ...... to do some shopping.','chance','chance, luck, possibility, occasion');
insert into Question values (19,'I saw a ...... of cows in the field.','herd','group, herd, swarm, flock');
insert into Question values (20,'Success in this examination depends ...... hard work alone. ','on','At, On, For, Over');
insert into English values (16,'Medium');
insert into English values (17,'Medium');
insert into English values (18,'Medium');
insert into English values (19,'Medium');
insert into English values (20,'Medium');

insert into Question values (21,'20 % of 2 is equal to ....','0.04','20,4,0.4,0.04');
insert into Question values (22,'Which prime number is closest to 100?','101','79,99,100,101');
insert into Question values (23,'How many degrees are there in three right angles?','270','90,180,270,360');
insert into Question values (24,'What is the value of a if 3a+12=39?','9','3,6,9,18');
insert into Question values (25,'What is 80% of 295?','236','189,236,286,312');
insert into Math values (21,'Medium');
insert into Math values (22,'Medium');
insert into Math values (23,'Medium');
insert into Math values (24,'Medium');
insert into Math values (25,'Medium');

insert into Question values (26,'What was the first machine that could add, subtract, multiply, and divide?','arithmometer','abacus, arithmometer, modern computer');
insert into Question values (27,'Which one of these is not an input device?','speaker','speaker, mouse, scannar');
insert into Question values (28,'Microprocessors are used in: ','computers','DVD players, computers, calculators');
insert into Question values (29,'What is not a way computers can output information?','microphone','printer, monitor, microphone');
insert into Question values (30,'What does the acronym URL stand for?','uniform resource locator','universal reading location, uniform research locale, uniform resource locator');
insert into Computing values (26,'Medium');
insert into Computing values (27,'Medium');
insert into Computing values (28,'Medium');
insert into Computing values (29,'Medium');
insert into Computing values (30,'Medium');

insert into Question values (31,'Although initial investigations pointed towards him ......','the subsequent events proved that he was innocent','the preceding events corroborated his involvement in the crime, the additional information confirmed his guilt, the subsequent events established that he was guilt, the subsequent events proved that he was innocent');
insert into Question values (32,'Ayesha always ...... the permission of her father before going for movies.','seeks','seeking, seeks, sought, seeker');
insert into Question values (33,'You have not had your lunch yet, ...... you?','have','are, are not, have, have not');
insert into Question values (34,'The waiter has not brought the coffee ...... I have been here an hour already.','yet','till, up, yet');
insert into Question values (35,'Even if it rains I shall come means ......','I will certainly come whether it rains or not',' if I come it will not rain, if it rains I shall not come, I will certainly come whether it rains or not, whenever there is rain I shall come');
insert into English values (31,'Hard');
insert into English values (32,'Hard');
insert into English values (33,'Hard');
insert into English values (34,'Hard');
insert into English values (35,'Hard');

insert into Question values (36,'The graphs of the two linear equations a x + b y = c and b x - a y = c, where a, b and c are all not equal to zero','perpendicular','are parallel, intersect at one point, intersect at two point, perpendicular');
insert into Question values (37,'What is four-fifths as a decimal?','0.8','7,8,0.7,0.8');
insert into Question values (38,'How many months are there in twelve years?','144','121,141,144,150');
insert into Question values (39,'If y=10x − 1 and the value of x is 10, what is the value of y?','99','88,89,99,100');
insert into Question values (40,'What is nine-tenths of 2000?','1800','80,180,800,1800');
insert into Math values (36,'Hard');
insert into Math values (37,'Hard');
insert into Math values (38,'Hard');
insert into Math values (39,'Hard');
insert into Math values (40,'Hard');

insert into Question values (41,'What determines the paths used to exchange information on the internet','routers','routers, your computer, web servers');
insert into Question values (42,'What Internet connection speed is the fastest?','1.5 Mbps','1,024 bps, 1.5 Mbps, 400 Kbps');
insert into Question values (43,'The creator of COBOL programming language and author of the paper The Education of a Computer was: ','Grace Hopper','Steve Jobs, Ted Hoff, Grace Hopper');
insert into Question values (44,'Which of the following is the universal gate?','nand-gate','or-gate, and-gate, nand-gate');
insert into Question values (45,'What does WAN mean?','Wide Area Network','Wide Area Network, Wine Area Network, Woll Area Network');
insert into Computing values (41,'Hard');
insert into Computing values (42,'Hard');
insert into Computing values (43,'Hard');
insert into Computing values (44,'Hard');
insert into Computing values (45,'Hard');
