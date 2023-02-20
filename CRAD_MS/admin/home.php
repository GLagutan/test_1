<?php

    require("../connection/connect.php");
    require("session.php");
    
    echo $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <nav>
        <li><a href="home.php">Home</a></li>
        <li><a href="user_manage/um_view.php">User Management</a></li>
        <li><a href="info_manage/info_stud.php">Information Management for Student</a></li>
        <li><a href="info_manage/info_staff.php">Information Management for Staff</a></li>
        <!-- <li><a href="">Grant & Application</a></li>
        <li><a href="">Archive</a></li> -->
        <li><a href="schedule/schedule.php">Schedule</a></li>
        <li><a href="panels/panel.php">Panels</a></li>
        <!-- <li><a href="">Payment</a></li>
        <li><a href="">Payment Information</a></li>
        <li><a href="">Evaluation</a></li>
        <li><a href="">Accession List</a></li> -->
        <li><a href="logout.php">Log Out</a></li>
    </nav>

</body>
</html>