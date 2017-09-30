<?php
session_start();
// set all the variables and filter the input
$fName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$lName = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$add1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
$add2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
$zip = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$button = filter_input(INPUT_POST, 'button', FILTER_SANITIZE_STRING);

// check to see if address 2 is empty. If not assign informaiton
if($add2 != NULL) {
  $address2 = '<span class="billingInfo">' . $add2 . '</span><br/>';
} else {
  $address2 = '';
}

//validate the data to make sure required fields were passed and data is valid
  if ($fName == NULL) {
      $fName = "<font color='red'><b>First name is required</b></font>";
  }
  if ($lName == NULL) {
      $lName = "<font color='red'><b>Last name is required</b></font>";
  }
  if ($add1 == NULL) {
      $add1 = "<font color='red'><b>Address is required</b></font>";
  }
  if ($city == NULL) {
      $city = "<font color='red'><b>City is required</b></font>";
  }
  if ($state == NULL) {
      $state = "<font color='red'><b>State is required</b></font>";
  }
  if ($zip == NULL) {
      $zip = "<font color='red'><b>Zip code is required</b></font>";
  }
  if ($phone == NULL) {
      $phone = "<font color='red'><b>Phone is required</b></font>";
  }
  if ($email == NULL || $email == FALSE) {
      $email = "<font color='red'><b>Email invalid or empty</b></font>";
  }

// combine first and last name
$fullName = $fName . ' ' . $lName;
// combine address 1 and address 2
$address = $add1 . '<br/>' . $address2;
// combine city, state, and zip code
$cityStateZip = $city . ' ' . $state . ' ' . $zip;

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
            <a href="shoppingCart.php">Shopping Cart</a>
          </li>
        </ul>
    </div>
	<div  class="confirm">
		<p>
			<?php 
				if ($button === "confirm") {
					echo '<span id="confirmpar"><h2>Order Confirmation</h2>' . $fullName . 
          ', thank you for trusting Horses for Sale.<br/><br/> 
          <h4>You have ordered:</h4>';
          if (isset($_SESSION['items'])) {
            for ($i = 0; $i < 3; $i++) {
              if (isset($_SESSION['items'][$i])) {
                echo "<ul>";
                echo "<li>" . $_SESSION['items'][$i]['Breed'] . " for $";
                echo $_SESSION['items'][$i]['Price'] . "</li></ul>";
        }
      }
      echo "<i>Grand Total:</i> $" . $_SESSION['total'] . ".00<p></p>";
    }
         echo '<h4>Your order will be shipped to:</h4>
          <span class="billingInfo">' . $fullName . '</span><br />
          <span class="billingInfo">' . $address . '</span>
          <span class="billingInfo">' . $cityStateZip . '</span><br/>
          <span class="billingInfo">Phone: ' . $phone . '</span><br/>
          <span class="billingInfo">Email: ' . $email . '</span><br/><br/>';
				}
			?>
	</div>

	<div class="confirm">
		<p>
			<?php 
				if ($button === "cancel") {
					echo '<span id="cancelpar"><h2>Your Order Has Been Canceled</h2>' . $fullName . 
          ', your order for a PLACEHOLDER has been cancel.<br/><br/> Your 
          credit card has <u>not</u> been charged.<br/><br/> Please keep Turtle Tough Storage 
          in mind for any future storage needs.</span>';
				}
			?>
		</p>
	</div>

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