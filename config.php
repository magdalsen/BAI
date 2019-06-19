<?php
 
    session_start();
    
    if (isset($_SESSION['user_id'])) {
        $user_id     = $_SESSION['user_id'];
        $user_name   = $_SESSION['user_name'];
        $user_email  = $_SESSION['user_email'];
        $user_rights = $_SESSION['user_rights'];
        $user_date   = $_SESSION['user_date'];
    }
 
?>