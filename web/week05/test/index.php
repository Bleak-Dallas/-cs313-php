<?php 
require('db_functions.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        include 'signup.php';
    }
}

if ($action == 'ajax_test') {
    $first_name = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $last_four = filter_input(INPUT_POST, 'lastfour', FILTER_VALIDATE_INT);
    $user_name = filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING);
    $user_password = filter_input(INPUT_POST, 'upass', FILTER_SANITIZE_STRING);
    $user_password2 = filter_input(INPUT_POST, 'upass2', FILTER_SANITIZE_STRING);
    if ($first_name == NULL || $first_name == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a first name.</b></font>";
    }
    if ($last_name == NULL || $last_name == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a last name.</b></font>";
    }
    if ($last_four == NULL || $last_four == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter the last four of your SSN.</b></font>";
    }
    if ($user_name == NULL || $user_name == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a user name.</b></font>";
    }
    if ($user_password == NULL || $user_password == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a password.</b></font>";
    }
    if ($user_password2 == NULL || $user_password2 == FALSE) {
        $error_message[] = "<font color='red'><b>Please re-enter your password.</b></font>";
    }
    // If no errors process the form
    if (empty($error_message)) {
        if ($user_password != $user_password2) {
            $mismatch_pass = "<font color='red'><b>Your passwords do not match.</b></font>";
            include 'signup.php';
            die();
        }
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$/", $user_password)) {
            $bad_pass = "<font color='red'><b>Your password does not meet the complexity requirement.</b></font>";
            include 'signup.php';
        } else {
            $user_password_hash = password_hash($user_password, PASSWORD_BCRYPT);
            $employee_info = getEmployeeByFLLF($first_name, $last_name, $last_four);
            $employee_id = $employee_info['employeeid'];
            $user_id = add_users_db($user_name, $user_password_hash, $employee_id);
            $_SESSION['username'] = $user_name;
            include 'signin.php';
        }
    }
   // if errors are present show them to the user.
    if (!empty($error_message)) {
        include 'signup.php';
    }
}


?>