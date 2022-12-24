<?php session_start(); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

<body>
    <?php include_once("navbar.php"); ?>
    <?php include("api/connection.php"); ?>


    <body>
        <?php include_once("navbar.php"); ?>
        <div style="margin:10px; padding:10px;background-color:white; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5));"
            class="row">
            <?php
            $eventID = $_GET['id'];
            $query = "SELECT * FROM event JOIN location ON event.location_id = location.location_id
                WHERE event_id =  $eventID";
            $result = mysqli_query($connection, $query);



            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h1>Details of ' . $row["title"] . '';
                echo '</h1>';
                echo '<div class="col-4">';
                echo '<img src="' . $row["image"] . '" alt="Event Image" width="400" height="400">';
            }

            echo '</div>';
            ?>
            <div class="col-8">
                <?php
                $eventID = $_GET['id'];
                $userID = $_SESSION['id'];
                $query = "SELECT * FROM event JOIN location ON event.location_id = location.location_id
                        WHERE event_id = $eventID";

                $ticket_price = 0;

                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<h2>' . $row["title"] . '</h2>';
                    echo '<h3>' . $row["start_time"] . '</h3>';
                    echo '<h3>' . $row["address_city"] . '</h3>';
                    echo '<h3>' . $row["address_street"] . '</h3>';
                    echo '<h3>' . $row["address_building"] . '</h3>';
                    echo '<h3>' . $row["type"] . '</h3>';
                    echo '<h3>' . $row["description"] . '</h3>';
                    $ticket_price = $row["ticket_price"];
                }
                ?>
                <?php
                $pass = "";
                $query = "SELECT * FROM restriction WHERE event_id = $eventID";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $pass = $row["pass_requirement"];
                }

                if ($pass == 'T') {
                    echo '<h4> Ticket Price: ' . $ticket_price . ' </h4>';
                    echo '<form method="post" action="form_process/purchase_ticket_process.php?id=' . $eventID . '">';

                    $query = "SELECT * FROM attend WHERE event_id = $eventID AND user_id = $userID";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) <= 0) {
                        echo '<input type="submit" name="ticket_submit" style="margin-right:10px" class="btn btn-outline-danger" value="Purchase Ticket">';
                    } else {
                        echo '<a type="button" class="btn btn-outline-danger" href="profile.php">You have a ticket </a>';
                    }

                    echo '</form>';
                } else {
                    $query = "SELECT * FROM attend WHERE event_id = $eventID AND user_id = $userID";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) <= 0) {
                        echo '<a type="button" style="margin-right:10px" class="btn btn-outline-danger" href="./form_process/join_process.php?id=' . $eventID . '">Join</a>';
                    } else {
                        echo '<a type="button" style="margin-right:10px" class="btn btn-outline-danger" href="">Disjoin</a>';
                    }
                }
                ?>

            </div>
        </div>
        <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181">
            <div style="padding-bottom:10px">
                <div style="margin:10px; background-color:white; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5));"
                    class="row">
                    <div style="display:flex">
                        <div class="mr-5">
                            <h1>Posts</h1>
                        </div>
                        <div class="mx-5 mt-2">
                            <a type="button" class="btn btn-outline-danger"
                                href="create_post.php?id=<?php echo $eventID ?>">Create Post</a>
                        </div>
                    </div>

                    <?php
                    $query = "SELECT * FROM `event-post` JOIN post ON `event-post`.post_id = post.post_id WHERE event_id = $eventID";

                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-4">
                            <img src="'.$row["photograph"].'" alt="Event Image" width="200" height="200">
                            <p>' . $row["text"] . '</p>';

                            $postID = $row["post_id"];

                            $count_like_query = "SELECT COUNT(*) AS count_like FROM `like` WHERE post_id = $postID";

                            $like_result = mysqli_query($connection, $count_like_query);
                            $count = 0;

                            if (mysqli_num_rows($result) > 0) {
                                while ($like_row = mysqli_fetch_assoc($like_result)) {
                                    $count = $like_row["count_like"];
                                }
                            }

                            echo '<p>' . $count . ' likes</p>';

                            $show_like_query = "SELECT * FROM `like` WHERE user_id = $userID AND post_id = $postID";
                            $show_result = mysqli_query($connection, $show_like_query);

                            if (mysqli_num_rows($show_result) <= 0)
                            {
                                echo '<a href="form_process/like_process.php?event_id=' . $eventID . '&post_id=' . $postID . '" class="btn btn-primary">Like</a>';
                            }
                            echo' </div>';
                        }
                    }               
                    ?>
            </div>
    </body>