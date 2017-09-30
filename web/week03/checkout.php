<?php 
require_once('shoppingStart.php');

if ( isset($_GET['return']) ) {
    if ($_GET["return"] == 'true') { 
      header('Location: viewCart.php');
  }
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
    
    <form action="purchaseReview.php" id="billing" method="post">
    <h3>Please fill out your billing information (required *)</h3><br />
            <span class="required">
                <label for="inputfirstname">First name*:</label>
                <span class="invalidMessage" id="validFName"></span>
                <input id="inputfirstname" type="text" name="firstname" onblur="checkEmptyField(this.value, document.getElementById('validFName'))"><br/>
            </span>
            
            <span class="required">
                <label for="inputlastname">Last name*:</label>
                <span class="invalidMessage" id="validLName"></span>
                <input id="inputlastname" type="text" name="lastname" onblur="checkEmptyField(this.value, document.getElementById('validLName'))"><br/>
            </span>

            <span class="required">
                <label for="inputaddress1">Adress 1*:</label>
                <span class="invalidMessage" id="validAdd1"></span>
                <input id="inputaddress1" type="text" name="address1" onblur="checkEmptyField(this.value, document.getElementById('validAdd1'))"><br/>
            </span>

            <span class="notrequired">
                <label for="inputaddress2">Adress 2:</label>
                <input id="inputaddress2" type="text" name="address2"><br/>
            </span>

            <span class="required">
                <label for="inputcity">City*:</label>
                <span class="invalidMessage" id="validCity"></span>
                <input id="inputcity" type="text" name="city" onblur="checkEmptyField(this.value, document.getElementById('validCity'))"><br/>
            </span>

            <span class="required">
                <label for="inputstate">State*:</label>
                <span class="invalidMessage" id="validState"></span>
                <input id="inputstate" type="text" size="2" name="state" onblur="validateStates(this.value, document.getElementById('validState'))"><br/>
            </span>

            <span class="required">
                <label for="inputzip">Zip Code*:</label>
                <span class="invalidMessage" id="validZip"></span>
                <input id="inputzip" type="text" size="5" name="zipcode" onblur="validateZip(this.value, document.getElementById('validZip'))"><br/>
            </span>

            <span class="required">
                <label for="inputemail">Email:</label>
                <span class="invalidMessage" id="validEmail"></span>
                <input id="inputemail" type="email" name="email" onblur="validateEmail(this.value, document.getElementById('validEmail'))"><br/>
            </span>

            <span class="required">
                <label for="inputphone">Phone Number*:</label>
                <span class="invalidMessage" id="validPhone"></span>
                <input id="inputphone" type="tel" name="phone" onblur="validatePhone(this.value, document.getElementById('validPhone'))"><br/>
            </span>
            
            <button id='cart_btn' type="submit">Complete Order</button>
            <input id='cart_btn' type="reset" value="Reset">
        </form>
        <a href="?return=true"><button id='cart_btn'>Continue Shopping</button></a>
   
    
    <?php include 'view/footer.php'; ?>

  </div>
</body>
</html>