<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['edit_stud'])){
        $edit_id = $_POST['edit_id'];
        // $edit_fname = $_POST['edit_fname'];
        // $edit_lname = $_POST['edit_lname'];
        // $edit_yl = $_POST['edit_yl'];
        // $edit_dep = $_POST['edit_dep'];
        // $edit_ad = $_POST['edit_adviser'];
        // $edit_rt = $_POST['edit_rt'];
        // $edit_gn = $_POST['edit_gn'];

        $queryEditStud = "SELECT * FROM crad_info_manage_stud WHERE id=$edit_id";
        $sqlEditStud = mysqli_query($con, $queryEditStud);
        $rowEditStud = mysqli_fetch_array($sqlEditStud);
    }

    if(isset($_POST['e_stud'])){
        $update_id = $_POST['stud_id'];
        $update_fname = $_POST['fname'];
        $update_lname = $_POST['lname'];
        $update_yl = $_POST['yl'];
        $update_dep = $_POST['dep'];
        $update_ad = $_POST['adviser'];
        $update_rt = $_POST['r_title'];
        $update_gn = $_POST['gn'];

        $queryUpdateStud = "UPDATE crad_info_manage_stud SET firstname='$update_fname', lastname='$update_lname', year_level='$update_yl', department='$update_dep', adviser='$update_ad', research_title='$update_rt', group_name='$update_gn' WHERE id=$update_id";
        $sqlUpdateStud = mysqli_query($con, $queryUpdateStud);

        echo "<script>alert('Student Information Updated')</script>";
        echo header("Location: info_stud.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Information</title>
</head>
<body>

    <a href="info_stud.php">Back</a>

    <h1>Edit Student Information Management</h1>

    <form action="info_stud_edit.php" method="post">
        <label for="fname">Firstname</label>
        <input type="text" name="fname" id="fname" value="<?php echo $rowEditStud['firstname'] ?>"><br>

        <label for="lname">Lastname</label>
        <input type="text" name="lname" id="lname" value="<?php echo $rowEditStud['lastname'] ?>"><br>

        <label for="yl">Year Level</label>
        <select name="yl" id="yl">
            <option value="4th year" <?php echo $rowEditStud['year_level'] == '4th year'? 'selected':'';  ?>>4th Year</option>
            <option value="Grade 12" <?php echo $rowEditStud['year_level'] == 'Grade 12'? 'selected':'';  ?>>Grade 12</option>
        </select>
        <br>

        <label for="dep">Departmen</label>
        <input type="text" name="dep" id="dep" value="<?php echo $rowEditStud['department'] ?>"><br>

        <label for="adviser">Adviser</label>
        <input type="text" name="adviser" id="adviser" value="<?php echo $rowEditStud['adviser'] ?>"><br>

        <label for="r_title">Research Title</label>
        <input type="text" name="r_title" id="r_title" value="<?php echo $rowEditStud['research_title'] ?>"><br>

        <label for="gn">Group Name</label>
        <input type="text" name="gn" id="gn" value="<?php echo $rowEditStud['group_name'] ?>"><br>

        <input type="submit" name="e_stud" value="Update Information">
        <input type="hidden" name="stud_id" value=" <?php echo $rowEditStud['id'] ?>">

    </form>
    
</body>
</html>