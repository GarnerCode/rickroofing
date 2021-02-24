<?php

if (isset($_POST['submit'])) {
    $name = $_POST['user-name'];
    $email = $_POST['user-email'];
    $phone = $_POST['user-phone'];
    $address = $_POST['user-address'];
    $floors = $_POST['floors'];
    $insurance = $_POST['insurance'];
    $claim = $_POST['claim'];
    $message = $_POST['message'];
    $subject = "Estimate Request from ".$name;

    $mailTo = "dev.tgarner@gmail.com";
    $headers = "From: ".$email;
    $txt  = "You have received an estimate request from ".$name.".\n
    Phone: ".$phone."\n
    Address: ".$address."\n
    Number of Floors: ".$floors."\n
    Insurance: ".$insurance."\n
    Claim: ".$claim."/n
    Message: ".$message;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: index.php?mailsend");
}

//Prevent injection attacks

function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

?>