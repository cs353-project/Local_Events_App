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
    echo "<script>alert('Your age is not suitable for this event');
    window.location.href='../profile.php';
    </script>";
}
else if( !is_null($res_gender) && $user_gender != $res_gender)
{
    echo "<script>alert('Your gender is not suitable for this event');
    window.location.href='../profile.php';
    </script>";
}
else if( !is_null($res_capacity) && $event_capacity >= $res_capacity )
{
    echo "<script>alert('Event is full');
    window.location.href='../profile.php';
    </script>";
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

    $event_capacity = $event_capacity + 1;

    // event capacity update
    $query = "UPDATE event SET current_capacity = $event_capacity WHERE event_id = $eventID";
    $result = mysqli_query($connection, $query);

    if (!$result)
    {
        mysqli_error($connection);
    }

}

header("Location: ../details.php?id=$eventID");

?>