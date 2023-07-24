<?php

//$sql ='SELECT * FROM user';$result = mysqli_query($conn,$sql);$user = mysqli_fetch_all($result,   MYSQLI_ASSOC);print_r($user);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$user_name = $_REQUEST['user_name'];
$user_ph_num = $_REQUEST['user_ph_num'];
$user_email = $_REQUEST['user_email'];
$user_password = $_REQUEST['user_password'];
$sql = "INSERT INTO user (user_name, user_ph_num, user_email, user_password)
VALUES ('$user_name', '$user_ph_num', '$user_email','$user_password')";

if ($conn->query($sql) === TRUE) {
  header("location: index.html");} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  header("location: register.html");
}

$conn->close();
?>
