<?php session_start(); ?>
<?php include("../api/connection.php"); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
        .wrapper{
            width: 1000px;
            margin: 0 auto;
        }
    </style>    
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">User Details</h2>
                        <a href="create_user.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New User</a>
                    </div>
                    <?php
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM user";
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped w-auto">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Middle Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Age</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['first_name'] . "</td>";
                                        echo "<td>" . $row['middle_name'] . "</td>";
                                        echo "<td>" . $row['last_name'] . "</td>";
                                        echo "<td>" . $row['mail'] . "</td>";
                                        echo "<td>" . $row['age'] . "</td>";
                                        echo "<td>";
                                            
                                            echo '<a href="update_user.php?id='. $row['id'] .'" class="mr-3" title="Update User" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete_user.php?id='. $row['id'] .'" title="Delete User" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    ?>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Event Details</h2>
                    </div>
                    <?php
                
                    $sql = "SELECT * FROM event e " . 
                            "JOIN location l ON e.location_id = l.location_id " . 
                            "JOIN user u ON e.creator_id = u.id";
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped w-auto">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Title</th>";
                                        echo "<th>Creator</th>";
                                        echo "<th>Location</th>";
                                        // echo "<th>Type</th>";
                                        echo "<th>Registeration End Time</th>";
                                        echo "<th>Start Time</th>";
                                        echo "<th>End Time</th>";
                                        echo "<th>Current Capacity</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['event_id'] . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['first_name'] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] . "</td>";
                                        echo "<td>" . $row['address_city'] . ' ' . $row["address_street"] . ' ' . $row["address_building"] . "</td>";
                                        echo "<td>" . $row['registration_endtime'] . "</td>";
                                        echo "<td>" . $row['start_time'] . "</td>";
                                        echo "<td>" . $row['end_time'] . "</td>";
                                        echo "<td>" . $row['current_capacity'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="delete_event.php?id='. $row['event_id'] .'" title="Delete Event" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    ?>
                </div>
            </div>  
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">User Performance</h2>
                    </div>
                    <?php
                        $query = "SELECT u.first_name, u.middle_name, u.last_name, COUNT(event_id) as num_of_attend FROM user u " . 
                        "JOIN attend a ON u.id = a.user_id " . 
                        "GROUP BY u.first_name, u.middle_name, u.last_name";

                        $result = mysqli_query($connection, $query);
                        if(mysqli_num_rows($result) > 0)
                        {
                            echo '<table class="table table-bordered table-striped w-auto">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Name</th>";
                                        echo "<th>Event Count</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['first_name'] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] . "</td>";
                                        echo "<td>" . $row['num_of_attend'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                       
                            echo "</table>";
                        }
                        
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Monthly Based Popular Event</h2>
                    </div>
                    <form action="admin_page.php" method="post">
                        <div class="form-outline mb-4" style="width: 200;">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline mb-0 w-50">
                                <label for="type">Month</label>
                                <select name="month">
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div>
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg">
                        </div>
                    </form>
                    <?php
                        if (isset($_POST["submit"]))
                        {
                            $month = $_POST["month"];
                            
                            $query = "SELECT * FROM event WHERE current_capacity IN (SELECT MAX(current_capacity) FROM event WHERE MONTH(start_time) = $month)";
                            $result = mysqli_query($connection, $query);

                            
                            if(mysqli_num_rows($result) > 0)
                            {
                                echo '<table class="table table-bordered table-striped w-auto">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>ID</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Registeration End Time</th>";
                                            echo "<th>Start Time</th>";
                                            echo "<th>End Time</th>";
                                            echo "<th>Current Capacity</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        echo "<tr>";
                                            echo "<td>" . $row['event_id'] . "</td>";
                                            echo "<td>" . $row['title'] . "</td>";
                                            echo "<td>" . $row['registration_endtime'] . "</td>";
                                            echo "<td>" . $row['start_time'] . "</td>";
                                            echo "<td>" . $row['end_time'] . "</td>";
                                            echo "<td>" . $row['current_capacity'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                            } 
                            else
                            {
                                echo '<div class="alert alert-danger"><em>No events were found.</em></div>';
                            }
                        }
                    ?>
                </div>
            </div>
            <a class="btn btn-danger" href="../form_process/logout_process.php">Logout</a>

        </div>
    </div>
</body>





