<?php
include_once("../../../functions/userFunction.php");
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];

    $db_conn = connection();
    $sql = "UPDATE emp_tbl SET emp_name='$name', emp_email='$email', emp_nic='$nic', emp_tel='$phone' WHERE emp_id='$id'";
    
    if(mysqli_query($db_conn, $sql)){
        echo "Successfully Updated!";
    } else {
        echo "Update Failed!";
    }
}
?>