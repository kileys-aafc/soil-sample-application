<head><title>Sample Deleted</title></head>
   
<?php
    include '../nav-template.php';  
    include("../functions/redirect-homepage.php");
    include("../functions/check-admin.php");
    require '../dbConnect.php';
    check_admin();
?>
     
<?php   
        
    if (isset($_POST['updateNow'])){        
        $sample_id=$_POST['sample_id'];
    
            $queryDelete ="
        DELETE FROM sample WHERE sample_id='$sample_id'
        ;";
        
        $queryDelete .="
        DELETE FROM physical WHERE SMPL_ID='$sample_id'
        ;";
        
        $queryDelete .="
        DELETE FROM chemical WHERE SMPL_ID='$sample_id'
        ;";
        
        $queryDelete .="
        DELETE FROM biome WHERE SMPL_ID='$sample_id'
        ;";
        
        $queryDelete .="
        DELETE FROM spectral WHERE SMPL_ID='$sample_id'
        ;";
        
        
        $responseDelete = @mysqli_multi_query($dbc,$queryDelete);

        if($responseDelete){ 
            echo '
            <div class="container">
                <div class="row justify-content-center">
                    <p class="lead">Sample <strong>'.$sample_id.'</strong> Deleted</p>
                </div>
                
            ';
            }else{
            echo "RESPONSE SHOW DELETE FAIL</br>
            ERROR: Could not issue database query</br>";
            echo mysqli_error($dbc)."</br>";
            }            mysqli_close($dbc);  
    }
    else{
        redirect_homepage();
    }
?>  
<div class="row justify-content-center">     
    <button onclick="history.go(-2);" class="btn btn-primary">Back</button>
</div>
</body>   
</html>