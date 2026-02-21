<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <!-- Link Boostrap -->
    <link rel="stylesheet" href="CSS\bootstrap\css\bootstrap.min.css">
</head>

<body style="background-image: url('IMAGES/download.jpg'); background-size: cover; background-position: center; width:1440px; height: 720px;>





    <div class="container" style="margin-top: 40px; ">
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
                                <input type="text" name="username" id="username" id="userNAME" class="form-control">
                            </div>
                            <div class="form-group mt-3" style="color: white;">
                                <label for="password">Enter Your Password</label>
                                <input type="password" name="password" id="password" id="passWORD" class="form-control">
                            </div>
                            <div class="form-group mt-3" style="color: white;">
                                <input type="submit" value="Login" class="btn btn-primary">
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
                        <form action="" method="post">
                            <div class="form-group mt-3" style="color: white;">
                                <label for="username">Enter Your Name</label>
                                <input type="text" name="username" id="username" id="userNAME" class="form-control">
                            </div>
                            <div class="form-group-3" style="color: white;">
                                <label for="email">Enter Your Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group mt-3" style="color: white;">
                                <label for="password">Enter Your Password</label>
                                <input type="password" name="password" id="password" class="form-control">
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




</body>

</html>