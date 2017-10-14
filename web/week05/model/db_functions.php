<?php
/**********************************************************
* File: viewEmployeeOT.php
* Author: Dallas Bleak
***********************************************************/

require "model/database_connect.php";
$db = get_db();

function getEmployee() {
	global $db;
	$query = 'SELECT * FROM employee';
	$statement = $db->prepare($query);
	$statement->execute();
	$employeeList = $statement->fetchAll();
	$statement->closeCursor();
	return $employeeList;
}

function getOneEmployee($firstName) {
	global $db;
	$query = 'SELECT * FROM employee
			  WHERE employeefirstname = :first_name';
	$statement = $db->prepare($query);
	$statement->bindValue(':first_name', $firstName);
	$statement->execute();
	$employeeFname = $statement->fetch();
	$statement->closeCursor();
	return $employeeFname;
}

function getOneEmployee2($firstName) {
	global $db;
	$query = 'SELECT * FROM employee
			  WHERE employeefirstname = :first_name';
	$statement = $db->prepare($query);
	$statement->bindValue(':first_name', $firstName);
	$statement->execute();
	$employeeFname = $statement->fetchAll();
	$statement->closeCursor();
	return $employeeFname;
}

function getAllEmployeeOvertme() {
	global $db;
    $query = "SELECT 
    to_char(o.overtimedate, 'Mon DD YYYY') as date,
    u.unitname,
    e.employeefirstname
	FROM
    	overtime o
    	JOIN employeeovertime eo ON eo.overtimeid = o.overtimeid
    	JOIN unit u ON u.unitid = o.unitid
    	JOIN employee e ON e.employeeid = eo.employeeid
	ORDER BY e.employeefirstname";
	$statement = $db->prepare($query);
	$statement->execute();
	$employeeOvertimeList = $statement->fetchAll();
	$statement->closeCursor();
	return $employeeOvertimeList;
}

function getEmployeeOvertme($firstname) {
	global $db;
    $query = "SELECT 
    to_char(o.overtimedate, 'Mon DD YYYY') as date,
    u.unitname,
    e.employeefirstname
	FROM
    	overtime o
    	JOIN employeeovertime eo ON eo.overtimeid = o.overtimeid
    	JOIN unit u ON u.unitid = o.unitid
    	JOIN employee e ON e.employeeid = eo.employeeid
	WHERE e.employeefirstname = :first_name";
	$statement = $db->prepare($query);
	$statement->bindValue(':first_name', $firstname);
	$statement->execute();
	$employeeOvertimeList = $statement->fetchAll();
	$statement->closeCursor();
	return $employeeOvertimeList;
}

function getOvertme() {
	global $db;
    $query = "SELECT 
    to_char(o.overtimedate, 'Mon DD YYYY') as date,
    o.unitid,
    u.unitname
	FROM overtime o
    JOIN unit u ON u.unitid = o.unitid
	ORDER BY o.overtimedate";
	$statement = $db->prepare($query);
	$statement->execute();
	$overtimeList = $statement->fetchAll();
	$statement->closeCursor();
	return $overtimeList;
}

/*
function getAllOvertme() {
	global $db;
	$query = 'SELECT
    o.overtimedate,
    u.unitname,
	FROM
    	overtime o
    	JOIN unit u ON u.unitid = o.unitid
	ORDER BY o.overtimedate';
	$statement = $db->prepare($query);
	$statement->execute();
	$employeeOvertimeList = $statement->fetchAll();
	$statement->closeCursor();
	return $employeeOvertimeList;

	to_char(o.overtimedate, 'Mon/DD/YYYY'),
}
*/

?>