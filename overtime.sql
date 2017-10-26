/****************************************************************
 * Author: Dallas Bleak
 * Class: CS 313
 * Project: PHP
 ***************************************************************/
 
-- Drops existing tables prior to creating or recreating the tables
DROP TABLE IF EXISTS employee, overtime, unit, users, employeeOvertime;

-- create the tables
CREATE TABLE unit (
  unitID       				SERIAL	       NOT NULL,
  unitName     				VARCHAR(255)   NOT NULL,
  PRIMARY KEY (unitID)
);

CREATE TABLE overtime (
  overtimeID     			SERIAL       	NOT NULL,
  unitID     				INT        		NOT NULL,
  overtimeDate     			DATE		   	NOT NULL,
  PRIMARY KEY (overtimeID),
  FOREIGN KEY (unitID) REFERENCES unit(unitID)
);

CREATE TABLE employee (
  employeeID         		SERIAL        	NOT NULL,
  employeeFirstName  		VARCHAR(255)    NOT NULL,
  employeeLastName  		VARCHAR(255)    NOT NULL,
  employeeLastFour  		VARCHAR(4)      NOT NULL,
  employeeTitle  			VARCHAR(10)    	NOT NULL,
  employeeSeniority 		INT		    	NOT NULL,
  employeeNumVolunteered 	INT,
  isAdmin					BOOLEAN         NOT NULL,
  PRIMARY KEY (employeeID)
);

CREATE TABLE users (
  userID       				SERIAL	       NOT NULL,
  userName     				VARCHAR(255)   NOT NULL,
  userPassword    			VARCHAR(255)   NOT NULL,
  employeeID				INT		       NOT NULL,
  PRIMARY KEY (userID),
  FOREIGN KEY (employeeID) REFERENCES employee(employeeID),
  UNIQUE (userName)
);

CREATE TABLE employeeOvertime (
  employeeOvertimeID        SERIAL        	NOT NULL,
  employeeID         		INT        		NOT NULL,
  overtimeID       			INT        		NOT NULL,
  PRIMARY KEY (employeeOvertimeID),
  FOREIGN KEY (employeeID) REFERENCES employee(employeeID),
  FOREIGN KEY (overtimeID) REFERENCES overtime(overtimeID)
);

-- insert data into the database
INSERT INTO unit (unitName) VALUES
('Primary Care'),
('Flu Clinic');

INSERT INTO overtime (unitID, overtimeDate) VALUES
(2, '2017-11-14'),
(1, '2017-11-18'),
(2, '2017-11-21'),
(2, '2017-11-28'),
(1, '2017-11-25'),
(1, '2017-12-02'),
(1, '2017-12-09'),
(1, '2017-12-16');

INSERT INTO employee (employeeFirstName, employeeLastName, employeeLastFour, employeeTitle, employeeSeniority, employeeNumVolunteered, isAdmin) VALUES
('Norma', 'Cutter', 1001, 'LPN', '1', '2', false),
('Elliot', 'Ashby', 1002, 'LPN', '2', '0', false),
('David', 'Lindsey', 1003, 'LPN', '3', '2', false),
('Brandon', 'Fowler', 1004, 'LPN', '4', '0', false),
('Dallas', 'Bleak', 1005, 'LPN', '5', '0', false),
('Becky', 'Grant', 1006, 'LPN', '6', '2', false),
('Connie', 'Shipley', 1007, 'LPN', '7', '0', false),
('Deb', 'Gustufson', 1008, 'LPN', '8', '3', false),
('Josh', 'Barney', 1009, 'LPN', '9', '0', false),
('Irma', 'Garcia', 1010, 'LPN', '10', '0', false),
('Diana', 'Stanfill', 1011, 'LPN', '11', '0', false),
('Debi', 'Rand', 1012, 'LPN', '12', '0', false),
('Kathy', 'Sadler', 1013, 'RN', '99', '0', true),
('Patrick', 'Gee', 1014, 'RN', '99', '0', true);

INSERT INTO employeeOvertime (employeeID, overtimeID) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 7),
(3, 1),
(3, 3),
(3, 5),
(3, 8),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(8, 2),
(8, 5),
(8, 6),
(8, 7),
(8, 8);






