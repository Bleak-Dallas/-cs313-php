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

// add
/*if ( isset($_GET["add"]) ) {
	$i = $_GET["add"];
	$qty = $_SESSION["qty"][$i] + 1;
	$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
	$_SESSION["cart"][$i] = $i;
	$_SESSION["qty"][$i] = $qty;
 }
 */
// delete
/*if ( isset($_GET["delete"]) ) {
	$i = $_GET["delete"];
	$qty = $_SESSION["qty"][$i];
	$qty--;
	$_SESSION["qty"][$i] = $qty;
	
	if ($qty == 0) {
		$_SESSION["amounts"][$i] = 0;
		unset($_SESSION["cart"][$i]);
	} else {
	$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
	}
}
*/
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
    <h2 style="text-align: center;" >Shopping Cart</h2>
    <?php 

    if (isset($_SESSION['items'])) {
    	for ($i = 0; $i < 3; $i++) {
    		if (isset($_SESSION['items'][$i])) {
	    		echo "<b>Breed:</b> " . $_SESSION['items'][$i]['Breed'] . "<br>";
	    		echo "<b>Decsription:</b> " . $_SESSION['items'][$i]['Description'] . "<br>";
	    		echo "<b>Price:</b> " . $_SESSION['items'][$i]['Price'] . "<br>";
	    		echo "<input type='text' name='qty' id='qty' size='2' value='1'>";
	    		echo "<button onclick='decrease_by_one('qty')'>-</button>";
                echo "<button onclick='increase_by_one('qty')'>+</button><br>";
	    		echo "<a href='?remove=$i'>remove item</a>";
	    		echo "<p></p>";
	    	}
    	}
    }
     ?>
     <a href="shoppingBrowse.php"><button>Continue Shopping</button></a>
     <a href="checkout.php"><button>Checkout</button></a>
    
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