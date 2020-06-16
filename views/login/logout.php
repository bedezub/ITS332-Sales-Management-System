<?php 
    session_start();

    if(session_destroy()) {
        header("location: ../../views/login/login.php");
    }
?>