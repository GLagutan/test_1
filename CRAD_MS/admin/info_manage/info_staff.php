<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['staff_info'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dep = $_POST['dep'];
        $uRole = $_POST['uRole'];

        $insertStaff = "INSERT INTO crad_info_manage_staff VALUES(NULL, '$fname', '$lname', '$dep', '$uRole')";
        $sqlStaff = mysqli_query($con, $insertStaff);

    }

    $selectStaff = "SELECT * FROM crad_info_manage_staff";
    $sqlSelectStaff = mysqli_query($con, $selectStaff);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Information</title>
    <style>
        table, th, td{
            border-collapse: collapse;
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    
    <a href="../home.php">Home</a>
    <h1>Staff Information</h1>
    <form action="info_staff.php" method="post">
        <label for="fname">Firstname</label>
        <input type="text" name="fname" id="fname" required><br>

        <label for="lname">Lastname</label>
        <input type="text" name="lname" id="lname" required><br>

        <label for="dep">Department</label>
        <input type="text" name="dep" id="dep" required><br>

        <label for="uRole">User Role</label>
        <select name="uRole" id="uRole" required>
            <option value="Adviser">Adviser</option>
            <option value="Research Coordinator">Research Coordinator</option>
            <option value="Department Head">Department Head</option>
            <option value="Admin">Admin</option>
        </select>
        <br>

        <input type="submit" name="staff_info" value="Create Info">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Department</th>
            <th>User Role</th>
            <th colspan="2">Action</th>
        </tr>
        <?php while($rowStaff = mysqli_fetch_array($sqlSelectStaff)) { ?>
        <tr>
            <td><?php echo $rowStaff['id'] ?></td>
            <td><?php echo $rowStaff['firstname'] ?></td>
            <td><?php echo $rowStaff['lastname'] ?></td>
            <td><?php echo $rowStaff['department'] ?></td>
            <td><?php echo $rowStaff['user_role'] ?></td>
            <td>
                <form action="info_staff_edit.php" method="post">
                    <input type="submit" name="staff_edit" value="Edit">
                    <input type="hidden" name="staff_id" value="<?php echo $rowStaff['id'] ?>">
                </form>
            </td>
            <td>
                <form action="../user_manage/um.php" method="post">
                    <input type="submit" name="c_staff" value="Create Account">
                    <input type="hidden" name="staff_id" value="<?php echo $rowStaff['id'] ?>">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>