<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['s-panel'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pro = $_POST['pro'];
        $dep = $_POST['dep'];

        $insertPanel = "INSERT INTO crad_panel VALUES(NULL, '$fname', '$lname', '$pro', '$dep')";
        $sqlPanel = mysqli_query($con, $insertPanel);
    }

    $selectPanel = "SELECT * FROM crad_panel";
    $sqlSelect = mysqli_query($con, $selectPanel);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panels</title>
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
    <a href="../home.php">Home</a>
    <h1>Panels Information</h1>
    <form action="panel.php" method="post">
        <label for="fname">Firtname</label>
        <input type="text" name="fname" id="fname"><br><br>

        <label for="lname">Lastname</label>
        <input type="text" name="lname" id="lname"><br><br>

        <label for="pro">Profession</label>
        <input type="text" name="pro" id="pro"><br><br>

        <label for="dep">Department</label>
        <input type="text" name="dep" id="dep"><br><br>

        <input type="submit" name="s-panel" value="Create Record">

    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Profession</th>
            <th>Department</th>
            <th colspan="4">Actions</th>
        </tr>
    <?php while($row = mysqli_fetch_array($sqlSelect)) { ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['panel_fname'] ?></td>
            <td><?php echo $row['panel_lname'] ?></td>
            <td><?php echo $row['profession'] ?></td>
            <td><?php echo $row['department'] ?></td>
            <td>
                <form action="panel_sched.php" method="post">
                    <input type="submit" name="p_sched" value="Personal Schedule">
                    <input type="hidden" name="pSchedID" value="<?php echo $row['id'] ?>">
                </form>
            </td>
            <td>
                <form action="panelSched.php" method="post">
                    <input type="submit" name="schedule" value="View Schedule">
                    <input type="hidden" name="panSched" value="<?php echo $row['id'] ?>">
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="submit" name="" value="Schedule for Defense">
                </form>
            </td>
            <td>
                <form action="panelEdit.php" method="post">
                    <input type="submit" name="edit_p" value="Edit">
                    <input type="hidden" name="pID" value="<?php echo $row['id'] ?>">
                </form>
            </td>
        </tr>
    <?php } ?>
    </table>


</body>
</html>