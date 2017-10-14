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
	<script type="text/javascript" src="css/ot.js"></script>
  	<link rel="stylesheet" href="css/ot.css">
</head>

<body>
  <div id="content">
    <?php include 'view/header.php'; ?>
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

    
    <?php include 'view/footer.php'; ?>

  </div>
</body>
</html>