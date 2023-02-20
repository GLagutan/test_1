<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['sub_user'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $u_pass = $_POST['pass'];
        $user_type = $_POST['u_type'];

        $queryInsertUser = "INSERT INTO crad_user_manage VALUES (NULL, '$fname', '$lname', '$uname', '$u_pass', '$user_type')";
        $sqlInsertUser = mysqli_query($con, $queryInsertUser);

        echo "<script>alert('New User Created')</script>";
        echo "<script>window.location.href='um_view.php'</script>";
    }

    $querySelectUser = "SELECT * FROM crad_user_manage";
    $sqlSelectUser = mysqli_query($con, $querySelectUser);

    if(isset($_POST['c_s'])){
        $Stud_id = $_POST['stud_id'];
        $queryS = "SELECT * FROM crad_info_manage_stud WHERE id=$Stud_id";
        $sqlS = mysqli_query($con, $queryS);
        $S_Row = mysqli_fetch_array($sqlS);
    }

    if(isset($_POST['c_staff'])){
        $Staff_id = $_POST['staff_id'];
        $queryS = "SELECT * FROM crad_info_manage_staff WHERE id=$Staff_id";
        $sqlS = mysqli_query($con, $queryS);
        $S_Row = mysqli_fetch_array($sqlS);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        table, th, td{
            border-collapse: collapse;
            border: 1px solid black;
            margin: 10px;
            padding: 5px;
        }
    </style>
</head>
<body>
    
    <nav>
        <li><a href="../home.php">Home</a></li>
    </nav>

    <h1>User Management</h1>

    
    <form action="um.php" method="post">

        <label for="fname">Firstname</label>
        <input type="text" name="fname" id="fname" value="<?php echo $S_Row['firstname'] ?>"><br>

        <label for="lname">Lastname</label>
        <input type="text" name="lname" id="lname" value="<?php echo $S_Row['lastname'] ?>"><br>

        <label for="uname">Username</label>
        <input type="text" name="uname" id="uname"><br>

        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass"><br>

        <label for="u_type">User Type</label>
        <select name="u_type" id="u_type">
            <option value="Admin" <?php echo $S_Row['user_role'] == 'Admin'? 'selected':''; ?>>Admin</option>
            <option value="Department Head" <?php echo $S_Row['user_role'] == 'Department Head'? 'selected':''; ?>>Department Head</option>
            <option value="Adviser" <?php echo $S_Row['user_role'] == 'Adviser'? 'selected':''; ?>>Adviser</option>
            <option value="Research Coordinator" <?php echo $S_Row['user_role'] == 'Research Coordinator'? 'selected':''; ?>>Research Coordinator</option>
            <option value="Student" <?php echo $S_Row['user_role'] == 'Student'? 'selected':''; ?>>Student</option>
        </select>
        <br>

        <input type="submit" name="sub_user" value="Create User">

    </form>
   

    <table>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Password</th>
            <th>User_type</th>
            <th colspan="2">Action</th>
        </tr>
        <?php while($userResult = mysqli_fetch_array($sqlSelectUser)) { ?>
        <tr>
            <td><?php echo $userResult['um_id'] ?></td>
            <td><?php echo $userResult['fname'] ?></td>
            <td><?php echo $userResult['lname'] ?></td>
            <td><?php echo $userResult['username'] ?></td>
            <!-- <td><?php echo md5($userResult['password']) ?></td> -->
            <td><?php echo $userResult['password'] ?></td>
            <td><?php echo $userResult['user_type'] ?></td>
            <td>
                <form action="um_edit.php" method="post">
                    <input type="submit" name="edit_user" value="Edit">
                    <input type="hidden" name="edit_id" value="<?php echo $userResult['um_id'] ?>">
                    <input type="hidden" name="edit_fname" value="<?php echo $userResult['fname'] ?>">
                    <input type="hidden" name="edit_lname" value="<?php echo $userResult['lname'] ?>">
                    <input type="hidden" name="edit_username" value="<?php echo $userResult['username'] ?>">
                    <input type="hidden" name="edit_password" value="<?php echo $userResult['password'] ?>">
                    <input type="hidden" name="edit_user_type" value="<?php echo $userResult['user_type'] ?>">
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="submit" name="view_user" value="View">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>