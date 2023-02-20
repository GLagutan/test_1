<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['search'])){
        // $id = $_POST['um-id'];
        $search = $_POST['um_search'];

        $SearchUser = "SELECT * FROM crad_user_manage WHERE fname LIKE '%$search%' OR lname LIKE '%$search%' OR username LIKE '%$search%' OR password LIKE '%$search%' OR user_type LIKE '%$search%' OR um_id LIKE '%$search%'";
        $sqlSearchUser = mysqli_query($con, $SearchUser);

       
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <?php while($row = mysqli_fetch_assoc($sqlSearchUser)){ ?>
        <tr>
            <td><?php echo $row['um_id'] ?></td>
            <td><?php echo $row['fname'] ?></td>
            <td><?php echo $row['lname'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo md5($row['password']) ?></td>
            <td><?php echo $row['user_type'] ?></td>
            <td>
                <form action="um_edit.php" method="post">
                    <input type="submit" name="edit_user" value="Edit">
                    <input type="hidden" name="edit_id" value="<?php echo $row['um_id'] ?>">
                    <input type="hidden" name="edit_fname" value="<?php echo $row['fname'] ?>">
                    <input type="hidden" name="edit_lname" value="<?php echo $row['lname'] ?>">
                    <input type="hidden" name="edit_username" value="<?php echo $row['username'] ?>">
                    <input type="hidden" name="edit_password" value="<?php echo $row['password'] ?>">
                    <input type="hidden" name="edit_user_type" value="<?php echo $row['user_type'] ?>">
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