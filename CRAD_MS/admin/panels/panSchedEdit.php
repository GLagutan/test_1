<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['editPanSched'])){
        $pID = $_POST['p_edit'];

        $editPanSched = "SELECT * FROM crad_panel_sched WHERE p_id=$pID";
        $sqlPanSched = mysqli_query($con, $editPanSched);
        $editRow = mysqli_fetch_array($sqlPanSched);

    }

    if(isset($_POST['upPanSched'])){
        $pan_id = $_POST['pan_id'];

        $mon_date = $_POST['mon_date'];
        $mon_time = $_POST['mon_time'];
        $tue_date = $_POST['tue_date'];
        $tue_time = $_POST['tue_time'];
        $wen_date = $_POST['wen_date'];
        $wen_time = $_POST['wen_time'];
        $thr_date = $_POST['thr_date'];
        $thr_time = $_POST['thr_time'];
        $fri_date = $_POST['fri_date'];
        $fri_time = $_POST['fri_time'];
        $sat_date = $_POST['sat_date'];
        $sat_time = $_POST['sat_time'];
        $sun_date = $_POST['sun_date'];
        $sun_time = $_POST['sun_time'];

        $query = "UPDATE crad_panel_sched set mon_date='$mon_date', mon_time='$mon_time', tue_date='$tue_date', tue_time='$tue_time', wen_date='$wen_date', wen_time='$wen_time', thr_date='$thr_date', thr_time='$thr_time', fri_date='$fri_date', fri_time='$fri_time', sat_date='$sat_date', sat_time='$sat_time', sun_date='$sun_date', sun_time='$sun_time' WHERE p_id=$pan_id";
        $sql = mysqli_query($con, $query);

        echo "<script>alert('Updated')</script>";
        echo "<script>window.location.href='panelSched.php'</script>";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Schedule</title>
</head>
<body>
<h1>Personal Schedule</h1>
    <form action="panSchedEdit.php" method="post">
        <label for="mon">Monday</label>
        <input type="date" name="mon_date" id="mon" value="<?php echo $editRow['mon_date'] ?>">
        <input type="time" name="mon_time" id="mon" value="<?php echo $editRow['mon_time'] ?>">
        <br>

        <label for="tue">Tuesday</label>
        <input type="date" name="tue_date" id="tue" value="<?php echo $editRow['tue_date'] ?>">
        <input type="time" name="tue_time" id="tue" value="<?php echo $editRow['tue_time'] ?>">
        <br>

        <label for="wen">Wensday</label>
        <input type="date" name="wen_date" id="wen" value="<?php echo $editRow['wen_date'] ?>">
        <input type="time" name="wen_time" id="wen" value="<?php echo $editRow['wen_time'] ?>">
        <br>
        
        <label for="thr">Thursday</label>
        <input type="date" name="thr_date" id="thr" value="<?php echo $editRow['thr_date'] ?>">
        <input type="time" name="thr_time" id="thr" value="<?php echo $editRow['thr_time'] ?>">
        <br>

        <label for="fri">Friday</label>
        <input type="date" name="fri_date" id="fri" value="<?php echo $editRow['fri_date'] ?>">
        <input type="time" name="fri_time" id="fri" value="<?php echo $editRow['fri_time'] ?>">
        <br>

        <label for="sat">Saturday</label>
        <input type="date" name="sat_date" id="sat" value="<?php echo $editRow['sat_date'] ?>">
        <input type="time" name="sat_time" id="sat" value="<?php echo $editRow['sat_time'] ?>">
        <br>

        <label for="sun">Sunday</label>
        <input type="date" name="sun_date" id="sun" value="<?php echo $editRow['sun_date'] ?>">
        <input type="time" name="sun_time" id="sun" value="<?php echo $editRow['sun_time'] ?>">
        <br>

        <input type="submit" name="upPanSched" value="Update">
        <input type="hidden" name="pan_id" value="<?php echo $editRow['p_id'] ?>">
    </form>
</body>
</html>