<?php 

    require("../../connection/connect.php");
    require("../session.php");

    $selectStud = "SELECT * FROM crad_info_manage_stud";
    $sqlStud = mysqli_query($con, $selectStud);

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
    <h1>Scheduling</h1>
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
            <th colspan="2">Actions</th>
        </tr>
    <?php while($row=mysqli_fetch_array($sqlStud)) { ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['firstname'] ?></td>
            <td><?php echo $row['lastname'] ?></td>
            <td><?php echo $row['year_level'] ?></td>
            <td><?php echo $row['department'] ?></td>
            <td><?php echo $row['adviser'] ?></td>
            <td><?php echo $row['research_title'] ?></td>
            <td><?php echo $row['group_name'] ?></td>
            <td>
                <form action="insertSched.php" method="post">
                    <input type="submit" name="sched" value="Set Schedule">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </form>
            </td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>