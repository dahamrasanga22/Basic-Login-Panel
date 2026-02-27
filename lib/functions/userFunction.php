<?php

//include db conection file
include_once("db_conn.php");

//create user registration function
function userRegistration($userName, $userEmail, $userpass, $userPhone, $userNic)
{
    //create db connection
    $db_conn = connection();
    //create sql query
    $insertSql = "INSERT INTO user_tbl (userName, userEmail, userPhone, userNic, userStatus) 
     VALUES ('$userName', '$userEmail', '$userpass', '$userPhone', '$userNic',1);";

    $sqlResult = mysqli_query($db_conn, $insertSql);


    //check db connection error
    if (mysqli_connect_errno($sqlResult)) {
        echo (mysqli_connect_error($sqlResult));
    }


    //if reg result  succes we can feed data into  login table also
    if ($sqlResult > 0) {
        //use md5 method to our password
        $newPassword = md5($userpass);

        $insertLogin = "INSERT INTO login_tbl (login_email,	login_pwd,	login_role,	login_status)	
        VALUES ('$userEmail', '$newPassword', 'user', 1);"; //DEFALTLY USER ROLE IS USER


        $loginResult = mysqli_query($db_conn, $insertLogin);

        //CHECK DB CONECTION ERROR
        if (mysqli_connect_errno($loginResult)) {
            echo (mysqli_connect_error($loginResult));
        }
        return ("Your Registration Success!!!");
    } else {
        return ('Please Try Again!!!');
    }
}

//login function
function Authentication($userName, $useroass)
{
    //create db connection
    $db_conn = connection();
    $sqlFetchUser = "SELECT * FROM login_tbl WHERE login_email='$userName';";
    $sqlResult = mysqli_query($db_conn, $sqlFetchUser);

    //CHECK DB CONECTION ERROR
    if (mysqli_connect_errno($sqlResult)) {
        echo (mysqli_connect_error($sqlResult));
    }


    //convert user psw into a hash value
    $newPassword = md5($useroass);

    //check the number of raws
    $norow = mysqli_num_rows($sqlResult);

    //validating the number of records > 0 or not
    if($norow > 0 ){
        //fetch the user records
        $rec = mysqli_fetch_assoc($sqlResult);

        //validate psw
        if($rec['login_psd'] = $newPassword){
            //validate user login status
            if($rec['login status']==1){
                if($rec['login_role']=="admin"){
                    //redirect this user into the admin dashboard
                    header('location:lib\views\dashboards\admin.php');
                }else{
                    //redirect this user into the admin dashboard
                    header('location:lib\views\dashboards\admin.php');

                }
            }else{
                return("your acc has beed deactivated");
            }

        }else{
            return("your pssword is not correct");
        }
    }else{
        return("no records are found!");
    }
    


}
?>