<?php
session_start();

    // this makes sure the user is logged 
    if (!isset($_SESSION['is_valid_admin'])) {
       header("Location: ./admin.php" );
    }
?>
