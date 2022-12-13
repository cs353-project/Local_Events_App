<?php
    session_start();
    include("../api/connection.php");

    if (isset($_POST["ticket_submit"]))
    {
        $userID = $_SESSION['id'];
        $eventID = $_GET['id'];

        // Restriction
        $res_capacity = 0;
        $res_age = 0;
        $res_gender = "";

        $query = "SELECT * FROM restriction WHERE event_id = $eventID";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($result))
        {
            $res_capacity = $row['capacity'];
            $res_age = $row['age'];
            $res_gender = $row['gender'];
        }

        // User
        $user_age = 0;
        $user_gender = "";

        $query = "SELECT * FROM user WHERE id = $userID";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result))
        {
            $user_age = $row["age"];
            $user_gender = $row["gender"];
        }

        // Event
        $event_capacity = 0;

        $query = "SELECT * FROM event WHERE event_id = $eventID";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result))
        {
            $event_capacity = $row["current_capacity"];
        }

        if( !is_null($res_age) && $user_age < $res_age )
        {

        }
        else if( !is_null($res_gender) && $user_gender != $res_gender)
        {

        }
        else if( !is_null($res_capacity) && $event_capacity >= $res_capacity )
        {
        
        }
        else
        {

            $amount = $_POST["amount"];

            $query = "SELECT * FROM wallet WHERE user_id = $userID";
            $result = mysqli_query($connection, $query);

            $wallet_id = 0;
            $balance = 0;

            while ($row = mysqli_fetch_assoc($result))
            {
                $wallet_id = $row["wallet_id"];
                $balance = $row["balance"];
            }

            $ticket_price = 0;

            $query = "SELECT * FROM event WHERE event_id = $eventID";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result))
            {
                $ticket_price = $row["ticket_price"];
            }

            if ( $amount * $ticket_price <= $balance)
            {
                $cost = $amount * $ticket_price;
                $balance = $balance - $cost;

                $query = "UPDATE wallet SET balance = $balance WHERE wallet_id = $wallet_id";
                $result = mysqli_query($connection, $query);

                if (!$result)
                {
                    mysqli_error($connection);
                }

                $now = new DateTime();
                
                $query = "INSERT INTO `event-pass` (date) VALUES ('$now')";
                $result = mysqli_query($connection, $query);

                if (!$result)
                {
                    mysqli_error($connection);
                }

                $passID = 0;
                $query = "SELECT * FROM `event-pass` ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result))
                {
                    $passID = $row["id"];
                }

                $query = "INSERT INTO attend (user_id, event_id, pass_id) " .
                "VALUES ($userID, $eventID, $passID)";
                $result = mysqli_query($connection, $query);

                if (!$result)
                {
                    mysqli_error($connection);
                }

                $query = "INSERT INTO ticket (user_id, event_id, pass_id) " .
                "VALUES ($userID, $eventID, $passID)";
                $result = mysqli_query($connection, $query);

                if (!$result)
                {
                    mysqli_error($connection);
                }


            }
            else
            {
                
            }







            
        }

        
    }
    else
    {
        echo "Error!";
    }
?>