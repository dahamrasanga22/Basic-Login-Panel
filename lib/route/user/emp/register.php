<?php

//include function file
include_once("../../functions/userFunction.php");


//check form submit
if(isset($_POST['btnSave'])){
    $userName  = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userpass  = $_POST['userpass'];
    $userPhone = $_POST['userPhone'];
    $userNic   = $_POST['userNic'];


    //call registration function
    $result = userRegistration($userName,$userEmail,$userpass,$userPhone,$userNic);

    echo $result;

}
else{
    echo "Invalid Access!";
}

?>