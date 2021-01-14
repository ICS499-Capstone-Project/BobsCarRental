<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="css/sidenav.css" rel="stylesheet"> 
</head>

<body>
	<div id="mySidenav" class="sidenav">
		<div style="text-align: center;"> <span>Admin</span>
			<br>
			<br>
			<br> </div> 
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="#" onclick="iframeChange1();">
                <span class="icon">
                	<i class="fa fa-plus" aria-hidden="true"></i>
                </span>
              Add Cars</a>
              <a href="#" onclick="iframeChange2();">
              	<span class="icon"><i class="fa fa-minus" aria-hidden="true"></i></span>
              Remove</a>
			  <a href="#"onclick="iframeChange3();">
                <span class="icon"><i class="fa fa-comment" aria-hidden="true"></i></span> Messages</a>
                <a href="#"onclick="iframeChange4();">
                <span class="icon"><i class="fa fa-book" aria-hidden="true"></i></span> Bookings</a>
                  
                  <a href="logout.php"><span clas="icon"><i class="fa fa-sign-out" aria-hidden="true"></i> </span>Signout</a> </div> <span style="color:blue;font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
	<script>
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
	</script>
</body>
</html>