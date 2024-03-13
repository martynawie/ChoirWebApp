<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Choir";

$connect = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>