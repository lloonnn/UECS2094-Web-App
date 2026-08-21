<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    $data = $username . "\t" . $email . "\t" . $gender . "\n";

    // Append the new user record to the users.txt file.
    file_put_contents("users.txt", $data, FILE_APPEND);
    echo "User record has been added.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<h2>Add User</h2>
<form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username"><br><br>

    <label for="email">Email:</label>
    <input type="text" name="email"><br><br>

    <label for="gender">Gender:</label>
    <select name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <br><br>
    <input type="submit" value="Add User">
</form>
</body>
</html>