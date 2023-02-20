<?php

    require("../../connection/connect.php");
    require("../session.php");

    if(isset($_POST['upload'])){
        // $file = $_FILES['file']['name'];

        $date = $_POST['date'];
        $rt = $_POST['rt'];
        $yl = $_POST['yl'];
        $dep = $_POST['dep'];

        $year = 'files/'.$yl;
        $path = "$year/".$dep;
        $path2 = "$path/".$rt;


        if(!file_exists($year)){
            mkdir($year, 0777, true);
        }
        if(!file_exists($path)){
            mkdir($path, 0777, true); 
        }
        if(!file_exists($path2)){
             mkdir($path2, 0777, true);
        }

        $tmp_file = $_FILES['file']['tmp_name'];

        if($tmp_file != ""){

            $fileLocation = $path2."/".$_FILES['file']['name'];

            if(move_uploaded_file($tmp_file, $fileLocation)){
                echo "New File uploaded";

            }else{
                echo "Some Error Ocurred";
            }
        }else{
            echo "File Not uploaded";
        }

        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Archive</title>
</head>
<body>
    <a href="../home.php">Home</a>
    <h1>Insert your Files here:</h1>

    <form action="archive.php" method="post" enctype="multipart/form-data">

        <label for="file">Upload Your File Here</label>
        <input type="file" name="file" id="file" required><br>

        <label for="date">Date</label>
        <input type="date" name="date" id="date" required><br>

        <label for="rt">Research Title</label>
        <input type="text" name="rt" id="rt" required><br>

        <!-- <label for="dep">Department</label>
        <input type="text" name="dep" id="dep"><br> -->
        <label for="yl">Year Level</label>
        <select name="yl" id="yl" required>
            <option value="4th year">4th year</option>
            <option value="Grade 12">Grade 12</option>
        </select>
        <br>

        <label for="dep">Department</label>
        <select name="dep" id="dep" required>
            <option value="CRIM">CRIM</option>
            <option value="EDUC">EDUC</option>
            <option value="BSBA">BSBA</option>
            <option value="BSOA">BSOA</option>
            <option value="BSAIS">BSAIS</option>
            <option value="ENTREP">ENTREP</option>
            <option value="BSIT">BSIT</option>
            <option value="BLIS">BLIS</option>
            <option value="BSP">BSP</option>
            <option value="BSCpE">BSCpE</option>
            <option value="BSHM">BSHM</option>
            <option value="BSTM">BSTM</option>
            <option value="GAS">GAS</option>
            <option value="HUMSS">HUMSS</option>
            <option value="STEM">STEM</option>
            <option value="ABM">ABM</option>
            <option value="ICT">ICT</option>
        </select>
        <br>

        <input type="submit" name="upload" value="Submit">
    </form>
</body>
</html>