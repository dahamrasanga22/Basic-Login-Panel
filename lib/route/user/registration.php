<?php


include_once('../../functions/userFunction.php');

$result = userRegistration ($_POST['userName'], $_POST['userEmail'], 
$_POST['userpass'], $_POST['userPhone'], $_POST['userNic']);

echo ($result);




?>