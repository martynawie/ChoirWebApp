<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

// Check if the user is logged in and is an admin
$user_data = check_login($connect);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteSong'])) {
    // Delete the selected song from the database
    $songID = $_POST['songID'];
    $deleteQuery = "DELETE FROM songs 
                    WHERE songID = '$songID'";
    mysqli_query($connect, $deleteQuery);

    header("Location: songs.php"); // Redirect back to the song listing page
    exit;
}

// Fetch all songs for the form selection
$query = "SELECT songID, title 
          FROM songs";
$result = mysqli_query($connect, $query);
$songs = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Delete Song</title>
    <style>
        body {
            color: white;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="box">
    <h2>Delete Song</h2>
    <form method="post" action="delete_song.php">
        <label for="songID">Select Song to Delete:</label>
        <select name="songID" required>
            <?php foreach ($songs as $song) {
                echo "<option value='{$song['songID']}'>{$song['title']}</option>";
            } ?>
        </select>
        <br>
        <p>Are you sure you want to delete this song?</p>
        <button type="submit" name="deleteSong" value="Yes">Yes</button>
        <button type="button" onclick="window.location.href='songs.php'">No</button>
    </form>

    <br>
    <a href="songs.php">Go back</a>
</div>
</body>
</html>
