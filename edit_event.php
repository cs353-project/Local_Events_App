<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <body style="background-color:#EEE2E2">
    <?php include_once("navbar.php"); ?>
    <?php
        include("api/header.php");
        insert_head("Edit Event");
    ?>
     

        <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181"><div>

        <div style="padding:10px">
            <h2>Edit Event</h2>
            <form class="mx-1 mx-md-4" method="post" action="form_process/edit_event_process.php?eventID=<?php echo $_GET["id"]?>">
                <?php
                                    $eventID = $_GET['id'];

                ?>                                           
                                    <label class="form-label">Fill the boxes with no-change for features that stay same</label>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="title" class="form-control" required/>
                                            <label class="form-label">Event Name</label>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_SESSION["time-error"]) && $_SESSION["time-error"] == true)
                                    {
                                        echo '<script>alert("Enter valid times!")</script>';

                                        unset($_SESSION["time-error"]);
                                    }
                                    ?>
                                     <?php
                                    if (isset($_SESSION["restriction-error"]) && $_SESSION["restriction-error"] == true)
                                    {
                                        echo '<script>alert("Enter valid restriction values!")</script>';

                                        unset($_SESSION["restriction-error"]);
                                    }
                                    ?>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="address_street" class="form-control"/>
                                            <label class="form-label">Street</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="address_building" class="form-control"/>
                                            <label class="form-label">Building</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="text" name="online_address" class="form-control" required/>
                                        <label class="form-label">Online link</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="text" name="description" class="form-control" required/>
                                        <label class="form-label">Description</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <label class="form-label">Delay times</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                            <input type="checkbox" id="one_hour" name="one_hour[]" value="one_hour">
                                            <label for="one_hour">One Hour</label><br>
                                            <input type="checkbox" id="one_day" name="one_day[]" value="one_day">
                                            <label for="one_day">One Day</label><br>
                                            <input type="checkbox" id="one_week" name="one_week[]" value="one_week">
                                            <label for="one_week">One Week</label><br>
                                        </div>
                                    </div>
                                

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <label class="form-label">Restrictions: Check the tickbox for the following restrictions you want to change and fill in the amount</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                            <input type="checkbox" id="capacity_check" name="capacity_check[]" value="capacity_check">
                                            <label for="capacity_check">Capacity</label><br>
                                            <input type="checkbox" id="age_check" name="age_check[]" value="age_check">
                                            <label for="age_check">Age</label><br>
                                            <input type="checkbox" id="gender_check" name="gender_check[]" value="gender_check">
                                            <label for="gender_check">Gender</label><br>
                                            <input type="checkbox" id="pass_check" name="pass_check[]" value="pass_check">
                                            <label for="pass_check">Pass Requirement</label><br>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="number" id="capacity" name="capacity" min="0" max="100000">
                                        <label class="form-label">Capacity Amount</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="number" id="age" name="age" min="3" max="21">
                                        <label class="form-label">Age Restriction Over(between 3 and 21)</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <label for="gender">Gender</label>
                                        <select id="gender" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="number" id="price" name="price" min="1" max="10000">
                                        <label class="form-label">Ticket Price</label>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <label for="type">Event_type</label>
                                        <select id="type" name="type">
                                        <option value="no_change">No Change</option>
                                        <option value="festival">Festival</option>
                                        <option value="music">Music</option>
                                        <option value="sports">Sports</option>
                                        <option value="workshop">Workshop</option>
                                        <option value="art">Art</option>
                                        <option value="staged">Staged</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" name="edit-event" value="Edit Event" class="btn btn-primary btn-lg" >
                                    </div>
                                    
                                </form>

        </div>
    </body>
</html>