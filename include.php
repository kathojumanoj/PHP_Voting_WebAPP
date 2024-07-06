<?php 
    $conn=mysqli_connect("localhost","root","","manoj");

     $que='SELECT count(*) FROM voters';
     $out=mysqli_query($conn,$que);
     if($countVoters=mysqli_fetch_assoc($out))
     {
         $ans=$countVoters["count(*)"];
     }
    ?>
    <h1>Total Voters : <?=$ans?></h1>
            <tr>
                <th>ALL ELECTIONS LIST </th>

        </tr>
<?php
        $sql="select distinct election_name from elections";   
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
?>
        

            <h2><?=$row["election_name"]?></h2>
    
            <?php
        }
    ?>
       