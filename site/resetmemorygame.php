<?php
    include "dbconnect.php";
    $query = "UPDATE memorygame SET level = 1, progress = 1, answer = 0, guess = 0";
    $conn->query($query);
    $conn->close();
?>
