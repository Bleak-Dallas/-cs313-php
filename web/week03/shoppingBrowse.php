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
	<script type="text/javascript" src="shop.js"></script>
  	<link rel="stylesheet" href="shop.css">
</head>

<body>
  <div id="content">
    <?php include 'view/header.php'; ?>

    <?php 
    $initialCount = 0;
    foreach ($horseList as $item) {
                  echo "<form id='shop' method='post' action='shoppingCart.php'>
                        <h2>Breed: $item->name</h2>
                        <input type='hidden' name='breed' id='breed' value='$item->name'>
                        <img src='images/$item->image.jpg'> <br>
                        <input type='hidden' name='image' id='image' value='$item->image'>
                        <p>Desription: $item->desc</p>
                        <input type='hidden' name='desc' id='desc' value='$item->desc'>
                        <h3>Price: $ $item->price</h3>
                        <input type='hidden' name='price' id='price' value='$item->price'>
                        <input type='hidden' name='count' id='count' value='$initialCount'>
                        <button type='submit' id='cart_btn' name='Submit'><i>Add to Cart</i></button>
                        </form>";
                  $initialCount++;
                }

     ?>
    
    <?php include 'view/footer.php'; ?>

  </div>
</body>
</html>