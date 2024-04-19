CREATE DATABASE test2;
 use test2;
CREATE TABLE users (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       firstname VARCHAR(30) NOT NULL,
                       lastname VARCHAR(30) NOT NULL,
                       password VARCHAR(50) NOT NULL,
                       age INT(3),
                       location VARCHAR(50),
                       date TIMESTAMP
);