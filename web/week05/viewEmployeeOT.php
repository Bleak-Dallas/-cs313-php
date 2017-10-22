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
    <title>Employee Overtime</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/ot.js"></script>
    <link rel="stylesheet" href="css/ot.css">
</head>

<body>
  <div id="content">
    <?php include 'view/header.php'; ?>
    <h1><?php echo $employeeInfo['employeefirstname'] . "'s "; ?>Overtime</h1>

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
    <?php foreach ($employeeOvertimeList as $r) : ?>
        <tr>
            <td style="text-align:center" ><?php echo $r['employeefirstname']; ?></td>
            <td style="text-align:center" ><?php echo $r['date']; ?></td>
            <td style="text-align:center" ><?php echo $r['unitname']; ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_employee_overtime">
                    <input type="hidden" name="employeeid" value="<?php echo $r['employeeid']; ?>">
                    <input type="hidden" name="overtimeid" value="<?php echo $r['overtimeid']; ?>">
                    <input type="submit" onclick="return confirm('Are you sure?')" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>


    <h3>Overtime Opportunities</h3>

    <table class="table_settings">
        <tr>
            <th style="text-align:center" >Date</th>
            <th style="text-align:center" >Unit</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($overtimeList as $overtime) : ?>

        <tr>
            <td style="text-align:center" ><?php echo $overtime['date']; ?></td>
            <td style="text-align:center" ><?php echo $overtime['unitname']; ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="signup_for_overtime">
                    <input type="hidden" name="overtimeid" value="<?php echo $overtime['overtimeid']; ?>">
                    <input type="hidden" name="employeeid" value="<?php echo $employeeInfo['employeeid']; ?>">
                    <input type="submit" onclick="return confirm('Are you sure?')" value="Volunteer">
                </form>
            </td>
        </tr>
  
        <?php endforeach; ?>
    </table>

    
    <?php include 'view/footer.php'; ?>

  </div>
</body>
</html>