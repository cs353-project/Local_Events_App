<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <?php
        include("api/header.php");
        insert_head("Login");
    ?>
    <body>
        <section class="h-100 gradient-form" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">

                            <div class="text-center">
                            <img src="images/EE_logo.png"
                                style="width: 185px;" alt="logo">
                            <h4 class="mt-1 mb-5 pb-1">Event Emitter</h4>
                            </div>

                            <?php
                                    if (isset($_SESSION["log-error"]) && $_SESSION["log-error"] == true)
                                    {
                                        //echo '<h5 style="color: red">Entered Passwords does not match!</h5>';
                                        echo '<script>alert("Wrong mail or password!")</script>';

                                        unset($_SESSION["log-error"]);
                                    }
                                ?>

                            <form method="post" action="form_process/login_process.php">
                                <p>Please login to your account</p>

                                <div class="form-outline mb-4">
                                    <input type="email" name="mail" class="form-control"/>
                                    <label class="form-label">E-Mail</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control" />
                                    <label class="form-label">Password</label>
                                </div>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <input type="submit" name="log-submit" value="Login" class="btn btn-primary btn-lg">
                                </div>

                                <div class="d-flex align-items-center justify-content-center pb-4">
                                    <p class="mb-0 me-2">Don't have an account?</p>
                                    <a type="button" class="btn btn-outline-danger" href="register.php">Create new</a>
                                    <a type="button" class="btn btn-outline-danger" href="admin_page.php">admin</a>
                                </div>
                            </form>

                        </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">It is time to experience Event Emitter!</h4>
                                <p class="small mb-0">EventEmitter is a web-based platform to create and join local events. 
                                    In order to join events, users can search events based on their current locations or any location, date,  popularity, rating of the event and also they can filter based on the organizer and category. 
                                    Users can also buy tickets for special events and send other users invitations. Both guests of the events and organizers can rate each other and these ratings are stored for each individual. 
                                    Organizers can create events with given specifications and organizers edit their events until the end of registration time.
                                </p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </body>
</html>