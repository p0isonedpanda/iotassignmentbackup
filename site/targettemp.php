<?php
    // show any errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // TODO: handle user input for target temp
    include "dbconnect.php";

    $query = "SELECT * FROM smartfan";
    $result = $conn->query($query);
    $targetTemp = $result->fetch_assoc()["target"];

    echo "<p>Target Temp: " . $targetTemp . "°C</p>";
    echo "<div class='progress'>";
    echo "    <div class='progress-bar progress-bar-striped progress-bar-animated bg-info' style='width: " . $targetTemp * 2 ."%' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='50'></div>";
    echo "</div>";
?>
