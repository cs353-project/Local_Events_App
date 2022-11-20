<?php
    session_start();
    include("../api/connection.php");

    if(isset($_POST["reg-submit"]))
    {
        $first_name = $_POST["first_name"];
        $middle_name = $_POST["middle_name"];
        $last_name = $_POST["last_name"];
        $date = $_POST["date"];
        $gender = $_POST["gender"];
        $mail = $_POST["mail"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];

        if($password != $repeat_password)
        {
            $_SESSION["reg-error"] = true;
            header("Location: ../register.php");
        }
        else
        {
            $_SESSION["reg-error"] = false;

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

            $query = "INSERT INTO User ( type, first_name, middle_name, last_name, dateOfBirth, age, gender, mail, password ) " . 
                    "VALUES ( 'U', '$first_name', '$middle_name', '$last_name', '$date', '$age', '$gender', '$mail', '$password' )";

            $result = mysqli_query($connection, $query);

            if (!$result)
            {
                mysqli_error();
            }

            unset($_SESSION["reg-error"]);
            header("Location: ../index.php");
        }
    }
?>  