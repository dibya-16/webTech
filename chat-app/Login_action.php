<?php
session_start();
 include "database/dbread.php";
$username = $password = "";
$Form_name = "";
$From_pass ="";
$flag =false;
$User_passwordEr = "";
$User_NameEr ="";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
if (empty($_POST["username"])) {
    $User_NameEr = "UserName is required";
    $flag = true;
}

if (empty($_POST["password"])) {
    $User_passwordEr = "password is required";
    $flag = true;
}


if(!$flag){
    $username =  input($_POST["username"]);
    $password = input($_POST["password"]);
  
   
      $result =login($username,$password);
      if($result){
        $_SESSION["username"]=$username;
      header("Location:Home.php");
   
      }
    
    else
    {
    echo "<br>";
    echo "Invalid Password ";}
    
   
   
   

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
