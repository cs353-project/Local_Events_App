<?php
    session_start();
    include("../api/connection.php");

    if(isset($_POST["log-submit"]))
    {   
        $_SESSION["log-error"] = false;

        $mail = $_POST["mail"];
        $password = $_POST["password"];

        mysqli_real_escape_string($connection, $mail);
        mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM User WHERE mail = '$mail'";

        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) == 1) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                if (password_verify($password, $row["password"]))
                {
                    //echo '<script>alert("Successfully Logined!")</script>';
                    $_SESSION["id"] = $row["id"];
                    header("Location: ../home_page.php");
                }
                else
                {
                    $_SESSION["log-error"] = true;
                    header("Location: ../index.php");
                }

            }
        }
        else
        {
            $_SESSION["log-error"] = true;
            header("Location: ../index.php");
        }

        
    }
?>