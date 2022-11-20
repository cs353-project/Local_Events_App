<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <?php
        include("api/header.php");
        insert_head("Register");
    ?>
    <body>
        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                            <div class="col-md-10">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <?php
                                    if (isset($_SESSION["reg-error"]) && $_SESSION["reg-error"] == true)
                                    {
                                        //echo '<h5 style="color: red">Entered Passwords does not match!</h5>';
                                        echo '<script>alert("Entered Passwords does not match!")</script>';

                                        unset($_SESSION["reg-error"]);
                                    }
                                ?>

                                <form class="mx-1 mx-md-4" method="post" action="form_process/register_process.php">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="first_name" class="form-control" required/>
                                            <label class="form-label">Your First Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="middle_name" class="form-control"/>
                                            <label class="form-label">Your Middle Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="last_name" class="form-control" required/>
                                            <label class="form-label">Your Last Name</label>
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
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="radio" name="gender" value="F" required>Female
                                            <input type="radio" name="gender" value="M" required>Male <br>
                                            <label class="form-label">Your Gender</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="email" name="mail" class="form-control" required/>
                                        <label class="form-label">Your Email</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="password" name="password" class="form-control" required/>
                                        <label class="form-label">Password</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="password" name="repeat_password" class="form-control" required/>
                                        <label class="form-label">Repeat your password</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" name="reg-submit" value="Register" class="btn btn-primary btn-lg">
                                    </div>

                                </form>

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