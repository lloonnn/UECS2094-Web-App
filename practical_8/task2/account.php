<?php
session_start();

if(!isset($_SESSION["email"])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Account</title>
        <link rel="stylesheet" href="../form.css">
    </head>
    <body>
        <h1>Welcome, <?= $_SESSION["email"]; ?>>!</h1>
        <a href="logout.php">Logout</a>
    </body>
</html>