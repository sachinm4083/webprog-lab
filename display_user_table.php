<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,th{
            padding:2px;
            border:2px solid;
        }
    </style>
</head>
<body>

    <h1>User Tables</h1>

    <table>
        <tr>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>EMAIL</th>
        </tr>
        
        <?php
            include './modules/connect_db.php';

            $sql = "SELECT * from user"; 
            $result = $conn->query($sql);
            if (mysqli_num_rows($result) > 0) {
                while($user_row = $result->fetch_assoc()) {
                    echo "<tr>
                        <th>".$user_row["fname"]."</th>
                        <th>".$user_row["lname"]."</th>
                        <th>".$user_row["email"]."</th>
                    </tr>";
                }    
            }
            else{
                echo 'No Data';
            }
            $conn->close();
        ?>
    </table>    
</body>
</html>

