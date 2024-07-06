<?php
    $conn=mysqli_connect("localhost","root","","manoj");
    session_start();
    if(!$conn)
    {
        echo "Not Connected";
    }
    else{
        // echo "connected <br>";
        if(isset($_POST['sub']))
        {
          
            $aadhar=$_POST["ano"];

            $pin=$_POST["pin"];
            $sql = "UPDATE voters SET `pin` = ? WHERE aadhar_number = ?";

            // Prepare the statement
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bind_param("ss", $pin, $aadhar);

            // Execute the statement
            $stmt->execute();

            // Check if any rows were affected
            if ($stmt->affected_rows > 0) {
                // echo "Pin updated successfully.";
                header('location:main.php');
            } else {
                echo "<h2>Not set pin or either may be same password</h2>";
            }
            // Close the statement
            $stmt->close();

        }
    }
?>