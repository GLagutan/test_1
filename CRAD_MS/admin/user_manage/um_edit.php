<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['edit_user'])){
        $edit_id = $_POST['edit_id'];
        $edit_fname = $_POST['edit_fname'];
        $edit_lname = $_POST['edit_lname'];
        $edit_uname = $_POST['edit_username'];
        $edit_pass = $_POST['edit_password'];
        $edit_user_type = $_POST['edit_user_type'];

        $selectU = "SELECT * FROM crad_user_manage WHERE um_id = $edit_id ";
        $sqlU = mysqli_query($con, $selectU);
        $uRow = mysqli_fetch_array($sqlU);
    }
    if(isset($_POST['update_user'])){
        $update_id = $_POST['update_id'];
        $update_fname = $_POST['update_fname'];
        $update_lname = $_POST['update_lname'];
        $update_uname = $_POST['update_uname'];
        $update_pass = $_POST['update_pass'];
        $update_user_type = $_POST['update_u_type'];

        $queryUpdateUser = "UPDATE crad_user_manage SET fname='$update_fname', lname='$update_lname', username='$update_uname', password='$update_pass', user_type='$update_user_type' WHERE um_id=$update_id";
        $sqlUpdateUser = mysqli_query($con, $queryUpdateUser);

        echo "<script>alert('The user has been updated')</script>";
        echo "<script>window.location.href='um_view.php'</script>";

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Users Account</title>
</head>
<body>
    <a href="um.php">User Management</a>
    <h1>Update Users:</h1>
    <form action="um_edit.php" method="post">

        <label for="fname">Firstname</label>
        <input type="text" name="update_fname" id="fname" value="<?php echo $edit_fname ?>"><br>

        <label for="lname">Lastname</label>
        <input type="text" name="update_lname" id="lname" value="<?php echo $edit_lname ?>"><br>

        <label for="uname">Username</label>
        <input type="text" name="update_uname" id="uname" value="<?php echo $edit_uname ?>"><br>

        <label for="pass">Password</label>
        <input type="password" name="update_pass" id="pass" value="<?php echo $edit_pass ?>"><br>

        <label for="u_type">User Type</label>
        <select name="update_u_type" id="u_type">
            <option value="Admin" <?php echo($uRow['user_type']=="Admin")?'selected':''; ?>>Admin</option>
            <option value="Department Head" <?php echo($uRow['user_type']=="Department Head")?'selected':''; ?>>Department Head</option>
            <option value="Adviser" <?php echo($uRow['user_type']=="Adviser")?'selected':''; ?>>Adviser</option>
            <option value="Research Coordinator" <?php echo($uRow['user_type']=="Research Coordinator")?'selected' : ''; ?>>Research Coordinator</option>
            <option value="Student" <?php echo($uRow['user_type']=="Student")?'selected':''; ?>>Student</option>
        </select>
        <br>

        <input type="submit" name="update_user" value="Update User">
        <input type="hidden" name="update_id" value="<?php echo $edit_id ?>">

    </form>
</body>
</html>