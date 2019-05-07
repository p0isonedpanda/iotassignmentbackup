<?php
    $servername = "localhost";
    $username = "pi";
    $password = "YEETers";
    $dbname = "test";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
?>
