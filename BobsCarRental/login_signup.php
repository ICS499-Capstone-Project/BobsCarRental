<script>
  function validateLoginForm() {
        var username = document.forms["logIN"]["username"].value;
        var email = document.forms["logIN"]["email"].value;
        var firstpassword = document.forms["logIN"]["password"].value;

     if (username == ""){
             alert("Username is Required!");
            return false;
        }

       if (email == ""){
             alert("Email is Required!");
            return false;
        }

       if (firstpassword == ""){
             alert("Pasword is Required!");
            return false;
        }

		return validateLoginEmail();
        
    }

function validateLoginEmail() {
    var email = document.getElementById('loginEmail').value;
    var regx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/;
    if(regx.test(email)) {

    //alert("Valid email address!");
    return true;
    }
    else
    {
    alert("You have entered an invalid email address!");
    return false;
    }
    }

    function validateSignUpForm() {
        var username = document.forms["logOUT"]["username"].value;
        var email = document.forms["logOUT"]["email"].value;
        var firstpassword = document.forms["logOUT"]["password_1"].value;
        var secondpassword = document.forms["logOUT"]["password_2"].value;
     if (username == ""){
             alert("Username can not be empty!");
            return false;
        }

       if (email == ""){
             alert("Email can not be empty!");
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

		return validateSignUpEmail();
        
    }

function validateSignUpEmail() {
    var email = document.getElementById('email').value;
    var regx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/;
    if(regx.test(email)) {

    alert("Valid email address!");
    return true;
    }
    else
    {
    alert("You have entered an invalid email address!");
    return false;
    }
    }

</script>
<!-- Login Form -->
<div id="myModal1" class="modal0">
<!-- Modal content -->
	<div class="modal0-content"> <span class="close">&times;</span> 
		<h1>LOG IN</h1>
		<form id="logIN" name="login" action="index.php" method="POST" onsubmit="return validateLoginForm()">
			<label><b>Username</b></label>
			<br>
			<input type="text" id="userName" name="username" autofocus placeholder="e.g. user">
			<!-- <span class="error"> //<php echo $nameErr;?></span> -->
			</br>
			<label><b>email</b></label>
            <input type="text" name="email" id="loginEmail" autofocus placeholder="e.g. user@gmail.com">
			</br>
			<label><b>Password</b></label>
			<br>
			<input type="password" class="pass" name="password"  autofocus placeholder="e.g. user">
			</br>
			<br>
			<button id="btn" class="button1" type="submit" name="login" value="Login_btn">Login</button>
           <div class="resetPassword">
    <p>Forgot Password?<a href="resetpassword.php"><b>Reset Password</b></a></p>
    </div>
    </form>
	</div>
</div>

 <!-- Sign Up Form -->
<div id="myModal2" class="modal2">
	<!-- Modal content -->
<div class="modal-content"> <span class="close2">&times;</span>  
<form id="logOUT" name="logout" action="index.php" onsubmit="return validateSignUpForm()" method="POST">
  <h1>Sign Up</h1>
    <p>Registration Form</p>
    <hr>
   <label>Username:</label><br>
	<input type="text" class="user" name="username" autofocus placeholder="Enter Username">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" id="email" name="email" >
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password_1"  autofocus>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password_2"  autofocus> 
    <br>
    <button type="button" class="cancelbtn" onclick="resetFunction()">Reset</button>
    <button id="btn2" class="submitBtn" type="submit" name="sign_UP" value="Signup_btn">Sign Up</button>
    <div class="signin">
    <p>Already have an account?<a href="index.php"><b>Sign in</b></a></p>
    </div>
    </form>
</div>
</div>