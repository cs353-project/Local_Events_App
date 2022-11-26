<?php 
session_start();

session_unset();
session_destroy();
mysqli_close($connection);

header("Location: ../create_event.php");

?>