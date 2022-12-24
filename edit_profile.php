<?php session_start(); ?>
<?php include("api/connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <?php
        include("api/header.php");
        insert_head("Edit profile");
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

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Profile</p>

                                <form class="mx-1 mx-md-4" method="post" action="form_process/edit_profile_process.php">
                                    <?php 
                                        $userID = $_SESSION["id"];

                                        $query = "SELECT * FROM user WHERE id = $userID";
                                        $result = mysqli_query($connection, $query);

                                        $first_name = ""; $middle_name = ""; $last_name = "";
                                        $gender = ""; $mail = "";

                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            $first_name = $row["first_name"];
                                            $middle_name = $row["middle_name"];
                                            $last_name = $row["last_name"];
                                            $gender = $row["gender"];
                                            $mail = $row["mail"];
                                        }
                                    ?>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="first_name" class="form-control" value=<?php echo $first_name ?> required/>
                                            <label class="form-label">Your First Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="middle_name" class="form-control" value=<?php echo $middle_name ?>/>
                                            <label class="form-label">Your Middle Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="last_name" class="form-control" value=<?php echo $last_name ?> required/>
                                            <label class="form-label">Your Last Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="radio" name="gender" value="F" required <?php if ($gender == "F") { echo "checked"; }?>>Female
                                            <input type="radio" name="gender" value="M" required <?php if ($gender == "M") { echo "checked"; }?>>Male <br>
                                            <label class="form-label">Your Gender</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-0 w-50">
                                        <input type="email" name="mail" class="form-control" value=<?php echo $mail ?> required/>
                                        <label class="form-label">Your Email</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" name="edit-profile-submit" value="Edit" class="btn btn-primary btn-lg">
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