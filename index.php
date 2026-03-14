<?php
//include function page
include_once('lib\functions\userFunction.php');

if (isset($_POST['btnlogin'])) {
    //call function
    $result = Authentication($_POST['userName'], $_POST['userpass']);
    echo ($result);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>

    <!-- Link Boostrap -->
    <link rel="stylesheet" href="css\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="background-color: rgba(0,0,0,0.4);">
                    <div class="card-header" style="color: white;">
                        <h2>login Section</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mt-3" style="color: white;">
                                <label for="username">Enter Your Username</label>
                                <input type="text" name="userName" id="username" id="userNAME" class="form-control">
                            </div>
                            <div class="form-group mt-3" style="color: white;">
                                <label for="password">Enter Your Password</label>
                                <input type="password" name="userpass" id="password" class="form-control">
                            </div>

                            <div class="form-group mt-3" style="color: white;">
                                <input type="submit" value="Login" name="btnLogin" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>





            <div class="col-md-6">
                <div class="card" style="background-color: rgba(0,0,0,0.4);padding-bottom: 150x;">
                    <div class="card-header" style="color: white;">
                        <h2>Registration Section</h2>
                    </div>
                    <div class="card-body">
                        <form action="lib/route/user/registration.php" method="post">
                            <div class="form-group mt-3" style="color: white;">
                                <label for="userName">Enter Your Name</label>
                                <input type="text" name="userName" id="userName" class="form-control">
                            </div>
                            <div class="form-group-3" style="color: white;">
                                <label for="userEmail">Enter Your Email</label>
                                <input type="text" name="userEmail" id="userEmail" class="form-control">
                            </div>
                            <div class="form-group mt-3" style="color: white;">
                                <label for="password">Enter Your Password</label>
                                <input type="password" name="userpass" id="userpass" class="form-control">
                            </div>
                            <div class="form-group mt-3" style="color: white;">
                                <label for="phone">Enter Your Phone</label>
                                <input type="text" name="userPhone" id="userPhone" class="form-control">
                            </div>
                            <div class="form-group mt-3" style="color: white;">
                                <label for="nic">Enter Your NIC</label>
                                <input type="text" name="userNic" id="userNic" class="form-control">
                            </div>
                            <div class="form-group mt-3" style="color: white;">
                                <input type="submit" name="btnSave" value="Register" class="btn btn-success">
                                <input type="Reset" value="Clear" class="btn btn-secondary">
                                <input type="Forget" name="btnForget" value="Forget Password" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>

</html>