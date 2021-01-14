<?php
  	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    	<title>Email Contact</title>
    	<link href = "css/view.css" rel = "stylesheet">
	</head>
	<body>
		<h2>Email Contact</h2>
		<table border=1 cellpading=1 cellspacing=1>
 			<tr>
  				<th>Name</th>
  				<th>Email</th>
  				<th>Message</th>
 			</tr>
  	<?php
      include "db.php";

      $selectQry = "SELECT * FROM EmailContact ORDER BY EmailContactID DESC;";
      $result = mysqli_query($conn, $selectQry);

      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$row['Name']."</td>";
        echo "<td>".$row['EmailAddress']."</td>";
        echo "<td>".$row['Message']."</td></tr>";
      }
	?>
  		</table>
	</body>
</html>
      
      
      
      
      
            