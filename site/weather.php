<?php
    // show any errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "weathersettings.php";
    $json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Melbourne,au&units=metric&APPID=" . $apikey);
    $data = json_decode($json);
    
    echo "Current Temp: " . round($data->main->temp);
?>
