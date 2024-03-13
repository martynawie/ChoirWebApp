
<?php
function check_login($con)
{
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $query = "SELECT * FROM member WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    die;
}

function getUserData($con, $email)
{
    $query = "SELECT * FROM member WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
    }
    return null;
}

function validateDateFormat($date) {
    $format = 'Y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

?>
