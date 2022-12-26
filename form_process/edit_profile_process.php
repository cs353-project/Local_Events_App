<?php
    session_start();
    include("../api/connection.php");

    if(isset($_POST["edit-profile-submit"]))
    {
        $userID = $_SESSION["id"];

        $first_name = $_POST["first_name"];
        $middle_name = $_POST["middle_name"];
        $last_name = $_POST["last_name"];
        $gender = $_POST["gender"];
        $mail = $_POST["mail"];
 
        // Query Processing

        $query = "UPDATE user " . 
                "SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', " . 
                "gender = '$gender', mail = '$mail' " . 
                "WHERE id = $userID";

        $result = mysqli_query($connection, $query);

        if (!$result)
        {
            mysqli_error($connection);
        }

        header("Location: ../profile.php");
    }
?>  