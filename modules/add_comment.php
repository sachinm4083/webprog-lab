<?php 
  include 'connect_db.php';
  $email = $_GET['email'];
  $comment = $_GET['comment'];
  $game = $_GET['game'];
   
   
       $sql = "INSERT INTO comment VALUES ('".$game."', '".$email."', '".$comment."')"; 
       if ($conn->query($sql) === TRUE) {
            $sql_query2 = "SELECT * from comment where game='" .$game."' and email='" .$email."' and comment='" .$comment."'";
            $result = $conn->query($sql_query2);
            if (mysqli_num_rows($result) > 0) {
                $single_row = mysqli_fetch_assoc($result);
                //echo $single_row['comment'];    
                echo "this line is picked up from the client side script";
            } 
        } 
       else {
           echo "Error : ". $conn->error;
       }
?>