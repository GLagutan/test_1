<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'crad_ms';

    $con = mysqli_connect($host, $user, $password, $db);

    echo mysqli_connect_error() ? "Can't connect to database": "";

?>