<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    <style>
        /* Apply basic table styles */
#user-list {
    width: 100%;
    border-collapse: collapse;
    margin: 20px;
}

#user-list th, #user-list td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

/* Style table header */
#user-list th {
    background-color: #f2f2f2;
    font-weight: bold;
}

/* Style links within the table */
#user-list a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
}

/* Style images (user photos) */
#user-list img {
    max-width: 100px;
}

/* Apply responsive design for smaller screens */
@media (max-width: 768px) {
    #user-list {
        font-size: 14px;
    }
}
body {
    color:black;
                  font-family: Arial, sans-serif;
                  background-color: #f0f0f0;
                  text-align: center;
                  margin: 0;
                  padding: 0;
              }
              
              h1 {
                  background-color: gold;
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
                    width: 70%;
                    margin: 10px auto;
                    background-color: white;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                th{
                }
                th, td {
                    text-align: center;
                  border: 1px solid #ddd;
                  padding: 2px;
              }
              
              thead {
                  /* background-color: #007BFF; */
                  background-color: #0056b3;
                  color: black;
                  font-weight: bold;
              }
              
              tbody tr:nth-child(odd) {
                  /* background-color: olive; */
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

    <a href="./voterPending.php">Pending Voters (<?=$countPen?>)</a>
    <a href="./add_election.php">Add election </a>
    <a href="./result_parties.php">Results</a>
    <a href="./logout.php">Logout</a>
    <h1>

<?php }
else
{
    header('location:index.html');
}?>

       
    <?php
    $conn=mysqli_connect("localhost","root","","manoj");
   
    $sql="select * from voters";
    $res=mysqli_query($conn,$sql);
    ?>
    <h1>User List</h1>
    <table id="user-list">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Aadhar</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>district</th>
                <th>constituency</th>
                <th>gender</th>
                <th>Vote Status</th>
                <th>Photo</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($res))
                   { ?> 
                <tr>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["date_of_birth"] ?></td>
                    <td><?= $row["aadhar_number"] ?></td>

                    <td><?= $row["address"] ?></td>

                    <td><?= $row["email"] ?></td>

                    <td><?= $row["phone_number"] ?></td>
                    <td><?= $row["district"] ?></td>
                    <td><?= $row["constituency"] ?></td>
                    <td><?= $row["gender"] ?></td>
                    <td><?= $row["status"] ?></td>

                    <td><img src="data:image/jpeg;base64,<?= base64_encode($row["photo_data"]) ?>" alt='photo'> </td>
                    


                    <td><form action="results.php" method="post">
                    <input type=hidden type="text" name="user" value="<?=$row["aadhar_number"]?>">
                    <input id='del'type="submit" name="del-user" value="Delete">
            </form></td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
