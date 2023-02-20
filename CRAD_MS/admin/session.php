<?php

    session_start();
    if($_SESSION['user'] != 'Admin'){
        echo "<script>window.location.href='../index.php'</script>";
    }

?>