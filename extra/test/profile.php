<?php
// ============================================================
// Task 5 : Profile page  (+ Bonus question)
// ============================================================

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "study_plan");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$studentId = "";
$student = "";          // will keep the student record if it is found
$errorMessage = "";

// Bonus 1 : check if the student ID is given in the URL (query parameter)
if (isset($_GET["student_id"]) && $_GET["student_id"] != "") {

    $studentId = $_GET["student_id"];

    // Look for the student in the students table
    $sql = "SELECT * FROM students WHERE student_id = '$studentId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Bonus 2 : the student ID exists
        $student = mysqli_fetch_assoc($result);
    } else {
        // Bonus 3 : the student ID does not exist
        $errorMessage = "Student ID not found. Please <a href='account.php'>register an account</a>.";
    }

} else {
    // Bonus 1 : no student ID in the URL
    $errorMessage = "Please enter your Student ID to view your profile.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Profile - UTAR Study Plan Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include "header.php"; ?>

<div class="content">

<?php if ($student == "") { ?>

    <!-- The student was not found, so ask the user to type the student ID -->
    <p class="center-message"><?php echo $errorMessage; ?></p>

    <h2>Enter Your Student ID</h2>

    <div class="card">
        <form action="profile.php" method="get">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="number" id="student_id" name="student_id">
            </div>
            <button type="submit" class="button">View Profile</button>
        </form>
    </div>

<?php } else { ?>

    <!-- Task 5 : show the student information -->
    <h2>My Profile</h2>
    <p><strong>Name:</strong> <?php echo $student["name"]; ?></p>
    <p><strong>Email:</strong> <?php echo $student["email"]; ?></p>
    <p><strong>Student ID:</strong> <?php echo $student["student_id"]; ?></p>

    <h3>Selected Courses</h3>

    <?php
    // Get the courses that this student has selected
    $courseSql = "SELECT courses.course_code, courses.course_name, courses.course_description
                  FROM student_courses, courses
                  WHERE student_courses.course_id = courses.course_id
                  AND student_courses.student_id = '$studentId'";
    $courseResult = mysqli_query($conn, $courseSql);

    if (mysqli_num_rows($courseResult) == 0) {
        // No course was selected by the student
        echo '<p>No course selected</p>';
    } else {
        echo '<table>';
        echo '<tr>';
        echo '<th>Course Code</th>';
        echo '<th>Course Name</th>';
        echo '<th>Course Description</th>';
        echo '</tr>';

        while ($row = mysqli_fetch_assoc($courseResult)) {
            echo '<tr>';
            echo '<td>' . $row["course_code"] . '</td>';
            echo '<td>' . $row["course_name"] . '</td>';
            echo '<td>' . $row["course_description"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>

<?php } ?>

</div>

</body>
</html>
<?php mysqli_close($conn); ?>
