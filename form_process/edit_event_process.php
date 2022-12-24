<?php
    session_start();
    include("../api/connection.php");

    if(isset($_POST["edit-event"]))
    {
        $eventID = $_GET["eventID"];
        $query = "SELECT * FROM `event` WHERE event_id = $eventID;";
        $query2 = "SELECT * FROM `restriction` WHERE event_id = $eventID;";
        $result = mysqli_query($connection, $query);
        $result2 = mysqli_query($connection, $query2);
        while ($row = mysqli_fetch_assoc($result))
        {
            $location_id = $row["location_id"];
        }
        $query3 = "SELECT * FROM `location` WHERE location_id = $location_id;";
        $result3 = mysqli_query($connection, $query3);
        
        


        // Query Processing
        if(isset($_POST['title']) && !($_POST["title"] == "")) {
            $title = $_POST["title"];
            $query = "UPDATE event " . 
            "SET title = '$title'".
            "WHERE event_id = $eventID";
            $result3 = mysqli_query($connection, $query);
            if (!$result3)
            {
                mysqli_error($connection);
            }
        }
        if(isset($_POST['start_time']) && isset($_POST['end_time']) && isset($_POST['registration_endtime'])&&
         !($_POST["start_time"] == "") && !($_POST["end_time"] == "") && !($_POST["registration_endtime"] == "")) {
            $mindate = date("Y-m-d", strtotime("+3 weeks"));
            $mintime = date("h:i");
            $min = $mindate."T".$mintime;
            $maxdate = date("Y-m-d", strtotime("+3 years"));
            $maxtime = date("h:i");
            $max = $maxdate."T".$maxtime;
            $date = date('y-m-d h:i:s');
            $start_time = $_POST["start_time"];
            $end_time = $_POST["end_time"];
            $registration_endtime = $_POST["registration_endtime"];

            //start_time > end_time|| $registration_endtime > $start_time || $registration_endtime <= $date || $end_date > $max_date  
            if( $start_time >= $end_time  || $registration_endtime >= $start_time || $registration_endtime <= $min || $end_time > $max )
            {
                $_SESSION["time-error"] = true;
                header("Location: ../profile.php");
            }
            else{
                $_SESSION["time-error"] = false;
                $query = "UPDATE event " . 
                "SET start_time = '$start_time', end_time = '$end_time', registration_endtime = '$registration_endtime'".
                "WHERE event_id = $eventID";
                $result3 = mysqli_query($connection, $query);
                if (!$result3)
                {
                    mysqli_error($connection);
                }
            }
            
        }
        else{
            $_SESSION["time-error"] = false;
        }
        if(isset($_POST['description']) && !($_POST["description"] == "")) {
            $description = $_POST["description"];
            $query = "UPDATE event " . 
            "SET description = '$description'".
            "WHERE event_id = $eventID";
            $result3 = mysqli_query($connection, $query);
            if (!$result3)
            {
                mysqli_error($connection);
            }
        }
        if(isset($_POST['image']) && !($_POST["image"] == "")) {
            $image = $_POST["image"];
            $query = "UPDATE event " . 
            "SET image = '$image'".
            "WHERE event_id = $eventID";
            $result3 = mysqli_query($connection, $query);
            if (!$result3)
            {
                mysqli_error($connection);
            }
        }
        if(isset($_POST['type']) && !($_POST["type"] == "no_change")) {
            $type = $_POST["type"];
            $query = "UPDATE event " . 
            "SET type = '$type'".
            "WHERE event_id = $eventID";
            $result3 = mysqli_query($connection, $query);
            if (!$result3)
            {
                mysqli_error($connection);
            }
        }
        if(isset($_POST['address_street']) && !($_POST["address_street"] == "")) {
            $address_street = $_POST["address_street"];
            $query = "UPDATE location " . 
            "SET address_street = '$address_street'".
            "WHERE location_id = $location_id";
            $result3 = mysqli_query($connection, $query);
            if (!$result3)
            {
                mysqli_error($connection);
            }
        }
        if(isset($_POST['address_building']) && !($_POST["address_building"] == "")) {
            $address_building = $_POST["address_building"];
            $query = "UPDATE location " . 
            "SET address_building = '$address_building'".
            "WHERE location_id = $location_id";
            $result3 = mysqli_query($connection, $query);
            if (!$result3)
            {
                mysqli_error($connection);
            }
        }
        if(isset($_POST['online_address']) && !($_POST["online_address"] == "")) {
            $online_address = $_POST["online_address"];
            $query = "UPDATE location " . 
            "SET online_address = '$online_address'".
            "WHERE location_id = $location_id";
            $result3 = mysqli_query($connection, $query);
            if (!$result3)
            {
                mysqli_error($connection);
            }
        }
        if(isset($_POST['capacity_check']) && isset($_POST['capacity']) ) {
            $capacity = $_POST["capacity"];
            $query = "UPDATE restriction " . 
            "SET capacity = '$capacity'".
            "WHERE event_id = $eventID";
            $result3 = mysqli_query($connection, $query);
            if (!$result3)
            {
                mysqli_error($connection);
            }
        }
        if(isset($_POST['age_check']) && isset($_POST['age'])) {
            $age = $_POST["age"];
            $query = "UPDATE restriction " . 
            "SET age = '$age'".
            "WHERE event_id = $eventID";
            $result3 = mysqli_query($connection, $query);
            if (!$result3)
            {
                mysqli_error($connection);
            }
        }
        if(isset($_POST['gender_check']) && isset($_POST['gender']) ) {
            if($gender == "male"){
                $gender = "M";
            }
            else{
                $gender = "F";
            }
            $query = "UPDATE restriction " . 
            "SET gender = '$gender'".
            "WHERE event_id = $eventID";
            $result3 = mysqli_query($connection, $query);
            if (!$result3)
            {
                mysqli_error($connection);
            }
        }

        

       
        header("Location: ../profile.php");
    }
?>  