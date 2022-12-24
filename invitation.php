<?php session_start(); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<?php include_once("navbar.php"); ?>
<?php include("api/connection.php"); ?>
<body>
<div style="padding:10px">
            <h2>Invite Friend</h2>
            <form class="mx-1 mx-md-4" method="post" action="invitation.php?id=<?php echo $_GET["id"];?>">

                <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline mb-1 w-50">
                        <input type="mail" name="mail" class="form-control" required/>
                        <label class="form-label">MAIL</label>
                    </div>
                </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" name="submit" class="btn btn-outline-danger" value="Invite">
                </div>

            </form>

        </div>
</body>

<?php
    if (isset($_POST["submit"])){
        $event_id = $_GET["id"];
        $user_id = $_SESSION["id"];
        @$mail = $_POST["mail"];
        
        $query = "SELECT * FROM user WHERE mail = '$mail'";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) <= 0){
            echo "<script>alert('No such user')</script>";
        } else {
            while ($row = mysqli_fetch_array($result)){
                $receiver_id = $row['id'];
            }

            $query = "SELECT * FROM restriction WHERE event_id = $event_id";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($result))
            {
                $res_capacity = $row['capacity'];
                $res_age = $row['age'];
                $res_gender = $row['gender'];
            }

            // User
            $query = "SELECT * FROM user WHERE id = $receiver_id";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result))
            {
                $user_age = $row["age"];
                $user_gender = $row["gender"];
            }

            // Event
            $event_capacity = 0;

            $query = "SELECT * FROM event WHERE event_id = $event_id";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result))
            {
                $event_capacity = $row["current_capacity"];
            }

            if( !is_null($res_age) && $user_age < $res_age )
            {
                echo "<script>alert('Receiver's age is not suitable for this event');
                window.location.href='profile.php';
                </script>";
            }
            else if( !is_null($res_gender) && $user_gender != $res_gender)
            {
                echo "<script>alert('Receiver's gender is not suitable for this event');
                window.location.href='profile.php';
                </script>";
            }
            else if( !is_null($res_capacity) && $event_capacity >= $res_capacity )
            {
                echo "<script>alert('Event is full');
                window.location.href='profile.php';
                </script>";
            }
            else
            {
                // event capacity update
                $event_capacity = $event_capacity + 1;
                $query = "UPDATE event SET current_capacity = $event_capacity WHERE event_id = $event_id";
                $result = mysqli_query($connection, $query);

                $now = date_create()->format('Y-m-d H:i:s');
                
                $query = "INSERT INTO `event-pass` (date) VALUES ('$now')";
                $result = mysqli_query($connection, $query);

                if (!$result)
                {
                    mysqli_error($connection);
                }

                $query = "SELECT * FROM `event-pass` ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result))
                {
                    $invitation_id = $row["id"];
                }

                $query = "INSERT INTO `invitation` (id) VALUES ($invitation_id)";
                $result = mysqli_query($connection, $query);

                if (!$result)
                {
                    mysqli_error($connection);
                }

                $query = "INSERT INTO `send` (sender_id, receiver_id, invitation_id) VALUES ($user_id, $receiver_id, $invitation_id)";
                $result = mysqli_query($connection, $query);

                if (!$result)
                {
                    mysqli_error($connection);
                }

                $query = "INSERT INTO `attend` (user_id, event_id, pass_id) VALUES ($receiver_id, $event_id, $invitation_id)";
                $result = mysqli_query($connection, $query);

                if (!$result)
                {
                    mysqli_error($connection);
                }
                
                header("Location: profile.php");
            }
        }
    }
?>