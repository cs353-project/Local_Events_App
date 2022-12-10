<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <body style="background-color:#EEE2E2">
        
        <!-- Header -->
        <?php include_once("navbar.php"); ?>
        
        <div class="row" style="margin:10px">
            <form class="col-4" style="padding-top:5px;">
                <div style="width=100px; height=100px; background-color:white; margin-top:5px">
                <h2 style="padding:10px">Pick Categories</h2>
                    <div style="padding:10px">
                    <input type="checkbox" class="btn-check" name="all" autocomplete="off">
                    <label class="btn btn-outline-primary" for="all">All</label>
                    <input type="checkbox" class="btn-check" name="festival" autocomplete="off" >
                    <label class="btn btn-outline-primary" for="festival">Festival</label>
                    </div>

                    <div style="padding:10px">
                    <input type="checkbox" class="btn-check" id="music" autocomplete="off">
                    <label class="btn btn-outline-primary" for="music">Music</label>
                    <input type="checkbox" class="btn-check" id="sports" autocomplete="off">
                    <label class="btn btn-outline-primary" for="sports">Sports</label>
                    </div>

                    <div style="padding:10px">
                    <input type="checkbox" class="btn-check" id="workshop" autocomplete="off">
                    <label class="btn btn-outline-primary" for="workshop">Workshop</label>
                    <input type="checkbox" class="btn-check" id="art" autocomplete="off">
                    <label class="btn btn-outline-primary" for="art">Art</label>
                    </div>

                    <div style="padding:10px">
                    <input type="checkbox" class="btn-check" id="staged" autocomplete="off">
                    <label class="btn btn-outline-primary" for="staged">Staged</label>
                    <input type="checkbox" class="btn-check" id="informational" autocomplete="off">
                    <label class="btn btn-outline-primary" for="informational">Informational</label>
                    </div>

                </div>
                
                <div style="width=100px; height=100px; background-color:white; margin-top:5px">
                    <h2>Pick Price</h2>
                    <div style="display:flex">
                    <div class="d-flex flex-row align-items-center mb-4" >
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-20">
                                        <input type="number" name="min_price" placeholder="min" class="form-control" required/>
                                        </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4" >
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-20">
                                        <input type="number" name="max_price" placeholder="max" class="form-control" required/>
                                        </div>
                        </div>
                        </div>
                </div>
                    

                <div style="width=100px; height=100px; background-color:white; margin-top:5px">
                    <h2> Location </h2>
                    <div style="padding:10px">
                        <input type="radio" class="btn btn-outline-danger" name="location" value="near_me" style="width:100px; margin-right:10px" >Near Me
                        <input type="radio" class="btn btn-outline-danger" name="location" value="in_my_city" style="width:100px; margin-right:10px" >In My City <br>
                    </div>
                </div>

                <div style="width=100px; height=100px; background-color:white; margin-top:5px">
                    <h2>Age</h2>
                    <div style="display:flex">
                    <div class="d-flex flex-row align-items-center mb-4" >
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline mb-0 w-20">
                                    <input type="number" name="age" placeholder="min" class="form-control" required/>
                                    </div>
                    </div>
                    </div>
                </div>
                
                <div style="width=100px; height=100px; background-color:white; margin-top:5px">
                    <div class="d-flex flex-row align-items-center mb-4" >
                        <input type="submit" class="btn btn-outline-danger" name="search_event_submit" value="Search" style="width:1000px;">
                    </div>
                </div>    
            </form>

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
                        <img src="musical-note.jpg" alt="Event Image" width="300" height="200">
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