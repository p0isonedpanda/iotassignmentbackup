<?php
    // show any errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $servername = "localhost";
    $username = "pi";
    $password = "YEETers";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    
    $query = "SELECT * FROM highscores ORDER BY score DESC LIMIT 3";
    $result = $conn->query($query);

    echo "<table class='table'><tr><th>Name</th><th>Score</th></tr>";
    // print results in table
    while ($row = $result->fetch_assoc()) {
	echo "<tr><td>" . $row["name"] . "</td><td>" . $row["score"] . "</td></tr>";
    }
    echo "</table>";
?>
