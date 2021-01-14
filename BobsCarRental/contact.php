<?php
  session_start();
   include "navbar.php";
  if (isset($_POST["Submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["subject"];
    
    include "db.php";
    
    $sql = "INSERT INTO EmailContact (`Name`, `EmailAddress`, `Message`) values ('" . $name . "', '" . $email . "', '" . $message . "')";
      
      $insert = $conn->query($sql);
        if ($insert === TRUE)
        {
            
          	echo '<script>alert("Message was sent successfully!")</script>';
        }
        else {       
          	
            echo '<script>alert("Message not delivered!")</script>';
    	}
  }
?>

<script>
  function validateContactForm() {
        var name = document.forms["contact"]["name"].value;
        var email = document.forms["contact"]["email"].value;
        var subject= document.forms["contact"]["subject"].value;

    if (name== ""){
              alert("Name Required!");
            return false;
        }

       if (email == ""){
             alert("Email Required!");
            return false;
        }
	       if (subject== ""){
             alert("Subject Required!");
            return false;
        }

		return validateContactEmail();
        
    }

function validateContactEmail(){
    var email = document.getElementById('ContactEmail').value;
    var regx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/;
    if(regx.test(email)) {
    return true;
    }
    else
    {
    alert("Email address provided is Invalid!");
    return false;
    }
    }

</script>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/contact.css" /> 
<style>
 

html, body {
     width: 100%;
}
 body {
     overflow-x: hidden;
}
 .container{
     width: 50%;
     margin-top: 100px;
     margin-left: auto;
     margin-right: auto;
     text-align: center;
     max-width: 500px;
}
 @media only screen and (max-width: 600px) {
     .container {
         width: 80%;
    }
}

</style>

</head>

<body>
 	<br />
	<br />
	
	<div class="container">
<h1 style="text-align:center">Contact Form</h1>
		<form id = "contact" name="contact" onsubmit="return validateContactForm()" method="POST" >
			<label for="fname">Full Name</label>
			<br />
			<input type="text" id="name" name="name" placeholder="e.g Mike Tyson" />
			<br />
			<label for="lname">Email</label>
			<br />
			<input type="text" id="ContactEmail" name="email" placeholder="e.g miketyson@gmail.com" />
			<br />
			<label for="subject">Subject</label>
			<br />
			<br />
			<textarea id="subject" name="subject" maxlength = "125" placeholder="Questions & Concerns here. Maxlength 125 Characters allowed." style="height:200px"></textarea>
			<br />
			<input type="submit" name="Submit" value="Submit" /> </form>
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