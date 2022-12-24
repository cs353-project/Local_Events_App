<?php
    session_start();
    include("../api/connection.php");

    if(isset($_POST["create-event"]))
    {   
        $title = $_POST["title"];
        if(!isset($_POST['online_check'])){
            $address_city =  $_POST["address_city"];
            $address_street =  $_POST["address_street"];
            $address_building =  $_POST["address_building"];
        }
        else{
            $address_city =  null;
            $address_street = null;
            $address_building =  null;

        }
        if(isset($_POST['online_check']) && isset($_POST['online_address']) ) {
            $online_address = $_POST["online_address"];
        }
        else{
            $online_address = null;
        }
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];
        $description = $_POST["description"];
        $registration_endtime = $_POST["registration_endtime"];
        $zero = 0;
        $type = $_POST["type"];
        $image = $_POST["image"];
        
        $mindate = date("Y-m-d");
        $mintime = date("h:i");
        $min = $mindate."T".$mintime;
        $maxdate = date("Y-m-d", strtotime("+3 years"));
        $maxtime = date("h:i");
        $max = $maxdate."T".$maxtime;
        $date = date('y-m-d h:i:s');
        //start_time > end_time|| $registration_endtime > $start_time || $registration_endtime <= $date || $end_date > $max_date  
        if( $start_time >= $end_time  || $registration_endtime >= $start_time || $registration_endtime <= $min || $end_time > $max )
        {
            $_SESSION["time-error"] = true;
            header("Location: ../create_event.php");
        }
        
        else{
            $_SESSION["time-error"] = false;
            
            
            mysqli_real_escape_string($connection, $title);
            mysqli_real_escape_string($connection, $address_city);
            mysqli_real_escape_string($connection, $address_street);
            mysqli_real_escape_string($connection, $address_building);
            mysqli_real_escape_string($connection, $description);
            $query2 = "INSERT INTO location ( address_city, address_street, address_building, online_address) " . 
            "VALUES ( '$address_city', '$address_street', '$address_building', '$online_address' )";
            $result2 = mysqli_query($connection, $query2);
            if (!$result2)
            {
                mysqli_error();
            }
            $location_id = "SELECT * FROM `location` ORDER BY location_id DESC LIMIT 1";
            $result4 = mysqli_query($connection, $location_id);
            while ($row = mysqli_fetch_assoc($result4))
            {
                $loc_id = $row["location_id"];
            }

            $creator_id = $_SESSION["id"];
            $query1 = "INSERT INTO event (  location_id, title, creator_id, description, type, registration_endtime, start_time, end_time, status, ticket_price, image) " . 
            "VALUES ('$loc_id', '$title', '$creator_id', '$description', '$type', '$registration_endtime', '$start_time', '$end_time','active',, '$image')";
            $result1 = mysqli_query($connection, $query1);
            if (!$result1)
            {
                mysqli_error();
            }   
            $event_id = "SELECT * FROM `event` ORDER BY event_id DESC LIMIT 1";
            $result5 = mysqli_query($connection, $event_id);
            while ($row = mysqli_fetch_assoc($result5))
            {
                $ev_id = $row["event_id"];
            }
            $query3 = "INSERT INTO restriction ( event_id, capacity, age, gender, pass_requirement) " . 
            "VALUES ( '$ev_id' , NULL, NULL, NULL, NULL)";

            $result3 = mysqli_query($connection, $query3);
            if (!$result3)
            {
                mysqli_error();
            }
            if(isset($_POST['capacity_check']) && isset($_POST['capacity']) ) {
                $capacity = $_POST["capacity"];
                $query = "UPDATE restriction " . 
                "SET capacity = '$capacity'".
                "WHERE event_id = $ev_id";
                $result3 = mysqli_query($connection, $query);
                if (!$result3)
                {
                    mysqli_error($connection);
                }
            }
            else{
                $capacity = null;
            }
            if(isset($_POST['age_check']) && isset($_POST['age'])) {
                $age = $_POST["age"];
                $query = "UPDATE restriction " . 
                "SET age = '$age'".
                "WHERE event_id = $ev_id";
                $result3 = mysqli_query($connection, $query);
                if (!$result3)
                {
                    mysqli_error($connection);
                }
            }
            else{
                $age = null;
            }
            if(isset($_POST['gender_check']) && isset($_POST['gender']) ) {
                if($gender == "male"){
                    $gender = "M";
                }
                else
                    $gender = "F";
                $query = "UPDATE restriction " . 
                "SET gender = '$gender'".
                "WHERE event_id = $ev_id";
                $result3 = mysqli_query($connection, $query);
                if (!$result3)
                {
                    mysqli_error($connection);
                }
            }
            else{
                $gender = null;
            }
            if(isset($_POST['pass_requirement'])) {
                $pass_requirement = "T";
                $query = "UPDATE restriction " . 
                "SET pass_requirement = '$pass_requirement'".
                "WHERE event_id = $ev_id";
                $result3 = mysqli_query($connection, $query);
                if (!$result3)
                {
                    mysqli_error($connection);
                }
            }
            else{
                $pass_requirement = "I";
                $query = "UPDATE restriction " . 
                "SET pass_requirement = '$pass_requirement'".
                "WHERE event_id = $ev_id";
                $result3 = mysqli_query($connection, $query);
                if (!$result3)
                {
                    mysqli_error($connection);
                }
            }
            if(isset($_POST['price']) && isset($_POST['pass_requirement'])) {
                $ticket_price = $_POST["price"];
                $query = "UPDATE restriction " . 
                "SET ticket_price = '$ticket_price'".
                "WHERE event_id = $ev_id";
                $result3 = mysqli_query($connection, $query);
                if (!$result3)
                {
                    mysqli_error($connection);
                }
            }
            else{
                $ticket_price = null;
            }
            header("Location: ../home_page.php?id=$eventID");
        }
    }
?>