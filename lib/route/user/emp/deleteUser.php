<?php
include_once("../../functions/userFunction.php");

// DELETE USER
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // call delete function (you must create this)
    $result = deleteUser($id);

    
    echo $result;
    exit();
}

// REGISTER
if (isset($_POST['btnSave'])) {
    $userName  = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userpass  = $_POST['userpass'];
    $userPhone = $_POST['userPhone'];
    $userNic   = $_POST['userNic'];

    $result = userRegistration($userName,$userEmail,$userpass,$userPhone,$userNic);
    echo $result;
    exit();
}

// LOGIN
if (isset($_POST['btnlogin'])) {
    $userName = $_POST['userName'];
    $userpass = $_POST['userpass'];

    $result = Authentication($userName, $userpass);
    echo $result;
    exit();
}

echo "Invalid Access!";
