<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['p_sched'])){
        $p_id = $_POST['pSchedID'];

        $selectSched = "SELECT * FROM crad_panel_sched WHERE p_id = $p_id";
        $querySelect = mysqli_query($con, $selectSched);
        $fetchSched = mysqli_fetch_array($querySelect);

        if($r = mysqli_num_rows($querySelect)>0){
            // echo "dkdkdk";
            echo "<script>alert('This Panel personal schedule is already created')</script>";
            echo "<script>window.location.href='panel.php'</script>";
        }

    }

    if(isset($_POST['panSched'])){
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

        $insertP_Sched = "INSERT INTO crad_panel_sched VALUES(NULL,  $pan_id, '$mon_date', '$mon_time', '$tue_date', '$tue_time', '$wen_date', '$wen_time', '$thr_date', '$thr_time', '$fri_date', '$fri_time', '$sat_date', '$sat_time', '$sun_date', '$sun_time') ";

        $queryP_Sched = mysqli_query($con, $insertP_Sched);

        echo "<script>window.location.href='panel.php'</script>";
        
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Schedule</title>
</head>
<body>
    <h1>Personal Schedule</h1>
    <form action="" method="post">
        <label for="mon">Monday</label>
        <input type="date" name="mon_date" id="mon">
        <input type="time" name="mon_time" id="mon">
        <br>

        <label for="tue">Tuesday</label>
        <input type="date" name="tue_date" id="tue">
        <input type="time" name="tue_time" id="tue">
        <br>

        <label for="wen">Wensday</label>
        <input type="date" name="wen_date" id="wen">
        <input type="time" name="wen_time" id="wen">
        <br>
        
        <label for="thr">Thursday</label>
        <input type="date" name="thr_date" id="thr">
        <input type="time" name="thr_time" id="thr">
        <br>

        <label for="fri">Friday</label>
        <input type="date" name="fri_date" id="fri">
        <input type="time" name="fri_time" id="fri">
        <br>

        <label for="sat">Saturday</label>
        <input type="date" name="sat_date" id="sat">
        <input type="time" name="sat_time" id="sat">
        <br>

        <label for="sun">Sunday</label>
        <input type="date" name="sun_date" id="sun">
        <input type="time" name="sun_time" id="sun">
        <br>

        <input type="submit" name="panSched" value="Submit">
        <input type="hidden" name="pan_id" value="<?php echo $p_id ?>">
    </form>
</body>
</html>