<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <?php
        include("api/header.php");
        insert_head("Main Page");
        echo $_SESSION["id"];
    ?>
    <body>
    <p>Profile</p>

    <div class="">
        <a type="button" class="btn btn-outline-danger" href="home_page.php">Back</a>
    </div>
    </body>
</html>