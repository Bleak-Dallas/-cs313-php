<?php
/**********************************************************
* File: db_functions
* Author: Group 02
***********************************************************/

require "database_connect.php";
$db = get_db();


/****************************************
 * GET ALL USERS
 * get all employees
 ***************************************/
function getUsers() {
	global $db;
	$query = 'SELECT * FROM users';
	$statement = $db->prepare($query);
	$statement->execute();
	$employeeList = $statement->fetchAll();
	$statement->closeCursor();
	return $employeeList;
}

/****************************************
 * GET USER BY ID
 * get one employee
 ***************************************/
function getUserById($user_id) {
	global $db;
	$query = 'SELECT * FROM users
			  WHERE userid = :user_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':user_id', $user_id);
	$statement->execute();
	$employee = $statement->fetch();
	$statement->closeCursor();
	return $employee;
}

/****************************************
 * ADD USER
 * Add an overtime date to the database
 ***************************************/
function add_users_db($user_name, $user_password) {
    global $db;
    $query = 'INSERT INTO users (username, userpassword)
              VALUES (:user_name, :user_password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':user_name', $user_name);
        $statement->bindValue(':user_password', $user_password);
        $statement->execute();
        $user_id = $db->lastInsertId();
        $statement->closeCursor();
        return $user_id;
}

?>