<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

// Check if the user is logged in and is an admin
$user_data = check_login($connect);

// Pull all available members from the database
$query = "SELECT email
          FROM member";
$result = mysqli_query($connect, $query);

// Check if the query was successful
if ($result) {
 // Put all members into an array
    $emails = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
// Handle query error
    die("Error fetching members: " . mysqli_error($connect));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteMember'])) {
    // Delete the selected member from the database
    $selectedEmail = $_POST['email'];
    $deleteQuery = "DELETE FROM member 
                    WHERE email = '$selectedEmail'";
    mysqli_query($connect, $deleteQuery);

    header("Location: members.php"); 
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Member</title>
    <style>
        body {
            color: white;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="box">
    <h2>Delete Member</h2>
    <form method="post" action="delete_member.php">
        <label for="email">Select Member to Delete:</label>
        <select name="email" required>
            <?php
            foreach ($emails as $em) {
                echo "<option value='{$em['email']}'>{$em['email']}</option>";
            }
            ?>
        </select>

        <br>

        <p>Are you sure you want to delete this member?</p>
        <button type="submit" name="deleteMember" value="Yes">Yes</button>
        <button type="button" onclick="window.location.href='members.php'">No</button>
    </form>

    <br>
    <a href="members.php">Go back</a>
</div>
</body>
</html>
