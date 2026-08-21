<?php
session_start();

if(isset($_SESSION["email"])){
    header("Location: account.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = mysqli_connect("localhost", "root", "", "lab9", 3306);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM users WHERE email = '$email' AND password='" . md5($password) . "'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) === 1){
        $_SESSION["email"] = $email;
        header("Location: account.php");
        exit();
    }else{
        $error = "Invalid email or password.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../form.css">
    </head>
    <body>
        <h1>Login</h1>

        <?php if(isset($error)) echo "<p></p>"?>
        <form method="post">
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required> 

            <input type="submit" value="Login">
        </form>
        <br>

        <p>Don't have an account? Click here to <a href="create.php">create</a></p>
    </body>
</html>