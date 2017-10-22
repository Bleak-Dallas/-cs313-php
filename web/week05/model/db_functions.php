<?php
/**********************************************************
* File: viewEmployeeOT.php
* Author: Dallas Bleak
***********************************************************/

require "model/database_connect.php";
$db = get_db();


/****************************************
 * GET EMPLOYEEs
 * get all employees
 ***************************************/
function getEmployee() {
	global $db;
	$query = 'SELECT * FROM employee';
	$statement = $db->prepare($query);
	$statement->execute();
	$employeeList = $statement->fetchAll();
	$statement->closeCursor();
	return $employeeList;
}

/****************************************
 * GET EMPLOYEE BY ID
 * get one employee
 ***************************************/
function getEmployeeById($employee_id) {
	global $db;
	$query = 'SELECT * FROM employee
			  WHERE employeeid = :employee_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':employee_id', $employee_id);
	$statement->execute();
	$employee = $statement->fetch();
	$statement->closeCursor();
	return $employee;
}

/****************************************
 * GET ONE EMPLOYEE
 * Get information for one employee
 ***************************************/
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

/****************************************
 * GET ONE EMPLOYEE
 * Get information for one employee but
 * return as array
 ***************************************/
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

/****************************************
 * GET ALL EMPLOYEE OVERTIME
 * Gte all the employee overtime info
 ***************************************/
function getAllEmployeeOvertme() {
	global $db;
    $query = "SELECT 
    o.overtimeid,
    to_char(o.overtimedate, 'Mon DD YYYY') as date,
    u.unitname,
    e.employeeid,
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

/****************************************
 * GET ALL EMPLOYEE INFO
 * Get everything about the employee and 
 * what overtime they have volunteered for
 ***************************************/
function getAllEmployeeINfo() {
	global $db;
    $query = "SELECT 
    o.overtimeid,
    to_char(o.overtimedate, 'Mon DD YYYY') as date,
    u.unitname,
    e.employeeid,
    e.employeefirstname
	FROM
    	overtime o
    	JOIN employeeovertime eo ON eo.overtimeid = o.overtimeid
    	JOIN unit u ON u.unitid = o.unitid
    	JOIN employee e ON e.employeeid = eo.employeeid
	ORDER BY e.employeefirstname";
	$statement = $db->prepare($query);
	$statement->execute();
	$employeeOvertime = $statement->fetch();
	$statement->closeCursor();
	return $employeeOvertime;
}

/****************************************
 * GET EMPLOYEE OVERTIME (BY FIRST NAME)
 * Get the overtime the employee has
 * volunteered for.
 ***************************************/
function getEmployeeOvertme($firstname) {
	global $db;
    $query = "SELECT 
    o.overtimeid,
    to_char(o.overtimedate, 'Mon DD YYYY') as date,
    u.unitname,
    e.employeeid,
    e.employeefirstname
	FROM
    	overtime o
    	JOIN employeeovertime eo ON eo.overtimeid = o.overtimeid
    	JOIN unit u ON u.unitid = o.unitid
    	JOIN employee e ON e.employeeid = eo.employeeid
	WHERE e.employeefirstname = :first_name
	ORDER BY date DESC";
	$statement = $db->prepare($query);
	$statement->bindValue(':first_name', $firstname);
	$statement->execute();
	$employeeOvertimeList = $statement->fetchAll();
	$statement->closeCursor();
	return $employeeOvertimeList;
}

/****************************************
 * GET EMPLOYEE OVERTIME (BY ID)
 * Get the overtime the employee has
 * volunteered for.
 ***************************************/
function getEmployeeOvertmeById($employee_overtime_id) {
	global $db;
    $query = "SELECT 
    o.overtimeid,
    to_char(o.overtimedate, 'Mon DD YYYY') as date,
    u.unitname,
    e.employeeid,
    e.employeefirstname
	FROM
    	overtime o
    	JOIN employeeovertime eo ON eo.overtimeid = o.overtimeid
    	JOIN unit u ON u.unitid = o.unitid
    	JOIN employee e ON e.employeeid = eo.employeeid
	WHERE eo.employeeovertimeid = :employee_overtime_id";
	$statement = $db->prepare($query);
	$statement->bindValue(':employee_overtime_id', $employee_overtime_id);
	$statement->execute();
	$employeeOvertime = $statement->fetch();
	$statement->closeCursor();
	return $employeeOvertime;
}

/****************************************
 * ADD EMPLOYEE OVERTIME
 * Insert overtime dates that the employee
 * has volunteered for.
 ***************************************/
function addEmployeeOvertime($employee_id, $overtime_id) {
	global $db;
    $query = "INSERT INTO employeeovertime (employeeid, overtimeid)
              VALUES (:employee_id, :overtime_id)";
        $statement = $db->prepare($query);
        $statement->bindValue(':employee_id', $employee_id, PDO::PARAM_STR);
        $statement->bindValue(':overtime_id', $overtime_id, PDO::PARAM_STR);
        $statement->execute();
        $employee_id = $db->lastInsertId();
        $statement->closeCursor();
        return $employee_id;
}

/****************************************
 * GET OVERTIME WITH UNIT NAMES
 * Get overtime dates with unit names
 ***************************************/
function getOvertme() {
	global $db;
    $query = "SELECT 
    o.overtimeid,
    to_char(o.overtimedate, 'Mon DD YYYY') as date,
    o.unitid,
    u.unitname
	FROM overtime o
    JOIN unit u ON u.unitid = o.unitid
	ORDER BY date";
	$statement = $db->prepare($query);
	$statement->execute();
	$overtimeList = $statement->fetchAll();
	$statement->closeCursor();
	return $overtimeList;
}

/****************************************
 * GET OVERTIME WITH UNIT NAMES (BY ID)
 * Get overtime dates with unit names
 ***************************************/
function getOvertmeById($overtime_id) {
    global $db;
    $query = "SELECT 
    o.overtimeid,
    to_char(o.overtimedate, 'Mon DD YYYY') as date,
    o.unitid,
    u.unitname
    FROM overtime o
    JOIN unit u ON u.unitid = o.unitid
    WHERE o.overtimeid = :overtime_id
    ORDER BY date";
    $statement = $db->prepare($query);
    $statement->bindValue(':overtime_id', $overtime_id, PDO::PARAM_INT);
    $statement->execute();
    $overtimeList = $statement->fetch();
    $statement->closeCursor();
    return $overtimeList;
}

/****************************************
 * GET ALL UNITS
 * Get all units from the database
 ***************************************/
function getUnit() {
	global $db;
    $query = "SELECT * FROM unit";
	$statement = $db->prepare($query);
	$statement->execute();
	$unitList = $statement->fetchAll();
	$statement->closeCursor();
	return $unitList;
}

/****************************************
 * ADD EMPLOYEE
 * Add an employee to the database
 ***************************************/
function add_employee_db($first_name, $last_name, $title, $seniority, $admin) {
    global $db;
    $query = 'INSERT INTO employee (employeefirstname, employeelastname, employeetitle, employeeseniority, isadmin)
              VALUES (:first_name, :last_name, :title, :seniority, :admin)';
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':seniority', $seniority);
        $statement->bindValue(':admin', $admin);
        $statement->execute();
        $employee_id = $db->lastInsertId();
        $statement->closeCursor();
        return $employee_id;
}

/****************************************
 * UPDATE EMPLOYEE
 * Update an employee in the database
 ***************************************/
function update_employee_db($employee_id, $first_name, $last_name, $title, $seniority, $volunteer, $admin) {
    global $db;
    $query = 'UPDATE employee
    		  SET employeefirstname = :first_name,
    		      employeelastname = :last_name,
    		      employeetitle = :title,
    		      employeeseniority = :seniority,
    		      employeenumvolunteered = :volunteer,
    		      isadmin = :admin
              WHERE employeeid  = :employee_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
        $statement->bindValue(':first_name', $first_name, PDO::PARAM_STR);
        $statement->bindValue(':last_name', $last_name, PDO::PARAM_STR);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':seniority', $seniority, PDO::PARAM_INT);
        $statement->bindValue(':volunteer', $volunteer, PDO::PARAM_INT);
        $statement->bindValue(':admin', $admin, PDO::PARAM_BOOL);
        $statement->execute();
        $statement->closeCursor();
}

/****************************************
 * DELETE EMPLOYEE
 * Delete an employee in the database
 ***************************************/
function delete_employee_db($employee_id) {
    global $db;
    $query = 'DELETE FROM employee 
              WHERE employeeid  = :employee_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}


/****************************************
 * DELETE EMPLOYEE OVERTIME
 * Delete an employees selected volunteer 
 * overtime.
 ***************************************/
function delete_employeeovertime_db($employee_id, $overtime_id) {
    global $db;
    $query = 'DELETE FROM employeeovertime 
              WHERE employeeid  = :employee_id AND overtimeid = :overtime_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $statement->bindValue(':overtime_id', $overtime_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

/****************************************
 * ADD OVERTIME
 * Add an overtime date to the database
 ***************************************/
function add_overtime_db($unit_id, $overtime_date) {
    global $db;
    $query = 'INSERT INTO overtime (unitid, overtimedate)
              VALUES (:unit_id, :overtime_date)';
        $statement = $db->prepare($query);
        $statement->bindValue(':unit_id', $unit_id);
        $statement->bindValue(':overtime_date', $overtime_date);
        $statement->execute();
        $overtime_id = $db->lastInsertId();
        $statement->closeCursor();
        return $overtime_id;
}

/****************************************
 * UPDATE OVERTIME
 * Update an overtime date in the database
 ***************************************/
function update_overtime_db($overtime_id, $unit_id, $overtime_date) {
    global $db;
    $query = 'UPDATE overtime
              SET unitid = :unit_id,
                  overtimedate = :overtime_date
              WHERE overtimeid  = :overtime_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':overtime_id', $overtime_id, PDO::PARAM_INT);
        $statement->bindValue(':unit_id', $unit_id, PDO::PARAM_INT);
        $statement->bindValue(':overtime_date', $overtime_date);
        $statement->execute();
        $statement->closeCursor();
}

/****************************************
 * DELETE OVERTIME
 * Delete an overtime date in the database
 ***************************************/
function delete_overtime_db($overtime_id) {
    global $db;
    $query = 'DELETE FROM overtime 
              WHERE overtimeid  = :overtime_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':overtime_id', $overtime_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

?>