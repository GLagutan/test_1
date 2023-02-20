<?php

    session_start();

    $_SESSION['user'] = 'invalid User';

    unset($_SESSION['uname']);

    echo "<script>window.location.href='../index.php'</script>";


?>