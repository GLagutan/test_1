<?php

    include("../connection/connect.php");
    require("session.php");
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
</head>
<body>

    
    <nav>
        <li><a href="">Information</a></li>
        <li><a href="">Evaluation</a></li>
        <li><a href="">Application</a></li>
        <li><a href="">Defense Schedule</a></li>
        <li><a href="archive/archive.php">Research Archive</a></li>
        <li><a href="logout.php">Log Out</a></li>
    </nav>

    <h1>Welcome</h1>
    <h2><?php echo $_SESSION['fname'].' '.$_SESSION['lname'] ?></h2>

    <?php  ?>


</body>
</html>