/****************************************************************
 * Author: Dallas Bleak
 * Class: CS 313
 * 07 Teach : Team Activity
 ***************************************************************/
 
-- Drops existing tables prior to creating or recreating the tables
DROP TABLE IF EXISTS users;

-- create the tables
CREATE TABLE users (
  userID       				SERIAL	       NOT NULL,
  userName     				VARCHAR(255)   NOT NULL,
  userPassword     			VARCHAR(255)   NOT NULL,
  PRIMARY KEY (userID)
);



-- insert data into the database
INSERT INTO users (userName, userPassword) VALUES
('testuser', 'testuser'),
('testuser2', 'testuser2');
