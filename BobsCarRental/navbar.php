<?php
	session_start();
	$displayWarning = false;
	// Check the session variable "username" to see if it exists.
	if (!isset($_SESSION['username'])) {
      $displayWarning = true;
    }
?>
<div class="navbar"> <span id="help"></span> <a href="home.php">Home</a> <a href="about.php">About</a> <a <?php if ($displayWarning) { echo "onclick=\"javascript:alert('Booking requires login');return false;\""; } ?> href="booking.php" >Booking</a> <a href="cars.php">Cars</a> <a href="contact.php">Contact</a>
	<button id="myBtn1">Signin</button>
	<button id="myBtn">Signup</button>
</div>