<?php
include_once("../../../functions/userFunction.php");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $result = deleteUser($id);
    echo $result;
}
?>