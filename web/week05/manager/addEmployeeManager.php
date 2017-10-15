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
    <h1>Manager Add Employee</h1>
    <div class="addemp">
    <form action="." method="post">
      <input type="hidden" value="add_employee">
      <label>First Name</label>
      <input type="text" name="fname"><br>
      <label>Last Name</label>
      <input type="text" name="lname"><br>
      <label >Title</label>
      <select name="title">
        <option value="LPN">LPN</option>
        <option value="RN">RN</option>
      </select><br>
      <label>Seniority</label>
      <input type="number" name="seniority" size="2" maxlength="2" min="1" max="99"><br>
      <br>

      <input type="submit" name="Submit">
    </form>
    </div>


    
    <?php include 'view/manager_footer.php'; ?>

  </div>
</body>
</html>