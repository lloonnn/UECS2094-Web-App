<?php
// =====================================================
// Task 5 (a)(b)(c) - Edit Profile
// The form is filled with the information already in the
// database. When "Update Profile" is clicked the record is
// updated and the user is sent back to the Home Page.
// If the update fails, we stay here and show a red message.
// =====================================================

include "connect.php";

$errorMessage = "";

// ---------- the user clicked "Update Profile" ----------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id         = $_POST["id"];
    $name       = trim($_POST["name"]);
    $sid        = trim($_POST["sid"]);
    $department = trim($_POST["department"]);
    $password   = $_POST["password"];

    if ($name == "" || $sid == "" || $department == "" || $password == "") {
        $errorMessage = "Please fill in all the fields.";
    } else if (strlen($password) <= 4) {
        $errorMessage = "Password must be more than 4 characters.";
    } else {

        $sql  = "UPDATE utar_table
                 SET Name = ?, StudentStaffID = ?, Department = ?, Password = ?
                 WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $sid, $department, $password, $id);

        if ($stmt->execute()) {
            // (b) successful -> go back to the Home Page
            $stmt->close();
            $conn->close();
            header("Location: index.html");
            exit();
        } else {
            // (c) not successful -> stay here and show the error
            if ($conn->errno == 1062) {
                $errorMessage = "This name is already used by another profile.";
            } else {
                $errorMessage = "Update failed. Please try again.";
            }
        }

        $stmt->close();
    }
}

// ---------- read the profile so the form can be filled ----------
// after a POST we use the id from the form, otherwise from the link
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
} else {
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
}

if ($id == "") {
    // somebody opened this page directly, send them to the search page
    header("Location: edit_profile.php");
    exit();
}

$sql  = "SELECT * FROM utar_table WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $stmt->close();
    $conn->close();
    header("Location: edit_profile.php");
    exit();
}

$user = $result->fetch_assoc();
$stmt->close();
$conn->close();

// if the form was submitted, keep what the user typed on the screen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user["Name"]           = $_POST["name"];
    $user["StudentStaffID"] = $_POST["sid"];
    $user["Department"]     = $_POST["department"];
    $user["Password"]       = $_POST["password"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validate.js"></script>
</head>
<body>

    <h1 class="page-title">Edit Profile</h1>

    <div class="form-box">

        <?php if ($errorMessage != "") { ?>
            <p class="fail-msg"><?php echo $errorMessage; ?></p>
        <?php } ?>

        <form action="update_profile.php" method="post" onsubmit="return validateUpdateForm()">

            <!-- the ID is kept hidden so we know which row to update -->
            <input type="hidden" name="id" value="<?php echo $user["ID"]; ?>">

            <div class="field">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user["Name"]); ?>">
                <span class="error" id="nameError"></span>
            </div>

            <div class="field">
                <label for="sid">Student/Staff ID:</label>
                <input type="text" id="sid" name="sid" value="<?php echo htmlspecialchars($user["StudentStaffID"]); ?>">
                <span class="error" id="sidError"></span>
            </div>

            <div class="field">
                <label for="department">Department:</label>
                <input type="text" id="department" name="department" value="<?php echo htmlspecialchars($user["Department"]); ?>">
                <span class="error" id="deptError"></span>
            </div>

            <div class="field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user["Password"]); ?>">
                <span class="error" id="passwordError"></span>
            </div>

            <input type="submit" value="Update Profile">

        </form>

    </div>

    <a class="back-link" href="index.html">Back to Home Page</a>

</body>
</html>
