<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: view/home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome</h1>
    <a href="view/registration.php">Register</a> | 
    <a href="view/login.php">Login</a>
</body>
</html>