<?php 
/**********************************************************
* File: index.php
* Author: Group 02
***********************************************************/

require('db_functions.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        include 'signup.php';
    }
}

if ($action == 'sign_up') {
    $user_name = filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING);
    $user_password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
    $user_password2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_STRING);
    if ($user_name == NULL || $user_name == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a user name.</b></font>";
    }
    if ($user_password == NULL || $user_password == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a password.</b></font>";
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
            $user_id = add_users_db($user_name, $user_password_hash);
            $_SESSION['username'] = $user_name;
            include 'signin.php';
        }
    }
   // if errors are present show them to the user.
    if (!empty($error_message)) {
        include 'signup.php';
    }
}

else if ($action == 'sign_in') {
    $user_name = filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING);
    $user_password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
    if ($user_name == NULL || $user_name == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a user name.</b></font>";
    }
    if ($user_password == NULL || $user_password == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a password.</b></font>";
    }
    // If no errors process the form
     $isUserPass = false;
    if (empty($error_message)) {
        $all_users = getUsers();
        foreach ($all_users as $user) {
            if ($user_name == $user['username'] && password_verify($user_password, $user['userpassword'])) {
                $isUserPass = true;
            }
        }
        if ($isUserPass) {
            include 'welcome.php';
        }
        else {
            $error[] = "<font color='red'><b>Your username or password is incorrect. Please try again.</b></font>";
        }

   // if errors are present show them to the user.
    if (!empty($error_message) || !empty($error)) {
        include 'signin.php';
        }
    }
}

else if ($action == 'sign_in_page') {
     include 'signin.php';
}


?>