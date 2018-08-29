<html>
    <?php
        include '../index.php';  
        include("../functions/check_admin.php");
        require '../dbConnect.php';
        check_admin($_SESSION['username']);
    ?>
 <head><title>Soil Sample Added</title></head> 
     <style>
#delete_user_result{
         font-size: 13pt;
        padding-left: 50px;
        line-height: 2.5; 
        width: 60%;
        float: left;
        border-bottom: 2pt solid #a9a633; 
        margin-left: 50px;
    }


     button{            
        background: #a9a033;
        padding:10px 24px;
        font-weight:600;
        width:300px;
        border-radius: 12px;
        border: 2pt solid #a9a633; 
        color:#373d38;
        margin: 10px;
        }
        
    
     </style>
  
    
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
                echo "Deleted</br>";
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