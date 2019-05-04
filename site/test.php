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
    
    $query = "SELECT * FROM info";
    $result = $conn->query($query);
    
    echo $result->num_rows . " results found<br />";
    
    // print out all results
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        echo $i . ": " . $row["message"] . "<br />";
        $i++;
    }

    // show arduino's current state output
    $query = "SELECT * FROM onoroff";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "arduino: " . $row["state"];
    }
    
    $conn->close();
?>
