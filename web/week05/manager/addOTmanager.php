<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dallas Bleak" />
    <title>CS 213</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/ot.js"></script>
  	<link rel="stylesheet" href="css/ot.css">
</head>

<body>
  <div id="content">
    <?php include 'view/manager_header.php'; ?>
    <h1>Manager Add Overtime</h1>

    <form action="." method="post">
      <input type="hidden" value="add_ot_opportunity">
      <label>Date</label>
      <input type="text" name="date"><br>
      <label for="select_unit">Unit</label>
      <select id="select_unit" name="unit_name">
      <?php 
        foreach ($unitList as $r) {
        echo "<option value=" . $r['unitid'] . ">" .$r['unitname']. "</option>";
        }  ?>
      
      </select>
      <br><br>

      <input type="submit" name="Submit">
    </form>


    
    <?php include 'view/manager_footer.php'; ?>

  </div>
</body>
</html>