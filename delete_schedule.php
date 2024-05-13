<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

// Check if the user is logged in and is an admin
$user_data = check_login($connect);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteSchedule'])) {
    // Delete the selected schedule from the database
    $scheduleID = $_POST['scheduleID'];
    $deleteQuery = "DELETE FROM schedule WHERE scheduleID = '$scheduleID'";
    mysqli_query($connect, $deleteQuery);

    header("Location: schedule.php"); // Redirect back to the schedule listing page
    exit;
}

// Fetch all schedules for the form selection
$query = "SELECT scheduleID, scheduleDate FROM schedule";
$result = mysqli_query($connect, $query);
$schedules = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Schedule</title>
    <style>
        body {
            color: white;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="box">
    <h2>Delete Schedule</h2>
    <form method="post" action="delete_schedule.php">
        <label for="scheduleID">Select Schedule to Delete:</label>
        <select name="scheduleID" required>
            <?php foreach ($schedules as $schedule) {
                echo "<option value='{$schedule['scheduleID']}'>{$schedule['scheduleWeekDay']} - {$schedule['scheduleDate']}</option>";
            } ?>
        </select>
        <br>
        <p>Are you sure you want to delete this schedule?</p>
        <button type="submit" name="deleteSchedule" value="Yes">Yes</button>
        <button type="button" onclick="window.location.href='schedule.php'">No</button>
    </form>

    <br>
    <a href="schedule.php">Go back</a>
</div>
</body>
</html>
