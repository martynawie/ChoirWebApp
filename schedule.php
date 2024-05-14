<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

$user_data = check_login($connect);

// Determine if the user is an admin or not
if ($user_data && $user_data['is_admin'] == 1) {
    $schedule_query = "SELECT * 
                       FROM schedule"; // Admin sees all schedules
} else {
    // Regular users see only schedules on their day
    $userDay = $user_data['scheduleDay']; 
    $schedule_query = "SELECT * 
                       FROM schedule WHERE rehearsalWeekDay = '$userDay'";
}

$schedule_result = mysqli_query($connect, $schedule_query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Schedules</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="header">
        <h2>Schedule:</h2>
        <p>Welcome, <?php echo htmlspecialchars($user_data['fName']); ?></p>
    </div>

    <div class="container">
        <?php
        if ($schedule_result) {
            if (mysqli_num_rows($schedule_result) > 0) {
                while ($schedule = mysqli_fetch_assoc($schedule_result)) {
                    echo '<div class="user-box">';
                    echo '<p>Week Day: ' . $schedule['rehearsalWeekDay'] . '</p>';
                    echo '<p>Date: ' . $schedule['scheduleDate'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<div class="user-box"><p>No schedules found.</p></div>';
            }
        } else {
            echo "<p>Query failed: " . mysqli_error($connect) . "</p>";
        }

        if ($user_data && $user_data['is_admin'] == 1) {
            echo '<h3>Admin Options:</h3>';
            echo '<a class="delete-link" href="delete_schedule.php">Delete schedule</a>';
            echo '<a class="delete-link" href="add_schedule.php">Add schedule</a>';
        }
        
        echo '<a class="logout-link" href="menu.php">Menu</a>';
        echo '<a class="logout-link" href="logout.php">Logout</a>';
        ?>
    </div>
</body>
</html>
