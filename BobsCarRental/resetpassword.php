<?php
session_start();

include "navbar.php";
  if (isset($_POST['reset_Password'])) {
    include 'db.php';
    $username = $_POST['username'];
    $password = $_POST['password_1'];
    $query = mysqli_query($conn,"SELECT password from customer where username='".$username."'");
    //$num = mysqli_affected_rows($query);

if(mysqli_num_rows($query) > 0){
$con = mysqli_query($conn,"UPDATE customer set password = '" . $password . "' where username = '" . $username . "'");
  //echo mysqli_affected_rows($con);
  if (mysqli_affected_rows($conn) > 0) {
    $_session['password_1'] = "password change sucess";
 	//echo '<script>alert("Password reset successful.")</script>';
 	header ('Location:home.php?reset=success');
  } else {
    echo '<script>alert("Password reset failed.  Password could not be updated");</script>';
  }
}
else {
$_session['msg2'] = "password doesn't match";
  echo '<script>alert("Password reset failed.  Username could not be found");</script>';
}
  }
?>

<script>
function validateSignUpForm() {
        var username = document.forms["ResetPass"]["username"].value;
        var firstpassword = document.forms["ResetPass"]["password_1"].value;
        var secondpassword = document.forms["ResetPass"]["password_2"].value;

   if (username == ""){
             alert("Username can not be empty!");
            return false;
        }
       if (firstpassword == "" && secondpassword == ""){
             alert("Password can not be empty!");
            return false;
        }

        if (firstpassword != secondpassword) {
            alert("password must be same!");
            return false;
        }  
    }

</script>

<!DOCTYPE html>
<html>

<head>
	<title>Password Reset</title>
	<link href="css/resetpassword.css" rel="stylesheet"> </head>

<style>
 html, body {
     width: 100%;
}
 .container{
     width: 50%;
     margin-top: 100px;
     margin-left: auto;
     margin-right: auto;
     text-align: center;
}
 @media only screen and (max-width: 600px) {
     .container{
         width: 80%;
    }
}
</style>
</head>

<body>
<div class = "container">
	<form id="ResetPass" name="resetPassword" action="" onsubmit="return validateSignUpForm()" method="POST">
		<br>
		<br>
		<h1><b>Reset Password</b></h1>
		<hr>
		<label><b>Username</b></label>
		<br>
		<input type="text" class="user" placeholder="Enter Username" name="username" autofocus>
		<br>
		<label for="psw"><b>Password</b></label>
		<br>
		<input type="password" placeholder="Enter Password" name="password_1" autofocus>
		<br>
		<label for="psw-repeat"><b>Repeat Password</b></label>
		<br>
		<input type="password" placeholder="Repeat Password" name="password_2"  autofocus>
		<br>
		<button type="reset" name="resetButton" class="cancelbtn" onclick="resetFunction()">Reset</button>
		<button type="submit" name="reset_Password" class="submitbtn">Submit</button>
		<div class="signin">
		<p>Already have an account?<a href="index.php"><b> Login</b></a></p>
		</div>
	
	</form>

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
















