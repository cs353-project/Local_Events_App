<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

<body style="background-color:#EEE2E2">

    <body>
        <?php include_once("navbar.php"); ?>


        <div style="margin:10px">
            <div class="row">
                <div class="col-6">
                    <div style=" background-color: white;">
                        <h1>My Profile<h2>

                                <div class="row" style="margin:10px">
                                    <div class="col-4">
                                        <img style="margin:40px" src="musical-note.png" alt="Event Image" width="100" height="100">
                                    </div>

                                    <div class="col-8 ">
                                        <h4>Username: ....<h4>
                                                <h4>Username: ....<h4>
                                                        <h4>Username: ....<h4>
                                                                <h4>Username: ....<h4>
                                                                        <h4>Username: ....<h4>
                                    </div>

                                </div>

                                <a type="button" class="btn btn-outline-danger" href="edit_profile.php"
                                    style="margin:10px">Edit</a>
                    </div>



                </div>
                <div class="col-6">
                    <div style="width:600px; background-color: white;">
                        <h1>My Wallet<h2>

                                <div>
                                    <p>account balance</p>
                                </div>
                    </div>

                </div>

            </div>
            <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181">
            
            <div class="row">
                <h2>Upcoming Events</h2>

                <div style="display:flex;">
                    <div style="margin:10px; width:300px; background-color:white">
                        <h4>Name of the Event</h4>
                        <h4>Time of the Event</h4>
                        <h4>Location of the Event</h4>
                        <a type="button" class="btn btn-outline-danger" href="details.php?id=123"
                                    style="margin:10px">Details</a>
                    </div>
                    <div style="margin:10px; width:300px; background-color:white">
                        <h4>Name of the Event</h4>
                        <h4>Time of the Event</h4>
                        <h4>Location of the Event</h4>
                        <a type="button" class="btn btn-outline-danger" href="details.php?id=123"
                                    style="margin:10px">Details</a>
                    </div>
                </div>

                
            </div>
            <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181">
            <div class="row">
                <h2>Created Events</h2>

                <div style="display:flex;">
                    <div style="margin:10px; width:300px; background-color:white">
                        <h4>Name of the Event</h4>
                        <h4>Time of the Event</h4>
                        <h4>Location of the Event</h4>
                        <a type="button" class="btn btn-outline-danger" href="edit_event.php?id=event_id"
                                    style="margin:10px">Edit</a>
                    </div>
                    <div style="margin:10px; width:300px; background-color:white">
                        <h4>Name of the Event</h4>
                        <h4>Time of the Event</h4>
                        <h4>Location of the Event</h4>
                        <a type="button" class="btn btn-outline-danger" href="edit_event.php?id=event_id"
                                    style="margin:10px">Edit</a>
                    </div>
                </div>

                
            </div>

            <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181">
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

    </body>

</html>