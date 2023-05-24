<?php 
    session_start();
    session_unset(); 
    session_destroy();
    header("location:../register_login/login.php");
    exit(); 