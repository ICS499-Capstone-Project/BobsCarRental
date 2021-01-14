<?php
session_start();
include "db.php";
if (isset($_GET['paymentID'])) {
      $paymentID = $_GET['paymentID'];
  
  $selectPayQry = "SELECT customer.username, customer.email, car.year, car.make, car.model, car.price, rental.startDate, rental.endDate FROM customer INNER JOIN rental ON rental.customerID = customer.customerID INNER JOIN payment on payment.rentID = rental.rentID INNER JOIN car ON car.carID = rental.carID WHERE payment.payID =" . $paymentID . " LIMIT 1;";
      $result = mysqli_query($conn, $selectPayQry);
      while ($row = mysqli_fetch_array($result)) {
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/confirmation.css" rel="stylesheet"> 
<style>

html, body {
     width: 100%;
}
 body {
     overflow-x: hidden;
}
 #confirmation_container {
     width: 50%;
     margin-top: 100px;
     margin-left: auto;
     margin-right: auto;
}
 @media only screen and (max-width: 600px) {
     #confirmation_container {
         width: 100%;
    }
}
 #p {
     font-size:32px;
}
 .print {
     display:none 
}
 @media print {
     .print {
        display:block
    }
     button {
        display:none;
    }
}
 #confirmation_container {
     border: double;
}

</style>

</head>
<body>
<div class="navbar"> <span id="help"></span> <a href="home.php">Home</a> <a href="about.php">About</a> <a href="booking.php">Booking</a> <a href="contact.php">Contact</a><a id="myLogout" href="logout.php">Logout <?php echo $_SESSION["username"]; ?></a>

</div>

<div id = "confirmation_container">
<h1>Receipt</h1>
<p>Receipt Num. <?php echo $paymentID ?></p>
<p>Date. <?php echo date("m/d/Y"); ?></p>
<p>700 E 7th ST. </p>
<p>St. Paul, MN 55106 </p><BR>
<hr style="width:60%;text-align:left;margin-left:0">
<p>Renters
 Info.</p>
<p>User Name. <?php echo $row['username']; ?></p>
<p>Email. <?php echo $row['email']; ?></p>
<p>Car Details. <?php echo $row['year'] . " " . $row['make'] . " " . $row['model']; ?></p>
<p>Pickup Date. <?php echo $row['startDate']; ?></p>
<p>Drop Off Date. <?php echo $row['endDate']; ?></p>
<p>Amount Paid. <?php $taxrate = .68;
$price = $row['price']; 
$total = $price * $taxrate;
$amount = $price + $total;
echo number_format ($amount,2); 
 ?></p><p>Thank You For Your Business. <br><br></p>
      <button  onclick="javascript:window.print()" id="button-print">Print</button>
      <button onclick="backButton()">Go Back</button>
       <script>
         function display() {
            window.print();
         }

         function backButton() {
            window.history.back();
        }
      </script>
</div>
<?php
	}
}
?>

<?php
  include "footer.php";
?>

</body>
</html>
