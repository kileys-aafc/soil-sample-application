<?php
    include("../functions/redirect_homepage.php");
    include("../functions/redirect_loginpage.php");

    session_start();
   
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
        redirect_loginpage();
        exit;
    }else{
        redirect_homepage();
    }
?>
