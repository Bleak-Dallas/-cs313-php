<?php 
// Initialize the session
session_start();

	// get information from the shopping browser page
if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $breed = filter_input(INPUT_POST, 'breed', FILTER_SANITIZE_STRING);
          $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
          $desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
          $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
          $quantity = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_STRING);
          $count = filter_input(INPUT_POST, 'count', FILTER_SANITIZE_STRING);
}

// Parent array of all items, initialized if not already...
if (!isset($_SESSION['items'])) {
  $_SESSION['items'] = array();
}

if (!isset($_SESSION['total'])) {
  $_SESSION['total'] = 0;
}

// Add items based on item ID
$_SESSION['items'][$count] = array('Breed' => $breed, 'Image' => $image, 'Description' => $desc, 'Price' => $price, 'Quantity' => $quantity);

header('Location: shoppingBrowse.php');

// For item 12345's quantity
//echo $_SESSION['items'][$breed]['Description'];


// Add 1 to quantity for item 54321
//$_SESSION['items'][54321]['Quantity']++;

 ?>