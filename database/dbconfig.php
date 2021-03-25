<?php
//connect to the MySQL database
$url = parse_url(getenv("MySQL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

//return the connection
$connection = mysqli_connect($server, $username, $password, $db);
return $connection;



