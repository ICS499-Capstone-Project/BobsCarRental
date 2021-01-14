<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="5; URL=view.php">
  <script>
  	setTimeout(function(){
   window.location.reload(1);
}, 7000);  
  </script>
<link href = "css/view.css" rel = "stylesheet">
</head>
<body>
<h2>Delete Car</h2>
<table border=1 cellpading=1 cellspacing=1>
 <tr>
  <th>ID</th>
  <th>Make</th>
  <th>Model</th>
  <th>Year</th>
  <th>Cost</th>
  <th>Remove</th>
 </tr>
  <?php
include "db.php";
$sql = "SELECT * from car";
$records = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($records))
{
  echo "<tr>";
  echo "<td>".$row['carID']."</td>";
  echo "<td>".$row['make']."</td>";
  echo "<td>".$row['model']."</td>";
  echo "<td>".$row['year']."</td>";
  echo "<td>".$row['price']."</td>";
  echo "<td> <a href = delete.php?id=".$row['carID'].">Delete</a></td>";
}
?>
</table>
  
</body>
</html>