<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "pureaura";
    
    $conn = new mysqli($host, $user, $pass, $database);
    if ($conn->connect_errno) {
        $code = $conn->connect_errno;
        $message = $conn->connect_error;
        printf("<p>Connection error: %d %s</p>", $code, $message);
    }

    mysqli_set_charset($conn, 'utf8');
?>