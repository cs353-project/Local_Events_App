<?php session_start(); ?>
<?php include("api/connection.php") ?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

<body style="background-color:#EEE2E2">

    <body>
        <?php include_once("navbar.php"); ?>
        <?php $userID = $_SESSION["id"]; ?>

        <div style="margin:10px">
            <div class="row">
                <div class="col-6">
                    <div style=" background-color: white;">
                        <h1>My Profile<h2>

                                <div class="row" style="margin:10px">
                                    <div class="col-4">
                                        <img style="margin:40px" src="musical-note.png" alt="Event Image" width="100" height="100">
                                    </div>

                                    <?php
                                        $query = "SELECT * FROM user WHERE id = $userID";
                                        $result = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            echo '<div class="col-8 ">
                                                    <h4>Name: ' . $row["first_name"] . ' ' . $row["middle_name"] . '<h4>
                                                    <h4>Last Name: ' . $row["last_name"] . '<h4>
                                                    <h4>Age: ' . $row["age"] . '<h4>
                                                    <h4>Mail: ' . $row["mail"] . '<h4>
                                                </div>';
                                        }
                                    ?>

                                </div>

                                <a type="button" class="btn btn-outline-danger" href="edit_profile.php"
                                    style="margin:10px">Edit</a>
                    </div>

                </div>
                <div class="col-6">
                    <div style="width:600px; background-color: white;">
                        <h1>My Wallets<h2>
                        <a href="./form_process/create_wallet_process.php" class="btn btn-primary" >Create Wallet</a>
                        
                        <?php
                            $query = "SELECT * FROM wallet WHERE user_id = $userID";
                            $result = mysqli_query($connection, $query);

                            if (mysqli_num_rows($result) <= 0)
                            {
                                echo '<p style="color: red">No wallet available!</p>';
                            }
                            else
                            {
                                while ($row = mysqli_fetch_assoc($result))
                                {   

                                    echo '<h4>' . $row["wallet_id"] . '</h4>';
                                    echo '<h4>' . $row["balance"] . '</h4>';
                                    
                                    echo '<a type="button" class="btn btn-outline-danger" href="add_balance.php?walletID= '. $row["wallet_id"] . ' " style="margin:10px">Edit</a>';
                                    
                                    
                                }
                            }
                        ?>
                    </div>

                </div>

            </div>
            <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181">
            
            <div class="row">
                <h2>Upcoming Events</h2>

                <div style="display:flex;">
                    <div style="margin:10px; width:300px; background-color:white">
                        <?php
                            $query = "SELECT * FROM attend a " . 
                                    "JOIN user u ON a.user_id = u.id " . 
                                    "JOIN event e ON a.event_id = e.event_id " .
                                    "JOIN location l ON e.location_id = l.location_id " . 
                                    "WHERE u.id = $userID " . 
                                    "AND e.status = 'active'";
                            
                            $result = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo '<h4>' . $row["title"] . '</h4>';
                                echo '<h4>' . $row["start_time"] . '</h4>';
                                echo '<h4>' . $row["address_city"] . ' ' . $row["address_street"] . '</h4>';
                                echo '<a type="button" class="btn btn-outline-danger" href="details.php?id=' . $row["event_id"] . '" style="margin:10px">Details</a>';
                            }
                        ?>
                    </div>
                </div>

                
            </div>
            <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181">
            <div class="row">
                <h2>Created Events</h2>

                <div style="display:flex;">
                    <div style="margin:10px; width:300px; background-color:white">
                    <?php
                        $query = "SELECT * FROM event JOIN location ON event.location_id = location.location_id " . 
                                "WHERE event.creator_id = $userID";
                
                        $result = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo '<h4>' . $row["title"] . '</h4>';
                            echo '<h4>' . $row["start_time"] . '</h4>';
                            echo '<h4>' . $row["address_city"] . ' ' . $row["address_street"] . '</h4>';
                            echo '<a type="button" class="btn btn-outline-danger" href="edit_event.php?id=' . $row["event_id"] . ' style="margin:10px">Edit</a>';
                        }
                    ?>
                    </div> 
                </div>
            </div>

            <!-- <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181">
            <div class="row">
                <h2>My Posts</h2>

                <div style="display:flex;">
                    <div style="margin:10px; width:300px; background-color:white">
                        <h4>Image of the post</h4>
                        <h4>String of the post</h4>
                        <h4>Rating ---</h4>
                        <a type="button" class="btn btn-outline-danger" href="edit_event.php?id=event_id"
                                    style="margin:10px">Remove</a>
                    </div>
                    <div style="margin:10px; width:300px; background-color:white">
                        <h4>Image of the post</h4>
                        <h4>String of the post</h4>
                        <h4>Rating ---</h4>
                        <a type="button" class="btn btn-outline-danger" href="edit_event.php?id=event_id"
                                    style="margin:10px">Remove</a>
                    </div>
                </div>

                
            </div>
            </div> -->

    </body>

</html>