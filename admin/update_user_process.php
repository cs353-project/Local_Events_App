<?php
    session_start();
    include("../api/connection.php");

    if (isset($_GET["id"]))
    {
        $userID = $_GET["id"];

        $first_name = $_POST["first_name"];
        $middle_name = $_POST["middle_name"];
        $last_name = $_POST["last_name"];
        $date = $_POST["date"];
        $gender = $_POST["gender"];
        $mail = $_POST["mail"];
        $type = $_POST["type"];

        $dob = new DateTime($date);
 
        $now = new DateTime();
            
        $diff = $now->diff($dob);
        $age = $diff->y;

        $query = "UPDATE user " . 
                "SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', " . 
                "dateOfBirth = '$date', gender = '$gender', age = $age, type = '$type' " . 
                "WHERE id = $userID";

        $result = mysqli_query($connection, $query);

        if (!$result)
        {
            mysqli_error($connection);
        }
    }

    header("Location: admin_page.php");
?>