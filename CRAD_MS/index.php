<?php

    
    require("connection/connect.php");
    session_start();
    // if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
    //     $_SESSION['status'] = 'invalid';//default
    //     // echo header("Location: index.php");
    // }

    $_SESSION['user'] = 'invalid User';
    if($_SESSION['user'] == 'invalid User' || empty($_SESSION['user'])){
        $_SESSION['user'] = 'invalid User';//default
        // echo header("Location: index.php");
    }

    if($_SESSION['user']=='Admin'){
        echo "<script>window.location.href='admin/home.php'</script>";
    }
    if($_SESSION['user']=='Student'){
        echo "<script>window.location.href='student/home.php'</script>";
    }

    if(isset($_POST['login'])){
        $uname = trim($_POST['uname']) ;
        $pass = trim($_POST['pass']);
        // $Uid = $_POST['um_id'];


        if(empty($uname) || empty($pass)){
            echo "<script>alert('Username or Password may empty')</script>";
        }else{
            // $account="SELECT * FROM crad_user_manage";
            $account="SELECT * FROM crad_user_manage WHERE username='$uname' AND password='$pass'";
            $sqlAcc = mysqli_query($con, $account);
            $fetch = mysqli_fetch_assoc($sqlAcc);

            if(mysqli_num_rows($sqlAcc)>0){
                //session variables
                $_SESSION['id'] = $fetch['um_id'];
                $_SESSION['user'] = $fetch['user_type'];
                $_SESSION['fname'] = $fetch['fname'];
                $_SESSION['lname'] = $fetch['lname'];
                $_SESSION['uname'] = $fetch['username'];
                $_SESSION['pass'] = $fetch['password'];
                // $_SESSION['status'] = 'invalid';
            

                switch($_SESSION['user']){
                    case 'Admin':
                        $_SESSION['user'] = 'Admin';
                        echo '<script>window.location.href="admin/home.php"</script>';
                        break;
                    case 'Student':
                        $_SESSION['user'] = 'Student';
                        echo header("Location: student/home.php");
                        break;
                }
            }else{
                $_SESSION['user'] = 'invalid User';
                echo $_SESSION['user'];
            }
                
        }
    }
    // else{
    //     $_SESSION['user'] = 'invalid User';
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" 
    href="css/style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="index.php" method="post">
        

        <label for="uname">Username</label>
        <input type="text" name="uname" id="uname" required placeholder="Username"> <br>

        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass" required placeholder="Password"> <br>

        <input type="submit" name="login" value="login"> <br>
        
        <!-- <input type="hidden" name="um_id" value="<?php echo $rowUser['um_id'] ?>"> -->
    </form>
</body>
</html>