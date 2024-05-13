<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

// Check if the user is logged in
$user_data = check_login($connect);
$user_query = "SELECT * FROM member";
$user_result = mysqli_query($connect, $user_query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="page">
    <div class="header">
        <h2>All Users</h2>
        <p>Welcome, <?php echo $user_data['fName']; ?>!</p>
    </div>

    <div class="container">
        <?php
        if ($user_result) {
            if (mysqli_num_rows($user_result) > 0) {
                while ($user = mysqli_fetch_assoc($user_result)) {
                    echo '<div class="user-box">';
                    echo '<p>Email: ' . $user['email'] . '</p>';
                    echo '<p>Name: ' . $user['fName'] . ' ' . $user['lName'] . '</p>';
                    echo '<p>Address: ' . $user['memberAddress'] . '</p>';
                    echo '<p>Phone Number: ' . $user['phoneNumber'] . '</p>';
                    echo '<p>Date Joined: ' . $user['dateJoined'] . '</p>';
                    echo '<p>Birth Date: ' . $user['birthDate'] . '</p>';
                    echo '<p>Voice: ' . $user['voice'] . '</p>';
                    echo '<p>Schedule Day: ' . $user['scheduleDay'] . '</p>';
                    echo '<p>Admin: ' . ($user['is_admin'] ? 'Yes' : 'No') . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<div class="user-box">';
                echo "<p>No users found.</p>";
                echo '</div>';
            }
        } else {
            echo "Query failed: " . mysqli_error($connect);
        }
        ?>
            
        <h3>Admin Options:</h3>
        <a class="delete-link" href="delete_member.php">Delete member</a>
        <a class="logout-link" href="menu.php">Menu</a>
        <a class="logout-link" href="logout.php">Logout</a>
    </div>
</body>
</html>
