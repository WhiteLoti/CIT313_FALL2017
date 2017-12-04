# SQL script used for new tables

CREATE TABLE `pictures` 
(
    `uID` int(11) NOT NULL,
    `profile_picture` BLOB,
    `type` VARCHAR(25) NOT NULL   
);

CREATE TABLE biographies
(
    `uID` int(11) NOT NULL,
    `biography` text,
    `school` VARCHAR(50),
    `graduation` datetime,
    `major` VARCHAR(50),
    `concentration` VARCHAR(50),
    `interest` text
);
