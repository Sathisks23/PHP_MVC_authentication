<?php
session_start();
require_once '../model/Connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = new Connection('localhost', 'dckap', 'Dckap2023Ecommerce', 'practice');
    $user = $con->getUserByEmail($email);

   
    if ($user && $user['password'] === md5($password)) {
     
        $_SESSION['username'] = $user['name'];

        
        header("Location: ../view/home.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>
