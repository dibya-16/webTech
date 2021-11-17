<?php

require "dbconnect.php";



   function add($fname, $Lname, $gender, $dob, $religion, $paddress, $paraddress, $phone, $email, $username, $password){
       $conn =connect();
    $sql = $conn->prepare('INSERT INTO user (fname,Lname,gender,dob,religion,paddress,paraddress,phone,email,username,password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $sql->bind_param('sssssssssss',$fname, $Lname, $gender, $dob, $religion, $paddress, $paraddress, $phone, $email, $username, $password);
   
   $sql->execute();
   $sql->close();
    $conn->close();
  
}

?>