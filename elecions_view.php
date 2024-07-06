<style>
input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left:45%;
            margin-top:30px;
        }
    </style>
<table>
<?php

session_start();
$cou=0;
    include('nav.php');

    $conn=mysqli_connect("localhost","root","","manoj");
    if(!$conn)
    {
        echo "Not Connected";
    }
    else{
        // echo "connected <br>";
        // session_start();
        if(isset($_POST['sub']))
        {
            $elename=$_POST['sub'];
            // echo $elename;
            $_SESSION["elename"]=$elename;
            $sql="select *  from elections where election_name like '$elename'";   
            $res=mysqli_query($conn,$sql);
            $cou=mysqli_num_rows($res);
            
            ?>
            <h1 align="center" style="margin-top:20px;"> Election Name : <?=$elename?></h1>
            <form action="voting.php" method="post">

            <table>
                <tr>
                    <th>Party</th>
                    <th>Symbol</th>
                    <th>Vote</th>

                </tr>
                <?php
            while($row=mysqli_fetch_assoc($res))
            {
                ?>
                 <tr>
                     <td><h4><?=$row["party_name"]?> </h4></td>
                     <td><img src="data:image/jpeg;base64,<?= base64_encode($row["symbol"]) ?>" alt='photo' width="100px"> </td>
                     <td><input type="radio" name="party" value="<?=$row["party_name"]?>" required>
                     <?php

}

}
}
if($cou)
{?>

</table>
<h1><input  type="submit" value="Vote Now" name="sub"></h1>
</form>
<?php
}?>

<?php
    if(isset($_SESSION["vote_fed"]))
    {
        echo "<h2>".$_SESSION["vote_fed"]." </h2>";
        unset($_SESSION["vote_fed"]);
    }
?>
