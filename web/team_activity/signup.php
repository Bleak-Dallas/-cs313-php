<?php
/**********************************************************
* File: signup.php
* Author: Group 02
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
    <link rel="stylesheet" href="team07.css">
</head>

<body>
<div id="content">
        <div id="nav">
       <a style="text-decoration: none;" href="#"><h1>Team Activity 07 Sign Up</h1></a>
    </div>
    <div id="nav_wrapper">
        <ul>
          <li>
            <a style="text-decoration: none;" href=".?action=sign_in_page"></a>
          </li>
        </ul>
    </div>
    <h1>Sign Up</h1>
    <p>Already a user then <a href=".?action=sign_in_page">sign in</a></p>

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
        <label class="title">User Name:</label>
        <input type="text" name="uname"><br>
        <label class="title">Password:</label>
        <input type="password" name="pass"><br>
        <label class="title">Re-enter Password:</label>
        <input type="password" name="pass2"><br>
        <br>
        <input type="submit" value="Sign Up">
        
    </form>
    
    <footer>
      <ul>
        <li>
          <a id="footer_none" href="">&copy D.Bleak</a>
        </li>
        <li>
          <a id="footer_none" href=".?action=sign_in_page">Sign In</a>
        </li>
      </ul>
    </footer>

  </div>
</body>
</html>