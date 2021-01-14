<?php
session_start();
if(session_destroy()) {
//header("Location: index.php"); // Redirecting To Home Page
header('Location:index.php?msg=' . urlencode(base64_encode("You have been successfully logged out!")));
}
?>