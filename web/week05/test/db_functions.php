<?php
/**********************************************************
* File: viewEmployeeOT.php
* Author: Dallas Bleak
***********************************************************/

require "model/database_connect.php";
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


?>