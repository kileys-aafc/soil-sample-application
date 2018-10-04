<head><title>Password Updated</title></head>
<?php include '../nav-template.php'; include("../functions/redirect-homepage.php"); 
     
    if (isset($_POST['updatePassword'])){        
    
    $password=$_POST['password'];
    $username=$_SESSION['username'];
    require '../dbConnect.php';

    $queryChangePWD="         
    UPDATE users SET 
    password='$password'
    WHERE
    username='$username'
    ";      

    $responseChangePWD = @mysqli_query($dbc,$queryChangePWD);
    
    if($responseChangePWD){ 
        echo '
        <div class="container">
            <div class="row justify-content-center">                
                <p class="h2">Password Updated!</p>
            </div>    
            <div class="row justify-content-center mt-4">
            	<a href="../index.php"><button class="btn btn-primary">Back</button></a>
            </div>
        </div>';
    }}

    else{
        redirect_homepage();
    }
?>  
    
</div>
</body>