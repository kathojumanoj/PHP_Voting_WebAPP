<style>
     input[type=submit]{
                background-color:royalblue;
                padding:50px;
                font-size:30px;
                border-radius:20px;
                cursor: pointer;
              }
            #del{
                background-color:yellow;

                padding:10px;
                font-size:20px;

            }
            input[type=submit]:hover{
                background-color:pink;
            }
            #del:hover{
                background-color:orange;

            }
</style>
<table>
<?php 
    include('admin_main.php');
    ?>

<?php
    $conn=mysqli_connect("localhost","root","","manoj");
    if(!$conn)
    {
        echo "Not Connected";
    }
    else{
        // echo "connected <br>";
        // session_start();
        $que='SELECT count(*) FROM voters';
        $out=mysqli_query($conn,$que);
        if($countVoters=mysqli_fetch_assoc($out))
        {
            $ans=$countVoters["count(*)"];
            ?>
            <h1>Total Voters : <?=$ans?></h1>
            <tr>
                <th>ALL ELECTIONS LIST </th>
                <th>Delete </th>
        </tr>
            <?php

        }
        $sql="select distinct election_name from elections";   
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            ?>
            <tr>
            <!-- <td><h1><?=$row["election_name"]?> </h1></td> -->
            <td><form action="results.php" method="post">
                <input type="submit" name="sub" value="<?=$row["election_name"]?>">
            </form></td>
            <td><form action="results.php" method="post">
                <input type=hidden type="text" name="ele" value="<?=$row["election_name"]?>">
            <input id='del'type="submit" name="del" value="Delete">
            </form></td>
       
    
            <?php



        }
         

    }
?>
