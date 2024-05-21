<?php
session_start();
require_once '../model/Connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $hashedPassword = md5($password);

    $con = new Connection('localhost', 'dckap', 'Dckap2023Ecommerce', 'practice');
    $con->insert($username, $email, $hashedPassword);

   
    $_SESSION['username'] = $username;

  
    header("Location: ../view/home.php");
    exit();
}
?>