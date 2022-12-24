<?php
session_start();
include("../api/connection.php");

$userID = $_SESSION['id'];
$event_id = $_GET['id'];

if (isset($_POST["accept"])){
    $query = "SELECT invitation_id FROM send WHERE receiver_id = $userID";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)){
        $invitation_id = $row["invitation_id"];
    }
    
    $query2 = "UPDATE invitation SET response = 'accepted' WHERE id = $invitation_id";
    $result2 = mysqli_query($connection, $query2);

    if (!$result2){
        mysqli_error($connection);
    }

    header("Location: ../profile.php");
}

if (isset($_POST["decline"])){
    $query = "SELECT invitation_id FROM send WHERE receiver_id = $userID";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)){
        $invitation_id = $row["invitation_id"];
    }
    
    $query2 = "UPDATE invitation SET response = 'declined' WHERE id = $invitation_id";
    $result2 = mysqli_query($connection, $query2);

    if (!$result2)
    {
        mysqli_error($connection);
    }

    $query = "SELECT event_id FROM attend WHERE pass_id = $invitation_id";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)){
        $event_id = $row["event_id"];
    }

    $query = "SELECT * FROM event WHERE event_id = $event_id";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result))
    {
        $event_capacity = $row["current_capacity"];
    }

    // event capacity update
    $event_capacity = $event_capacity - 1;
    $query = "UPDATE event SET current_capacity = $event_capacity WHERE event_id = $event_id";
    $result = mysqli_query($connection, $query);

    // attend update
    $query = "DELETE FROM `attend` WHERE pass_id = $invitation_id";
    $result = mysqli_query($connection, $query);

    if (!$result)
    {
        mysqli_error($connection);
    }

    // send update
    $query = "DELETE FROM `send` WHERE invitation_id = $invitation_id";
    $result = mysqli_query($connection, $query);

    if (!$result)
    {
        mysqli_error($connection);
    }

    // invitation update
    $query = "DELETE FROM `invitation` WHERE id = $invitation_id";
    $result = mysqli_query($connection, $query);

    if (!$result)
    {
        mysqli_error($connection);
    }

    // event-pass update
    $query = "DELETE FROM `event-pass` WHERE id = $invitation_id";
    $result = mysqli_query($connection, $query);

    if (!$result)
    {
        mysqli_error($connection);
    }

    header("Location: ../profile.php");
}

?>