<?php
    include './connect_db.php';

    $username = $_POST['username'];
    $password = $_POST['pass'];

        $sql = "SELECT * from user where email='".$username."' and password='".$password."'"; 
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $user_row = mysqli_fetch_assoc($result);
            echo "Username : " . $user_row["email"];    
        } 
        else {
            echo 'Invalid credentials.'; 
        }        
        
    
    $conn->close();
?>
