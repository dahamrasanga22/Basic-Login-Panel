<?php
include_once("../../../functions/userFunction.php");

if(isset($_POST['userName'])){
    $name  = $_POST['userName'];
    $email = $_POST['userEmail'];
    $nic   = $_POST['userNic'];
    $phone = $_POST['userPhone'];
    
    $dob   = isset($_POST['userDob']) ? $_POST['userDob'] : ""; 
    $res = empRegistration($name, $email, $nic, $phone, $dob);
    
    if($res == 1){
        echo "Add Emp Success"; 
    } else {
        echo "Add Emp Failed";
    }
}




?>