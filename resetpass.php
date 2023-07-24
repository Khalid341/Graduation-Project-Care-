<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";



$user_password = $_REQUEST['user_password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE user SET user_password='".$user_password."' WHERE user_email='".$_SESSION["user_email"]."'";

if ($conn->query($sql) === TRUE) {
    header("location: index.html");
} else {
    header("location: reset.html");
}

$conn->close();
?>