<?php
    session_start();
    include("../api/connection.php");

    $userID = $_SESSION["id"];
    $eventID = $_GET["event_id"];
    $postID = $_GET["post_id"];

    $query = "INSERT INTO `like` (user_id, post_id) VALUES ($userID, $postID)";
    $result = mysqli_query($connection, $query);

    if (!$result)
    {
        mysqli_error($connection);
    }

    header("Location: ../details.php?id=$eventID");
?>