<?php
/**********************************************************
* File: welcome.php
* Author: Group 02
***********************************************************/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dallas Bleak" />
    <title>Welcome</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="team07.css">
</head>

<body>
<div id="content">
        <div id="nav">
       <a style="text-decoration: none;" href="#"><h1>Team Activity 07 Welcome Page</h1></a>
    </div>
    <div id="nav_wrapper">
        <ul>
          <li>
            <a style="text-decoration: none;" href=".?action=sign_in_page">Sign In"</a>
          </li>
        </ul>
    </div>
    <h1>Welcome</h1>

    <h3>Welcome <?php echo $_SESSION['username']; ?> you are amazing.</h3>
    
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