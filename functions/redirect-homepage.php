<?php
function redirect_homepage (){
    header("location:http://".$_SERVER['SERVER_NAME']."/index.php");
    }
?>