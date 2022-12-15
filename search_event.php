<?php session_start(); ?>
<?php include("api/connection.php"); ?>
<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

<body>

    <!-- Header -->
    <?php include_once("navbar.php"); ?>
    <?php
        $query2 = "SELECT * FROM event JOIN location ON event.location_id = location.location_id ";
        ?>


    <div class="row" style="margin:10px">
        <form class="col-3" style="padding-top:10px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5));" method="get"
            action="search_event.php">
            <div style="width=100px; height=100px; background-color:white; margin-top:10px">
                
                <h2 style="padding:10px;">Search</h2>
                <div style="padding:10px;">
                    <div class="form-outline mb-0 w-20">
                        <input type="input" name="keyword" placeholder="Event title" class="form-control" />
                    </div>
                </div>



            </div>

            <div style="width=100px; height=100px; background-color:white; margin-top:10px">

                <h2 style="padding:10px">Pick Categories</h2>
                <div style="padding:10px">
                    <input type="checkbox" class="btn-check" name="competition" id="competition" autocomplete="off">
                    <label class="btn btn-outline-primary" for="competition">Competition</label>
                    <input type="checkbox" class="btn-check" name="festival" id="festival" autocomplete="off">
                    <label class="btn btn-outline-primary" for="festival">Festival</label>
                </div>

                <div style="padding:10px">
                    <input type="checkbox" class="btn-check" name="music" id="music" autocomplete="off">
                    <label class="btn btn-outline-primary" for="music">Music</label>
                    <input type="checkbox" class="btn-check" name="sports" id="sports" autocomplete="off">
                    <label class="btn btn-outline-primary" for="sports">Sports</label>
                </div>

                <div style="padding:10px">
                    <input type="checkbox" class="btn-check" name="workshop" id="workshop" autocomplete="off">
                    <label class="btn btn-outline-primary" for="workshop">Workshop</label>
                    <input type="checkbox" class="btn-check" name="art" id="art" autocomplete="off">
                    <label class="btn btn-outline-primary" for="art">Art</label>
                </div>

                <div style="padding:10px">
                    <input type="checkbox" class="btn-check" name="staged" id="staged" autocomplete="off">
                    <label class="btn btn-outline-primary" for="staged">Staged</label>
                    <input type="checkbox" class="btn-check" name="informational" id="informational" autocomplete="off">
                    <label class="btn btn-outline-primary" for="informational">Informational</label>
                </div>

            </div>


            <div style="width=100px; height=100px; background-color:white; margin-top:10px; padding:10px; ">
                <h2>Pick Price</h2>
                <div style="display:flex; padding-right:10px">
                    <div class="d-flex flex-row  mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline mb-0 w-20">
                            <input type="number" name="min_price" placeholder="min" class="form-control" />
                        </div>
                    </div>
                    <div class="d-flex flex-row  mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline mb-0 w-20">
                            <input type="number" name="max_price" placeholder="max" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <div style="width=100px; height=100px; background-color:white; margin-top:10px; padding:10px">
                <h2> Location </h2>
                <div style="padding:10px">
                    <input type="radio" class="btn btn-outline-danger" name="location" value="near_me"
                        style="margin-right:10px">Near Me
                    <input type="radio" class="btn btn-outline-danger" name="location" value="in_my_city"
                        style="margin-right:10px; margin-left:40px">In My City <br>
                </div>
            </div>

            <div style="width=100px; height=100px; background-color:white; margin-top:10px; border-radius:5px">
                <div class="d-flex flex-row align-items-center mb-4">
                    <input type="submit" class="btn" name="search_event_submit" value="Search" style="width:1000px;">
                </div>
            </div>
        </form>

        <div class="col-9" style="background-color:white; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5)); margin-top:20px">
            <h2 style="padding:10px">Events</h2>

            <?php
                @$keyword = $_GET["keyword"];
                @$competition = $_GET["competition"];
                @$festival = $_GET["festival"];
                @$music = $_GET["music"];
                @$sports = $_GET["sports"];
                @$workshop = $_GET["workshop"];
                @$art = $_GET["art"];
                @$staged = $_GET["staged"];
                @$informational = $_GET["informational"];
                @$min_price = $_GET["min_price"];
                @$max_price = $_GET["max_price"];
                @$location = $_GET["location"];

                $count = 0;

                $result = mysqli_query($connection, $query2);
                $query = "SELECT * FROM event JOIN location ON event.location_id = location.location_id ";
                if ($competition == "on") {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE type = 'competition'";
                    }
                }

                if ($festival == "on") {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE type = 'festival'";
                    } else {
                        $query = $query . "OR type = 'festival'";
                    }
                }

                if ($music == "on") {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE type = 'music'";
                    } else {
                        $query = $query . "OR type = 'music'";
                    }
                }

                if ($sports == "on") {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE type = 'sports'";
                    } else {
                        $query = $query . "OR type = 'sports'";
                    }
                }

                if ($workshop == "on") {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE type = 'workshop'";
                    } else {
                        $query = $query . "OR type = 'workshop'";
                    }
                }

                if ($art == "on") {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE type = 'art'";
                    } else {
                        $query = $query . "OR type = 'art'";
                    }
                }

                if ($staged == "on") {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE type = 'staged'";
                    } else {
                        $query = $query . "OR type = 'staged'";
                    }
                }

                if ($informational == "on") {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE type = 'informational'";
                    } else {
                        $query = $query . "OR type = 'informational'";
                    }
                }

                if ($keyword != NULL) {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE title LIKE '%$keyword%'";
                    } else {
                        $query = $query . "AND title LIKE '%$keyword%'";
                    }
                }

                if ($min_price != NULL && $max_price != NULL && $min_price > $max_price){
                    echo '<script>alert("min price should be smaller than max price")</script>';
                }

                if ($min_price != NULL && $min_price <= $max_price) {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE ticket_price  >= $min_price";
                    } else {
                        $query = $query . "AND ticket_price  >= $min_price";
                    }
                }

                if ($max_price != NULL && $min_price <= $max_price) {
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE ticket_price  <= $max_price";
                    } else {
                        $query = $query . "AND ticket_price  <= $max_price";
                    }
                }

                if ($location == "near_me") {
                    $id = $_SESSION["id"];
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE address_street = (SELECT address_street FROM location WHERE location_id = (SELECT location_id FROM share WHERE user_id = '$id'))";
                    } else {
                        $query = $query . "AND address_street = (SELECT address_street FROM location WHERE location_id = (SELECT location_id FROM share WHERE user_id = '$id'))";
                    }
                }

                if ($location == "in_my_city") {
                    $id = $_SESSION["id"];
                    if ($count == 0) {
                        $count = 1;
                        $query = $query . "WHERE address_city = (SELECT address_city FROM location WHERE location_id = (SELECT location_id FROM share WHERE user_id = '$id'))";
                    } else {
                        $query = $query . "AND address_city = (SELECT address_city FROM location WHERE location_id = (SELECT location_id FROM share WHERE user_id = '$id'))";
                    }
                }

                $result = mysqli_query($connection, $query);
                $tmp = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($tmp % 3 == 0) {
                        echo '<div style="display:flex; padding:10px;">
                            <a href="details.php?id=' . $row["event_id"] . '" style="text-decoration: none; background-color: none; color:black">
                            <div style="height:300px; width:300px; background-color:white; margin-right:10px; border-radius:5px; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5));">
                                    <img src="'.$row["image"].'" alt="Event Image" width="300" height="200">
                                    <p style="font-size: 16px; font-weight:bold; margin-left:10px; ">' . $row["title"] . '</p>
                                    <p style="font-size: 12px;color:red;margin-left:10px">' . $row["start_time"] . '</p>
                                    <p style="font-size: 12px; color:gray;margin-left:10px">' . $row["address_city"] . ' ' . $row["address_street"] . '</p>
                                </div> </a>';
                    } else if ($tmp % 3 == 1) {
                        echo '<a href="details.php?id=' . $row["event_id"] . '" style="text-decoration: none; background-color: none; color:black">
                            <div style="height:300px; width:300px; background-color:white; margin-right:10px; border-radius:5px; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5));">
                                    <img src="'.$row["image"].'" alt="Event Image" width="300" height="200">
                                    <p style="font-size: 16px; font-weight:bold; margin-left:10px;">' . $row["title"] . '</p>
                                    <p style="font-size: 12px;color:red;margin-left:10px">' . $row["start_time"] . '</p>
                                    <p style="font-size: 12px; color:gray;margin-left:10px">' . $row["address_city"] . ' ' . $row["address_street"] . '</p>
                                  </div> </a>';
                    } else if ($tmp % 3 == 2) {
                        echo '<a href="details.php?id=' . $row["event_id"] . '" style="text-decoration: none; background-color: none; color:black">
                            <div style="height:300px; width:300px; background-color:white; margin-right:10px; border-radius:5px; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.5));">
                                    <img src="'.$row["image"].'" alt="Event Image" width="300" height="200">
                                    <p style="font-size: 16px; font-weight:bold; margin-left:10px; ">' . $row["title"] . '</p>
                                    <p style="font-size: 12px;color:red;margin-left:10px">' . $row["start_time"] . '</p>
                                    <p style="font-size: 12px; color:gray;margin-left:10px">' . $row["address_city"] . ' ' . $row["address_street"] . '</p>
                                </div> </a>
                                </div>';
                    }

                    $tmp = $tmp + 1;
                }
                ?>

        </div>

    </div>

</body>

</html>