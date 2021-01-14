<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h2>Car Details</h2>
<table border=1 cellpading=1 cellspacing=1>
 <tr>
  <th>id</th>
  <th>price</th>
  <th>make</th>
  <th>model</th>
  <th>Remove</th>
  <th>Add</th>
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
  echo "<td>".$row['price']."</td>";
  echo "<td> <a href = delete.php?id=".$row['carID'].">Delete</a></td>";
  echo "<td> <a href = add_cars.php?id=".$row['carID'].">Add</a></td>";
}
?>
</table>
</body>
</html>