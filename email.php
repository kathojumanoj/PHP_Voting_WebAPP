<?php
$subject="PHP Voting";
$message="Welcome to Digital voting system";
$headers="From: voidmainlbrce@gmail.com";
$to='voidmainlbrce@gmail.com';
if (mail($to, $subject, $message, $headers)) {
    echo "Confirmation email sent successfully. Please check your email inbox.";
} else {
    echo "Failed to send confirmation email. Please try again later.";
}
?>
