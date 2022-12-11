<?php
    session_start();
    include("../api/connection.php");

        

        $userID = $_SESSION['id'];
        
        
        // Event-Post
        $query = "INSERT INTO `wallet` (user_id, balance) " . 
                "VALUES ('$userID', 0)";
        $result = mysqli_query($connection, $query);

        if (!$result)
        {
            mysqli_error($connection);
        }

        

        header("Location: ../profile.php");
    
?>