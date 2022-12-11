<?php
    session_start();
    include("../api/connection.php");

    if(isset($_POST["edit-profile-submit"]))
    {
        $userID = $_SESSION["id"];

        $first_name = $_POST["first_name"];
        $middle_name = $_POST["middle_name"];
        $last_name = $_POST["last_name"];
        $date = $_POST["date"];
        $gender = $_POST["gender"];
        $mail = $_POST["mail"];
 
        // Query Processing

        mysqli_real_escape_string($connection, $first_name);
        mysqli_real_escape_string($connection, $middle_name);
        mysqli_real_escape_string($connection, $last_name);
        mysqli_real_escape_string($connection, $mail);

        $dob = new DateTime($date);
 
        $now = new DateTime();
            
        $diff = $now->diff($dob);
        $age = $diff->y;

        $query = "UPDATE user " . 
                "SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', " . 
                "dateOfBirth = '$date', gender = '$gender', age = $age " . 
                "WHERE id = $userID";

        $result = mysqli_query($connection, $query);

        if (!$result)
        {
            mysqli_error($connection);
        }

        header("Location: ../profile.php");
    }
?>  