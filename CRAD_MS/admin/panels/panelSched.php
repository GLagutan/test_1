<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['schedule'])){
        $panSched = $_POST['panSched'];

        $SchedSelect = "SELECT * FROM crad_panel_sched WHERE p_id=$panSched";
        $SchedSql = mysqli_query($con, $SchedSelect);
        $sr = mysqli_fetch_array($SchedSql);

        if($r = mysqli_num_rows($SchedSql)<1){
            // echo "dkdkdk";
            echo "<script>alert('The Panel has no schedule yet')</script>";
            echo "<script>window.location.href='panel.php'</script>";
        }

    }else{
        echo "<script>window.location.href='panel.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Schedules</title>
    <style>
        table, th, td{
            border-collapse: collapse;
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Own Personal Schedule</h1>
    <table>
        <tr>
            <th colspan="10">Work Schedule</th>
        </tr>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wensday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
            <th></th>
        </tr>
        <tr>
            <th>Day</th>
            <td><?php echo $sr['p_id'] ?></td>
            <td><?php echo $sr['mon_date'] ?></td>
            <td><?php echo $sr['tue_date'] ?></td>
            <td><?php echo $sr['wen_date'] ?></td>
            <td><?php echo $sr['thr_date'] ?></td>
            <td><?php echo $sr['fri_date'] ?></td>
            <td><?php echo $sr['sat_date'] ?></td>
            <td><?php echo $sr['sun_date'] ?></td>
            <td>
                <form action="panSchedEdit.php" method="post">
                    <input type="submit" name="editPanSched" value="Edit">
                    <input type="hidden" name="p_edit" value="<?php echo $sr['p_id'] ?>">
                </form>
            </td>
        </tr>
        <tr>
            <th>Time</th>
            <td><?php echo $sr['p_id'] ?></td>
            <td><?php echo $sr['mon_time'] ?></td>
            <td><?php echo $sr['tue_time'] ?></td>
            <td><?php echo $sr['wen_time'] ?></td>
            <td><?php echo $sr['thr_time'] ?></td>
            <td><?php echo $sr['fri_time'] ?></td>
            <td><?php echo $sr['sat_time'] ?></td>
            <td><?php echo $sr['sun_time'] ?></td>
            <td>
                <form action="panSchedEdit.php" method="post">
                    <input type="submit" name="editPanSched" value="Edit">
                    <input type="hidden" name="p_edit" value="<?php echo $sr['p_id'] ?>">
                </form>
            </td>
        </tr>
    </table>



</body>
</html>