<?php
    DEFINE('DB_USER','phpmyadmin'); //change as required 
    DEFINE ('DB_PASSWORD','soil'); //change as required
    DEFINE('DB_HOST','localhost'); //change as required
    DEFINE('DB_NAME','soil_samples'); //change as required


    $dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('Could not connect to MySQL'. mysqli_connect_error());
?>
