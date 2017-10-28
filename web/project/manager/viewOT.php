<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dallas Bleak" />
    <title>Employee Overtime</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/ot.js"></script>
    <link rel="stylesheet" href="css/ot.css">
</head>

<body>
<div id="content">
    <?php include 'view/manager_header.php'; ?>
    <h1>Manager Overtime List</h1>
    <h3>Overtime Dates and Clinics</h3>

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
        <?php foreach ($OvertimeList as $overtime) : ?>

        <tr>
            <td style="text-align:center" ><?php echo $overtime['date']; ?></td>
            <td style="text-align:center" ><?php echo $overtime['unitname']; ?></td>
            <td>
                <form action="." method="post">
                    <input  type="radio" name="action" value="update_overtime_form"><span style="color: green;">Update</span>
                    <input type="radio" name="action" value="delete_overtime"><span style="color: red;">Delete</span>
                    <input type="hidden" name="overtimeid" value="<?php echo $overtime['overtimeid']; ?>">
                    <input class="regular_btn" type="submit" onclick="return confirm('Are you sure?')" value="Submit">
                </form>
            </td>
        </tr>
  
        <?php endforeach; ?>
    </table>
    <br>
    <div class="add_ot">
        <h3>Add Overtime</h3>
        <form id="form" action="." method="post">
          <input type="hidden" name="action" value="add_overtime">
          <label>Date</label>
          <span class="invalidMessage" id="validDate"></span>
          <input id="date" type="text" name="date"><br>

          <label for="select_unit">Unit</label>
          <select id="select_unit" name="unit_name">
          <?php 
            foreach ($unitList as $r) {
            echo "<option value=" . $r['unitid'] . ">" .$r['unitname']. "</option>";
            }  ?>
          </select>

          <br><br>
          <input class="submit_btn" type="submit" value="Submit Overtime">
        </form>
    </div>


    <h3>Employee Overtime Volunteers</h3>

    <h4>Search for employee</h4>
    <form action="." method="post">
      <input type="hidden" name="action" value="search_employee_ot">
      <select name="fname">
      <?php foreach ($employeeList as $row) : ?>
        <option value="<?php echo $row['employeefirstname'];?>"><?php echo $row['employeefirstname'] . ' ' . $row['employeelastname'];?></option>
      <?php endforeach; ?>
      </select>
      <input class="regular_btn" type="submit" value="View Employee">
    </form>
    <br>
    <br>

    <form action="." method="post">
      <input type="hidden" name="action" value="employee_ot_manager">
      <input class="regular_btn" type="submit" value="View All Employees">
    </form>
    <br>

    <table class="table_settings">
        <tr>
            <th style="text-align:center" >Name</th>
            <th style="text-align:center" >Date</th>
            <th style="text-align:center" >Unit</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($employeeOvertimeList as $r) : ?>

        <tr>
            <td style="text-align:center" ><?php echo $r['employeefirstname']; ?></td>
            <td style="text-align:center" ><?php echo $r['date']; ?></td>
            <td style="text-align:center" ><?php echo $r['unitname']; ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_employee_overtime_manager">
                    <input type="hidden" name="employeeid" value="<?php echo $r['employeeid']; ?>">
                    <input type="hidden" name="overtimeid" value="<?php echo $r['overtimeid']; ?>">
                    <input class="delete_btn" type="submit" onclick="return confirm('Are you sure you want to Delete?')" value="Delete">
                </form>
            </td>
        </tr>
  
        <?php endforeach; ?>
    </table>



    
    <?php include 'view/manager_footer.php'; ?>

  </div>
</body>
</html>