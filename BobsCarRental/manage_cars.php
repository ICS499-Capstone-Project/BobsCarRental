<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Admin Page</title>
    <link href = "css/manage_cars.css" rel = "stylesheet">
    <script>
    function iframeChange1() {
      if(document.getElementById("frame1").className=="show1") {
        document.getElementById("frame1").className="hide1";
        document.getElementById("frame2").className="hide2";
        document.getElementById("frame3").className="hide3";
        document.getElementById("frame4").className="hide4";
      }
      else {
        document.getElementById("frame1").className="show1";
        document.getElementById("frame2").className="hide2";
        document.getElementById("frame3").className="hide3";
        document.getElementById("frame4").className="hide4";
      }
    }
    function iframeChange2() {
      if(document.getElementById("frame2").className=="show2") {
        document.getElementById("frame1").className="hide1";
        document.getElementById("frame2").className="hide2";
         document.getElementById("frame3").className="hide3";
        document.getElementById("frame4").className="hide4";
      }
      else {
        document.getElementById("frame2").className="show2";
        document.getElementById("frame1").className="hide1";
        document.getElementById("frame3").className="hide3";
        document.getElementById("frame4").className="hide4";
      }
    }
    function iframeChange3() {
      if(document.getElementById("frame3").className=="show3") {
        document.getElementById("frame1").className="hide1";
        document.getElementById("frame2").className="hide2";
        document.getElementById("frame3").className="hide3";
        document.getElementById("frame4").className="hide4";
      }
      else {
        document.getElementById("frame3").className="show3";
        document.getElementById("frame1").className="hide1";
        document.getElementById("frame2").className="hide2";
        document.getElementById("frame4").className="hide4";
      }
    }
	function iframeChange4() {
      if(document.getElementById("frame4").className=="show4") {
        document.getElementById("frame1").className="hide1";
        document.getElementById("frame2").className="hide2";
        document.getElementById("frame3").className="hide3";
        document.getElementById("frame4").className="hide4";
      }
      else {
        document.getElementById("frame1").className="hide1";
        document.getElementById("frame2").className="hide2";
        document.getElementById("frame3").className="hide3";
        document.getElementById("frame4").className="show4";
      }
    }
    </script>
</head>
<body>
<div class="navbar"> <span id="helpico"></span> <a href="home.php">Home</a> <a href="about.php">About</a> <a href="booking.php">Booking</a> <a href="cars.php">Cars</a> <a href="contact.php">Contact</a> 
	<!-- <button id="myBtn1">Signout</button> 
<a id="myLogout" href="logout.php">Logout <?php echo $_SESSION["username"]; ?></a>
-->
</div>
<br>
<br>
<br>
  <?php include "sidenav.php"; ?>
    <iframe src="form.php" class="hide1" id="frame1" style="height:600px;width:400px;position:relative;left:600px;top:5px;" title="Iframe" ></iframe>
    <iframe src="view.php" class="hide2" id="frame2" style="height:600px;width:600px;position:relative;left:600px;top:5px;" title="Iframe" ></iframe>
    <iframe src="admin_contact.php" class="hide3" id="frame3" style="height:600px;width:500px;position:relative;left:600px;top:5px;" title="Iframe" ></iframe>
    <iframe src="admin_bookings.php" class="hide4" id="frame4" style="height:600px;width:800px;position:relative;left:600px;top:5px;" title="Iframe" ></iframe>
  <?php
  include "footer.php";
?>  
</body>
</html>