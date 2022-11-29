<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <body style="background-color:#EEE2E2">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; padding:10px">
            <div class="text-center">
                <img src="images/EE_logo.png"
                    style="width: 70px;" alt="logo">
            </div>

            <div style="list-style-type:none;display:flex; justify-content:flex-end; ">
                
                <div style="padding-right:20px">
                    <a type="button" class="btn btn-outline-danger" href="create_event.php">Create</a>
                </div>
                <div style="padding-right:20px">
                    <a type="button" class="btn btn-outline-danger" href="search_event.php">Search</a>
                </div>
                <div style="padding-right:10px">
                    <a type="button" class="btn btn-outline-danger" href="profile.php">Profile</a>
                </div>
            </div>

        </div>


        <!-- Featured Events Part -->
        <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181"><div>

        <div style="padding:10px; margin-left:20px; margin-right:20px">
            <h2>Featured<h2>
            <div style="justify-content:space-between; display:flex; padding:10px">
                <div style="height:300px; width:300px; background-color: #555">
                    <img src="musical-note.png" alt="Event Image" width="300" height="200">
                    <p style="font-size: 14px;margin-left:10px">Classical Music</p>
                    <p style="font-size: 14px;margin-left:10px">Date</p>
                    <p style="font-size: 14px;margin-left:10px">Location</p>
                </div>
                <div style="height:300px; width:300px; background-color: #555">

                </div>
                <div style="height:300px; width:300px; background-color: #555">

                </div>
                <div style="height:300px; width:300px; background-color: #555">

                </div>
            </div>
        </div>
    
        <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181"><div>

         <!-- All Events, List -->
        <div style="padding:10px; margin-left:20px; margin-right:20px">
            <div style="display:flex">
                <h2 style="padding-right:10px">Popular Events<h2>
                <a type="button" class="btn btn-outline-danger" href="search_event">See More</a>
            </div>
            
            
            <div style="justify-content:space-between; display:flex; padding:10px">
                <div style="height:240px; width:180px; background-color: #555">
                    <img src="musical-note.png" alt="Event Image" width="180" height="100">
                    <p style="font-size: 14px; margin-left:10px">Classical Music</p>
                    <p style="font-size: 14px; margin-left:10px">Date</p>
                    <a type="button" class="btn btn-outline-danger" href="create_event.php" style="margin-left:10px">Details</a>
                </div>

                
                
                
            </div>
        </div>

    </body>
</html>