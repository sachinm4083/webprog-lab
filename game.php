<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    demo game
    <div>
        <textarea id="comment_box" ></textarea><br>
        <input id="email"><br>
        
        <button onclick="post_comment()" >post comment</button>
    </div>
    <div id="comments">
        <?php
            include './modules/connect_db.php';
            $url=' ';
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                $url = "https://";   
            else  
                $url = "http://";   
            $url.= $_SERVER['HTTP_HOST'];   
            $url.= $_SERVER['REQUEST_URI'];  
            $url_components = parse_url($url); 
  
            parse_str($url_components['query'], $params); 
            $game=$params['game_name'];

            $sql_query2 = "SELECT * from comment where game='".$game."'";
            $result = $conn->query($sql_query2);
            if (mysqli_num_rows($result) > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div> <h4>" . $row["comment"]. " </h4> <p>" . $row["email"]. "</p><div>";
                }
            }
        ?>
    </div>

    <script>
        const ext = (s)=> {
            return document.getElementById(s).value.toString();
        }   
        const get_params = (url) => {
            var params = {};
            var parser = document.createElement('a');
            parser.href = url;
            var query = parser.search.substring(1);
            var vars = query.split('&');
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split('=');
                params[pair[0]] = decodeURIComponent(pair[1]);
            }
            return params;
        } 

        const game = get_params(window.location.href)['game_name']; 

        const post_comment = (e)=>{
            const comment_text = ext("comment_box");
            const comment_mail = ext("email");
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById('comments').innerHTML+=`<div> <h4>${this.responseText}</h4> <p>${comment_mail}</p><div>`;
                }
            };
            xmlhttp.open("GET", "./modules/add_comment.php?comment=" + comment_text+"&email="+comment_mail+"&game="+game, true);
            xmlhttp.send();
        }
    </script>
</body>
</html>