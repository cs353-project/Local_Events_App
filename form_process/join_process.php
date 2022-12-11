<?php
session_start();
include("../api/connection.php");

$userID = $_SESSION['id'];
$eventID = $_GET['id'];

// Restriction
$res_capacity = 0;
$res_age = 0;
$res_gender = "";

$query = "SELECT * FROM restriction WHERE event_id = $eventID";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result))
{
    $res_capacity = $row['capacity'];
    $res_age = $row['age'];
    $res_gender = $row['gender'];
}

// User
$user_age = 0;
$user_gender = "";

$query = "SELECT * FROM user WHERE id = $userID";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result))
{
    $user_age = $row["age"];
    $user_gender = $row["gender"];
}

// Event
$event_capacity = 0;

$query = "SELECT * FROM event WHERE event_id = $eventID";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result))
{
    $event_capacity = $row["current_capacity"];
}

if( !is_null($res_age) && $user_age < $res_age )
{

}
else if( !is_null($res_gender) && $user_gender != $res_gender)
{

}
else if( !is_null($res_capacity) && $event_capacity >= $res_capacity )
{
 
}
else
{
    $query = "INSERT INTO attend (user_id, event_id) " .
        "VALUES ($userID, $eventID)";
    $result = mysqli_query($connection, $query);

    if (!$result)
    {
        mysqli_error($connection);
    }
}

header("Location: ../details.php?id=$eventID");

?>