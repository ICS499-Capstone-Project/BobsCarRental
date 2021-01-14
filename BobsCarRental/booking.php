<?php
  session_start();
  include "db.php";
	$startDate = "";
  $endDate = "";
	// Check the session variable "username" to see if it exists.
	if (!isset($_SESSION['username'])) {
      // If not, redirect to the home page so they can log in
       header("Location: index.php?booking=login");
      $_SESSION['username'];
    }
	// Check to see if a car's id has been passed to the page for booking.  
	if (isset($_GET['id'])) {
      $startDate = $_GET['startDate'];
      $endDate =  $_GET['endDate'];
      $customerID = 6;
      $selectQry = "SELECT * from customer where username = '" . $_SESSION['username'] . "'";
      $result = mysqli_query($conn, $selectQry);
      while ($row = mysqli_fetch_array($result)) {
      	$customerID = $row['customerID'];
      }
      // If so, we need to log the rental to the database for the car in the given date range
      $sql = "INSERT INTO rental (startDate, endDate, carID, customerID) values ('" . $startDate . "', '" . $endDate . "', '" . $_GET['id'] . "', '" . $customerID . "')";
      
      $insert = $conn->query($sql);
        if ($insert === TRUE)
        {
            echo "Booking was seccessful"; 
          	$rentid = $conn->insert_id;
            header("Location: payment.php?rentID=" . $rentid . "&customerID=" . $customerID);
        }
        else {       print_r($sql);
            echo '<script>alert("Did not insert into the rental table!")</script>';
    	}
	}
	  if (isset($_POST['book_now'])) {
      $startDate = $_POST['startDate'];
      $endDate = $_POST['endDate'];
    }
?>

<?php
if($_SESSION["username"]) {
?>
Welcome <?php echo $_SESSION["username"]; ?> <a href="logout.php" tite="Logout">Logout </a>
<?php
}else echo "<h1>Please login first .</h1>";
?>
<script>
  function validateContactForm() {
        var name = document.forms["booking"]["name"].value;
        var email = document.forms["booking"]["email"].value;
    if (name== ""){
              alert("Name Required!");
            return false;
        }

       if (email == ""){
             alert("Email Required!");
            return false;
        }
		return validateContactEmail();
    }

function validateContactEmail(){
    var email = document.getElementById('ContactEmail').value;
    var regx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/;
    if(regx.test(email)) {
    return true;
    }
    else
    {
    alert("Email address provided is Invalid!");
    return false;
    }
    }
</script>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/booking.css">
<style>
html, body,table {
     width: 100%;
}
 body {
     overflow-x: hidden;
}
 .container {
     width: 50%;
     margin-top: 100px;
     margin-left: auto;
     margin-right: auto;
     text-align: center;
     margin-bottom: 144px;
     max-width: 500px;
}
 table{
     width: 50%;
     margin-left: auto;
     margin-right: auto;
     text-align: center;
    /*overflow-y: scroll;
    */
}
 @media only screen and (max-width: 1600px) {
     .container,table,input,button {
         width: 80%;
    }
}
</style>
</head>

<body>
<div class="navbar"> <span id="help"></span> <a href="home.php">Home</a> <a href="about.php">About</a> <a href="booking.php">Booking</a> <a href="cars.php">Cars</a> <a href="contact.php">Contact</a> <a id="myLogout" href="logout.php">Logout <?php echo $_SESSION["username"]; ?></a>
	<!-- <button id="myBtn1">Signout</button> -->
</div>
	<br>
  <br>
 
<!-- Before getting the car details below, you would need to get the date range from the user of when they want a car. -->
  <?php
	if ($startDate == "") {
  ?>
  <div class="container">
 <h1 style="text-align:center">Booking Page</h1>
	<form id="booking" name="book" action="booking.php" onsubmit="return validateContactForm()" method="POST">
		<label for="fullName">Full Name</label>
		<br>
		<input type="text" class="" name="name" autofocus placeholder="e.g. John Smith"> <br>
		<label for="email">Email</label>
		<br>
		<input type="text" id="ContactEmail" name="email"  autofocus placeholder="e.g. johnsmith@gmail.com"> <br>
		<label>Start Date:</label>
		<br>
		<input type="datetime-local" class="" name="startDate"    min="<?php echo date('Y-m-d');echo 'T00:00';?>" required autofocus> <br>
		<label for="subject">End Date</label>
		<br>
		<input type="datetime-local" class="" name="endDate"  min="<?php echo date('Y-m-d');echo 'T00:00';?>" required> <br>
    <br>
		<input id="btn" class="button1" type="submit" name="book_now" value="Book Now" >
	</form>
</div>
    <?php
    } else {
    ?>
<!-- After you have the date, we can query the database for available cars in that range. -->
 <div class="container">
<h2>Car Details</h2>
<table border=1 cellpading=1 cellspacing=1>
  <tr>
  <th>ID</th>
  <th>Make</th>
  <th>Model</th>
  <th>Year</th>
  <th>Price</th>
   <!-- <th>Image</th> -->
   <th>Book Now</th>
  <?php

// query to modify with date range
$sql = "SELECT car.carID, car.make, car.model, car.year, car.price, car.image FROM car LEFT JOIN rental ON rental.carID = car.carID AND ((rental.startDate >= '" . $startDate . "' AND rental.endDate <= '" . $endDate . "') OR (rental.startDate <= '" . $endDate . "' AND rental.endDate >= '" . $endDate . "') OR (rental.startDate <= '" . $startDate . "' AND rental.endDate >= '" . $startDate . "')) WHERE rental.rentID IS NULL;";
$records = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($records))
{
  echo "<tr>";
  echo "<td>".$row['carID']."</td>";
  echo "<td>".$row['make']."</td>";
  echo "<td>".$row['model']."</td>";
  echo "<td>".$row['year']."</td>";
  echo "<td>$".$row['price']."</td>";
  echo "<td> <a href = \"booking.php?id=".$row['carID']."&startDate=" .$startDate. "&endDate=".$endDate. "\">Book</a></td>"; // in the href, we would add variables for the date range also

  echo "</tr>";
}
  }
?>
</table>
</div>
<?php
  include "footer.php";
?>
</body>
</html>
