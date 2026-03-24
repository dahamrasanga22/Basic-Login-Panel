<?php
include_once("../../functions/userFunction.php");

?>

<form id="editEmpForm">
    <input type="hidden" name="empId" id="empId" value="<?php echo $emp['emp_id']; ?>">
    <input type="text" id="empName" class="form-control" value="<?php echo $emp['emp_name']; ?>">
    <input type="email" id="empEmail" class="form-control" value="<?php echo $emp['emp_email']; ?>">
    <input type="text" id="empNic" class="form-control" value="<?php echo $emp['emp_nic']; ?>">
    <input type="text" id="empTel" class="form-control" value="<?php echo $emp['emp_tel']; ?>">
    <input type="date" id="empDob" class="form-control" value="<?php echo $emp['emp_dob']; ?>">
    <button type="button" id="btnUpdate" class="btn btn-primary mt-3">Update Employee</button>
</form>

<script>
$('#btnUpdate').click(function() {
    $.ajax({
        method: "POST",
        url: "../../route/user/emp/updateEmp.php",
        data: {
            id: $('#empId').val(),
            name: $('#empName').val(),
            email: $('#empEmail').val(),
            nic: $('#empNic').val(),
            tel: $('#empTel').val(),
            dob: $('#empDob').val()
        },
        success: function(res) {
            alert(res);
            window.location.href = "manageEmp.php";
        }
    });
});
</script>