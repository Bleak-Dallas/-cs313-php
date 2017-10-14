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
    echo '<select>';
    foreach ($overtimeList as $r) {
        echo '<option value='$r["unitid"]' label="$r['']">Volvo</option>';
    }
    echo '</select>';

     foreach ($overtimeList as $r) {
        echo "Date: " .  $r['date'] . "  " . "Unit: " . $r['unitname'];
    }
        
    ?>

    
    <?php include 'view/footer.php'; ?>

  </div>
</body>
</html>