<?php
include("connect.php");
include("functions.php");
session_start();

$user_data = check_login($connect);

if (!isset($_GET['user_id']) || !$user_data['is_admin']) {
    // Redirect if user ID not provided or if user is not an admin
    header("Location: members.php");
    exit;
}

$userId = $_GET['user_id'];

// Prevent an admin from deleting their own account
if ($userId == $user_data['id']) {
    echo "You cannot delete your own account.";
    exit;
}

// Check if the user to be deleted is an admin
$user_query = "SELECT is_admin FROM member WHERE id = $userId";
$user_result = mysqli_query($connect, $user_query);
if ($user_result && $row = mysqli_fetch_assoc($user_result)) {
    if ($row['is_admin']) {
        echo "Cannot delete another admin.";
    } else {
        $delete_query = "DELETE FROM member WHERE id = $userId";
        $delete_result = mysqli_query($connect, $delete_query);
        if ($delete_result) {
            echo "Member deleted successfully.";
        } else {
            echo "Error deleting member.";
        }
    }
} else {
    echo "No such user found.";
}

header("Location: members.php");
exit;
?>