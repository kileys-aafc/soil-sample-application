
<?php
/*---------------------------------------------------------------------------------------------------
This function check if the current user is an admin user
-----if it is an admin user, the admin pages can be opened on the address bar directly
-----if not, after the admin pages address is typed in, it automatically jump to home page
---------------------------------------------------------------------------------------------------*/
function check_admin (){
    if($_SESSION['admin'] ==0){
         header("location:http://".$_SERVER['SERVER_NAME']."/soil/connect/index.php");
    } 
}
    

?>