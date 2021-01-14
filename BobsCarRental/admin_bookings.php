<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="5; URL=admin_bookings.php">
  <script>
  	setTimeout(function(){
   window.location.reload(1);
}, 7000);  
  </script>
<link href = "css/view.css" rel = "stylesheet">
</head>
<body>
<h2>Booked Vehicles</h2>
<table border=1 cellpading=1 cellspacing=1>
 <tr>
  <th>ID</th>
  <th>Make</th>
  <th>Model</th>
  <th>Year</th>
  <th>Cost</th>
  <th>Start Date</th>
  <th>End Date</th>
 </tr>
  <?php
include "db.php";
$sql = "SELECT car.carID, car.make, car.model, car.year, car.price, rental.startDate, rental.endDate from car INNER JOIN rental ON car.carID = rental.carID ORDER BY car.carID, rental.startDate, rental.endDate;";
$records = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($records))
{
  echo "<tr>";
  echo "<td>".$row['carID']."</td>";
  echo "<td>".$row['make']."</td>";
  echo "<td>".$row['model']."</td>";
  echo "<td>".$row['year']."</td>";
  echo "<td>".$row['price']."</td>";
  echo "<td>".$row['startDate']."</td>";
  echo "<td>".$row['endDate']."</td>";
  echo "</tr>";
}
?>
</table>
</body>
</html>