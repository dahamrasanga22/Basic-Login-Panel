<?php

include_once("../../functions/userFunction.php");
$result = empRegistration($_POST['empName']),$_POST['empNic'],$_POST['empTel'],$_POST['empDob']);
echo($result);

?>