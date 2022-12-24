<?php
session_start();
include("../api/connection.php");

$eventID = $_GET['id'];

$query = "DELETE FROM `event` WHERE event_id = $eventID";
$result = mysqli_query($connection, $query);

if (!$result)
{
    mysqli_error($connection);
}

header("Location: ../profile.php");
?>