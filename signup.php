<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php");
include("functions.php");

// Define an array for voice and day
$voiceType = array("Soprano I", "Soprano II","Alto I", "Alto II" );
$rehearsalDay = array("Monday", "Thursday");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $password = $_POST['password'];
    $memberAddress = $_POST['memberAddress'];
    $phoneNumber = $_POST['phoneNumber'];
    $dateJoined = $_POST['dateJoined'];
    $birthDate = $_POST['birthDate'];
    $voice = $_POST['voice'];
    $scheduleDay = $_POST['scheduleDay'];
    
    // Validate password
    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
        $password_error = "Password must be at least 8 characters long, contain at least one uppercase letter, and one number.";
    }

    // Validate date format for dateJoined
    if (!validateDateFormat($dateJoined)) {
        $date_error = "Invalid date format for Date Joined. Please use yyyy-mm-dd.";
    }

    // Validate date format for birthDate
    if (!validateDateFormat($birthDate)) {
        $birth_date_error = "Invalid date format for Birth Date. Please use yyyy-mm-dd.";
    }

    // Validate phone number
    if (strlen($phoneNumber) != 10 || !ctype_digit($phoneNumber)) {
        $phoneNumber_error = "Enter only 10 digits for your phone number.";
    }

    // If there are no errors insert to database
    if (!isset($password_error) && !isset($date_error) && !isset($birth_date_error) && !isset($phoneNumber_error)) {
        $query = "INSERT INTO member (email, fName, lName, password, memberAddress, phoneNumber, dateJoined, birthDate, voice, scheduleDay) VALUES ('$email', '$fName', '$lName', '$password', '$memberAddress', '$phoneNumber', '$dateJoined', '$birthDate', '$voice','$scheduleDay')";
        mysqli_query($connect, $query);
        header("Location: login.php");
        die;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="signup-bcg">
<div id="box">
    <form method="post">
        <div>Signup</div>
        <input id="text" type="email" name="email" placeholder="E-mail" required><br><br>
        <input id="text" type="text" name="fName" placeholder="First Name" required><br><br>
        <input id="text" type="text" name="lName" placeholder="Last Name" required><br><br>
        <input id="text" type="text" name="memberAddress" placeholder="Home Address" required><br><br>

        <!-- Error for password -->
        <input id="text" type="password" name="password" placeholder="Password" required><br><br>
        <?php if (isset($password_error)) { ?>
            <span style="color: red;"><?php echo $password_error; ?></span><br><br>
        <?php } ?>
        
        <!-- Error for phone number -->
        <input id="text" type="text" name="phoneNumber" placeholder="Phone Number" required><br><br>
        <?php if (isset($phoneNumber_error)) { ?>
            <span style="color: red;"><?php echo $phoneNumber_error; ?></span><br><br>
        <?php } ?>
       
        <!-- Error for joined date -->
        <input id="text" type="text" name="dateJoined" placeholder="Date Joined yyyy-mm-dd" value="<?php echo isset($dateJoined) ? htmlspecialchars($dateJoined) : ''; ?>" required><br><br>
        <?php if (isset($date_error)) { ?>
            <span style="color: red;"><?php echo $date_error; ?></span><br><br>
        <?php } ?>

        <!-- Error for birth date -->
        <input id="text" type="text" name="birthDate" placeholder="Birth Date yyyy-mm-dd" required><br><br>
        <?php if (isset($birth_date_error)) { ?>
            <span style="color: red;"><?php echo $birth_date_error; ?></span><br><br>
        <?php } ?>

        <!-- Dropdown menu for voice type -->
        <label style="color: white;" for="voice">Select Your Voice:</label>
        <select id="voice" name="voice">
            <?php
            foreach ($voiceType as $voiceOption) 
            {
                echo "<option value=\"$voiceOption\">$voiceOption</option>";
            }
            ?>
        </select><br><br>

        <!-- Dropdown menu for schedule day -->
        <label style="color: white;" for="scheduleDay">Select day you will participate:</label>
        <select id="scheduleDay" name="scheduleDay">
            <?php
            foreach ($rehearsalDay as $dayOption) 
            {
                echo "<option value=\"$dayOption\">$dayOption</option>";
            }
            ?>
        </select><br><br>

        <input id="button" type="submit" value="Signup"><br><br>
        <a href="login.php">Click to Login</a><br><br>
    </form>
</div>
</body>
</html>