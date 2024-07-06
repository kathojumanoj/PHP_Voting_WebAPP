<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <style>
                body {
                  font-family: Arial, sans-serif;
                  background-color: #f0f0f0;
                  text-align: center;
                  margin: 0;
                  padding: 0;
              }
              
              h1 {
                  background-color: pink;
                  color: black;
                  padding: 10px;
                  margin: 0;
              }
              
              a {
                  text-decoration: none;
                  background-color: green;
                  color: white;
                  padding: 10px;
                  border-radius: 5px;
                  margin: 20px;
                  font-weight: bold;
                  display: inline-block;
              }
              
              a:hover {
                  background-color: #0056b3;
              }
              
              table {
                  border-collapse: collapse;
                  width: 80%;
                  margin: 20px auto;
                  background-color: white;
                  border: 1px solid #ddd;
                  border-radius: 5px;
                  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              }
              
              th, td {
                  text-align: center;
                  border: 1px solid #ddd;
                  padding: 10px;
              }
              
              thead {
                  background-color: #007BFF;
                  color: white;
                  font-weight: bold;
              }
              
              tbody tr:nth-child(odd) {
                  background-color: #f2f2f2;
              }
             
                </style>
</head>

<body>
<?php 
    if (isset($_SESSION["admin"])) {
        $conn=mysqli_connect("localhost","root","","manoj");
    $sql = "SELECT count(*) as 'out' FROM voters WHERE status LIKE 'No'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $countPen=$row["out"];
    $sql = "SELECT count(*) as 'votcou' FROM voters WHERE status LIKE 'yes'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $votcou=$row["votcou"];
?>
    <h1> Page : Admin</h1>
    <a href="./user-list.php">Voters ( <?=$votcou?> )</a>
    <a href="./voterPending.php">Pending Voters ( <?=$countPen?> )</a>
    <a href="./add_election.php">Add election </a>
    <a href="./result_parties.php">Results</a>
    <a href="./logout.php">Logout</a>
    

           <?php



        }


else{
    header("location:index.html");
}?>


                
</body>
</html>