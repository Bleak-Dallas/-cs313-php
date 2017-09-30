<?php 
require_once('shoppingStart.php');
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
	<script type="text/javascript" src="week07.js"></script>
  	<link rel="stylesheet" href="home.css">
</head>

<body>
  <div id="content">
    <div id="nav">
      <figure id="patch">
        <img src="images/horselogo.png" alt="82nd Airborne Patch">
      </figure>
       <a href="shoppingBrowse.php"><h1>Horses for Sale</h1></a>
    </div>
    <div id="nav_wrapper">
        <ul>
          <li>
            <a href="shoppingBrowse.php">Home</a>
          </li>
          <li>
            <a href="viewCart.php">Shopping Cart</a>
          </li>
        </ul>
    </div>
    <?php 
    $initialCount = 0;
    foreach ($horseList as $item) {
                  echo "<form method='post' action='shoppingCart.php'>
                        <h2>Breed: $item->name</h2>
                        <input type='hidden' name='breed' id='breed' value='$item->name'>
                        <img src='images/$item->image.jpg'> <br>
                        <input type='hidden' name='image' id='image' value='$item->image'>
                        <p>Desription: $item->desc</p>
                        <input type='hidden' name='desc' id='desc' value='$item->desc'>
                        <h2>Price: $item->price</h2>
                        <input type='hidden' name='price' id='price' value='$item->price'>
                        <input type='hidden' name='count' id='count' value='$initialCount'>
                        <button type='submit' name='Submit'><i>add_shopping_cart</i></button>
                        </form>";
                  $initialCount++;
                }

     ?>
    
    <footer>
      <ul>
        <li>
          <a id="footer_none" href="">&copy 2017 CS 313</a>
        </li>
        <li>
          <a href="shoppingBrowse.php">Home</a>
        </li>
        <li>
          <a href="viewCart.php">Shopping Cart</a>
        </li>
      </ul>
    </footer>

  </div>
</body>
</html>