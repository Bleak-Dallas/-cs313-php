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
    <?php include 'view/manager_header.php'; ?>
    <h1>Update Employee</h1>


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

      <form method="post" action=".">
        <input type="hidden" name="action" value="update_employee">
        <fieldset>
            <label class="title">First Name:</label>
            <input type="text" name="fname" value="<?php echo $employee['employeefirstname']; ?>"><br>
            <label class="title">Last Name:</label>
            <input type="text" name="lname" value="<?php echo $employee['employeelastname']; ?>"><br>
            <label class="title">Title</label>
            <input type="text" name="title" value="<?php echo $employee['employeetitle']; ?>"><br>
            <label class="title">Seniority:</label>
            <input type="number" name="seniority" min="0" size="2" maxlength="2" value="<?php echo $employee['employeeseniority']; ?>"><br>
            <label class="title">Number Volunteered:</label>
            <input type="number" name="volunteer" min="0" size="2" maxlength="2" value="<?php echo $employee['employeenumvolunteered']; ?>"><br>
            <label class="title">Admin:</label>
            <input type="text" name="admin" value="<?php echo $employee['isadmin']; ?>"><br>
            <input type="hidden" name="employeeid" value="<?php echo $employee['employeeid']; ?>"><br><br>
            <input type="submit" class="button" value="Update Employee">
        </fieldset>
      </form>


    <?php include 'view/manager_footer.php'; ?>

  </div>
</body>
</html>