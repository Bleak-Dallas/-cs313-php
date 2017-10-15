<?php
/**********************************************************
* File: EmployeeOT.php
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
    <h1>Employee Volunteer Overtime</h1>

    <?php 
        if (isset($message)) {
            echo $messge;
        }
    ?>
    
    <form action="." method="post">
        <input type="hidden" value="signup_for_overtime">
        <select name="overtime_id">
    <?php
    foreach ($overtimeList as $r) {
        echo "<option value=" . $r['overtimeid'] . ">" .$r['date']. " - ".$r['unitname']. "</option>";
    }  ?>
    </select>
    <input type="submit" value="Submit">
    </form>

    
    <?php include 'view/footer.php'; ?>

  </div>
</body>
</html>