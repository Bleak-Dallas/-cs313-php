<?php 
require('model/db_functions.php');
session_start();
$_SESSION['username'] = NULL;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL && $_SESSION['username'] == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL && $_SESSION['username'] == NULL) {
        include 'signin.php';
    }
}

if ($action == 'sign_up') {
    $firstName = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    /*$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $passHash = password_hash($password, PASSWORD_DEFAULT);*/
    //validate the data
    if ($firstName == NULL || $firstName == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter name.</b></font>";
    }
     /*if ($password == NULL || $password == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter password.</b></font>";
    }*/
    // if no error then commit to database
   if (empty($error_message)) {
        $employeeInfo = getOneEmployee($firstName);
        $employeeFName = $employeeInfo['employeefirstname'];
        $isAdmin = $employeeInfo['isadmin'];
        if ($employeeFName == $firstName) {
            $_SESSION['username'] = $firstName;
            $_SESSION['admin'] = $isAdmin;

            if ($isAdmin) {
                $manageEmployee = getEmployee();
                include 'manager/viewEmployee.php';   
            }
            else {
                $employeeOvertimeList = getEmployeeOvertme($employeeFName);
                include 'viewEmployeeOT.php';
            }
        }
    }
   // if errors are present show them to the user.
    if (!empty($error_message)) {
        include '../final_project/view/person_list.php';
    }
}

else if ($action == 'employee_ot') {
    $_SESSION['username'] = $_GET['username'];
    $employeeOvertimeList = getEmployeeOvertme($_SESSION['username']);
    include 'viewEmployeeOT.php';
}

else if ($action == 'employee_ot_manager') {
    $OvertimeList = getOvertme();
    $employeeOvertimeList = getAllEmployeeOvertme();
    include 'manager/viewOT.php';
}

else if ($action == 'search_employee_ot') {
    $firstName = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $employeeOvertimeList = getEmployeeOvertme($firstName);
    $OvertimeList = getOvertme();
    include 'manager/viewOT.php';
}

else if ($action == 'search_employee') {
    $firstName = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $manageEmployee = getOneEmployee2($firstName);
    include 'manager/viewEmployee.php';
}

else if ($action == 'view_all_employees') {
    $manageEmployee = getEmployee();
    include 'manager/viewEmployee.php';
}

else if ($action == 'volunteer_overtime') {
    $overtimeList = getOvertme();
    include 'addEmployeeOT.php';
}

else if ($action == 'signup_for_overtime') {
    $overtimeID = filter_input(INPUT_POST, 'overtime_id', FILTER_SANITIZE_STRING);
    $overtimeList = getOvertme();
    $message = "You have been signed up";
    include 'addEmployeeOT.php';
}

else if ($action == 'manager_add_ot') {
    $unitList = getUnit();
    include 'manager/addOTmanager.php';
}

else if ($action == 'add_ot_opportunity') {
    $unitName = filter_input(INPUT_POST, 'unit_name', FILTER_SANITIZE_STRING);
    include 'manager/addOTmanager.php';
}

else if ($action == 'manager_add_empoyee') {
    $employeeAttributes = getEmployee();
    include 'manager/addEmployeemanager.php';
}

else if ($action == 'logout') {
    session_unset();
    session_destroy();
    include 'signin.php';
}


?>