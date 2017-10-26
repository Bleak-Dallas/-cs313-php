<?php
/**********************************************************
* File: signup.php
* Author: Dallas Bleak
***********************************************************/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dallas Bleak" />
    <title>Sign Up</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/ot.js"></script>
    <link rel="stylesheet" href="css/ot.css">
</head>

<body>
<div id="content">
        <div id="nav">
      <figure id="patch">
        <img src="images/logo.png" alt="logo">
      </figure>
       <a style="text-decoration: none;" href="#"><h1>Overtime Made Easy</h1></a>
    </div>
    <div id="nav_wrapper">
        <ul>
          <li>
            <a style="text-decoration: none;" href="#">Please sign up</a>
          </li>
        </ul>
    </div>
    <h1>Sign Up</h1>
    <p>Already a user then <a href="signin.php">sign in</a></p>

    <?php 
    if (isset($error_message)) {
        $errors = '<ul>';
        foreach ($error_message as $value) {
             $errors .= "<li>$value</li>";
        }
        $errors .= '<ul>';
        echo $errors;
    }
    if (isset($mismatch_pass)) {
      echo $mismatch_pass;
    }
     if (isset($bad_pass)) {
      echo $bad_pass;
    }
    ?>

    <form method="post" action=".">
        <input type="hidden" name="action" value="sign_up">
        <label class="title">First Name:</label>
        <input type="text" name="fname"><br>
        <label class="title">Last Name:</label>
        <input type="text" name="lname"><br>
        <label class="title">Last Four SSN:</label>
        <input type="text" name="lastfour"><br>
        <label class="title">Username:</label>
        <input type="text" name="uname"><br>
        <label class="title">Password:</label>
        <input type="password" name="upass"><br>
        <label class="title">Re-enter Password:</label>
        <input type="password" name="upass2"><br>
        <br>
        <input type="submit" value="Submit">
        
    </form>
    
    <footer>
      <ul>
        <li>
          <a id="footer_none" href="">&copy D.Bleak</a>
        </li>
      </ul>
    </footer>

  </div>
</body>
</html>