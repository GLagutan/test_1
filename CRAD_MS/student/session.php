<?php

    session_start();
    if($_SESSION['user'] != 'Student'){
        echo "<script>window.location.href='../index.php'</script>";
    }

?>