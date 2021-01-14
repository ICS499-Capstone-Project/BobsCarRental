<?php
session_start();
include "navbar.php";

if (isset($_GET['booking'])) {
  if ($_GET['booking'] == "login") {
    echo '<script>alert("You must login before booking a car.")</script>';
  }
}

// User Registration
if (isset($_POST['sign_UP']))
{
    include 'db.php';
    // include 'errors.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    
    // Check db if user exists with username/email
    $user_check_query = "SELECT * FROM customer WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    if (mysqli_num_rows($result) > 0)
    {
        echo "username exists";
    }
    else
    {
        // Encrypt the password before saving into DB
        $password = md5($password_1);
        //$password = $password_1;
        $query = "INSERT INTO customer (username, email, password) VALUES('$username', '$email', '$password')";
        $result = mysqli_query($conn, $query);
        echo "Inserted into Customer Table";
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        echo "Please login";
        header('location:index.php');
    }
}
// User Login
if (isset($_POST['login']))
{
    echo "Received login data";
    include 'db.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username;
    echo $password;
    $qy = "SELECT * FROM customer WHERE username = '" . $username . "' AND password = '" . $password . "'";
    $log = $conn->query($qy);
    $num = $log->num_rows;
    $row = $log->fetch_assoc();
    if ($num > 0)
    {
        $_SESSION['user_level'] = $row['user_level']; 
        echo $_SESSION['user_level'];
        // If user level is = 1 ADMIN
        $_SESSION['is_login'] = 'yes';
        if ($_SESSION['user_level'] == 1)
        {
            header('location:manage_cars.php');
        }
        // If user level is = 0 USER
        if ($_SESSION['user_level'] == 0)
        {
            header('location:booking.php');
        }
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        echo '<script>alert("Log in Successful.")</script>';
        // echo '<script language="javascript">window.location = "booking.php";</script>';
        
    }
    else
    {
        echo '<script>alert("Invalid username or password.")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head> 
<link href = "css/login_signup.css" rel = "stylesheet">
<style>
#home_container {
	margin-left: 400px;
	margin-right: 400px;
	margin-top: 100px;
	text-align: center;
}
#p {
    font-size:32px;
}
</style>
</head>
<body>
<!-- New Code added -->
<?php
echo "Welcome User".$_SESSION["username"];
?>
<div id="home_container">
	<h1>Welcome</h1>
	<h2>#1 Trusted Car Rental Worldwide</h2>
	<p id="p">Best Car Rental Services with unbeatable price!. Find your next great rental expericence with us<span id="dots3">...</span><span id="more"> with unlimited cars available daily. 
     Save money on rental cars deals today. Best prices in the coutry granted. Rent our cars today!</span></p>
	<button onclick="myFunction()" id="myBtn3">Read more</button>
</div>
<script>
function myFunction() {
  var dots = document.getElementById("dots3");
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

