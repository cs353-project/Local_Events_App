<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <?php
        include("api/header.php");
        insert_head("Main Page");
        
    ?>
    <body>
    <p>Please login to your account</p>

    <div class="">
        <a type="button" class="btn btn-outline-danger" href="profile.php">Profile</a>
    </div>

    <div class="">
        <a type="button" class="btn btn-outline-danger" href="create_event.php">Create Event</a>
    </div>

    <div class="">
        <a type="button" class="btn btn-outline-danger" href="search_event.php">Search Event</a>
    </div>

    <div class="">
        <a type="button" class="btn btn-outline-danger" href="logout_process.php">Log Out</a>
    </div>
    </body>
</html>