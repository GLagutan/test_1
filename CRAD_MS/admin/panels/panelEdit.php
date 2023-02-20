<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['edit_p'])){
        $id = $_POST['pID'];

        $select = "SELECT * FROM crad_panel WHERE id=$id";
        $sql_select = mysqli_query($con, $select);
        $fetch = mysqli_fetch_array($sql_select);
    }

    if(isset($_POST['u-panel'])){
        $panelID = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pro = $_POST['pro'];
        $dep = $_POST['dep'];

        $update = "UPDATE crad_panel SET panel_fname='$fname', panel_lname='$lname', profession='$pro', department='$dep' WHERE id = $panelID";
        $sql_update = mysqli_query($con, $update);

        echo "<script>alert('Updated')</script>";
        echo "<script>window.location.href='panel.php'</script>";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Panel</title>
</head>
<body>
<h1>Edit Information</h1>
    <form action="panelEdit.php" method="post">
        <label for="fname">Firtname</label>
        <input type="text" name="fname" id="fname" value="<?php echo $fetch['panel_fname'] ?>"><br><br>

        <label for="lname">Lastname</label>
        <input type="text" name="lname" id="lname" value="<?php echo $fetch['panel_lname'] ?>"><br><br>

        <label for="pro">Profession</label>
        <input type="text" name="pro" id="pro" value="<?php echo $fetch['profession'] ?>"><br><br>

        <label for="dep">Department</label>
        <input type="text" name="dep" id="dep" value="<?php echo $fetch['department'] ?>"><br><br>

        <input type="submit" name="u-panel" value="Update Record">
        <input type="hidden" name="id" value="<?php echo $id ?>">
    </form>
</body>
</html>