<?php
/**********************************************************
* File: viewEmployeeOT.php
* Author: Dallas Bleak
***********************************************************/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dallas Bleak" />
    <title>Employee Details</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="ot.js"></script>
    <link rel="stylesheet" href="css/ot.css">
</head>

<body>
  <div id="content">
    <h1><?php echo $firstname . "'s "; ?>AJAX Test</h1>

        <?php 
    if (isset($error_message)) {
        $errors = '<ul>';
        foreach ($error_message as $value) {
             $errors .= "<li>$value</li>";
        }
        $errors .= '<ul>';
        echo $errors;
    }
    ?>

    <?php 
    if (!empty($employeeOvertimeList)) {
    echo '<table class="table_settings">';
    echo '<tr>
            <th style="text-align:center" >Name</th>
            <th style="text-align:center" >Date</th>
            <th style="text-align:center" >Unit</th>
            <th>&nbsp;</th>
        </tr>';

    }
    else {
        echo "<p>You are not currently signed up for any overtime.</p>";
    }
    ?>
   
    <form action="." method="post">
        <input type="hidden" id="actionid" name="action" value="delete_employee_overtime">
        label
        <input type="text" id="fnameid" name="fname" >
        <input type="submit" id="buttonid" onclick="ajaxtest()" value="Choose">
    </form>

  </div>
</body>
</html>