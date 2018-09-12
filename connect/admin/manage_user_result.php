<head><title>User Created</title></head>
<?php
    include '../index.php';  
    //include("../functions/redirect_homepage.php");
    include("../functions/check_admin.php");
    require '../dbConnect.php';
    check_admin();
?>
<div class="container">
    <p class="display-4 text-center mb-5">Manage Users</p>
    <div class="row justify-content-center">
        <div class="col-sm-4 my-2">

<?php
    if(isset($_POST['add_user'])){
        echo'<div id="add_user_result">';
        $add_username=$_POST['add_username'];
        $add_password=$_POST['add_password'];
        $add_admin=$_POST['add_admin'];
                   
        $queryKey = "SELECT * FROM users WHERE username = '$add_username'";
        $responseKey = @mysqli_query($dbc,$queryKey);
        
        if($responseKey){
            if(mysqli_num_rows($responseKey)>0){  
                echo '<p class="text-center py-2"><strong class="text-danger">Error!</strong> Username <strong>'.$add_username.'</strong> already exist!</p>';
            }else{
                $queryInsertBasic="INSERT INTO `users` (`username`,`password`, `admin`) VALUES (?,?,?)";
                $stmtInsertBasic = mysqli_prepare($dbc, $queryInsertBasic);                
                mysqli_stmt_bind_param($stmtInsertBasic,"ssi",$add_username,$add_password,$add_admin);               
                mysqli_stmt_execute($stmtInsertBasic);
                $affected_rows_Base=mysqli_stmt_affected_rows($stmtInsertBasic);                                
                if($affected_rows_Base==1){
                                       
                    echo'   <p class="lead">New User Information</p>
                            <table class="table table-secondary table-striped table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <th>Username</th>
                                        <td>'.$add_username.'</td>
                                    </tr>
                                    <tr>
                                        <th>Temporary Password</th>
                                        <td>'.$add_password.'</td>
                                    </tr>
                                    <tr>
                                        <th>Admin?</th>
                                        <td>'.$add_admin.'</td>
                                    </tr>                                    
                                </tbody>
                            </table>';

                    mysqli_stmt_close($stmtInsertBasic);                   
                }else{
                    echo "ERROR! No users have been added. Please check the MySQL database.</br>";
                    echo mysqli_error();
                    }    
            }            
        }else{
            echo "no response";
        } 
        //mysqli_close($dbc);   
    echo'
        </div>
        <div class="row justify-content-center py-2"><button onclick="history.go(-1);" class="btn btn-primary" id="myButton" >Return</button>
        </div></div></div>
    ';
    }
?>
     

   
        <form action="manage_user_delete_result.php" method="post">
    <?php
            if(isset($_POST['delete_user_submit'])){
                
                $delete_username=$_POST['delete_username'];

                $queryDeleteUser = "SELECT * FROM users WHERE username ='$delete_username'";
                $response = @mysqli_query($dbc,$queryDeleteUser);
                if($response){
                    if(mysqli_num_rows($response)>0){
                        if ($row = mysqli_fetch_array($response)){  
                            echo '<input type ="hidden" name="delete_username"  value = "'.$delete_username.'" />';
                            echo'
                            <table class="table table-secondary table-striped table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <th>Username</th>
                                        <td>'.$row['username'].'</td>
                                    </tr>
                                    <tr>
                                        <th>Admin</th>
                                        <td>'.$row['admin'].'</td>
                                    </tr>
                                </tbody>
                            </table>';
                            
                            echo'<input class="btn btn-danger mt-3" type="submit" name="delete_now" value="Yes, Delete this user"/></div>';
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
            //redirect_homepage();
        }
    ?>

        </form>
        
       
</div>       
</body>
</html>