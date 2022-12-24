<?php
session_start();
include("../api/connection.php");

$userID = $_SESSION['id'];
$eventID = $_GET['id'];

// Event
$event_capacity = 0;

$query = "SELECT * FROM event WHERE event_id = $eventID";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result))
{
    $event_capacity = $row["current_capacity"];
}
$event_capacity = $event_capacity - 1;

// event capacity update
$query = "UPDATE event SET current_capacity = $event_capacity WHERE event_id = $eventID";
$result = mysqli_query($connection, $query);

if (!$result)
{
    mysqli_error($connection);
}

// delete from attend
$query = "DELETE FROM `attend` WHERE event_id = $eventID AND user_id = $userID";
$result = mysqli_query($connection, $query);

if (!$result)
{
    mysqli_error($connection);
}

header("Location: ../details.php?id=$eventID");
?>