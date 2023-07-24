<?php
session_start();
//$sql ='SELECT * FROM user';$result = mysqli_query($conn,$sql);$user = mysqli_fetch_all($result,   MYSQLI_ASSOC);print_r($user);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$user_email=$_POST['user_email'];
$_SESSION["user_email"] = "$user_email";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{

  
  $stmt= $conn->prepare("select * from user where user_email =?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $stmt_result =$stmt->get_result();
    if($stmt_result->num_rows >0){
        $data =$stmt_result->fetch_assoc();
        if($data['user_email']=== $user_email ){
                   header("location:  reset.html");  }

    }else {  
      header("location: forgot.html"); 


}
}


?>
 