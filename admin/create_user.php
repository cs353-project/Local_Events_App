<?php session_start(); ?>
<?php include("../api/connection.php"); ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create User</h2>
                    <p>Enter User Details Here</p>
                    <form action="create_user_process.php" method="post">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="middle_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" required>
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
                                <input type="radio" name="gender" value="F" required>Female
                                <input type="radio" name="gender" value="M" required>Male <br>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline mb-1 w-50">
                            <label class="form-label">User Type</label><br>
                                <input type="radio" name="type" value="U" required>User
                                <input type="radio" name="type" value="A" required>Admin <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mail</label>
                            <input type="text" name="mail" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" required>
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