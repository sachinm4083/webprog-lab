<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    <% String user = request.getParameter("user"); %>
    <h1>
        <% out.println("Welcome " + user); %>
        <br>Find Game <a href='find_games.html'>here</a>
        <br>Add Games <a href='add_games.html'>here</a>
        <br>Create More Admins <a href='register.html'>here</a>
        <br><a href='./'>Logout</a>
    </h1>

</body>
</html>