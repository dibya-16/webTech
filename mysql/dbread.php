<?php

include "dbconnect.php";

function login($username, $password){
    $conn=connect();
    $sql =$conn->prepare("SELECT * FROM user WHERE username=? and password=?");
    $sql->bind_param("ss",$username, $password);
    $sql->execute();
    $result=$sql->get_result();
    return $result->num_rows === 1 ;
}

?>