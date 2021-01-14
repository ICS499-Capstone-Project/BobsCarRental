<?php
if (isset($_POST['send']))
{
    include 'db.php';
   $target_path = 'images/'.basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path))
    {
        $image = basename($_FILES['image']['name']);
        $car_make = $_POST['make'];
        $car_model = $_POST['model'];
        $car_year = $_POST['year'];
        $car_price = $_POST['price'];

        $upload = "INSERT INTO car (make,model,year, price,image) 
        VALUES ('$car_make','$car_model','$car_year','$car_price','$image')";
     
        $result = $conn->query($upload);
        
        if ($result === true)
        {
            echo "Image successfully uploaded";
        }
        else
        {
            echo '<script>alert("Problem uploading image!")</script>';
        }
    }
}
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title></title>
		<link href="css/form_sytles.css" rel="stylesheet">
		<style>
		body {
			margin: 0px;
			background-color: #f1f1f1;
			width: 100%;
		}
		</style>
	</head>
	<body>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form">
				<h2>Add Car Details</h2>
				<label for="car_make">Car Make:</label>
				<br>
				<input type="text" class="field size1" name="make" required placeholder="e.g. Honda" />
				<br>
				<label for="car_model">Car Model:</label>
				<br>
				<input type="text" class="field size1" name="model" required placeholder="e.g. Accord"/>
				<br>
				<label for="car_year">Car Year:</label>
				<br>
				<input type="text" class="field size1" name="year" required placeholder="e.g. 2020"/>
				<br>
				<label for="car_price">Car Price $:</label>
				<br>
				<input type="text" class="field size1" name="price" required placeholder="e.g. 200"/>
				<br>
				<label for="car_image">Car Image:</label>
				<br>
				<input type="file" class="field size1" name="image" required/>
				<br>
				<input type="submit" class="button" value="Add Cars" name="send" /> </div>
		</form>
	</body>

	</html>