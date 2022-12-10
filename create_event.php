<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <body style="background-color:#EEE2E2">
        
        <!-- Header -->
        <?php include_once("navbar.php"); ?>

        

        <div style="padding:10px">
            <h2>Create Event</h2>
            <form class="mx-1 mx-md-4" method="post" action="form_process/register_process.php">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="first_name" class="form-control" required/>
                                            <label class="form-label">Event Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="middle_name" class="form-control"/>
                                            <label class="form-label">Location</label>
                                        </div>
                                    </div>

                                   

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="date" name="date" class="form-control" required/>
                                            <label class="form-label">Your Birth Date</label>
                                        </div>
                                    </div>

                                    

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="email" name="mail" class="form-control" required/>
                                        <label class="form-label">Description</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="password" name="password" class="form-control" required/>
                                        <label class="form-label">Restriction</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="password" name="repeat_password" class="form-control" required/>
                                        <label class="form-label">Image</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <a type="button" class="btn btn-outline-danger" href="register.php">Create new</a>
                                    </div>

                                </form>

        </div>
    </body>
</html>