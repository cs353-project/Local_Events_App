<?php
    session_start();
    include("../api/connection.php");

    if(isset($_POST["all"]))
    {
        $query = "SELECT * FROM Event";

        $result = mysqli_query($connection, $query);

        header("Location: ../search_event.php");
    }

    if(isset($_POST["price_search"]))
    {
        $min_price = $_POST["min_price"];
        $max_price = $_POST["max_price"];

        if($min_price < $max_price)
        {
            $_SESSION["min_price"] = $min_price;
            $_SESSION["max_price"] = $max_price;

            $query = "SELECT id FROM Ticket WHERE price < '$max_price' AND price > '$min_price'";

            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) 
                {
                    $query2 = "SELECT event_id FROM attend WHERE pass_id = '$row["id"]'";

                    $result2 = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result2) > 0) 
                    {
                        while($row2 = mysqli_fetch_assoc($result2)) 
                        {

                        }
                    }
                }
            }
        
            header("Location: ../search_event.php");
        }
        else
        {
            echo '<script>alert("min should be smaller than max")</script>';
        }
    }

    if(isset($_POST["near_me"]))
    {
        $query = "SELECT * FROM Event WHERE type = 'festival'";

        $result = mysqli_query($connection, $query);
        
        header("Location: ../search_event.php");
    }

    if(isset($_POST["in_my_city"]))
    {
        $query = "SELECT * FROM Event WHERE type = 'festival'";

        $result = mysqli_query($connection, $query);
        
        header("Location: ../search_event.php");
    }
?>