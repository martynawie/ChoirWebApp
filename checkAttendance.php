<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

// Check if the user is logged in
$user_data = check_login($connect);

// Fetch all members and their scheduleDay along with all schedule information
$member_query = "SELECT m.email, m.scheduleDay, s.scheduleID, s.rehearsalWeekDay, s.scheduleDate 
                 FROM member m 
                 JOIN schedule s ON m.scheduleDay = s.rehearsalWeekDay";
$member_result = mysqli_query($connect, $member_query);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitAttendance'])) {
    foreach ($_POST['attendance'] as $scheduleID => $emails) {
        foreach ($emails as $email => $attendanceValue) {
            $insertQuery = "INSERT INTO attendance (email, scheduleID, attendanceValue) 
                            VALUES ('$email', '$scheduleID', '$attendanceValue')
                            ON DUPLICATE KEY UPDATE attendanceValue = '$attendanceValue'";
            mysqli_query($connect, $insertQuery);
        }
    }
    echo "<p>Attendance updated successfully.</p>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Check Attendance</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="header">
    <h2>Check Attendance</h2>
    <p>Welcome, <?php echo $user_data['fName']; ?></p>
</div>

<div class="container">
    <form method="post" action="checkAttendance.php">
    <?php
    if (mysqli_num_rows($member_result) > 0) {
        while ($row = mysqli_fetch_assoc($member_result)) {
            echo "<div class='user-box'>";
            echo "<p>" . $row['email'] . " - " . $row['scheduleDay'] . " - " . $row['scheduleDate'] . "</p>";
            echo '<label><input type="radio" name="attendance[' . $row['scheduleID'] . '][' . $row['email'] . ']" value="1"> Present</label>';
            echo '<label><input type="radio" name="attendance[' . $row['scheduleID'] . '][' . $row['email'] . ']" value="0" checked> Absent</label><br>';
            echo "</div>";
        }
    } else {
        echo "<p>No members or schedules found.</p>";
    }
    ?>
    <button type="submit" name="submitAttendance">Submit Attendance</button>
    </form>
</div>
<a href="menu.php">Back to Menu</a>
</body>
</html>
