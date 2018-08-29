<html>
   
<?php
    include '../index.php'; 
     include("../functions/redirect_homepage.php");
?>
<head><title>Update Sample</title></head>

<body>
    <div class="twoClm">        
    <div class="clm Info" id = "siteQuery">     
<?php   
      
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
            echo "Password Updated Successfully!</br>";
        }
    }
        else{
            redirect_homepage();
        }
?>  
        
    </div> 
     
    
</div>
</body> 

    
    
    
<style>
   
     
    }
     p{
        width:600;
        font-size: 13pt;
       
        
    }
   
    select[name=field]{
         height:28pt;
        
    }

    input[type = submit]{
        margin-top: 50px;
        padding:7px 18px;
         float: right;
    }
    
    
    .clm{
        float:left;
        padding:10px;
        height: 400px;
        
    }   
    
    .Info{
        width:30%;
    }
    
    .Label{
        width: 45%;
    }
    
    .twoClm:after{
       
        display: table;
        clear: both;
        
    }
    
    .twoClm{
        width: 80%;
        
        margin: 50px auto auto auto;
    }
    #labelPrint{
        
        background: #b9baaa;               
        border-radius: 30px;
    }
    
</style>   
</html>