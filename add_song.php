<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

// Check if the user is logged in and is an admin
$user_data = check_login($connect);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addSong'])) {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $composer = $_POST['composer'];
    $insertQuery = "INSERT INTO songs (title, artist, composer) 
                    VALUES ('$title', '$artist', '$composer')";
    if (mysqli_query($connect, $insertQuery)) {
        echo "<p>Song added successfully.</p>";
    } else {
        echo "<p>Error adding song: " . mysqli_error($connect) . "</p>";
    }

    header("Location: songs.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Song</title>
    <style>
        body {
            color: white;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="box">
    <h2>Add New Song</h2>
    <form method="post" action="add_song.php">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="artist">Artist:</label>
        <input type="text" name="artist" required><br>

        <label for="composer">Composer:</label>
        <input type="text" name="composer" required><br>

        <button type="submit" name="addSong">Add Song</button>
    </form>

    <br>
    <a href="songs.php">Back to Songs List</a>
</div>
</body>
</html>
