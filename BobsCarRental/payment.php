<?php
  SESSION_START();
  $customerId = "";
  $rentId = "";
  if (isset($_GET["customerID"])) {
    $customerId = $_GET["customerID"];
    $rentId = $_GET["rentID"];
  }
// Payment
  if (isset($_POST['Pay'])) {
    include 'db.php';
    $cardNumber = $_POST['cardNumber'];
	  $expirationDate = $_POST['expirationDate'];
	  $cvcNumber = $_POST['cvcNumber'];
    $customerId = $_POST["customerID"];
    $rentId = $_POST["rentID"];
    $insertqy  = "INSERT INTO payment (cardNumber, expirationDate, cvcNumber, customerID, rentID) VALUES('". $cardNumber . "', '" . $expirationDate . "', '" . $cvcNumber . "', '" . $customerId . "', '" . $rentId . "')";
    //$output = mysqli_query($conn, $insertqy) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    $output = $conn->query($insertqy);

	if ($output == TRUE) {
    echo "payment processing"; 
    //echo '<script>alert("Payment Inserted!")</script>';
		$paymentID = $conn->insert_id;
        header("Location: confirmation.php?paymentID=" . $paymentID);
	}
	else {
	   echo '<script>alert("Payment did not Insert!")</script>';
	}
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Page</title>
	<link href="css/payment.css" rel="stylesheet"> 

<style>

html, body {
     width: 100%;
}
 body {
     overflow-x: hidden;
}
 .container-payment{
     width: 50%;
     margin-top: 100px;
     margin-left: auto;
     margin-right: auto;
     text-align: center;
}
 @media only screen and (max-width: 600px) {
     .container {
         width: 80%;
    }
}

</style>

</head>
<body>
	<div class="navbar"> <span id="helpico"></span> <a href="home.php">Home</a> <a href="about.php">About</a> <a href="booking.php">Booking</a> <a href="contact.php">Contact</a>
	</div>
	<br> </br>
	<div class="container-payment">
 <h1 style="text-align:center">Make Payment</h1>
		<form id="pay_1" name="payment_1" action="payment.php" onsubmit="return payment_verification();" method="POST">
			<label for="card_number">Credit Card Number</label>
			<br>
			<input type="text" id="card_Number" class="" name="cardNumber" required autofocus placeholder="Card Number 16 Digits">
			<br>
			<label for="expiration_Date">Expiration Date</label>
			<br>
			<input type="text" id="exp_date" name="expirationDate" required autofocus placeholder="e.g. 0522">
			<br>
			<label>CVC</label>
			<br>
			<input type="text" id="cvcNumber" class="" name="cvcNumber" required autofocus placeholder="e.g. 201">
			<br>
			<br>
			<button id="payment" class="button_pay" type="submit" name="Pay" value="pay">Payment</button>
			<input type="hidden" name="customerID" value="<?php echo $customerId; ?>" />
			<input type="hidden" name="rentID" value="<?php echo $rentId; ?>" /> </form>

<script>
    function payment_verification() {
        var ccNumber = document.getElementById('card_Number').value;
        var cvcNumber = document.getElementById('cvcNumber').value;
        var expirDate = document.getElementById('exp_date').value;
        if ((ccNumber.length != 16) || (isNaN(ccNumber))) {
            alert("Enter valid 16 digit number");
            return false;
        }

        if ((cvcNumber.length != 3) || (isNaN(cvcNumber))) {
            alert("Enter valid 3 digit security number");
            return false;
        }
        if ((expirDate.charAt(0) != '0' && expirDate.charAt(0) != '1') || (expirDate.charAt(2) != 2) || (expirDate.length != 4)) {
            alert("Enter valid expiration date");
            return false;
        }
        return true;
    }
</script>
<?php
  include "footer.php";
?>    
</body>
</html>