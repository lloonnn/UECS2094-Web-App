<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $conn = mysqli_connect("localhost", "root", "", "lab9", 3306);
    if(!$conn){
        die("Connection failed:" . mysqli_connect_error());
    }

    $email = mysqli_escape_string($conn, $_POST["email"]);
    $password = mysqli_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $sql);

    if(mysqli_num_rows($checkResult) > 0){
        echo "Email already exists. Please use a different email.";
    }else{
        $hashed_password = md5($password);
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

        if(mysqli_query($conn, $sql)){
            echo "Account created successfully.";
            echo "<a href='login.php'>Log in here</a>";
        }else{
            echo "Error creating account: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create Account</title>
        <link rel="stylesheet" href="../form.css">
    </head>
    <body>
        <h1>Create Account</h1>
        <form method="post">
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required> 

            <input type="submit" value="Create Account">
        </form>
        <br>

        <p>Already have an account? Click here to <a href="login.php">login</a></p>
    </body>
</html>