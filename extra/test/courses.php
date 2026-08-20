<?php
// ============================================================
// Task 4 : List of Courses page
// ============================================================

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "study_plan");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorMessage = "";
$studentId = "";

// ---------- This part runs when "Save Selected Courses" is clicked ----------
if (isset($_POST["save"])) {

    $studentId = $_POST["student_id"];

    // Task 4 (c) : check if the student ID exists in the students table
    $checkSql = "SELECT * FROM students WHERE student_id = '$studentId'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) == 0) {
        // Student ID not found, show an error with a link to the registration page
        $errorMessage = "Error: Student ID does not exist. Please <a href='account.php'>register</a>.";
    } else {
        // Task 4 (b) : save every checked course into the student_courses table
        if (isset($_POST["courses"])) {
            foreach ($_POST["courses"] as $courseId) {
                $insertSql = "INSERT IGNORE INTO student_courses (student_id, course_id)
                              VALUES ('$studentId', '$courseId')";
                mysqli_query($conn, $insertSql);
            }
        }

        // Task 4 (d) : go to the profile page and pass the student ID in the URL
        mysqli_close($conn);
        header("Location: profile.php?student_id=" . $studentId);
        exit();
    }
}

// Task 4 (a) : get all the courses from the courses table
$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Select Courses - UTAR Study Plan Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include "header.php"; ?>

<div class="content">
    <h2>Select Courses</h2>

    <?php if ($errorMessage != "") { ?>
        <p class="error-message"><?php echo $errorMessage; ?></p>
    <?php } ?>

    <div class="card">
        <form action="courses.php" method="post">

            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="number" id="student_id" name="student_id" value="<?php echo $studentId; ?>">
            </div>

            <h3>Available Courses</h3>

            <?php
            // Show every course from the database
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="course">';
                echo '<input type="checkbox" name="courses[]" value="' . $row["course_id"] . '">';
                echo '<label class="course-title">' . $row["course_code"] . ' - ' . $row["course_name"] . '</label>';
                echo '<p class="course-desc">' . $row["course_description"] . '</p>';
                echo '</div>';
            }
            ?>

            <button type="submit" name="save" class="button">Save Selected Courses</button>

        </form>
    </div>
</div>

</body>
</html>
<?php mysqli_close($conn); ?>
