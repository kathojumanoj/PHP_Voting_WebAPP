<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","manoj");
    if(!$conn)
    {
        echo "Not Connected";
    }
    else{
        echo "connected <br>";
        if(isset($_POST['sub']))
        {
            $elename=$_POST["ele_name"];
            $ind=1;
            $count=$_POST["count"];
            echo $elename."<br>";

            while($count>0)
            {
                $par_name=$_POST["party".$ind];
                $imageData = addslashes(file_get_contents($_FILES['photo_party'.$ind]['tmp_name']));
                $sql="insert into elections values('$elename','$par_name','0','$imageData')";
                echo $par_name."<br>";
                if(mysqli_query($conn,$sql)==TRUE)
                {
                    echo "INserted ";
                }
                else{
                    echo "Error";
                }
                // echo $dateOfBirth."<br>";
                // echo $aadhar."<br>";
                // echo $address."<br>";
                $ind+=1;
                $count-=1;
            }
            echo "election set successfully..";
            $_SESSION["ele_name"]=$elename." election set successfully";
            header("location:add_election.php");
        }
    }
?>
