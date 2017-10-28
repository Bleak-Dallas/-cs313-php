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
       <a style="text-decoration: none;" href="."><h1>Overtime Made Easy</h1></a>
    </div>
    <div id="nav_wrapper">
        <ul>
          <li>
            <a style="text-decoration: none;" href="signin.php">Sign In</a>
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
    if (isset($bad_user)) {
      echo $bad_user;
    }
    ?>
     <div class="form">
    <form id="form" method="post" action=".">
        <input type="hidden" name="action" value="sign_up">

        <label class="title">First Name:</label>
        <span class="invalidMessage" id="validFname"></span>
        <input id="fname" type="text" name="fname" placeholder="John"><br>

        <label class="title">Last Name:</label>
        <span class="invalidMessage" id="validLname"></span>
        <input id="lname" type="text" name="lname" placeholder="Doe"><br>

        <label class="title">Last Four SSN:</label>
        <span class="invalidMessage" id="validLfour"></span>
        <input id="lfour" type="text" name="lastfour" placeholder="1234"><br>

        <label class="title">Username:</label>
        <span class="invalidMessage" id="validUname"></span>
        <input id="uname" type="text" name="uname" placeholder="jdoe1234"><br>

        <label class="title">Password:</label>
        <span class="invalidMessage" id="validPass1"></span>
        <input id="upass" type="password" name="upass"><br>

        <label class="title">Re-enter Password:</label>
        <span class="invalidMessage" id="validPass2"></span>
        <input id="upass2" type="password" name="upass2"><br>
        <br>

        <input class="regular_btn" type="submit" value="Submit">
    </form>
  </div>
    
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