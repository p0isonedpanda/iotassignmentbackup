<?php
    // show any errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "dbconnect.php";

    $query = "SELECT * FROM memorygame";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $level = $row["level"];
    $levelProgress = $row["progress"];
    echo "<p>Level: " . $level . "</p>";
    echo "<p>Progress: " . $levelProgress . "</p>";

    $conn->close();
?>
