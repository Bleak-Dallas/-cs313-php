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
    <?php include 'view/manager_header.php'; ?>
    <h1>Manager Overtime List</h1>
    <h3>Overtime Dates and Clinics</h3>
    <?php

    echo '<table class="table_settings">';
    echo '<tr>
            <th style="text-align:center" >Date</th>
            <th style="text-align:center" >Unit</th>
        </tr>';
    foreach ($OvertimeList as $r) {
        echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $r['date'], $r['unitname']);
    }
    echo '</table>';

    ?>
    <br>

    <h3>Employee Overtime Volunteers</h3>

    <h4>Search for employee</h4>
    <form action="." method="post">
      <input type="hidden" name="action" value="search_employee_ot">
      <label>First Name</label>
      <input type="text" name="fname">
      <input type="submit" value="Submit">
    </form>
    <br>

    <form action="." method="post">
      <input type="hidden" name="action" value="employee_ot_manager">
      <input type="submit" value="View All Employees">
    </form>
    <br>
    <?php

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

    ?>


    
    <?php include 'view/manager_footer.php'; ?>

  </div>
</body>
</html>