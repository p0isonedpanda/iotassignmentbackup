<?php
    // show any errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "dbconnect.php";
    
    $query = "SELECT * FROM highscores ORDER BY score DESC LIMIT 3";
    $result = $conn->query($query);

    echo "<table class='table table-striped table-sm'>";
    echo "    <thead class='thead-dark'>";
    echo "        <th>Name</th><th>Score</th>";
    echo "    </thead>";
    echo "    <tbody>";
    // print results in table
    while ($row = $result->fetch_assoc()) {
	echo "    <tr>";
	echo "        <td>" . $row["name"] . "</td><td>" . $row["score"] . "</td>";
	echo "    </tr>";
    }
    echo "    </tbody>";
    echo "</table>";
?>
