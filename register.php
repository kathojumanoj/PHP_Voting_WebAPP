
<?php
    $conn=mysqli_connect("localhost","root","","manoj");
    if(!$conn)
    {
        echo "Not Connected";
    }
    else{
        echo "connected <br>";
        if(isset($_POST['sub']))
        {
            $name=$_POST["name"];
            $dateOfBirth=$_POST["dateOfBirth"];
            $aadhar=$_POST["aadhar"];
            $address=$_POST["address"];
            $email=$_POST["email"];
            $phoneNumber=$_POST["phoneNumber"];
            $district=$_POST["district"];
            $constituency=$_POST["constituency"];
            $gender=$_POST["gender"];
            $status=$_POST["status"];
            $password=$_POST["password"];
            $pin=$_POST["pin"];
            $pic=$_FILES["photo"]["name"];
            $imageData = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
            $sql="insert into voters values('$name','$dateOfBirth','$aadhar','$address','$email','$phoneNumber','$district','$constituency','$gender','$status','$password','$imageData','$pin')";
            if(mysqli_query($conn,$sql)==TRUE)
            {
                $_SESSION['regfed']="Successfully Registerd, Wait For Conformation Mail to Login";
                // echo "<h1> Successfully Registerd, Wait For Conformation Mail to Login </h1>";
                header('location:index.php');
            }
        //    echo $name;
            // header('location:main.php');
        }
    }
            
?>
