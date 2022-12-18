<?php session_start(); ?>
<?php include("../api/connection.php"); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
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
                    // Include config file
                   
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM user";
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>first_name</th>";
                                        echo "<th>middle_name</th>";
                                        echo "<th>last_name</th>";
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
 
                    // Close connection
                    mysqli_close($connection);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>





