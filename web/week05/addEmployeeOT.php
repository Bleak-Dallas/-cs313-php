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
    <h1>Employee Volunteer Overtime</h1>

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
                    <input type="radio" name="action" value="signup_for_overtime">Volunteer
                    <input type="hidden" name="overtimeid" value="<?php echo $overtime['overtimeid']; ?>">
                    <input type="submit" onclick="return confirm('Are you sure?')" value="Submit">
                </form>
            </td>
        </tr>
  
        <?php endforeach; ?>
    </table>

    <?php include 'view/footer.php'; ?>

  </div>
</body>
</html>