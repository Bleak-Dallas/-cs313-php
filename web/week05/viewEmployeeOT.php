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
    <title>CS 213</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
	<script type="text/javascript" src="css/ot.js"></script>
  	<link rel="stylesheet" href="css/ot.css">
</head>

<body>
  <div id="content">
    <?php include 'view/header.php'; ?>
    <h1>View Employee Overtime</h1>

    <?php 
    if (!empty($employeeOvertimeList)) {
    echo '<table class="table_settings">';
    echo '<tr>
            <th style="text-align:center" >Name</th>
            <th style="text-align:center" >Date</th>
            <th style="text-align:center" >Unit</th>
        </tr>';
    foreach ($employeeOvertimeList as $r) {
        echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td></tr>', $r['employeefirstname'], $r['date'], $r['unitname']);
    }
    echo '</table>';
    }
    else {
        echo "<p>You are not currently signed up for any overtime.</p>";
    }

    ?>

    
    <?php include 'view/footer.php'; ?>

  </div>
</body>
</html>