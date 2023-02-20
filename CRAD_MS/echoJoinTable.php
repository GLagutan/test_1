<?php

    require("../../connection/connect.php");

    // $research = "SELECT s.*, a.* FROM crad_info_manage_stud s LEFT JOIN crad_info_manage_staff a ON s.department=a.department ";

    // $research = "SELECT crad_info_manage_stud.firstname AS s_fname, crad_info_manage_staff.firstname AS a_fname FROM crad_info_manage_stud LEFT JOIN crad_info_manage_staff ON crad_info_manage_stud.department=crad_info_manage_staff.department";

    $research = "SELECT 
    s.id AS s_id,
    s.firstname AS s_fname,
    s.lastname AS s_lname, 
    s.year_level AS s_yr, 
    s.department AS s_dep, 
    s.adviser AS s_ad, 
    s.research_title AS s_rt,
    s.group_name AS s_grp,
    a.firstname AS a_fname,
    a.lastname AS a_lname 
    FROM crad_info_manage_stud s LEFT JOIN crad_info_manage_staff a 
    ON s.department=a.department";

    $sqlResearch = mysqli_query($con, $research);
    $fetch = mysqli_fetch_array($sqlResearch);
    // $row = mysqli_num_rows($sqlResearch);


    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules</title>
    <style>
        table, th, td{
            border-collapse: collapse;
            border: 1px solid black;
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
            <th>Year Level</th>
            <th>Department</th>
            <th>Adviser</th>
            <th>Research Title</th>
            <th>Group Name</th>
        </tr>
        <tr>
            <td><?php echo $fetch['s_id'] ?></td>
            <td><?php echo $fetch['s_fname'] ?></td>
            <td><?php echo $fetch['s_lname'] ?></td>
            <td><?php echo $fetch['s_yr'] ?></td>
            <td><?php echo $fetch['s_dep'] ?></td>
            <td><?php echo $fetch['a_fname'].' '.$fetch['a_lname'] ?></td>
            <td><?php echo $fetch['s_rt'] ?></td>
            <td><?php echo $fetch['s_grp'] ?></td>
        </tr>
    </table>


    <!-- <form action="" method="post">
        <label for=""></label>
        <input type="" name="" value=""><br>
    </form> -->


</body>
</html>