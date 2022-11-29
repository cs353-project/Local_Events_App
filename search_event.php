<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <body style="background-color:#EEE2E2">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; padding:10px">
            <div class="">Logo</div>

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

        <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181"><div>
        
        <div class="row" style="margin:10px">
            <div class="col-4" style="padding-top:10px;">
                <div style="width=100px; height=100px; background-color:white; margin-top:10px">
                    <h2 style="padding:10px">Pick Categories</h2>
                    <div style="padding:10px">
                        <a type="button" class="btn btn-outline-danger" href="search_event.php" style="width:100px; margin-right:10px">Search</a>
                        <a type="button" class="btn btn-outline-danger" href="search_event.php" style="width:100px">ss</a>
                    </div>

                    <div style="padding:10px">
                        <a type="button" class="btn btn-outline-danger" href="search_event.php" style="width:100px; margin-right:10px">Search</a>
                        <a type="button" class="btn btn-outline-danger" href="search_event.php" style="width:100px">ss</a>
                    </div>

                    <div style="padding:10px">
                        <a type="button" class="btn btn-outline-danger" href="search_event.php" style="width:100px; margin-right:10px">Search</a>
                        <a type="button" class="btn btn-outline-danger" href="search_event.php" style="width:100px">ss</a>
                    </div>

                    <div style="padding:10px">
                        <a type="button" class="btn btn-outline-danger" href="search_event.php" style="width:100px; margin-right:10px">Search</a>
                        <a type="button" class="btn btn-outline-danger" href="search_event.php" style="width:100px">ss</a>
                    </div>

                </div>
                
                <div style="width=100px; height=100px; background-color:white; margin-top:10px">
                    <h2>Pick Price</h2>
                    <div style="display:flex">
                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-20">
                                        <input type="email" name="mail" placeholder="min" class="form-control" required/>
                                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-20">
                                        <input type="email" name="mail" placeholder="max" class="form-control" required/>
                                        </div>
                    </div>
                    </div>

                </div>
                    

                <div style="width=100px; height=100px; background-color:white; margin-top:10px">
                    <h2> Location </h2>
                    <a type="button" class="btn btn-outline-danger" href="search_event.php" style="width:100px; margin-right:10px">Near Me</a>
                    <a type="button" class="btn btn-outline-danger" href="search_event.php" style="width:100px; margin-right:10px">In My City</a>
                    
                </div>

                <div style="width=100px; height=100px; background-color:white; margin-top:10px">More Parameters</div>
            </div>

            <div class="col-8">
                <h2>Events</h2>
                <div style="display:flex; padding:10px; justify-content:space-between;">
                    <div style="height:300px; width:300px; background-color: #555">
                        <img src="musical-note.png" alt="Event Image" width="300" height="200">
                        <p style="font-size: 14px;margin-left:10px">Classical Music</p>
                        <p style="font-size: 14px;margin-left:10px">Date</p>
                        <p style="font-size: 14px;margin-left:10px">Location</p>
                    </div>

                    <div style="height:300px; width:300px; background-color: #555">
                        <img src="musical-note.png" alt="Event Image" width="300" height="200">
                        <p style="font-size: 14px;margin-left:10px">Classical Music</p>
                        <p style="font-size: 14px;margin-left:10px">Date</p>
                        <p style="font-size: 14px;margin-left:10px">Location</p>
                    </div>

                    <div style="height:300px; width:300px; background-color: #555">
                        <img src="musical-note.png" alt="Event Image" width="300" height="200">
                        <p style="font-size: 14px;margin-left:10px">Classical Music</p>
                        <p style="font-size: 14px;margin-left:10px">Date</p>
                        <p style="font-size: 14px;margin-left:10px">Location</p>
                    </div>
                </div>
                <div style="display:flex; padding:10px; justify-content:space-between;">
                    <div style="height:300px; width:300px; background-color: #555">
                        <img src="musical-note.png" alt="Event Image" width="300" height="200">
                        <p style="font-size: 14px;margin-left:10px">Classical Music</p>
                        <p style="font-size: 14px;margin-left:10px">Date</p>
                        <p style="font-size: 14px;margin-left:10px">Location</p>
                    </div>

                    <div style="height:300px; width:300px; background-color: #555">
                        <img src="musical-note.png" alt="Event Image" width="300" height="200">
                        <p style="font-size: 14px;margin-left:10px">Classical Music</p>
                        <p style="font-size: 14px;margin-left:10px">Date</p>
                        <p style="font-size: 14px;margin-left:10px">Location</p>
                    </div>

                    <div style="height:300px; width:300px; background-color: #555">
                        <img src="musical-note.png" alt="Event Image" width="300" height="200">
                        <p style="font-size: 14px;margin-left:10px">Classical Music</p>
                        <p style="font-size: 14px;margin-left:10px">Date</p>
                        <p style="font-size: 14px;margin-left:10px">Location</p>
                    </div>
                </div>
                <div style="display:flex; padding:10px; justify-content:space-between;">
                    <div style="height:300px; width:300px; background-color: #555">
                        <img src="musical-note.png" alt="Event Image" width="300" height="200">
                        <p style="font-size: 14px;margin-left:10px">Classical Music</p>
                        <p style="font-size: 14px;margin-left:10px">Date</p>
                        <p style="font-size: 14px;margin-left:10px">Location</p>
                    </div>

                    <div style="height:300px; width:300px; background-color: #555">
                        <img src="musical-note.png" alt="Event Image" width="300" height="200">
                        <p style="font-size: 14px;margin-left:10px">Classical Music</p>
                        <p style="font-size: 14px;margin-left:10px">Date</p>
                        <p style="font-size: 14px;margin-left:10px">Location</p>
                    </div>

                    <div style="height:300px; width:300px; background-color: #555">
                        <img src="musical-note.png" alt="Event Image" width="300" height="200">
                        <p style="font-size: 14px;margin-left:10px">Classical Music</p>
                        <p style="font-size: 14px;margin-left:10px">Date</p>
                        <p style="font-size: 14px;margin-left:10px">Location</p>
                    </div>
                </div>
            </div>
            
        </div>

    </body>
</html>