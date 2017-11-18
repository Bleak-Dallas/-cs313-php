<?php
// set all the variables and filter the input
$unitSize = filter_input(INPUT_POST, 'unit', FILTER_SANITIZE_STRING);
$unitPrice = filter_input(INPUT_POST, 'unitcost', FILTER_SANITIZE_STRING);
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

// check to see if address 2 is empty. If not assign informaiton
if($add2 != NULL) {
  $address2 = '<span class="billingInfo">' . $add2 . '</span><br/>';
} else {
  $address2 = '';
}

// assign the month digit to the month string
$ccMonth = array("1" => "January",
                 "2" => "February",
                 "3" => "March",
                 "4" => "April",
                 "5" => "May",
                 "6" => "June",
                 "7" => "July",
                 "8" => "August",
                 "9" => "September",
                 "10" => "October",
                 "11" => "November",
                 "12" => "December");

//validate the data to make sure required fields were passed and data is valid
  if ($unitSize == NULL) {
      $unitSize= "<font color='red'><b>Invalid unit</b></font>";
  }
  if ($unitPrice == NULL) {
      $unitPrice = "<font color='red'><b>Invalid unit price</b></font>";
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
// combine address 1 and address 2
$address = $add1 . '<br/>' . $address2;
// combine city, state, and zip code
$cityStateZip = $city . ' ' . $state . ' ' . $zip;
// take out all white space for the credit card number
$ccNumberNoSpace = preg_replace('/\s+/', '', $ccNumber);
// cut out all credit card numbers but the last 4 digits
$ccNumLastFour = substr($ccNumberNoSpace, 12);
// combine expiration month and year with forward slash
$expMonthYear = $ccMonth[$ccExpMonth] . ' 20' . $ccExpMYear;
?>

<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta name="author" content="Dalls Bleak" />
   <title>Payment Confirmation</title>
   <link rel="stylesheet" type="text/css" href="businessStyle.css">
   <script type="text/javascript" src="week07.js"></script>
</head>
<body>
  <div id="content">
  <div id="nav">
    <img src="images/lock1.svg"><br><h1 style="font-size: 200%;">Tough Storage</h1></a>
  </div>
	<div id="unitdetails">
	   <h1 style="text-align: center;">Please Confirm Your Payment</h1>
     <main class="main">
     <div id="table1">
    <table>
      <tr>
        <th>Storage Unit</th>
        <th>Price</th>
      </tr>
      <tr>
        <td> <?php echo $unitSize; ?> </td>
        <td> $<?php echo $unitPrice; ?> </td>
      </tr>
    </table><br/>
    <span class="unitTotal" style="font-size: 140%; font-weight: bold;">Total: $<?php echo $unitTotal; ?></span><br />
    </div>
  <div id="billing">
    <p><b>Bliing Address:</b><br/>
      <span class="billingInfo"><?php echo $fullName; ?></span><br />
      <span class="billingInfo"><?php echo $address; ?></span>
      <span class="billingInfo"><?php echo $cityStateZip; ?></span><br/>
      <span class="billingInfo">Phone: <?php echo $phone; ?></span><br/>
      <span class="billingInfo">Email: <?php echo $email; ?></span><br/><br/>


    </p>
    <p><b>Payment Method:</b><br/>
      <span class="billingInfo">Type: <?php echo $ccName; ?></span><br/>
      <span class="billingInfo">Number: ************ <?php echo $ccNumLastFour; ?></span><br />
      <span class="billingInfo">Exp: <?php echo $expMonthYear; ?> </span><br/><br/>
    </p>
  </div>
  <form action="confirmPayment.php" id="confirm" method="post">
    <input type="hidden" name="unit" value="<?php echo $unitSize; ?>" />
    <input type="hidden" name="unitcost" value="<?php echo $unitPrice; ?>" />
    <input type="hidden" name="tax1" value="<?php echo $unitTax; ?>" />
    <input type="hidden" name="total" value="<?php echo $unitTotal; ?>" />
    <input type="hidden" name="creditcardname" value="<?php echo $ccName; ?>" />
    <input type="hidden" name="ccnumber" value="<?php echo $ccNumber; ?>" />
    <input type="hidden" name="ccexpirationMonth" value="<?php echo $ccExpMonth;?>" />
    <input type="hidden" name="ccexpirationYear" value="<?php echo $ccExpMYear; ?>" />
    <input type="hidden" name="firstname" value="<?php echo $fName; ?>" />
    <input type="hidden" name="lastname" value="<?php echo $lName; ?>" />
    <input type="hidden" name="address1" value="<?php echo $add1; ?>" />
    <input type="hidden" name="address2" value="<?php echo $add2; ?>" />
    <input type="hidden" name="city" value="<?php echo $city; ?>" />
    <input type="hidden" name="state" value="<?php echo $state; ?>" />
    <input type="hidden" name="zipcode" value="<?php echo $zip; ?>" />
    <input type="hidden" name="email" value="<?php echo $email; ?>" />
    <input type="hidden" name="phone" value="<?php echo $phone; ?>" />


    <button class="btnReset" name="button" value="cancel">Cancel Order</button>
    <button class="btnReserve" name="button" value="confirm">Confirm Payment</button>
  </form>
  </main>
  </div>
  </div>
</body>
</html>
