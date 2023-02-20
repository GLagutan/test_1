<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['c_stud'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $yl = $_POST['yl'];
        $dep = $_POST['dep'];
        $adviser = $_POST['adviser'];
        $rt = $_POST['r_title'];
        $gn = $_POST['gn'];

        $insertInfoStud = "INSERT INTO crad_info_manage_stud VALUES (NULL, '$fname', '$lname', '$yl', '$dep', '$adviser', '$rt', '$gn', 'Student')";
        $queryInfoStud = mysqli_query($con, $insertInfoStud);

        echo "<script>alert('New Information Created')</script>";
        echo "<script>window.location.href='info_stud.php'</script>";
    }

    $querySelectStud = "SELECT * FROM crad_info_manage_stud";
    $sqlSelectStud = mysqli_query($con, $querySelectStud);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
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
    
    <h1>Student Information Management</h1>

    <form action="info_stud.php" method="post">
        <label for="fname">Firstname</label>
        <input type="text" name="fname" id="fname"><br>

        <label for="lname">Lastname</label>
        <input type="text" name="lname" id="lname"><br>

        <label for="yl">Year Level</label>
        <select name="yl" id="yl">
            <option value="4th year">4th Year</option>
            <option value="Grade 12">Grade 12</option>
        </select>
        <br>

        <label for="dep">Department</label>
        <input type="text" name="dep" id="dep"><br>

        <label for="adviser">Adviser</label>
        <input type="text" name="adviser" id="adviser"><br>

        <label for="r_title">Research Title</label>
        <input type="text" name="r_title" id="r_title"><br>

        <label for="gn">Group Name</label>
        <input type="text" name="gn" id="gn"><br>

        <input type="submit" name="c_stud" value="Create Info">

    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Year Level</th>
            <th>Department</th>
            <th>Adviser</th>
            <th>Research Title</th>
            <th>Group Name</th>
            <th colspan="2">Action</th>
        </tr>
        <?php while($rowStud = mysqli_fetch_array($sqlSelectStud)) { ?>
        <tr>
            <td><?php echo $rowStud['id'] ?></td>
            <td><?php echo $rowStud['firstname'] ?></td>
            <td><?php echo $rowStud['lastname'] ?></td>
            <td><?php echo $rowStud['year_level'] ?></td>
            <td><?php echo $rowStud['department'] ?></td>
            <td><?php echo $rowStud['adviser'] ?></td>
            <td><?php echo $rowStud['research_title'] ?></td>
            <td><?php echo $rowStud['group_name'] ?></td>
            <td>
                <form action="info_stud_edit.php" method="post">
                    <input type="submit" name="edit_stud" value="Edit">
                    <input type="hidden" name="edit_id" value="<?php echo $rowStud['id'] ?>">
                    <!-- <input type="hidden" name="edit_fname" value="<?php echo $rowStud['firstname'] ?>">
                    <input type="hidden" name="edit_lname" value="<?php echo $rowStud['lastname'] ?>">
                    <input type="hidden" name="edit_yl" value="<?php echo $rowStud['year_level'] ?>">
                    <input type="hidden" name="edit_dep" value="<?php echo $rowStud['department'] ?>">
                    <input type="hidden" name="edit_adviser" value="<?php echo $rowStud['adviser'] ?>">
                    <input type="hidden" name="edit_rt" value="<?php echo $rowStud['research_title'] ?>">
                    <input type="hidden" name="edit_gn" value="<?php echo $rowStud['group_name'] ?>"> -->
                </form>
            </td>
            <td>
                <form action="../user_manage/um.php" method="post">
                    <input type="submit" name="c_s" value="Create Account">
                    <input type="hidden" name="stud_id" value="<?php echo $rowStud['id'] ?>">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>