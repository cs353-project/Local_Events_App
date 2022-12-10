<?php session_start(); ?>
<?php include("api/connection.php"); ?>
<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <body style="background-color:#EEE2E2">
        
        <!-- Header -->
        <?php include_once("navbar.php"); ?>
        <!-- Featured Events Part -->
        

        <div style="padding:10px; margin-left:20px; margin-right:20px">
            <h2>Popular Events<h2>
            <div style="display:flex; padding:10px">
                <?php
                    $query = "SELECT * FROM event JOIN location ON event.location_id = location.location_id " . 
                            "ORDER BY event.current_capacity DESC " . 
                            "LIMIT 4";
                    $result = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($result))
                    {
                    echo '
                            <a href="details.php?id=' . $row["event_id"] . '" style="text-decoration: none; background-color: none; color:black">
                                <div style="height:300px; width:300px; background-color: #555">
                                    <img src="musical-note.png" alt="Event Image" width="300" height="200">
                                    <p style="font-size: 14px;margin-left:10px">' . $row["title"] . '</p>
                                    <p style="font-size: 14px;margin-left:10px">' . $row["start_time"] . '</p>
                                    <p style="font-size: 14px;margin-left:10px">' . $row["address_city"] . ' ' . $row["address_street"] . '</p>
                                </div>
                            
                            </a>';
                    
                            
                            
                    }

                ?>  
                </div>
        </div>
    
        <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181"><div>

         <!-- All Events, List -->
        <div style="padding:10px; margin-left:20px; margin-right:20px;">
            <div style="display:flex">
                <h2 style="padding-right:10px">All Events<h2>
                <a type="button" class="btn btn-outline-danger" href="search_event.php">See More</a>
            </div>

            <div style="display:flex; padding:10px">
            
            <?php

                $query = "SELECT * FROM event JOIN location ON event.location_id = location.location_id LIMIT 7";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result))
                {
                    echo '
                    <a href="details.php?id=' . $row["event_id"] . '" style="text-decoration: none; background-color: none; color:black">
                        <div style="height:240px; width:180px; background-color: #555">
                            <img src="musical-note.png" alt="Event Image" width="180" height="100">
                            <p style="font-size: 14px; margin-left:10px">' . $row["title"] . '</p>
                            <p style="font-size: 14px; margin-left:10px">' . $row["start_time"] . '</p>
                            
                        </div>
                    </a>';
                    
                       
                        
                }
            ?>    
                
            </div>
        </div>

    </body>
</html> 