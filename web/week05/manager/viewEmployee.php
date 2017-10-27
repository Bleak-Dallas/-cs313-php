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
    <h1>Employee List</h1>

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

    <h3>Search for employee</h3>
    <form action="." method="post">
      <input type="hidden" name="action" value="search_employee">
      <select name="fname">
      <?php foreach ($employeeList as $row) : ?>
        <option value="<?php echo $row['employeefirstname'];?>"><?php echo $row['employeefirstname'] . ' ' . $row['employeelastname'];?></option>
      <?php endforeach; ?>
      </select>
      <input type="submit" value="Submit">
    </form>
    <br>

    <form action="." method="post">
      <input type="hidden" name="action" value="view_all_employees">
      <input type="submit" value="View All Employees">
    </form>
    <br><br>

    <table class="table_settings">
        <tr>
            <th style="text-align:center" >First Name</th>
            <th style="text-align:center" >Title</th>
            <th style="text-align:center" >Seniority</th>
            <th style="text-align:center" ># Volunteered</th>
            <th style="text-align:center" >Admin</th>
            <th>&nbsp;</th>
        </tr>
        <?php 
        foreach ($manageEmployee as $row) : 
        ?>

        <tr>
            <td style="text-align:center" ><?php echo $row['employeefirstname'] . ' ' . $row['employeelastname']; ?></td>
            <td style="text-align:center" ><?php echo $row['employeetitle']; ?></td>
            <td style="text-align:center" ><?php echo $row['employeeseniority']; ?></td>
            <td style="text-align:center" ><?php echo $row['employeenumvolunteered']; ?></td>
            <td style="text-align:center" ><?php echo $row['isadmin']; ?></td>
            <td>
                <form action="." method="post">
                    <input  type="radio" name="action" value="update_employee_form"><span style="color: green;">Update</span>
                    <input type="radio" name="action" value="delete_employee"><span style="color: red;">Delete</span>
                    <input type="hidden" name="employeeid" value="<?php echo $row['employeeid']; ?>">
                    <input type="submit" onclick="return confirm('Are you sure you?')" value="Submit">
                </form>
            </td>
        </tr>
  
        <?php endforeach; ?>
    </table>


<div class="addemp">
    <h1>Add Employee</h1>
    <form action="." method="post">
      <input type="hidden" name="action" value="add_employee">
      <label>First Name</label>
      <span class="invalidMessage" id="validFName"></span>
      <input type="text" name="fname" onblur="checkEmptyField(this.value, document.getElementById('validFName'))"><br>
      <label>Last Name</label>
      <span class="invalidMessage" id="validLName"></span>
      <input type="text" name="lname" onblur="checkEmptyField(this.value, document.getElementById('validLName'))"><br>
      <label >Title</label>
      <select name="title">
        <option value="LPN">LPN</option>
        <option value="RN">RN</option>
      </select><br>
      <label>Seniority</label>
      <input type="number" name="seniority" size="2" maxlength="2" min="1" max="99"><br>
      <label>Number of Volunteers</label>
      <input type="number" name="volunteer" size="2" maxlength="2" min="0" max="99"><br>
      <label>Admin</label>
      <select name="admin">
        <option value="true">Yes</option>
        <option value="false">No</option>
      </select><br>
      <br>
      <input type="submit" name="Submit">
    </form>
    </div>


    
    <?php include 'view/manager_footer.php'; ?>

  </div>
</body>
</html>