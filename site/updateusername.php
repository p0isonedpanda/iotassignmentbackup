<?php
    // show any errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "dbconnect.php";
    $query = "UPDATE memorygame SET name = '" . $_POST["name"] . "'";
    $conn->query($query);
    $conn->close();
?>

