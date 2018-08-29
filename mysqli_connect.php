<?php
DEFINE('DB_USER','phpmyadmin');
DEFINE ('DB_PASSWORD','soil');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','CHENWEN');

//a variable called dadabase connection
$dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('Could not connect to MySQL'. mysqli_connect_error());
?>
