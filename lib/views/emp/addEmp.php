<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Emp Details</title>
    <link rel="stylesheet" href="../../../css/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h3>Add Emp Details</h3>
            </div>
            <div class="card-body">


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8"></div>
                        <div class="col-md-2"></div>
                    </div>
                </div>


                <form id="empRegistrationForm">
                    <div class="form-group">
                        <input type="text" name="empName" id="userName" class="form-control" placeholder="Enter EMP Name...">
                    </div>
                    <div class="form-group mt-2">
                        <input type="email" name="empEmail" id="userEmail" class="form-control" placeholder="Enter EMP Email...">
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" name="empNic" id="userNic" class="form-control" placeholder="Enter EMP NIC...">
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" name="empTel" id="userPhone" class="form-control" placeholder="Enter EMP Tel...">
                    </div>
                    <div class="form-group mt-2">
                        <input type="date" name="empDob" id="userDob" class="form-control" placeholder="elete ">
                    </div>
                    <div class="form-group mt-2">
                        <input type="button" id="btnSave" class="btn btn-success" value="Submit">
                        <input type="reset" value="Clear" class="btn btn-danger">
                    </div>
                </form>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

</body>

</html>



<!-- script -->
<script src="../../../css/bootstrap/js/bootstrap.js"></script>

<script>
    $(document).ready(function() {
        $('#btnSave').click(function(e) {
            e.preventDefault();

            var name = $('#userName').val();
            var email = $('#userEmail').val();
            var nic = $('#userNic').val();
            var phone = $('#userPhone').val();
            var dob = $('#userDob').val();
            var pass = $('#userpass').val();

            $.ajax({
                method: "POST",
                url: "../../route/user/emp/register.php",
                data: {
                    btnSave: 1,
                    userName: name,
                    userEmail: email,
                    userpass: pass,
                    userPhone: phone,
                    userNic: nic
                },
                success: function(response) {
                    console.log("Response:", response);
                    alert(response);
                    if (response.includes("Success")) {
                        $('#empRegistrationForm')[0].reset();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("AJAX failed: " + textStatus);
                }
            });
        });
    });
</script>