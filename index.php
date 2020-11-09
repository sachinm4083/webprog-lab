<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href=".\css\gameshub.css" />
    <title>GamesHub- The pit-stop for Gamers</title>
</head>
<body>
	<div class="top-navigation">
		<a class="active" href=".\"><b>GamesHub</b></a>
		<a href=".\store.html">Store</a>
		<a href=".\login.html">Login/SignUp</a>
	</div>
		<div id="welcome">
			<h1>Welcome</h1>
		</div>
		<div id="logo">
			<img 
			src=".\images\gameshub-games.svg"
			alt="gameshum"
			class="left"
			height="20%"
			width="20%"
			/>
			<p><b>The pit-stop for Gamers</b></p>
		</div>
	</div>

	<div id="featured"><b>Featured Deals</b></div>
	

	
	<div class="gallery">
		<?php
            include './modules/connect_db.php';

            $sql = "SELECT * from game"; 
            $result = $conn->query($sql);
            if (mysqli_num_rows($result) > 0) {
                while($game_row = $result->fetch_assoc()) {
					echo "<a href='game.php?game_name=".$game_row['name']."'>
							<img src='".$game_row['img_src']."' alt='balaji' width='200px' height='200px'>
							<p>".$game_row['description']."</p>
							<p>".$game_row['specifications']."</p>
						</a>";
                }    
            }
            else{
                echo 'No Data';
            }
            $conn->close();
        ?>
    </div>

    <footer class="footer">
    	<div class="foot-bar">
		<a class="active" href="C:\xampp\htdocs\gameshub\contact.html"><b>Contact Us</b></a>
		<a href="C:\xampp\htdocs\gameshub\report.html"><b>Report Issues</b></a>
		<a href="C:\xampp\htdocs\gameshub\partnership.html"><b>Looking for Partnership</b></a>
		<a>A project by siddhart, Shreyansh & Sachin</a>
	</div>
    </footer>
</body>
</html>