<?php
    session_start();
    include("../api/connection.php");

    if(isset($_POST["submit"]))
    {
        $first_name = $_POST["first_name"];
        $middle_name = $_POST["middle_name"];
        $last_name = $_POST["last_name"];
        $date = $_POST["date"];
        $gender = $_POST["gender"];
        $mail = $_POST["mail"];
        $password = $_POST["password"];
        $type = $_POST["type"];

        // Query Processing

        mysqli_real_escape_string($connection, $first_name);
        mysqli_real_escape_string($connection, $middle_name);
        mysqli_real_escape_string($connection, $last_name);
        mysqli_real_escape_string($connection, $mail);
        mysqli_real_escape_string($connection, $password);
        mysqli_real_escape_string($connection, $repeat_password);

        $password = password_hash($password, PASSWORD_DEFAULT);

        $dob = new DateTime($date);
 
        $now = new DateTime();
            
        $diff = $now->diff($dob);
        $age = $diff->y;

        $query = "INSERT INTO user ( type, first_name, middle_name, last_name, dateOfBirth, age, gender, mail, password ) " . 
                "VALUES ( '$type', '$first_name', '$middle_name', '$last_name', '$date', '$age', '$gender', '$mail', '$password' )";

        $result = mysqli_query($connection, $query);

        if (!$result)
        {
            mysqli_error($connection);
        }

        header("Location: admin_page.php");
    }
?>  