<?php
/**********************************************************
* File: index.php
* Author: Dallas Bleak
***********************************************************/

?>

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
        <div id="nav">
      <figure id="patch">
        <img src="images/logo.png" alt="logo">
      </figure>
       <a style="text-decoration: none;" href="#"><h1>Overtime Made Easy</h1></a>
    </div>
    <div id="nav_wrapper">
        <ul>
          <li>
            <a style="text-decoration: none;" href="#">Please sign in</a>
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
    ?>

    <form method="post" action=".">
        <input type="hidden" name="action" value="sign_up">
        <label class="title">First name:</label>
        <input type="text" name="fname">
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