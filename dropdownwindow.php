<?php
function getSelectItems() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
    
    
    $output = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        return "Error 1";
        //die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT ser_name FROM services";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $output .= '<option value="' . $i . '">' . $row["ser_name"] . '</option>';
            $i++;
        }
    } else {
        return "Error 2";
    }
    $conn->close();
    return $output;
}