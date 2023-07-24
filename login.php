<?php

//$sql ='SELECT * FROM user';$result = mysqli_query($conn,$sql);$user = mysqli_fetch_all($result,   MYSQLI_ASSOC);print_r($user);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
    $stmt= $conn->prepare("select * from user where user_name =?");
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $stmt_result =$stmt->get_result();
    if($stmt_result->num_rows >0){
        $data =$stmt_result->fetch_assoc();
        if($data['user_password']=== $user_password){
header("location: homepage.html");  
      }

    }else {  
      header("location: index.html"); 
      echo'wrong';

}
}


?>
 