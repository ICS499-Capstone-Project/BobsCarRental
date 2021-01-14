<?php
if (isset($_POST['send']))
{
    include 'db.php';
    $target_path = 'images/';
    $target_path = $target_path.basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path))
    {
        $image = basename($_FILES['image']['name']);
        $upload = "INSERT INTO cars_test (image) VALUES ('$image')";
         // INSERT INTO carsdb.vehicle (vid,image) VALUES(1, 'image1.jpg');
        echo $upload; // Output: INSERT INTO vehicle (image) VALUES ('image6.jpg')
        // exit;
        $result = $conn->query($upload);
        // print_r($result);
        if ($result === TRUE)
        {
            echo "Image successfully uploaded";
        }
        else {
            echo '<script>alert("Problem uploading image!")</script>';
    }
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Page</title>
	<link rel="stylesheet" href="" type="text/css" media="all" /> 
</head>

<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form">
			<label>Vehicle Image:</label>
			<input type="file" class="field size1" name="image" required />
			<BR> </div>
		<div class="buttons">
			<input type="button" class="button" value="preview" />
			<input type="submit" class="button" value="submit" name="send" /> </div>
	</form>
</body>
</html>