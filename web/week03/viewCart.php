<?php 
session_start();

// remove
if ( isset($_GET['remove']) ) {
		$i = $_GET["remove"];
		unset($_SESSION['items'][$i]);
		header('Location: viewCart.php');
}

//total price
if (isset($_SESSION['items'])) {
	$total = 0;
	for ($i = 0; $i < 3; $i++) {
    	if (isset($_SESSION['items'][$i])) {
	    	$total += $_SESSION['items'][$i]['Price'];
		}
	}
	$_SESSION['total'] = $total;
}

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

    <h2 style="text-align: center;" >Shopping Cart</h2>
    <?php 

    if (isset($_SESSION['items'])) {
    	for ($i = 0; $i < 3; $i++) {
    		if (isset($_SESSION['items'][$i])) {
	    		echo "<b>Breed:</b> " . $_SESSION['items'][$i]['Breed'] . "<br>";
	    		echo "<b>Decsription:</b> " . $_SESSION['items'][$i]['Description'] . "<br>";
	    		echo "<b>Price:</b> " . $_SESSION['items'][$i]['Price'] . "<br>";
	    		echo "<a href='?remove=$i'>remove item</a>";
	    		echo "<p></p>";
	    	}
    	}
    }
     ?>
     <a href="shoppingBrowse.php"><button id='cart_btn'>Continue Shopping</button></a>
     <a href="checkout.php"><button id='cart_btn'>Checkout</button></a>
    
    <?php include 'view/footer.php'; ?>

  </div>
</body>
</html>