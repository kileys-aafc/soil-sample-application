<head><title>Password Updated</title></head>
<?php include '../index.php'; include("../functions/redirect_homepage.php"); 
     
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
                <div class="col-8">
                    <h1>Password Updated Successfully!</h1>
                </div>
            </div>
        </div>    
        ';
    }}

    else{
        redirect_homepage();
    }
?>  
    
</div>
</body>