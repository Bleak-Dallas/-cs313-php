<?php
// set all the variables and filter the input
$userName = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);


//validate the data to make sure required fields were passed and data is valid
  if ($userName == NULL) {
      $userName = "<font color='red'><b>Username is required</b></font>";
  }
  if ($password == NULL) {
      $password = "<font color='red'><b>Password is required</b></font>";
  }
   if ($userName != "testuser") {
      $userName = "<font color='red'><b>Username is incorrect</b></font>";
  }
  if ($password != "testuser") {
      $password = "<font color='red'><b>Password is incorrect</b></font>";
  }

?>

<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta name="author" content="Dalls Bleak" />
   <title>Order Confirmation</title>
   <link rel="stylesheet" type="text/css" href="businessStyle.css">
   <script type="text/javascript" src="Week07.js"></script>
</head>
<body>
	<div id="unitdetails">
	   <h2>Please Confirm Your Order</h2>
     <main class="main">
     <div id="table1">
    <table>
      <tr>
        <th>Storage Unit</th>
        <th>Price</th>
      </tr>
      <tr>
        <td> <?php echo $unitSize; ?> </td>
        <td> <?php echo $unitPrice; ?> </td>
      </tr>
    </table><br/>
    <span class="unitTotal">Tax: <?php echo $unitTax; ?> </span><br />
    <span class="unitTotal" style="font-size: 140%; font-weight: bold;">Total: <?php echo $unitTotal; ?></span><br />
    </div>
  </main>
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
  <form action="confirm.php" id="confirm" method="post">
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

    <button name="button" value="confirm">Confirm Order</button>
    <button name="button" value="cancel">Cancel Order</button>
  </form>
  </div>
</body>
</html>