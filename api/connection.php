<?php
// Database Connection
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'eventemitter');

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$connection)
{
    die("Database connection is failed" . mysqli_connect_error());
}

?>