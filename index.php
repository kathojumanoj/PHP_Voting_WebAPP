<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reg&Log</title>
    <style>
    body {
    background-image: url('https://www.idea.int/sites/default/files/news/2020-6-4-transforming-political-parties-in-the-middle-idea.png');
    background-size: cover;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

nav {
    background-color: aqua;
    font-size: larger;
    text-align: center;
    padding: 15px;
}

a {
    text-decoration: none;
    border: 2px solid black;
    border-radius: 13px;
    margin: 20px;
    padding: 10px 20px;
    background-color: rgb(255, 149, 149);
    color: black;
    font-weight: bold;
    font-size: 18px;
    transition: background-color 0.3s;
}

a:hover {
    background-color: rgb(126, 240, 3);
}

div{
    text-align: center;
    margin-top: 50px;
}

    </style>
</head>
<body>
<?php
            // if(isset($_SESSION['regfed']))
            // {
                //     echo "<h2>".$_SESSION['regfed']."</h2>";
                //     unset($_SESSION['regfed']);
                // }
                echo "<h2 align='center'> Your Registered Successfully wait for Admin Conformation Mail :) ";
        ?>
    <h2 align="center" style="color:rgb(45, 252, 255)">Digital Voting System...</h2 >
        <div>
        <a href="./login.html">Login to Vote</a>
        <a href="./register.html">Register to Vote</a>
        
        <a href="./adminLogin.html">Admin</a>
    </div>
    
</body>
</html>