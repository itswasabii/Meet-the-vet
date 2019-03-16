DROP DATABASE IF EXISTS veterinary;
CREATE DATABASE IF NOT EXISTS veterinary;
USE Veterinary;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
UserID int(17) NOT NULL AUTO_INCREMENT,
Firstname varchar(50) NOT NULL DEFAULT '',
Lastname varchar(50) NOT NULL DEFAULT '',
Username varchar(60) NOT NULL DEFAULT '',
email varchar(60) NOT NULL DEFAULT '',
Password varchar(60) NOT NULL DEFAULT '',
DateOfBirth date,
Usertype varchar(60) NOT NULL DEFAULT '',
Account_Created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
Account_Last_Updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY(UserID),
UNIQUE KEY(email),
UNIQUE KEY(Username)
);

DROP TABLE IF EXISTS articles;
CREATE TABLE IF NOT EXISTS articles(
Article_ID int(17) NOT NULL AUTO_INCREMENT,
Username varchar(60) NOT NULL DEFAULT '',
email varchar(60) NOT NULL DEFAULT '',
Phone_Number varchar(60) NOT NULL DEFAULT '',
Subject varchar(60) NOT NULL DEFAULT '',
content varchar(1000) NOT NULL DEFAULT '',
PRIMARY KEY(Article_ID));