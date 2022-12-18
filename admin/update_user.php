<?php session_start(); ?>
<?php include("../api/connection.php"); ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Edit User</h2>
                    <form action="update_user_process.php?id=<?php echo $_GET["id"]?>" method="post">
                        <?php 
                            $userID = $_GET["id"];

                            $query = "SELECT * FROM user WHERE id = $userID";
                            $result = mysqli_query($connection, $query);

                            $first_name = ""; $middle_name = ""; $last_name = "";
                            $birth_date = ""; $gender = ""; $mail = ""; $type = "";

                            while ($row = mysqli_fetch_assoc($result))
                            {
                                $first_name = $row["first_name"];
                                $middle_name = $row["middle_name"];
                                $last_name = $row["last_name"];
                                $birth_date = $row["dateOfBirth"];
                                $gender = $row["gender"];
                                $mail = $row["mail"];
                                $type = $row["type"];
                            }
                        ?>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value=<?php echo $first_name;?> required>
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="middle_name" class="form-control" value=<?php echo $middle_name;?>>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value=<?php echo $last_name;?> required>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline mb-1 w-50">
                                <label class="form-label">Date of Birth</label><br>
                                <input type="date" name="date" class="form-control" required/>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline mb-1 w-50">
                            <label class="form-label">Gender</label><br>
                                <input type="radio" name="gender" value="F" required <?php if ($gender == "F") { echo "checked"; }?>>Female
                                <input type="radio" name="gender" value="M" required <?php if ($gender == "M") { echo "checked"; }?>>Male <br>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline mb-1 w-50">
                            <label class="form-label">User Type</label><br>
                                <input type="radio" name="type" value="U" required <?php if ($type == "U") { echo "checked"; }?>>User
                                <input type="radio" name="type" value="A" required <?php if ($type == "A") { echo "checked"; }?>>Admin <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mail</label>
                            <input type="text" name="mail" class="form-control" required value=<?php echo $mail;?>>
                        </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="admin_page.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>