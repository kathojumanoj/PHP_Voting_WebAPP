<?php
session_start();
$name='';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

nav {
    background-color: #007BFF;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
}

nav a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 5px;
    margin: 0 10px;
    background-color: #0056b3;
    transition: background-color 0.3s;
}

nav a:hover {
    background-color: #004ca1;
}

.nav-right {
    text-align: right;
}

.container {
    background-color: #fff;
    margin: 20px;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
}

th {
    background-color: #007BFF;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

img {
    max-width: 150px;
    border-radius: 5px;
    margin-top: 10px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

h3 {
    font-weight: bold;
}

@media (max-width: 768px) {
    nav {
        flex-direction: column;
        align-items: flex-start;
    }

    nav a {
        display: block;
        margin: 5px 0;
    }

    .nav-right {
        text-align: left;
    }
}

    </style>
</head>
<body>
   
    
    <div>
    <?php 
    if (isset($_SESSION["name"])) {
        if(isset($_SESSION["pin_set"]))
        {
          $fed=$_SESSION["pin_set"];
        }
        $aadhar = $_SESSION["ano"];
        $name=$_SESSION["name"];
        $conn = mysqli_connect("localhost", "root", "", "manoj");
        $sql = "select * from voters where aadhar_number like '$aadhar'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
    ?>
     <nav><b><span style="font-size: larger;"> Digital Voting System </span></b>
    
    <a href="./elections.php">Elections</a>
    <a href="./aboutus.php">About us</a>
    <a href="./voterValid.html">Set Vote Pin</a>
    <a href="./logout.php">Logout</a>
    <span style="float: right; font-size: larger;">Hello , <?=$name ?></span>
  </nav>
            <img style="float: right; margin-top: 40px;" src="data:image/jpeg;base64,<?= base64_encode($row["photo_data"]) ?>" alt="<%= user.name %>" width="150px">
            <div style="overflow-x:auto; text-align: center;">
              <h2>Details</h2>
                <table style="text-align: center;  ">
                    <tr>
                        <th><h3>Name</h3></th>
                        <td><?= $row["name"] ?></td>
                    </tr>
              <tr>
                <th><h3>Aadhar</h3></th>
                <td><?= $row["aadhar_number"] ?></td>
              </tr>
              <tr>
                <th><h3>Email</h3></th>
                <td><?= $row["email"] ?></td>
              </tr>
              <tr>
                <th><h3>Dist</h3></th>
                <td><?= $row["district"] ?></td>
              </tr>
              
              <tr>
                <th><h3>DOB</h3></th>
                <td><?= $row["date_of_birth"] ?></td>
              </tr>
              <tr>
                <th><h3>Address</h3></th>
                <td><?= $row["address"] ?></td>
              </tr>
              <tr>
                <th><h3>PhoneNumber</h3></th>
                <td><?= $row["phone_number"] ?></td>
              </tr>
              <tr>
                <th><h3>Constituency</h3></th>
                <td><?= $row["constituency"] ?></td>
              </tr>
              <tr>
                <th><h3>Gender</h3></th>
                <td><?= $row["gender"] ?></td>
              </tr>
              <tr>
                <th><h3>Pin</h3></th>
                <td><?= $row["pin"] ?></td>
              </tr>
              <tr>
                <th><h3>Password</h3></th>
                <td><?= $row["password"] ?></td>
              </tr>
             
            </table>
          </div>
      <!-- <p>Your Email: <%= user.email %></p> -->
      <!-- Add other user details here -->
     
      <?php 
        }
    } else { $name='';
    ?>
        <br>
        <p>Invalid Login or check Conformation Mail . Please <a href="./login.html">login</a>.</p>
    <?php 
    }
    ?>
    </div>
</body>
</html>