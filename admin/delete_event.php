<?php
    session_start();
    include("../api/connection.php");

    if (isset($_GET["id"]))
    {
        $eventID = $_GET["id"];

        $query = "DELETE FROM event WHERE event_id = $eventID";
        $result = mysqli_query($connection, $query);

        if (!$result)
        {
            mysqli_error($connection);
        }

        header("Location: admin_page.php");
    }
    else
    {
        echo "Get Request Error!";
    }
?>