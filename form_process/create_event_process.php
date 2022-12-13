<?php
    session_start();
    include("../api/connection.php");

    if(isset($_POST["create-event"]))
    {   
        $title = $_POST["title"];
        $address_city =  $_POST["address_city"];
        $address_street =  $_POST["address_street"];
        $address_building =  $_POST["address_building"];
        $online_address = $_POST["online_address"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];
        $description = $_POST["description"];
        $registration_endtime = $_POST["registration_endtime"];
        $zero = 0;
        $type = $_POST["type"];
        if(isset($_POST['capacity_check']) && isset($_POST['capacity']) ) {
            $capacity = $_POST["capacity"];
        }
        else{
            $capacity = null;
        }
        if(isset($_POST['age_check']) && isset($_POST['age'])) {
            $age = $_POST["age"];
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
        }
        else{
            $gender = null;
        }
        if(isset($_POST['pass_requirement'])) {
            $pass_requirement = 'T';
        }
        else{
            $pass_requirement = 'I';
        }
        if(isset($_POST['price'])) {
            $price = $_POST["price"];
        }
        else{
            $price = null;
        }
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
        else if((isset($_POST['capacity']) && $capacity <= $zero) || ( isset($_POST['price']) && $price <= $zero)){
            $_SESSION["restriction-error"] = true;
            header("Location: ../create_event.php");
        }
        else{
            $_SESSION["time-error"] = false;
            $_SESSION["restriction-error"] = false;
            
            if( $start_time > $end_time || (isset($_POST['capacity']) && $capacity <= $zero) || ( isset($_POST['price']) && $price <= $zero) ){              
                header("Location: ../create_event.php");
            }
            mysqli_real_escape_string($connection, $title);
            mysqli_real_escape_string($connection, $address_city);
            mysqli_real_escape_string($connection, $address_street);
            mysqli_real_escape_string($connection, $address_building);
            mysqli_real_escape_string($connection, $capacity);
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
            $query1 = "INSERT INTO event (  location_id, title, creator_id, description, type, registration_endtime, start_time, end_time, status, price) " . 
            "VALUES ('$loc_id', '$title', '$creator_id', '$description', '$type', '$registration_endtime', '$start_time', '$end_time','active','$price')";
            $result1 = mysqli_query($connection, $query1);
            if (!$result1)
            {
                mysqli_error();
            }   
            $event_id = "SELECT * FROM `event` ORDER BY event_id DESC LIMIT 1";
            $result5 = mysqli_query($connection, $event_id);
            while ($row = mysqli_fetch_assoc($result5))
            {
                $ev_id = $row["location_id"];
            }
            $query3 = "INSERT INTO restriction ( event_id, capacity, age, gender, pass_requirement) " . 
            "VALUES ( '$ev_id' ,'$capacity', '$age', '$gender', '$pass_requirement')";

            $result3 = mysqli_query($connection, $query3);
            if (!$result3)
            {
                mysqli_error();
            }
            header("Location: ../home_page.php?id=$eventID");
        }
    }
?>