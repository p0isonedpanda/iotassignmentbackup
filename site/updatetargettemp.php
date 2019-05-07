<?php
    // show any errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "dbconnect.php";
    $_POST["target"];
    $query = "UPDATE smartfan SET target = " . $_POST["target"];
    $conn->query($query);
    $conn->close();
?>
