<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dallas Bleak" />
    <title>Update Overtime</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/ot.js"></script>
    <link rel="stylesheet" href="css/ot.css">
</head>

<body>
  <div id="content">
    <?php include 'view/manager_header.php'; ?>
    <h1>Update Overtime</h1>


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
        <input type="hidden" name="action" value="update_overtime_db">
        <fieldset>
            <label class="title">Date:</label>
            <input type="text" name="date" value="<?php echo $overtimeList['date']; ?>"><br>
            <label for="select_unit">Unit</label>
          <select id="select_unit" name="unitid">
          <?php foreach ($unitList as $r) : ?>
            <option value="<?php echo $r['unitid']; ?>"><?php echo $r['unitname']; ?></option>"; ?>
          <?php endforeach ?>
          </select>
            <input type="hidden" name="overtimeid" value="<?php echo $overtimeList['overtimeid']; ?>">
            <br><br>
            <input type="submit" class="button" value="Update Overtime">
        </fieldset>
      </form>


    <?php include 'view/manager_footer.php'; ?>

  </div>
</body>
</html>