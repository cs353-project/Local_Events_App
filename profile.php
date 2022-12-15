<?php session_start(); ?>
<?php include("api/connection.php") ?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

<body >

    <body>
        <?php include_once("navbar.php"); ?>
        <?php $userID = $_SESSION["id"]; ?>

        <div style="margin:10px">
            <div class="row">
                <div class="col-6">
                    <div style=" padding:10px;background-color: white; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5));">
                        <h2>My Profile<h2>

                                <div class="row" style="margin:10px">
                                    <div class="col-4">
                                        <img style="margin:10px; background-color:black; border-radius:75px;" src="musical-note.png" alt="Event Image" width="150" height="150">
                                    </div>

                                    <?php
                                        $query = "SELECT * FROM user WHERE id = $userID";
                                        $result = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            echo '<div class="col-8 " style="background-color:white; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5));>
                                                    <h4">Name: ' . $row["first_name"] . ' ' . $row["middle_name"] . '<h4>
                                                    <h4>Last Name: ' . $row["last_name"] . '<h4>
                                                    <h4>Age: ' . $row["age"] . '<h4>
                                                    <h4>Mail: ' . $row["mail"] . '<h4>
                                                    
                                                </div>';
                                        }
                                        
                                    ?>
                                   
                                </div>
                                <a type="button" class="btn btn-outline-danger" href="edit_profile.php"
                                        style="">Edit Profile</a>
                                
                    </div>

                </div>
                <div class="col-6">
                    <div style="padding:10px; background-color: white;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5));">
                        <h2>My Wallet<h2>
                        
                        
                        <?php
                            $query = "SELECT * FROM wallet WHERE user_id = $userID";
                            $result = mysqli_query($connection, $query);
                        echo '<div style="display:flex">';
                            if (mysqli_num_rows($result) <= 0)
                            {
                                echo '<p style="color: red">No wallet available!</p><br>';
                                echo '<a href="./form_process/create_wallet_process.php" class="btn btn-primary" >Create Wallet</a>';
                            }
                            else
                            {
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                echo '<div style="width:100px; background-color:white;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5)); margin:10px; padding:5px">';
                                    echo '<h4> Wallet ' . $row["wallet_id"] . '</h4>';
                                    echo '<h4 style="font-size:14px;"> Balance: ' . $row["balance"] . '</h4>';
                                    
                                    echo '<a type="button" class="btn btn-outline-danger" href="add_balance.php?id=' . $row["wallet_id"] . '"style="margin-left:3px;font-size:10px; font-weight:bold">Add Balance</a>';
                                echo '</div>';
                                    
                                }
                            }
                        echo '</div>';
                        ?>
                        
                    </div>
                            
                </div>
                            
            </div>
            <div style="margin-top:20px; height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181">
            
            <div class="row">
                <h2>Upcoming Events</h2>

                <div style="display:flex;">
                    
                        <?php
                            $query = "SELECT * FROM attend a  
                                    JOIN user u ON a.user_id = u.id  
                                    JOIN event e ON a.event_id = e.event_id
                                    JOIN location l ON e.location_id = l.location_id
                                    WHERE u.id = $userID
                                    ";
    
                                    
                            
                            $result = mysqli_query($connection, $query);
                            
                            while ($row = mysqli_fetch_assoc($result))
                            {
                            echo '<div style="margin:10px;  background-color:white; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5)); border-radius:5px; padding:10px">';
                                echo '<h4 style="font-size: 16px; font-weight:bold;  ">' . $row["title"] . '</h4>';
                                echo '<h4 style="font-size: 12px;color:red;">' . $row["start_time"] . '</h4>';
                                echo '<h4 style="font-size: 12px; color:gray;">' . $row["address_city"] . ' ' . $row["address_street"] . '</h4>';
                                echo '<a type="button" class="btn btn-outline-danger" href="details.php?id=' . $row["event_id"] . '" style="">Details</a>';
                            echo '</div>';
                            }
                            
                            
                        ?>
                    
                </div>

                
            </div>
            <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181">
            <div class="row">
                <h2>Created Events</h2>

                <div style="display:flex;">
                    
                    <?php
                        $query = "SELECT * FROM event JOIN location ON event.location_id = location.location_id " . 
                                "WHERE event.creator_id = $userID";
                
                        $result = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo '<div style="margin:10px; background-color:white; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5)); padding:10px; border-radius:5px">';
                            echo '<h4 style="font-size: 16px; font-weight:bold;  ">' . $row["title"] . '</h4>';
                            echo '<h4 style="font-size: 12px;color:red;">' . $row["start_time"] . '</h4>';
                            echo '<h4 style="font-size: 12px; color:gray;">' . $row["address_city"] . ' ' . $row["address_street"] . '</h4>';
                            echo '<a type="button" class="btn btn-outline-danger" href="edit_event.php?id=' . $row["event_id"] . '" style="">Edit</a>';
                            echo '</div>';
                        }
                    ?>
                    
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