<?php
// =====================================================
// Task 2 + Task 4 (c)(d) - Registration page
// The form is shown, and when it is submitted the data
// is saved into the "utar_table" table of "utar_db".
// =====================================================

$successMessage = "";   // green message (Task 4 d)
$errorMessage   = "";    // red message if saving failed

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "connect.php";

    // read what the user typed
    $name       = trim($_POST["name"]);
    $email      = trim($_POST["email"]);
    $sid        = trim($_POST["sid"]);
    $department = $_POST["department"];
    $password   = $_POST["password"];

    // server side check as well, in case JavaScript is turned off
    if ($name == "" || $email == "" || $sid == "" || $department == "" || $password == "") {
        $errorMessage = "Please fill in all the fields.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a valid email address.";
    } else if (strlen($password) <= 4) {
        $errorMessage = "Password must be more than 4 characters.";
    } else {

        // save into the database
        $sql  = "INSERT INTO utar_table (Name, Email, StudentStaffID, Department, Password)
                 VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $sid, $department, $password);

        if ($stmt->execute()) {
            $successMessage = "Registration successful.";
        } else {
            // error number 1062 means the name already exists (Name is UNIQUE)
            if ($conn->errno == 1062) {
                $errorMessage = "This name is already registered. Please use another name.";
            } else {
                $errorMessage = "Registration failed. Please try again.";
            }
        }

        $stmt->close();
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Account</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validate.js"></script>
</head>
<body>

    <h1 class="page-title">Create a New Account</h1>

    <div class="form-box">

        <?php if ($successMessage != "") { ?>
            <p class="success-msg">
                <?php echo $successMessage; ?> Return back to <a href="index.html">Home Page</a>.
            </p>
        <?php } ?>

        <?php if ($errorMessage != "") { ?>
            <p class="fail-msg"><?php echo $errorMessage; ?></p>
        <?php } ?>

        <form action="register.php" method="post" onsubmit="return validateRegisterForm()">

            <div class="field">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
                <span class="error" id="nameError"></span>
            </div>

            <div class="field">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <span class="error" id="emailError"></span>
            </div>

            <div class="field">
                <label for="sid">Student/Staff ID:</label>
                <input type="text" id="sid" name="sid">
                <span class="error" id="sidError"></span>
            </div>

            <div class="field">
                <label for="department">Department:</label>
                <select id="department" name="department">
                    <option value="Department of Electrical and Electronic Engineering">Department of Electrical and Electronic Engineering</option>
                    <option value="Department of Internet Engineering and Computer Science">Department of Internet Engineering and Computer Science</option>
                    <option value="Department of Mathematics">Department of Mathematics</option>
                </select>
                <span class="error" id="deptError"></span>
            </div>

            <div class="field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <span class="error" id="passwordError"></span>
            </div>

            <input type="submit" value="Register">

        </form>

    </div>

    <a class="back-link" href="index.html">Back to Home Page</a>

</body>
</html>
