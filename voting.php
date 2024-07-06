<?php
    // session_start();
    $conn=mysqli_connect("localhost","root","","manoj");
    if(!$conn)
    {
        echo "Not Connected";
    }
    else{
        echo "connected <br>";
        session_start();
        if(isset($_POST['sub']))
        {
            $party=$_POST["party"];
            $elename= $_SESSION["elename"];
            $ano=$_SESSION["ano"];
            
            $sql= "select * from votedPersons where election_name like '$elename' and ano like '$ano'";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0)
            {
                // echo "Sorry Already Voted ";
                $_SESSION["vote_fed"]="Sorry Already Voted";
                header("location:elecions_view.php");
            }
            else{
                $sql="insert into votedPersons values('$elename','$ano')";
                $res=mysqli_query($conn,$sql);
                if($res)
                {
                    echo "Voted";
                    $sql="update elections set count=count+1 where election_name like '$elename' and party_name like '$party'";
                    $res=mysqli_query($conn,$sql);
                    if($res)
                    {
                        // echo "<h1>voted Successfully</h1>";
                        $_SESSION["vote_fed"]="Voted Successfully";
                        header("location:elecions_view.php");
                    }
                    else{
                        echo "Not voted & not updated";
                    }
                }
                else{
                    echo "Not Voted ";
                }

            }
            echo $party."<br>";
            
        }
    }
?>
<a href="./elections.php">Elections</a>