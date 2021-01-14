<?php
session_start();
?>
<!DOCTYPE html>
<head>
<script>
function changePage() {
  setTimeout(function(){ 
    location.replace("view.php"); 
  }, 2000);
}  
window.onload = changePage;
</script>  
</head>
<body>
<?php
include "db.php";	
$id = $_GET['id'];
$sql = "DELETE from car where carID = " . $id;
if (mysqli_query($conn, $sql)) {
    echo "Car was successfully deleted";
} else {
   echo "Not deleted";
}
?>
</body>
</html>


