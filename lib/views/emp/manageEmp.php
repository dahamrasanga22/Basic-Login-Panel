<?php
//include db conection file
include_once("../../functions/userFunction.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Emp Details</title>
    <link rel="stylesheet" href="../../../css/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="">

</head>

<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h3>Manage Emp Details</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-hover table-dark table-border">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>NIC</th>
                                        <th>Tel</th>
                                        <th>DOB</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $db_conn = connection();
                                    $query = "SELECT * FROM emp_tbl";
                                    $query_run = mysqli_query($db_conn, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['emp_id']; ?></td>
                                                <td><?php echo $row['emp_name']; ?></td>
                                                <td><?php echo $row['emp_email']; ?></td>
                                                <td><?php echo $row['emp_nic']; ?></td>
                                                <td><?php echo $row['emp_tel']; ?></td>
                                                <td><?php echo $row['emp_dob']; ?></td>
                                                <td>
                                                    <!-- <button class="btn btn-primary editBtn" id="<?php echo $row['emp_id']; ?>">Edit</button> -->
                                                    <button class="btn btn-danger deleteBtn" id="<?php echo $row['emp_id']; ?>">Delete</button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>No Employee Records Found!</td></tr>";
                                    }
                     
                     ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>


</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.btn-success').click(function(e) {
            e.preventDefault();

            var name = $('#userName').val();
            var email = $('#userEmail').val();
            var nic = $('#userNic').val();
            var phone = $('#userPhone').val();
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


                    if (response.includes("success")) {
                        $('input').val('');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX error:", textStatus, errorThrown);
                    alert("AJAX failed: " + textStatus + " - " + errorThrown);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.deleteBtn', function() {
            var emp_id = $(this).attr('id'); 
            if (confirm("Are you sure you want to delete this employee?")) {
                $.ajax({
                    method: "POST",
                    url: "../../route/user/emp/deleteUser.php", 
                    data: {
                        id: emp_id
                    },
                    success: function(response) {
                        alert(response);
                        location.reload(); 
                    },
                    error: function() {
                        alert("Error in deletion process");
                    }
                });
            }
        });
    });
</script>