<?php
// =====================================================
// Task 5 (a) - Request Profile Edit
// The user types the email of the profile to be edited.
// If the profile exists we go to update_profile.php,
// if not we show a red error message here.
// =====================================================

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "connect.php";

    $email = trim($_POST["email"]);

    if ($email == "") {
        $errorMessage = "Please enter an email.";
    } else {

        // look for the profile in the database
        $sql  = "SELECT ID FROM utar_table WHERE Email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // profile found -> open the edit profile page
            $row = $result->fetch_assoc();
            $stmt->close();
            $conn->close();
            header("Location: update_profile.php?id=" . $row["ID"]);
            exit();
        } else {
            $errorMessage = "Profile not found. Please check the email.";
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
    <title>Request Profile Edit</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validate.js"></script>
</head>
<body>

    <h1 class="page-title">Request Profile Edit</h1>

    <div class="form-box">

        <?php if ($errorMessage != "") { ?>
            <p class="fail-msg"><?php echo $errorMessage; ?></p>
        <?php } ?>

        <form action="edit_profile.php" method="post" onsubmit="return validateSearchForm()">

            <div class="field">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <span class="error" id="emailError"></span>
            </div>

            <input type="submit" value="Search Profile">

        </form>

    </div>

    <a class="back-link" href="index.html">Back to Home Page</a>

</body>
</html>
