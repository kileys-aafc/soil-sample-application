<!------------------logout page has info about how to logout from login session------------------------->
<?php
    session_start();
    if(session_destroy()){
        header("Location:login.php");
    }
?>