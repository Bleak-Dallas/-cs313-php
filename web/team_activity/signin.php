<?php
/**********************************************************
* File: signin.php
* Author: Group 02
***********************************************************/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dallas Bleak" />
    <title>Sign In</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="team07.css">
</head>

<body>
<div id="content">
        <div id="nav">
       <a style="text-decoration: none;" href="#"><h1>Team Activity 07 Sign In</h1></a>
    </div>
    <div id="nav_wrapper">
        <ul>
          <li>
            <a style="text-decoration: none;" href="#">Welcome</a>
          </li>
        </ul>
    </div>
    <h1>Sign in</h1>

    <?php 
    if (isset($error_message)) {
        $errors = '<ul>';
        foreach ($error_message as $value) {
             $errors .= "<li>$value</li>";
        }
        $errors .= '<ul>';
        echo $errors;
    }
    if (isset($error)) {
        $errormessage = '<ul>';
        foreach ($error as $value) {
             $errormessage .= "<li>$value</li>";
        }
        $errormessage .= '<ul>';
        echo $errormessage;
    }
    ?>

    <form method="post" action=".">
      <input type="hidden" name="action" value="sign_in">
        <label class="title">User Name:</label>
        <input type="text" name="uname"><br>
        <label class="title">Password:</label>
        <input type="password" name="pass"><br>
        <br>
        <input type="submit" value="Sign In">
        
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