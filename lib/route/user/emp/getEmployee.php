<?php
include_once("../../../functions/userFunction.php");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $db_conn = connection();
    $sql = "SELECT * FROM emp_tbl WHERE emp_id = '$id'";
    $result = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
