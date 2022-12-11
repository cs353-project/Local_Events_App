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
        $current_capacity = 0;
        $type = $_POST["type"];

        
        if(isset($_POST['capacity_check'])) {
            $capacity = $_POST["capacity"];
        }
        else{
            $capacity = null;
        }
        if(isset($_POST['age_check'])) {
            $age = $_POST["age"];
        }
        else{
            $age = null;
        }
        if(isset($_POST['gender_check'])) {
            $gender = $_POST["gender"];
        }
        else{
            $gender = null;
        }
        if(isset($_POST['pass_requirement'])) {
            $pass_requirement = 't';
        }
        else{
            $pass_requirement = 'i';
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
            $postID = $row["location_id"];
        }

        $creator_id = $_SESSION["id"];
        $query1 = "INSERT INTO event (  location_id, title, creator_id, description, type, registration_endtime, start_time, end_time, status) " . 
        "VALUES ('$postID', '$title', '$creator_id', '$description', '$type', '$registration_endtime', '$start_time', '$end_time','active')";
        $result1 = mysqli_query($connection, $query1);
        if (!$result1)
        {
            mysqli_error();
        }   
        header("Location: ../home_page.php");

    }
?>