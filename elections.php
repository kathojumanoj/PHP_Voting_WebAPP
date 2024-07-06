<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
/* padding: 20px; */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;

        }

        td form {
            margin: 0;
            text-align: center;

        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
<table>
    <tr>
        <th>
            Elections list
</th>
    </tr>

<?php
    // include('admin_main.php');
    session_start();
    include('nav.php');

    $conn=mysqli_connect("localhost","root","","manoj");
    if(!$conn)
    {
        echo "Not Connected";
    }
    else{
        // echo "connected <br>";
        $sql="select distinct election_name from elections";   
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            ?>
            <tr>
            <!-- <td><h1><?=$row["election_name"]?> </h1></td> -->
            <td><form action="elecions_view.php" method="post">
                <input type="submit" name="sub" value="<?=$row["election_name"]?>">
            </form></td>
        </tr>
       
    
            <?php



        }
         

    }
?>
