<?php

//include db conection file
include_once("db_conn.php");

//create user registration function
function userRegistration($userName, $userEmail, $userpass, $userPhone, $userNic)
{
    //create db connection
    $db_conn = connection();
    //create sql query
    $insertSql = "INSERT INTO user_tbl (user_name, user_email, user_phone, user_nic, user_status)VALUES ('$userName', '$userEmail', '$userPhone', '$userNic', 1)";
    $sqlResult = mysqli_query($db_conn, $insertSql);

    //if reg result  succes we can feed data into  login table also
    if ($sqlResult) {
        //use md5 method to our password
        $newPassword = md5($userpass);
        $insertLogin = "INSERT INTO login_tbl (login_email, login_pwd, login_role, login_status)VALUES ('$userEmail','$newPassword','user',1)";
        mysqli_query($db_conn, $insertLogin);
        return "Your Registration Success!!!";
    } else {
        return "Please Try Again!!!";
    }
}



//login function
function Authentication($userName, $userpass)
{
    //create db connection
    $db_conn = connection();
    $sqlFetchUser = "SELECT * FROM login_tbl WHERE login_email='$userName';";
    $sqlResult = mysqli_query($db_conn, $sqlFetchUser);

    //convert user psw into a hash value
    $newPassword = md5($userpass);

    //check the number of raws
    $norow = mysqli_num_rows($sqlResult);

    //validating the number of records > 0 or not
    if ($norow > 0) {

        //fetch the user records
        $rec = mysqli_fetch_assoc($sqlResult);

        //validate psw
        if ($rec['login_pwd'] == $newPassword) {
            //validate user login status
            if ($rec['login_status'] == 1) {
                if ($rec['login_role'] == "admin") {
                    //redirect this user into the admin dashboard
                    header('location:lib\views\dashboards\admin.php');
                } else {
                    //redirect this user into the admin dashboard
                    header('location:lib\views\dashboards\admin.php');
                }
            } else {
                return ("Your acc has beed deactivated");
            }
        } else {
            return ("your pAssword is not correct");
        }
    } else {
        return ("No records are found!");
    }
}


function empRegistration($empName, $empEmail, $empNic, $empTel, $empDob)
{
    $db_conn = connection();
    $insert = "INSERT INTO emp_tbl(emp_name,emp_email,emp_nic,emp_tel,emp_dob) VALUES('$empName','$empEmail','$empNic','$empTel','$empDob');";
    $result = mysqli_query($db_conn, $insert);
    if ($result > 0) {
        return 1;
    } else {
        return 0;
    }
}



?>