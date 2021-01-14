<?php
	if (isset($_GET['reset'])) {
      echo '<script>alert("Password reset successful.")</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome BobsCarRental</title>
  <link href = "css/login_signup.css" rel = "stylesheet">
  <style>

 html, body {
     width: 100%;
}
 #home_container {
  
     width: 50%;
     margin-top: 100px;
     margin-left: auto;
     margin-right: auto;
     text-align: center;
}
 @media only screen and (max-width: 600px) {
     #home_container {
         width: 80%;
    }
}
 #p {
     font-size:32px;
}

  </style>
</head>
<body>
<?php
  include "navbar.php";
?>
<script>
function moreFunction() {
  var dots = document.getElementById("3dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn3");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
<div id = "home_container">
<h1>Welcome</h1>
<h2>#1 Trusted Car Rental Worldwide</h2>
<p id="p">Best Car Rental Services with unbeatable price!. Find your next great rental expericence with us<span id="3dots">...</span><span id="more"> with unlimited cars available daily. 
  Save money on rental cars deals today. Best prices in the coutry granted. Rent our cars today!</span></p>

<button onclick="moreFunction()" id="myBtn3">Read more</button>
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