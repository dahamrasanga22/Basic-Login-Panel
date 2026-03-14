<?php

function connection()
{
    $server = "localhost";  //server
    $user = "root";  //db user
    $password = ""; //psw
    $db_name = "ums";  //db name

    //create db conection
    $conn = mysqli_connect($server, $user, $password, $db_name);

    if (!$conn) {
        return ("Database Connection Failed");
    } else {
        return ($conn);
    }
}
?>