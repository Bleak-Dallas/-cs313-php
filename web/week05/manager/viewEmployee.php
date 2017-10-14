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
    <h1>Manager Employee List</h1>

    <h3>Search for employee</h3>
    <form action="." method="post">
      <input type="hidden" name="action" value="search_employee">
      <label>First Name</label>
      <input type="text" name="fname">
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
            <th style="text-align:center" >Name</th>
            <th style="text-align:center" >Title</th>
            <th style="text-align:center" >Seniority</th>
            <th style="text-align:center" ># Volunteered</th>
            <th style="text-align:center" >Admin</th>
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
        </tr>
  
        <?php endforeach; ?>
    </table>


    
    <?php include 'view/manager_footer.php'; ?>

  </div>
</body>
</html>