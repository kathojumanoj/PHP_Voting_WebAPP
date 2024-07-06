<table>
<?php
    include('admin_main.php');
    $dd=1;
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
        }

        if(isset($_POST['sub']))
        {
            $elename=$_POST['sub'];
            // echo $elename;
            $sql="select *  from elections where election_name like '$elename'";   
            $res=mysqli_query($conn,$sql);
?>
            <h1> Election Name :<?=$elename?></h1>
            <h2> Total Voters :<?=$ans?></h2>
            <table>
                <tr>
                    <th>Party</th>
                    <th>count</th>
                </tr>
<?php
            while($row=mysqli_fetch_assoc($res))
            {
?>
                 <tr>
            <td><h4><?=$row["party_name"]?> </h4></td>
            <td><h4><?=$row["count"]?> </h4></td>
    
<?php

            }
        }
        if(isset($_POST['del']))
        {
            $dd=0;
            $elename=$_POST['ele'];
            echo $elename;
            $sql="delete from elections where election_name like '$elename'";   
            $que="delete from votedPersons where election_name like '$elename'";   
            $res=mysqli_query($conn,$sql);
            $out=mysqli_query($conn,$que);
            if($res)
            {
                $dd=0;
                echo "deleted election ok!";
            }
            else{
                echo "Not";
            }
            
        }
        if(isset($_POST['del-user']))
        {
            $ano=$_POST['user'];
            echo $ano;
            $sql="delete from voters where  aadhar_number like '$ano'";   
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                echo "deleted user ok!";
                header("location:user-list.php");
                $dd=0;
            }
            else{
                echo "Not";
            }
            
        }
        if(isset($_POST['accept']))
        {
            $ano=$_POST['user'];
            echo $ano;
            $stat='yes';
            $sql="update voters set status='$stat' where aadhar_number like '$ano'";   
            $res=mysqli_query($conn,$sql);
            $que="select email from voters where aadhar_number like '$ano'";
            $out=mysqli_query($conn,$que);
            $row=mysqli_fetch_assoc($out);
            $subject="Digital Voting System Account ";
            $message="
            <html>
            <body>

            <p> Welcome to Digital voting system you account is accepted .</p> 
            <h1>click this link : </h1>
            <a href='localhost/Voting_PHP/login.html'>Click Here</a>
            </body>
            </html>
            ";
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: Voting System Alert' . "\r\n";
            $to=$row["email"];
            if (mail($to, $subject, $message, $headers) && $res) {
                echo "Confirmation email sent successfully. Please check your email inbox.";
                header("location:user-list.php");
                
            } else {
                echo "Failed to send confirmation email. Please try again later.";
            }
            
        }
        if(isset($_POST['reject']))
        {
            $ano=$_POST['user'];
            echo $ano;
            // $stat='yes';
            // $sql="update voters set status='$stat' where aadhar_number like '$ano'";   
            // $res=mysqli_query($conn,$sql);
            $que="select email from voters where aadhar_number like '$ano'";
            $out=mysqli_query($conn,$que);
            $row=mysqli_fetch_assoc($out);
            $subject="Digital Voting System Account ";
            $message="
            <html>
            <body>

            <p> Welcome to Digital voting system you account is Rejected... Due to invalid Details</p> 
            </body>
            </html>
            ";
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: Voting System Alert' . "\r\n";
            $to=$row["email"];
            if (mail($to, $subject, $message, $headers) && $res) {
                echo "Confirmation email sent successfully. Please check your email inbox.";
                header("location:user-list.php");
                
            } else {
                echo "Failed to send confirmation email. Please try again later.";
            }
            
        }
         
    }
    
?>
</table>
<?php
    $party_name='NONE';
    if($dd)
    {
        // $sql = "SELECT party_name ,count FROM elections WHERE election_name LIKE '$elename' ORDER BY count DESC LIMIT 1";
        $que="select * from elections where election_name like '$elename' and  count=(select max(count) from elections where election_name like '$elename');";
        $res=mysqli_query($conn,$que);
    if(mysqli_num_rows($res)==1)
    {
        $row=mysqli_fetch_assoc($res);
        $party_name=$row["party_name"];
        $count=$row["count"];
    }
    else{
        $party_name='NONE';

    }
   
    

}

?>
<h1>Majority Party : <?=$party_name?> </h1>