<?php 
require('model/db_functions.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        include 'signup.php';
    }
}

if ($action == 'sign_up') {
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
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $user_password)) {
            $bad_pass = "<font color='red'><b>Your password does not meet the complexity requirement.</b></font>";
            include 'signup.php';
        } else {
            $user_password_hash = password_hash($user_password, PASSWORD_BCRYPT);
            $employee_info = getEmployeeByFLLF($first_name, $last_name, $last_four);
            if ($employee_info == NULL or $employee_info == FALSE) {
                $bad_user = "<font color='red'><b>Your information did not match the database.</b></font>";
                include 'signup.php';
            }
            $employee_id = $employee_info['employeeid'];
            $user_id = add_users_db($user_name, $user_password_hash, $employee_id);
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
    $user_password = filter_input(INPUT_POST, 'upass', FILTER_SANITIZE_STRING);
    $pass_hash = "";
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
            $user_info = getUserByNamePass($user_name);
            $_SESSION['username'] = $user_info['username'];
            $_SESSION['firstname'] = $user_info['employeefirstname'];
            $_SESSION['admin'] = $user_info['isadmin'];
            if ($_SESSION['admin']) {
                $manageEmployee = getEmployees();
                $employeeList = getEmployees();
                include 'manager/viewEmployee.php';   
            } else {
                $employeeInfo = getOneEmployee($_SESSION['firstname']);
                $employeeOvertimeList = getEmployeeOvertme($_SESSION['firstname']);
                $overtimeList = getOvertme();
                include 'viewEmployeeOT.php';
            }
        } else {
            $error[] = "<font color='red'><b>Your username or password is incorrect. Please try again.</b></font>";
        }
    }
   // if errors are present show them to the user.
    if (!empty($error_message) || !empty($error)) {
        include 'signin.php';
    }
}

else if ($action == 'employee_ot') {
    if (isset($_SESSION['firstname'])) {
        $_SESSION['firstname'] = $_GET['username'];
    }
    $employeeOvertimeList = getEmployeeOvertme($_SESSION['firstname']);
    $overtimeList = getOvertme();
    include 'viewEmployeeOT.php';
}

else if ($action == 'employee_ot_manager') {
    $OvertimeList = getOvertme();
    $employeeList = getEmployees();
    $employeeOvertimeList = getAllEmployeeOvertme();
    $unitList = getUnit();
    include 'manager/viewOT.php';
}

else if ($action == 'search_employee_ot') {
    $firstName = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $employeeOvertimeList = getEmployeeOvertme($firstName);
    $employeeList = getEmployees();
    $OvertimeList = getOvertme();
    $unitList = getUnit();
    include 'manager/viewOT.php';
}

else if ($action == 'search_employee') {
    $firstName = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $manageEmployee = getOneEmployee2($firstName);
    $employeeList = getEmployees();
    include 'manager/viewEmployee.php';
}

else if ($action == 'view_all_employees') {
    $employeeList = getEmployees();
    $manageEmployee = getEmployees();
    include 'manager/viewEmployee.php';
}

else if ($action == 'volunteer_overtime') {
    $overtimeList = getOvertme();
    include 'addEmployeeOT.php';
}

else if ($action == 'add_overtime') {
    $overtime_date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $unit_id = filter_input(INPUT_POST, 'unit_name', FILTER_VALIDATE_INT);
    //validate the data
    $error_message = array();
    if ($overtime_date == NULL || $overtime_date == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a date for the overtime.</b></font>";
    }
    if ($unit_id == NULL || $unit_id == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a unit name</b></font>";
    }
    // if no error then commit to database
    if (empty($error_message)) {
    $overtime_date = date_create($overtime_date);
    $db_date_format = 'Y-m-d';
    $db_date = date_format($overtime_date, $db_date_format);
    $overtimeID = add_overtime_db($unit_id, $db_date);
    $OvertimeList = getOvertme();
    $employeeOvertimeList = getAllEmployeeOvertme();
    $unitList = getUnit();
    $employeeList = getEmployees();
    include 'manager/viewOT.php';
    }
    // if errors are present show them to the user.
    if (!empty($error_message)) {
        $OvertimeList = getOvertme();
        $employeeOvertimeList = getAllEmployeeOvertme();
        $unitList = getUnit();
        $employeeList = getEmployees();
        include 'manager/viewOT.php';
    }
}

else if ($action == 'add_employee') {
    $first_name = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $last_four = filter_input(INPUT_POST, 'lfour', FILTER_SANITIZE_STRING);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $seniority = filter_input(INPUT_POST, 'seniority', FILTER_VALIDATE_INT);
    $volunteer = filter_input(INPUT_POST, 'volunteer', FILTER_VALIDATE_INT);
    $admin = filter_input(INPUT_POST, 'admin', FILTER_SANITIZE_STRING);
    //validate the data
    $error_message = array();
    if ($first_name == NULL || $first_name == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter first name.</b></font>";
    }
    if ($last_name == NULL || $last_name == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter last name</b></font>";
    }
    if ($last_four == NULL || $last_four == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter last name</b></font>";
    }
    if ($title == NULL || $title == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a valid title.</b></font>";
    }
    if ($seniority == NULL || $seniority == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a number for seniority</b></font>";
    }
    if ($volunteer === NULL) {
        $error_message[] = "<font color='red'><b>Please enter a number for volunteer</b></font>";
    }
    if ($admin === NULL) {
        $error_message[] = "<font color='red'><b>Please enter true or false for admin</b></font>";
    }
    // if no error then commit to database
    if (empty($error_message)) {
    $employee_id = add_employee_db($first_name, $last_name, $last_four, $title, $seniority, $volunteer, $admin);
    $manageEmployee = getEmployees();
    $employeeList = getEmployees();
    include 'manager/viewEmployee.php';
    }
    // if errors are present show them to the user.
    if (!empty($error_message)) {
        $manageEmployee = getEmployees();
        $employeeList = getEmployees();
        include 'manager/viewEmployee.php';
    }
}

else if ($action == 'update_employee_form') {
    $employee_id = filter_input(INPUT_POST, 'employeeid', FILTER_VALIDATE_INT);
    $error_message = array();
    if ($employee_id == NULL || $employee_id == FALSE) {
        $error_message[] = "<font color='red'><b>Invalid person ID.</b></font>";
    }
    if (empty($error_message)) {
        $employee = getEmployeeById($employee_id);
        $isAdmin = $employee['isadmin'];
        $admin = "No";
        if ($isAdmin) {
            $admin = "Yes";
        } else {
            $admin = "No";
        }
        include 'manager/updateEmployeeForm.php';
    }
   // if errors are present show them to the user.
    if (!empty($error_message)) {
       $manageEmployee = getEmployees();
       $employeeList = getEmployees();
        include 'manager/viewEmployee.php';
    }
}

else if ($action == 'update_employee') {
    $employee_id = filter_input(INPUT_POST, 'employeeid', FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $last_four = filter_input(INPUT_POST, 'lfour', FILTER_SANITIZE_STRING);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $seniority = filter_input(INPUT_POST, 'seniority', FILTER_VALIDATE_INT);
    $volunteer = filter_input(INPUT_POST, 'volunteer', FILTER_VALIDATE_INT);
    $admin = filter_input(INPUT_POST, 'admin', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    //validate the data
    $error_message = array();
    if ($employee_id == NULL || $employee_id == FALSE) {
        $error_message[] = "<font color='red'><b>Error retrieving employee ID</b></font>";
    }
    if ($first_name == NULL || $first_name == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter first name.</b></font>";
    }
    if ($last_name == NULL || $last_name == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter last name</b></font>";
    }
    if ($last_four == NULL || $last_four == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter last name</b></font>";
    }
    if ($title == NULL || $title == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a valid title.</b></font>";
    }
    if ($seniority == NULL || $seniority == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a number for seniority</b></font>";
    }
    if ($volunteer === NULL) {
        $error_message[] = "<font color='red'><b>Please enter a number for the number of time volunteered</b></font>";
    }
    if ($admin === NULL) {
        $error_message[] = "<font color='red'><b>Please enter true or false for admin</b></font>";
    }
    // if no error then commit to database
    if (empty($error_message)) {
        $employee_id = update_employee_db($employee_id, $first_name, $last_name, $last_four, $title, $seniority, $volunteer, $admin);
        $manageEmployee = getEmployees();
        $employeeList = getEmployees();
    include 'manager/viewEmployee.php';
    }
    // if errors are present show them to the user.
    if (!empty($error_message)) {
        $manageEmployee = getEmployees();
        $employeeList = getEmployees();
        include 'manager/viewEmployee.php';
    }
}

else if ($action == 'delete_employee') {
    $employee_id = filter_input(INPUT_POST, 'employeeid', FILTER_VALIDATE_INT);
    $error_message = array();
    if ($employee_id == NULL || $employee_id == FALSE) {
        $error_message[] = "<font color='red'><b>Invalid person ID.</b></font>";
    }
    if (empty($error_message)) {
        delete_employee_db($employee_id);
        $manageEmployee = getEmployees();
        $employeeList = getEmployees();
        include 'manager/viewEmployee.php';
    }
   // if errors are present show them to the user.
    if (!empty($error_message)) {
        $manageEmployee = getEmployees();
        $employeeList = getEmployees();
        include 'manager/viewEmployee.php';
    }
}

else if ($action == 'signup_for_overtime') {
    $employee_id = filter_input(INPUT_POST, 'employeeid', FILTER_VALIDATE_INT);
    $overtime_id = filter_input(INPUT_POST, 'overtimeid', FILTER_VALIDATE_INT);
     $error_message = array();
    if ($employee_id == NULL || $employee_id == FALSE) {
        $error_message[] = "<font color='red'><b>Error retrieving employee ID</b></font>";
    }
    if ($overtime_id == NULL || $overtime_id == FALSE) {
        $error_message[] = "<font color='red'><b>Error retrieving overtime ID</b></font>";
    }
    // if no error then commit to database
    if (empty($error_message)) {
        $employee_overtime_id = addEmployeeOvertime($employee_id, $overtime_id);
        $employeeInfo = getOneEmployee($_SESSION['firstname']);
        $employeeOvertimeList = getEmployeeOvertme($_SESSION['firstname']);
        $overtimeList = getOvertme();
        include 'viewEmployeeOT.php';
    }
    if (!empty($error_message)) {
        $employeeInfo = getOneEmployee($_SESSION['firstname']);
        $employeeOvertimeList = getEmployeeOvertme($_SESSION['firstname']);
        $overtimeList = getOvertme();
        include 'viewEmployeeOT.php';
    }
}


else if ($action == 'update_overtime_form') {
    $overtime_id = filter_input(INPUT_POST, 'overtimeid', FILTER_VALIDATE_INT);
    $error_message = array();
    if ($overtime_id == NULL || $overtime_id == FALSE) {
        $error_message[] = "<font color='red'><b>Invalid overtime ID.</b></font>";
    }
    if (empty($error_message)) {
        $overtimeList = getOvertmeById($overtime_id);
        $unitList = getUnit();
        include 'manager/updateOTmanager.php';
    }
   // if errors are present show them to the user.
    if (!empty($error_message)) {
        $OvertimeList = getOvertme();
        $employeeOvertimeList = getAllEmployeeOvertme();
        $unitList = getUnit();
        $employeeList = getEmployees();
        include 'manager/viewOT.php';
    }
}

else if ($action == 'update_overtime_db') {
    $overtime_id = filter_input(INPUT_POST, 'overtimeid', FILTER_VALIDATE_INT);
    $unit_id = filter_input(INPUT_POST, 'unitid', FILTER_SANITIZE_STRING);
    $overtime_date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    //validate the data
    $error_message = array();
    if ($overtime_id == NULL || $overtime_id == FALSE) {
        $error_message[] = "<font color='red'><b>Error retrieving overtimne ID</b></font>";
    }
    if ($unit_id == NULL || $unit_id == FALSE) {
        $error_message[] = "<font color='red'><b>Error retrieving unit ID</b></font>";
    }
    if ($overtime_date == NULL || $overtime_date == FALSE) {
        $error_message[] = "<font color='red'><b>Please enter a overtime date</b></font>";
    }
    // if no error then commit to database
    if (empty($error_message)) {
        $overtime_date = date_create($overtime_date);
        $db_date_format = 'Y-m-d';
        $db_date = date_format($overtime_date, $db_date_format);
        update_overtime_db($overtime_id, $unit_id, $db_date);
        $OvertimeList = getOvertme();
        $employeeOvertimeList = getAllEmployeeOvertme();
        $unitList = getUnit();
        $employeeList = getEmployees();
        include 'manager/viewOT.php';
    }
    // if errors are present show them to the user.
    if (!empty($error_message)) {
        $OvertimeList = getOvertme();
        $employeeOvertimeList = getAllEmployeeOvertme();
        $unitList = getUnit();
        $employeeList = getEmployees();
        include 'manager/viewOT.php';
    }
}

else if ($action == 'delete_overtime') {
    $overtime_id = filter_input(INPUT_POST, 'overtimeid', FILTER_VALIDATE_INT);
    $error_message = array();
    if ($overtime_id == NULL || $overtime_id == FALSE) {
        $error_message[] = "<font color='red'><b>Invalid overtime ID.</b></font>";
    }
    if (empty($error_message)) {
        delete_overtime_db($overtime_id);
        $OvertimeList = getOvertme();
        $employeeOvertimeList = getAllEmployeeOvertme();
        $unitList = getUnit();
        $employeeList = getEmployees();
        include 'manager/viewOT.php';
    }
   // if errors are present show them to the user.
    if (!empty($error_message)) {
        $OvertimeList = getOvertme();
        $employeeOvertimeList = getAllEmployeeOvertme();
        $unitList = getUnit();
        $employeeList = getEmployees();
        include 'manager/viewOT.php';
    }
}

else if ($action == 'delete_employee_overtime') {
    $employee_id = filter_input(INPUT_POST, 'employeeid', FILTER_VALIDATE_INT);
    $overtime_id = filter_input(INPUT_POST, 'overtimeid', FILTER_VALIDATE_INT);
    $error_message = array();
    if ($employee_id == NULL || $employee_id == FALSE) {
        $error_message[] = "<font color='red'><b>Invalid person ID.</b></font>";
    }
    if ($overtime_id == NULL || $overtime_id == FALSE) {
        $error_message[] = "<font color='red'><b>Invalid person ID.</b></font>";
    }
    if (empty($error_message)) {
        delete_employeeovertime_db($employee_id, $overtime_id);
        $employeeInfo = getOneEmployee($_SESSION['firstname']);
        $employeeOvertimeList = getEmployeeOvertme($_SESSION['firstname']);
        $overtimeList = getOvertme();
        include 'viewEmployeeOT.php';
    }
   // if errors are present show them to the user.
    if (!empty($error_message)) {
        $employeeInfo = getOneEmployee($_SESSION['firstname']);
        $employeeOvertimeList = getEmployeeOvertme($_SESSION['firstname']);
        $overtimeList = getOvertme();
        include 'viewEmployeeOT.php';
    }
}

else if ($action == 'delete_employee_overtime_manager') {
    $employee_id = filter_input(INPUT_POST, 'employeeid', FILTER_VALIDATE_INT);
    $overtime_id = filter_input(INPUT_POST, 'overtimeid', FILTER_VALIDATE_INT);
    $error_message = array();
    if ($employee_id == NULL || $employee_id == FALSE) {
        $error_message[] = "<font color='red'><b>Invalid employee ID.</b></font>";
    }
    if ($overtime_id == NULL || $overtime_id == FALSE) {
        $error_message[] = "<font color='red'><b>Invalid overtime ID.</b></font>";
    }
    if (empty($error_message)) {
        delete_employeeovertime_db($employee_id, $overtime_id);
        $OvertimeList = getOvertme();
        $employeeOvertimeList = getAllEmployeeOvertme();
        $unitList = getUnit();
        $employeeList = getEmployees();
        include 'manager/viewOT.php';
    }
   // if errors are present show them to the user.
    if (!empty($error_message)) {
        $OvertimeList = getOvertme();
        $employeeOvertimeList = getAllEmployeeOvertme();
        $unitList = getUnit();
        $employeeList = getEmployees();
        include 'manager/viewOT.php';
    }
}

else if ($action == 'logout') {
    session_unset();
    session_destroy();
    include 'signup.php';
}


?>