<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password are provided
    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM member WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connect, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                // Password is correct, log in and store data for the session, redirect to menu
                $_SESSION['email'] = $user_data['email']; // Store email directly
                $_SESSION['user_data'] = $user_data;
                header("Location: menu.php");
                exit; // Use exit instead of die
            } else {
                // Email and password combination not found
                $login_error = "Invalid Email or password!";
            }
        } else {
            // Database query error
            $login_error = "Database error. Please try again.";
        }
    } else {
        // Invalid input
        $login_error = "Please enter valid information!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body class="signup-bcg">
    <div id="box">
        <form method="post">
            <div>Login</div>
            <input id="text" type="text" name="email" placeholder="E-mail"><br><br>
            <input id="text" type="password" name="password" placeholder="Password"><br><br>
            <?php if (isset($login_error)) { ?>
                <span style="color: red;">
                <?php echo $login_error; ?>
                </span><br><br>
                <?php } ?>
            <input id="button" type="submit" value="Login"><br><br>
            <a href="signup.php">Click to Signup</a><br><br>
        </form>
    </div>
</body>
</html>