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

        while ($row = mysqli_fetch_assoc($result))
        {
            $title = $row["title"];
        }
        while ($row = mysqli_fetch_assoc($result))
        {
            $description = $row["description"];
        }
        while ($row = mysqli_fetch_assoc($result))
        {
            $type = $row["type"];
        }
        while ($row = mysqli_fetch_assoc($result))
        {
            $registration_endtime = $row["registration_endtime"];
        }
        while ($row = mysqli_fetch_assoc($result))
        {
            $start_time = $row["start_time"];
        }
        while ($row = mysqli_fetch_assoc($result))
        {
            $end_time = $row["end_time"];
        }
        while ($row = mysqli_fetch_assoc($result))
        {
            $current_capacity = $row["current_capacity"];
        }while ($row = mysqli_fetch_assoc($result))
        {
            $status = $row["status"];
        }
        while ($row = mysqli_fetch_assoc($result))
        {
            $rating = $row["rating"];
        }
        while ($row = mysqli_fetch_assoc($result))
        {
            $ticket_price = $row["ticket_price"];
        }
        while ($row = mysqli_fetch_assoc($result2))
        {
            $capacity = $row["capacity"];
        }
        while ($row = mysqli_fetch_assoc($result2))
        {
            $age = $row["age"];
        }
        while ($row = mysqli_fetch_assoc($result2))
        {
            $gender = $row["gender"];
        }
        while ($row = mysqli_fetch_assoc($result2))
        {
            $pass_requirement = $row["pass_requirement"];
        }
        while ($row = mysqli_fetch_assoc($result3))
        {
            $address_street = $row["address_street"];
        }
        while ($row = mysqli_fetch_assoc($result3))
        {
            $address_building = $row["address_building"];
        }
        while ($row = mysqli_fetch_assoc($result3))
        {
            $online_address = $row["title"];
        }
        


        if(isset($_POST['title']) && !($_POST["title"] == "no-change")) {
            $title = $_POST["title"];
        }
        // Query Processing
        if(isset($_POST['title']) && !($_POST["title"] == "no-change")) {
            $title = $_POST["title"];
        }
        if(isset($_POST['description']) && !($_POST["description"] == "no-change")) {
            $description = $_POST["description"];
        }
        if(isset($_POST['type']) && !($_POST["type"] == "no-change")) {
            $type = $_POST["type"];
        }
        if(isset($_POST['address_street']) && !($_POST["address_street"] == "no-change")) {
            $address_street = $_POST["address_street"];
        }
        if(isset($_POST['address_building']) && !($_POST["address_building"] == "no-change")) {
            $address_building = $_POST["address_building"];
        }
        if(isset($_POST['online_address']) && !($_POST["online_address"] == "no-change")) {
            $online_address = $_POST["online_address"];
        }
        if(isset($_POST['capacity_check']) && isset($_POST['capacity']) ) {
            $capacity = $_POST["capacity"];
        }
        if(isset($_POST['age_check']) && isset($_POST['age'])) {
            $age = $_POST["age"];
        }
        if(isset($_POST['gender_check']) && isset($_POST['gender']) ) {
            if($gender == "male"){
                $gender = "M";
            }
            else
                $gender = "F";
        }
        if(isset($_POST['pass_requirement'])) {
            $pass_requirement = "T";
        }
        if(isset($_POST['price']) && isset($_POST['pass_requirement'])) {
            $ticket_price = $_POST["price"];
        }

        $query = "UPDATE event " . 
                "SET title = '$title', description = '$description', type = '$type', " . 
                "ticket_price = '$ticket_price'" . 
                "WHERE event_id = $eventID";
        $result3 = mysqli_query($connection, $query);
        if (!$result3)
        {
            mysqli_error($connection);
        }
        $query = "UPDATE restriction " . 
                "SET capacity = '$capacity', age = '$age', gender = '$gender', " . 
                "pass_requirement = '$pass_requirement'" . 
                "WHERE event_id = $eventID";
        $result4 = mysqli_query($connection, $query);
        $query = "UPDATE location " . 
                "SET address_street = '$address_street', address_building = '$address_building', " . 
                "online_address = '$online_address'" . 
                "WHERE location_id = $location_id";
        header("Location: ../profile.php");
    }
?>  