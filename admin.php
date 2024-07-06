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
            // $sql="select * from voters where aadhar_number like '$aadhar' and password like '$password'";
            // $res=mysqli_query($conn,$sql);
            if($aadhar=='admin' && $password=='2566')
            {
                // $row=mysqli_fetch_assoc($res);
                $_SESSION["admin"]='admin';
                echo $_SESSION["name"];
                // $_SESSION["ano"]=$aadhar;
                // echo $_SESSION["ano"];
                header('location:admin_main.php');
                // echo "Successfully Logged in ";
            }
            else{
                header('location:main.php');
                
            }

        }
    }
?>