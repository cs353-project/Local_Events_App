<?php session_start(); ?>
<?php include("api/connection.php"); ?>
<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <body style="background-color:#EEE2E2">
        
        <!-- Header -->
        <?php include_once("navbar.php"); ?>
        
        <div class="row" style="margin:10px">
            <form class="col-4" style="padding-top:10px;" method="post" action="search_event.php" >
                <div style="width=100px; height=100px; background-color:white; margin-top:10px">
                <h2 style="padding:10px">Pick Categories</h2>
                    <div style="padding:10px">
                    <input type="checkbox" class="btn-check" name="competition" id="competition" autocomplete="off">
                    <label class="btn btn-outline-primary" for="competition">Competition</label>
                    <input type="checkbox" class="btn-check" name="festival" id="festival" autocomplete="off" >
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
                
                <div style="width=100px; height=100px; background-color:white; margin-top:10px">
                    <h2>Pick Price</h2>
                    <div style="display:flex">
                    <div class="d-flex flex-row align-items-center mb-4" >
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-20">
                                        <input type="number" name="min_price" placeholder="min" class="form-control"/>
                                        </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4" >
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-20">
                                        <input type="number" name="max_price" placeholder="max" class="form-control"/>
                                        </div>
                        </div>
                        </div>
                </div>

                <div style="width=100px; height=100px; background-color:white; margin-top:10px">
                    <h2> Location </h2>
                    <div style="padding:10px">
                        <input type="radio" class="btn btn-outline-danger" name="location" value="near_me" style="width:100px; margin-right:10px" >Near Me
                        <input type="radio" class="btn btn-outline-danger" name="location" value="in_my_city" style="width:100px; margin-right:10px" >In My City <br>
                    </div>
                </div>
                
                <div style="width=100px; height=100px; background-color:white; margin-top:10px">
                    <div class="d-flex flex-row align-items-center mb-4" >
                        <input type="submit" class="btn btn-outline-danger" name="search_event_submit" value="Search" style="width:1000px;">
                    </div>
                </div>    
            </form>

            <div class="col-8">
                <h2>Events</h2>

                <?php
                if(isset($_POST["search_event_submit"]))
                {
                    @$competition = $_POST["competition"];
                    @$festival = $_POST["festival"];
                    @$music = $_POST["music"];
                    @$sports = $_POST["sports"];
                    @$workshop = $_POST["workshop"];
                    @$art = $_POST["art"];
                    @$staged = $_POST["staged"];
                    @$informational = $_POST["informational"];
                    @$min_price = $_POST["min_price"];
                    @$max_price = $_POST["max_price"];
                    @$location = $_POST["location"];

                    $count = 0;
                    $query = "SELECT * FROM event JOIN location ON event.location_id = location.location_id ";

                    if($competition == "on"){
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE type = 'competition'";
                        }
                    }

                    if($festival == "on"){
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE type = 'festival'";
                        } else {
                            $query = $query . "OR type = 'festival'";
                        }
                    }

                    if($music == "on"){
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE type = 'music'";
                        } else {
                            $query = $query . "OR type = 'music'";
                        }
                    }

                    if($sports == "on"){
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE type = 'sports'";
                        } else {
                            $query = $query . "OR type = 'sports'";
                        }
                    }

                    if($workshop == "on"){
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE type = 'workshop'";
                        } else {
                            $query = $query . "OR type = 'workshop'";
                        }
                    }

                    if($art == "on"){
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE type = 'art'";
                        } else {
                            $query = $query . "OR type = 'art'";
                        }
                    }

                    if($staged == "on"){
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE type = 'staged'";
                        } else {
                            $query = $query . "OR type = 'staged'";
                        }
                    }

                    if($informational == "on"){
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE type = 'informational'";
                        } else {
                            $query = $query . "OR type = 'informational'";
                        }
                    }
                    
                    if($min_price != NULL){
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE event_id IN (SELECT event_id FROM attend WHERE pass_id IN (SELECT id FROM ticket WHERE price >= $min_price))";
                        } else {
                            $query = $query . "AND event_id IN (SELECT event_id FROM attend WHERE pass_id IN (SELECT id FROM ticket WHERE price >= $min_price))";
                        }
                    }

                    if($max_price != NULL){
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE event_id IN (SELECT event_id FROM attend WHERE pass_id IN (SELECT id FROM ticket WHERE price <= $max_price))";
                        } else {
                            $query = $query . "AND event_id IN (SELECT event_id FROM attend WHERE pass_id IN (SELECT id FROM ticket WHERE price <= $max_price))";
                        }
                    }

                    if($location == "near_me"){
                        $id = $_SESSION["id"];
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE address_street = (SELECT address_street FROM location WHERE location_id = (SELECT location_id FROM share WHERE user_id = '$id'))";
                        } else {
                            $query = $query . "AND address_street = (SELECT address_street FROM location WHERE location_id = (SELECT location_id FROM share WHERE user_id = '$id'))";
                        }
                    }

                    if($location == "in_my_city"){
                        $id = $_SESSION["id"];
                        if($count == 0){
                            $count = 1;
                            $query = $query . "WHERE address_city = (SELECT address_city FROM location WHERE location_id = (SELECT location_id FROM share WHERE user_id = '$id'))";
                        } else {
                            $query = $query . "AND address_city = (SELECT address_city FROM location WHERE location_id = (SELECT location_id FROM share WHERE user_id = '$id'))";
                        }
                    }

                    $result = mysqli_query($connection, $query);
                    $tmp = 0;

                    while ($row = mysqli_fetch_assoc($result))
                    {
                        if($tmp % 3 == 0)
                        {
                            echo "1";
                            echo '<div style="display:flex; padding:10px; justify-content:space-between;">
                                    <div style="height:300px; width:300px; background-color: #555">
                                    <img src="musical-note.png" alt="Event Image" width="300" height="200">
                                    <p style="font-size: 14px;margin-left:10px">' . $row["title"] . '</p>
                                    <p style="font-size: 14px;margin-left:10px">' . $row["start_time"] . '</p>
                                    <p style="font-size: 14px;margin-left:10px">' . $row["address_city"] . ' ' . $row["address_street"] . '</p>
                                </div>';
                        } else if ($tmp % 3 == 1)
                        {
                            echo "2";
                            echo '<div style="height:300px; width:300px; background-color: #555">
                                    <img src="musical-note.png" alt="Event Image" width="300" height="200">
                                    <p style="font-size: 14px;margin-left:10px">' . $row["title"] . '</p>
                                    <p style="font-size: 14px;margin-left:10px">' . $row["start_time"] . '</p>
                                    <p style="font-size: 14px;margin-left:10px">' . $row["address_city"] . ' ' . $row["address_street"] . '</p>
                                  </div>';
                        } else if ($tmp % 3 == 2)
                        {
                            echo "3";
                            echo '<div style="height:300px; width:300px; background-color: #555">
                                    <img src="musical-note.png" alt="Event Image" width="300" height="200">
                                    <p style="font-size: 14px;margin-left:10px">' . $row["title"] . '</p>
                                    <p style="font-size: 14px;margin-left:10px">' . $row["start_time"] . '</p>
                                    <p style="font-size: 14px;margin-left:10px">' . $row["address_city"] . ' ' . $row["address_street"] . '</p>
                                </div>
                                </div>';
                        }

                        $tmp = $tmp + 1;
                    }
                }
                ?>  

            </div>
            
        </div>

    </body>
</html>