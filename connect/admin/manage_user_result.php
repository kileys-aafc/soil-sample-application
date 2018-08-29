<html>
<?php
    include '../index.php';  
    include("../functions/redirect_homepage.php");
    include("../functions/check_admin.php");
    require '../dbConnect.php';
    check_admin();
?>
    <head><title>Manage User Result</title></head>

 
    
   
 

<body>
    <div class="page-subtitle">
        <p class="big-1" style="width:100%;">Manage User Result</p>
    </div>
    <div class="page-main-content">   
        
        
     

    
<?php
    if(isset($_POST['add_user'])){
        echo'<div  id = "add_user_result">';
        $add_username=$_POST['add_username'];
        $add_password=$_POST['add_password'];
        $add_admin=$_POST['add_admin'];
                   
        $queryKey = "SELECT * FROM users WHERE username = '$add_username'";
        $responseKey = @mysqli_query($dbc,$queryKey);
        
        if($responseKey){
            if(mysqli_num_rows($responseKey)>0){  
                echo "Error! Record with Sample ID.<b>".$add_username."</b> already exist!";
            }else{
                $queryInsertBasic="INSERT INTO `users` (`username`,`password`, `admin`) VALUES (?,?,?)";
                $stmtInsertBasic = mysqli_prepare($dbc, $queryInsertBasic);                
                mysqli_stmt_bind_param($stmtInsertBasic,"ssi",$add_username,$add_password,$add_admin);               
                mysqli_stmt_execute($stmtInsertBasic);
                $affected_rows_Base=mysqli_stmt_affected_rows($stmtInsertBasic);                                
                if($affected_rows_Base==1){
                    echo"
                    <div class='sub-col left01'>
                    <b>New User Information</b></br>
                    <p class='align-left'>Username: </p>  
                    <p class='align-right'>".$add_username."</p>
                    </br>
                    <p class='align-left'>Temporary Password: </p>  
                    <p class='align-right'>".$add_password."</p>
                    </br>
                    <p class='align-left'>Admin? (1 as yes and 0 as no): 
                    </p><p class='align-right'>".$add_admin."</p>
                    </br>
                    </div>";            
                    mysqli_stmt_close($stmtInsertBasic);                   
                }else{
                    echo "error Occors. No users has been added.Please check the MySQL database.</br>";
                    echo mysqli_error();
                    }    
            }            
        }else{
            echo "no response";
        } 
        //mysqli_close($dbc);   
    echo'
        <button onclick="history.go(-1);" class="float-left submit-button" id="myButton" >Manage Users</button>
        </div>
    ';
    }
?>
    </div> 

   
        <form action="manage_user_delete_result.php" method="post">
    <?php
            if(isset($_POST['delete_user_submit'])){
                echo ' <div  id="delete_user_query">';
                $delete_username=$_POST['delete_username'];

                $queryDeleteUser = "SELECT * FROM users WHERE username ='$delete_username'";
                $response = @mysqli_query($dbc,$queryDeleteUser);
                if($response){
                    if(mysqli_num_rows($response)>0){
                        if ($row = mysqli_fetch_array($response)){  
                            echo '<input type ="hidden" name="delete_username"  value = "'.$delete_username.'" />';
                            echo"
                            <p class='align-left'>Username : </p>  
                            <p class='align-right'>".$row['username']."</p></br>
                            <p class='align-left'>Password :    </p>  
                            <p class='align-right'>".$row['password']."</p></br>
                            <p class='align-left'>Admin (1 as yes, 0 as no): </p>
                            <p class='align-right'>".$row['admin']."</p></br>
                            <p class='align-left'>User ID: </p> 
                            <p class='align-right'>".$row['user_id']."</p></br>
                            "; 

                            echo'<input type = "submit" name = "delete_now" value = "Yes, Delete this user"/>';
                        }
                    }else{
                        echo'
                        Username does not exist!
                        ';
                        echo mysqli_error($dbc)."</br>";
                    }
                }
                echo '</div>';
            }
            else{
            redirect_homepage();
        }
    ?>

        </form>
        
       
       
</body>
 <style>
  #add_user_result,#delete_user_query,#delete_user_result,#user_to_admin_result{
         font-size: 13pt;
        padding-left: 50px;
        line-height: 2.5; 
        width: 60%;
        float: left;
        border-bottom: 2pt solid #a9a633; 
        margin-left: 50px;
    }

    
   input[type = text], input[type = submit],select{
        height:28pt;
        width: 200px;
        float: right;
    }
       
    input[type = submit]{

        background: #a9a033;
        border-radius: 4px;
        border: 2pt solid #a9a633; 
        color:#373d38;
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
</html>