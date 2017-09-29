<?php
// set all the variables and filter the input
$unitSize = filter_input(INPUT_POST, 'unit', FILTER_SANITIZE_STRING);
$unitPrice = filter_input(INPUT_POST, 'unitcost', FILTER_SANITIZE_STRING);
$unitTax = filter_input(INPUT_POST, 'tax1', FILTER_SANITIZE_STRING);
$unitTotal = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_STRING);
$ccName = filter_input(INPUT_POST, 'ccname', FILTER_SANITIZE_STRING);
$ccNumber = filter_input(INPUT_POST, 'ccnumber', FILTER_SANITIZE_STRING);
$ccExpMonth = filter_input(INPUT_POST, 'ccexpirationMonth', FILTER_VALIDATE_INT);
$ccExpMYear = filter_input(INPUT_POST, 'ccexpirationYear', FILTER_VALIDATE_INT);
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

//validate the data to make sure required fields were passed and data is valid
  if ($unitSize == NULL) {
      $unitSize= "<font color='red'><b>Invalid unit</b></font>";
  }
  if ($unitPrice == NULL) {
      $unitPrice = "<font color='red'><b>Invalid unit price</b></font>";
  }
  if ($unitTax == NULL) {
      $unitTax = "<font color='red'><b>Invalid unit tax</b></font>";
  }
  if ($unitTotal == NULL) {
      $unitTotal = "<font color='red'><b>Invalid unit total</b></font>";
  }
  if ($ccName == NULL) {
      $ccName = "<font color='red'><b>Invalid type</b></font>";
  }
  if ($ccNumber == NULL) {
      $ccNumber = "<font color='red'><b>CC number required</b></font>";
  }
  if ($ccExpMonth == NULL || $ccExpMonth == FALSE) {
      $ccExpMonth = "<font color='red'><b>CC exp month invalid or empty</b></font>";
  }
  if ($ccExpMYear == NULL || $ccExpMYear == FALSE) {
      $ccExpMYear = "<font color='red'><b>CC exp year invalid or empty</b></font>";
  }
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
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
   	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
   	<meta name="author" content="Dalls Bleak" />
	<title><?php echo ucfirst($button) . ' Order'; ?></title>
	<link rel="stylesheet" type="text/css" href="businessStyle.css">
   	<script type="text/javascript" src="Week07.js"></script>
</head>
<body>
	<div  class="confirm">
		<p>
			<?php 
				if ($button === "confirm") {
					echo '<span id="confirmpar"><h2>Order Confirmation</h2>' . $fullName . 
          ', thank you for trusting Turtle Tough Storage.<br/><br/> Your order for a ' 
          . $unitSize . ' Storage Unit has been confirmed.<br/><br/> A confirmation email 
          was sent to ' . $email . '</span>';
				}
			?>
		</p>
	</div>

	<div class="confirm">
		<p>
			<?php 
				if ($button === "cancel") {
					echo '<span id="cancelpar"><h2>Your Order Has Been Canceled</h2>' . $fullName . 
          ', your order for a ' . $unitSize . ' Storage Unit has been cancel.<br/><br/> Your 
          credit card has <u>not</u> been charged.<br/><br/> Please keep Turtle Tough Storage 
          in mind for any future storage needs.</span>';
				}
			?>
		</p>
	</div>

</body>
</html>