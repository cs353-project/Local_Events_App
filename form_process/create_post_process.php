<?php
    session_start();
    include("../api/connection.php");

    if (isset($_POST["submit"]))
    {
        $text = $_POST["text"];
        $photo = $_POST["photo"];
        $link = $_POST["link"];

        print_r($_SESSION);

        $text = mysqli_real_escape_string($connection, $text);
        $photo = mysqli_real_escape_string($connection, $photo);
        $link = mysqli_real_escape_string($connection, $link);

        $userID = $_SESSION['id'];
        $eventID = $_GET["eventID"];
        
        // Event-Post
        $query = "INSERT INTO `event-post` (text, photograph, link) " . 
                "VALUES ('$text', '$photo', '$link')";
        $result = mysqli_query($connection, $query);

        if (!$result)
        {
            mysqli_error($connection);
        }

        // Post
        $query = "SELECT * FROM `event-post` ORDER BY post_id DESC LIMIT 1";
        $result = mysqli_query($connection, $query);
        $postID = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $postID = $row["post_id"];
        }

        $query = "INSERT INTO post (user_id, event_id, post_id) " . 
                "VALUES ($userID, $eventID, $postID)";
        $result = mysqli_query($connection, $query);

        if (!$result)
        {
            mysqli_error($connection);
        }

        header("Location: ../details.php?id=$eventID");
    }
    else
    {
        echo "Error!";
    }
?>