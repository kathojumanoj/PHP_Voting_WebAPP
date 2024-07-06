<?php
    $conn=mysqli_connect("localhost","root","","manoj");
    session_start();
    if(!$conn)
    {
        echo "Not Connected";
    }
    else{
        echo "connected <br>";
        if(isset($_POST['sub']))
        {
          
            $aadhar=$_POST["ano"];
            $password=$_POST["pass"];
            $sta='yes';
            $sql="select * from voters where aadhar_number like '$aadhar' and password like '$password' and status like '$sta'";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0)
            {
                $row=mysqli_fetch_assoc($res);
                $_SESSION["name"]=$row["name"];
                echo $_SESSION["name"];
                $_SESSION["ano"]=$aadhar;
                echo $_SESSION["ano"];
                header('location:main.php');
                // echo "Successfully Logged in ";
            }
            else{
                header('location:main.php');  
            }

        }
    }
?>