<?php 
    session_start();
    include("../api/connection.php");

    if (isset($_GET["id"]))
    {
        $userID = $_GET["id"];

        $query = "DELETE FROM user WHERE id = $userID";
        $result = mysqli_query($connection, $query);

        if (!$result)
        {
            mysqli_error($connection);
        }
    }

    header("Location: admin_page.php");
?>