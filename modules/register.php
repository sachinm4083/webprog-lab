<?php
   include 'connect_db.php';
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $password = $_POST['pass'];
    
    
        $sql = "INSERT INTO user VALUES ('".$fname."', '".$lname."', '".$email."','".$password."')"; 
        if ($conn->query($sql) === TRUE) {
            header('location: ../login.html');
        } 
        else {
            echo "Error : ". $conn->error;
        }
    
    $conn->close();

?>