<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

// Check if the user is logged in
$user_data = check_login($connect);

// Fetch all songs from the database
$song_query = "SELECT * FROM songs";
$song_result = mysqli_query($connect, $song_query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Songs</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="page">
    <div class="header">
        <h2>All Songs</h2>
        <p>Welcome, <?php echo $user_data['fName']; ?></p>
    </div>

    <div class="container">
        <?php
        if ($song_result) {
            if (mysqli_num_rows($song_result) > 0) {
                while ($song = mysqli_fetch_assoc($song_result)) {
                    echo '<div class="user-box">';
                    echo '<p>Title: ' . $song['title'] . '</p>';
                    echo '<p>Artist: ' . $song['artist'] . '</p>';
                    echo '<p>Composer: ' . $song['composer'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<div class="user-box"><p>No songs found.</p></div>';
            }
        } else {
            echo "<p>Query failed: " . mysqli_error($connect) . "</p>";
        }
        if ($user_data && $user_data['is_admin'] == 1) {
            echo '<h3>Admin Options:</h3>';
            echo '<a class="delete-link" href="delete_song.php">Delete song</a>';
            echo '<a class="delete-link" href="add_song.php">Add song</a>';
        }
        ?>
        <a class="logout-link" href="menu.php">Menu</a>
        <a class="logout-link" href="logout.php">Logout</a>
    </div>
</body>
</html>
