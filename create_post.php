<?php session_start(); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body style="background-color:#EEE2E2">
<?php include_once("navbar.php"); ?>
<?php include("api/connection.php"); ?>
<body>
<div style="padding:10px">
            <h2>Create Post</h2>
            <form class="mx-1 mx-md-4" method="post" action="form_process/create_post_process.php?eventID=<?php echo $_GET["id"]?>">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="text" class="form-control" required/>
                                            <label class="form-label">TEXT</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="photo" class="form-control"/>
                                            <label class="form-label">PHOTO</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="link" class="form-control"/>
                                            <label class="form-label">LINK</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" name="submit" class="btn btn-outline-danger" value="Create new">
                                    </div>

            </form>

        </div>
</body>