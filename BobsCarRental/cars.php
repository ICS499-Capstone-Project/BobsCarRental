<?php
session_start();
include "navbar.php";
$user_search_query = "SELECT * FROM car";
if (isset($_POST['search'])) {
  include 'db.php';
  if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
    $user_search_query = ($user_search_query . " WHERE make LIKE '%" . $searchTerm . "%' OR model LIKE '%" . $searchTerm . "%'");
  }
}
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Bobs Car Rental</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/cars.css"> </head>
	<body>
		<div class="wrapper">
			<!-- here -->
			<form id="search" name="search" action="" method="POST">
				<label for="searchTerm"><h1>Rental Cars low-cost, affordable Rates Guaranteed | Bobs Car Rental</h1></label>
				<input type="text" id="searchTerm" name="searchTerm" required autofocus placeholder="e.g. Toyota">
				<button id="button2" class="button2" type="submit" name="search" value="Search">Search</button>
			</form>			
			<ul class="properties_list">

				<?php
				include 'db.php';
				$result = $conn->query($user_search_query);
				if ($result->num_rows > 0) {
				while ($rws = $result->fetch_assoc()) { 
				?>
					<div class="item"> <img class="thumb" src="images/<?php echo $rws['image']; ?>" width="200" height="150">
						<br> <span class="Make"><?php echo 'Make: ' . $rws['make']; ?></span>
						<br> <span class="Model"><?php echo 'model: ' . $rws['model']; ?></span>
						<br> <span class="Year"><?php echo 'Year: ' . $rws['year']; ?></span>
						<br> <span class="Price"><?php echo 'Price: ' . $rws['price']; ?></span>
						<br> <a href="booking.php">Book Car</a> </div>
					<?php
					}
                } else {
                  echo "No results found.";
                }
				?>
			</ul>
		</div>

<?php include "login_signup.php"; ?>
<script>
    // GET MODEL #1 - Sign in
    var modal = document.getElementById("myModal1");
    var btn = document.getElementById("myBtn1");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
      modal.style.display = "block";
    }
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    // GET MODEL #2 - Signout
    var modal2 = document.getElementById("myModal2");
    var btn2 = document.getElementById("myBtn");
    var span2 = document.getElementsByClassName("close2")[0];
    btn2.onclick = function() {
      modal2.style.display = "block";
    }
    span2.onclick = function() {
      modal2.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
    function resetFunction() {
      document.getElementById("logOUT").reset();
    }
</script>

<?php
  include "footer.php";
?>
	</body>

	</html>