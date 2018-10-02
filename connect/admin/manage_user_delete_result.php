<html>
    <?php
        include '../nav-template.php';  
        include("../functions/check_admin.php");
        require '../dbConnect.php';
        check_admin($_SESSION['username']);
    ?>
 <head><title>Soil Sample Added</title></head> 

  
    
    <body>
<?php   
        
        if (isset($_POST['delete_now'])){    
            $delete_username2=$_POST['delete_username'];
            echo  '<div id="delete_user_result">';
             $queryDelete ="
             DELETE FROM users WHERE username='$delete_username2'
             ";
            
            
            
           $responseDelete = @mysqli_query($dbc,$queryDelete);

            if($responseDelete){ 
                echo '<p class="h5 mt-4 text-center">User <strong>'.$delete_username2.'</strong> Deleted</p>
                <div class="row justify-content-center mt-4"><a href="/soil/connect/admin/manage_user.php"><button class="btn btn-primary" id="myButton" >Return</button></a>
                </div>';

              }else{
                echo "RESPONSE SHOW DELETE FAIL</br>
                ERROR: Could not issue database query</br>";
                echo mysqli_error($dbc)."</br>";
                }
            mysqli_close($dbc);
            echo '</div>';
        }
?>  
       </body>
</html>