<?php
include "database/dbinsert.php";
$email = $User_Name =  $User_Password = "";
$emailEr = $User_NameEr = $User_PasswordEr = '';
$valid = false;
$successMesg = $errorMesg = "";







    if($_SERVER["REQUEST_METHOD"]=="POST"){

 
        
    if (empty($_POST["email"])) {

        $emailEr = "Email is required";
        $valid = true;
    }



    if (empty($_POST["username"])) {
        $User_NameEr = "User Name is required";
        $valid = true;
    }

    if (empty($_POST["password"])) {
        $User_PasswordEr = "Password is required";
        $valid = true;
    }

    if (!$valid) {
        $username = input($_POST["username"]);
        $password  = input($_POST["password"]);
        $email = input($_POST["email"]);
    
        
       $result = register($email, $username, $password);
      
    }
}


function input($v)
{
    $v = htmlspecialchars($v);
    $v = trim($v);
    $v = stripslashes($v);
    return $v;
}


?>