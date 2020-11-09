<?php
    include './modules/connect_db.php';

    $xml = new SimpleXMLElement('<xml/>');


    $sql = "SELECT * from user"; 
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while($user_row = $result->fetch_assoc()) {
            $user_xml = $xml->addChild('user');
            $user_xml->addChild('fname', $user_row["fname"]);
            $user_xml->addChild('lname', $user_row["lname"]);
            $user_xml->addChild('email', $user_row["email"]);
        }    
    }
    else{
        echo 'No Data';
    }
    
    $conn->close();

    Header('Content-type: text/xml');
    print($xml->asXML());
    
?>