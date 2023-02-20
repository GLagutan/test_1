<?php

    require("../../connection/connect.php");
    require("../session.php");

    $querySelectUser = "SELECT * FROM crad_user_manage";
    $sqlSelectUser = mysqli_query($con, $querySelectUser);
    // $search = mysqli_fetch_array($sqlSelectUser);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
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
        <li><a href="um_view.php">User Management</a></li>
    </nav>
    
    <h1>User Management</h1>

        <form action="um_search.php" method="post">
            <label for="um_search">Search</label>
            <input type="search" name="um_search" id="um_search" placeholder="Search...">
            <input type="submit" name="search" value="Search">
            <!-- <input type="hidden" name="um-id" value="<?php echo $search['um_id']  ?>"> -->
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