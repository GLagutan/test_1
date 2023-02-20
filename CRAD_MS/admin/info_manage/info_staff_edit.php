<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['staff_edit'])){
        $staff_id = $_POST['staff_id'];

        $StaffSelect = "SELECT * FROM crad_info_manage_staff WHERE id=$staff_id";
        $StaffSql = mysqli_query($con, $StaffSelect);
        $StaffRow = mysqli_fetch_array($StaffSql);
    }

    if(isset($_POST['staff_info_update'])){
        $id = $_POST['Staff_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dep = $_POST['dep'];
        $uRole = $_POST['uRole'];

        $UpdateStaff = "UPDATE crad_info_manage_staff SET firstname='$fname', lastname='$lname', department='$dep', user_role='$uRole' WHERE id=$id";
        $sqlStaff = mysqli_query($con, $UpdateStaff);

        echo "<script>alert('Staff Information Updated')</script>";
        echo header("Location: info_staff.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff Information</title>
</head>
<body>
    <h1>Update Staff Information</h1>

    <form action="info_staff_edit.php" method="post">
        <label for="fname">Firstname</label>
        <input type="text" name="fname" id="fname" value="<?php echo $StaffRow['firstname'] ?>" required><br>

        <label for="lname">Lastname</label>
        <input type="text" name="lname" id="lname" value="<?php echo $StaffRow['lastname'] ?>" required><br>

        <label for="dep">Department</label>
        <input type="text" name="dep" id="dep" value="<?php echo $StaffRow['department'] ?>" required><br>

        <label for="uRole">User Role</label>
        <select name="uRole" id="uRole" required>
            <option value="Adviser" <?php echo $StaffRow['user_role'] == 'Adviser'?'selected':''; ?>>Adviser</option>
            <option value="Department Head" <?php echo $StaffRow['user_role'] == 'Department Head'?'selected':''; ?>>Department Head</option>
            <option value="Research Coordinator" <?php echo $StaffRow['user_role'] == 'Research Coordinator'?'selected':''; ?>>Research Coordinator</option>
            <option value="Admin" <?php echo $StaffRow['user_role'] == 'Admin'?'selected':''; ?>>Admin</option>
        </select>
        <br>

        <input type="submit" name="staff_info_update" value="Update Info">
        <input type="hidden" name="Staff_id" value="<?php echo $StaffRow['id'] ?>">
    </form>

</body>
</html>