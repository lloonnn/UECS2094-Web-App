<?php
// ---------- Task 3 (c) : save the new student into the database ----------

$errorMessage = "";

// This part only runs when the Register button is clicked
if (isset($_POST["register"])) {

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "study_plan");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Take the data from the form
    $student_id = $_POST["student_id"];
    $name       = $_POST["name"];
    $email      = $_POST["email"];
    $password   = $_POST["password"];

    // Insert the data into the students table
    $sql = "INSERT INTO students (student_id, name, email, password)
            VALUES ('$student_id', '$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        // Registration successful -> go to the List of Courses page
        mysqli_close($conn);
        header("Location: courses.php");
        exit();
    } else {
        $errorMessage = "Registration failed. The Student ID may already be used.";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register Account - UTAR Study Plan Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include "header.php"; ?>

<div class="content">
    <h2>Create an Account</h2>

    <?php if ($errorMessage != "") { ?>
        <p class="error-message"><?php echo $errorMessage; ?></p>
    <?php } ?>

    <!-- Task 3 (a) : the registration form -->
    <div class="card">
        <form action="account.php" method="post" onsubmit="return validateForm()" novalidate>

            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name">
                <span class="error" id="nameError"></span>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="text" id="email" name="email">
                <span class="error" id="emailError"></span>
            </div>

            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="number" id="student_id" name="student_id">
                <span class="error" id="studentIdError"></span>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <span class="error" id="passwordError"></span>
            </div>

            <button type="submit" name="register" class="button">Register</button>

        </form>
    </div>
</div>

<!-- Task 3 (b) : external JavaScript file for client-side validation -->
<script src="validation.js"></script>

</body>
</html>
