<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

// Check if the user is logged in and is an admin
$user_data = check_login($connect);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addSchedule'])) {
    $rehearsalWeekDay = $_POST['rehearsalWeekDay'];
    $scheduleDate = $_POST['scheduleDate'];
    $insertQuery = "INSERT INTO schedule (rehearsalWeekDay, scheduleDate) VALUES ('$rehearsalWeekDay', '$scheduleDate')";
    if (mysqli_query($connect, $insertQuery)) {
        echo "<p>Schedule added successfully.</p>";
    } else {
        echo "<p>Error adding schedule: " . mysqli_error($connect) . "</p>";
    }

    header("Location: schedule.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Schedule</title>
    <style>
        body {
            color: white;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="box">
    <h2>Add New Schedule</h2>
    <form method="post" action="add_schedule.php">
        <label for="rehearsalWeekDay">Weekday:</label>
        <select name="rehearsalWeekDay" required>
            <option value="Monday">Monday</option>
            <option value="Thursday">Thursday</option>
        </select><br>

        <label for="scheduleDate">Date:</label>
        <input type="date" name="scheduleDate" required><br>

        <button type="submit" name="addSchedule">Add Schedule</button>
    </form>

    <br>
    <a href="schedule.php">Back to Schedule List</a>
</div>
</body>
</html>


