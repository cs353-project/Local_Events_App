<?php session_start(); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<?php include_once("navbar.php"); ?>
<?php include("api/connection.php"); ?>
<body>
<div style="padding:10px">
            <h2>Balance</h2>
            <form class="mx-1 mx-md-4" method="post" action="add_balance.php?id=<?php echo $_GET["id"]; ?>">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="number" max="9999999999999999" min="1000000000000000" name="card_number" class="form-control" required/>
                                            <label class="form-label">Card Number</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="text" name="name_surname" class="form-control" required/>
                                            <label class="form-label">Name Surname</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="month" name="expiration" class="form-control" required/>
                                            <label class="form-label">Expiratipon Date</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="number" max="999" min="100" name="cvv" class="form-control" required/>
                                            <label class="form-label">CVV</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline mb-1 w-50">
                                            <input type="number" step="0.01" min="0" name="balance" class="form-control" required/>
                                            <label class="form-label">Balance</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" name="balance_submit"  class="btn btn-outline-danger" value="Add Balance">
                                    </div>

            </form>

            <?php
                @$balance_add = $_POST["balance"];
                $wallet_id = $_GET['id'];
                
                $query = "SELECT balance FROM wallet WHERE wallet_id = $wallet_id";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);
                $balance = $row["balance"] + $balance_add;
                    
                $query2 = "UPDATE wallet SET balance = $balance WHERE wallet_id = $wallet_id";
                $result2 = mysqli_query($connection, $query2);

                if (!$result2)
                {
                    mysqli_error($connection);
                }
            ?>

        </div>
</body>