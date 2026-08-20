<?php
// =====================================================
// Database connection (used by register.php, edit_profile.php,
// update_profile.php)
// Default XAMPP settings: user = root, no password
// =====================================================

// In PHP 8 mysqli stops the whole page when a query fails. We turn that off
// so that we can check the result ourselves with if / else and show our own
// error message on the page.
mysqli_report(MYSQLI_REPORT_OFF);

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "utar_db";

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Stop the page if the connection failed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
