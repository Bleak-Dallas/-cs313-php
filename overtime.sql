/****************************************************************
 * Author: Dallas Bleak
 * Class: CS 313
 * Project: PHP
 ***************************************************************/
 
-- Drops existing tables prior to creating or recreating the tables
DROP TABLE IF EXISTS employee, overtime, unit, employeeOvertime;

-- create the tables
CREATE TABLE unit (
  unitID       				SERIAL	          NOT NULL,
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
  employeeTitle  			VARCHAR(10)    	NOT NULL,
  employeeSeniority 		INT		    	NOT NULL,
  employeeNumVolunteered 	INT,
  isAdmin					BOOLEAN         NOT NULL,
  PRIMARY KEY (employeeID)
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
INSERT INTO unit VALUES
(1, 'Primary Care'),
(2, 'Flu Clinic');

INSERT INTO overtime VALUES
(1, 2, '2017-11-14'),
(2, 1, '2017-11-18'),
(3, 2, '2017-11-21'),
(4, 2, '2017-11-28'),
(5, 1, '2017-11-25'),
(6, 1, '2017-12-02'),
(7, 1, '2017-12-09'),
(8, 1, '2017-12-16');

INSERT INTO employee VALUES
(1, 'Norma', 'Cutter', 'LPN', '1', '2', false),
(2, 'Elliot', 'Ashby', 'LPN', '2', '0', false),
(3, 'David', 'Lindsey', 'LPN', '3', '2', false),
(4, 'Brandon', 'Fowler', 'LPN', '4', '0', false),
(5, 'Dallas', 'Bleak', 'LPN', '5', '0', false),
(6, 'Becky', 'Grant', 'LPN', '6', '2', false),
(7, 'Connie', 'Shipley', 'LPN', '7', '0', false),
(8, 'Deb', 'Gustufson', 'LPN', '8', '3', false),
(9, 'Josh', 'Barney', 'LPN', '9', '0', false),
(10, 'Irma', 'Garcia', 'LPN', '10', '0', false),
(11, 'Diana', 'Stanfill', 'LPN', '11', '0', false),
(12, 'Debi', 'Rand', 'LPN', '12', '0', false),
(13, 'Kathy', 'Sadler', 'RN', '13', '0', true),
(14, 'Patrick', 'Gee', 'RN', '14', '0', true);

INSERT INTO employeeOvertime VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 7),
(6, 3, 1),
(7, 3, 3),
(8, 3, 5),
(9, 3, 8),
(10, 6, 2),
(11, 6, 3),
(12, 6, 4),
(13, 6, 5),
(14, 6, 6),
(15, 6, 7),
(16, 6, 8),
(17, 8, 2),
(18, 8, 5),
(19, 8, 6),
(20, 8, 7),
(21, 8, 8);






