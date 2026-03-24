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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="">

</head>

<body>
    <div class="container">
        <div class="card-header">
            <h3>Manage Emp Details</h3>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-hover table-primary table-border" boarder="1px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>NIC</th>
                                    <th>Tel</th>
                                    <th>DOB</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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
                                                <button type="button" class="btn btn-primary btn editBtn" id="<?php echo $row['emp_id']; ?>">Edit</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger deleteBtn" id="<?php echo $row['emp_id']; ?>">Delete</button>
                                            </td>

                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center'>No Employee Records Found!</td></tr>";
                                }

                                ?>
                                <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Employee Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editForm">
                                                    <input type="hidden" id="edit_emp_id">
                                                    <div class="mb-3">
                                                        <label>Name</label>
                                                        <input type="text" id="edit_name" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Email</label>
                                                        <input type="email" id="edit_email" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>NIC</label>
                                                        <input type="text" id="edit_nic" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Phone</label>
                                                        <input type="text" id="edit_phone" class="form-control">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" id="updateBtn" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

    $(document).ready(function() {
        // 1. Edit Button එක එබූ විට දත්ත Modal එකට ගැනීම
        $(document).on('click', '.editBtn', function() {
            var emp_id = $(this).attr('id');

            $.ajax({
                url: "../../route/user/emp/getEmployee.php",
                method: "POST",
                data: {
                    id: emp_id
                },
                dataType: "json",
                success: function(data) {
                    $('#edit_emp_id').val(data.emp_id);
                    $('#edit_name').val(data.emp_name);
                    $('#edit_email').val(data.emp_email);
                    $('#edit_nic').val(data.emp_nic);
                    $('#edit_phone').val(data.emp_tel);
                    $('#editModal').modal('show'); // Modal එක පෙන්වීම
                }
            });
        });

        // 2. Update Button එක එබූ විට දත්ත Save කිරීම
        $('#updateBtn').click(function() {
            var id = $('#edit_emp_id').val();
            var name = $('#edit_name').val();
            var email = $('#edit_email').val();
            var nic = $('#edit_nic').val();
            var phone = $('#edit_phone').val();

            $.ajax({
                url: "../../route/user/emp/updateEmp.php",
                method: "POST",
                data: {
                    update: 1,
                    id: id,
                    name: name,
                    email: email,
                    nic: nic,
                    phone: phone
                },
                success: function(response) {
                    alert(response);
                    location.reload(); // පිටුව Refresh කිරීම
                }
            });
        });
    });
</script>