<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

// Check if the user is logged in
$user_data = check_login($connect);

if (!$user_data) {
    // Handle  the user not being logged in
    header("Location: login.php");
    exit;
}

// Determine the query based on whether the user is an admin or not
if ($user_data['is_admin']) {
    // Admin sees everyone's attendance
    $attendance_query = "SELECT a.email, a.attendanceValue, s.scheduleDate 
    FROM attendance a 
    JOIN schedule s ON a.scheduleID = s.scheduleID 
    ORDER BY s.scheduleDate DESC";
} else {
    // Regular users see only their own attendance
    $email = $user_data['email'];  
    $attendance_query = "SELECT a.email, a.attendanceValue, s.scheduleDate 
    FROM attendance a 
    JOIN schedule s ON a.scheduleID = s.scheduleID 
    WHERE a.email = '$email' ORDER BY s.scheduleDate DESC";
}

$attendance_result = mysqli_query($connect, $attendance_query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Attendance</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="page">
    <div class="header">
        <h2>Your Attendance</h2>
        <p>Welcome, <?php echo $user_data['fName']; ?></p>
    </div>

    <div class="container">
        <?php
        if ($attendance_result) {
            if (mysqli_num_rows($attendance_result) > 0) {
                while ($attendance = mysqli_fetch_assoc($attendance_result)) {
                    echo '<div class="user-box">';
                    echo '<p>Date: ' . $attendance['scheduleDate'] . '</p>';
                    echo '<p>Status: ' . ($attendance['attendanceValue'] ? 'Present' : 'Absent') . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<div class="user-box"><p>No attendance records found.</p></div>';
            }
        } else {
            echo "<p>Query failed: " . mysqli_error($connect) . "</p>";
        }
        ?>
        <a class="logout-link" href="menu.php">Menu</a>
        <a class="logout-link" href="logout.php">Logout</a>
    </div>
</body>
</html>
