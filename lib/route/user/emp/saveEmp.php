<?php
include_once("../../../functions/userFunction.php");


if(isset($_POST['userName'])){
    // addEmp.php එකෙන් එන දත්ත මෙතනින් ගන්නවා
    $res = empRegistration($_POST['userName'], $_POST['userEmail'], $_POST['userNic'], $_POST['userPhone'], $_POST['userDob']);
    echo $res;
}

?>

