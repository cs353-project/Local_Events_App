<?php session_start(); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body style="background-color:#EEE2E2">
<?php include_once("navbar.php"); ?>
<?php include("api/connection.php"); ?>


<body>
    <?php include_once("navbar.php"); ?>
    <div style="margin:10px" class="row">
        <h1>Details of <?php echo $_GET['id']; ?></h1>
        <div class="col-4">
            <img src="musical-note.png" alt="Event Image" width="400" height="400">
        </div>
        <div class="col-8">
            <?php
                $eventID = $_GET['id'];
                $query = "SELECT * FROM event JOIN location ON event.location_id = location.location_id
                        WHERE event_id = $eventID";

                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result))
                {
                    echo '<h2>' . $row["title"] . '</h2>';
                    echo '<h3>' . $row["start_time"] . '</h3>';
                    echo '<h3>' . $row["address_city"] . '</h3>';
                    echo '<h3>' . $row["address_street"] . '</h3>';
                    echo '<h3>' . $row["address_building"] . '</h3>';
                    echo '<h3>' . $row["type"] . '</h3>';
                    echo '<h3>' . $row["description"] . '</h3>';
                }
            ?>
            <?php
                $pass = "";
                $query = "SELECT * FROM restriction WHERE event_id = $eventID";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result))
                {
                    $pass = $row["pass_requirement"];
                }

                if ($pass == 'T')
                {
                    echo '<a type="button" class="btn btn-outline-danger" href="search_event.php">Purchase Ticket</a>';
                }
                else{
                    echo '<a type="button" class="btn btn-outline-danger" href="join_event.php">Join</a>';
                }
            ?>
            
            <a type="button" class="btn btn-outline-danger" href="search_event.php">Add to my calendar</a>

        </div>
    </div>
    <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181"><div>
    <div style="margin:10px" class="row">
        <div style="display:flex"> 
            <div class="mr-5">
                <h1>Posts</h1>
            </div>
            <div class="mx-5 mt-2">
                <a type="button" class="btn btn-outline-danger" href="create_post.php?id=<?php echo $eventID?>">Create Post</a>   
            </div>
        </div>
        
        <?php
            $query = "SELECT * FROM `event-post` JOIN post ON `event-post`.post_id = post.post_id WHERE event_id = $eventID";

            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo '<div class="col-4">
                            <img src="musical-note.png" alt="Event Image" width="200" height="200">
                            <p>' . $row["text"] . '</p>';

                    $postID = $row["post_id"];
                    
                    $count_like_query = "SELECT COUNT(*) AS count_like FROM `like` WHERE post_id = $postID";
                    
                    $like_result = mysqli_query($connection, $count_like_query);
                    $count = 0;
                    
                    if (mysqli_num_rows($result) > 0)
                    {
                        while ($like_row = mysqli_fetch_assoc($like_result))
                        {
                            $count = $like_row["count_like"];
                        }
                    }
                    

                    echo '<p>' . $count .' likes</p></div>';
                }
            }
            
            
        ?>  
    </div>
</body>